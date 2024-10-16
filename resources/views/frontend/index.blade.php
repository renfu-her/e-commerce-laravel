@extends('layouts.frontend')

@section('content')
    <section id="advertisement">
        <div class="container">
            <img src="{{ asset('frontend/images/shop/advertisement.jpg') }}" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <!-- 左邊欄位：分類列表 -->
                <div class="col-sm-3">
                    @include('frontend.partials.categories')
                </div>

                <!-- 右邊欄位：特色商品列表 -->
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">特色商品</h2>
                        @foreach ($products as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            @if ($product->images->first())
                                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                                    alt="{{ $product->name }}" style="cursor: pointer;"
                                                    onclick="window.location.href='{{ route('product.show', $product->id) }}'" />
                                            @else
                                                <img src="{{ asset('images/default-product.jpg') }}"
                                                    alt="{{ $product->name }}" style="cursor: pointer;"
                                                    onclick="window.location.href='{{ route('product.show', $product->id) }}'" />
                                            @endif
                                            <h2>${{ $product->price }}</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart">
                                                <i class="fa fa-shopping-cart"></i> 加入購物車
                                            </a>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#">
                                                    <i class="fa fa-plus-square"></i> 加入願望清單
                                                </a>
                                            </li>
                                            <li><a href="#">
                                                    <i class="fa fa-plus-square"></i> 加入比較清單
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
