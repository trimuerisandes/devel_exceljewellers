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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/gemstone.css?'.time().'') }}">
    <script type="text/javascript" src="{{ URL::asset('js/lab-diamond.js?'.time().'') }}"></script>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('storage/image/page_img/icon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stone-filter.css?'.time().'') }}">



       <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
<script type="text/javascript" src="{{ asset('js/nouislider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/wNumb.js') }}"></script>

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
      <div class="diamond-filter">
        <form method="POST" action="">
          <div class="prdocut_flr_wraphlf">
            <div class="prdocut_flr_wrap">
              @include('include.stage')
              <div class="prdocut_fltr_wrp">
                <div class="prdocut_fltr_wrppdgn">
                  <div class="prdocut_ttl_fltrcrt">
                    <p>Shape</p>
                  </div>
                  <div class="prdocut_lst_fltr">
                    <div class="shapradio-toolbar">
                      <a href="{{url('/lab-grown-diamond?shape=round')}}">
                      <label id="round" for="roundshap" class="diamondlabl_btn">
                        <div class="icon-round"></div>
                        <span class="diamondshap_ttl">Round</span>
                      </label>
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=pear')}}">
                      <label id="pear" for="pearshap" class="diamondlabl_btn">
                        <div class="icon-pear"></div>
                        <span class="diamondshap_ttl">Pear</span>
                      </label> 
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=oval')}}">
                      <label id="oval" for="ovalshap" class="diamondlabl_btn">
                        <div class="icon-oval"></div>
                        <span class="diamondshap_ttl">Oval</span>
                      </label>
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=marquise')}}">
                      <label id="marquise" for="marquiseshap" class="diamondlabl_btn">
                        <div class="icon-marquise"></div>
                        <span class="diamondshap_ttl">Marquise</span>
                      </label>
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=radiant')}}">
                      <label id="radiant" for="squarradiantshap" class="diamondlabl_btn">
                        <div class="icon-radiant"></div>
                        <span class="diamondshap_ttl">Radiant</span>
                      </label>
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=cushion')}}">
                      <label id="cushion" for="cushionshap" class="diamondlabl_btn">
                        <div class="icon-cushion"></div>
                        <span class="diamondshap_ttl">Cushion</span>
                      </label>
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=trillion')}}">
                      <label id="trillion" for="trillionshap" class="diamondlabl_btn">
                        <div class="icon-trillion-1"></div>
                        <span class="diamondshap_ttl">Trillion</span>
                      </label>
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=princess')}}">
                      <label id="square" for="squareshap" class="diamondlabl_btn">
                        <div class="icon-square"></div>
                        <span class="diamondshap_ttl">Princess</span>
                      </label>
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=emerald')}}">
                      <label id="emerald" for="emeraldshap" class="diamondlabl_btn">
                        <div class="icon-emerald"></div>
                        <span class="diamondshap_ttl">Emerald</span>
                      </label>                    
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=asscher')}}">           
                      <label id="asscher" for="asschershap" class="diamondlabl_btn">
                        <div class="icon-asscher"></div>
                        <span class="diamondshap_ttl">Asscher</span>
                      </label>
                      </a>
                      <a href="{{url('/lab-grown-diamond?shape=heart')}}">
                      <label id="heart" for="heartshap" class="diamondlabl_btn">
                        <div class="icon-heart"></div>
                        <span class="diamondshap_ttl">Heart</span>
                      </label>   
                      </a>

                    </div>
                  </div>
                </div>                
              </div>

              
              <div class="prdocut_fltr_wrp">
                <div class="prdocut_fltr_wrppdgn">
                  <div class="prdocut_ttl_fltrcrt">
                    <p>Cut</p>
                  </div>
                  <div class="prdocut_lst_fltr prdct_lst_ght">
                    <div class="radio-toolbar">
                      <a param-name="cut" param-value="">
                        <label for="radiocaret69" class="cut_btn">All Cuts</label>
                      </a>
                      <a param-name="cut" param-value="ideal">
                        <label for="radiocaret49" class="cut_btn">Ideal</label>
                      </a>
                      <a param-name="cut" param-value="excellent">
                        <label for="radiocaret19" class="cut_btn">Excellent</label>
                      </a>
                      <a param-name="cut" param-value="very_good">    
                        <label for="radiocaret99" class="cut_btn">Very Good</label> 
                      </a>
                      <a param-name="cut" param-value="good">
                        <label for="radiocaret69" class="cut_btn">Good</label>
                      </a>
                      <a param-name="cut" param-value="fair">
                        <label for="radiocaret69" class="cut_btn">Fair</label>
                      </a>

                    </div>                  
                  </div>
                </div>
              </div>

              <hr>
              <div class="advance-filter">Advanced Filters</div>

              <div class="product-filter-dropdown">


              <div class="prdocut_fltr_wrp">
                <div class="prdocut_fltr_wrppdgn">
                  <div class="prdocut_ttl_fltrcrt">
                    <p>Carat</p>
                  </div>
                  <div id="carat-case" class="prdocut_lst_fltr prdct_lst_ght carat-ctn">
                    <div class="custom-range-slider">

                      <input class="custom-range-slider__input custom-range-slider__input--from carat--from" value="0" step="any" type="number">

                      <input class="custom-range-slider__input custom-range-slider__input--to right-slider-input carat--to" value="{{ $carat }}" type="number">
                        
                      <div class="custom-range-slider__track carat__track"></div>
                    </div>
                  </div>
                </div>
              </div>




              <div class="prdocut_fltr_wrp">
                <div class="prdocut_fltr_wrppdgn">
                  <div class="prdocut_ttl_fltrcrt">
                    <p>Price</p>
                  </div>
                  <div id="price-case" class="prdocut_lst_fltr prdct_lst_ght price-ctn">
                    <div class="custom-range-slider">

                      <input class="custom-range-slider__input custom-range-slider__input--from price--from" value="0" step="any" type="number">

                      <input class="custom-range-slider__input custom-range-slider__input--to right-slider-input price--to" value="{{ $high }}" type="number">
                        
                      <div class="custom-range-slider__track price__track"></div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="prdocut_fltr_wrp">
                <div class="prdocut_fltr_wrppdgn">
                  <div class="prdocut_ttl_fltrcrt">
                    <p>Color</p>
                  </div>
                  <div class="prdocut_lst_fltr color_slider prdct_lst_ght">
                    <div id="slider-step"></div>  
                  </div>
                </div>
              </div>

              <div class="prdocut_fltr_wrp">
                <div class="prdocut_fltr_wrppdgn">
                  <div class="prdocut_ttl_fltrcrt">
                    <p>Clarity</p>
                  </div>
                  <div class="prdocut_lst_fltr clarity_slider prdct_lst_ght">
                    <div id="clarity"></div>  
                  </div>
                </div>
              </div>
          </div>
              <hr>                                     
            </div>
          </div>        
        </form>
      </div>
      <h1>@yield('title')</h1>
    <div id="gemstone-setting-container">
    
      <div id="gemstone">
        @if(count($db) > 0)
        <div id="gemstone-container">
        <?php
        $i = 0;
        ?>
        @foreach($db as $gem)
          <?php
          $i++
          ?>
          @if($i == 1)
          <div class="gemstone-inner" data-count="{{ $count }}">
          @else
          <div class="gemstone-inner">
          @endif
          
            <a href="{{url('/lab-grown-diamond/'.$gem->id)}}">
              <div class="ajax-ctn">
                <div class="preloader-ctn">
                  <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
                </div>
                <img class="ajax-img @if($gem->company == 'Stuller') ajax-dia @endif" alt='{{$gem->width}} {{$gem->shape}} {{$gem->carat}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{$gem->img_link}}">
                @if(strpos($gem->report,'gia.edu'))

                  <img class="gia-cert" src="{{ url('storage/image/page_img/gia.png') }}">
            
                @endif

              </div>
              <div class="gemstone-text">
                <p class="gemstone-text-title">{{$gem->carat}} CT {{ $gem->shape }} Lab Diamond</p>
                <div class="gemstone-text-block">
                  <div><b>Color:</b> {{$gem->color}}</div>
                  <div><b>Clarity:</b> {{ $gem->clarity }}</div>
                  @if($gem->cut)
                  <div><b>Cut:</b> {{ $gem->cut }}</div>
                  @endif
                </div>
                <p class="gemstone-text-price">${{ number_format(\App\Helper\AppHelper::conversion($gem->currency,$gem->price,session('currency')),2) }}</p>
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