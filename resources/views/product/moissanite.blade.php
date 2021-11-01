@extends('layouts.product')

@section('include')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/p_moissanite.css?'.time().'') }}">


@endsection

@foreach ($gems as $gem)

@section('page-title')
Forever One {{ $gem->shape }} Moissanite Diamond Jewelry Canada
@endsection

@section('page-description')
Shop Forever One Shape {{ $gem->shape }} Cut Style Moissanite Brilliant Cut Diamond Stones.Forever Brilliant Moissanite Engagement Rings Canada Surrey Vancouver Langley
@endsection


@section('canonical')
<link rel="canonical" href="https://www.exceljewellers.com/moissanite/{{ $gem->id }}">
@endsection
@endforeach

@section('main')
    <link rel="stylesheet" href="{{ asset('css/magnify.css?12') }}">
    <script src="{{ asset('js/jquery.magnify.js?1') }}"></script>
    
    <div class="add-cart-notification">
        <span class="icon-close notification-close"></span>
        <img class="img-notification">
        <div class="add-cart-name"></div>
        <div>Added To <a class="your-cart" href="{{url('/shopcart')}}">Your Cart</a></div>
    </div>

    <div class="main-stage-container">
        @include('include.stage')
    </div>
    @foreach ($gems as $gem)

    <div class="setting-popup">
        <div class="setting-background"></div>
        <div class="setting-inner">
            <div class="stone-inside">
                <div>
                    @if(session('create_ring.stone'))
                    <div>
                        <div><img class="popup-stone" src="{{ asset('storage/image/moissanite/gem-shape/'.$gem->shape.'.jpg') }}"></div>
                    </div>
                    <button class="select-gemstone" id="{{$gem->item_sku}}">CHANGE STONE</button>
                    @elseif(session('create_ring.engagement-ring'))
                    <div>
                        <div><img class="popup-stone" src="{{ asset('storage/image/moissanite/gem-shape/'.$gem->shape.'.jpg') }}"></div>
                    </div>
                    <button class="select-gemstone" id="{{$gem->item_sku}}">ADD STONE</button>
                    @else
                    <div>
                        <div><img class="popup-stone" src="{{ asset('storage/image/engagement-ring/ER6666W44JJ-2.jpg') }}"></div>
                    </div>
                    <button class="select-gemstone" id="{{$gem->item_sku}}">ADD WITH SETTING</button>
                    @endif
                </div>
                <div class="or-ctn">OR</div>
                <div>
                    <div><img class="popup-stone" src="{{ asset('storage/image/moissanite/gem-shape/'.$gem->shape.'.jpg') }}"></div>
                    <button class="buy-gem" id="{{$gem->item_sku}}">BUY JUST THIS STONE</button>
                </div>
            </div>
        </div>
    </div>

    <div id="item-container">
        
        <div class="item-image">
            @if($gem->video_link)
           <!--  <video width="100%" autoplay loop muted playsinline>
            <source src="{{ asset('storage/image/moissanite/'.$gem->video_link.'.mp4') }}" type="video/mp4">
            </video> -->
            <div class="cloudimage-360" data-folder="{{url('storage/image/moissanite/'.$gem->video_link.'/')}}/" data-filename="{index}.jpg" data-amount="{{$imgc}}" data-spin-reverse autoplay data-speed="200" data-drag-speed="300"></div>
            @else
            <img class="main-image" alt='' width="100%" id="" alt='{{$gem->MM}} {{$gem->shape}} {{$gem->weight}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ asset('storage/image/moissanite/'.$gem->img_link.'.jpg') }}">
            @endif
            <div class="image-list">
                    <div class="other-img-ctn"><img class="other-img main-selected" alt='{{$gem->MM}} {{$gem->shape}} {{$gem->weight}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ asset('storage/image/moissanite/'.$gem->img_link.'.jpg') }}"></div>

                    <div class="other-img-ctn">
                        <video width="100%" autostart="false" muted>
                        <source src="{{ asset('storage/image/moissanite/'.$gem->video_link.'.mp4') }}" type="video/mp4">
                        </video>
                    </div>

 
            </div>

        </div>
        <div class="selection-container">
            <div class="moissanite-name">{{ $gem->MM }}MM {{ $gem->shape }} Moissanite</div>
            <hr class="selection-hr">
            <div>
               
            </div>
            <div class="price">{{session('currency')}} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($gem->currency,$gem->price,session('currency')),2) }}</span></div>

            <div class="size-container">
                <select onchange="location = this.value;">
                    <option class="size-disabled" disabled selected="true">Stone Size</option>
                    @foreach($size as $s)
                    <option value="{{url('/moissanite/'.$s->id)}}">{{ $s->MM }}</option>
                    @endforeach
                </select>
            </div>
           

            <button class="select-stone" id="{{$gem->id}}">Choose Stone</button>
            @auth
            <button id="{{$gem->item_sku}}" class="favourite"><span class="icon-heart-o"></span></button>
            @endauth
            @guest
            <a href="{{ url('/login') }}"><button class="favourite"><span class="icon-heart-o"></span></button></a>
            @endguest
            <div class="social-media">
                <ul>
                    <li class="special-order"><span class="icon-hammer"></span> Special Order</li>
                    @include('include.product-icon')

                <div class="social-media-ctn">

                    <div>
                        <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$gem->MM.' MM '.$gem->shape.' Moissanite💎%20%7C%20'.url()->current()}}" data-size="large"></a>
                    </div>

                    <div>
                        <a data-pin-do="buttonBookmark" data-pin-tall="true" href="https://www.pinterest.com/pin/create/button/"></a>
                    </div>

                    <div>
                        <iframe src="https://www.facebook.com/plugins/share_button.php?href={{url()->current()}}&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:visible;vertical-align: top;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>

                </div>

                </ul>
            </div>
        
        
        </div>
    </div>
    @endforeach
    @foreach($gems as $gem)
    <div class="details-container">
        <div class="details-title">PRODUCT DETAILS</div>
        <div class="details-inner">
            <div class="details-case">
                <div><b class="sub-title">STONE DESCRIPTION</b></div>
                <hr>
                {{ $gem->MM }}MM {{ $gem->type }} Moissanite
            </div>
            <div class="details-case">
                <div><b class="sub-title">STONE DETAILS</b></div>
                <hr>
                <div><b>SKU:</b> <span class="item_sku">{{ $gem->item_sku }}</span></div>
                <script type="text/javascript">
                    localStorage.setItem("item_sku",$('.item_sku').text());
                </script>
                <div><b>Style:</b> {{ $gem->type }}</div>
                <div><b>Shape:</b> {{ $gem->shape }}</div>
                <div><b>Grade:</b> D-E-F Colour</div>
                <div><b>Carat:</b> {{ $gem->carat }}</div>
                <div><b>Width:</b> {{ $gem->MM }}mm</div>
                <div><b>Brand:</b> <img class="logo-corner" src="{{ url('storage/image/logo/charlescolvard.svg') }}"></div>
            </div>

        </div>
    </div>
    @endforeach
    
    <div class="review">
        <div class="customer-review-title">CUSTOMER REVIEWS</div>
        
        @if(count($reviews) > 0)
        <div class="review-container">
            
            @foreach($reviews as $reviews)
            <div class="review-inner">
                <div class="review-comment">
                        @for($i = 0; $i < $reviews->ratings; $i++)
                        <span class="yellow">★</span>
                        @endfor
                        @php
                        $missing = 5 - $i 
                        @endphp

                        @for($i = 0; $i < $missing; $i++)
                        <span class="grey">★</span>
                        @endfor
                        <div>{{ \Carbon\Carbon::parse($reviews->created_at)->format('M d, Y') }}</div>
                        <div class="review-img">
                            <img src="{{ asset('storage/image/page_img/profile.jpg') }}">
                        </div>
                        <div>{{ $reviews->comment }}</div>
                        <div>{{ $reviews->name }}</div>
                </div>
            </div>
            @endforeach
        </div>    
        @else
        <div class="no-review">No Reviews</div>
        @endif

    </div>

    @include('include.shipping-info')
    <div class="other-container">
        <div class="similar-title">SIMILAR PRODUCTS</div>

        <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
         @foreach($similar as $similar)
          <div class="carousel-cell">
            <a href="{{url('/moissanite/'.$similar->id)}}">
              <img alt="{{$similar->type}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/moissanite/'.$similar->img_link.'.jpg') }}">
            </a>
              <h3 class="recently-title">{{$similar->MM}}MM {{$similar->type}}</h3>
              <p class="price">${{ number_format(\App\Helper\AppHelper::conversion($similar->currency,$similar->price,session('currency')),2) }}</p>
          </div>
          @endforeach
          </div>
    </div>
<script type="text/javascript" src="{{ URL::asset('js/p_moissanite.js?'.time().'') }}"></script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<script src="{{ URL::asset('js/360.js?'.time().'') }}"></script>
<script type="text/javascript">
    window.CI360.init();
</script>
@endsection