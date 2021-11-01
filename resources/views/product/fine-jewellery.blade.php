@extends('layouts.product')

@section('include')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/p_fine-jewellery.css?'.time().'') }}">
@endsection


@foreach ($jewellerys as $jewellery)
@section('page-title')
{{ $jewellery->brand }} {{$jewellery->metal}} {{$jewellery->color}} Gold {{$jewellery->style}} {{ $jewellery->name }} Excel Jewellers Surrey Canada Langley Burnaby
@endsection

@section('page-description')
Designer {{$jewellery->metal}} {{$jewellery->color}} Gold {{$jewellery->style}} {{ $jewellery->name }} At Excel Jewellers Canada Langley Surrey Vancouver Burnaby Richmond Abbotsford
@endsection


@section('canonical')
<link rel="canonical" href="https://www.exceljewellers.com/fine-jewellery/{{ $jewellery->item_sku }}">
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
    
    <div id="item-container">
        @foreach ($jewellerys as $jewellery)
        <div class="item-image">

            <div class="main-image-container">
                <img class="main-image" width="100%" alt="{{$jewellery->metal}} {{$jewellery->color}} Gold {{$jewellery->style}} {{ $jewellery->name }} Surrey Vancouver Canada Langley Burnaby Richmond" id="{{ $jewellery->name }}" src="{{ asset('storage/image/fine-jewellery/'.$jewellery->image.'-1.jpg') }}">
            </div>

            <div class="main-carousel jewelry-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>

              <div class="jewelry-cell">
                <div class="other-img-ctn">
                  <img alt="{{$jewellery->metal}} {{$jewellery->color}} Gold {{$jewellery->style}} {{ $jewellery->name }} Surrey Vancouver Canada Langley Burnaby Richmond"  class="other-img main-image-session" src="{{ asset('storage/image/fine-jewellery/'.$jewellery->image.'-1.jpg') }}">
                </div>
              </div>

              @if(isset($jewellery->image_360))
                  @if(file_exists('storage/image/fine-jewellery-360/'.$jewellery->image_360.'') == true)
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
                
              @if(@getimagesize(asset('storage/image/fine-jewellery/'.$jewellery->image.'-'.$i.'.jpg')))
              <div class="jewelry-cell">
                <div class="other-img-ctn">
                  <img alt="{{$jewellery->metal}} {{$jewellery->color}} Gold {{$jewellery->style}} {{ $jewellery->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/fine-jewellery/'.$jewellery->image.'-'.$i.'.jpg') }}">
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
            <div class="wedding-name">{{ $jewellery->name }}</div>
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
            @if($jewellery->sale_price)
            <div class="limited-time">LIMITED TIME OFFER</div>
            <div class="price-cross">{{session('currency')}} $<span>{{ number_format(\App\Helper\AppHelper::conversion($jewellery->currency,$jewellery->price,session('currency')),2) }}</span></div>
            <div class="price">{{session('currency')}} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($jewellery->currency,$jewellery->sale_price,session('currency')),2) }}</span></div>
            @else
            <div class="price">{{session('currency')}} $<span class="price-number">{{ number_format(\App\Helper\AppHelper::conversion($jewellery->currency,$jewellery->price,session('currency')),2) }}</span></div>
            @endif


            @if($jewellery->category == "Rings" || $jewellery->category == "rings")
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
            @endif

        
            @if(!sizeof($metals) == 0)
            <div class="p-sub">Metal Available In</div>
            <div class="metal-container">
                @foreach($metals as $metal)
                
                    @if($metal->color == "Platinum"||$metal->color == "platinum")
                    <a href="{{url('/fine-jewellery/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">PLAT</div></a>
                    @elseif($metal->color == "Silver"||$metal->color == "silver")
                    <a href="{{url('/fine-jewellery/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">SLVR</div></a>
                    @else
                    <a href="{{url('/fine-jewellery/'.$metal->item_sku.'')}}"><div class="metal-case {{ $metal->color }}">{{ $metal->metal }}{{ $metal->color[0] }}</div></a>
                    @endif             

                @endforeach 
            </div>
            @endif
            
            @if(count($stone_carat)>0)
            <div class="p-sub">Carat Available In</div>
            <div class="carat-container">
                @foreach($stone_carat as $size)
                    <a href="{{url('/fine-jewellery/'.$size->item_sku.'')}}"><div class="carat-case {{ $size->carat }}">{{ $size->carat }}</div></a>
                @endforeach   
            </div>
            @endif

            @if(count($fine_size)>0)
            <div class="p-sub">Jewelry Size Available In</div>
            <div class="carat-container">
                @foreach($fine_size as $size)
                    <a href="{{url('/fine-jewellery/'.$size->item_sku.'')}}"><div class="carat-case {{ $size->size }}">Size {{ $size->size }}</div></a>
                @endforeach   
            </div>
            @endif

            @if(count($stone_mm)>0)
            <div class="p-sub">MM Available In</div>
            <div class="carat-container">
                @foreach($stone_mm as $size)
                    <a href="{{url('/fine-jewellery/'.$size->item_sku.'')}}"><div class="carat-case {{ $size->stone_width }}">{{ $size->stone_width }}MM</div></a>
                @endforeach   
            </div>
            @endif

            @if(count($clarity)>0)
            <div class="p-sub">Color/Clarity Available In</div>
            <div class="carat-container">
                @foreach($clarity as $c)
                    <a href="{{url('/fine-jewellery/'.$c->item_sku.'')}}"><div class="clarity-case">{{ $c->diamond_color }} / {{ $c->diamond_clarity }}</div></a>
                @endforeach   
            </div>
            @endif

            @if(count($initials)>0)
            <div class="p-sub">Letters Available In</div>
            <div class="carat-container">
                <select onchange="location = this.value">
                    <option value="{{url('/fine-jewellery/'.$jewellery->item_sku.'')}}" class="stones-case {{ $jewellery->item_sku }}">Letter {{$jewellery->item_sku[6] }}</option>
                @foreach($initials as $initial)

                    <option value="{{url('/fine-jewellery/'.$initial->item_sku.'')}}" class="stones-case {{ $initial->item_sku }}">Letter {{ $initial->item_sku[6] }}</option>

                @endforeach   
                </select> 
            </div>
            @endif


            @if(count($other_stones) > 0)
            <div class="p-sub">Stone Available In</div>
            <div class="stones-container">
                <select onchange="location = this.value">
                        <option value="{{url('/fine-jewellery/'.$jewellery->item_sku.'')}}" class="stones-case {{ $jewellery->main_stone }}">{{ucfirst(strtolower($jewellery->main_stone)) }}</option>
                    @foreach($other_stones as $other_stone)
                        <option value="{{url('/fine-jewellery/'.$other_stone->item_sku.'')}}" class="stones-case {{ $other_stone->main_stone }}">{{ ucfirst(strtolower($other_stone->main_stone)) }}</option>
                    @endforeach   
                </select> 
            </div>
            @endif

            <button class="add-to-cart" id="{{$jewellery->item_sku}}">Add To Cart</button>
            @auth
            <button id="{{$jewellery->item_sku}}" class="favourite"><span class="icon-heart-o"></span></button>
            @endauth
            @guest
            <a href="{{ url('/login') }}"><button class="favourite"><span class="icon-heart-o"></span></button></a>
            @endguest
            <div class="social-media">
                <ul>
                    @include('include.product-icon')

                    <div class="social-media-ctn">
                        <div>
                            <a class="twitter-share-button"
                        href="https://twitter.com/intent/tweet?text={{$jewellery->name.' ✨%20%7C%20'.url()->current()}}"
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
        
        @endforeach
        </div>
    </div>

    @foreach ($jewellerys as $jewellery)
    <div class="details-container">
        <div class="details-title">PRODUCT DETAILS</div>
        <div class="details-inner">
            <div class="details-case">
                <div><b class="sub-title">PRODUCT DESCRIPTION</b></div>
                <hr>
                {{ $jewellery->description }}
            </div>
            <div class="details-case">
                <div><b class="sub-title">DETAILS</b></div>
                <hr>
                <div><b>SKU:</b> <span class="item_sku">{{ $jewellery->item_sku }}</span></div>
                <script type="text/javascript">
                    localStorage.setItem("item_sku",$('.item_sku').text());
                </script>
                @if($jewellery->brand)
                <div>
                    <b>Brand:</b>
                    @if($jewellery->brand == 'Verragio')
                    <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                    @elseif($jewellery->brand == 'GabrielCo')
                    <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                    @elseif($jewellery->brand == 'Valina')
                    <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                    @elseif($jewellery->brand == 'Romance')
                    <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                    @elseif($jewellery->brand == 'SimonG')
                    <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                    @elseif($jewellery->brand == 'Malo')
                    <img class="logo-corner" src="{{ url('storage/image/logo/malo.png') }}">
                    @else
                    {{$jewellery->brand}}
                    @endif
                </div>
                @endif
                <div><b>Category:</b> <span class="jewellery-category">{{$jewellery->category}}</span></div>
                <div><b>Style:</b> {{ $jewellery->style }}</div>
                <div><b>Metal:</b> @if($jewellery->color == "Platinum"||$jewellery->color == "platinum") Platinum @elseif($jewellery->color == "Silver"||$jewellery->color == "silver") Silver @else {{ $jewellery->metal }} {{ $jewellery->color }} gold @endif</div>
                @if($jewellery->carat)
                <div><b>Carat:</b> {{ $jewellery->carat }}</div>
                @endif
                @if($jewellery->width)
                <div><b>Width:</b> {{ $jewellery->width }}mm</div>
                @endif
                @if($jewellery->setting_type)
                <div><b>Setting Type:</b> {{ $jewellery->setting_type }}</div>
                @endif
                @if($jewellery->main_stone)
                <div><b>Main Stones:</b> {{ $jewellery->main_stone }}</div>
                @endif
                @if($jewellery->other_stone)
                <div><b>Other Stones:</b> {{ $jewellery->other_stone }}</div>
                @endif

                @if($jewellery->diamond_color)
                <div><b>Diamond Color:</b> {{ $jewellery->diamond_color }}</div>
                @endif

                @if($jewellery->diamond_clarity)
                <div><b>Diamond Clarity:</b> {{ $jewellery->diamond_clarity }}</div>
                @endif

                @if($jewellery->size)
                <div><b>Size:</b> {{ $jewellery->size }}</div>
                @endif

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
            <a href="{{url('/fine-jewellery/'.$similar->item_sku)}}">
              <img alt="{{$similar->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/fine-jewellery/'.$similar->image.'-1.jpg') }}">
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
            $('.main-image-container').append('<div class="main-image cloudimage-360" data-folder="{{url("storage/image/fine-jewellery-360/".$jewellery->image_360."/")}}/" data-filename="{index}.jpg" data-amount="{{count(glob("storage/image/fine-jewellery-360/".$jewellery->image_360."/*.jpg"))}}" data-spin-reverse autoplay data-speed="300" data-drag-speed="300"></div>');
            window.CI360.init();

        });


        $(".other-img").click(function (e) {
            $(this).css({ border: "solid 1px #d60d8c" }),
                $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
                $(".main-image").remove(),
                $('.main-image-container').append("<img class='main-image'>"),
                $(".main-image").attr("src", $(this).attr("src")).attr("data-magnify-src", $(this).attr("src")),
                $(".magnify-lens").css("background-image", "url(" + $(this).attr("src") + ")");
        });

        $(".video-ctn video").click(function () {
            $(".main-image").length &&
                ($(this).css({ border: "solid 1px #d60d8c" }),
                $(".other-img,.other-video,.img-360").not(this).css({ border: "solid 1px #e6e6e6" }),
                $(".main-image").remove(),
                $('.main-image-container').append("<video class='main-image' controls autoplay><source src='" + $(this).get(0).currentSrc + "''></video>"));

        });

</script>

<script type="text/javascript" src="{{ URL::asset('js/p_fine-jewellery.js?'.time().'') }}"></script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
@endsection