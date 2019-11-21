@extends('master')

@section('navbar')

    <div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>
    
@endsection

@section('content')

<!-- Shoping Cart -->
    <div class="bg0 p-t-100 p-b-85">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ action('PagesController@store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-bill-form p-tb-30 p-lr-50">
                            <h4 class="mtext-109 cl3 p-b-30">
                                Billing Details
                                <hr>
                            </h4>
                            
                            <div class="form-group">
                                <label class="stext-102 cl4" for="name">Full Name <i style="color:red;">*</i></label>
                                <input type="text" class="form-control stext-102" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label class="stext-102 cl4" for="province">Province <i style="color:red;">*</i></label>
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 stext-102" name="provinsi" id="provinsi">
                                        <option>Choose an option</option>
                                        @php

                                            $data = json_decode($response, true);
                                            for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                                                echo "<option value='".$data['rajaongkir']['results'][$i]['province']."' data-id='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
                                            }

                                        @endphp
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="stext-102 cl4" for="city">Town / City <i style="color:red;">*</i></label>
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 stext-102" name="kabupaten" id="kabupaten">
                                        <option>Choose an option</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="stext-102 cl4" for="kecamatan">Kecamatan<i style="color:red;">*</i></label>
                                <input type="text" class="form-control stext-102" id="kecamatan" name="kecamatan">
                            </div>

                            <div class="form-group">
                                <label class="stext-102 cl4" for="address">Street Address <i style="color:red;">*</i></label>
                                <input type="text" class="form-control stext-102" id="address" name="address">
                            </div>

                            <div class="form-group">
                                <label class="stext-102 cl4" for="zip">Postcode / ZIP<i style="color:red;">*</i></label>
                                <input type="text" class="form-control stext-102" id="zip" name="zip">
                            </div>

                            <div class="form-group">
                                <label class="stext-102 cl4" for="phone">Phone<i style="color:red;">*</i></label>
                                <input type="text" class="form-control stext-102" id="phone" name="phone">
                            </div>

                            <div class="form-group">
                                <label class="stext-102 cl4" for="email">Email Address<i style="color:red;">*</i></label>
                                <input type="text" class="form-control stext-102" id="email" name="email">
                            </div>
                          
                            <h4 class="mtext-109 cl3 p-tb-15">
                                Additional Information
                            </h4>
                            <div class="form-group">
                                <label class="stext-102 cl4" for="info">Order Notes (optional)</label>
                                <textarea type="textarea" class="form-control stext-102" id="info" name="note"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $total = 0; $totalqty = 0; $order = ""; $productdetail = ""?>


                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl3 p-b-30">
                            Your Order
                            <hr>
                        </h4>
                    
                        @if(session('cart'))
                                            
                            @foreach(session('cart') as $id => $details)

                            @php
                                $total += $details['price'] * $details['quantity'];
                                $totalqty += $details['quantity'];

                                $order = $order.$details['name'].' x '.$details['quantity'].',';
                                $productdetail = $productdetail.$details['id'].','.$details['size'].','.$details['quantity'].',';
                            @endphp        

                            <div class="flex-w flex-t p-b-13">
                                <div class="size-219">
                                    <span class="stext-121 cl3">
                                        {{ $details['name'] }} x {{ $details['quantity'] }} 
                                    </span>
                                </div>

                                <div class="size-220">
                                    <span class="mtext-114 cl3" style="float: right;">
                                        @php
                                            echo "Rp.".(number_format($details['price']*$details['quantity']).".-");
                                        @endphp
                                    </span>
                                </div>
                            </div>

                            @endforeach
            
                        @endif

                        <div class="flex-w flex-t bor12 p-b-13 p-t-20">
                            <div class="size-208">
                                <span class="stext-110 cl3">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-114 cl3" style="float: right;">
                                    @php
                                        echo "Rp.".(number_format($total).".-");
                                    @endphp
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-b-13 p-t-20">
                            <div class="size-208">
                                <span class="stext-110 cl3"><br>
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-114 cl3" style="float: right;">
                                    <div class="col">
                                        <div class="row text-center">
                                            JNE - REG
                                        </div>
                                        <div class="row">
                                            <div id="ongkir"></div>                    
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl3">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1" >
                                <span class="mtext-110 cl3" style="float: right;">
                                    <div id="totalitas">
                                        @php
                                            echo "Rp.".(number_format($total).".-");
                                        @endphp
                                    </div>
                                </span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg9 bor14 hov-btn1 p-lr-15 trans-04 pointer">
                            Place Order
                        </button>
                        <input type="hidden" name="order" value="{{$order}}">
                        <input type="hidden" name="product_detail" value="{{$productdetail}}">
                        <input type="hidden" id="hargatotal" name="harga" value="{{$total}}">
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>

@endsection
    