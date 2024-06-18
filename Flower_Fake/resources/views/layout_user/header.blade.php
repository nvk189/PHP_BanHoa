<header>



    <nav id="top">
        <div class="container grid wide  ">
            <div class="nav float-start">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <span>

                            HOTLINE:
                        </span>
                        <a href="tel:1900633045">1900 633 045</a>
                        |
                        <a href="tel:0865 160 360">0865 160 360</a>
                    </li>
                </ul>
            </div>

            <div class="nav float-end">
                <ul class="list-inline">
                    <li class="list-inline-item list-item-login">
                        <div class="dropdown">
                            <a href="./account.html" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-user"></i>
                                <span class="d-none d-md-inline">Tài khoản</span>
                                <i class="fa-solid fa-caret-down"></i>
                            </a>
                            @if(isset($user))
                            <ul id="home" class="menu-login">
                                <li><a href="{{ url('user/register') }}" class="dropdown-item">Đăng ký</a></li>
                                <li><a href="{{ route('login') }}" class="dropdown-item">Đăng nhập</a></li>
                            </ul>
                            @else
                            <ul id="home_user" class="menu-login">
                                <li><a href="/html/account.html" class="dropdown-item">Tài Khoản</a></li>
                                <li><a href="/user/logout" class="dropdown-item">Đăng xuất</a></li>
                            </ul>
                            @endif
                        </div>
                    </li>
                    <li class="list-inline-item"><a href="/cart" title="Giỏ hàng"><i class="fa-solid fa-bag-shopping"></i> <span class="d-none d-md-inline">Giỏ hàng</span></a></li>
                    <li class="list-inline-item"><a href="./Cart.html" title="Thanh toán"><i class="fa-solid fa-share"></i> <span class="d-none d-md-inline">Thanh toán</span></a></li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- header-logo -->
    <div class="header-logo">
        <div class="header-logo__container grid wide">
            <div class="header-logo__list">
                <div class="logo-list__one">
                    <div class="logo-list-icon">
                        <a href="" class="icon__search icon__search-face">

                            <i class="fa-brands fa-facebook" style="color: #3b5998;"></i>

                        </a>
                        <a href="" class="icon__search icon__search-twiter">

                            <i class="fa-brands fa-twitter" style="color: #38A1F3;"></i>
                        </a>
                        <a href="" class="icon__search icon__search-ins">

                            <i class="fa-brands fa-instagram" style="color: #cd486b;"></i>
                        </a>
                    </div>
                </div>
                <div class="logo-list__two">
                    <a class="link-logo__two" href="/home" style="display: inline-block;">
                        <img class="logo" src="https://www.flowercorner.vn/image/catalog/common/shop-hoa-tuoi-flowercorner-logo.png.webp" alt="Logo cửa hàng">
                    </a>
                </div>

                <div class="logo-list__three">
                    <div class="logo-list-right">

                        <form action="{{route('getcart')}}" method="get">

                            <div class="list-three__left">
                                <input name="keyword" class="text-search" type="text" placeholder="Tìm kiếm">
                                <button type="submit" href="" style="display: inline-block; border:none;cursor: pointer;">
                                    <i class="fa-solid fa-magnifying-glass icon-search"></i>
                                </button>

                            </div>
                        </form>
                        <div class="shopping-cart" ng-controller="Detail">

                            <a href="" class="link-icon-shopping" style="display: inline-block;">

                                <i class="fa-solid fa-bag-shopping icon-shopping"></i>
                            </a>

                            <div class="amount-shop">
                                <span class="about-shop">
                                    {{$cart->totalQuantity}}
                                </span>
                            </div>
                            <div class="list-cart">

                                <ul id="Cartsum" class="Cartsum" style="max-height:200px ;overflow-x: hidden;">
                                    @if($cart->totalQuantity)
                                    @foreach($cart->item as $item)
                                    <li class="name-cart" style="display: flex; justify-content: space-between; border-bottom: 1px solid #ccc;">
                                        <a href="" style="display: flex; justify-content: space-between; text-decoration: none; width: 100%;">
                                            <div style="width: 20%;">
                                                <img src="{{ asset('user/assets/img/' . $item->pr_image) }}" alt="" class="item-image">
                                            </div>
                                            <div style="display: flex; justify-content: center; align-items: center; width: 60%;">
                                                <p class="item-name">{{ $item->pr_name }}</p>
                                            </div>
                                            <div style="display: flex; justify-content: center; align-items: center; width: 20%;">
                                                <p class="item-quantity" style="color: #000;">{{ $item->quantity }}</p>x
                                                <p class="item-price" style="color: #000;">{{ number_format($item->pr_price, 0, ',', '.') }}</p>
                                            </div>
                                        </a>
                                        <div class="icon-delete" style="display: flex; justify-content: center; align-items: center;">
                                            <a href="{{ route('cart.delete', $item->pr_id )}}">
                                                <i class="fa-solid fa-trash-can" style="font-size: 16px; padding-right: 3px; cursor: pointer; color: #000;"></i>
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li class="Total-money">
                                        <div>
                                            <div style="display: flex; float: right; margin-right: 20px; margin-top: 20px;">
                                                <a href="/cart" style="text-decoration: none; font-size: 16px; color: #e91e63;">giỏ hàng</a>
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    <li class="name-cart" style="display: flex; justify-content: space-between; border-bottom: 1px solid #ccc;">
                                        <h3 style="text-align: center;">Giỏ hàng trống</h3>
                                    </li>
                                    <li class="Total-money">
                                        <div>
                                            <div style="display: flex; float: right; margin-right: 20px; margin-top: 20px;">
                                                <a href="/home" style="text-decoration: none; font-size: 16px; color: #e91e63;">Tiếp tục mua sắm</a>
                                            </div>
                                        </div>
                                    </li>
                                    @endif


                                </ul>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- main -->
    <div class="header-list">
        <div class="list-item">
            <div class="item-check">
                <ul class="list-item__check">
                    <li class="item-brithday  ">
                        <a href="{{route('getdanhmuc')}}" class="item-brithday-link">
                            HOA SINH NHẬT
                        </a>

                        <ul class="list-brithday-1 list-brithday">

                        </ul>
                    </li>

                    <li class="item-brithday">
                        <a href=" /product_user" class="item-brithday-link">
                            HOA KHAI TRƯƠNG
                        </a>

                        <ul class="  list-brithday list-brithday-2 ">

                        </ul>
                    </li>

                    <li class="item-brithday">
                        <a href=" /product_user" class="item-brithday-link">
                            CHỦ ĐỀ
                        </a>

                        <ul class="list-brithday list-brithday-3">

                        </ul>
                    </li>

                    <li class="item-brithday">
                        <a href=" /product_user" class="item-brithday-link">
                            THIẾT KẾ
                        </a>

                        <ul class="list-brithday list-brithday-4">


                        </ul>
                    </li>

                    <li class="item-brithday">
                        <a href=" /product_user" class="item-brithday-link">
                            HOA TƯƠI
                        </a>

                        <ul class="list-brithday list-brithday-5">

                        </ul>
                    </li>

                    <li class="item-brithday">
                        <a href=" /product_user" class="item-brithday-link">
                            QUÀ TẶNG
                        </a>

                        <ul class="list-brithday list-brithday-6">
                        </ul>
                    </li>

                    <li class="item-brithday">
                        <a href="/product_user" class="item-brithday-link">
                            HOA TƯƠI GIẢM GIÁ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-notice">
        <p class="header-notice__text">ĐẶT HOA ONLINE - GIAO MIỄN PHÍ TP HCM &amp; HÀ NỘI - GỌI NGAY 1900 633 045 HOẶC 0865 160 360</p>
    </div>

</header>