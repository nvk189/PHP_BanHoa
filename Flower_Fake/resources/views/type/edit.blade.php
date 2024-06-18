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
                                <form action="{{ url('type/'.$type->pt_id.'/edit') }}" method="post">
                                    @csrf
                                    @method ('PUT')
                                    <input type="hidden" class="form-control" id="pt_id" name="pt_id" value="{{$type->pt_id}}" required>
                                    <div class="form-group">
                                        <label for="pt_name">Loại sản phẩm:</label>
                                        <input type="text" class="form-control" id="pt_name" name="pt_name" value="{{$type->pt_name}}" required>
                                        @error('pt_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="m-3">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                        <a class="btn btn-primary" href="{{ url('type') }}">Thoát</a>
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