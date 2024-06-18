@extends('layout_user')

@section('title', 'trang chủ')



@section('header')
@parent
@include('layout_user.header')

@endsection

@section('content')
@parent
<main>
    <div class="common-home ">
        <div class="common-slider">
            <div class="img-slider">
                <div class="list-slider ">
                    <div class="slider-item ">

                        <a href="" class="link-slider">

                            <img class="home-slider" src="{{ asset('user/assets/img/slider-1.webp')}}" alt="ảnh quảng cáo">
                        </a>
                    </div>

                    <div class="slider-item">

                        <a href="" class="link-slider">

                            <img class="home-slider" src="{{ asset('user/assets/img/slider-2.webp')}}" alt="ảnh quảng cáo">
                        </a>
                    </div>

                    <div class="slider-item">

                        <a href="" class="link-slider">

                            <img class="home-slider" src="{{ asset('user/assets/img/slider-3.webp')}}" alt="ảnh quảng cáo">
                        </a>
                    </div>

                    <div class="slider-item">

                        <a href="" class="link-slider">

                            <img class="home-slider" src="{{ asset('user/assets/img/slider-4.webp')}}" alt="ảnh quảng cáo">
                        </a>
                    </div>

                    <div class="button-slider">


                        <span class="fa-solid fa-chevron-left button-left"></span>


                        <span class="fa-solid fa-chevron-right button-right"></span>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flower grid wide ">
        <div class="flower-list ">
            <h2 class="text-item ">Sản phẩm mới</h2>

            <div class="flower-item  row grid wide">

                @foreach($new as $new)
                <div class="flower-items  col l-3 m-4 c-6">

                    <div class="img-flower">
                        <img class="img" src="{{ asset('user/assets/img/' . $new->pr_image) }}" alt="">
                    </div>
                    <div class="text-flower">
                        <p class="name-flower">{{ $new->pr_name }}</p>
                        @if($new->pr_sales)
                        <span class="price-sale">{{ number_format($new->pr_sales , 0, ',', '.') }} VND</span>
                        <span class="price">{{ number_format( $new->pr_price, 0, ',', '.') }} VND</span>
                        @else
                        <span class="price-sale">{{ number_format($new->pr_price , 0, ',', '.') }} VND</span>
                        @endif
                    </div>
                    <div class="sub-item">
                        <a href="{{ url("home/product/{$new->pr_id}") }}">
                            Đặt hàng
                        </a>
                        <a style="background-color: blue;" href="{{ url('cart', ['pr_id' => $new->pr_id]) }} }}">
                            + giỏ hàng
                        </a>


                    </div>
                    @if( $new->pr_sales)
                    <div class="number_sales">
                        {{ 100- ( $new->pr_sales/ $new->pr_price)*100 }}%
                    </div>
                    @endif


                </div>
                @endforeach


            </div>
        </div>
        <div class="flower-list ">
            <h2 class="text-item ">đang giảm giá</h2>

            <div class="flower-item  row grid wide">

                @foreach($sales as $hs)
                <div class="flower-items  col l-3 m-4 c-6">

                    <div class="img-flower">
                        <img class="img" src="{{ asset('user/assets/img/' . $hs->pr_image) }}" alt="">
                    </div>
                    <div class="text-flower">
                        <p class="name-flower">{{ $hs->pr_name }}</p>
                        @if($hs->pr_sales)
                        <span class="price-sale">{{ number_format($hs->pr_sales , 0, ',', '.') }} VND</span>
                        <span class="price">{{ number_format( $hs->pr_price, 0, ',', '.') }} VND</span>
                        @else
                        <span class="price-sale">{{ number_format($hs->pr_price , 0, ',', '.') }} VND</span>
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
                    <div class="number_sales">
                        {{ number_format(100 - ($hs->pr_sales / $hs->pr_price) * 100) }}%
                    </div>
                    @endif


                </div>
                @endforeach


            </div>
        </div>



    </div>

    </div>

    <div class="three-sp__list grid wide row" style="margin-top: 25px ; margin-bottom: 50px ;">
        <div class="l-4 m-4 c-4 ">
            <div class="three-sp-icon">

                <img class="sp-icon" src="https://www.flowercorner.vn/image/catalog/common/featured-icon/3.png.webp" alt="">
                <h3>FREE SHIPPING</h3>
                <span class="text-sp">Flower Corner giao miễn phí các nội thành TP.HCM
                    đối với tất cả bó hoa, lẵng hoa, và kệ hoa trên 1 triệu.
                </span>
            </div>
        </div>
        <div class="l-4 m-4 c-4">
            <div class="three-sp-icon">

                <img class="sp-icon" src="https://www.flowercorner.vn/image/catalog/common/featured-icon/2.png.webp" alt="">
                <h3>GIAO NHANH TRONG 90 PHÚT</h3>
                <span class="text-sp">Flower Corner có thể giao nhanh trong 90' khu vực
                    nội thành TP.HCM với bó / lẵng hoa đơn giản.
                </span>
            </div>
        </div>
        <div class="l-4 m-4 c-4">
            <div class="three-sp-icon">

                <img class="sp-icon" src="https://www.flowercorner.vn/image/catalog/common/featured-icon/1.png.webp" alt="">
                <h3>HOA ĐẸP NHƯ HÌNH</h3>
                <span class="text-sp">Cam kết hoa đẹp như hình và giống đến 90% so với hình chụp trên website.
                </span>
            </div>
        </div>
    </div>



    </div>

    </div>


    <div class="flower grid wide ">
        <div class="flower-list ">
            <h2 class="text-item text-item-custom"> khách hàng tiêu biểu</h2>

            <div class="flower-custom-vip row">
                <div class="flower-custom-icon">

                </div>
            </div>

        </div>

    </div>

    <!-- giới thiệu về shop -->
    <div class=" grid wide ">
        <h2 class="text-item text-item-custom "> Shop Hoa Tươi FlowerCorner.vn</h2>
        <div class="shop-pa">
            <div class="l-6 content-pa">
                <h3 class="text-content-pa  ">Giới Thiệu Về FlowerCorner.vn</h3>
                <span class="text-content-list"><span class="text-content-1">shop hoa tươi </span>FlowerCorner.vn là một trong những tiệm hoa tươi uy tín nhất tại TP HCM, Việt Nam. FlowerCorner.vn cung cấp dịch vụ đặt hoa online giao tận nơi tại TP HCM, Hà Nội và trên tất cả các tỉnh – thành phố tại Việt Nam. Với hệ thống cửa hàng hoa tươi liên kết rộng khắp tất cả các tỉnh – thành phố trên toàn quốc, FlowerCorner.vn có thể giúp bạn gửi tặng hoa tươi cho người thân ở bất cứ nơi đâu tại Việt Nam. FlowerCorner cam kết mang đến cho bạn những sản phẩm hoa tươi chất lượng cao, với mức giá tốt nhất và dịch chuyên nghiệp nhất khi sử dụng dịch vụ đặt hoa tươi online giao tận nơi tại Flowercorner.vn.</span>
                <div class="video-shop-pa">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/slv6L1Bzk14?si=b3J5QPLl8er18aW2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="l-6 content-pa">
                <br>
                <br>
                <span class="text-content-list">Shop hoa tươi FlowerCorner Được thành lập từ năm 2017 với mục tiêu mang đến cho khách hàng trải nghiệm tuyệt vời về một dịch vụ </span>
                <strong>đặt hoa online</strong>
                <span class="text-content-list">

                    chuyên nghiệp. Sau hơn 5 năm hoạt động, cửa hàng hoa tươi FlowerCorner đã giúp hàng chục ngàn khách hàng gửi tặng những bó hoa tươi đẹp và đầy ý nghĩa đến những người thân yêu trong tất cả những dịp đặc biệt trong năm.
                </span>
                <br>
                <h3 class=" text-content-pa text-hotship ">Đặt hoa online giá tốt – Giao nhanh trong 90p</h3>

                <span class="text-content-list">
                    Nếu bạn đang tìm kiếm một trang website đặt hoa online giao tận nơi thì flowercorner.vn là một sự lựa chọn tuyệt vời dành cho bạn. Tại shop hoa tươi FlowerCorner, bạn có thể dễ dàng lựa chọn một mẫu hoa đẹp, ý nghĩa giữa hàng trăm mẫu hoa được thiết kế sẵn để gửi tặng người thân, bạn bè, đối tác trong tất cả các dịp đặc biệt trong năm hay trong những sự kiện như: khai trương, sinh nhật, lễ cưới, lễ tang…
                </span>
                <br>
                <br>
                <span class="text-content-list">
                    Ngoài những mẫu hoa có sẵn trên website, shop hoa tươi Flower Corner cũng nhận thiết kế hoa tươi theo yêu cầu với mọi mức giá để đáp ứng mọi nhu cầu của khách hàng. Nhờ thế, việc đặt hoa online tại Flower Corner trở nên nhanh chóng, dễ dàng và đơn giản hơn.
                </span>
                <br>
                <br>
                <span class="text-content-list">
                    Đặc biệt, với dịch vụ giao hoa nhanh trong 90 phút, shop hoa tươi FlowerCorner sẽ giúp bạn kịp thời gửi tặng một bó hoa tới người thân, bạn bè nếu như bạn cần đặt gấp trong ngày.
                </span>
            </div>

        </div>

        <br>
        <div class="shop-pa-2">

            <div class="l-6 content-pa">
                <h3 class="text-content-pa  ">Đặt Hoa Online – Ưu Đãi Hấp Dẫn</h3>
                <div class="img-shop-pa">
                    <img class="img-sale" src="https://8384f55340.vws.vegacdn.vn/image/catalog/New_Dec/dat-hoa-online-tai-shop-hoa-tuoi-flowercorner.jpg" alt="ảnh khuyến mãi">
                </div>
                <br>
                <span class="text-content-list">
                    Khi đặt hoa online tại shop hoa tươi FlowerCorner, bạn không chỉ được miễn phí giao hàng trong khu vực nội thành TP HCM, tặng kèm thiệp chúc mừng, mà còn được giảm đến 50k cho đơn hàng đầu tiên. Bên cạnh đó, vào mỗi thứ 6 hàng tuần, bạn cũng sẽ được giảm ngay 10% tối đa lên đến 100k với chương trình ưu đãi Thứ 6 vui vẻ. Đặc biệt, những khách hàng cũ cũng sẽ được giảm giá lên đến 10% cho các đơn hàng tiếp theo.
                </span>
                <br>
                <br>
                <h3 class="text-content-pa  ">Đặt Hoa Online mọi lúc, mọi nơi</h3>

                <span class="text-content-list">
                    Ưu điểm của tiệm hoa FlowerCorner đó là cho phép bạn đặt hoa tươi gửi tặng người thân dù bạn đang ở bất cứ nơi đâu, vào bất cứ thời điểm nào chỉ với vài thao tác đơn giản ngay trên website flowercorne.vn hoặc trên ứng dụng Flower Corner.
                </span>
                <br>
                <br>
                <span class="text-content-list">
                    Nếu bạn đang phân vân không biết nên lựa chọn loài hoa nào để phù hợp cho từng sự kiện, bạn có thể chat ngay với các nhân viên tư vấn của Flower Corner để được tư vấn lựa chọn mẫu hoa phù hợp nhất.

                </span>

                <h3 class="text-content-pa  ">
                    <h3 class="text-content-pa  ">Đặt hoa đơn giản, thanh toán dễ dàng</h3>

                    <span class="text-content-list">
                        Với shop hoa tươi Flower Corner, thay vì mất hàng giờ chạy xe lòng vòng qua các shop hoa tươi gần đây, thì bạn chỉ cần ngồi một chỗ và thực hiện vài thao tác đơn giản trên ứng dụng hoặc website là đã có ngay một mẫu hoa thật đẹp để tặng vợ, bạn gái, người thân hay đối tác. Nếu vẫn cảm thấy chưa yên tâm về chất lượng hoa, bạn có thể yêu cầu nhân viên của FlowerCorner chụp và gửi hình hoa để duyệt trước khi giao.
                    </span>
                    <br>
                    <br>
                    <span class="text-content-list">
                        Shop hoa FlowerCorner cung cấp cho bạn nhiều lựa chọn về phương thức thanh toán từ: COD, chuyển khoản ngân hàng, thanh toán qua thẻ visa, master card, Paypal… để bạn có thể dễ dàng đặt hoa mà không gặp phải bất cứ trở ngại nào.

                    </span>


            </div>

            <div class="l-6 content-pa">

                <h3 class="text-content-pa  ">Danh mục sản phẩm của FlowerCorner</h3>

                <span class="text-content-list">
                    Đến với cửa hàng hoa FlowerCorner, bạn có thể thoải mái lựa chọn giữa hơn 500+ mẫu hoa tươi được thiết kế sẵn theo các chủ đề như:
                </span>
                <ul class="list-content-text">
                    <li><a href="https://www.flowercorner.vn/hoa-chuc-mung-sinh-nhat"><strong class="color-text">Hoa sinh nhật</strong></a>: Hoa tặng sinh nhật vợ, bạn gái, ba mẹ, anh chị, bạn bè, đối tác hay đồng nghiệp.</li>
                    <li><a href="https://www.flowercorner.vn/hoa-khai-truong"><strong class="color-text">Hoa khai trương</strong></a>: hoa chúc mừng khai trương cửa hàng, công ty.</li>
                    <li><strong><a class="color-text" href="https://www.flowercorner.vn/hoa-cuoi-cam-tay">Hoa cưới</a></strong>: hoa cầm tay cô dâu, hoa cài áo chú rể..</li>
                    <li><a href="https://www.flowercorner.vn/hoa-tang-tot-nghiep"><strong class="color-text">Hoa tốt nghiệp</strong></a>: hoa tặng bạn bè, người thân trong lễ tốt nghiệp.</li>
                    <li><a href="https://www.flowercorner.vn/hoa-tang-le"><strong class="color-text">Hoa tang lễ</strong></a>: hoa chia buồn để gửi tới các đám tang.</li>
                    <li><a href="https://www.flowercorner.vn/hoa-chuc-mung"><strong class="color-text">Hoa chúc mừng</strong></a> các dịp đặc biệt: Valentine, ngày của mẹ, ngày của cha, ngày quốc tế phụ nữ 8-3, ngày nhà giáo Việt Nam 20/11….</li>
                </ul>

                <br>
                <br>
                <span class="text-content-list">
                    Đặc biệt, ngoài những mẫu hoa được thiết kế từ các loài hoa trong nước, shop hoa tươi FlowerCorner cũng cung cấp các mẫu hoa nhập khẩu cao cấp, sang trọng.
                </span>
                <br>
                <br>
                <h3 class="text-content-pa  ">Tại sao nên chọn shop hoa FlowerCorner</h3>
                <br>
                <span class="text-content-list">
                    Không khó để bạn tìm được một cửa hàng hoa cung cấp dịch vụ đặt hoa online giao tận nơi. Vậy tại sao bạn nên sử dụng dịch vụ điện hoa (Flower Delivery) của shop hoa tươi Flower Corner?
                </span>
                <ul class="list-content-text">
                    <li>Hoa đẹp, thiết kế đa dạng phù hợp với tất cả sự kiện.</li>
                    <li>Thiết kế theo yêu cầu của khách hàng.</li>
                    <li>Gửi hình hoa trước khi giao.</li>
                    <li>Đội ngũ florists chuyên nghiệp với nhiều năm kinh nghiệm.</li>
                </ul>
                <br>

                <h3 class="text-content-pa  ">Cam kết từ shop hoa tươi Flower Corner</h3>

                <span class="text-content-list">
                    Không khó để bạn tìm được một cửa hàng hoa cung cấp dịch vụ đặt hoa online giao tận nơi. Vậy tại sao bạn nên sử dụng dịch vụ điện hoa (Flower Delivery) của shop hoa tươi Flower Corner?
                </span>
                <ul class="list-content-text">
                    <li>Hoa đẹp, thiết kế đa dạng phù hợp với tất cả sự kiện.</li>
                    <li>Thiết kế theo yêu cầu của khách hàng.</li>
                    <li>Gửi hình hoa trước khi giao.</li>
                    <li>Đội ngũ florists chuyên nghiệp với nhiều năm kinh nghiệm.</li>
                </ul>
                <br>
                <span class="text-content-list">
                    Nếu bạn đang cần đặt hoa để gửi tặng người thân trong những dịp đặc biệt, gọi ngay 1900 633 045 để được tư vấn hoặc đặt hoa giao nhanh với shop hoa tươi FlowerCorner!
                </span>
            </div>
        </div>

    </div>
</main>

@endsection

@section('footer')
@parent

@include('layout_user.footer')
@endsection