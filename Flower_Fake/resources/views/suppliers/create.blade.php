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
    <h1 class="h3 mb-2 text-gray-800">Thêm nhà cung cấp</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="container">
                        <div class="row ">
                            <div class="col-md-6 offset-md-3">
                                @if(session('status'))
                                <div class="alert alert-success">{{session('status') }}</div>
                                @endif
                                <form action="{{ url('suppliers/create') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="sl_name">Họ và tên:</label>
                                        <input type="text" class="form-control" id="sl_name" name="sl_name" value="{{ old('sl_name') }}">
                                        @error('sl_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sl_email">Email:</label>
                                        <input type="email" class="form-control" id="sl_email" name="sl_email" value="{{ old('sl_email') }}" />
                                        @error('sl_email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sl_phone">Điện thoại:</label>
                                        <input type="text" class="form-control" id="sl_phone" name="sl_phone" value="{{ old('sl_phone') }}" />
                                        @error('sl_phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="sl_address">Địa chỉ:</label>
                                        <input type="text" class="form-control" id="sl_address" name="sl_address" value="{{ old('sl_address') }}" />
                                        @error('sl_address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sl_status">Trạng thái:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input m-lg-2" type="radio" name="sl_status" {{ old('sl_status') == true ? checked :'' }} />
                                            <label class="form-check-label">Hoạt động</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sl_status" />
                                            <label class="form-check-label">Ngừng</label>
                                        </div>

                                    </div>
                                    <div class="m-3">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                        <a class="btn btn-primary" href="{{ url('suppliers') }}">Thoát</a>
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