@extends('layouts.category')

@section('include')

@endsection

@section('main')
	
	<div class="banner-container">
		<div class="inner-banner">
			<img src="http://www.localhost/excelecom/public/image/main-banner.jpg">
		</div>
	</div>

    <div class="diamond">
        <div class="inner-container inner-diamond">
            <div class="img-container">
                <img src="https://ion.r2net.com/Images/Splash/forwomanbg3.jpg">
                <button>Shop Diamond</button>
            </div>
    
            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/round-Diamond.png?v=5">
                  <div class="gem-title">Round</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/princess-Diamond.png?v=5">
                  <div class="gem-title">Princess</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/emerald-Diamond.png?v=5">
                  <div class="gem-title">Emerald</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/asscher-Diamond.png?v=5">
                  <div class="gem-title">Asscher</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/oval-Diamond.png?v=5">
                  <div class="gem-title">Oval</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/radiant-Diamond.png?v=5">
                  <div class="gem-title">Radiant</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/pear-Diamond.png?v=5">
                <div class="gem-title">Pear</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/heart-Diamond.png?v=5">
                  <div class="gem-title">Heart</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/marquise-Diamond.png?v=5">
                  <div class="gem-title">Marquise</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
              <div class="carousel-cell">
                  <img src="https://ion.r2net.com/images/amazingHomepage/diamonds/cushion-Diamond.png?v=5">
                  <div class="gem-title">Cushion</div>
                  <div class="gem-description">Beautiful Round Stone</div>
              </div>
            </div>
        
        </div>
    </div>


    <div class="design-engagement-ring">
        <div class="engagement-ring-container">
            <div class="design-text">
                <div class="inner-text">
                    <div class="title">Design Your Own Engagement Ring</div>
                    <div class="description">Select from hundreds of stunning engagement ring styles and add a
    brilliant loose diamond of your choice. Or begin by selecting one of
    200,000+ loose diamonds and match it with a beautiful ring setting in the
    precious metal of your choice.</div>
                    <button>Design Now</button>
                </div>
            </div>
            <div><img src="https://ion.r2net.com/Images/Splash/diamond-engagement-ring.jpg"></div>
        </div>
    </div>
    <div class="design-pendant">
        <div class="pendant-container">
            <div><img src="https://i.etsystatic.com/7371176/r/il/01118e/1010428848/il_794xN.1010428848_rdbv.jpg"></div>
            <div class="design-text">
                <div class="inner-text">
                    <div class="title">Design Your Own Pendant</div>
                    <div class="description">Select from hundreds of stunning engagement ring styles and add a
    brilliant loose diamond of your choice. Or begin by selecting one of
    200,000+ loose diamonds and match it with a beautiful ring setting in the
    precious metal of your choice.</div>
                    <button>Design Now</button>
                </div>
            </div>
        </div>
    </div>


    <div class="design-earring">
        <div class="earring-container">
            <div class="design-text">
                <div class="inner-text">
                    <div class="title">Design Your Own Earrings</div>
                    <div class="description">Select from hundreds of stunning engagement ring styles and add a
    brilliant loose diamond of your choice. Or begin by selecting one of
    200,000+ loose diamonds and match it with a beautiful ring setting in the
    precious metal of your choice.</div>
                    <button>Design Now</button>
                </div>
            </div>
            <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsHdfWSJTSWpqTZCdkTyXypOwKk74j5Pg03Pp2MFzwzR8fSmtW"></div>
        </div>
    </div>

     <div class="learning">
        <div class="learning-container">
            <div><img src="https://ion.r2net.com/Images/Splash/diamond-engagement-ring.jpg"></div>
            <div class="design-text">
                <div class="inner-text">
                    <div>Design Your Own Earrings</div>
                    <div>Learn About Diamonds</div>
                    <div>Learn About Lab Diamonds</div>
                    <div>Engagement Ring Guide</div>
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
        height: 50vh;
        overflow: hidden;
    }

    .banner-container img{
        height: 80vh;
        object-fit:cover;
        width: 100%;
    }

    /*diamond container*/
    .diamond{
    	width: 100%;
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

    .inner-diamond{
    	display:grid;
    	grid-template-columns: 300px 1fr;
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

    /*engagement*/
    .engagement-ring-container{
        max-width: 1000px;
        margin: auto;
        display: grid;
        grid-template-columns: 1fr 35%;
        padding: 0px 25px;
        position: relative;
    }

    .engagement-ring-container .design-text{
        background: #ededed;
    }

    .engagement-ring-container .inner-text{
        padding: 50px;
    }

    .engagement-ring-container button{
        background: #d60d8c;
        color: white;
        border: none;
        padding: 6px 18px;
    }

    .engagement-ring-container .title{
        color: #d60d8c;
        font-size: 25px;
    }

    .engagement-ring-container .description{
        font-size: 12px;
        padding: 10px 0px;
    }

    .engagement-ring-container img{
        width: 100%;
    }

    .inner-text{
        
        position: absolute;
    top: 50%;  /* position the top  edge of the element at the middle of the parent */
    left: 50%; /* position the left edge of the element at the middle of the parent */

    transform: translate(-50%, -50%);
    width: 100%;
    }

    .design-text{
        text-align: center;
        position: relative;
    }
    /*pendant*/
    .pendant-container{
        max-width: 1000px;
        margin: auto;
        display: grid;
        grid-template-columns: 35% 1fr;
        padding: 0px 25px;
    }

    .pendant-container img{
        width: 100%;
    }

    .pendant-container .design-text{
        background: #ededed;
    }

    .pendant-container .inner-text{
        padding: 50px;
    }

    .pendant-container button{
        background: #d60d8c;
        color: white;
        border: none;
        padding: 6px 18px;
    }

    .pendant-container .title{
        color: #d60d8c;
        font-size: 25px;
    }

    .pendant-container .description{
        font-size: 12px;
        padding: 10px 0px;
    }
    /*earring*/
    .earring-container{
        max-width: 1000px;
        margin: auto;
        display: grid;
        grid-template-columns: 1fr 35%;
        padding: 0px 25px;
    }

    .earring-container img{
        width: 100%;
    }

    .earring-container .design-text{
        background: #ededed;
    }

    .earring-container .inner-text{
        padding: 50px;
    }

    .earring-container button{
        background: #d60d8c;
        color: white;
        border: none;
        padding: 6px 18px;
    }

    .earring-container .title{
        color: #d60d8c;
        font-size: 25px;
    }

    .earring-container .description{
        font-size: 12px;
        padding: 10px 0px;
    }

    /*Learn*/
    .learning-container{
        max-width: 1000px;
        margin: auto;
        display: grid;
        grid-template-columns: 35% 1fr;
        padding: 0px 25px;
    }

    .learning-container img{
        width: 100%;
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