@extends('master')

@section('navbar')

	<div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>

@endsection

@section('content')
	<section class="bg0 p-t-100 p-b-60">
		<!-- Banner -->
	    <div class="sec-banner bg0 p-t-65 p-b-30">
	        <div class="container">
	            <div class="p-b-30" style="text-align: center; letter-spacing: 5px;">
	                    <h3 class=" ltext-103 cl14 p-b-40">
	                        Contributors
	                    </h3>
	            </div>
	            <div class="row">
	            	@foreach ($contributors as $contributor)
	                <div class="col-md-6 p-b-30 m-lr-auto">
	                    <!-- Block1 -->
	                    <div class="block1 hov-img0 wrap-pic-w">


	                    	@foreach (explode(',', $contributor->image) as $mboh)
	                        
		                        <img src="{{asset($mboh)}}" alt="IMG-BANNER">
		                     	@php
		                     		break;
		                     	@endphp
	                    	@endforeach 

	                        <a href="/contributors/{{$contributor->id}}" class="block1-txt ab-t-l s-full flex-col-l-sb trans-03 respon3" >
	                            <div class="block1-txt-child1 text-center flex-col-l" style="margin-left: auto; margin-right: auto; top: 50%;transform: translateY(-50%); position: relative; ">
	                                <span class="ltext-202 cl0 respon2" style="font-size: 30px; background-color: rgba(0,0,0,0.5); text-transform: uppercase;">
	                                    {{$contributor->name}}
	                                </span>
	                            </div>                
	                                <img src="{{asset($contributor->profile)}}" style="max-width: 20%;height: auto;border: 2px solid white; position: absolute; bottom: 5%; left: 5%;">
	                        </a>
	                    </div>
	                </div>
	                @endforeach
	            </div>
	        </div>
	    </div>
	</section>
@endsection