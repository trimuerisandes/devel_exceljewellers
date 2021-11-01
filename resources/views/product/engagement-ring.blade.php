@extends('layouts.product')

@section('include')

@endsection

@foreach ($settings as $setting)
@section('page-title')
{{ $setting->brand }} @if($setting->color == "Platinum")Platinum @else {{$setting->metal}} {{$setting->color}} Gold @endif{{$setting->style}} {{$setting->name}} Excel Jewellers Surrey Canada Langley Burnaby
@endsection

@section('page-description')
Designer @if($setting->color == "Platinum")Platinum @else {{$setting->metal}} {{$setting->color}} Gold @endif{{$setting->style}} {{$setting->name}} At Excel Jewellers Canada Langley Surrey Vancouver Burnaby Richmond Abbotsford
@endsection


@section('canonical')
<link rel="canonical" href="https://www.exceljewellers.com/engagement-ring/{{ $setting->item_sku }}">
@endsection
@endforeach

@section('main')

<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/p_engagement-ring.css?'.time().'') }}">
    <link rel="stylesheet" href="{{ asset('css/magnify.css?12') }}">
    <script src="{{ asset('js/jquery.magnify.js?1') }}"></script>
    <!-- Optional mobile plugin (uncomment the line below to enable): -->
    <!-- <script src="/js/jquery.magnify-mobile.js"></script> -->
    <div class="add-cart-notification">
        <span class="icon-close notification-close"></span>
        <img class="img-notification">
        <div class="add-cart-name"></div>
        <div>Added To <a class="your-cart" href="{{url('/shopcart')}}">Your Cart</a></div>
    </div>
    
    <div class="main-stage-container">
        @include('include.stage')
    </div>
    @foreach ($settings as $setting)

    <div class="setting-popup">
        <div class="setting-background"></div>
        <div class="setting-inner">
            <div class="setting-inside">
                <div>
                    @if(session('create_ring.engagement-ring'))
                    <div><img class="popup-set" src="{{ asset('storage/image/engagement-ring/'.$setting->image.'-1.jpg') }}"></div>
                    <button class="select-setting" id="{{$setting->item_sku}}">CHANGE SETTING</button>
                    @elseif(session('create_ring.stone'))
                    <div><img class="popup-set" src="{{ asset('storage/image/engagement-ring/'.$setting->image.'-1.jpg') }}"></div>
                    <button class="select-setting" id="{{$setting->item_sku}}">ADD SETTING</button>
                    @else
                    <div>
                        <img class="popup-stone" src="{{ asset('storage/image/moissanite/gem-shape/'.$setting->stoneshape.'.jpg') }}">
                    </div>
                    <button class="select-setting" id="{{$setting->item_sku}}">ADD WITH STONE</button>
                    @endif
                </div>
                <div class="or-ctn">OR</div>
                <div>
                    <div>
                        <img class="popup-stone" src="{{ asset('storage/image/moissanite/gem-shape/'.$setting->stoneshape.'.jpg') }}">
                    </div>
                    <button class="buy-setting" id="{{$setting->item_sku}}">BUY WITH FREE 6.5MM {{ strtoupper($setting->stoneshape) }} CZ CENTER STONE</button>
                </div>
            </div>
        </div>
    </div>


    <div id="item-container">
  
      <div class="item-image">
            
        <!-- <div class="cloudimage-360" data-folder="{{url('storage/image/engagement-ring/360/'.$setting->item_code.'/')}}/" data-filename="{index}.jpg" data-amount="66" data-spin-reverse autoplay data-speed="200" data-drag-speed="300"></div> -->
        <div class="main-image-container">
          <img class="main-image" alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" id="{{ $setting->name }}" src="{{ asset('storage/image/engagement-ring/'.$setting->image.'-1.jpg') }}" width="100%" data-magnify-src="{{ asset('storage/image/engagement-ring//'.$setting->image.'-1.jpg') }}">
        </div>

        <div class="main-carousel jewelry-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>

          <div class="jewelry-cell">
            <div class="other-img-ctn">
              <img alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img main-image-session" src="{{ asset('storage/image/engagement-ring/'.$setting->image.'-1.jpg') }}">
            </div>
          </div>

         @if(isset($setting->image_360))
            @if(file_exists('storage/image/engagement-ring-360/'.$setting->image_360.'') == true)
            <div class="jewelry-cell">
              <div class="other-img-ctn other-img-ctn-360">
                <div class="click-360">
                  <img class="img-360" src="{{ asset('storage/image/icons/360.jpg') }}">
                  <div class="icon-degrees"></div>
                </div>
              </div>
            </div>
            @endif
          @endif

          @for($i = 2; $i < 8; $i++)
            
              @if (@getimagesize(asset('storage/image/engagement-ring/'.$setting->image.'-'.$i.'.jpg')))
              <div class="jewelry-cell">
                <div class="other-img-ctn">
                  <img alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring/'.$setting->image.'-'.$i.'.jpg') }}">
                </div>
              </div>
              @else
                    @break
              @endif

          @endfor
         
          @if(!$vid->isEmpty())
          @foreach ($vid as $v)
          <div class="jewelry-cell">
            <div class="other-img-ctn video-ctn">
              <div class="icon-play" id="play-video"></div>
                <video class="other-video">
                    <source src="{{asset('storage/video/'.$v->video.'')}}" type="video/mp4">
                </video>
            </div>
          </div>
          @endforeach
          @endif

        </div> 

        </div>
        <div class="selection-container">
            <div class="eng-name"><span class="buy-eng-name">{{$setting->name}} </span>(Setting Only)</div>
            <hr class="selection-hr">
            <div>
                @for($i = 0; $i < $ratings; $i++)
                <span class="yellow">★</span>
                @endfor
                @php
                $missing = 5 - $i 
                @endphp

                @for($i = 0; $i < $missing; $i++)
                <span class="grey">★</span>
                @endfor
                Based on {{ count($reviews) }} Reviews
            </div>

            @if($setting->sale_price)
            <div class="limited-time">LIMITED TIME OFFER</div>
            <div class="price-cross">{{session('currency')}} $<span>{{ number_format(\App\Helper\AppHelper::conversion($setting->currency,$setting->price,session('currency')),2) }}</span></div>
            <div class="price">{{session('currency')}} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($setting->currency,$setting->sale_price,session('currency')),2) }}</span></div>
            @else
            <div class="price" id="{{ $setting->price }}">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($setting->currency,$setting->price,session('currency')),2) }}</div>
            @endif

            <div class="size-container">
                <select name="ring-size">
                    <option class="size-disabled" disabled selected="true">Ring Size</option>
                    <option value="3">Size - 3</option>
                    <option value="3.5">Size - 3.5</option>
                    <option value="4">Size - 4</option>
                    <option value="4.5">Size - 4.5</option>
                    <option value="5">Size - 5</option>
                    <option value="5.5">Size - 5.5</option>
                    <option value="6">Size - 6</option>
                    <option value="6.5">Size - 6.5</option>
                    <option value="7">Size - 7</option>
                    <option value="7.5">Size - 7.5</option>
                    <option value="8">Size - 8</option>
                    <option value="8.5">Size - 8.5</option>
                    <option value="9">Size - 9</option>
                    <option value="9.5">Size - 9.5</option>
                    <option value="10">Size - 10</option>
                    <option value="10.5">Size - 10.5</option>
                    <option value="11">Size - 11</option>
                    <option value="11.5">Size - 11.5</option>
                    <option value="12">Size - 12</option>
                    <option value="12.5">Size - 12.5</option>
                    <option value="13">Size - 13</option>
                    <option value="13.5">Size - 13.5</option>
                    <option value="14">Size - 14</option>
                    <option value="14.5">Size - 14.5</option>
                    <option value="15">Size - 15</option>
                </select>
            </div>

            <div class="engraving-container">
                <div class="engraving-title">Engraving</div>
                <input class="engraving-input" type="text" maxlength="15" name="engraving" placeholder="Min 15 Letters">
            </div>

            @if(!sizeof($metals) == 0)
            <div class="p-sub">Available In Metals</div>
            <div class="metal-container">

            @foreach($metals as $metal)
                @if($metal->color == "Platinum"||$metal->color == "platinum")
                <a href="{{url('/engagement-ring/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">PLAT</div></a>
                @else
                <a href="{{url('/engagement-ring/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">{{ $metal->metal }}{{ $metal->color[0] }}</div></a>
                @endif
            @endforeach

            </div>
            @endif
                @if(!sizeof($shape) == 0)
                <div class="p-sub">View In Other Shapes</div>
                <div class="shape-container">

                    <div class="selected">
                        <span class="icon-{{strtolower($setting->stoneshape)}}"></span>
                        <p>{{$setting->stoneshape}}</p>
                    </div>

                    @foreach($shape as $s)
                        <a href="{{url('/engagement-ring/'.$s->item_sku)}}">
                            <div>
                                <span class="icon-{{strtolower($s->stoneshape)}}"></span>
                                <p>{{$s->stoneshape}}</p>
                            </div>
                        </a>
                    @endforeach
                  
                </div>
            @endif

    
            <button class="select-setting-pop">Choose This Setting</button>
            @auth
            <button id="{{$setting->item_sku}}" class="favourite"><span class="icon-heart-o"></span></button>
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
                            <a class="twitter-share-button"
                        href="https://twitter.com/intent/tweet?text={{$setting->brand.' '.$setting->name.'💍%20%7C%20'.url()->current()}}"
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

    <div class="details-container">
        <div class="details-title">PRODUCTS DETAILS</div>
        <div class="details-inner">
            <div class="details-case">
                <div><b class="sub-title">RING DESCRIPTION</b></div>
                <hr>
                {{ $setting->description }}
            </div>
            <div class="details-case">
                <div><b class="sub-title">RING DETAILS</b></div>
                <hr>
                <div class="product-details"><b>SKU:</b> <span class="item_sku">{{ $setting->item_sku }}</span></div>
                <script type="text/javascript">
                    localStorage.setItem("item_sku",$('.item_sku').text());
                </script>
                @if($setting->brand)
                <div class="product-details">
                    <b>Brand:</b>

                @if($setting->brand == 'Verragio')
                <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                @elseif($setting->brand == 'GabrielCo')
                <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                @elseif($setting->brand == 'Valina')
                <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                @elseif($setting->brand == 'Romance')
                <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                @elseif($setting->brand == 'SimonG')
                <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                @elseif($setting->brand == 'Malo')
                <img class="logo-corner" src="{{ url('storage/image/logo/malo.png') }}">
                @endif

                </div>
                @endif
                @if($setting->collection)
                <div class="product-details"><b>Collection:</b> {{ $setting->collection }}</div>
                @endif
                <div class="product-details"><b>Style:</b> {{ $setting->style }}</div>
                <div class="product-details"><b>Metal:</b>@if($setting->color == "Platinum"||$setting->color == "platinum") Platinum @else {{ $setting->metal }} {{ $setting->color }} gold @endif</div>
                @if($setting->carat)
                    @if($setting->carat > 0)
                <div class="product-details"><b>Carat:</b> {{ $setting->carat }}</div>
                    @endif
                @endif
                @if($setting->width)
                <div class="product-details"><b>Width:</b> {{ $setting->width }}mm</div>
                @endif
                @if($setting->setting_type)
                <div class="product-details"><b>Setting Type:</b> {{ $setting->setting_type }}</div>
                @endif
            </div>
            <div class="details-case">
                <div><b class="sub-title">CAN BE SET WITH</b></div>
                
                <hr>
                <div>
                    <div>{{ $setting->stoneshape }} <span class="icon-{{strtolower($setting->stoneshape)}}"></span></div>
                    @foreach($shape as $s)
                    <div>{{$s->stoneshape}} <span class="icon-{{strtolower($s->stoneshape)}}"></span></div>
                    @if($s->stoneshape == "Princess")
                    <div>Square <span class="icon-square"></span></div>
                    @endif
                    @endforeach
                </div>
                <div class="pink-disclaimer">*Can be set with center stone size from 0.50 ct to 1 carat. Other stone shape & sizes above 1 carat price maybe higher.</div>
                <div class="pink-disclaimer">*Other stone shape & sizes require a quotation</div>
            </div>
        </div>
    </div>
    @endforeach

    @if(count($pairs)>0)
        <div class="other-container">
            <div class="similar-title">MATCHING WEDDING BAND</div>

            <div class="pair-container">
             @foreach($pairs as $pair)
             <a href="{{url('/wedding-band/'.$pair->item_sku)}}">
              <div class="pair-cell">
                
                  <img style="width: 250px;" alt="{{$pair->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/wedding-band/'.$pair->image.'-1.jpg') }}">
                  <h3 class="recently-title">{{$pair->name}}</h3>
                  <p class="price">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($pair->currency,$pair->price,session('currency')),2) }}
                  </p>
              </div>
              </a>
              @endforeach
            </div>
        </div>
    @endif

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
                        <div>Brandon Khang</div>
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
            <a href="{{url('/engagement-ring/'.$similar->item_sku)}}">
              <img alt="{{$similar->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/engagement-ring/'.$similar->image.'-1.jpg') }}">
            </a>
              <h3 class="recently-title">{{$similar->name}}</h3>
              <p class="price">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($similar->currency,$similar->price,session('currency')),2) }}
              </p>
          </div>
          @endforeach
        </div>
    </div>

<script src="{{ URL::asset('js/360.js?'.time().'') }}"></script>

<script type="text/javascript">

    $(".main-image-container").css({'min-height':$('.main-image').innerHeight()+"px"});


  $('.img-360,.icon-degrees').click(function(){
    $('.img-360').css({ border: "solid 1px #d60d8c" });
    $(".other-img,.other-video").not(this).css({ border: "solid 1px #e6e6e6" })
    $('.main-image').remove();
    $('.main-image-container').append('<div class="main-image cloudimage-360" data-folder="{{url("storage/image/engagement-ring-360/".$setting->image_360."/")}}/" data-filename="{index}.jpg" data-amount="{{count(glob("storage/image/engagement-ring-360/".$setting->image_360."/*.jpg"))}}" data-spin-reverse autoplay data-speed="300" data-drag-speed="300"></div>');
    window.CI360.init();
  })


  $(".other-img").click(function (e) {
    $(this).css({ border: "solid 1px #d60d8c" }),
        $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
        $(".main-image").remove(),
        $(".main-image-container").append("<img class='main-image'>"),
        $(".main-image").attr("src", $(this).attr("src")).attr("data-magnify-src", $(this).attr("src")),
        $(".magnify-lens").css("background-image", "url(" + $(this).attr("src") + ")");

        // $('.main-image-container').css({'min-height':$('.main-image').innerHeight()+"px"});
});


$(".video-ctn video").click(function () {
    $(".main-image").length &&
        ($(this).css({ border: "solid 1px #d60d8c" }),
        $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
        $(".main-image").remove(),
        $(".main-image-container").append("<video class='main-image' controls autoplay><source src='" + $(this).get(0).currentSrc + "''></video>"));
});


</script>

<script type="text/javascript" src="{{ URL::asset('js/p_engagement-ring.js?'.time().'') }}"></script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>

@endsection