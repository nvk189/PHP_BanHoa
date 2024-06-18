@extends('layout_user')

@section('title', 'bán hoa')



@section('header')
@parent
@include('layout_user.header')

@endsection

@section('content')
@parent
<link rel="stylesheet" href="{{asset('user/assets/css/detail.css')}}">
<main>
    <div class="detail">
        <div name="listdetail" class=" grid wide" style="display: flex;">
            <div class="list-sp l-6 ">
                <div class="grid detail-item">
                    <img class="detail-img" src="{{ asset('user/assets/img/' . $data->pr_image) }}" alt="">
                </div>
            </div>
            <div class="l-6 ">
                <div class="detail-price grid">
                    <div class="detail-price-content">

                        <h3 class="detail-name"> {{ $data->pr_name}}</h3>
                        <div class="detail-money" style="display: flex;">

                            @if($data->pr_sales)
                            <h4 class="detail-moneys">{{ number_format( $data->pr_sales, 0, ',', '.') }}<span>VND</span></h4>
                            <h4 class="detail-moneys" style="text-decoration: line-through;color: #000;opacity: 0.6; padding-left: 15px; font-weight: 200;">{{ number_format( $data->pr_price, 0, ',', '.') }}VND</h4>
                            @else
                            <h4 class="detail-moneys">{{ number_format( $data->pr_price, 0, ',', '.') }}<span>VND</span></h4>
                            @endif
                        </div>

                    </div>

                    <div class="detail-sale">
                        <div class="detali-sale-item">
                            <div class="price-sale">

                                <h3 class="price-sale-name">Khuyến mãi:</h3>
                                <span class="price-sale-item">Giảm 50K</span>
                                <span class="price-sale-item">Giảm 25K</span>
                                <span class="price-sale-item">Giảm 10%</span>
                            </div>
                            <div class="list-sale">
                                <ul class=" sale-class">
                                    <li class=" item-sale">
                                        <span class="item-sale-price">
                                            FC50
                                        </span>
                                        <div class="new-sale">
                                            <span class="price-sale-item">Giảm 50K</span>

                                            <p>Giảm 50K cho đơn hàng từ 600K (Chỉ áp dụng cho khách hàng mới. Không áp dụng đồng thời cho các sản phẩm đã giảm giá).</p>
                                        </div>
                                    </li>
                                    <li class=" item-sale">
                                        <span class="item-sale-price">
                                            FC25
                                        </span>
                                        <div class="new-sale">
                                            <span class="price-sale-item">Giảm 25K</span>
                                            <p>Giảm 25K cho tất cả đơn hàng (Chỉ áp dụng cho khách hàng mới. Không áp dụng đồng thời cho các sản phẩm đã giảm giá).</p>
                                        </div>
                                    </li>
                                    <li class=" item-sale">
                                        <span class="item-sale-price-1 item-sale-price">
                                            T6VUIVE
                                        </span>
                                        <div class="new-sale">

                                            <span class="price-sale-item">Giảm 10%</span>
                                            <p>Giảm 10% cho tất cả đơn hàng khi đặt hoa vào thứ 6 hàng tuần (Không áp dụng đồng thời cho các sản phẩm đã giảm giá).</p>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="hotline" style="display: flex;">
                        <h3 class="price-sale-name">Gọi ngay:</h3>
                        <span class="phone-number">1900 633 045</span>
                    </div>

                    <div class="hotline" style="display: flex;">
                        <h3 class="price-sale-name">Chat ngay :</h3>
                        <i style="color: blue;" class="fa-brands fa-facebook-messenger icon-detail"></i>
                        <i style="color: blue;" class="fa-brands fa-facebook-messenger icon-detail"></i>
                        <i style="color: blue;" class="fa-brands fa-facebook-messenger icon-detail"></i>
                        <i style="color: blue;" class="fa-brands fa-facebook-messenger icon-detail"></i>
                    </div>

                    <div class="hotline" style="display: flex;">
                        <h3 class="price-sale-name">Vận chuyển:</h3>
                        <span class="text-ship">Miễn phí giao hoa khu vực nội thành TP.HCM & Hà Nội</span>
                    </div>

                    <div class="address">
                        <div class="l-6">
                            <input class=" address-item" type="text" placeholder="Nhập thành phố">
                        </div>
                        <div class="l-6">
                            <input class=" address-item" type="text" placeholder="Nhập địa chỉ">
                        </div>


                    </div>
                    <i class="tag-ship"> Phí giao hàng miễn phí khu vực Hà Nội và TP.Hồ Chí Minh</i>
                    <div class="btn" style="margin-top: 30px;">
                        <form action="{{ url('cart', ['pr_id' => $data->pr_id]) }} }}" method="get">

                            <input name="quantity" type="number" placeholder="Số lượng" class="number-item" min="1" value="1" style="text-align: center; width: 80px;">
                            <button class="order order-color1"> Thêm vào giỏ hàng</button>
                        </form>

                    </div>

                    <div class="gift">
                        <div class="gift-item l-6">
                            <img class="gift-icon" src="https://www.flowercorner.vn/image/icon/60mins.png" alt="">
                            <span class="gift-text">Giao hoa NHANH trong 60 phút</span>
                        </div>
                        <div class="gift-item l-6">
                            <img class="gift-icon" src="https://www.flowercorner.vn/image/icon/freegifts.png" alt="">
                            <span class="gift-text">Tặng miễn phí thiệp hoặc banner</span>
                        </div>
                    </div>


                </div>
            </div>

        </div>

        <div class="content-product ">
            <div class="content-product-list grid wide">
                <div class="content-product-name">
                    <span class="content-name">
                        Mô tả sản phẩm
                    </span>
                    <br>
                    <br>
                    <br>

                    <span>
                        Hoa baby trắng tượng trưng cho tình yêu tinh khiết, sự trong trắng, mỏng manh, thanh tao như chính vẻ ngoài của hoa mang lại. Kết hợp với 5 bông hồng kem càng mang lại sự tinh khiết cho mối tình của bạn.

                        <br>
                        Bó hoa Endless Love được thiết kế từ
                        <br>
                        -Hoa hồng kem: 5 cành
                        <br>
                        -Hoa baby trắng: 100gram
                        <br>
                        -Các loại hoa lá phụ: Cỏ lan chi, lá bạc
                        <br>
                        *Lưu ý
                        <br>
                        **Do được làm thủ công, nên sản phẩm ngoài thực tế sẽ có đôi chút khác biệt so với hình ảnh trên website. Tuy nhiên, Flowercorner cam kết hoa sẽ giống khoảng 80% so với hình ảnh.
                        <br>
                        ** Vì các loại hoa lá phụ sẽ có tùy vào thời điểm trong năm, Flowercorner đảm bảo các loại hoa chính, các loại hoa lá phụ sẽ thay đổi phù hợp giá cả và thiết kế sản phẩm.
                    </span>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="product-list ">
            <div class="grid wide">

                <h3 class="detail-name"> Sản phẩm liên quan</h3>
                <div class="flower-item  row grid wide">
                    @foreach($type as $tp)

                    <div class="flower-items  col l-3 m-4 c-6">

                        <div class="img-flower">
                            <img class="img" src="{{  asset('user/assets/img/' . $tp->pr_image)}}" alt="">
                        </div>
                        <div class="text-flower">
                            <p class="name-flower"> {{ $tp->pr_name}}</p>
                            <div class="" style="display: flex; justify-content: center;align-items: center;">

                                @if($tp->pr_sales)
                                <span class="price-sale"> {{ number_format($tp->pr_sales, 0, ',', '.') }} VND</span>
                                <span class="price"> {{ number_format($tp->pr_price, 0, ',', '.') }} VND</span>
                                @else
                                <span class="price-sale">{{ number_format($tp->pr_price, 0, ',', '.') }} VND</span>
                                @endif
                            </div>
                        </div>
                        <div class="sub-item">
                            <a href="{{ url("home/product/{$tp->pr_id}") }}">
                                Đặt hàng
                            </a>
                            <a style="background-color: blue;" href="{{ url('cart', ['pr_id' => $tp->pr_id]) }}">
                                + giỏ hàng
                            </a>

                        </div>
                        @if($tp->pr_sales)
                        <div class="number_sales">
                            {{ number_format(100 - ($tp->pr_sales / $tp->pr_price) * 100) }}%
                        </div>
                        @endif
                    </div>
                    @endforeach
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