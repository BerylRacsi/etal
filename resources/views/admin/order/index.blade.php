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
            <i class="fas fa-dolly-flatbed"></i>
            Order List  </div>
        <div class="card-body">
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#sudah" role="tab"><strong>SUDAH BAYAR</strong></a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#belum" role="tab"><strong>BELUM BAYAR</strong></a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#kirim" role="tab"><strong>TERKIRIM</strong></a>
                    </li>
                </ul>
                <br>
                <div class="tab-content p-t-43">
                    <div class="tab-pane fade show active" id="sudah" role="tabpanel">
                        <a href="{{url('/admin/order/export_payed')}}" class="btn btn-primary btn-sm" style="margin: 0 auto; display: block; width: 100px;">
                            <i class="fas fa-download"></i> Excel
                        </a>
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                            <thead>
                              <tr>
                                <th>Order ID</th>
                                <th>Tanggal Pesan</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Order ID</th>
                                <th>Tanggal Pesan</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>

                            @foreach($orders as $order)
                              
                                <tr class="text-center">
                                    <td>{{$order->order_number}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>
                                        @if($order->validasi == 0)
                                            Belum Tervalidasi
                                        @else
                                            Tervalidasi
                                        @endif
                                    </td>
                                    <td >
                                        <a class="btn btn-info btn-sm btn-block" href="/admin/order/{{$order->order_number}}">Detail</a>
                                        @if($order->validasi == 0)
                                            <a class="btn btn-success btn-sm btn-block" href="/admin/order/validasi/{{$order->id}}">Validasi</a>
                                        @endif
                                        <btn class="btn btn-primary btn-sm btn-block show-modal-kirim" data-toggle="modal" data-target="#exampleModal" data-id="{{$order->order_number}}">Kirim</btn><br>
                                        <form action="{{action('OrderController@destroy', $order->id)}}" method="post">
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
                    <div class="tab-pane fade show" id="belum" role="tabpanel">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0" >
                            <thead>
                              <tr>
                                <th>Order ID</th>
                                <th>Tanggal Pesan</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Order ID</th>
                                <th>Tanggal Pesan</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>

                            @foreach($belum as $lum)
                              
                                <tr class="text-center">
                                    <td>{{$lum->order_number}}</td>
                                    <td>{{$lum->created_at}}</td>
                                    <td>{{$lum->name}}</td>
                                    <td>{{$lum->phone}}</td>
                                    <td>{{$lum->email}}</td>
                                    <td >
                                        <a class="btn btn-info btn-sm btn-block" href="/admin/order/{{$lum->order_number}}">Detail</a><br>

                                        <form action="{{action('OrderController@destroy', $lum->id)}}" method="post">
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
                    <div class="tab-pane fade show" id="kirim" role="tabpanel">
                        <a href="{{url('/admin/order/export_sent')}}" class="btn btn-primary btn-sm" style="margin: 0 auto; display: block; width: 100px;">
                            <i class="fas fa-download"></i> Excel
                        </a>
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0" >
                            <thead>
                              <tr>
                                <th>Order ID</th>
                                <th>Tanggal Pesan</th>
                                <th>Name</th>
                                <th>Resi</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Order ID</th>
                                <th>Tanggal Pesan</th>
                                <th>Name</th>
                                <th>Resi</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                            </tfoot>
                            <tbody>

                            @foreach($send as $sen)
                              
                                <tr class="text-center">
                                    <td>{{$sen->order_number}}</td>
                                    <td>{{$sen->created_at}}</td>
                                    <td>{{$sen->name}}</td>
                                    <td>{{$sen->resi}}</td>
                                    <td>{{$sen->phone}}</td>
                                    <td>{{$sen->email}}</td>
                                    <td >
                                        <a class="btn btn-info btn-sm btn-block" href="/admin/order/{{$sen->order_number}}">Detail</a><br>
                                        <form action="{{action('OrderController@destroy', $sen->id)}}" method="post">
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
            </div>    
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-top: 50px; padding-left: 70px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nomor Resi Pengiriman - </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{action('OrderController@store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="order_number" name="order_number">
            <input type="text" class="form-control" id="resi" name="resi" placeholder="Isi No. Resi">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

 
@endsection

