<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('page-title')</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

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
    <script type="text/javascript" src="{{ URL::asset('js/fine-jewellery.js?'.time().'') }}"></script>
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('storage/image/page_img/icon.png') }}" />
    @yield('include')
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
		@yield('main')
	</main>
	<footer>
		@include('include.footer')
	</footer>
	@include('include.alert')
</body>
</html>
<script type="text/javascript" src="{{ asset('js/general.js?'.time().'') }}"></script>
<script type="text/javascript" src="{{ asset('js/loading.js?'.time().'') }}"></script>
<script type="text/javascript">
    
!(function(win, doc) {
    var iframe_url = '//technet.rapaport.com/services/retailfeed/index.html', // main.js
        assets_url = '//www.diamondselections.com/Embed/client_assets/';
    loadAssets('diamondsearch.css', 'css');
    win.onload = function() {
        var d = document.getElementById("diamondsearch");
        d.className = d.className + " ds-loading";
        var i = doc.createElement('iframe');
        i.style.display = 'none';
        i.id = 'rapnet';
        i.src = iframe_url;
        i.setAttribute('assets-url', assets_url);
        doc.body.appendChild(i);
        i.onload = function() {
            if (!win.jQuery) {
                loadAssets('jquery.min.js', 'js', addAngular);
            } else {
                if (!!jQuery.fn.on) {
                    addAngular();
                } else {
                    alert('Rapnet: You are using an outdated version of jQuery. Please upgrade to version 1.7.0 or higher.');
                }
            }
        };
        function addAngular() {
            if (!win.angular) {
                loadAssets('angular.min.js', 'js', function() {
                    loadAssets('diamondsearch.min.js', 'js');
                });
            } else {
                loadAssets('diamondsearch.min.js', 'js');
            }
        }
    };
    function loadAssets(filename, filetype, cb) {
        var cacheVersion = '?v=10008';
        if (filetype === 'js') {
            var f = doc.createElement('script');
            f.setAttribute('type', 'text/javascript');
            f.setAttribute('src', assets_url + filename + cacheVersion);
        } else if (filetype == 'css') {
            var f = doc.createElement('link');
            f.setAttribute('rel', 'stylesheet');
            f.setAttribute('type', 'text/css');
            f.setAttribute('href', assets_url + filename + cacheVersion);
        }
        if (doc.addEventListener) {
            f.onload = function() { cb && cb(); };
        } else {
            f.onreadystatechange = function() {
                if (this.readyState === 'loaded' || this.readyState === 'complete') {
                    cb && cb();
                    this.onreadystatechange = null;
                }
            };
        }
        if (typeof f !== 'undefined') {
            doc.getElementsByTagName('head')[0].appendChild(f);
        }
    }
})(window, document);

</script>
<script>
pintrk('track', 'pagevisit');
</script>