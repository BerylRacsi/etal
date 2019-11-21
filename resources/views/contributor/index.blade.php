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
		<div class="container p-t-30">
			<div class="card mb-3">
				<div class="card-header">
					<a class="btn btn-danger float-right btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
						<i class="fa fa-sign-out"></i> 
						Logout
					</a>
					<a class="btn btn-success float-right btn-sm" href="/contributor/{{$contributor->id}}/edit">
						<i class="fa fa-edit"></i> 
						Edit Profile
					</a>
            		<h5>Contributor's Profile</h5>
				</div>
		        <div class="card-body">
		            <table class="table table-bordered" width="100%" cellspacing="0" style="table-layout: fixed;">
		                <tbody>
		                    <tr >
		                        <td class="text-center" width="40%"><strong>Name</strong></td>
		                        <td width="60%">{{$contributor->name}}</td>
		                    </tr>
		                    <tr>
		                        <td class="text-center" width="40%" style="vertical-align: middle;"><strong >Profile Photo</strong></td>
		                        <td width="60%" >
		                            <img src="{{asset($contributor->profile)}}" style="width:100%;height: auto; max-width: 200px; display: block; margin: auto;">
		                        </td>
		                    </tr>
		                    <tr >
		                        <td class="text-center" width="40%"><strong>Instagram</strong></td>
		                        <td width="60%">{{$contributor->instagram}}</td>
		                    </tr>
		                    <tr >
		                        <td class="text-center" width="40%"><strong>Twitter</strong></td>
		                        <td width="60%">{{$contributor->twitter}}</td>
		                    </tr>
		                    <tr >
		                        <td class="text-center" width="40%"><strong>LinkedIn</strong></td>
		                        <td width="60%">{{$contributor->linkedin}}</td>
		                    </tr>
		                    <tr >
		                        <td class="text-center" width="40%"><strong>Description</strong></td>
		                        <td width="60%">{{$contributor->description}}</td>
		                    </tr>
		                    <tr >
		                        <td class="text-center" width="40%" style="vertical-align: middle;"><strong >Contributor Images</strong></td>
		                        <td width="60%" >
		                        	@foreach (explode(',', $contributor->image) as $mboh)
		                            <img src="{{asset($mboh)}}" style="width:100%;height: auto; max-width: 200px; display: block; margin: auto; "><br>
		                            @endforeach
		                        </td>
		                    </tr>
		                </tbody>
		            </table>
		        </div>
			</div>
		</div>
	</section>
@endsection