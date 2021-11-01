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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/wedding-band.css?'.time().'') }}">
    <script type="text/javascript" src="{{ URL::asset('js/wedding-band.js?'.time().'') }}"></script>
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
    <div id="wedding-band-setting-container">
      <h1>@yield('title')</h1>
      @include('include.wed-filter')

      <div id="wedding-band">
        @if(count($wedding_bands) > 0)
          <div id="wedding-band-container">
          <?php
          $i = 0;
          ?>
          @foreach($wedding_bands as $wb)
          <?php
          $i++
          ?>
          @if($i == 1)
          <div class="wedding-band-inner" data-count={{$count}}>
          @else
          <div class="wedding-band-inner">
          @endif
              <a href="{{url('/wedding-band/'.$wb['product']->item_sku)}}">
                <div class="ajax-ctn">
                  @if($wb['product']->brand == 'Verragio')
                  <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                  @elseif($wb['product']->brand == 'GabrielCo')
                  <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                  @elseif($wb['product']->brand == 'Valina')
                  <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                  @elseif($wb['product']->brand == 'Romance')
                  <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                  @elseif($wb['product']->brand == 'SimonG')
                  <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                  @elseif($wb['product']->brand == 'Malo')
                  <img class="logo-corner" src="{{ url('storage/image/logo/malo.png') }}">
                  @endif
                  <div class="preloader-ctn">
                    <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
                  </div>

                  <img class="ajax-img" alt='@if($wb["product"]->color == "Platinum")Platinum @else {{$wb["product"]->metal}} {{$wb["product"]->color}} @if($wb["product"]->metal == "Cobalt") @else Gold @endif @endif{{$wb["product"]->style}} {{$wb["product"]->name}} {{$wb["product"]->brand}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ asset('storage/image/wedding-band-list/'.$wb['product']->image.'-1.jpg') }}">
      
                </div>
                <div class="colors">

                    <div class="{{$wb['product']->color}}-code alt-m" data-img="{{ asset('storage/image/wedding-band-list/'.$wb['product']->image.'-1.jpg') }}" data-link="{{url('/wedding-band/'.$wb['product']->item_sku)}}" data-name="{{$wb['product']->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($wb['product']->currency,$wb['product']->price,session('currency')),2) }}"></div>

                  @foreach($wb['other_color'] as $other => $o)
                    <div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/wedding-band-list/'.$o->image.'-1.jpg') }}" data-link="{{url('/wedding-band/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
                  @endforeach

                </div>
                
                @if($wb['product']->sale_price)
                <div class="sale_label">LIMITED TIME OFFER</div>
                @endif
                <div class="wedding-band-text">
                  <p class="wedding-band-text-title">{{$wb['product']->name}}</p>
                  @if($wb['product']->sale_price)
                  <p><span class="text-sale-price">${{ number_format(\App\Helper\AppHelper::conversion($wb['product']->currency,$wb['product']->sale_price,session('currency')),2) }}</span> <span class="cross-text-price">${{ number_format(\App\Helper\AppHelper::conversion($wb['product']->currency,$wb['product']->price,session('currency')),2) }}</span></p>
                  @else
                  <p class="wedding-band-text-price">${{ number_format(\App\Helper\AppHelper::conversion($wb['product']->currency,$wb['product']->price,session('currency')),2) }}</p>
                  @endif
                </div>
              </a>
            </div>
          @endforeach
          </div>
        @else
          <div class="no-results">No Results Were Found</div>
        @endif
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
