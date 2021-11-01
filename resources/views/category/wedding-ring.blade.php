@extends('layouts.category')

@section('include')

@endsection

@section('main')
	
	<div class="banner-container">
		<div class="inner-banner">
			<img src="http://www.localhost/excelecom/public/image/main-banner.jpg">
		</div>
	</div>

	<div class="womens-wedding-band">
		<div class="inner-container inner-women">
			<div class="img-container">
				<img src="{{ asset('image/page_img/womenband.jpg') }}">
				<button>Shop Women's Ring</button>
			</div>
	
				<section class="center slider">
				    <div>
				      <a href="{{url('/wedding-band?style=Classic')}}"><img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Medium/Gabriel-Platinum-11-Stone-French-Pav-Set-Band~AN11180PT4JJ-1.jpg"></a>
				      <div class="inner-container-title">Classic</div>
					  <div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <a href="{{url('/wedding-band?style=Eternity')}}"><img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Medium/Gabriel-14k-White-Gold-French-Pav-Set-Diamond-Eternity-Band~AN11261-7W44JJ-1.jpg"></a>
						<div class="inner-container-title">Eternity</div>
						<div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <a href="{{url('/wedding-band?style=Aniversary')}}"><img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Medium/Gabriel-14k-White-Gold-Twisted-Diamond-Anniversary-Band~AN8261W44JJ-1.jpg"></a>
						<div class="inner-container-title">Aniversary</div>
						<div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <a href="{{url('/wedding-band?style=Diamond')}}"><img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/ListingMedium/Gabriel-Vintage-14k-White-Gold-Hand-Engraved-Channel-Set-Eternity-Band~AN5280-6W44JJ-1.jpg"></a>
				      <div class="inner-container-title">Diamond</div>
					  <div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <a href="{{url('/wedding-band?style=Stackable')}}"><img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Medium/Gabriel-14K-White-Gold-Diamond-Anniversary-Band~AN12545S-W44JJ-1.jpg"></a>
						<div class="inner-container-title">Stackable</div>
						<div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <a href="{{url('/wedding-band?style=Wedding')}}"><img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/ListingMedium/Gabriel-Platinum-11-Stone-French-Pav-Set-Band~AN11180PT4JJ-1.jpg"></a>
						<div class="inner-container-title">Wedding</div>
						<div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <a href="{{url('/wedding-band?style=Curved')}}"><img src="https://cdn-images.gabrielny.com/is/image/GabrielCo/Medium/Gabriel-Vintage-Hand-Carved-14k-White-Gold-Curved-Channel-Set-Band~AN10965W44JJ-1.jpg"></a>
						<div class="inner-container-title">Curved</div>
						<div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				</section>
		
		</div>
	</div>

	<div class="mens-wedding-band">
		<div class="inner-container inner-men">
			<section class="center slider">
				    <div>
				      <img src="https://www.malobands.com/media/products/68326/J-100-06WG.jpg">
				      <div class="inner-container-title">Classic</div>
					  <div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <img src="https://www.malobands.com/media/products/111121/LUX-166-7W.jpg">
						<div class="inner-container-title">Lux</div>
						<div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <img src="https://www.malobands.com/media/products/70321/JMD-1417-8W.jpg">
						<div class="inner-container-title">Diamond</div>
						<div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				    <div>
				      <img src="https://www.malobands.com/media/products/65765/CB-022.jpg">
				      <div class="inner-container-title">Alternative</div>
					  <div class="inner-container-text">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				    </div>
				</section>
			<div class="img-container">
				<img src="{{ asset('image/page_img/mens-band.jpg') }}">
				<button>Shop Men's Ring</button>
			</div>
		</div>
	</div>

	<style type="text/css">
	
	*{
		min-height: 0;
		min-width: 0;
	}

	.banner-container{
        height: 50vh;
        overflow: hidden;
    }

    .banner-container img{
        height: 80vh;
        object-fit:cover;
        width: 100%;
    }

    /*women container*/
    .womens-wedding-band{
    	width: 100%;
    	background:white;
    }

    .inner-women .center{
    	background: #f8f0f3;
    }

    .center{
		display: flex;
		align-items: center;
		justify-content: center;
	}

    .inner-container{
    	max-width: 1000px;
    	margin: auto;
    	padding:0px 25px;
    }

    .inner-women{
    	display:grid;
    	grid-template-columns: 250px 1fr;
    }

    .inner-men{
    	display:grid;
    	grid-template-columns: 1fr 250px;
    }

    .inner-container img{
    	width:100%;
    }

    .inner-container .ring-container{
    	padding: 10px;
    }

    .inner-container-title{
    	text-align: center;
    }

    .inner-container-text{
    	font-size: 11px;
    	text-align: center;
    }

    .img-container{
    	position: relative;
    	z-index: 2;
    }

    .img-container button{
    	position: absolute;
	    top: 90%;
	    left: 50%;
	    transform: translate(-50%, -50%);
	    background: #d60d8c;
	    color: white;
	    border: none;
	    padding: 6px 18px;
    }

    /*Mens container*/
    .mens-wedding-band{
    	background:white;
    	width: 100%;
    }

    .inner-men .center{
    	background:#ffece0;
    }
	</style>
<style type="text/css">

    .slider {
        width:100%;
        position: relative;
        z-index: 1;
    }

    .slick-slide {
		margin: 0px 50px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;

    }
    
    .slick-current {
      opacity: 1;
      transform: scale(1);
    }
  </style>
    <script type="text/javascript">
    $(document).on('ready', function() {
    
      $(".center").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        swipeToSlide:true,
        prevArrow: false,
    	nextArrow: false
      });
    });
</script>

@endsection