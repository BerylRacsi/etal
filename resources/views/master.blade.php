<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.png')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap2/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/linearicons-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/MagnificPopup/magnific-popup.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
</head>

<body class="animsition">
    
    <!-- Header -->
    <header class="header-v3">
        <!-- Header desktop -->
        @section('navbar')

        @show

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->        
            <div class="logo-mobile">
                <a href="index.html"><img src="{{asset('images/icons/logo-etal.png')}}" alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-r-5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{ count((array)session('cart')) }}">
                        <i class="zmdi zmdi-shopping-cart" style="color: #222;"></i>
                    </div>
                </div>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li>
                    <a href="{{url('/')}}">HOME</a>
                </li>
                <li>
                    <a href="{{url('/shop')}}">SHOP</a>
                    <ul class="sub-menu-m">
                        <li><a href="{{action('PagesController@category',3)}}">Top</a></li>
                        <li><a href="{{action('PagesController@category',4)}}">Bottom</a></li>
                        <li><a href="{{action('PagesController@category',5)}}">Accesories</a></li>
                    </ul>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>
                <li>
                    <a href="" data-toggle="modal" data-target="#exampleModal">ORDER</a>
                </li>
                <li>
                    <a href="{{url('/about')}}">ABOUT</a>
                </li>
                <li>
                    <a href="{{url('/contact')}}">CONTACT</a>
                </li>
                <li>
                <a href="{{url('/contributors')}}">CONTRIBUTOR</a>
            </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                

            <form class="container-search-header" method="GET" action="{{action('PagesController@search')}}">
                <div class="wrap-search-header">
                    
                    <input class="text-center" type="text" name="search" placeholder="Search..." style="width: 960px;">

                </div>
            </form>
        </div>
    </header>


    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl13">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl13 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            @if(session('cart'))
            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    
                        @foreach(session('cart') as $id => $details)
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img remove-from-cart" data-id="{{ $id }}">
                            <img src="{{ asset($details['photo']) }}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt  p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 stext-118 hov-cl1 trans-04">
                                {{ $details['name'] }}
                            </a>

                            <span class="header-cart-item-info stext-119">
                                {{ $details['quantity'] }} x Rp
                                @php
                                    echo number_format($details['price']);
                                @endphp
                            </span>
                        </div>
                    </li>
                    @endforeach
                    
                    
                </ul>
                
                
                <?php $total = 0 ?>
                    @foreach(session('cart') as $id => $details)
                        <?php $total += $details['price'] * $details['quantity'] ?>
                    @endforeach

                <div class="w-full">
                    <div class="header-cart-total mtext-103 w-full p-tb-40">
                        Total: Rp
                                @php
                                    echo number_format($total);
                                @endphp
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{url('/cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{url('/checkout')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="w-full p-t-75">
                <img src="/images/icons/empty_cart.png" style="max-width: 200px;display: block;margin-left: auto;margin-right: auto;"><br>
                <p class="text-center">Your cart is empty!</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form method="POST" action="{{action('PagesController@cekstatus')}}" enctype="multipart/form-data">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please input your Order ID</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="cekorder" placeholder="Order ID" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Check</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    

  @yield('content')

  <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Categories
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="{{action('PagesController@category',2)}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Women
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{action('PagesController@category',1)}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Men
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{action('PagesController@category',3)}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Top
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{action('PagesController@category',4)}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Bottom
                            </a>
                        </li>
                        <li class="p-b-10">
                            <a href="{{action('PagesController@category',5)}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Accessories
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Help
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="{{url('/info')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Track Order
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{url('/info')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Returns 
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{url('/info')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Shipping
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{url('/info')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        COMPANY
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="{{url('/about')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                About Us
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{url('/contact')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Contact Us
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="{{url('/shop')}}" class="stext-107 cl7 hov-cl1 trans-04">
                                Stores
                            </a>
                        </li>

                        
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        INFO
                    </h4>

                    <p class="stext-122 cl7 size-201">
                        <strong><i>et al.</i></strong>
                    </p>
                    <p class="stext-107 cl7 size-201">
                        Jl. Haji Muala No. 8 Kemanggisan, Jakarta Barat<br>
                        Jl. Cisitu Lama II No.28B/154C, Coblong, Bandung - 40135
                    </p>
                    <br>
                    <p class="stext-107 cl7 size-201">
                        Email: etalclothing@gmail.com
                    </p>
                    <br>
                    <p class="stext-107 cl7 size-201">
                        Phone : +62  8778 1550 522
                    </p>
                    <p class="stext-107 cl7 size-201">
                        WhatsApp : +62  8778 1550 522
                    </p>
                    <br>
                    <p class="stext-107 cl7 size-201">
                        LINE @ : @dvc5518d
                    </p>

                    <br>
                        <a href="https://www.facebook.com/etalproject" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="https://www.instagram.com/et.al.project" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>
                    
                </div>
            </div>

            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="{{asset('images/icons/atm.png')}}" alt="ICON-PAY" style="max-width: 60px;">
                    </a>

                    <a href="#" class="m-all-1 p-t-4">
                        <img src="{{asset('images/icons/ovo.jpg')}}" alt="ICON-PAY" style="max-width: 43px;">
                    </a>
                </div>

                <p class="stext-107 cl2 txt-center">
                    Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved |  <a href="https://etaluniverse.com" target="_blank">Etal Universe</a>
                </p>
                <p class="stext-107 cl2 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Powered by <a href="https://colorlib.com">Colorlib</a> Theme
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal form to show a post -->
    <div id="showModal" class="modal fade and carousel slide" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-7 p-b-10">
                            <div class="p-l-25 p-r-30 p-lr-0-lg">

                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators" id="indiCar">
                                        
                                    </ol>

                                    <div class="carousel-inner">
                                        <div id="itemCar"></div>
                                    </div>
                                  
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter:invert(100%);"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true" style="filter:invert(100%);"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        
                    
                        <div class="col-md-6 col-lg-5 p-b-10">
                            <div class="p-r-50   p-lr-0-lg">
                                <h4 class="mtext-105 cl3 js-name-detail p-b-14" id="name_show">
                                    Lightweight Jacket
                                </h4>


                                <span class="mtext-106 cl3" id="price_show">
                                    
                                </span>
                                <hr>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2 stext-107 size-select" id="sizeSelect" name="time">
                                            
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>

                                <div class="respon6-next">
                                    <div style="float: left;">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m qty-minus">
                                                <i class="fs-16 zmdi zmdi-minus" ></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" id="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m qty-plus">
                                                <i class="fs-16 zmdi zmdi-plus" ></i>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="m-tb-10 stext-101 cl0 size-101 bg9 bor1 hov-btn1 p-lr-15 trans-04" >
                                        <a class="add-to-cart cl0 hov-cl0" id="link2" role="button">Add to cart</a>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div><!-- row -->

                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div>

<!--===============================================================================================-->  
    <script src="{{asset('vendor/jquery2/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/bootstrap2/js/popper.js')}}"></script>
    <script src="{{asset('vendor/bootstrap2/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/parallax100/parallax100.js')}}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/isotope/isotope.pkgd.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        $('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    
    </script>
<!--===============================================================================================-->
    <script src="{{asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>

    <script type="text/javascript">
 
        $(".update-cart").click(function (e) {
           e.preventDefault();

           
           var ele = $(this);

           var cobaid = ele.attr("data-id");
           var cobaqty = ele.parent().find(".quantity").val();



           if (ele.attr("data-pos") == 1) {
                cobaqty--;
           }
           else if(ele.attr("data-pos")  == 2){
                cobaqty++;
           }


           $(".update-cart-button").click(function (elele) {
                elele.preventDefault();
                $.ajax({
                   url: '{{ url('update-cart') }}',
                   method: "patch",
                   data: {_token: '{{ csrf_token() }}', id: cobaid, quantity: cobaqty},
                   success: function (response) {
                       window.location.reload();
                   }
                });
            });
        });
 
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
 
            var ele = $(this);
 
            if(confirm("Are you sure want to removed this product ?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
 
    </script>

    <script type="text/javascript">
        $(document).on('click', '.show-modal', function() {
            $('#id_show').html($(this).data('id'));
            var id = $(this).data('id');

            var price = $(this).data('price');
            var nf = new Intl.NumberFormat();
            var price_formatted = nf.format(price);
            $('#price_show').html("Rp. " + price_formatted + ".00");
            
            $('#name_show').html($(this).data('name'));
            $('#content_show').html($(this).data('content'));

            $("#sizeSelect").empty();
            $("#sizeSelect").append('<option disabled selected>Select Size</option>');
            
            if ($(this).data('xs') == 1) {
                $("#sizeSelect").append('<option value="1">Size XS</option>');
            }

            if ($(this).data('s') == 1) {
                $("#sizeSelect").append('<option value="2">Size S</option>');
            }

            if ($(this).data('m') == 1) {
                $("#sizeSelect").append('<option value="3">Size M</option>');
            }

            if ($(this).data('l') == 1) {
                $("#sizeSelect").append('<option value="4">Size L</option>');
            }

            if ($(this).data('xl') == 1) {
                $("#sizeSelect").append('<option value="5">Size XL</option>');
            }

            if ($(this).data('none') == 1) {
                $("#sizeSelect").append('<option value="6" selected >NONE</option>');
            }

            if ($(this).data('xs') == 2) {
                $("#sizeSelect").append('<option disabled>Size XS - Out of stock</option>');
            }

            if ($(this).data('s') == 2) {
                $("#sizeSelect").append('<option disabled>Size S - Out of stock</option>');
            }

            if ($(this).data('m') == 2) {
                $("#sizeSelect").append('<option disabled>Size M - Out of stock</option>');
            }

            if ($(this).data('l') == 2) {
                $("#sizeSelect").append('<option disabled>Size L - Out of stock</option>');
            }

            if ($(this).data('xl') == 2) {
                $("#sizeSelect").append('<option disabled>Size XL - Out of stock</option>');
            }

            if ($(this).data('none') == 2) {
                $("#sizeSelect").append('<option disabled>Size NONE - Out of stock</option>');
            }


            $('#image_show').html($(this).data('image'));
            var image = $(this).data('image');
            
            var imageArray = image.split(",");
            var arrayLength = imageArray.length;

            $("#indiCar").empty();
            $("#itemCar").empty();
            

            for(var i=0; i<arrayLength; i++){

               if (i == 0) {

                    var div_indi1 = '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';

                    var div_img1 = '<div class="carousel-item active"> <img class="d-block w-100" src="/' + imageArray[0] + ' " > </div>' ;
                   
                    $("#indiCar").append(div_indi1);
                    $("#itemCar").append(div_img1);                    
               }
               else{

                    var div_indi = '<li data-target="#carouselExampleIndicators" data-slide-to="'+i+'" ></li>';

                    var div_img = '<div class="carousel-item"> <img class="d-block w-100" src="/' + imageArray[i] + ' " > </div>' ;

                    $("#indiCar").append(div_indi);
                    $("#itemCar").append(div_img);
               }

                   
               
             }

            $('#showModal').modal('show');

            var itemSize;
            var sizeName;

            if( $('select.size-select').val() == 6) {
                itemSize = $('select.size-select').val();
                sizeName = "NONE";
            }
            else {
                $('select.size-select').change(function(){
                    itemSize = $(this).val(); // your selected option value
                    if (itemSize == 1) {
                        sizeName = "XS";
                    }
                    if (itemSize == 2) {
                        sizeName = "S";
                    }
                    if (itemSize == 3) {
                        sizeName = "M";
                    }
                    if (itemSize == 4) {
                        sizeName = "L";
                    }
                    if (itemSize == 5) {
                        sizeName = "XL";
                    }
                    if (itemSize == 6) {
                        sizeName = "NONE";
                    }
                });
            }
            
            
            var itemQty = 1;

            $(document).on('click', '.qty-plus', function() {
                itemQty++;
            });

            $(document).on('click', '.qty-minus', function() {
                itemQty--;
            });

            /*$(document).on('click', '.add-to-cart', function() {
                var cartURL = "../add-to-cart/" + id + "/" + itemQty + "/" + itemSize + "/" + sizeName;
                if (itemSize == undefined || sizeName == undefined) {
                    alert("Please select size to add this item to cart.");
                }
                else{
                    window.location.href=cartURL;
                }
            });*/

            $(document).ready(function(){

                $('.add-to-cart').click(function() {
                    var cartURL = "../add-to-cart/" + id + "/" + itemQty + "/" + itemSize + "/" + sizeName;

                    if (itemSize == undefined || sizeName == undefined) {
                        alert("Please select size to add this item to cart.");
                    }
                    else{

                        $.ajax({
                            type : 'GET',
                            url : '{{ url('check-stock') }}',
                            data : {'id' : id,'size' : sizeName, 'amount' : itemQty},

                            success: function(data){
                                if (data.status == "ok") {
                                    window.location.href="/"+cartURL;
                                }
                                else if(data.status == "no") {
                                    alert("Available stock for size "+data.size+" is "+data.amount);
                                }
                            }
                        });

                    }
                });
            });
            

        });
    </script>

    <script type="text/javascript">

    $(document).ready(function(){

        $('.add-to-cart-detail').click(function() {
            var d_id = $(this).data('id');

            var d_itemSize;
            var d_sizeName;

            d_itemSize = $('#select-detail').val(); // your selected option value

            if (d_itemSize == 1) {
                d_sizeName = "XS";
            }
            if (d_itemSize == 2) {
                d_sizeName = "S";
            }
            if (d_itemSize == 3) {
                d_sizeName = "M";
            }
            if (d_itemSize == 4) {
                d_sizeName = "L";
            }
            if (d_itemSize == 5) {
                d_sizeName = "XL";
            }
            if (d_itemSize == 6) {
                d_sizeName = "NONE";
            }

            var d_qty = $('#qty-detail').val()


            var d_cartURL = "add-to-cart/" + d_id + "/" + d_qty + "/" + d_itemSize + "/" + d_sizeName;
            if (d_itemSize == undefined || d_sizeName == undefined) {
                alert("Please select size to add this item to cart.");
            }
            else{

                $.ajax({
                    type : 'GET',
                    url : '{{ url('check-stock') }}',
                    data : {'id' : d_id,'size' : d_sizeName, 'amount' : d_qty},

                    success: function(data){
                        if (data.status == "ok") {
                            window.location.href="/"+d_cartURL;
                        }
                        else if(data.status == "no") {
                            alert("Available stock for size "+data.size+" is "+data.amount);
                        }
                    }
                });
                //
            }

        });

    });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(document).ready(function(){
            $('#provinsi').change(function(){

                //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
                var prov = $(this).find(':selected').attr('data-id');


                $.ajax({
                    type : 'GET',
                    url : '{{ url('cek-kabupaten') }}',
                    data :  'prov_id=' + prov,
                        success: function (data) {

                        //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                        $("#kabupaten").html(data);
                    }
                });
            });


            $("#kabupaten").change(function(){
            //Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax 
                var asal = "152";
                var kab = $(this).find(':selected').attr('data-id');
                var kurir = "jne";
                var berat = "<?php 
                                if (isset($totalqty)) {
                                    echo ($totalqty * 500);
                                }
                            ?>";
                var total1 = <?php 
                                if (isset($total)) {
                                    echo ($total);
                                }
                            ?>;


                $.ajax({
                    type : 'POST',
                    url : '{{url('cek-ongkir')}}',
                    data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                        success: function (data) {

                        //jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
                        
                        var myJSON = data;
                        var myObj = JSON.parse(myJSON);
                        var ongkos = myObj.rajaongkir.results[0].costs[1].cost[0].value;
                        document.getElementById("ongkir").innerHTML = "Rp."+ongkos+".-";
                        total1 += ongkos;
                        var numf = new Intl.NumberFormat();
                        total2 = numf.format(total1);
                        document.getElementById("totalitas").innerHTML = "Rp."+(total2)+".-";
                        $("#hargatotal").val(function() {
                            return total2;
                        });
                    }
                });

                
                
            });
    
        });
    </script>

    <script type="text/javascript">
        function copyOrder() {
            /* Get the text field */
            var copyText = document.getElementById("myOrder");

            /* Select the text field */
            copyText.select();

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Nomor Pesanan berhasil dicopy: " + copyText.value);
        }
    </script>

    <script type="text/javascript">
        $("#ulSort li a, #ulPrice li a, #ulColor li a").click(function() {
            $(this).addClass('filter-link-active');
            $(this).parent().siblings().children('.filter-link.filter-link-active').removeClass('filter-link-active');
            
            var myvalue1 = $('.liSort').children('.filter-link.filter-link-active').attr('value');
            var myvalue2 = $('.liPrice').children('.filter-link.filter-link-active').attr('value');
            var myvalue3 = $('.liColor').children('.filter-link.filter-link-active').attr('value');

            $.ajax({
                    type : 'GET',
                    url : '{{url('filter')}}'+'?sort='+myvalue1+'&price='+myvalue2+'&color='+myvalue3,
                        success: function (data) {
                            var $items = data.html;
                            var $grid = $('.isotope-grid');
                            $grid.html('');
                            $grid.isotope('insert', jQuery($items));
                    }
            });
        });
    </script>

    <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 100) {
          val.value = val.value.substring(0, 100);
        } else {
          $('#charNum').text(100 - len);
        }
      };
    </script>

    <!-- WhatsHelp.io widget -->
    <!-- <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+6287781550522", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "left", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script> -->
    <!-- /WhatsHelp.io widget -->
    
<!--===============================================================================================-->
    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>