@extends('layouts.web')

@section('include')

@endsection

@section('main')
<!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
<!--     <link rel="stylesheet" href="{{ asset('css/magnify.css?12') }}">
    <script src="{{ asset('js/jquery.magnify.js?1') }}"></script> -->
    <!-- Optional mobile plugin (uncomment the line below to enable): -->
    <!-- <script src="/js/jquery.magnify-mobile.js"></script> -->

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/complete_ring.css?'.time().'') }}">

    <div class="video-popup-ctn">
        <div class="bkg-dia-black"></div>
        <div class="dia-popup">
          <!--       <div class="x icon-close"></div> -->
                <video width="100%" loop muted playsinline>
                   @if(session('create_ring.stone')['stone'] == "moissanite")
                    <source src="{{ asset('storage/image/moissanite/'.session('create_ring.stone')['video'].'.mp4') }}" type="video/mp4">
                    @else
                    <source src="{{ session('create_ring.stone')['video'] }}" type="video/mp4">
                    @endif
                </video>
        </div>
    </div>

    <div class="main-stage-container">
        @include('include.stage')
    </div>
    <div id="item-container">
        @foreach ($settings as $setting)
        <div class="item-image">

            <div class="main-image-container">
                @if($shapeimg)
                
                <img class="main-image zoom" id="{{ $setting->name }}" src="{{ asset('storage/image/engagement-ring/'.$shapeimg.'-1.jpg') }}" data-magnify-src="{{ asset('storage/image/engagement-ring/'.$setting->image.'') }}">
                @else
                <img class="main-image zoom" id="{{ $setting->name }}" src="{{ asset('storage/image/engagement-ring/'.$setting->image.'-1.jpg') }}" data-magnify-src="{{ asset('storage/image/engagement-ring/'.$setting->image.'') }}">
                
                @endif
            </div>

            <div class="main-carousel jewelry-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>



                <div class="jewelry-cell">
                    <div class="other-img-ctn">
                        <video width="100%" autoplay loop muted playsinline>
                            @if(session('create_ring.stone')['stone'] == "moissanite")
                            <source src="{{ asset('storage/image/moissanite/'.session('create_ring.stone')['video'].'.mp4') }}" type="video/mp4">
                            @else
                            <source src="{{ session('create_ring.stone')['video'] }}" type="video/mp4">
                            @endif
                        </video>
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

                @if($shapeimg)

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img class="main-image-session" alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img selected" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$shapeimg.'-1.jpg') }}">
                    </div>
                  </div>

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$shapeimg.'-2.jpg') }}">
                    </div>
                  </div>

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$shapeimg.'-3.jpg') }}">
                    </div>
                  </div>

                @else


                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img selected" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$setting->image.'-1.jpg') }}">
                    </div>
                  </div>

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$setting->image.'-2.jpg') }}">
                    </div>
                  </div>

                  <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ asset('storage/image/engagement-ring//'.$setting->image.'-3.jpg') }}">
                    </div>
                  </div>

                @endif

      <!--           @if(session('create_ring.stone')['img'])

                <div class="jewelry-cell">
                    <div class="other-img-ctn">
                      <img alt="{{$setting->metal}} {{$setting->color}} {{$setting->style}} {{ $setting->name }} Surrey Vancouver Canada Langley Burnaby Richmond" class="other-img" onerror="this.style.display='none'" src="{{ session('create_ring.stone')['img'] }}">
                    </div>
                  </div>

                @endif -->


            </div>
        </div>

        <div class="selection-container">
            <div class="ring-name">{{ $setting->name }} Size <span class="ring_size">{{session('create_ring.engagement-ring')['size']}}</span> With <span class="diamond-name">{{session('create_ring.stone')['carat']}} {{session('create_ring.stone')['shape']}} {{session('create_ring.stone')['color']}} {{session('create_ring.stone')['clarity']}} Diamond</span></div>
            <div class="engraving-container">@if(session('create_ring.engagement-ring')['engraving'])(<span class="engraved-text">{{session('create_ring.engagement-ring')['engraving']}}</span> Engraved) @endif</div>
            <hr class="selection-hr">

            @if($setting->sale_price)
            <div class="price">{{session('currency')}} $<span class="price-number">{{ $setting->sale_price+session('create_ring.stone')['retail'] }}</span></div>
            @else
            <div class="price" id="{{ $setting->price }}">{{session('currency')}} ${{ number_format(\App\Helper\AppHelper::conversion($setting->currency,$setting->price,session('currency')) + \App\Helper\AppHelper::conversion(session('create_ring.stone')['currency'],session('create_ring.stone')['retail'],session('currency')) ,2) }}</div>
            @endif

            <div class="size-container">
                <select name="ring-size">
                    @for ($i = 3; $i < session('create_ring.engagement-ring')['size']; $i+=0.5)
                    <option value="{{$i}}">Size - {{$i}}</option>
                    @endfor
                    <option class="size-disabled" selected="true" value="{{session('create_ring.engagement-ring')['size']}}">Current Size - {{session('create_ring.engagement-ring')['size']}}</option>
                    @for ($i = session('create_ring.engagement-ring')['size']; $i < 15.5; $i+=0.5)
                    <option value="{{$i}}">Size - {{$i}}</option>
                    @endfor
                </select>
            </div>

            <div class="engraving-container">
                <div class="engraving-title">Engraving</div>
                <input class="engraving-input" type="text" value="{{session('create_ring.engagement-ring')['engraving']}}" maxlength="15" name="engraving" placeholder="Min 15 Letters">
            </div>
       

            @if(in_array(session('create_ring.stone')['shape'],session('create_ring.engagement-ring')['shape']))
            <button class="add-to-cart" id="{{$setting->id}}">Add To Cart</button>
            @else
            <div class="p-sub">Disclaimer</div>
            <div class="disclaimer-box">Product center stone area will not look exactly like the image due to the indifferent stone shape you have picked out.</div>
            <button class="add-to-cart" id="{{$setting->id}}">Add To Cart</button>
            @endif
            <div class="social-media">
                <ul>
                    @include('include.product-icon')
                </ul>
            </div>
        
        @endforeach
        </div>
    </div>

    @foreach ($settings as $setting)
    <div class="details-container">
        <div class="details-title">PRODUCT DETAILS</div>
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
                @if($setting->brand)
                <div class="product-details"><b>Brand:</b>

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
                <div class="product-details"><b>Size:</b> {{ session('create_ring.engagement-ring')['size'] }}</div>
                <div class="product-details"><b>Metal:</b> {{ $setting->metal }} {{ $setting->color }} gold</div>
                @if($setting->carat > 0)
                <div class="product-details"><b>Carat:</b> {{ $setting->carat }}</div>
                @endif
                @if($setting->width)
                <div class="product-details"><b>Width:</b> {{ $setting->width }}mm</div>
                @endif
                <div class="product-details"><b>Setting Type:</b> {{ $setting->setting_type }}</div>
            </div>
            <div class="details-case">
                <div><b class="sub-title">DIAMOND DETAILS</b></div>
                <hr>
                <div>
                    <div><b>Stone Type:</b> {{ session('create_ring.stone')["stone"] }}</div>
                    <div><b>Shape:</b> {{ session('create_ring.stone')["shape"] }}</div>
                    <div><b>Carat:</b> {{ session('create_ring.stone')["carat"] }}</div>
                    <div><b>Size:</b> {{ session('create_ring.stone')["size"] }}</div>
                    <div><b>Color:</b> {{ session('create_ring.stone')["color"] }}</div>
                    <div><b>Clarity:</b> {{ session('create_ring.stone')["clarity"] }}</div>
                    <input type="hidden" name="dia_id" value='{{ session("create_ring.stone")["stone_id"] }}'>
                    <input type="hidden" name="dia_price" value='{{ session("create_ring.stone")["retail"] }}'>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="other-container">
        <div class="text">CUSTOMERS WHO VIEWED THIS ITEM ALSO VIEWED</div>
        <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
         @foreach($similar as $similar)
          <div class="carousel-cell">
            <a href="{{url('/engagement-ring/'.$similar->item_sku)}}">
              <img alt="{{$similar->name}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/engagement-ring/'.$similar->image.'-1.jpg') }}">
            </a>
              <h3 class="recently-title">{{$similar->name}}</h3>
              <p class="price">${{number_format(\App\Helper\AppHelper::conversion($similar->currency,$similar->price,session('currency')),2)}}</p>
          </div>
          @endforeach
        </div>
    </div>

    @include('include.shipping-info')

<script src="{{ URL::asset('js/360.js?'.time().'') }}"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $(".main-carousel").flickity({ cellAlign: "left", contain: !0, pageDots: !1, imagesLoaded: !0, asNavFor: ".carousel-main" });

        $('.other-img-ctn video').click(function(){
            if ($(this).prop('readyState') == 4) {
                $('.video-popup-ctn').fadeIn();
                $('.video-popup-ctn video').trigger('play');
                
            }
        });

        $('.bkg-dia-black,.x').click(function(){
            $('.video-popup-ctn').fadeOut();
            $('.video-popup-ctn video').trigger('pause');
        });

        $('.video-popup-ctn video').click(function(){
            if ($(this).get(0).paused) {
                $(this).trigger('play');
            }else{
                $(this).trigger('pause');
            }
        })

        function cart_num(){
            $.ajax({
              url:"../shop-cart-num",
              headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  method: "POST",
                  success: function(result){
                    $('.cart-text').empty().append(result);
                  },
                  error: function(request, status, error){

                  }
            });
        }


        $('.add-to-cart').click(function(){
            $.ajax({
                url:"add-cart",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method:"POST",
                data:{
                    type:"complete-ring",
                    size:$("select[name=ring-size]").val(),
                    engraving:$("input[name=engraving]").val() || null,
                },
                success:function(result){
                    window.location.href = "shopcart";
                    cart_num();
                },
                error:function(request,status,error){
                    popup('error');
                    console.log(request);
                }
            });
        });

        // $('.zoom').magnify();

        // $('.zoom').magnify({
        //     speed: 200,
        //     src: '/images/product-large.jpg'
        // });

$('.img-360,.icon-degrees').click(function(){
            $('.img-360').css({ border: "solid 1px #d60d8c" });
            $(".other-img,.other-video").not(this).css({ border: "solid 1px #e6e6e6" })
            $('.main-image').remove();
            $('.main-image-container').append('<div class="main-image cloudimage-360" data-folder="{{url("storage/image/engagement-ring-360/".$setting->image_360."/")}}/" data-filename="{index}.jpg" data-amount="{{count(glob("storage/image/engagement-ring-360/".$setting->image_360."/*.jpg"))}}" data-spin-reverse autoplay data-speed="200" data-drag-speed="300"></div>');
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
        

    });

</script>

@endsection