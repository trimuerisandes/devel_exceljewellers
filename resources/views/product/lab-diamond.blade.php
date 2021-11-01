@extends('layouts.product')

@section('include')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/p_gemstone.css?'.time().'') }}">
@endsection

@foreach ($gems as $gem)

@section('page-title')
Lab Created {{ $gem->shape }} Diamond Gemstone Jewelry Canada
@endsection

@section('page-description')
Shop Lab Grown Created {{ $gem->shape }} Cut Style Diamond Gemstone Stones.Man created synthetic gemstone Engagement Rings Canada Surrey Vancouver Langley
@endsection


@section('canonical')
<link rel="canonical" href="https://www.exceljewellers.com/gemstone/{{ $gem->id }}">
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
            @if($gem->company == "Valour")
            <div class="parent">
                <iframe src="{{$gem->video_link}}"></iframe>
            </div>
            @elseif($gem->company == "Stuller")
            <video width="100%" autoplay loop muted playsinline>
            <source src="{{ $gem->video_link }}" type="video/mp4">
            </video>
            @endif
            @else
            <img class="main-image" alt='' width="100%" id="" alt='{{$gem->width}} {{$gem->shape}} {{$gem->carat}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ $gem->img_link }}">
            @endif
            

            <div class="image-list">
                    <div class="other-img-ctn"><img class="other-img main-selected" alt='{{$gem->width}} {{$gem->shape}} {{$gem->carat}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ $gem->img_link }}"></div>

                    <div class="other-img-ctn">
                        <video width="100%" autostart="false" muted>
                        <source src="{{ $gem->video_link }}" type="video/mp4">
                        </video>
                    </div>

 
            </div>

        </div>
        <div class="selection-container">
            <div class="gemstone-name">{{$gem->carat}} CT {{$gem->clarity}} {{$gem->color}} Color {{$gem->shape}} Lab Grown Diamond</div>
            <hr class="selection-hr">
            <div>
               
            </div>
            <div class="price">{{ session('currency') }} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($gem->currency,$gem->price,session('currency')),2) }}</span></div>

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
                    <li><span class="icon-cart"></span> Free Shipping On Orders Over $500</li>
                    <br>
                    <li><a href="{{ url('contact')}}"><span class="icon-mail-envelope-closed"></span> Email Us</a></li>
                    <br>
                    <li><a href="{{ url('contact')}}"><span class="icon-phone"></span> Call Us</a></li>


                    <div class="social-media-ctn">

                    <div>
                        <a class="twitter-share-button"
                    href="https://twitter.com/intent/tweet?text={{$gem->carat.' CT '.$gem->clarity.' '.$gem->color.' Color '.$gem->shape.' Lab Grown Diamond💎%20%7C%20'.url()->current()}}"
                    data-size="large"></a>
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
                {{$gem->carat}} CT {{$gem->clarity}} {{$gem->color}} color {{$gem->shape}} Lab Grown Diamond
            </div>
            <div class="details-case">
                <div><b class="sub-title">STONE DETAILS</b></div>
                <hr>
                <div><b>SKU:</b> <span class="item_sku">{{ $gem->item_sku }}</span></div>
                <script type="text/javascript">
                    localStorage.setItem("item_sku",$('.item_sku').text());
                </script>
                <div><b>Shape:</b> {{ $gem->shape }}</div>
                <div><b>Carat:</b> {{ $gem->carat }}</div>
                <div><b>Color:</b> {{ $gem->color }}</div>
                <div><b>Clarity:</b> {{ $gem->clarity }}</div>
                @if($gem->cut)
                <div><b>Cut:</b> {{ $gem->cut }}</div>
                @endif
                @if($gem->polish)
                <div><b>Polish:</b> {{ $gem->polish }}</div>
                @endif
                <div>
                    <div class="gem-diagram-ctn">
                        <div class="top">{{ $gem->width }}mm</div>
                        <div class="side">{{ $gem->length }}mm</div>
                        <img class="gem-diagram" src="{{url('storage/image/moissanite/gem-shape/dimension/'.$gem->shape.'.png')}}">        
                    </div>
                </div>
            </div>





            <div class="details-case">
                <div><b class="sub-title">STONE CERTIFICATION</b></div>
                <hr>
                <div><b>Certificate Report:</b> <a href="{{$gem->report}}" target="_blank">Click To View Report</a></div>
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
            <a href="{{url('/lab-grown-diamond/'.$similar->id)}}">
              <img alt="{{$similar->shape}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ $similar->img_link }}">
            </a>
              <h3 class="recently-title">{{$similar->width}}MM {{$similar->shape}}</h3>
              <p class="price">${{ number_format(\App\Helper\AppHelper::conversion($similar->currency,$similar->price,session('currency')),2) }}</p>
          </div>
          @endforeach
          </div>
    </div>
<script type="text/javascript" src="{{ URL::asset('js/p_gemstone.js?'.time().'') }}"></script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
@endsection