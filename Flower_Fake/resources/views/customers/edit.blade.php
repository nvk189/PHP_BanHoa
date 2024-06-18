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
    <h1 class="h3 mb-2 text-gray-800">Sửa thông tin</h1>

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
                                <form action="{{ url('customer/'.$customer->cus_id.'/edit') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="cus_name">Tên:</label>
                                        <input type="text" class="form-control" id="cus_name" name="cus_name" value="{{ $customer->cus_name }}">
                                        @error('cus_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cus_gender_name">Giới tính:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input m-lg-2" type="radio" name="cus_gender" value="1" {{ $customer->cus_gender == '1' ? 'checked':'' }} />
                                            <label class="form-check-label" for="cus_gender_male">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input m-lg-2" type="radio" name="cus_gender" value="0" {{ $customer->cus_gender == '0' ? 'checked':'' }} />
                                            <label class="form-check-label" for="cus_gender_female">Nữ</label>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="cus_email">Email:</label>
                                        <input type="email" class="form-control" id="cus_email" name="cus_email" value="{{ $customer->cus_email }}" />
                                        @error('cus_email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cus_phone">Điện thoại:</label>
                                        <input type="text" class="form-control" id="cus_phone" name="cus_phone" value="{{ $customer->cus_phone }}" />
                                        @error('cus_phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="cus_address">Địa chỉ:</label>
                                        <input type="text" class="form-control" id="cus_address" name="cus_address" value="{{ $customer->cus_address }}" />
                                        @error('cus_address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="m-3">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
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