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
    <h1 class="h3 mb-2 text-gray-800">Tài khoản khách hàng</h1>

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
                                        <th rowspan="1" colspan="1">Họ và tên</th>
                                        <th rowspan="1" colspan="1">tài khoản</th>

                                        <th rowspan="1" colspan="1">Trạng thái</th>

                                        <th rowspan="1" colspan="1">Tác vụ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                    $i=0
                                    @endphp

                                    @foreach ($tk as $cs)
                                    <tr class="odd">
                                        @php
                                        $i++
                                        @endphp
                                        <td>{{$i}}</td>
                                        <td class="sorting_1">
                                            @if($cs->customer)
                                            {{$cs->customer->cus_name}}
                                            @else
                                            chưa xác đinh
                                            @endif
                                        </td>
                                        <td>{{$cs->name}}</td>
                                        <td>{{$cs->user_status == '1'? 'Hoạt động ':'Ngừng'}}</td>
                                        <td class="d-flex">
                                            <a href="{{ url('users/'.$cs->user_id.'/delete')}}" class="mx-2 btn btn-danger" onclick=" return confirm('Có chắc muốn xóa ???')">Xóa</a>
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

</div>

@endsection

@section('footer')
@parent

@include('layout.footer')
@endsection