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
		<div class="container">
			<form method="POST" action="{{ action('ContributorController@update', $contributor->id) }}" enctype="multipart/form-data">
            @csrf
            	<div class="m-l-25 m-r-38 m-lr-0-xl p-t-30">
                    <div class="wrap-bill-form p-tb-30 p-lr-50">
                        <h4 class="mtext-109 cl3 p-b-30">
                            Edit Contributor Profile
                            <hr>
                        </h4>
                        
                        <div class="form-group">
                            <label class="stext-102 cl4" for="name">Full Name <i style="color:red;">*</i></label>
                            <input type="text" class="form-control stext-102" value="{{$contributor->name}}" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label class="stext-102 cl4" for="kecamatan">Instagram<i style="color:red;">*</i></label>
                            <input type="text" class="form-control stext-102" value="{{$contributor->instagram}}" id="instagram" name="instagram" required>
                        </div>

                        <div class="form-group">
                            <label class="stext-102 cl4" for="address">Twitter<i style="color:red;">*</i></label>
                            <input type="text" class="form-control stext-102" value="{{$contributor->twitter}}" id="twitter" name="twitter" required>
                        </div>

                        <div class="form-group">
                            <label class="stext-102 cl4" for="zip">LinkedIn<i style="color:red;">*</i></label>
                            <input type="text" class="form-control stext-102" value="{{$contributor->linkedin}}" id="linkedin" name="linkedin" required>
                        </div>

                        <div class="form-group">
                            <label class="stext-102 cl4" for="profile">Profile Photo<i style="color:red;">*</i></label>
                            <input type="file" class="form-control stext-102" id="profile" name="profile" >
                        </div>

                        <div class="form-group">
                            <label class="stext-102 cl4" for="image">Images<i style="color:red;">*&nbsp</i> (You can upload up to 3 images)</label>
                            <input type="file" class="form-control stext-102" id="image" name="image[]" multiple="true" >
                        </div>
                      
                        <h4 class="mtext-109 cl3 p-tb-15">
                            Description
                        </h4>
                        <div class="form-group">
                            <label class="stext-102 cl4" for="info">You can describe up to 100 characters</label>
                            <textarea type="textarea" class="form-control stext-102" onkeyup="countChar(this)" id="description" name="description" required>{{$contributor->description}}</textarea>
                            Character left :
                            <div id="charNum"></div>
                        </div>
                        
                        <input name="_method" type="hidden" value="PUT">
                        <button type="submit" class="hov-btn1 stext-101 cl0 size-116 bg9 bor14" style="display: block; margin: 0 auto;">
                            {{ __('Edit') }}
                        </button>
                    </div>
                </div>
			</form>
		</div>
	</section>
@endsection