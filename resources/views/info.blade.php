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
                    Help
                </h3>  
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">

                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#trackorder" role="tab">Track Order</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#return" role="tab">Returns</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#shipping" role="tab">Shipping</a>
                        </li>
                        <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#faq" role="tab">FAQs</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <div class="tab-pane fade show active" id="trackorder" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <div style="text-align: center; letter-spacing: 3px;">
                                    <b>How to track order :</b>
                                    <br><br>
                                    To track your order please click the button below, enter your Order ID and press the “Check" button.
                                    <br><br>
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal">Track Order</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="return" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <div style="text-align: justify; letter-spacing: 2px;">
                                    1. Bagaimana cara return pesanan saya?<br>
                                    Customer dapat menghubungi customer service et al. via media sosial atau whatsapp
                                    di nomor +62 87781550522 dengan melampirkan “No. Pesanan” untuk
                                    melakukan claim/penukaran.<br><br>
                                    2. Berapa lama proses return pesanan saya?<br>
                                    Customer Service et al. akan segera memproses penukaran segera setelah barang
                                    yang dikirimkan oleh customer diterima oleh pihak et al. .Proses penukaran barang
                                    berlangsung paling lama selama 7 hari kerja.<br><br>
                                    3. Bagaimana dengan pembayaran ongkos kirim ?<br>
                                    Customer tidak perlu menanggung ongkos kirim untuk pengiriman kembali karena
                                    akan dibebankan kepada pihak et al.<br><br>
                                    4. Apakah product et al. yang sudah dibeli dapat diuangkan?<br>
                                    Barang yang sudah dibeli tidak dapat diuangkan kembali/refund, mohon untuk
                                    mengecek lebih detail spesifikasi & size chart di setiap produk untuk meminimalisir
                                    kesalahan dalam memilih size ataupun produk.<br><br>
                                    5. Apa saja ketentuan agar return disetujui?<br>
                                    Berikut ini adalah ketentuan agar retur Anda disetujui:<br>
                                    <br><br><i><b>* </b></i>Proses retur harus dilakukan dalam waktu 1x24 jam setelah produk diterima
                                    customer.
                                    <br><br><i><b>* </b></i>Produk tidak dipakai/digunakan dan tetap dalam kemasan aslinya. Product yang
                                    direturn hanya akan diterima jika label/hangtag asli tidak sobek atau lepas.
                                    <br><br><i><b>* </b></i>Produk yang direturn harus lengkap semua bagiannya, dan dikemas kembali
                                    menggunakan kemasan et al.
                                    <br><br><i><b>* </b></i>Produk yang direturn akan diperiksa oleh Departemen Quality Assurance kami. Jika
                                    terdapat kerusakan pada produk dikarenakan cacat atau penyimpangan spesifikasi
                                    produksi, kami akan menerima return customer. Jika cacat produk bukan disebabkan
                                    oleh kualitas bahan atau proses penjahitan, produk tersebut akan dikembalikan
                                    kepada customer. 
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="shipping" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <div style="text-align: justify; letter-spacing: 2px;">
                                    1. Bagaimana dengan jadwal pengiriman product yang sudah di pesan?<br>
                                    Kami melayani pengiriman setiap hari (senin-minggu) untuk memberikan kepuasan
                                    kepada customer<br><br>
                                    2. Bagaimana sistem pembayaran pengiriman?<br>
                                    Kami memberikan free ongkos kirim kepada customer yang berbelanja produk kami.<br><br>
                                    3. Bagaimana jika customer ingin mendapatkan pengiriman product yang lebih cepat?<br>
                                    Biaya pengiriman express akan ditanggung customer.<br><br>
                                    4. Bagaimana jika saya merubah alamat pengiriman setelah order saya dalam proses pengiriman?<br>
                                    Mohon maaf, kami hanya mengirim ke alamat yang sudah disepakati saat order
                                    melalui website.<br><br>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="faq" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <div style="text-align: justify; letter-spacing: 2px;">
                                    1. Saya ingin memesan barang yang sudah habis, apakah itu memungkinkan?<br>
                                    Mohon maaf, barang yang sudah habis akan kembali dalam stok dalam jangka waktu
                                    yang tidak bisa ditentukan. Silahkan hubungi kami di website dan media social.<br><br>
                                    2. Bagaimana cara saya menentukan size saya?<br>
                                    Silahkan melihat sizing chart pada setiap product secara detail<br><br>
                                    3. Bagaimana jika saya merubah alamat pengiriman setelah order saya dalam proses
                                    pengiriman?<br>
                                    Mohon maaf, kami hanya mengirim ke alamat yang sudah disepakati saat order
                                    melalui website.<br><br>
                                    4. Berapa lama saya bisa mendapatkan barang pesanan saya?<br>
                                    Setelah anda memesan, transfer, dan mengkonfirmasi pembayaran anda, kami akan
                                    memproses order anda dalam 24 jam. Prosesnya adalah pengecekan pembayaran,
                                    persiapan, dan mengirim barang pesanan anda ke jasa pengiriman. Setelah itu, jasa 
                                    pengiriman membutuhkan waktu untuk mengirimkan nya, bervariasi mulai dari 1-5
                                    hari.<br><br>
                                    5. Bisakah saya mendapatkan barang pesanan saya lebih cepat?<br>
                                    Jika anda ingin untuk mendapatkan barang pesanan anda lebih cepat (lebih awal 2
                                    hari setelah melakukan konfirmasi pembayaran) silahkan hubungi customer service
                                    kami melalui media social dan website sebelum konfirmasi order.<br><br>
                                    6. Saya belum mendapatkan barang pesanan saya, sudah terlambat beberapa hari,
                                    dimanakah barang pesanan saya?<br>
                                    Silahkan hubungi kami melalui website dan media social. <br><br>
                                    7. Bisakah saya menukar atau mengembalikan barang sale?<br>
                                    Mohon maaf tidak bisa, barang sale tidak dapat ditukar atau dikembalikan.<br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
    