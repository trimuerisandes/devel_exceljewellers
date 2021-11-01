<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>@yield('page-title')</title>
  @yield('canonical')
  <meta name="description" content="@yield('page-description')">
  
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="robots" content="index, follow">
<meta name="author" content="Brandon Huynh">
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



	<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
	<!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/general.css?'.time().'') }}" rel="stylesheet">
    <script src="{{ asset('js/slick.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/fine-jewellery.css?'.time().'') }}">
    <script type="text/javascript" src="{{ URL::asset('js/local.js?'.time().'') }}"></script>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('storage/image/page_img/icon.png') }}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123725715-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
    gtag('config', 'UA-123725715-3');
    </script>
    <script defer src="https://connect.podium.com/widget.js#API_TOKEN=a8f93567-4a3e-4b10-b7f1-4002da972e4b" id="podium-widget" data-api-token="a8f93567-4a3e-4b10-b7f1-4002da972e4b"></script>
    <!-- Pinterest Tag -->
    <script>
    !function(e){if(!window.pintrk){window.pintrk = function () {
    window.pintrk.queue.push(Array.prototype.slice.call(arguments))};var
      n=window.pintrk;n.queue=[],n.version="3.0";var
      t=document.createElement("script");t.async=!0,t.src=e;var
      r=document.getElementsByTagName("script")[0];
      r.parentNode.insertBefore(t,r)}}("https://s.pinimg.com/ct/core.js");
    pintrk('load', '2614076105532', {em: '<user_email_address>'});
    pintrk('page');
    </script>
    <noscript>
    <img height="1" width="1" style="display:none;" alt=""
      src="https://ct.pinterest.com/v3/?event=init&tid=2614076105532&pd[em]=<hashed_email_address>&noscript=1" />
    </noscript>
    <!-- end Pinterest Tag -->
</head>
<body>

	<header>
		@include('include.nav')
	</header>
	<main>
    <div id="fine-jewellery-setting-container">
      <h1>@yield('title')</h1>
      @include('include.fj-filter')
      <div id="fine-jewellery">

        @if(count($db) > 0)
          <?php
           $i = 0;
          ?>
          <div id="fine-jewellery-container">
          @foreach($db as $fj)
          <?php
          $i++
          ?>
          @if($i == 1)
          <div class="fine-jewellery-inner" data-count="{{$count}}">
          @else
          <div class="fine-jewellery-inner">
          @endif
              <a href="{{url('/local/'.$fj->item_sku)}}">
                <div class="ajax-ctn">
                  @if($fj->itVendorId == 'Verragio')
                  <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                  @elseif($fj->itVendorId == 'GabrielCo')
                  <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                  @elseif($fj->itVendorId == 'Valina')
                  <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                  @elseif($fj->itVendorId == 'Romance')
                  <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                  @elseif($fj->itVendorId == 'SimonG')
                  <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                  @endif
                  <div class="preloader-ctn">
                    <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
                  </div>
                  <img class="ajax-img" alt="{{$fj->metal}} {{$fj->color}} Gold {{$fj->style}} {{$fj->description}} {{$fj->itVendorId}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/fine-jewellery/'.$fj->image.'') }}">
                </div>
                <div class="colors">
                    <div class="{{$fj->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$fj->image.'') }}" data-link="{{url('/fine-jewellery/'.$fj->item_sku)}}" data-name="{{$fj->description}}" data-price="{{$fj->price}}"></div>
                  @foreach($other as $o)
                    @if($o->item_code == $fj->item_code && $o->price == $fj->price)
                    <div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$o->image.'') }}" data-link="{{url('/fine-jewellery/'.$o->item_sku)}}" data-name="{{$o->description}}" data-price="{{$o->price}}"></div>
                    @endif
                  @endforeach
                </div>
                <div class="fine-jewellery-text">
                  <p class="fine-jewellery-text-title">{{$fj->description}}</p>
                  <p class="fine-jewellery-text-price">${{$fj->price}}</p>
                </div>
              </a>
            </div>
          @endforeach
          </div>
        @else
          <div class="no-results">No Results Were Found</div>
        @endif

      </div>
	
    </div>
	</main>
	<footer>
		@include('include.footer')
	</footer>
	@include('include.alert')
</body>
</html>
<script type="text/javascript" src="{{ asset('js/general.js?'.time().'') }}"></script>
<script>
pintrk('track', 'pagevisit');
</script>