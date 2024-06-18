@extends('layout')

@section('title', '')

@section('slider')
@parent
@include('layout.slide')
@endsection

@section('header')
@parent
@include('layout.header')

@endsection

@section('content')
@parent
<div class="container-fluid pt-0 ">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm hóa đơn nhập</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="">

                    <div class="container">
                        <div class="">
                            <div class="">
                                @if(session('status'))
                                <div class="alert alert-success">{{session('status') }}</div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-error">{{session('error') }}</div>
                                @endif

                                <form method="POST" action="{{ url('import/create') }}">
                                    @csrf
                                    <div class=" col-12 ">

                                        <div class=" col-12">
                                            <a href="{{url('products') }}" type="submit" class="btn btn-primary">Chọn sản phẩm</a>
                                            <a onclick="calculateTotal()" class="btn btn-primary">Cập nhật</a>
                                            <table class="table table-bordered " width="100%" cellspacing="0" role="grid" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">Mã sản phẩm</th>
                                                        <th rowspan="1" colspan="1">Tên Sản phẩm</th>
                                                        <th rowspan="1" colspan="1">Hình ảnh</th>
                                                        <th rowspan="1" colspan="1">Số lượng</th>
                                                        <th rowspan="1" colspan="1">Giá tiền</th>
                                                        <th rowspan="1" colspan="1">Tác vụ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ( $pt->items as $ip)
                                                    <tr class="odd">

                                                        <td>
                                                            <input style="text-align: center; border: none; background-color: transparent;" name="pr_id[]" type="text" value="{{ $ip['pr_id'] }}">
                                                        </td>
                                                        <td> {{ $ip['pr_name'] }}</td>
                                                        <td><img src="{{ asset('user/assets/img/' . $ip['pr_image']) }}" style="max-width:80px;max-height:80px;margin-top: 10px;"></td>
                                                        <td>
                                                            <input type="number" style="width:60px" name="ppd_amount[]" value="{{ $ip['pr_amount'] }}">
                                                        </td>

                                                        <td><input type="number" name="ppd_price[]" value="{{ $ip['pr_sales'] ? $ip['pr_sales'] : $ip['pr_price'] }}"></td>
                                                        <td class="d-flex">
                                                            <a href="{{ url('import/delete/product/' . $ip['pr_id']) }}" class="mx-2 btn btn-danger">Xóa</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12">

                                            <div class="form-group">
                                                <label for="sl_id">nhà cung cấp:</label>
                                                <select name="sl_id" id="sl_id" class="form-control">
                                                    @foreach( $supp as $sp)
                                                    <option value="{{ $sp->sl_id }}">{{ $sp->sl_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pp_start">Ngày nhập:</label>
                                                <input type="date" name="pp_start" id="pp_start" class="form-control" value="{{date('Y-m-d')}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pp_price">tổng tiền:</label>
                                                <input type="number" name="pp_price" id="pp_price" class="form-control" value="{{$pt->totalPrice }}" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="pp_amount">Số lượng:</label>

                                                <input type="number" name="pp_amonut" id="pp_amount" class="form-control" value="{{$pt->totalQuantity }}" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="ad_id">người nhập:</label>
                                                <select name="ad_id" id="ad_id" class="form-control">
                                                    @foreach( $admin as $ad)
                                                    <option value="{{ $ad->ad_id }}">{{ $ad->ad_fullname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 text-center p-5">

                                        <button type="submit" class="btn btn-primary">thêm</button>
                                        <a href="{{url('import') }}" class="btn btn-danger">thoát</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <script>
        function calculateTotal() {
            var totalItems = 0;
            var totalPrice = 0;

            document.querySelectorAll('tbody tr').forEach(function(row) {
                var amount = parseInt(row.querySelector('input[name="ppd_amount[]"]').value);
                var price = parseFloat(row.querySelector('input[name="ppd_price[]"]').value);

                if (!isNaN(amount) && !isNaN(price)) {
                    totalItems += amount;
                    totalPrice += amount * price;
                }
            });

            document.getElementById('pp_price').value = totalPrice;
            document.getElementById('pp_amount').value = totalItems;
        }
    </script>

</div>

@endsection

@section('footer')
@parent

@include('layout.footer')
@endsection