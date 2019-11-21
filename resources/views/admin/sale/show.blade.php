@extends('admin.master')

@section('content')
        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    @foreach (explode(',', $products->image) as $mboh)
                                    <div class="item-slick3" data-thumb="{{ url('/',$mboh) }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ url('/',$mboh) }}" alt="IMG-PRODUCT">

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
                    
                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl3 js-name-detail p-b-14">
                                {{$products->name}}
                            </h4>

                            <span class="mtext-106 cl3" data-type="currency">
                                Rp. 
                                @php
                                    echo number_format($products->price);
                                @endphp
                            </span>
                            <br>
                            <br>
                            <table class="table">
                              
                              <tbody>
                                <tr>
                                  <th scope="row">Brand</th>
                                  <td>{{$products->brand}}</td>
                                </tr>
                                <tr>
                                  <th scope="row">Category</th>
                                  <td>{{$products->category}}</td>
                                </tr>
                                <tr>
                                  <th scope="row">Available Size</th>
                                  <td>
                                    @if ($products->xs == 1)
                                        <strong style="text-align:left;">
                                            XS
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "XS")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->s == 1)
                                        <strong style="text-align:left;">
                                            S
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "S")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->m == 1)
                                        <strong style="text-align:left;">
                                            M
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "M")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->l == 1)
                                        <strong style="text-align:left;">
                                            L
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "L")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->xl == 1)
                                        <strong style="text-align:left;">
                                            XL
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "XL")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                        <br>
                                    @endif
                                    @if ($products->none == 1)
                                        <strong style="text-align:left;">
                                            NONE
                                            <span style="float:right;">
                                                : 
                                                @foreach($stocks as $stock)
                                                    @if($products->id == $stock->id_product)
                                                        @if($stock->size == "NONE")
                                                            {{$stock->amount}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </strong>
                                    @endif
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">Color</th>
                                  <td>{{$products->color}}</td>
                                </tr>
                                <tr>
                                  <th scope="row">Gender</th>
                                  <td>{{$products->gender}}</td>
                                </tr>
                              </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 text-center cl6">
                                    {{$products->description}}
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

@endsection

@push('styles')
    
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/slick/slick.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('vendor/MagnificPopup/magnific-popup.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
@endpush

@push('scripts')

    <script src="{{asset('vendor/jquery2/jquery-3.2.1.min.js')}}"></script>

    <script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>

    <script src="{{asset('vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('js/slick-custom.js')}}"></script>

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

    <script src="{{asset('js/main.js')}}"></script>

@endpush