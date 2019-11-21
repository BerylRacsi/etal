@extends('admin.master')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a class="btn btn-success float-right btn-sm" href="{{ url('/admin/product/create') }}"><i class="fa fa-plus-circle"></i> Add New Product</a>
            <i class="fas fa-table"></i>
            Products List</div>
          <div class="card-body">

            
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Size/Stock</th>
                    <th>Color</th>
                    <th>Gender</th>
                    <th>Preview</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Size/Stock</th>
                    <th>Color</th>
                    <th>Gender</th>
                    <th>Preview</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>

                @foreach($products as $product)
                  
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->brand}}</td>
                        <td>{{$product->category}}</td>
                        <td>
                                @php
                                    echo "Rp.".(number_format($product->price));
                                @endphp</td>
                        <td>
                            @if ($product->xs == 1)
                                <strong style="text-align:left;">
                                    XS
                                    <span style="float:right;">
                                        : 
                                        @foreach($stocks as $stock)
                                            @if($product->id == $stock->id_product)
                                                @if($stock->size == "XS")
                                                    {{$stock->amount}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </span>
                                </strong><br>
                            @endif
                            @if ($product->s == 1)
                                <strong style="text-align:left;">
                                    S
                                    <span style="float:right;">
                                        : 
                                        @foreach($stocks as $stock)
                                            @if($product->id == $stock->id_product)
                                                @if($stock->size == "S")
                                                    {{$stock->amount}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </span>
                                </strong><br>
                            @endif
                            @if ($product->m == 1)
                                <strong style="text-align:left;">
                                    M
                                    <span style="float:right;">
                                        : 
                                        @foreach($stocks as $stock)
                                            @if($product->id == $stock->id_product)
                                                @if($stock->size == "M")
                                                    {{$stock->amount}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </span>
                                </strong><br>
                            @endif
                            @if ($product->l == 1)
                                <strong style="text-align:left;">
                                    L
                                    <span style="float:right;">
                                        : 
                                        @foreach($stocks as $stock)
                                            @if($product->id == $stock->id_product)
                                                @if($stock->size == "L")
                                                    {{$stock->amount}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </span>
                                </strong><br>
                            @endif
                            @if ($product->xl == 1)
                                <strong style="text-align:left;">
                                    XL
                                    <span style="float:right;">
                                        : 
                                        @foreach($stocks as $stock)
                                            @if($product->id == $stock->id_product)
                                                @if($stock->size == "XL")
                                                    {{$stock->amount}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </span>
                                </strong><br>
                            @endif
                            @if ($product->none == 1)
                                <strong style="text-align:left;">
                                    N
                                    <span style="float:right;">
                                        : 
                                        @foreach($stocks as $stock)
                                            @if($product->id == $stock->id_product)
                                                @if($stock->size == "NONE")
                                                    {{$stock->amount}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </span>
                                </strong><br>
                            @endif
                        </td>
                        <td>{{$product->color}}</td>
                        <td>{{$product->gender}}</td>
                        <td>
                            <div class="col-md-4">
                                <img src="{{ url('/',$product->thumbnail) }}" class="img-responsive" style="max-width: 120px; max-height: 140px;">
                            </div>
                        </td>
                        <td >
                            <a class="btn btn-info btn-sm btn-block js-show-modal1" href="/admin/product/{{$product->id}}">Detail</a>
                            <a class="btn btn-primary btn-sm btn-block" href="/admin/product/{{$product->id}}/edit">Edit</a>
                            <br>
                            <form action="{{action('ProductController@destroy', $product->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-sm btn-block btn-danger" type="submit" >Delete</button>
                            </form>
                        </td>
                    </tr>
                  
                @endforeach  

                </tbody>
              </table>
            </div>
          </div>
        </div>

 
@endsection

