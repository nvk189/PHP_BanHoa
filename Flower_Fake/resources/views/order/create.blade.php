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
    <h1 class="h3 mb-2 text-gray-800">Thêm hóa đơn </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="container">
                        <div class="">
                            <div class="">
                                @if(session('status'))
                                <div class="alert alert-success">{{session('status') }}</div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-error">{{session('error') }}</div>
                                @endif

                                <form method="POST" action="{{ url('order/create') }}">
                                    @csrf

                                    <div class="col-12 d-flex p-0">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="cs_id">người đặt hàng:</label>
                                                <input type="number" name="cs_id" id="cs_id" class="form-control" required>

                                            </div>
                                            <div class="form-group">
                                                <label for="order_date_start">Ngày đặt hàng:</label>
                                                <input type="date" name="order_date_start" id="order_date_start" class="form-control" value="{{date('Y-m-d')}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="order_date_end">Ngày giao hàng:</label>
                                                <input type="date" name="order_date_end" id="order_date_end" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cus_name">Người nhận:</label>
                                                <input type="text" name="cus_name" id="cus_name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cus_phone">Số điện thoại:</label>
                                                <input type="text" name="cus_phone" id="cus_phone" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cus_address">Địa chỉ:</label>
                                                <input type="text" name="cus_address" id="cus_address" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="order_price">Tổng tiền:</label>
                                                <input type="number" name="order_price" id="order_price" class="form-control" min="0" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ad_id">trạng thái:</label>
                                                <select name="order_status" id="ad_id" class="form-control">

                                                    <option value="xn">Chờ xác nhận</option>
                                                    <option value="tc">Đặt hàng thành công</option>
                                                    <option value="hd">Hủy đơn</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h1>Thêm sản phẩm</h1>
                                            <table class="table table-bordered" id="product-table">
                                                <thead>
                                                    <tr>
                                                        <th>Mã sản phẩm</th>

                                                        <th>Số lượng</th>
                                                        <th>giá tiền</th>
                                                        <th>tác vụ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="number" name="pr_ids[]" class="form-control" required></td>

                                                        <td><input type="number" name="od_quantities[]" class="form-control" min="0" required></td>
                                                        <td><input type="number" name="od_prices[]" class="form-control" min="0" required></td>
                                                        <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">xóa</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-primary" onclick="addRow()">thêm </button>

                                            <script>
                                                function addRow() {
                                                    var newRow = '<tr>' +
                                                        '<td><input type="number" name="pr_ids[]" class="form-control" min="0" required></td>' +
                                                        '<td><input type="number" name="od_quantities[]" class="form-control" min="0" required></td>' +
                                                        '<td><input type="number" name="od_prices[]" class="form-control" min="0" required></td>' +
                                                        '<td><button type="button" class="btn btn-danger" onclick="removeRow(this)">xóa</button></td>' +

                                                        '</tr>';
                                                    $('#product-table tbody').append(newRow);
                                                }

                                                function removeRow(button) {
                                                    $(button).closest('tr').remove();
                                                }
                                            </script>

                                        </div>
                                    </div>




                                    <div class="col-12 text-center">

                                        <button type="submit" class="btn btn-primary">thêm</button>
                                        <a href="{{url('order') }}" class="btn btn-danger">thoát</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@parent
@include('layout.footer')
@endsection