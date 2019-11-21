@extends('admin.master')

@section('content')

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-th-large"></i>
        Edit Cover - 
        @if ($cover->id === 1)
            Men
        @elseif ($cover->id === 2)
            Women
        @elseif ($cover->id === 3)
            Top
        @elseif ($cover->id === 4)
            Bottom
        @else
            Accessories
        @endif
    </div>
    <div class="card-body">
      <p class="text-center"><i>*Notes: Pastikan resolusi gambar tidak lebih dari 1920 x 1080, dan size gambar tidak lebih dari 2MB</i></p>
      <form method="POST" action="{{ action('CoverController@update', $cover->id) }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
          <label for="cover" class="col-md-4 col-form-label text-md-right">Image</label>

          <div class="col-md-6">
              <input type="file" name="cover" class="form-control-file">
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