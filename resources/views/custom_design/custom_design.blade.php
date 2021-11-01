@extends('layouts.web')

@section('include')

@endsection

@section('main')
<div class="custom-design-container">
    <div class="design-type-container">
        <img src="{{ asset('storage/image/page_img/design1.jpg') }}">
        <div class="design-title">Rings</div>
        <div class="design-btn-case"><a href="{{url('/custom-design/rings')}}"><button class="design-btn">Design Now</button></a></div>
    </div>
    <div class="design-type-container">
        <img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Large/Gabriel-Unique-14K-White-Gold-Art-Deco-Halo-Engagement-Ring~ER14508R4W44JJ-6.jpg">
        <div class="design-title">Wedding Bands</div>
        <div class="design-btn-case"><a href="{{url('/custom-design/wedding-band')}}"><button class="design-btn">Design Now</button></a></div>
    </div>
    <div class="design-type-container">
        <img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Large/Gabriel-Unique-14K-White-Gold-Art-Deco-Halo-Engagement-Ring~ER14508R4W44JJ-6.jpg">
        <div class="design-title">Pendant</div>
        <div class="design-btn-case"><a href="{{url('/custom-design/pendant')}}"><button class="design-btn">Design Now</button></a></div>
    </div>
    <div class="design-type-container">
        <img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Large/Gabriel-Unique-14K-White-Gold-Art-Deco-Halo-Engagement-Ring~ER14508R4W44JJ-6.jpg">
        <div class="design-title">Earrings</div>
        <div class="design-btn-case"><a href="{{url('/custom-design/earring')}}"><button class="design-btn">Design Now</button></a></div>
    </div>
    <div class="design-type-container">
        <img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Large/Gabriel-Unique-14K-White-Gold-Art-Deco-Halo-Engagement-Ring~ER14508R4W44JJ-6.jpg">
        <div class="design-title">Bracelet Chains</div>
        <div class="design-btn-case"><a href="{{url('/custom-design/bracelet-chain')}}"><button class="design-btn">Design Now</button></a></div>
    </div>
</div>
<script type="text/javascript">


  
</script>
<style type="text/css">

    .custom-design-container{
        max-width: 1300px;
        display: grid;
        margin: auto;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    }

    .design-type-container{
        text-align: center;
        background: #f5f5f5;
        margin: 5px;
        padding: 20px 40px;
    }

    .design-type-container img{
        width: 100%;
        border-radius: 100%;
    }

    .design-title{
        font-size: 30px;
    }

    .design-btn{
        background:transparent;
        border: solid 1px #949494;
        outline: none;
        color: #2e2e2e;
    }

    .design-btn:focus {outline:0;}

</style>

<style type="text/css">
    
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    *{
        font-family: 'Open Sans', sans-serif;
    }

    body{
        background:white;
    }

    main{
        padding: 145px 0px 50px 0px;
    }

    @font-face {
      font-family: 'icomoon';
      src:  url('../fonts/icomoon.eot?1zr94m');
      src:  url('../fonts/icomoon.eot?1zr94m#iefix') format('embedded-opentype'),
        url('../fonts/icomoon.ttf?1zr94m') format('truetype'),
        url('../fonts/icomoon.woff?1zr94m') format('woff'),
        url('../fonts/icomoon.svg?1zr94m#icomoon') format('svg');
      font-weight: normal;
      font-style: normal;
    }

    [class^="icon-"], [class*=" icon-"] {
      /* use !important to prevent issues with browser extensions that change fonts */
      font-family: 'icomoon' !important;
      speak: none;
      font-style: normal;
      font-weight: normal;
      font-variant: normal;
      text-transform: none;
      line-height: 1;

      /* Better Font Rendering =========== */
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

.icon-chevron-down:before {
  content: "\e909";
}
.icon-education:before {
  content: "\e908";
}
.icon-close:before {
  content: "\e902";
}
.icon-menu:before {
  content: "\e903";
}
.icon-diamond:before {
  content: "\e905";
}
.icon-phone:before {
  content: "\e906";
}
.icon-search:before {
  content: "\e901";
}
.icon-cog:before {
  content: "\e900";
}
.icon-gear:before {
  content: "\e900";
}
.icon-settings:before {
  content: "\e900";
}
.icon-options:before {
  content: "\e900";
}
.icon-mail-envelope-closed:before {
  content: "\e907";
}
.icon-search:before {
  content: "\e901";
}
.icon-cart:before {
  content: "\e904";
}
.icon-user:before {
  content: "\e971";
}
.icon-ring:before {
  content: "\ea56";
}
.icon-facebook:before {
  content: "\ea90";
}
.icon-instagram:before {
  content: "\ea92";
}
.icon-twitter:before {
  content: "\ea96";
}
.icon-youtube:before {
  content: "\ea9d";
}
.icon-linkedin2:before {
  content: "\eaca";
}
.icon-pinterest2:before {
  content: "\ead2";
}

.icon-heart-o:before {
  content: "\e90a";
}
</style>
@endsection