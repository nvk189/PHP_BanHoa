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
    <h1 class="h3 mb-2 text-gray-800">Thêm khách hàng</h1>

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
                                <form action="{{ url('customer/create') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="cus_name">Họ và tên:</label>
                                        <input type="text" class="form-control" id="cus_name" name="cus_name" value="{{ old('cus_name') }}">
                                        @error('cus_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cus_gender">Giới tính:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input m-lg-2" type="radio" name="cus_men" value="1" {{ old('cus_gender') }} />
                                            <label class="form-check-label" for="cus_gender_male">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="cus_men" />
                                            <label class="form-check-label" for="cus_gender_female" value="0" {{ old('cus_gender') }}>Nữ</label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="cus_email">Email:</label>
                                        <input type="email" class="form-control" id="cus_email" name="cus_email" value="{{ old('cus_email') }}" />
                                        @error('cus_email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cus_phone">Điện thoại:</label>
                                        <input type="text" class="form-control" id="cus_phone" name="cus_phone" value="{{ old('cus_phone') }}" />
                                        @error('cus_phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="cus_address">Địa chỉ:</label>
                                        <input type="text" class="form-control" id="cus_address" name="cus_address" value="{{ old('cus_address') }}" />
                                        @error('cus_address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="m-3">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                        <a class="btn btn-primary" href="{{ url('customer') }}">Thoát</a>
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