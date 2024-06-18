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
                                <form action="{{ url('suppliers/'.$suppliers->sl_id.'/edit') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="sl_name">Tên:</label>
                                        <input type="text" class="form-control" id="sl_name" name="sl_name" value="{{ $suppliers->sl_name }}">
                                        @error('sl_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sl_email">Email:</label>
                                        <input type="email" class="form-control" id="sl_email" name="sl_email" value="{{ $suppliers->sl_email }}" />
                                        @error('sl_email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sl_phone">Điện thoại:</label>
                                        <input type="text" class="form-control" id="sl_phone" name="sl_phone" value="{{ $suppliers->sl_phone }}" />
                                        @error('sl_phone') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="sl_address">Địa chỉ:</label>
                                        <input type="text" class="form-control" id="sl_address" name="sl_address" value="{{ $suppliers->sl_address }}" />
                                        @error('sl_address') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sl_gender_name">trạng thái:</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input m-lg-2" type="radio" name="sl_status" value="1" {{ $suppliers->sl_status == '1' ? 'checked':'' }} />
                                            <label class="form-check-label" for="sl_gender_male">hoạt động </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input m-lg-2" type="radio" name="sl_status" value="0" {{ $suppliers->sl_status == '0' ? 'checked':'' }} />
                                            <label class="form-check-label" for="sl_gender_female">ngừng</label>
                                        </div>

                                    </div>
                                    <div class="m-3">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
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