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
                <h1>Đổi mật khẩu</h1>
                <form action="" method="post">

                    <h3 class="text-infor__user">Mật khẩu của bạn</h3>
                    <div class="infor-top ">
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> Mật khẩu</span>
                            <input ng-model="matkhau" id="hoten" class="input-text" type="text" placeholder="Nhập mật khẩu">
                        </div>
                        <div class=" infor-item infor-1">

                            <span class=" text-name"> <span class="icon-note">*</span> Xác nhận mật khẩu</span>
                            <input ng-model="xnmatkhau" id="maxnmatkhau" class="input-text" type="text" placeholder="Xác nhận lại mật khẩu">
                        </div>
                    </div>
                    <div class="check">
                        <div class="check-item c-12" style="display: flex; justify-content: space-between;">
                            <span class="btn-continue"><a style=" border-radius: 5px; background-color: #ccc; color: #fff;" href="">Quay lại</a></span>

                            <span ng-click="updatePassUser()" class="btn-continue"><a href="./account.html">Tiếp tục</a></span>
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