@extends('layouts.frontend')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <!-- 左側欄位：分類列表 -->
                <div class="col-sm-3">
                    @include('frontend.partials.categories')
                </div>

                <!-- 右側欄位：商品詳情 -->
                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--商品詳情-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{ asset('storage/' . $mainImage->image_path) }}" alt="{{ $product->name }}"
                                    id="mainImage" />
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">
                                <!-- 幻燈片包裝器 -->
                                <div class="carousel-inner">
                                    @foreach ($images->chunk(3) as $index => $chunk)
                                        <div class="item {{ $index == 0 ? 'active' : '' }}">
                                            <div class="row">
                                                @foreach ($chunk as $image)
                                                    <div class="col-xs-4">
                                                        <a href="javascript:void(0);"
                                                            onclick="changeMainImage('{{ asset('storage/' . $image->image_path) }}')">
                                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                                alt="{{ $product->name }}" class="img-responsive">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- 控制按鈕 -->
                                <a class="left item-control" href="#similar-product" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a class="right item-control" href="#similar-product" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--商品資訊-->
                                <img src="{{ asset('frontend/images/product-details/new.jpg') }}" class="newarrival"
                                    alt="" />
                                <h2>{{ $product->name }}</h2>
                                <p>網站編號: 1089772</p>
                                <img src="{{ asset('frontend/images/product-details/rating.png') }}" alt="" />
                                <span>
                                    <span>${{ $product->price }}</span>
                                    <label>數量:</label>
                                    <input type="number" value="1" />
                                    <button type="button" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        加入購物車
                                    </button>
                                </span>
                                <p><b>庫存狀態:</b> 有貨</p>
                                <p><b>商品狀態:</b> 全新</p>
                                <p><b>品牌:</b> E-SHOPPER</p>
                                <a href=""><img src="{{ asset('frontend/images/product-details/share.png') }}"
                                        class="share img-responsive" alt="" /></a>
                            </div><!--/商品資訊-->
                        </div>
                    </div><!--/商品詳情-->

                    <div class="category-tab shop-details-tab"><!--分類標籤-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#details" data-toggle="tab">詳細資訊</a></li>
                                {{-- <li><a href="#companyprofile" data-toggle="tab">公司簡介</a></li> --}}
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="details">
                                {!! $product->description !!}
                            </div>

                            <div class="tab-pane fade" id="companyprofile">
                                <div class="col-sm-12">
                                    公司簡介
                                </div>
                            </div>

                        </div>
                    </div><!--/分類標籤-->

                    {{-- <div class="recommended_items"><!--推薦商品-->
                        <h2 class="title text-center">推薦商品</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend1.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend2.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="images/home/recommend3.jpg" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                                data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div><!--/推薦商品--> --}}

                </div>
            </div>
        </div>
    </section>

    <!-- 在頁面底部添加以下JavaScript代碼 -->
    <script>
        function changeMainImage(imagePath) {
            document.getElementById('mainImage').src = imagePath;
        }

        // 圖片放大功能
        document.getElementById('mainImage').addEventListener('click', function() {
            this.requestFullscreen();
        });

        // 初始化輪播圖
        $(document).ready(function() {
            $('#similar-product').carousel({
                interval: false // 禁用自動輪播
            });
        });
    </script>
@endsection
