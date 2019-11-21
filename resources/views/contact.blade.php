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
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-pin zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Address
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								Jl. Haji Muala No. 8 Kemanggisan, Jakarta Barat<br><br>
								Jl. Cisitu Lama II No.28B/154C, Coblong, Bandung - 40135
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-whatsapp zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								WhatsApp / Phone
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								+62 8778 1550 522
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-email zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Email
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								etalclothing@gmail.com
							</p>
						</div>
					</div>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="cl8 txt-center size-211">
							<img src="{{asset('images/contact/ig.png')}}" style="max-width: 45px;">
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Instagram
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								<a href="https://www.instagram.com/et.al.project">et.al.project</a>
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="cl8 txt-center size-211">
							<img src="{{asset('images/contact/line.jpg')}}" style="max-width: 45px;">
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								LINE @
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								@dvc5518d
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="cl8 txt-center size-211">
							<img src="{{asset('images/contact/fb.png')}}" style="max-width: 45px;">
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Facebook
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								<a href="https://www.facebook.com/etalproject">etalproject</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection