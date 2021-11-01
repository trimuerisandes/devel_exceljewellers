<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Search Results | Excel Jewellers</title>
  
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
    <script type="text/javascript" src="{{ URL::asset('js/search.js?'.time().'') }}"></script>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('storage/image/page_img/icon.png') }}" />
    @include('include.general')
</head>
<body>
	<header>
		@include('include.nav')
	</header>
	<main>
    <div id="wedding-band-setting-container">

      <div class="search-for">Search For:{{$keyword}}</div>
      <div id="search-ctn" data-count={{$count}}>

         @if(count($search) > 0)
            <div id="wedding-band-container">
            @foreach($search as $sh)
                <div class="wedding-band-inner">
                    <a href="{{url('/'.$sh['file_type'].'/'.$sh['link_sku'])}}">
                        <div class="ajax-ctn">
                            @if($sh['brand'] == 'Verragio')
                            <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                            @elseif($sh['brand'] == 'GabrielCo')
                            <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                            @elseif($sh['brand'] == 'Valina')
                            <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                            @elseif($sh['brand'] == 'Romance')
                            <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                            @elseif($sh['brand'] == 'SimonG')
                            <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                            @elseif($sh['brand'] == 'Malo')
                            <img class="logo-corner" src="{{ url('storage/image/logo/malo.png') }}">
                            @endif
                            <div class="preloader-ctn">
                                <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
                            </div>
                            
                            <img class="ajax-img" alt='@if($sh["color"] == "Platinum")Platinum @else {{$sh["metal"]}} {{$sh["color"]}} Gold @endif {{$sh["style"]}} {{$sh["name"]}}  {{$sh["brand"]}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ $sh['image'] }}">
                        </div>


                        <div class="colors">
                            <div class="{{$sh['color']}}-code alt-m"></div>
                        </div>


                        @if($sh['sale_price'])
                            <div class="sale_label">LIMITED TIME OFFER</div>
                        @endif
                        <div class="wedding-band-text">
                            <p class="wedding-band-text-title">{{$sh['name']}}</p>
                            @if($sh['sale_price'])
                            <p><span class="text-sale-price">${{ number_format(\App\Helper\AppHelper::conversion($sh['currency'],$sh['sale_price'],session('currency')),2) }}</span> <span class="cross-text-price">${{ number_format(\App\Helper\AppHelper::conversion($sh['currency'],$sh['price'],session('currency')),2) }}</span></p>
                            @else
                            <p class="wedding-band-text-price">${{ number_format(\App\Helper\AppHelper::conversion($sh['currency'],$sh['price'],session('currency')),2) }}</p>
                            @endif
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
            
        @else
            <div class="no-results-search">Sorry No Results Were Found</div>
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
<style type="text/css">
    .search-for{
        font-size: 30px;
        color: #d60d8c;
        padding: 5px 0px 15px 0px;
        text-align: center;
    }


  .cross-text-price{
    text-decoration: line-through !important;
    font-size: .8rem;
  }

  .text-sale-price{
    color: #d60d8c;
    font-weight: bold;
  }

  .sale_label{
    color:white;
    background:#d60d8c;
    text-align: center;
  }
</style>

