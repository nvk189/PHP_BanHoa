@extends('layout_user')

@section('title', 'bán hoa')



@section('header')
@parent
@include('layout_user.header')

@endsection

@section('content')
@parent
<link rel="stylesheet" href="{{asset('user/assets/css/Cart.css')}}">
<link rel="stylesheet" href="{{asset('user/assets/css/product.css')}}">
<main>
    <div class="list-product" ng-controller="Detail">
        <div class="grid wide product-list-item">
            <h1>

                <span class="text-product">Lịch sử đặt hàng</span>
            </h1>
            <div class="grid wide">
                <div class="c-12">
                    <table>
                        <thead>
                            <tr>
                                <td></td>
                                <td>Hình ảnh</td>
                                <td>Tên sản phẩm </td>
                                <td>Mã sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Đơn giá</td>
                                <td>Tổng cộng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="x in list" ng-init="x.isSelected = false">
                                <td>
                                    <input type="checkbox" ng-model="x.isSelected" ng-change="toggleSelection(x)" name="" id="">
                                </td>
                                <td>
                                    <img src="" alt="" style="height: 80px ; width: 80px;">
                                </td>

                                <td style="color: #e91e63;"></td>
                                <td></td>
                                <td>
                                    <input style="font-size: 16px; width: 50px; text-align: center;" type="number" value="">
                                    <i onclick="updateQuantity(x, newQuantity)" class="fa-solid fa-rotate" style="padding: 5px; background-color: green;color: #fff; border-radius: 2px;"></i>
                                    <i onclick="removeItem(x)" class="fa-solid fa-trash-can" style="background-color: #e91e63; border-radius: 2px; font-size: 16px; padding: 5px; cursor: pointer; color: #fff;"></i>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <p style="float: right;">Tổng cộng :</p>
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <div class="grid wide" style="margin-top: 20px;">
                    <div class="c-12">
                        <div class="" style="display: flex; justify-content: space-between;">

                            <div style="width: 170px; height: 40px; background-color: #ccc; cursor: pointer; border-radius: 5px; ">
                                <a href="./Home.html" style="text-decoration: none;">

                                    <p style="text-align: center; padding: 10px 0; color: #000;opacity: 0.6; font-size: 16px;">
                                        Tiếp tục mua sắm
                                    </p>
                                </a>
                            </div>
                            <div style="width: 120px; height: 40px; background-color: #e91e63; cursor: pointer;border-radius: 5px;  ">
                                <a href="./Bill.html" style="text-decoration: none;">

                                    <p style="text-align: center; padding: 10px 0; color: #fff; font-size: 16px;">
                                        Thanh toán
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection

@section('footer')
@parent

@include('layout_user.footer')
@endsection