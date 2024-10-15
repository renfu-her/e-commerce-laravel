<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('frontend/js/html5shiv.js') }}"></script>
    <script src="{{ asset('frontend/js/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="{{ asset('frontend/images/home/logo.png') }}"
                                    alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href=""><i class="fa fa-user"></i> 帳號</a></li>
                                <li><a href=""><i class="fa fa-star"></i> 願望清單</a></li>
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> 結帳</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> 購物車</a></li>
                                <li><a href="login.html"><i class="fa fa-lock"></i> 登入</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.html">首頁</a></li>
                                <li class="dropdown"><a href="#" class="active">商品<i
                                            class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html" class="active">商品列表</a></li>
                                        <li><a href="product-details.html">商品詳細</a></li>
                                        <li><a href="checkout.html">結帳</a></li>
                                        <li><a href="cart.html">購物車</a></li>
                                        <li><a href="login.html">登入</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Blog 部落格<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog 列表</a></li>
                                        <li><a href="blog-single.html">Blog 單頁</a></li>
                                    </ul>
                                </li>
                                <li><a href="404.html">404 頁面</a></li>
                                <li><a href="contact-us.html">聯絡我們</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="搜尋" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="advertisement">
        <div class="container">
            <img src="{{ asset('frontend/images/shop/advertisement.jpg') }}" alt="" />
        </div>
    </section>

    @yield('content')

    <footer id="footer"><!--Footer-->
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>服務</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">線上幫助</a></li>
                                <li><a href="">聯絡我們</a></li>
                                <li><a href="">訂單狀態</a></li>
                                <li><a href="">更改位置</a></li>
                                <li><a href="">常見問題</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>快速購物</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">T-Shirt</a></li>
                                <li><a href="">男裝</a></li>
                                <li><a href="">女裝</a></li>
                                <li><a href="">禮品卡</a></li>
                                <li><a href="">鞋子</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>政策</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">使用條款</a></li>
                                <li><a href="">隱私政策</a></li>
                                <li><a href="">退款政策</a></li>
                                <li><a href="">計費系統</a></li>
                                <li><a href="">票務系統</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>關於我們</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">公司資訊</a></li>
                                <li><a href="">職缺</a></li>
                                <li><a href="">門市位置</a></li>
                                <li><a href="">關係企業</a></li>
                                <li><a href="">版權</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>關於我們</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="你的電子郵件地址" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>獲取我們網站的最新更新，並保持更新...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-Shopper. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer><!--/Footer-->




    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
