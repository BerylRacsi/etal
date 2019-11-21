@extends('admin.master')

@section('content')

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-images"></i>
        Edit Slide - {{$slide->id}}
    </div>
    <div class="card-body">
      <form method="POST" action="{{ action('SliderController@update', $slide->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
          <label for="top" class="col-md-4 col-form-label text-md-right">Top Text</label>

          <div class="col-md-6">
              <input id="top" type="text" class="form-control" name="top" value="{{$slide->top}}" required autofocus>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="bottom" class="col-md-4 col-form-label text-md-right">Bottom Text</label>

          <div class="col-md-6">
              <input id="bottom" type="text" class="form-control" name="bottom" value="{{$slide->bottom}}" required>
          </div>
        </div>
        <p class="text-center"><i>*Notes: Pastikan resolusi gambar tidak lebih dari 1920 x 1080, dan size gambar tidak lebih dari 2MB</i></p>
        <div class="form-group row">
          <label for="slide" class="col-md-4 col-form-label text-md-right">Image</label>

          <div class="col-md-6">
              <input type="file" name="slide" class="form-control-file">
          </div>
        </div>

        <input name="_method" type="hidden" value="PUT">
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>

      </form>
    </div>
</div>

@endsection