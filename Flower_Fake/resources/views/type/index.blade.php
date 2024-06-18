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
    <h1 class="h3 mb-2 text-gray-800">Loại sản phẩm</h1>
    <a href="{{ url('type/create') }}" class="btn btn-primary float-end padding-bottom:2px ">Thêm mới</a>

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
                                        <th rowspan="1" colspan="1">Mã loại sản phẩm</th>
                                        <th rowspan="1" colspan="1">Loại sản phẩm</th>


                                        <th rowspan="1" colspan="1">Tác vụ</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($type as $tp)
                                    <tr class="odd">
                                        <td class="sorting_1">{{$tp->pt_id}}</td>

                                        <td>{{$tp->pt_name}}</td>
                                        <td class="d-flex">
                                            <a href="{{ url('type/'.$tp->pt_id.'/edit') }}" class="mx-2 btn btn-success">Cập nhật</a>
                                            <a href="{{ url('type/'.$tp->pt_id.'/delete') }}" class="mx-2 btn btn-danger" onclick=" return confirm('Có chắc muốn xóa ???')">Xóa</a>
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