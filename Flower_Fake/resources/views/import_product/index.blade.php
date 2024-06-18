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

    <form action="route('ipmort.create')" method="post">

        <h1 class="h3 mb-2 text-gray-800">Nhập hàng</h1>
        <a href="{{ url('import/create') }}" class="btn btn-primary float-end padding-bottom:2px ">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1">STT</th>
                                            <th rowspan="1" colspan="1">Nhà sản xuất</th>
                                            <th rowspan="1" colspan="1">Ngày nhập</th>
                                            <th rowspan="1" colspan="1">Tổng tiền</th>
                                            <th rowspan="1" colspan="1">Người nhập</th>
                                            <th rowspan="1" colspan="1">Tác vụ</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @php
                                        $i=0
                                        @endphp
                                        @foreach ($inport as $ip)
                                        <tr class="odd">
                                            @php
                                            $i++
                                            @endphp
                                            <td>{{$i}}</td>
                                            <td class="sorting_1">{{ $ip->supplier->sl_name }}</td>
                                            <td>{{$ip->pp_start }}</td>
                                            <td>{{number_format($ip->pp_price, 0, ',', '.') }}</td>
                                            <td>{{$ip->admin->ad_fullname }}</td>

                                            <td class="d-flex">
                                                <a href="{{ url('import/'.$ip->pp_id.'/edit') }}" class="mx-2 btn btn-success">Cập nhật</a>
                                                <a href="{{ url('import/'.$ip->pp_id.'/delete') }}" class="mx-2 btn btn-danger" onclick=" return confirm('Có chắc muốn xóa ???')">Xóa</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Page Heading -->

</div>

@endsection

@section('footer')
@parent

@include('layout.footer')
@endsection