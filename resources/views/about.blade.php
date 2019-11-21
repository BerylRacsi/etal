@extends('master')

@section('navbar')

	<div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>

@endsection

@section('content')

<!-- Content page -->
	<section class="bg0 p-t-100 p-b-120">
		<div class="container">
			
			<div class="row p-b-10">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-tb-80 p-l-85 p-l-15-lg p-l-0-md">
						<h5 class="stext-105 cl3 p-b-25" style="letter-spacing: 3px;">
							OUR STORY
							<hr>
						</h5>

						<h3 class="mtext-105 cl6 p-b-16">
							Things are already looking promising
						</h3>

						<p class="stext-107 cl6 p-b-26" style="text-align: justify-all;">
							Established in January 2019, we are inspired by individual who have
							potential but gain no appreciation in social environment for their contribution. Et al.
							comes from the Latin phrase meaning “and others “. We work for unlocking
							potential value of individual until something agitates him enough to make a
							difference, whether for himself or for his communities.<br><br>
							Based in Bandung, West Java.
						</p>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="{{url('/images/about/women.jpg')}}" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-80  p-r-85 p-r-15-lg p-r-0-md">
						<h5 class="stext-105 cl3 p-b-25" style="letter-spacing: 3px; text-align: right;">
							OUR MISSION
							<hr>
						</h5>

						<h3 class="mtext-105 cl6 p-b-16" style="text-align: right;">
							Appeciate Every Drops!
						</h3>

						<p class="stext-107 cl6 p-b-26" style="text-align: right;">
							 Unlocking Value and Inspiration for Human Beings to Brighter Future
						</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="{{url('/images/about/men.jpg')}}" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection