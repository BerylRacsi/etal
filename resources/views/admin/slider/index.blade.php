@extends('admin.master')

@section('content')

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-images"></i>
        Slider Content
    </div>
    <div class="card-body">
		<div class="card-deck text-center">
		  <div class="card">
		    <img class="card-img-top" src="{{asset($slide1->slide)}}" alt="Card image cap" style="height: 200px;">
		    <div class="card-body">
		      <h5 class="card-title"><i>{{$slide1->top}}</i></h5>
		      <h3 class="card-title"><i>{{$slide1->bottom}}</i></h3>
		    </div>
		    <div class="card-footer">
		    	<p>First Slide</p>
		      	<a href="{{action('SliderController@edit',$slide1->id)}}" class="btn btn-info btn-sm">Edit</a>
		    </div>
		  </div>
		  <div class="card">
		    <img class="card-img-top" src="{{asset($slide2->slide)}}" alt="Card image cap" style="height: 200px;">
		    <div class="card-body">
		      <h5 class="card-title"><i>{{$slide2->top}}</i></h5>
		      <h3 class="card-title"><i>{{$slide2->bottom}}</i></h3>
		    </div>
		    <div class="card-footer">
		    	<p>Second Slide</p>
		      	<a href="{{action('SliderController@edit',$slide2->id)}}" class="btn btn-info btn-sm">Edit</a>
		    </div>
		  </div>
		  <div class="card">
		    <img class="card-img-top" src="{{asset($slide3->slide)}}" alt="Card image cap" style="height: 200px;">
		    <div class="card-body">
		      <h5 class="card-title"><i>{{$slide3->top}}</i></h5>
		      <h3 class="card-title"><i>{{$slide3->bottom}}</i></h3>
		    </div>
		    <div class="card-footer">
		    	<p>Third Slide</p>
		      	<a href="{{action('SliderController@edit',$slide3->id)}}" class="btn btn-info btn-sm">Edit</a>
		    </div>
		  </div>
		</div>
	</div>
</div>
@endsection