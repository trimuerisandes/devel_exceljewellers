@extends('layouts.category')

@section('include')

@endsection

@section('main')
	
	<div class="banner-container">
		<div class="inner-banner">
			<img src="http://www.localhost/excelecom/public/image/main-banner.jpg">
		</div>
	</div>

	<div class="engagement">
		<div class="inner-container inner-engagement">
			<div class="img-container">
				<img src="{{ asset('image/page_img/ring11.jpg') }}">
				<button>Shop Engagement Setting</button>
			</div>
			<div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/round-Diamond.png?v=5">
                  <div class="gem-title">Solitaire</div>
                  <div class="gem-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/princess-Diamond.png?v=5">
                  <div class="gem-title">Straight</div>
                  <div class="gem-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/emerald-Diamond.png?v=5">
                  <div class="gem-title">Split Shank</div>
                  <div class="gem-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/asscher-Diamond.png?v=5">
                  <div class="gem-title">Free Form</div>
                  <div class="gem-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/oval-Diamond.png?v=5">
                  <div class="gem-title">Pave</div>
                  <div class="gem-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/radiant-Diamond.png?v=5">
                  <div class="gem-title">Halo</div>
                  <div class="gem-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
              </div>
              <div class="carousel-cell">
                <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/pear-Diamond.png?v=5">
                <div class="gem-title">Double Halo</div>
                  <div class="gem-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/heart-Diamond.png?v=5">
                  <div class="gem-title">Three Stone</div>
                  <div class="gem-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
              </div>
            </div>
		
		</div>
	</div>

	<div class="metal">
		<div class="metal-title">Browse By Metal Type</div>
		<div class="inner-container inner-metal">
		    <div class="metal-container">
		      <div class="icon-ring white-gold"></div>
		      <div class="inner-container-title">14K White Gold</div>
		    </div>
		    <div class="metal-container">
		      	<div class="icon-ring white-gold"></div>
				<div class="inner-container-title">18K White Gold</div>
		    </div>
		    <div class="metal-container">
		      	<div class="icon-ring yellow-gold"></div>
				<div class="inner-container-title">14K Yellow Gold</div>
		    </div>
		    <div class="metal-container">
		      <div class="icon-ring yellow-gold"></div>
		      <div class="inner-container-title">18K Yellow Gold</div>
		    </div>
		    <div class="metal-container">
		      	<div class="icon-ring platinum"></div>
				<div class="inner-container-title">Platinum</div>
		    </div>
		</div>
	</div>

	<div class="brand">
		<div class="brand-title">Our Designers</div>

		<div class="inner-container inner-brand">
			<a href="{{url('/engagement-ring?brand=Verragio')}}">
			    <div class="inner-brand-container">
				
				  <div class="ring_img_container">
				  	<img class="ring_img" src="{{ asset('image/page_img/slimring.jpg') }}">
				  </div>

				  <div class="brand-text verragio">
				  	<div class="brand-inner">
				  		<div class="brand-logo"><img src="https://ion.r2net.com/Images/svg/designers-logos/verragio-logo.svg"></div>
				  		<div class="brand-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
				  	</div>
				  </div>


			    </div>
			</a>

		    <div class="inner-brand-container">
	
			  <div class="brand-text gabriel">
			  	<div class="brand-inner">
			  		<div class="brand-logo"><img src="https://cdn-themes.gabrielny.com/site2017theme/images/theme2019/svg/logo-theme2019.svg"></div>
			  		<div class="brand-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
			  	</div>
			  </div>

			  <div class="ring_img_container">
				  <img class="ring_img" src="{{ asset('image/page_img/slimring1.jpg') }}">
			  </div>
			  
		    </div>

		    <div class="inner-brand-container">
	
			  <div class="ring_img_container">
				  <img class="ring_img" src="{{ asset('image/page_img/slimring.jpg') }}">
			  </div>

			  <div class="brand-text skashi">
			  	<div class="brand-inner">
			  		<div class="brand-logo"><img src="http://www.skashi.com/images/global/logo2_white.png"></div>
			  		<div class="brand-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
			  	</div>
			  </div>

			  
		    </div>

		    <div class="inner-brand-container">
	
			  <div class="brand-text romance">
			  	<div class="brand-inner">
			  		<div class="brand-logo"><img src="http://www.lovemyromance.com/skin/frontend/base/default/images/logo/logo_white_plus.png"></div>
			  		<div class="brand-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
			  	</div>
			  </div>

			  <div class="ring_img_container">
				  <img class="ring_img" src="{{ asset('image/page_img/slimring1.jpg') }}">
			  </div>

		    </div>

		    <div class="inner-brand-container">
	
			  <div class="ring_img_container">
				  <img class="ring_img" src="{{ asset('image/page_img/slimring.jpg') }}">
			  </div>

			  <div class="brand-text valina">
			  	<div class="brand-inner">
			  		<div class="brand-logo"><img src="https://www.valina.com/pub/media/logo/stores/3/valina-logo-gradient.png"></div>
			  		<div class="brand-description">A classic, timeless choice, made up of a single stone and a plain setting, simple and elegant in appearance.</div>
			  	</div>
			  </div>
		    </div>
		</div>

	</div>

	<style type="text/css">
	
	*{
		min-height: 0;
		min-width: 0;
	}

	.banner-container{
        height: 70vh;
        overflow: hidden;
    }

    .banner-container img{
        height: 80vh;
        object-fit:cover;
        width: 100%;
    }

    /*women container*/
    .engagement{
    	width: 100%;
    }

    .center{
		display: flex;
		align-items: center;
		justify-content: center;
		background:#e8edf0;
	}

    .inner-container{
    	max-width: 1000px;
    	margin: auto;
    	padding:0px 25px;
    }

    

    .brand-title{
    	text-align: center;
	    font-size: 40px;
	    padding: 25px;

    }

    .inner-metal{
    	display: flex;
    }

    .metal-title{
    	text-align: center;
    	font-size: 35px;
    	padding: 10px;
    	background: #f9eddc;
    }

    .metal-container{
    	width: 20%;
    	padding: 30px;
    }

    .inner-engagement{
    	display:grid;
    	grid-template-columns: 300px 1fr;
    }

    .inner-pendant{
    	display:grid;
    	grid-template-columns: 1fr 300px;
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

    /*Brand*/

    .inner-brand-container{
    	display:grid;
    	grid-template-columns: 1fr 1fr;
    }

    .ring_img_container{
    	overflow: hidden;
    }

    .ring_img{
    	transition: .3s;
    }

    .inner-brand-container:hover .ring_img{
    	transform: scale(1.1);
    }

    .brand-text{
    	position: relative;
    	text-align: center;
    	color: white;
    }

    .brand-description{
    	font-size: 11px;
    	padding: 10px;
    }

    .verragio{
    	background: #3b0c04;
    }

    .gabriel{
    	background: #ec1b02;
    }

    .skashi{
    	background: black;
    }

    .romance{
    	background: black;
    }

    .valina{
    	background: #777;
    }

    .brand-inner{
    	position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, -50%);
    }

    .brand-logo{
    	width: 100%;
    }

    

    /**/

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

    /*Metal*/

    .inner-metal .icon-ring{
    	text-align: center;
    	font-size: 30px;
    }

	</style>
<style type="text/css">

	.carousel-cell {
	  width: 33.33%;
	  padding:50px 0px 50px 0px;
	}

	.carousel-cell img{
	    width: 100%;
	    padding:0px 15% 20px 15%;
	}

	.hidden-pic{
	  display: none;
	}

	/*seller*/
	.seller-title{
	  text-align: center;
	  display: none;
	  font-weight: bold;
	}

	.seller-description{
	  text-align: center;
	  display: none;
	}

	/*gems*/
	.flickity-viewport{
	    position: relative;
	    top: 25%;
	}

	.gem-title{
	  text-align: center;
	  display: none;
	  font-weight: bold;
	  color: black;
	}

	.gem-description{
	  text-align: center;
	  display: none;
	  color: black;
	}

	.carousel-cell.is-selected {
	/*  transform: scale(1.2);*/
	}

	.is-selected .gem-title,.is-selected .seller-title{
	  display: block;
	}

	.is-selected .gem-description,.is-selected .seller-description{
	  display: block;
	}

  </style>
    <script type="text/javascript">
    $(document).on('ready', function() {
    
 
      $('.main-carousel').flickity({
            cellAlign: 'center',
            contain: true,
            pageDots: false,
            wrapAround: true,
            asNavFor: '.carousel-main',
            prevNextButtons: false,
      });

    });
</script>

@endsection