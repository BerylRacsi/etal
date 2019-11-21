@extends('master')

@section('navbar')

    <div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>
    
@endsection

@section('content')

<!-- Product Detail -->
    <section class="sec-product-detail bg0 p-t-75 p-b-60">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6 col-lg-7 p-tb-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach (explode(',', $products->image) as $mboh)
                                    <div class="item-slick3" >
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ url('/',$mboh) }}" alt="IMG-PRODUCT" style="width: 100%; height: auto; max-width: 400px; margin-right: auto; margin-left: auto;">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ url('/',$mboh) }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach   
                            </div>

                        </div>
                    </div>
                </div>
                    
                <div class="col-md-6 col-lg-5 p-tb-30">
                    <div class="p-r-50 p-lr-0-lg">
                        <h4 class="mtext-105 cl3 js-name-detail p-b-14">
                            {{$products->name}}
                        </h4>

                        <span class="mtext-106 cl3">
                            Rp.
                                @php
                                    echo (number_format($products->price).".00");
                                @endphp
                        </span>
                        <hr>
                        <div class="size-204 respon6-next">
                            <div class="rs1-select2 bor8 bg0">
                                <select id="select-detail" class="js-select2 stext-107 size-select2" name="time">
                                    <option disabled selected>Select Size</option>

                                    @foreach($stocks as $stock)

                                        @if ($stock->amount >= 1)
                                            <option value="{{$stock->value}}">Size {{$stock->size}}</option>
                                        @endif

                                    @endforeach
                                    @foreach($stocks as $stock)
                                    
                                        @if ($stock->amount == 0)
                                           <option disabled="">Size {{$stock->size}} - Out of Stock</option>
                                        @endif

                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>


                        <div class="respon6-next">
                            <div style="float: left;">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input id="qty-detail" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1" min="1" max="5">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <button data-id="{{$products->id}}" class="add-to-cart-detail m-tb-10 stext-101 cl0 size-101 bg9 bor1 hov-btn1 p-lr-15 trans-04">
                                Add to cart
                            </button>
                        </div>
                    </div>
                    <div class="block2 border-button" style="max-width: 400px;">
                        <div class="block2-pic">
                            <img src="{{asset($products->sizeguide)}}" style="height: auto; max-width: 100%; ">

                            <a href="javascript:void(0)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" data-toggle="modal" data-target="#FitGuideModal">
                                Fit Guide
                            </a>
                        </div>
                    </div>
                </div>{{-- Right Column --}}
            </div>{{--Row--}}

            <div class="bor10 m-t-10 p-t-20 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs p-t-20" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-20">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6 text-center">
                                    {{$products->description}}
                                </p>
                            </div>
                        </div>

                    </div> {{-- Tab-Content --}}
                </div> {{-- Tab-01 --}}
            </div> {{-- Tab-Border --}}

            <!-- Modal -->
            <div class="modal fade " id="FitGuideModal" tabindex="-1" role="dialog" aria-labelledby="FitGuideModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document" >
                    
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="FitGuideModalLabel">Product Fit Guide</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{asset($products->fitguide)}}" style="display: block;margin: auto; height: auto; max-width: 100%;">
                        </div>
                    </div>
                </div>
            </div>

        </div>{{--Container--}}
    </section>

@endsection
    