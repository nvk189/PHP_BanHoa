@extends('layout_user')

@section('title', 'bán hoa')



@section('header')
@parent
@include('layout_user.header')

@endsection

@section('content')
@parent
<link rel="stylesheet" href="{{asset('user/assets/css/login.css')}}">
<main>
    <div class=" grid wide " style="display: flex; height:  600px;">
        <div class="l-9 ">
            <div class="info-sign" style="width: 100%;">
                <h1>Tài khoản của tôi</h1>

                <p>
                    <a href="./user.html" style="color: #e91e63; text-decoration: none ; font-weight: 400; line-height: 20px;">
                        Chỉnh sửa thông tin tài khoản của bạn

                    </a>
                </p>
                <p>
                    <a href="./userpass.html" style="color: #e91e63; text-decoration: none;font-weight: 400; line-height: 28px;">
                        Thay đổi mật khẩu của bạn

                    </a>
                </p>
            </div>
            <div class="info-sign" style="width: 100%; margin-top: 20px;">
                <h1>Đơn đặt hàng của tôi</h1>

                <p>
                    <a href="./CartHD.html" style="color: #e91e63; text-decoration: none ; font-weight: 400; line-height: 20px;">
                        Xem lịch sử đặt hàng của bạn

                    </a>
                </p>

            </div>
        </div>
        <div class="l-3 login-3">
            <div class="list-login">

                <ul class="login-3-list">

                    <li><a href="./login.html"> Đăng nhập</a></li>
                    <li><a href="./Sign.html">Đăng ký</a></li>
                    <li><a href="">Đã quên mật khẩu</a></li>
                    <li><a href="./user.html">Tài khoản của tôi</a></li>
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