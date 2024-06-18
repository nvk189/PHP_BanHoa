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
        <div class="l-9 " style="display: flex;">
            <div class="info-sign" style="width: 100%;" ng-controller="UserCtrl">
                <h1>Thông tin tài khoản của tôi</h1>
                <form action="" method="post">

                    <h3 class="text-infor__user">Thông tin cá nhân của bạn</h3>
                    <div class="infor-top ">
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> Họ tên</span>
                            <input ng-model="hoten" id="hoten" class="input-text" type="text" placeholder="Họ tên">
                        </div>
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> E - mail</span>
                            <input ng-model="email" id="email" class="input-text" type="email" placeholder="E-mail">
                        </div>
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> Điện thoại</span>
                            <input ng-model="dienthoai" id="dienthoai" class="input-text " type="text" placeholder="Điện thoại">
                        </div>
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> Địa chỉ</span>
                            <input ng-model="diachi" id="diachi" class="input-text" type="text" placeholder="Địa chỉ">
                        </div>
                    </div>
                    <div class="check">
                        <div class="check-item c-12" style="display: flex; justify-content: space-between;">
                            <span class="btn-continue"><a style=" border-radius: 5px; background-color: #ccc; color: #fff;" href="./Home.html">Quay lại</a></span>

                            <span ng-click="updateUser()" class="btn-continue"><a href="">Tiếp tục</a></span>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="l-3 login-3">
            <div class="list-login">

                <ul class="login-3-list">

                    <li><a href="./login.html"> Đăng nhập</a></li>
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