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
    <h1 class="h3 mb-2 text-gray-800">Cập nhật hóa đơn nhập</h1>

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

                                <form method="POST" action="{{ url('import/'.$product->pp_id.'/edit') }}">
                                    @csrf
                                    @method('PUT')
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

                                                    @foreach ($details as $key => $detail)
                                                    <tr class="odd">
                                                        <td>
                                                            <input style="text-align: center; border: none; background-color: transparent;" name="pr_id[]" type="text" value="{{ $detail->pr_id }}" readonly>
                                                        </td>
                                                        <td>{{ $products[$key]->pr_name }}</td>
                                                        <td>
                                                            <img src="{{ asset('user/assets/img/' . $products[$key]->pr_image) }}" style="max-width: 80px; max-height: 80px; margin-top: 10px;">
                                                        </td>
                                                        <td>
                                                            <input type="number" style="width: 60px" name="ppd_amount[]" value="{{ $detail->ppd_amount }}" min="1">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="ppd_price[]" value="{{$detail->ppd_price }}" min="1">
                                                        </td>
                                                        <td class="d-flex">
                                                            <a href="{{ url('import/delete/product/' . $detail->pr_id) }}" class="mx-2 btn btn-danger">Xóa</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach



                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="col-12">

                                            <input type="hidden" name="pp_id" id="pp_id" class="form-control" value="{{ $product->pp_id}} " required>
                                            <div class="form-group">
                                                <label for="sl_id">nhà cung cấp:</label>
                                                <select name="sl_id" id="sl_id" class="form-control">

                                                    @foreach($sx as $s)
                                                    <option value="{{ $s->sl_id }}" {{ $s->sl_id == $product->sl_id ? 'selected' : '' }}>{{ $s->sl_name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pp_start">Ngày nhập:</label>
                                                <input type="date" name="pp_start" id="pp_start" class="form-control" value="{{ $product->pp_start }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pp_price">tổng tiền:</label>
                                                <input type="text" name="pp_price" id="pp_price" class="form-control" value="{{ number_format($product->pp_price, 0, ',', '.') }} " required readonly>

                                            </div>
                                            <div class="form-group">
                                                <label for="pp_amount">Số lượng:</label>

                                                <input type="text" name="pp_amonut" id="pp_amount" class="form-control" value="{{ $product->pp_amonut }} " required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="ad_id">người nhập:</label>
                                                <select name="ad_id" id="ad_id" class="form-control">

                                                    @foreach($ad as $s)
                                                    <option value="{{ $s->ad_id }}" {{ $s->ad_id == $product->ad_id ? 'selected' : '' }}>{{ $s->ad_fullname }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 text-center p-5">

                                        <button type="submit" class="btn btn-primary">cập nhật</button>
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