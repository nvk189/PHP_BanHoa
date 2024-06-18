@extends('layout')

@section('title', 'Dashboard ')

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

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Trang chủ</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Đơn đặt hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $or }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Sản phẩm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $product}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tổng doanh thu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{number_format( $totalRevenue , 0, ',', '.') }} VND </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->

</div>

<!-- Content Row -->
<form method="POST" action="{{ url('dashboard/update')}}">
    @csrf
    @method('PUT')
    <div class="row p-5 ">
        <button type="submit" class="mx-2 btn btn-success">Duyệt</button>
        <div class="col-sm-12">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr>
                        <th rowspan="1" colspan="1"> <input type="checkbox" id="select-all"> </th>
                        <th rowspan="1" colspan="1">Ngày đặt hàng</th>
                        <th rowspan="1" colspan="1">Ngày giao hàng</th>
                        <th rowspan="1" colspan="1">Người nhận</th>
                        <th rowspan="1" colspan="1">Số điện thoại</th>
                        <th rowspan="1" colspan="1">Địa chỉ</th>
                        <th rowspan="1" colspan="1">Tổng tiền</th>
                        <th rowspan="1" colspan="1">Trạng thái</th>

                    </tr>
                </thead>


                <tbody>

                    @foreach ($order as $or)
                    <tr class="odd">
                        <td> <input type="checkbox" name="selected_orders[]" value="{{ $or->order_id }}"> </td>
                        <td>{{ $or->order_date_start }}</td>
                        <td>{{ $or->order_date_end }}</td>
                        <td>{{ $or->cus_name }}</td>
                        <td>{{ $or->cus_phone }}</td>
                        <td style="overflow: hidden;">{{ $or->cus_address }}</td>
                        <td>{{ number_format($or->order_price,0,',','.') }}</td>
                        <td>{{ $or->order_status=='cxn'? 'chờ xác nhận':'đặt hàng thành công' }}</td>


                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>


    <!-- Content Row -->


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