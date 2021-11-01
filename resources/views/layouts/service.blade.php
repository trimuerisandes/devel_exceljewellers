<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('page-title')</title>
  @yield('canonical')
  <meta name="description" content="@yield('page-description')">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Brandon Huynh">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
  @include('include.loading')
	<header>
		@include('include.nav')
	</header>
	<main>
    <div class="service-container">
      <h1 class="service-title">@yield('title')</h1>
      <h2 class="service-sub-title">@yield('sub-title')</h2>
		@yield('main')
    </div>
	</main>
	<footer>
		@include('include.footer')
	</footer>
	@include('include.alert')
</body>
</html>
<style type="text/css">
  
  .service-container{
    max-width: 1000px;
    margin: auto;
    padding: 10px;
  }

  .service-container h1{
    margin: 30px 0px;
    padding: 10px 0px;
    border-bottom: solid 1px #d60d8c;
  }

  .service-container h2{
    padding: 10px 0px;
  }


  .service-container h1,.service-container h2,.service-container h3,.service-container h4{
    color: #d60d8c;
  }

</style>
<script type="text/javascript" src="{{ asset('js/general.js?'.time().'') }}"></script>
<script type="text/javascript" src="{{ asset('js/loading.js?'.time().'') }}"></script>
<script>
pintrk('track', 'pagevisit');
</script>