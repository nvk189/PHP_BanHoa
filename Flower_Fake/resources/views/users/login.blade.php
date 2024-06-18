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
    <div class=" grid wide" style="display: flex; height: 600px;">
        <div class="l-9 " style="display: flex;">
            <div class="l-6" style="padding: 0 12px 0 0;">
                <div class="login-1" style="padding: 16px;">
                    <h3 class="login-custom">Khách hàng mới</h3>

                    <span class="login-content">Đăng ký tài khoản</span>
                    <br>
                    <br>
                    <span>Bằng cách tạo tài khoản, bạn sẽ có thể mua sắm nhanh hơn, cập nhật trạng thái đơn hàng và theo dõi các đơn hàng bạn đã thực hiện trước đó.</span>
                    <br>
                    <br>
                    <p class="btn-continue"><a href="/html/Sign.html">Tiếp tục</a></p>
                </div>
            </div>
            <div class="l-6" style="padding: 0 12px;">
                <div class="login-2" style="padding: 16px;">
                    <form id="target" action="#" method="post" style="padding: 16px;">
                        <h3 class="login-custom">Phản hồi khách hàng</h3>

                        <span class="login-content">Tôi là một khách hàng cũ</span>
                        <br>
                        <br>
                        <form action="" method="POST">
                            @csrf

                            <span class="login-email">Tên đăng nhập</span>
                            <p>

                                <input name="name" id="name-login" type="email" class="input-email" placeholder="Nhập địa chỉ email..." required>
                                @error('cus_name') <small>{{$message }}</small> @enderror
                            </p>
                            <br>
                            <span class="login-email">Mật khẩu</span>
                            <p>

                                <input name="password" id="pass-login" type="password" class="input-email" placeholder="Mật khẩu" required>
                                @error('cus_pass') <small>{{$message }}</small> @enderror
                            </p>
                            <span class="no-pass">
                                <a href="">

                                    Đã quên mật khẩu
                                </a>
                            </span>

                            <p class="btn-continue"><button style="background-color: #e91e63; color:white; padding: 10px 20px; border:none; " type="submit" id="login-btn" href="">Đăng nhập</button></p>
                        </form>

                </div>
            </div>
        </div>
        <div class="l-3 login-3">
            <div class="list-login">

                <ul class="login-3-list">

                    <li><a href="#"> Đăng nhập</a></li>
                    <li><a href="/user/register">Đăng ký</a></li>
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