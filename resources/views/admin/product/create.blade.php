@extends('admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Product Data</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('ProductController@store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  placeholder="Product Name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">Brand</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand"  placeholder="Brand" required>

                                @if ($errors->has('brand'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select class="btn dropdown-toggle" id="sizeSelectBox" name="category" required>
                                    <option value="" disabled="" selected="">Choose One</option>
                    
                                    <option value="top">Top</option>
                                    <option value="bottom">Bottom</option>
                                    <option value="accessories">Accessories</option>

                                </select>

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input id="price" data-type="currency" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price"  placeholder="Price" required>
                                </div>
                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="textarea" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description"  placeholder="Describe your product here" required></textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="size" class="col-md-4 col-form-label text-md-right">Size</label>

                            <div class="col-md-6">
                                <div id="size" class="text-center" style="padding-top: 10px;">
                                    <i id="helper">Select Category First</i>
                                
                                <span class="border border-dark rounded" id="checkboxTop" style="margin-right:5px; display: none;">
									<label class="checkbox-inline" style="padding-right: 5px;padding-left: 5px;"><input id="checkboxXS" name="xs" type="checkbox" value="1">XS</label>
									<label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxS" name="s" type="checkbox" value="1">S</label>
									<label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxM" name="m" type="checkbox" value="1">M</label>
									<label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxL" name="l" type="checkbox" value="1">L</label>
									<label class="checkbox-inline" style="padding-right: 5px;"><input id="checkboxXL" name="xl" type="checkbox" value="1">XL</label>
                                </span>
                                
                                <span class="border border-dark rounded" id="checkboxAcc" style="display: none;">
                                    <label class="checkbox-inline" style="padding-right: 5px;padding-left: 5px;"><input id="none" name="none" type="checkbox" value="1" >NONE</label>
                                </span>
                            	
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">Stock</label>

                            <div class="col-md-8" id="notNONE">
                                <div class="row">
                                    <div class="col-md-3" id="stockXS" style="display: none;">
                                        <input type="number" min="0" max="999" class="form-control" value="0" name="stockXS"  placeholder="Stock">
                                        <p class="text-center"><i>XS</i></p>
                                    </div>
                                    <div class="col-md-3" id="stockS" style="display: none;">
                                        <input type="number" min="0" max="999" class="form-control" value="0" name="stockS"  placeholder="Stock">
                                        <p class="text-center"><i>S</i></p>
                                    </div>
                                    <div class="col-md-3" id="stockM" style="display: none;">
                                        <input type="number" min="0" max="999" class="form-control" value="0" name="stockM"  placeholder="Stock">
                                        <p class="text-center"><i>M</i></p>
                                    </div>
                                    <div class="col-md-3" id="stockL" style="display: none;">
                                        <input type="number" min="0" max="999" class="form-control" value="0" name="stockL"  placeholder="Stock" >
                                        <p class="text-center"><i>L</i></p>
                                    </div>
                                    <div class="col-md-3" id="stockXL" style="display: none;">
                                        <input  type="number" min="0" max="999" class="form-control" value="0" name="stockXL"  placeholder="Stock">
                                        <p class="text-center"><i>XL</i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8" id="forNONE" style="display: none;">
                                <div class="col-md-3">
                                    <input type="number" min="0" max="999" class="form-control" value="0" name="stockNONE" placeholder="StockNONE">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">Color</label>

                            <div class="col-md-6">
                                <select class="btn  dropdown-toggle" id="color" name="color">
                                    <option value="" disabled="" selected="">Choose One</option>
                    
                                    <option value="Red" style="background-color: red; color: white;">Red</option>
                                    <option value="Orange" style="background-color: orange; color: white;">Orange</option>
                                    <option value="Yellow" style="background-color: yellow; color: white;">Yellow</option>
                                    <option value="Green" style="background-color: green; color: white;">Green</option>
                                    <option value="Blue" style="background-color: blue; color: white;">Blue</option>
                                    <option value="Purple" style="background-color: purple; color: white;">Purple</option>
                                    <option value="Pink" style="background-color: pink; color: white;">Pink</option>
                                    <option value="Brown" style="background-color: brown; color: white;">Brown</option>
                                    <option value="Black" style="background-color: black; color: white;">Black</option>
                                    <option value="White" style="background-color: white; color: black;">White</option>
                                    <option value="Grey" style="background-color: grey; color: white;">Grey</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                            <div class="col-md-6">
                                <select class="btn  dropdown-toggle" id="gender" name="gender">
									<option value="" disabled="" selected="">Choose One</option>
					
									<option value="men">Male</option>
									<option value="women">Female</option>
									<option value="unisex">Unisex</option>

								</select>
                            </div>
                        </div>

                        <div class="form-group row">
                        	<label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                        	<div class="col-md-6">
	                            <input type="file" name="image[]" class="form-control-file" multiple="true">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        Please correct following errors:
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
	                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="sizeguide" class="col-md-4 col-form-label text-md-right">Size Guide</label>

                            <div class="col-md-6">
                                <input type="file" name="sizeguide" class="form-control-file">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        Please correct following errors:
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fitguide" class="col-md-4 col-form-label text-md-right">Fit Guide</label>

                            <div class="col-md-6">
                                <select class="btn  dropdown-toggle" id="fitguide" name="fitguide">
                                    <option value="" disabled="" selected="">Choose One</option>
                    
                                    <option value="" disabled="">------Men------</option>
                                    <option value="1">T-Shirt</option>
                                    <option value="2">Hoodie</option>
                                    <option value="3">Zipper</option>
                                    <option value="4">Sweat Shirt</option>
                                    <option value="5">Shirt</option>
                                    <option value="6">Long Pants</option>
                                    <option value="7">Short Pants</option>
                                    <option value="" disabled="">----Women----</option>
                                    <option value="8">T-Shirt</option>
                                    <option value="9">Hoodie</option>
                                    <option value="10">Zipper</option>
                                    <option value="11">Sweat Shirt</option>
                                    <option value="12">Shirt</option>
                                    <option value="13">Long Pants</option>
                                    <option value="14">Short Pants</option>

                                </select>
                            </div>
                        </div>

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
        </div>
    </div>
</div>

@endsection
