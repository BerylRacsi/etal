@extends('admin.master')

@section('content')

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-th-large"></i>
        Categories's Cover
    </div>
    <div class="card-body">
		<div class="card-deck text-center">
		  <div class="card">
		    <img class="card-img-top" src="{{asset($men->cover)}}" alt="Card image cap" style="max-width: 400px; height: auto; margin-left: auto;margin-right: auto;">
		    <div class="card-footer">
		    	<p>Men Cover</p>
		      	<a href="{{action('CoverController@edit',$men->id)}}" class="btn btn-info btn-sm">Edit</a>
		    </div>
		  </div>
		  <div class="card">
		    <img class="card-img-top" src="{{asset($women->cover)}}" alt="Card image cap" style="max-width: 400px; height: auto; margin-left: auto;margin-right: auto;">
		    <div class="card-footer">
		    	<p>Women Cover</p>
		      	<a href="{{action('CoverController@edit',$women->id)}}" class="btn btn-info btn-sm">Edit</a>
		    </div>
		  </div>
		</div>
		<br>
		<div class="card-deck text-center">
		  <div class="card">
		    <img class="card-img-top" src="{{asset($top->cover)}}" alt="Card image cap" style="max-width: 400px; height: auto; margin-left: auto;margin-right: auto;">
		    <div class="card-footer">
		    	<p>Top Cover</p>
		      	<a href="{{action('CoverController@edit',$top->id)}}" class="btn btn-info btn-sm">Edit</a>
		    </div>
		  </div>
		  <div class="card">
		    <img class="card-img-top" src="{{asset($bottom->cover)}}" alt="Card image cap" style="max-width: 400px; height: auto; margin-left: auto;margin-right: auto;">
		    <div class="card-footer">
		    	<p>Bottom Cover</p>
		      	<a href="{{action('CoverController@edit',$bottom->id)}}" class="btn btn-info btn-sm">Edit</a>
		    </div>
		  </div>
		  <div class="card">
		    <img class="card-img-top" src="{{asset($accessories->cover)}}" alt="Card image cap" style="max-width: 400px; height: auto; margin-left: auto;margin-right: auto;">
		    <div class="card-footer">
		    	<p>Accessories Cover</p>
		      	<a href="{{action('CoverController@edit',$accessories->id)}}" class="btn btn-info btn-sm">Edit</a>
		    </div>
		  </div>
		</div>
	</div>
</div>
@endsection