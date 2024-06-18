@extends('layout_user')

@section('title', 'bán hoa')



@section('header')
@parent
@include('layout_user.header')

@endsection

@section('content')
@parent
<link rel="stylesheet" href="{{asset('user/assets/css/login.css')}}">
<link rel="stylesheet" href="{{asset('user/assets/css/Cart.css')}}">
<main>
    <div class=" grid wide " style="display: flex; height:  600px;">
        <div class="l-9 " style="display: flex;">
            <div class="info-sign" style="width: 100%;">
                <h1>Đăng ký tài khoản</h1>
                <span class="content-sign">Nếu bạn đã có tài khoản với chúng tôi, vui lòng đăng nhập tại <a class="link-login" href="/user/login">trang đăng nhập </a>.</span>

                <h3 class="text-infor__user">Thông tin cá nhân của bạn</h3>
                <div class="infor-top ">
                    @if(session('status'))
                    <div class="alert alert-success">{{session('status') }}</div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-error">{{session('error') }}</div>
                    @endif
                    <form action="{{ url('user/register')}}" method="post">
                        @csrf

                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> Họ tên</span>
                            <input name="cus_name" class="input-text" type="text" placeholder="Họ tên" required>
                            @error('cus_name') <small>{{$message }}</small> @enderror
                        </div>
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> E - mail</span>
                            <input name="cus_email" class="input-text" type="email" placeholder="E-mail" required>

                            <br>
                            @error('cus_email') <small>{{$message }}</small> @enderror
                        </div>
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> Điện thoại</span>
                            <input name="cus_phone" class="input-text" type="text" placeholder="Điện thoại" required>
                            @error('cus_phone') <small>{{$message }}</small> @enderror
                        </div>

                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> Địa chỉ</span>
                            <input name="cus_address" class="input-text" type="text" placeholder="Địa chỉ" required>
                            <br>
                            @error('cus_address') <small>{{$message }}</small> @enderror
                        </div>
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span>giới tính</span>
                            <input name="cus_gender" type="radio" value="Nam" placeholder="Địa chỉ" required>
                            <span style="margin-top:10px ; margin-left:5px">Nam</span>
                            <input style="margin-left:20px" name="cus_gender" value="Nữ" type="radio" placeholder="Địa chỉ" required>
                            <span style="margin-top:10px ; margin-left:5px">Nữ</span>
                        </div>
                        <h3 class="text-infor__user">Mật khẩu của bạn</h3>
                        <div class="infor-top ">

                            <div class=" infor-item infor-1">

                                <span class="text-name"> <span class="icon-note">*</span> Mật khẩu</span>
                                <input name="password" class="input-text" type="password" placeholder="Mật khẩu" required>
                                @error('password') <small>{{$message }}</small> @enderror
                            </div>
                        </div>

                        <div class="check">
                            <div class="check-item">
                                <span class=" content-sign-check">
                                    <input class="check-icon" type="checkbox">
                                    Tôi đã đọc và đồng ý với <a class="link-login" href="">Điều khoản & Điều kiện </a>
                                </span>
                                <span class="btn-continue"><button style="background-color: #ed6b87; color:white; padding: 10px 20px; border:none; " type="sumbit">Đăng ký</button></span>

                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <div class="l-3 login-3">
            <div class="list-login">

                <ul class="login-3-list">

                    <li><a href="/user/login"> Đăng nhập</a></li>
                    <li><a href="">Đăng ký</a></li>
                    <li><a href="">Đã quên mật khẩu</a></li>
                    <li><a href="">Tài khoản của tôi</a></li>
                    <li><a href="">Lịch sử đơn hàng</a></li>
                </ul>
            </div>
        </div>
    </div>
</main>

@endsection

@section('footer')
@parent

@include('layout_user.footer')
@endsection