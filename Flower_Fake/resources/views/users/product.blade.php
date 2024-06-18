@extends('layout_user')

@section('title', 'bán hoa')



@section('header')
@parent
@include('layout_user.header')

@endsection

@section('content')
@parent

<link rel="stylesheet" href="{{asset('user/assets/css/product.css')}}">
<link rel="stylesheet" href="{{asset('user/assets/css/Cart.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




<main>
    <div class="list-product">
        <div class="grid wide product-list-item">
            <h1>

                <span class="text-product">Danh sách sản phẩm</span>
            </h1>
            <div class="menu-list-product" style="margin-bottom: 50px;">
                <div class=" icon-menu-list">
                    <i class="fa-solid fa-table-cells"></i>
                </div>
                <div class="page-list">

                    <div class="number-text">
                        <label for="">Sắp xếp theo</label>
                        <select id="input-sort" class="form-select">
                            <option value="">Giá (Thấp -> Cao)</option>
                            <option value="">Giá (Cao -> Thấp)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flower grid wide ">
                <div class="flower-list ">


                    <div class="flower-list row">
                        @foreach($home as $hs)
                        <div class="flower-items col-lg-3 col-md-4 col-sm-6">

                            <div class="img-flower">
                                <img class="img" src="{{ asset('user/assets/img/' . $hs->pr_image) }}" alt="">
                            </div>
                            <div class="text-flower">
                                <p class="name-flower">{{ $hs->pr_name }}</p>
                                @if($hs->pr_sales)
                                <span class="price-sale">{{ number_format($hs->pr_sales , 0, ',', '.') }} VND</span>
                                <span class="price">{{ number_format( $hs->pr_price, 0, ',', '.') }}VND </span>
                                @else
                                <span class="price-sale">{{ number_format( $hs->pr_price, 0, ',', '.')}}VND </span>
                                @endif

                            </div>
                            <div class="sub-item">
                                <a href="{{ url("home/product/{$hs->pr_id}") }}">
                                    Đặt hàng
                                </a>
                                <a style="background-color: blue;" href="{{ url('cart', ['pr_id' => $hs->pr_id]) }} }}">
                                    + giỏ hàng
                                </a>
                            </div>
                            @if( $hs->pr_sales)
                            <div class="number_sales ">
                                {{ number_format(100 - ($hs->pr_sales / $hs->pr_price) * 100) }}%
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <div class="box-right">
                        <div class="pagination justify-content-center" style="text-align: center;">
                            {{ $home->links('pagination::bootstrap-4') }}
                        </div>
                    </div>


                    <script>
                        function redirectToSelectedOption() {
                            var selectedOption = document.getElementById("input-sort").value;
                            window.location.href = selectedOption;
                        }
                    </script>
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