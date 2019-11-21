@extends('master')

@section('navbar')

    <div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>

@endsection

@section('content')

    <section class="bg0 p-t-100 p-b-60">
        <div class="container">

            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
             <div class="p-t-25 " style="text-align: center; letter-spacing: 5px;">
                <h3 class=" ltext-103 cl13">
                    ORDER COMPLETE
                </h3>
                <h5 class="p-t-40">
                    Thank you! We have successfully received your order
                </h5>    
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">

                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#complete" role="tab">Complete Order</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#orderdetail" role="tab">Order Detail</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <div class="tab-pane fade show active" id="complete" role="tabpanel">
                            <form method="POST" action="{{action('PagesController@upload')}}" enctype="multipart/form-data">
                                @csrf
                            <div class="how-pos2 p-lr-15-md">
                                <div class="row" >
                                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                        <h5 class="text-center mtext-115 cl13">Detail Pembayaran</h5><br>
                                        <table class="table" style="table-layout: fixed;">
                                            <tbody>
                                                <tr>
                                                    <td>Bank Tujuan</td>
                                                    <td style="text-align: right;">Bank BCA</td>
                                                </tr>
                                                <tr>
                                                    <td>Atas Nama</td>
                                                    <td style="text-align: right;">RAVIANDRI</td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Rekening</td>
                                                    <td style="text-align: right;">6145089631</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Pembayaran</td>
                                                    <td style="text-align: right;">
                                                    @php
                                                        echo "Rp.".$orders->harga.".-";
                                                    @endphp
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                        <h5 class="text-center mtext-115 cl3">Upload Bukti Transfer</h5><br>
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    Gambar bukti harus:<br>
                                                    <i>* </i> Ukuran maksimal 2MB<br>
                                                    <i>* </i> Format .JPEG, .JPG, .PNG
                                                </div>
                                            @endif
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control text-center" value="{{$orders->order_number}}" id="myOrder">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-outline-secondary" type="button" onclick="copyOrder()">
                                                                            <i class="fa fa-copy"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="file" name="bukti" class="form-control-file" multiple="true">
                                                            </div>
                                                        </div>
                                                        
                                                        <p>
                                                            <i style="color:red;">*</i> 
                                                            Copy dan simpan nomor order diatas untuk melakukan pengecekan status pesanan.
                                                        </p>
                                                        <p>
                                                            <i style="color:red;">*</i> 
                                                            Setelah anda menyelesaikan pembayaran, silahkan upload bukti transfer menggunakan tombol di bawah ini.
                                                        </p>
                                                        <p>
                                                            <i style="color:red;">*</i> 
                                                            Pesanan akan kami proses apabila bukti transfer telah kami terima dan terverifikasi.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <input type="hidden" name="order_number" value="{{$orders->order_number}}">
                                <input type="submit" class="flex-c-m stext-101 cl0 size-101 bg9 bor14 hov-btn1 p-lr-15 trans-04" style="margin: 0 auto; display: block;">
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane fade " id="orderdetail" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <div class="row" >
                                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                        <table class="table " style="table-layout: fixed;"> 
                                            <tbody>
                                                <tr>
                                                    <td scope="row">Order Number</td>
                                                    <td>{{$orders->order_number}}</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Nama Pemesan</td>
                                                    <td>{{$orders->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Pesanan</td>
                                                    <td>
                                                    @php
                                                        echo str_replace(",", "<br>", $orders->order);
                                                    @endphp
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Total</td>
                                                    <td>Rp.{{$orders->harga}},-</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Alamat Pengiriman</td>
                                                    <td>{{$orders->address}}, {{$orders->kecamatan}}, {{$orders->kabupaten}}</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row">Nomor Telepon</td>
                                                    <td>{{$orders->phone}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
    