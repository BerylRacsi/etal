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
            Order - {{$order->order_number}}</div>
        <div class="card-body">
            <table class="table table-bordered" width="100%" cellspacing="0" style="table-layout: fixed;">
                <tbody>
                    <tr >
                        <td class="text-center" width="40%"><strong>Order ID</strong></td>
                        <td width="60%">{{$order->order_number}}</td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%"><strong>Nama Pemesan</strong></td>
                        <td width="60%">{{$order->name}}</td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%"><strong>Nomor Telepon</strong></td>
                        <td width="60%">{{$order->phone}}</td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%"><strong>Email</strong></td>
                        <td width="60%">{{$order->email}}</td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%" style="vertical-align: middle;"><strong>Alamat</strong></td>
                        <td width="60%">{{$order->address}}, {{$order->kecamatan}}, {{$order->kabupaten}}</td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%"><strong>Kode Pos</strong></td>
                        <td width="60%">{{$order->zip}}</td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%" style="vertical-align: middle;"><strong>Pesanan</strong></td>
                        <td width="60%">
                            @php
                                echo str_replace(",", "<br>", $order->order);
                            @endphp
                        </td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%"><strong>Total Pesanan</strong></td>
                        <td width="60%">Rp. {{$order->harga}} ,-</td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%"><strong>Tanggal Pesan</strong></td>
                        <td width="60%">{{$order->created_at}}</td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%"><strong>Catatan Pembeli</strong></td>
                        <td width="60%">{{$order->note}}</td>
                    </tr>
                    <tr>
                        <td class="text-center" width="40%"><strong>Nomor Resi</strong></td>
                        <td width="60%">
                            @isset($order->resi)
                            {{$order->resi}}
                            @endisset
                            @empty($order->resi)
                            <div class="text-center text-muted">-Belum Dikirim-</div>
                            @endempty
                        </td>
                    </tr>
                    <tr >
                        <td class="text-center" width="40%" style="vertical-align: middle;"><strong >Bukti Transfer</strong></td>
                        <td width="60%" >
                            @isset ($order->bukti)
                            <img src="{{asset($order->bukti)}}" style="width:100%;height: auto; max-width: 400px; display: block; margin: auto;">
                            @endisset
                            @empty($order->bukti)
                            <div class="text-center text-muted">-Belum upload bukti transfer-</div>
                            @endempty
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



 
@endsection

