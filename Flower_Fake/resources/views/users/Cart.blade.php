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
    <div class="grid wide">
        <div class="c-12">
            <table>
                <thead>
                    <tr>

                        <td>Hình ảnh</td>
                        <td>Tên sản phẩm </td>
                        <td>Số lượng</td>
                        <td>Giá tiền</td>



                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->item as $item)
                    <tr>

                        <td>
                            <img src="{{ asset('user/assets/img/' . $item->pr_image) }}" alt="" style="height: 80px; width: 80px;">
                        </td>
                        <td style="color: #e91e63;">{{ $item->pr_name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->pr_id)}}" method="get">

                                <input name="quantity" style="font-size: 16px; width: 50px; text-align: center;" type="number" value="{{ $item->quantity }}" min="1">
                                <button type=" submit" style="border:none">

                                    <i class="fa-solid fa-rotate" style="padding: 5px; background-color: green; color: #fff; border-radius: 2px;"></i>
                                </button>
                                <a href="{{ route('cart.delete', $item->pr_id )}}">

                                    <i class="fa-solid fa-trash-can" style="background-color: #e91e63; border-radius: 2px; font-size: 16px; padding: 5px; cursor: pointer; color: #fff;"></i>
                                </a>
                            </form>

                        </td>
                        <td>
                            {{ number_format( $item->pr_price, 0, ',', '.') }} VND
                        </td>

                    </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <p style="float: right;">Tổng cộng :</p>
                        </td>
                        <td>{{ number_format($cart->totalPrice, 0, ',', '.') }}VND</td>

                    </tr>
                </tfoot>
            </table>

        </div>
        <div class="grid wide" style="margin-top: 20px;">
            <div class="c-12">
                <div class="" style="display: flex; justify-content: space-between;">


                    @if($cart->totalQuantity >0 )
                    <div style="width: 170px; height: 40px; background-color: #ccc; cursor: pointer; border-radius: 5px; ">
                        <a href="/home" style="text-decoration: none;">

                            <p style="text-align: center; padding: 10px 0; color: #000;opacity: 0.6; font-size: 16px;">
                                Tiếp tục mua sắm
                            </p>
                        </a>
                    </div>
                    <div style="width: 120px; height: 40px; background-color: #e91e63; cursor: pointer;border-radius: 5px;  ">
                        <a href="order/create" style="text-decoration: none;">

                            <p style="text-align: center; padding: 10px 0; color: #fff; font-size: 16px;">
                                Thanh toán
                            </p>
                        </a>
                    </div>
                    @else
                    <h2> Giỏ hàng trống ,vui lòng chọn sản phẩm</h2>
                    <div style="width: 170px; height: 40px; background-color: #ccc; cursor: pointer; border-radius: 5px; ">
                        <a href="/home" style="text-decoration: none;">

                            <p style="text-align: center; padding: 10px 0; color: #000;opacity: 0.6; font-size: 16px;">
                                Tiếp tục mua sắm
                            </p>
                        </a>
                    </div>
                    @endif
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