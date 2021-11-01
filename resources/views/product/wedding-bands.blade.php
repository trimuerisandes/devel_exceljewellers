@extends('layouts.product')

@section('include')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/p_wedding-band.css?'.time().'') }}">
@endsection




@foreach ($bands as $band)
@section('page-title')
{{ $band->brand }} {{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif{{$band->style}} {{ $band->name }} Excel Jewellers Surrey Canada Langley Burnaby
@endsection

@section('page-description')
Designer {{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif{{$band->style}} {{ $band->name }} At Excel Jewellers Canada Langley Surrey Vancouver Burnaby Richmond Abbotsford
@endsection


@section('canonical')
<link rel="canonical" href="https://www.exceljewellers.com/wedding-band/{{ $band->item_sku }}">
@endsection
@endforeach

@section('main')
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

    <div id="item-container">
        @foreach ($bands as $band)
        <div class="item-image">

            <div class="main-image-container">
                <img class="main-image" alt='{{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif {{$band->style}} {{ $band->name }} Surrey Vancouver Canada Langley Burnaby Richmond' width="100%" id="{{ $band->name }}" src="{{ asset('storage/image/wedding-band/'.$band->image.'-1.jpg') }}">
            </div>

            <div class="main-carousel jewelry-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>

      

              <div class="jewelry-cell">
                <div class="other-img-ctn">
                  <img alt='{{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif {{$band->style}} {{ $band->name }} Surrey Vancouver Canada Langley Burnaby Richmond' class="other-img main-selected main-image-session" src="{{ asset('storage/image/wedding-band/'.$band->image.'-1.jpg') }}">
                </div>
              </div>


                @if(isset($band->image_360))
                      @if(file_exists('storage/image/wedding-band-360/'.$band->image_360.'') == true)
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
                
                  @if(@getimagesize(asset('storage/image/wedding-band/'.$band->image.'-'.$i.'.jpg')))
                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt='{{$band->metal}} {{$band->color}} @if($band->metal == "Cobalt") @else Gold @endif {{$band->style}} {{ $band->name }} Surrey Vancouver Canada Langley Burnaby Richmond' class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/wedding-band/'.$band->image.'-'.$i.'.jpg') }}">
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
            <div class="wedding-name">{{ $band->name }}</div>
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

            @if($band->sale_price)
            <div class="limited-time">LIMITED TIME OFFER</div>
            <div class="price-cross">{{session('currency')}} $<span>{{ number_format(\App\Helper\AppHelper::conversion($band->currency,$band->price,session('currency')),2) }}</span></div>
            <div class="price">{{session('currency')}} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($band->currency,$band->sale_price,session('currency')),2) }}</span></div>
            @else
            <div class="price">{{session('currency')}} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($band->currency,$band->price,session('currency')),2) }}</span></div>
            @endif

         <!--    <div class="quantity-container">
                <div>Quantity</div>
                <button class="quantity-btn quantity-minus">-</button><span class="quantity-num">1</span><button class="quantity-btn quantity-add">+</button>
            </div> -->

            @if($size)

            <div class="size-container">
                <select onchange="location = this.value;">
                    <option class="size-disabled" selected="true">Ring Size - {{ $band->size }}</option>
                    @foreach($size as $s)
                    <option value="{{url('/wedding-band/'.$s->item_sku)}}">Ring Size - {{ $s->size }}</option>
                    @endforeach
                </select>
            </div>

            @else
            <div class="size-container">
                <select>
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
            @endif

            <div class="engraving-container">
                <div class="engraving-title">Engraving</div>
                <input class="engraving-input" type="text" maxlength="15" name="engraving" placeholder="Min 15 Letters">
            </div>

            @if(!sizeof($metals) == 0)
                <div class="p-sub">Metals Available In</div>
                <div class="metal-container">
                @foreach($metals as $metal)
                    @if($metal->color == "Platinum"||$metal->color == "platinum")
                    <a href="{{url('/wedding-band/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">PLAT</div></a>
                    @else
                    <a href="{{url('/wedding-band/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">{{ $metal->metal }}{{ $metal->color[0] }}</div></a>
                    @endif
                @endforeach    
                </div>
            @endif

            
            @if(count($mm) > 0)
            <div class="p-sub">MM Available In</div>
            <div class="stones-container">
                <select onchange="location = this.value">
                        <option value="{{url('/wedding-band/'.$band->width.'')}}" class="width-case {{ $band->width }}">{{$band->width }} MM</option>
                    @foreach($mm as $m)
                        <option value="{{url('/wedding-band/'.$m->item_sku.'')}}" class="width-case {{ $m->width }}">{{ $m->width }} MM</option>
                    @endforeach   
                </select> 
            </div>
            @endif

            @if(count($thickness) > 0)
            <div class="p-sub">Thickness Available In</div>
            <div class="stones-container">
                <select onchange="location = this.value">
                        <option value="{{url('/wedding-band/'.$band->item_sku.'')}}" selected class="width-case {{ $band->thickness }}">{{$band->thickness }} MM</option>
                    @foreach($thickness as $t)
                        <option value="{{url('/wedding-band/'.$t->item_sku.'')}}" class="width-case {{ $t->thickness }}">{{ $t->thickness }} MM</option>
                    @endforeach   
                </select> 
            </div>
            @endif
            
            @if(count($carats)>0)
            <div class="p-sub">Carats Available In</div>
            <div class="carat-container">
                @foreach($carats as $carat)
                    @if($carat->carat != 0)
                    <a href="{{url('/wedding-band/'.$carat->item_sku.'')}}"><div class="carat-case {{ $carat->carat }}">{{ $carat->carat }} - CT</div></a>
                    @endif
                @endforeach    
            </div>
            @endif

            <button class="add-to-cart" id="{{$band->id}}">Add To Cart</button>
            @auth
            <button id="{{$band->item_sku}}" class="favourite"><span class="icon-heart-o"></span></button>
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
                            <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$band->brand.' '.$band->name.'💍%20%7C%20'.url()->current()}}" data-size="large"></a>
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

        @endforeach
        </div>
    </div>
    @foreach ($bands as $band)

    <div class="details-container">
        <div class="details-title">PRODUCT DETAILS</div>
        <div class="details-inner">
            <div class="details-case">
                <div><b class="sub-title">RING DESCRIPTION</b></div>
                <hr>
                {{ $band->description }}
            </div>
            <div class="details-case">
                <div><b class="sub-title">RING DETAILS</b></div>
                <hr>
                <div><b>SKU:</b> <span class="item_sku">{{ $band->item_sku }}</span></div>
                <script type="text/javascript">
                    localStorage.setItem("item_sku",$('.item_sku').text());
                </script>
                @if($band->brand)
                <div><b>Brand:</b>

                @if($band->brand == 'Verragio')
                <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                @elseif($band->brand == 'GabrielCo')
                <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                @elseif($band->brand == 'Valina')
                <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                @elseif($band->brand == 'Romance')
                <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                @elseif($band->brand == 'SimonG')
                <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                @elseif($band->brand == 'Malo')
                <img class="logo-corner" src="{{ url('storage/image/logo/malo.png') }}">
                @endif

                </div>
                @endif
                <div><b>Style:</b> {{ $band->style }}</div>
                <div><b>Metal:</b>@if($band->color == "Platinum"||$band->color == "platinum") Platinum @else {{ $band->metal }} {{ $band->color }} @if($band->metal == "Cobalt") @else Gold @endif @endif</div>
                @if($band->carat)
                <div><b>Carat:</b> {{ $band->carat }}</div>
                @endif
                @if($band->width)
                <div><b>Width:</b> {{ $band->width }}mm</div>
                @endif
                @if($band->thickness)
                <div><b>Thickness:</b> {{ $band->thickness }}mm</div>
                @endif
            </div>

        </div>
    </div>
    @endforeach

    @if(count($pairs)>0)
        <div class="other-container">
            <div class="similar-title">MATCHING ENGAGEMENT RING</div>

            <div class="pair-container">
             @foreach($pairs as $pair)
             <a href="{{url('/engagement-ring/'.$pair->item_sku)}}">
              <div class="pair-cell">
                
                  <img style="width: 250px;" alt="{{$pair->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/engagement-ring/'.$pair->image.'-1.jpg') }}">
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
            <a href="{{url('/wedding-band/'.$similar->item_sku)}}">
              <img alt="{{$similar->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/wedding-band/'.$similar->image.'-1.jpg') }}">
            </a>
              <h3 class="recently-title">{{$similar->name}}</h3>
              <p class="price">${{ number_format(\App\Helper\AppHelper::conversion($similar->currency,$similar->price,session('currency')),2) }}</p>
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
    $('.main-image-container').append('<div class="main-image cloudimage-360" data-folder="{{url("storage/image/wedding-band-360/".$band->image_360."/")}}/" data-filename="{index}.jpg" data-amount="{{count(glob("storage/image/wedding-band-360/".$band->image_360."/*.jpg"))}}" data-spin-reverse autoplay data-speed="300" data-drag-speed="300"></div>');
    window.CI360.init();

  })



  $(".other-img").click(function (e) {
    $(this).css({ border: "solid 1px #d60d8c" }),
        $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
        $(".main-image").remove(),
        $('.main-image-container').append("<img class='main-image'>"),
        $(".main-image").attr("src", $(this).attr("src")).attr("data-magnify-src", $(this).attr("src")),
        $(".magnify-lens").css("background-image", "url(" + $(this).attr("src") + ")");

            // $('.main-image-container').css({'max-height':$('.main-image').innerHeight()+"px"});
    });


    $(".video-ctn video").click(function () {
        $(".main-image").length &&
            ($(this).css({ border: "solid 1px #d60d8c" }),
            $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
            $(".main-image").remove(),
            $('.main-image-container').append("<video class='main-image' controls autoplay><source src='" + $(this).get(0).currentSrc + "''></video>"));

    });
</script>
<script type="text/javascript" src="{{ URL::asset('js/p_wedding-band.js?'.time().'') }}"></script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
@endsection