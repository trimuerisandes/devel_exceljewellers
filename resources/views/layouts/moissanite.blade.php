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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/moissanite.css?'.time().'') }}">
    <script type="text/javascript" src="{{ URL::asset('js/moissanite.js?'.time().'') }}"></script>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('storage/image/page_img/icon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stone-filter.css?'.time().'') }}">
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
                      <a href="{{url('/moissanite?shape=round')}}">
                      <label id="round" for="roundshap" class="diamondlabl_btn">
                        <div class="icon-round"></div>
                        <span class="diamondshap_ttl">Round</span>
                      </label>
                      </a>
                      <a href="{{url('/moissanite?shape=pear')}}">
                      <label id="pear" for="pearshap" class="diamondlabl_btn">
                        <div class="icon-pear"></div>
                        <span class="diamondshap_ttl">Pear</span>
                      </label> 
                      </a>
                      <a href="{{url('/moissanite?shape=oval')}}">
                      <label id="oval" for="ovalshap" class="diamondlabl_btn">
                        <div class="icon-oval"></div>
                        <span class="diamondshap_ttl">Oval</span>
                      </label>
                      </a>
                      <a href="{{url('/moissanite?shape=marquise')}}">
                      <label id="marquise" for="marquiseshap" class="diamondlabl_btn">
                        <div class="icon-marquise"></div>
                        <span class="diamondshap_ttl">Marquise</span>
                      </label>
                      </a>
                      <a href="{{url('/moissanite?shape=radiant')}}">
                      <label id="radiant" for="squarradiantshap" class="diamondlabl_btn">
                        <div class="icon-radiant"></div>
                        <span class="diamondshap_ttl">Radiant</span>
                      </label>
                      </a>
                      <a href="{{url('/moissanite?shape=cushion')}}">
                      <label id="cushion" for="cushionshap" class="diamondlabl_btn">
                        <div class="icon-cushion"></div>
                        <span class="diamondshap_ttl">Cushion</span>
                      </label>
                      </a>
                      <a href="{{url('/moissanite?shape=trillion')}}">
                      <label id="trillion" for="trillionshap" class="diamondlabl_btn">
                        <div class="icon-trillion-1"></div>
                        <span class="diamondshap_ttl">Trillion</span>
                      </label>
                      </a>
                      <a href="{{url('/moissanite?shape=square')}}">
                      <label id="square" for="squareshap" class="diamondlabl_btn">
                        <div class="icon-square"></div>
                        <span class="diamondshap_ttl">Square</span>
                      </label>
                      </a>
                      <a href="{{url('/moissanite?shape=emerald')}}">
                      <label id="emerald" for="emeraldshap" class="diamondlabl_btn">
                        <div class="icon-emerald"></div>
                        <span class="diamondshap_ttl">Emerald</span>
                      </label>                    
                      </a>
                      <a href="{{url('/moissanite?shape=asscher')}}">           
                      <label id="asscher" for="asschershap" class="diamondlabl_btn">
                        <div class="icon-asscher"></div>
                        <span class="diamondshap_ttl">Asscher</span>
                      </label>
                      </a>
                      <a href="{{url('/moissanite?shape=heart')}}">
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
                    <p>Carat</p>
                  </div>
                  <div class="prdocut_lst_fltr prdct_lst_ght">
                    <div class="radio-toolbar">
                      <a param-name="carat" param-value="0.01-0.49">
                        <label for="radiocaret69" class="carat_btn">0.01-0.49</label>
                      </a>
                      <a param-name="carat" param-value="0.50-0.69">
                        <label for="radiocaret69" class="carat_btn">0.50-0.69</label>
                      </a>
                      <a param-name="carat" param-value="0.70-0.99">               
                        <label for="radiocaret99" class="carat_btn">0.70-0.99</label>
                      </a>
                      <a param-name="carat" param-value="1.00-1.19">                 
                        <label for="radiocaret19" class="carat_btn">1.00-1.19</label>
                      </a>
                      <a param-name="carat" param-value="1.20-1.49">                 
                        <label for="radiocaret49" class="carat_btn">1.20-1.49</label>
                      </a>
                      <a param-name="carat" param-value="1.50-1.99">                 
                        <label for="radiocaret199" class="carat_btn">1.50-1.99</label>
                      </a>
                      <a param-name="carat" param-value="2.00-2.99">                  
                        <label for="radiocaret299" class="carat_btn">2.00-2.99</label>
                      </a>
                      <a param-name="carat" param-value="3.00-5.99">                  
                        <label for="radiocaret599" class="carat_btn">3.00-5.99</label>
                      </a>
                      <a param-name="carat" param-value="6.00-7.99">
                        <label for="radiocaret599" class="carat_btn">6.00-7.99</label>
                      </a>
                    </div>                  
                  </div>
                </div>
              </div>

              <div class="prdocut_fltr_wrp">
                <div class="prdocut_fltr_wrppdgn">
                  <div class="prdocut_ttl_fltrcrt">
                    <p>Width</p>
                  </div>
                  <div class="prdocut_lst_fltr prdct_lst_ght">
                    <div class="radio-toolbar">
                      <a param-name="width" param-value="5mm">
                        <label for="radiocaret69" class="width_btn">5mm</label>
                      </a>
                      <a param-name="width" param-value="5.5mm">
                        <label for="radiocaret69" class="width_btn">5.5mm</label>
                      </a>
                      <a param-name="width" param-value="6mm">
                        <label for="radiocaret69" class="width_btn">6mm</label>
                      </a>
                      <a param-name="width" param-value="6.5mm">
                        <label for="radiocaret69" class="width_btn">6.5mm</label>
                      </a>
                      <a param-name="width" param-value="7mm">
                        <label for="radiocaret69" class="width_btn">7mm</label>
                      </a>
                      <a param-name="width" param-value="7.5mm">
                        <label for="radiocaret69" class="width_btn">7.5mm</label>
                      </a>
                      <a param-name="width" param-value="8mm">
                        <label for="radiocaret69" class="width_btn">8mm</label>
                      </a>
                      <a param-name="width" param-value="8.5mm">
                        <label for="radiocaret69" class="width_btn">8.5mm</label>
                      </a>
                      <a param-name="width" param-value="9mm">
                        <label for="radiocaret69" class="width_btn">9mm</label>
                      </a>
                      <a param-name="width" param-value="9.5mm">
                        <label for="radiocaret69" class="width_btn">9.5mm</label>
                      </a>
                      <a param-name="width" param-value="10mm">
                        <label for="radiocaret69" class="width_btn">10mm</label>
                      </a>
                      <a param-name="width" param-value="10.5mm">
                        <label for="radiocaret69" class="width_btn">10.5mm</label>
                      </a>
                      <a param-name="width" param-value="11mm">
                        <label for="radiocaret69" class="width_btn">11mm</label>
                      </a>
                      <a param-name="width" param-value="11.5mm">
                        <label for="radiocaret69" class="width_btn">11.5mm</label>
                      </a>
                      <a param-name="width" param-value="12mm">
                        <label for="radiocaret69" class="width_btn">12mm</label>
                      </a>
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
    <div id="moissanite-setting-container">
    
      <div id="moissanite">
        @if(count($db) > 0)
        <div id="moissanite-container">
        <?php
        $i = 0;
        ?>
        @foreach($db as $gem)
          <?php
          $i++
          ?>
          @if($i == 1)
          <div class="moissanite-inner" data-count="{{ $count }}">
          @else
          <div class="moissanite-inner">
          @endif
            <a href="{{url('/moissanite/'.$gem->id)}}">
              <div class="ajax-ctn">
                <img class="logo-corner" src="{{ url('storage/image/logo/charlescolvard.svg') }}">
                <div class="preloader-ctn">
                  <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
                </div>
                <img class="ajax-img" alt='{{$gem->MM}} {{$gem->shape}} {{$gem->weight}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ asset('storage/image/moissanite/'.$gem->img_link.'.jpg') }}">
                @if($gem->video_link)
                <video width="100%" autostart="false" loop muted playsinline>
                <source src="{{ asset('storage/image/moissanite/'.$gem->video_link.'.mp4') }}" type="video/mp4">
                </video>
                @endif
              </div>
              <div class="moissanite-text">
                <p class="moissanite-text-title">{{$gem->MM}}mm {{ $gem->shape }} Moissanite</p>
                <p class="moissanite-text-price">${{ number_format(\App\Helper\AppHelper::conversion($gem->currency,$gem->price,session('currency')),2) }}</p>
              </div>
            </a>
          </div>
        @endforeach
      </div>
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