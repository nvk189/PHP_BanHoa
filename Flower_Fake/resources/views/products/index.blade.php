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
    <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>
    <a href="{{ url('products/create') }}" class="btn btn-primary float-end padding-bottom:2px ">Thêm mới</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <form action="{{ url('import/create/product') }}" method="GET">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable " id="dataTable" width="100%" cellspacing="0" role="grid" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="1" colspan="1"> STT</th>
                                            <th rowspan="1" colspan="1">Tên Sản phẩm</th>
                                            <th rowspan="1" colspan="1">Loại sản phẩm</th>
                                            <th rowspan="1" colspan="1">Hình ảnh</th>
                                            <th rowspan="1" colspan="1">Số lượng</th>
                                            <th rowspan="1" colspan="1">Lượt xem</th>
                                            <th rowspan="1" colspan="1">Trạng thái</th>
                                            <th rowspan="1" colspan="1">Giá</th>
                                            <th rowspan="1" colspan="1">Giá giảm</th>
                                            <th rowspan="1" colspan="1">Tác vụ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i=0
                                        @endphp
                                        @foreach ($product as $pr)
                                        <tr class="odd">
                                            @php
                                            $i++
                                            @endphp
                                            <td>{{$i}}</td>
                                            <td>{{$pr->pr_name}}</td>
                                            <td>{{$pr->pt_id }}</td>
                                            <td><img src="{{ asset('user/assets/img/' . $pr->pr_image) }}" style="max-width:80px;max-height:80px;margin-top: 10px;"></td>
                                            <td>{{$pr->pr_amount }}</td>
                                            <td>{{$pr->pr_view }}</td>
                                            <td>{{$pr->pr_status=='kd'? 'hoạt động':'ngừng' }}</td>
                                            <td>{{number_format($pr->pr_price, 0, ',', '.') }}</td>
                                            <td>{{number_format($pr->pr_sales, 0, ',', '.') }}</td>
                                            <td class="d-flex">
                                                <a href="{{ url('import/create/product', ['pr_id' => $pr->pr_id]) }}" class="mx-2 btn btn-success">+</a>

                                                <a href="{{ url('products/'.$pr->pr_id.'/edit') }}" class="mx-2 btn btn-success">sửa</a>
                                                <a href="{{ 'products/'.$pr->pr_id.'/delete' }}" class="mx-2 btn btn-danger" onclick=" return confirm('Bạn có chắc muốn xóa ???')">Xóa</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
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