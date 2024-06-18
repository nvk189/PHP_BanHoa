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
    <h1 class="h3 mb-2 text-gray-800">Đặt hàng</h1>
    <!-- <a href="{{ url('order/create') }}" class="btn btn-primary float-end padding-bottom:2px ">Thêm mới</a> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- <form method="GET" action="#" id="printForm">
                @csrf -->
            <!-- <button type="submit" class="mx-2 btn btn-success">In hóa đơn</button> -->
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th rowspan="1" colspan="1">STT</th>
                                        <th rowspan="1" colspan="1">Ngày đặt hàng</th>
                                        <th rowspan="1" colspan="1">Ngày giao hàng</th>
                                        <th rowspan="1" colspan="1">Người nhận</th>
                                        <th rowspan="1" colspan="1">Số điện thoại</th>
                                        <th rowspan="1" colspan="1">Địa chỉ</th>
                                        <th rowspan="1" colspan="1">Tổng tiền</th>
                                        <th rowspan="1" colspan="1">Trạng thái</th>
                                        <th rowspan="1" colspan="1">Tác vụ</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @php
                                    $i=0
                                    @endphp

                                    @foreach ($order as $or)

                                    <tr class="odd">
                                        @php
                                        $i++
                                        @endphp
                                        <td>{{$i}}</td>
                                        <td>{{ $or->order_date_start }}</td>
                                        <td>{{ $or->order_date_end }}</td>
                                        <td>{{ $or->cus_name }}</td>
                                        <td>{{ $or->cus_phone }}</td>
                                        <td style="overflow: hidden;">{{ $or->cus_address }}</td>
                                        <td>{{ number_format( $or->order_price,0,',','.') }}</td>
                                        @if ($or->order_status == 'cxn')
                                        <td>
                                            chờ xác nhận
                                        </td>
                                        @elseif ($or->order_status == 'huy')
                                        <td>
                                            hủy
                                        </td>
                                        @else
                                        <td>
                                            Thành công
                                        </td>
                                        @endif
                                        <td class="d-flex">
                                            <a href="{{ url('order/'.$or->order_id.'/edit') }}" class="mx-2 btn btn-success">Cập nhật</a>
                                            <a href="{{ url('order/'.$or->order_id.'/print') }}" class="mx-2 btn btn-danger">In hóa đơn</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>

</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectAllCheckbox = document.getElementById('select-all');
        var tableCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');

        selectAllCheckbox.addEventListener('click', function() {
            tableCheckboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });
    });
</script>


@endsection

@section('footer')
@parent

@include('layout.footer')
@endsection