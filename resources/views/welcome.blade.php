@extends('layouts.welcome')
@section('page-title')
Diamond Engagement Rings | Engagement Rings - Langley &amp; Surrey
@endsection

@section('main')

<div class="carousel-container">
    <div class="carousel">
      <img src="{{ asset('storage/image/page_img/main-banner.jpg?2') }}" class="regular-banner" alt="Gabriel&Co Verragio Diamond Engagement Gold Ring Earring Bracelet Necklaces Jewellery Surrey Canada">
      <img src="{{ asset('storage/image/page_img/main-banner-mobile2.jpg?2') }}" class="mobile-banner" alt="Gabriel&Co Verragio Diamond Engagement Gold Ring Earring Bracelet Necklaces Jewellery Surrey Canada">
      <div class="banner-text">
        <h1 class="banner-h1">Special Moments Start Here</h1>
        <p class="banner-p">Known throughout the lower mainland for our unique custom jewellery designs by Thom Huynh, but we have some of the finest international brands to our product assortment. We offer the best in coloured stones, custom designs, bridal jewellery and diamonds – a selection unparalleled by mall chain stores.</p>
      </div>
    </div>
</div>

<div class="create-design-container">
    <div class="create-design-inner">
      <img alt="Create your own diamond engagement ring" src="{{ asset('storage/image/page_img/rings.jpg') }}" alt="Custom Design Create Your Own Diamond Engagement Ring Yellow White Rose Gold Setting Surrey Canada">
    </div>
    <div class="create-design-text">
      <div class="create-design-text-inner">
        <h1>
          <div class="create">Create Your Very Own</div>
          <div class="engagement">Engagement Ring</div>
        </h1>
        <p class="design">Design your engagement ring the way you want it. Begin by either picking starting with your setting or diamond.</p>
        <div>
          <a href="{{url('/engagement-ring')}}"><button>Start With Setting</button></a>
          <a href="{{url('/diamonds/')}}"><button>Start With Diamond</button></a>
          <a href="{{url('/lab-grown-diamond/')}}"><button>Start With Lab Diamond</button></a>
          <a href="{{url('/moissanite')}}"><button>Start With Moissanite</button></a>
        </div>
      </div>
    </div>
</div>

<h2 class="ring-title">Shop Our Best Sellers</h2>

<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
  <div class="carousel-cell">
    <a href="{{url('/engagement-ring?category=Solitaire')}}">
      <img alt="Solitaire Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/solitaire.jpg') }}">
    </a>
      <h3 class="seller-title">Solitaire</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/engagement-ring?category=three-stone')}}">
      <img alt="Three-Stone Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/three-stone.jpg') }}">
    </a>
      <h3 class="seller-title">Three Stone</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/engagement-ring?category=double halo')}}">
      <img alt="Double Halo Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/doublehalo.jpg') }}">
    </a>
      <h3 class="seller-title">Double Halo</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/engagement-ring?category=straight')}}">
      <img alt="Straight Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/straight.jpg') }}">
    </a>
      <h3 class="seller-title">Straight</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/engagement-ring?category=halo')}}">
      <img alt="Halo Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/halo.jpg') }}">
    </a>
      <h3 class="seller-title">Halo</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/engagement-ring?category=split shank')}}">
      <img alt="Split Shank Diamond Engagement Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/splitshank.jpg') }}">
    </a>
      <h3 class="seller-title">Split Shank</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/wedding-band')}}">
      <img alt="Women Diamond Wedding Band Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/wedding.jpg') }}">
    </a>
      <h3 class="seller-title">Wedding Band</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/wedding-band?category=eternity')}}">
      <img alt="Women Diamond Eternity Band Gold Ring Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond" src="{{ asset('storage/image/page_img/eternity.jpg') }}">
    </a>
      <h3 class="seller-title">Eternity Band</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/fine-jewellery?style=stud')}}">
      <img alt="Diamond Stud Gold Earrings Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond Coquitlam" src="{{ asset('storage/image/page_img/stud.jpg') }}">
    </a>
      <h3 class="seller-title">Studs</h3>
  </div>
  <div class="carousel-cell">
    <a href="{{url('/fine-jewellery?category=bracelets')}}">
      <img alt="Diamond Bracelet Gold Necklace Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond Coquitlam" src="{{ asset('storage/image/page_img/bracelet1.jpg') }}">
    </a>
      <h3 class="seller-title">Bracelet</h3>
  </div>
</div>

<div class="custom-design-container custom-design-full">
    <div class="custom-design-text">
      <div class="custom-design-text-inner">
        <h2>
        <div class="create">Can't Find What You Are Looking For?</div>
        </h2>
        <p class="design">Book an appointment now and a specialist will help you with any questions & concerns.</p>
        <div><a href="{{ url('/contact') }}"><button>Book An Appointment</button></a></div>
      </div>
    </div>
    <div class="custom-design-inner">
      <img alt="Create your own custom design diamond jewellery engagement ring, earring, bracelet, band or chain" src="{{ asset('storage/image/page_img/custom2.jpg') }}">
    </div>
</div>

<div class="custom-design-container custom-design-mobile">
    <div class="custom-design-inner">
      <img alt="Create your own custom design diamond jewellery engagement ring, earring, bracelet, band or chain" src="{{ asset('storage/image/page_img/custom2.jpg') }}">
    </div>
    <div class="custom-design-text">
      <div class="custom-design-text-inner">
        <h2>
        <div class="create">Can't Find What You Are Looking For?</div>
        </h2>
        <p class="design">Book an appointment now and a specialist will help you with any questions & concerns.</p>
        <div><a href="{{ url('/contact') }}"><button>Book An Appointment</button></a></div>
      </div>
    </div>
</div>

<div class="display-container">
      <div class="display-inner">
        <a href="{{url('/diamonds')}}">
          <div class="display-overflow">
              <figcaption>SHOP MINED DIAMONDS</figcaption>
              <div class="hover-bkg"></div>
              <img alt="Shop Our Mined Diamond Loose Gemstone GIA Certified Presented In 360° HD. Create Your Own Engagement Ring With Our Gemstones" src="{{ asset('storage/image/page_img/diamonds.jpg') }}">
          </div>
        </a>
      </div>
      <div class="display-inner">
        <a href="{{url('/lab-grown-diamond')}}">
          <div class="display-overflow">
              <figcaption>SHOP LAB GROWN DIAMONDS</figcaption>
              <div class="hover-bkg"></div>
              <img alt="Shop Our Lab Grown Diamond Loose Gemstone Certified Presented In 360° HD. Create Your Own Engagement Ring With Our Gemstones" src="{{ asset('storage/image/page_img/lab-diamond.jpg') }}">
          </div>
        </a>
      </div>
      <div class="display-inner">
        <a href="{{url('/moissanite')}}">
          <div class="display-overflow">
              <figcaption>SHOP MOISSANITE</figcaption>
              <div class="hover-bkg"></div>
              <img alt="Shop Our Brilliant Cut Moissanite Loose Gemstone Presented In 360° HD. Create Your Own Engagement Ring With Our Gemstones" src="{{ asset('storage/image/page_img/moissanite.jpg') }}">
          </div>
        </a>
      </div>
  </div>

<h2 class="diamond-title">Shop Diamonds By Shape</h2>

  <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=round')}}">
          <img alt="High Quality Round Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Round-cut.png') }}">
        </a>
          <h3 class="gem-title">Round</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=square')}}">
          <img alt="High Quality Square Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Princess-cut.png') }}">
        </a>
          <h3 class="gem-title">Square</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=emerald')}}">
          <img alt="High Quality Emerald Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Emerald-cut.png') }}">
        </a>
          <h3 class="gem-title">Emerald</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=oval')}}">
          <img alt="High Quality Oval Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Oval-cut.png') }}">
        </a>
          <h3 class="gem-title">Oval</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=pear')}}">
        <img alt="High Quality Pear Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Pear-cut.png') }}">
        </a>
        <h3 class="gem-title">Pear</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=marquise')}}">
          <img alt="High Quality Marquise Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Marquise-cut.png') }}">
        </a>
          <h3 class="gem-title">Marquise</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=cushion')}}">
          <img alt="High Quality Cushion Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Cushion-cut.png') }}">
        </a>
          <h3 class="gem-title">Cushion</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=asscher')}}">
          <img alt="High Quality Asscher Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Asscher-cut.png') }}">
        </a>
          <h3 class="gem-title">Asscher</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=heart')}}">
          <img alt="High Quality Asscher Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Heart-cut.png') }}">
        </a>
          <h3 class="gem-title">Heart</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=trillion')}}">
          <img alt="High Quality Trillion Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Trillion-cut.png') }}">
        </a>
          <h3 class="gem-title">Trillion</h3>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/diamonds?shape=radiant')}}">
          <img alt="High Quality Radiant Diamond Gemstone SI2 SI1 VS2 VS1 VVS2 VVS1 IF FL Clarity D E F G H I J K Color" src="{{ asset('storage/image/gemstone/Radiant-cut.png') }}">
        </a>
          <h3 class="gem-title">Radiant</h3>
      </div>

  </div>

<div class="display-container">
    <div class="display-inner">
      <a href="{{url('/engagement-ring')}}">
        <div class="display-overflow">
            <figcaption>ENGAGEMENT RINGS</figcaption>
            <div class="hover-bkg"></div>
            <img alt="Diamond engagement gold rings Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond Coquitlam" src="{{ asset('storage/image/page_img/ring6.jpg') }}">
        </div>
      </a>
    </div>
    <div class="display-inner">
      <a href="{{url('/wedding-band')}}">
        <div class="display-overflow">
            <figcaption>WEDDING BANDS</figcaption>
            <div class="hover-bkg"></div>
            <img alt="Women/Mens diamond wedding bands Surrey Langley Canada Burnaby Abbotsford Vancouver Richmond Kelowna" src="{{ asset('storage/image/page_img/rings3.jpg') }}">
        </div>
      </a>
    </div>
    <div class="display-inner">
      <a href="{{url('/fine-jewellery')}}">
        <div class="display-overflow">
            <figcaption>FINE JEWELLERY</figcaption>
            <div class="hover-bkg"></div>
            <img alt="Fine Diamond Jewellery rings, earrings, bracelets and necklaces Surrey Langley Canada Vancouver" src="{{ asset('storage/image/page_img/fine-jewellery2.jpg') }}">
        </div>
      </a>
    </div>
</div>

  <h2 class="diamond-title">Shop By Brand Names</h2>

  <div class="main-carousel main-brand" data-flickity='{ "cellAlign": "left", "contain": true }'>

      <div class="carousel-cell">
        <a href="{{url('/engagement-ring?brand=verragio')}}">
          <img alt="Verragio Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/verragio.png')}}">
        </a>
      </div>

      <div class="carousel-cell carousel-gabriel">
        <a href="{{url('/engagement-ring?brand=gabrielco')}}">
          <img alt="Gabriel & Co. Diamond Classic Engagement Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/gabriel.svg')}}">
        </a>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/engagement-ring?brand=simong')}}">
          <img alt="Simon G. Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/simong.png')}}">
        </a>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/engagement-ring?brand=valina')}}">
          <img alt="Valina Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/valina.png')}}">
        </a>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/engagement-ring?brand=romance')}}">
        <img alt="Romance Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/romance.png')}}">
        </a>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/moissanite')}}">
          <img alt="Charles & Colvard Diamond Moissanite Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver" src="{{asset('storage/image/logo/charlescolvard.svg')}}">
        </a>
      </div>

      <div class="carousel-cell">
        <a href="{{url('/wedding-band?brand=malo')}}">
          <img alt="Malo Diamond Wedding Satin Gold Yellow White Rose Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/malo.png')}}">
        </a>
      </div>

  </div>

  <div class="category-container">
    <div class="display-inner">
      <a href="{{url('/fine-jewellery?category=rings')}}">
        <div class="display-overflow">
            <figcaption>RINGS</figcaption>
            <div class="hover-bkg"></div>
            <img alt="Diamond color gemstone pearl 10k 14k 18k yellow white rose fashion engagement rings bands Surrey" src="{{ asset('storage/image/page_img/ring9.jpg') }}">
        </div>
      </a>

    </div>
    <div class="display-inner">
      <a href="{{url('/fine-jewellery?category=earrings')}}">
        <div class="display-overflow">
            <figcaption>EARRINGS</figcaption>
            <div class="hover-bkg"></div>
            <img alt="Diamond color gemstone pearl 10k 14k 18k yellow white rose earrings Surrey Langley Canada Burnaby" src="{{ asset('storage/image/page_img/earring2.jpg') }}">
        </div>
      </a>
    </div>
    <div class="display-inner">
      <a href="{{url('/fine-jewellery?category=bracelets')}}">
        <div class="display-overflow">
            <figcaption>BRACELETS</figcaption>
            <div class="hover-bkg"></div>
            <img alt="Diamond color gemstone pearl 10k 14k 18k yellow white rose bracelet Surrey Langley Canada Burnaby" src="{{ asset('storage/image/page_img/bracelet3.jpg') }}">
        </div>
      </a>
    </div>
    <div class="display-inner">
      <a href="{{url('/fine-jewellery?category=necklaces')}}">
        <div class="display-overflow">
            <figcaption>NECKLACES</figcaption>
            <div class="hover-bkg"></div>
            <img alt="Diamond color gemstone pearl 10k 14k 18k yellow white rose necklaces Surrey Langley Canada Burnaby" src="{{ asset('storage/image/page_img/chain4.jpg') }}">
        </div>
      </a>
    </div>
  </div>

<script type="text/javascript" src="{{ URL::asset('js/welcome.js?'.time().'') }}"></script>

@endsection
