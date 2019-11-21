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
    <section class="sec-product-detail bg0 p-t-100 p-b-190">
        <div class="container">
            <div style="text-align: center; letter-spacing: 5px;">
                @isset($orders)
                    <img src="{{asset('images/delivery.png')}}" style="width: 100%; height: auto; max-width: 300px;">
                    <h5 class="p-t-40">
                        Your order have been processed and on delivery
                    </h5>
                    <h5 class="p-t-40">
                        No. Resi : {{$orders->resi}}
                    </h5>
                    <br>
                    <a class="back-homepage" href="{{url('/')}}">Back to Homepage</a> 
                @endisset
                @empty($orders)
                    <img src="{{asset('images/packaging.png')}}" style="width: 100%; height: auto; max-width: 200px;">
                    <h5 class="p-t-40">
                        Your order is still being processed
                    </h5>
                    <br>
                    <a class="back-homepage" href="{{url('/')}}">Back to Homepage</a> 
                @endempty
            </div>
        </div>
    </section>

@endsection
