@extends('master')

@section('navbar')

	<div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>

@endsection

@section('content')
	<section class="sec-product-detail bg0 p-t-120 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-3 p-b-25">
                    <div class="p-lr-0-lg">

                        <div class="col-6 col-md-10 col-lg-10 m-lr-auto ">
                            <div class="how-bor2">
                                <div class="hov-img0">
                                    <img src="{{asset($contributor->profile)}}" alt="IMG" >
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4 class="mtext-105 cl3 p-b-14 text-center">
                            {{$contributor->name}}
                        </h4>

                        <div class="row text-center">
                            <div class="col-4">
                                <a href="{{url($contributor->instagram)}}" class="cl3 hov-cl1 trans-04">
                                    <i class="zmdi zmdi-instagram zmdi-hc-2x"></i>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{url($contributor->twitter)}}" class="cl3 hov-cl1 trans-04">
                                    <i class="zmdi zmdi-twitter zmdi-hc-2x"></i>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="{{url($contributor->linkedin)}}" class="cl3 hov-cl1 trans-04">
                                    <i class="zmdi zmdi-linkedin zmdi-hc-2x"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-9 col-lg-9 p-b-25">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w" style="width: 83.33333%;"></div>

                            <div class="slick3 gallery-lb" style="width: 83.33333%;">
                                @foreach (explode(',', $contributor->image) as $mboh)
                                <div class="item-slick3" data-thumb="{{asset($mboh)}}">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{asset($mboh)}}" alt="IMG-PRODUCT">

                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset($mboh)}}">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-center">
                <hr class="m-lr-auto" style="width: 30%;" >
                <p style="font-size: 18px;"><i><strong>"&nbsp{{$contributor->description}}&nbsp"</strong></i></p>
                <hr class="m-lr-auto" style="width: 30%;" >
            </div>
        </div>
    </section>
@endsection