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
<link rel="stylesheet" href="{{asset('user/assets/css/admin.css')}}">
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kết quả kinh doanh trong ngày</h1>
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
                                Doanh thu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalRevenue, 0, ',', '.') ? number_format($totalRevenue, 0, ',', '.') :0 }} VND</div>
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
                                Đơn hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_order ?  $total_order :0}} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Sản phẩm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_product ?  $total_product: 0 }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->

    </div>

    <!-- Pending Requests Card Example -->

</div>

<!-- Content Row -->



<div class="row p-5 ">
    <h2 class=""> Danh sách sản phẩm bán chạy</h2>
    <div class="col-sm-12">
        <table class="table table-bordered " width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr>

                    <th rowspan="1" colspan="1">Mã sản phẩm</th>
                    <th rowspan="1" colspan="1">Tên sản phẩm</th>
                    <th rowspan="1" colspan="1">Hình ảnh</th>
                    <th rowspan="1" colspan="1">Số lượng</th>


                </tr>
            </thead>


            <tbody>
                @foreach ($product as $pt)
                <tr>
                    <td>{{ $pt->pr_id}}</td>
                    <td>{{ $pt->pr_name}}</td>
                    <td>
                        <img style="width:60px; height:60px;" src="{{ asset('user/assets/img/' .$pt->pr_image)}}" alt="">

                    </td>
                    <td>{{ $pt->total_quantity_sold}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>

</div>



<!-- Content Row -->


</div>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        Thongke();
    });
    document.addEventListener("DOMContentLoaded", function() {
        var selectAllCheckbox = document.getElementById('select-all');
        var tableCheckboxes = document.querySelectorAll('tbody input[type="checkbox"]');

        selectAllCheckbox.addEventListener('click', function() {
            tableCheckboxes.forEach(function(checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });
    });
</script> -->


@endsection

@section('footer')
@parent

@include('layout.footer')
@endsection