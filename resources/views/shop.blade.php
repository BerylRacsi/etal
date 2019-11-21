@extends('master')

@section('navbar')

    <div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>
    
@endsection

@section('content')

    <!-- Product -->
    <section class="bg0 p-t-100 p-b-130">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex-w flex-sb-m m-b-52" style="border-top: 1px solid lightgrey; border-bottom: 1px solid lightgrey;">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                        Women
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                        Men
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".unisex">
                        Unisex
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".top">
                        Top
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bottom">
                        Bottom
                    </button>

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".accessories">
                        Accessories
                    </button>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl3 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl3 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                         Filter
                    </div>
                </div>
                

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        
                        {{-- SORT --}}
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-101 cl3 p-b-15">
                                Sort By
                            </div>

                            <ul id="ulSort">
                                <li class="p-b-6 liSort">
                                    <a href="javascript:void(0)" value="updated_at,asc" class="filter-link stext-106 trans-04 filter-link-active">
                                        Newness
                                    </a>
                                </li>

                                <li class="p-b-6 liSort">
                                    <a href="javascript:void(0)" value="updated_at,desc" class="filter-link stext-106 trans-04 ">
                                        Oldest
                                    </a>
                                </li>

                                <li class="p-b-6 liSort">
                                    <a href="javascript:void(0)" value="name,asc" class="filter-link stext-106 trans-04">
                                        Name: A to Z
                                    </a>
                                </li>

                                <li class="p-b-6 liSort">
                                    <a href="javascript:void(0)" value="name,desc" class="filter-link stext-106 trans-04">
                                        Name: Z to A
                                    </a>
                                </li>

                                <li class="p-b-6 liSort">
                                    <a href="javascript:void(0)" value="price,asc" class="filter-link stext-106 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>

                                <li class="p-b-6 liSort">
                                    <a href="javascript:void(0)" value="price,desc" class="filter-link stext-106 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>

                        {{-- PRICE --}}
                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-101 cl3 p-b-15">
                                Price
                            </div>

                            <ul id="ulPrice">
                                <li class="p-b-6 liPrice">
                                    <a href="javascript:void(0)" value="all" class="filter-link stext-106 trans-04 filter-link-active">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6 liPrice">
                                    <a href="javascript:void(0)" value="0,50000" class="filter-link stext-106 trans-04">
                                        Rp. 0.00 - Rp. 50.000
                                    </a>
                                </li>

                                <li class="p-b-6 liPrice">
                                    <a href="javascript:void(0)" value="50000,100000" class="filter-link stext-106 trans-04">
                                        Rp. 50.000 - Rp. 100.000
                                    </a>
                                </li>

                                <li class="p-b-6 liPrice">
                                    <a href="javascript:void(0)" value="100000,200000" class="filter-link stext-106 trans-04">
                                        Rp. 100.000 - Rp.200.000
                                    </a>
                                </li>

                                <li class="p-b-6 liPrice">
                                    <a href="javascript:void(0)" value="200000,500000" class="filter-link stext-106 trans-04">
                                        Rp. 200.000 - Rp. 500.000
                                    </a>
                                </li>

                                <li class="p-b-6 liPrice">
                                    <a href="javascript:void(0)" value="500000,10000000" class="filter-link stext-106 trans-04">
                                        Rp. 500.000+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        {{-- COLOR --}}
                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-101 cl3 p-b-15">
                                Color
                            </div>

                            <ul id="ulColor" style="-webkit-column-count: 2;-moz-column-count: 2; column-count: 2;">
                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: none;">
                                        <i class="zmdi zmdi-circle-o"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="all" class="filter-link stext-106 trans-04 filter-link-active">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Black" class="filter-link stext-106 trans-04">
                                        Black
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Blue" class="filter-link stext-106 trans-04 ">
                                        Blue
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Grey" class="filter-link stext-106 trans-04">
                                        Grey
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Green" class="filter-link stext-106 trans-04">
                                        Green
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: white;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="White" class="filter-link stext-106 trans-04">
                                        White
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Red" class="filter-link stext-106 trans-04">
                                        Red
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: orange;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Orange" class="filter-link stext-106 trans-04">
                                        Orange
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: yellow;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Yellow" class="filter-link stext-106 trans-04 ">
                                        Yellow
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: purple;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Purple" class="filter-link stext-106 trans-04">
                                        Purple
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: brown;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Brown" class="filter-link stext-106 trans-04">
                                        Brown
                                    </a>
                                </li>

                                <li class="p-b-6 liColor">
                                    <span class="fs-15 lh-12 m-r-6" style="color: pink;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="javascript:void(0)" value="Pink" class="filter-link stext-106 trans-04">
                                        Pink
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products -->
            <div class="row isotope-grid" id="myprod">

                @foreach($products as $product)

                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->gender}} {{$product->category}}">
                    <!-- Block2 -->
                    <div class="block2 border-button">
                        <div class="block2-pic hov-img0" >
                            <img src="{{asset($product->thumbnail)}}" alt="IMG-PRODUCT">

                            <a href="javascript:void(0)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 show-modal" 
                            data-id="{{$product->id}}" 
                            data-price="{{$product->price}}" 
                            data-name="{{$product->name}}" 
                            data-content="{{$product->description}}" 
                            data-image="{{$product->image}}" 
                            data-xs="{{$product->xs}}"
                            data-s="{{$product->s}}"
                            data-m="{{$product->m}}"
                            data-l="{{$product->l}}"
                            data-xl="{{$product->xl}}"
                            data-none="{{$product->none}}"
                            >
                                Quick View
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/product/{{ $product->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product->name }}
                                </a>

                                <span class="stext-105 cl3">
                                    Rp.
                                @php
                                    echo (number_format($product->price).".00");
                                @endphp
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div><!-- End of Isotope Grid -->

            <!-- {{--Pagination--}}
            <div class="flex-c-m flex-w w-full p-t-38">
                <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                    <strong>1</strong>
                </a>

                <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                    <strong>2</strong>
                </a>
            </div> -->

    </section>

@endsection
    