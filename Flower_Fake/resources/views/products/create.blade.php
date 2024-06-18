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
    <h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm</h1>

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

                                <form method="POST" action="{{ url('products/create') }}">
                                    @csrf
                                    <div class="col-12 d-flex">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="pr_name">Tên sản phẩm:</label>
                                                <input type="text" name="pr_name" id="pr_name" class="form-control" placeholder="Nhập tên sản phẩm" required>
                                                @error('pr_name') <span class="text-danger">{{ $message }}</span> @enderror
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
                                                    <input type="file" id="pr_image" name="pr_image" required onchange="previewImage()">
                                                    <center>
                                                        <span style="float: left;">View:</span>
                                                        <img id="viewimg" style="max-width:180px;max-height:180px;margin-top: 10px;">
                                                    </center>

                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <label for="pr_amount">Số lượng:</label>
                                                <input type="number" name="pr_amount" id="pr_amount" class="form-control" min="1" placeholder="Nhập số lượng" required>
                                                @error('pr_amount') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="pr_view">Lượt xem:</label>
                                                <input type="number" name="pr_view" id="pr_view" class="form-control" min="0" value="0">
                                                @error('pr_view') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="pr_status">Trạng thái:</label>
                                                <select name="pr_status" id="pr_status" class="form-control">
                                                    <option value="kd">Hoạt động</option>
                                                    <option value="nkd">Ngừng</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="price_real">Giá :</label>
                                                <input type="number" name="pr_price" id="pr_price" class="form-control" min="1" value="1" required>
                                                @error('pr_price') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="price_sales">Giá giảm:</label>
                                                <input type="number" name="pr_sales" id="pr_sales" class="form-control" min="0" value="1" required>
                                                @error('pr_sales') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="ct_describe1">Mô tả 1:</label>
                                                <textarea name="ct_describe1" id="ct_describe1" class="form-control" placeholder="Nhập mô tả" required></textarea>
                                                @error('ct_describe1') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="ct_describe2">Mô tả 2:</label>
                                                <textarea name="ct_describe2" id="ct_describe2" rows="5" cols="8" class="form-control" placeholder="Nhập mô tả" required></textarea>
                                                @error('ct_describe2') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 text-xl-center pt-5 ">

                                        <button type="submit" class="btn btn-primary">Thêm </button>
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
<script>
    function previewImage() {
        var img = document.getElementById("viewimg");
        var fileInput = document.getElementById("pr_image");
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var base64Image = e.target.result;
            img.src = base64Image;
        };

        reader.readAsDataURL(file);
    }

    CKEDITOR.replace('ct_describe2');
</script>

@endsection

@section('footer')
@parent

@include('layout.footer')
@endsection