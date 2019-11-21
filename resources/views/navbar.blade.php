<nav class="limiter-menu-desktop p-l-45">                 
    <!-- Logo desktop -->       
    <div style="width: 300px; height: 100px;position: relative; margin: 0; ">
        <a href="{{url('/')}}" class="logo" style=" position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <img src="{{asset('images/icons/logo-etal.png')}}" alt="IMG-LOGO" style="max-height: 60px;">
        </a>
    </div>

    <!-- Menu desktop -->
    <div class="menu-desktop" style="margin: auto;">
        <ul class="main-menu">
            <li>
                <a href="{{url('/')}}">HOME</a>
            </li>
            <li>
                <a href="{{url('/shop')}}">SHOP</a>
                <ul class="sub-menu">
                    <li><a href="{{action('PagesController@category',3)}}">Top</a></li>
                    <li><a href="{{action('PagesController@category',4)}}">Bottom</a></li>
                    <li><a href="{{action('PagesController@category',5)}}">Accesories</a></li>
                    <li><a href="{{action('PagesController@category',6)}}">Sale</a></li>
                </ul>
            </li>
            <li>
                <a href="" data-toggle="modal" data-target="#exampleModal">ORDER</a>
            </li>
            <li>
                <a href="{{url('/about')}}">ABOUT</a>
            </li>
            <li>
                <a href="{{url('/contact')}}">CONTACT</a>
            </li>
            <li>
                <a href="{{url('/contributors')}}">CONTRIBUTOR</a>
            </li>
        </ul>
    </div>  

    <!-- Icon header -->
    <div style="width: 300px;height: 100px; ">
        <div class="wrap-icon-header flex-w flex-r-m h-full">       
            <div class="flex-c-m h-full p-r-25 ">
                <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-modal-search" >
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div>              
            <div class="flex-c-m h-full p-r-25 p-l-25 ">
                <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{ count((array)session('cart')) }}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>
                
            <div class="flex-c-m h-full p-lr-19">
            </div>
        </div>
    </div>
</nav>