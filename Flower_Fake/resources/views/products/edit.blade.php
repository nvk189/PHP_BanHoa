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
    <h1 class="h3 mb-2 text-gray-800">Sửa thông tin sản phẩm</h1>

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

                                <form action="{{ url('products/'.$product->pr_id.'/edit') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12 d-flex">

                                        <input type="hidden" name="pr_id" id="pr_id" class="form-control" value=" {{$product->pr_id }}" required>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pr_name">Tên sản phẩm:</label>
                                                <input type="text" name="pr_name" id="pr_name" class="form-control" value=" {{$product->pr_name }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="pt_id">Loại sản phẩm:</label>

                                                <select name="pt_id" id="pt_id" class="form-control">
                                                    @foreach($type as $tp)
                                                    <option value="{{ $tp->pt_id}}">{{ $tp->pt_name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-12 col-s-12 padding-box">
                                                    <label for="txtright">Hình ảnh:</label>
                                                </div>
                                                <div class="col-12 col-s-12 padding-box">
                                                    <input type="file" id="pr_image" name="pr_image" required>

                                                    <center>
                                                        <span style="float: left;">View:</span>
                                                        <img src="{{ asset('user/assets/img/' . $product->pr_image) }}" id="viewimg" style="max-width:180px;max-height:180px;margin-top: 10px;">
                                                    </center>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label for="pr_amount">Số lượng:</label>
                                                <input type="number" name="pr_amount" id="pr_amount" class="form-control" value="{{ $product->pr_amount}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pr_view">Lượt xem:</label>
                                                <input type="number" name="pr_view" id="pr_view" class="form-control" value="{{ $product->pr_view}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="pr_status">Trạng thái:</label>
                                                <select name="pr_status" id="pr_status" class="form-control">
                                                    <option value="kd" {{ $product->pr_status == 'kd' ? 'selected' : '' }}>Hoạt động</option>
                                                    <option value="nkd" {{ $product->pr_status == 'nkd' ? 'selected' : '' }}>Ngừng</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="price_real">Giá :</label>
                                                <input type="number" name="pr_price" id="pr_price" class="form-control" value="{{ $product->pr_price}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="price_sales">Giá giảm:</label>
                                                <input type="number" name="pr_sales" id="pr_sales" class="form-control" value="{{ $product->pr_sales}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="ct_describe1">Mô tả 1:</label>
                                                <textarea name="ct_describe1" id="ct_describe1" class="form-control" required>{{$category->ct_describe1}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="ct_describe2">Mô tả 2:</label>
                                                <textarea name="ct_describe2" id="ct_describe2" rows="5" cols="8" class="form-control" required>{{$category->ct_describe2}}</textarea>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 text-xl-center pt-5 ">

                                        <button type="submit" class="btn btn-primary">Cập nhật </button>
                                        <a type="submit" class="btn btn-danger" href="{{ url('products') }}">Thoát </a>
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