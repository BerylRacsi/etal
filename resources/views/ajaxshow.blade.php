@foreach($products as $product)
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->gender}} {{$product->category}}">
    <!-- Block2 -->
    <div class="block2 border-button">
        <div class="block2-pic hov-img0" >
            <img src="{{url ($product->thumbnail) }}" alt="IMG-PRODUCT">

            <a href="javascript:void(0)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 show-modal" 
            data-id="{{$product->id}}" 
            data-price="{{$product->price}}" 
            data-name="{{$product->name}}" 
            data-content="{{$product->description}}" 
            data-image="{{$product->image}}" 
            data-xs="{{$product->xs}}"
            data-s="{{$product->s}}"
            data-m="{{$product->m}}"
            data-l="{{$product->l}}"
            data-xl="{{$product->xl}}"
            >
                Quick View
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="/product/{{ $product->id }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{ $product->name }}
                </a>

                <span class="stext-105 cl3">
                    Rp.
                @php
                    echo (number_format($product->price).".00");
                @endphp
                </span>
            </div>
        </div>
    </div>
</div>
@endforeach
    