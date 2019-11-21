@extends('master')

@section('navbar')

    <div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>

@endsection

@section('content')

    <section class="sec-product-detail bg0 p-t-100 p-b-60">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
             <div style="text-align: center; letter-spacing: 5px;">
                <h3 class=" ltext-103 cl13">
                        Thank you for your order
                </h3><br><br>

                <img src="{{asset('images/icons/logo-pl.png')}}" style="width: 100%; height: auto; max-width: 400px;">

                <h5 class="p-t-40">
                    Your order has been placed and is being processed
                </h5>
                <h5 class="p-t-40">
                    You can check your order status with ORDER link above
                </h5><br>
                <a class="back-homepage" href="{{url('/')}}">Back to Homepage</a>    
            </div>
        </div>
    </section>

@endsection
    