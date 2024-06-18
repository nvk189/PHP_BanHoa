@extends('layout_user')

@section('title', 'bán hoa')



@section('header')
@parent
@include('layout_user.header')

@endsection

@section('content')
@parent
<link rel="stylesheet" href="{{asset('user/assets/css/bill.css')}}">

@if(session('alert'))
<div class="alert alert-success">{{session('status') }}</div>
@endif
<main>


    <form action="{{ route('order.create')}}" method="post">
        @csrf
        <div class="grid wide" style="display: flex;">
            <!-- thông tin hóa đơn -->
            <div class="c-6 ">
                <h3>Thông tin hóa đơn</h3>
                <div class="address">
                    <div class=" infor-item infor-1">
                        <span id="text-bill" class=" text-name"> <span class="icon-note">*</span> Người nhận</span>
                        <p>
                            <input name="cus_name" id="cusname" class="text-search" type="text" placeholder="Nhập họ và tên..." required>

                        </p>
                    </div>
                    <div class=" infor-item infor-1">
                        <span id="text-bill" class=" text-name"> <span class="icon-note">*</span> Số điện thoại</span>
                        <p>
                            <input name="cus_phone" id="cusphone" class="text-search" type="number" placeholder="Nhập số điện thoại..." required>

                        </p>
                    </div>
                    <div class=" infor-item infor-1">
                        <span id="text-bill" class=" text-name"> <span class="icon-note">*</span> Địa chỉ</span>
                        <p>
                            <input name="cus_address" id="cusaddress" class="text-search" type="text" placeholder="Nhập địa chỉ..." required>

                        </p>
                    </div>
                    <div class=" infor-item infor-1" style="display: none;">
                        <span id="text-bill" class=" text-name"> <span class="icon-note">*</span> Ngày đặt hàng</span>
                        <p>
                            <input name="order_date_start" id="cusdate" class="text-search" type="date" value="{{date('Y-m-d')}}" required>

                        </p>
                    </div>
                    <div class=" infor-item infor-1">
                        <span id="text-bill" class=" text-name"> <span class="icon-note">*</span> Ngày giao hàng</span>
                        <p>
                            <input name="order_date_end" id="cusdate" class="text-search" type="date" value="{{date('Y-m-d')}}" required>

                        </p>
                    </div>

                </div>
            </div>
            <!--  thông tin sản phẩm -->
            <div class="c-6" style="padding: 0 30px;">
                <h3>Thông tin sản phẩm</h3>


                <table>
                    <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá </th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->item as $item)
                        <tr>
                            <td style="display: none;">
                                <input name="pr_id[]" type="text" value="{{ $item->pr_id }}" style="border: none; background-color: transparent;">
                            </td>
                            <td style="text-align: center;">
                                <img src="{{ asset('user/assets/img/' . $item->pr_image) }}" alt="" style="width: 50px; height: 50px;border: 4px solid #ccc; border-radius: 5px;">
                            </td>
                            <td style="text-align: center;">{{ $item->pr_name }}</td>
                            <td name="od_quanlity[]" style="text-align: center;">
                                <input style="text-align: center; border: none; background-color: transparent;" name="od_quanlity[]" type="" value="{{$item->quantity}}" readonly>
                            </td>
                            <td style="text-align: center;">
                                <input style="text-align: center; border: none; background-color: transparent;" name="od_price[]" type="text" value=" {{ number_format( $item->pr_sales? $item->pr_sales: $item->pr_price , 0, ',', '.')}} " readonly>
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ route('order.delete', $item->pr_id )}}">
                                    <i class="fa-solid fa-circle-xmark" style="color: #fff; padding: 10px; background-color: #e91e63; border-radius: 5px; cursor: pointer;"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="text-align: right; font-size: 16px;"> Tổng tiền: <input style="text-align: center; border: none; background-color: transparent;" name="order_price" value="{{ number_format($cart->totalPrice, 0, ',', '.')}}" required readonly> </td>
                            <td style="text-align: center;">VND</td>
                        </tr>
                    </tfoot>
                </table>
                @if($cart->totalQuantity >0 )
                <div class="btn_add-bill c-12" style=" margin-top: 20px; display: flex;">
                    <div class="c-7" style="background-color: #e91e63; color: #fff; text-align: center; border-radius:5px ; cursor: pointer; margin: 10px 10px;">
                        <button type="submit" style="padding: 10px; font-size: 20px; background-color: #e91e63;border:none;color: #fff;">

                            Đặt hàng
                        </button>
                    </div>
                    <div class="c-5" style="background-color:#ccc; text-align: center; border-radius:5px ; cursor: pointer; margin: 10px 10px;">
                        <p style="padding: 10px; font-size: 20px;">
                            <a href="/cart" style="text-decoration: none; color: #000;">

                                Quay lại
                            </a>

                        </p>
                    </div>
                </div>
                @else
                <div class="c-5" style="background-color:#ccc; text-align: center; border-radius:5px ; cursor: pointer; margin: 10px 10px;">
                    <p style="padding: 10px; font-size: 20px;">
                        <a href="/home" style="text-decoration: none; color: #000;">

                            Chọn sản phẩm
                        </a>

                    </p>
                </div>
                @endif
            </div>

        </div>
    </form>

</main>

@endsection

@section('footer')
@parent

@include('layout_user.footer')
@endsection