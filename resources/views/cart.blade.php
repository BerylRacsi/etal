@extends('master')

@section('navbar')

    <div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>

@endsection

@section('content')

<?php $total = 0 ?>

<!-- Shoping Cart -->
    <form class="bg0 p-t-100 p-b-85">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table id="cart" class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                    <th class="column-6">Update</th>
                                </tr>

                                @if(session('cart'))
                                    
                                @foreach(session('cart') as $id => $details)
         
                                <?php $total += $details['price'] * $details['quantity'] ?>

                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1 remove-from-cart" data-id="{{ $id }}">
                                            <img src="{{ $details['photo'] }}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{ $details['name'] }}</td>
                                    <td class="column-3">Rp
                                        @php
                                            echo number_format($details['price']);
                                        @endphp
                                    </td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div data-id="{{$id}}" data-pos="1" class="update-cart btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product quantity" type="text" name="num-product1" value="{{ $details['quantity'] }}">

                                            <div data-id="{{$id}}" data-pos="2" class="update-cart btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5">Rp
                                        @php
                                            echo number_format($details['price'] * $details['quantity']);
                                        @endphp
                                    </td>
                                    <td class="column-6">
                                        <button class="btn btn-success btn-sm update-cart-button">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                    </td>
                                </tr>

                                @endforeach
                        
                                @endif

                            </table>
                        </div>

                        <!-- Coupon Section -->
                        <!-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl3 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
                                    
                                <div class="flex-c-m stext-101 cl2 size-118 bg9 bor13 hov-btn1 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

                            <div class="flex-c-m stext-101 cl2 size-119 bg9 bor13 hov-btn1 p-lr-15 trans-04 pointer m-tb-10">
                                Update Cart
                            </div>
                        </div> -->
                        <!-- Coupon Section -->

                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl3 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl3">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl3">
                                    Rp
                                @php
                                    echo number_format($total);
                                @endphp
                                </span>
                            </div>
                        </div>

                        

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl3">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl3">
                                    Rp
                                @php
                                    echo number_format($total);
                                @endphp
                                </span>
                            </div>
                        </div>

                        <a href="{{url('/checkout')}}" class="flex-c-m stext-101 cl0 size-116 bg9 bor14 hov-btn1 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
@endsection
    