@extends('layouts.education')

@section('include')

@endsection

@section('page-title')
About Diamonds Colors | Excel Jewellers
@endsection

@section('page-description')
Diamond High Quality GIA Diamond Color Grade Diamond Color Chart Surrey BC Canada Burnaby Vancouver Richmond
@endsection


@section('canonical')
<link rel="canonical" href="https://www.exceljewellers.com/education-diamond-color">
@endsection

@section('main')
<link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}">
<script type="text/javascript" src="{{ asset('js/nouislider.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/wNumb.js') }}"></script>
<!-- <div class="banner-container">
	<div class="inner-banner">
		<img src="http://www.localhost/excelecom/public/image/main-banner.jpg">
	</div>
</div> -->

<div class="color-container">

	<h1 class="diamond-title">ABOUT DIAMOND COLOR</h1>
	<div class="diamond-text-container">
		<div class="diamond-text">
			<p>When shopping for a diamond for your loved one, it is preferred to choose a stone with the least amount of color.</p>
			<p>The highest quality diamonds are usually colorless and thus higher the value, while the diamonds with the poor cut and low quality have noticeable color as yellow, brown or gray.</p>
			<p>Diamonds with less color allow more light to pass refract and reflect, are more brighter and sparkle than the other one.
			There are six categories on the GIA diamond chart, with the range from colorless to light in color.</p>
			<p>Diamonds rated D are the most devoid of color and very rare, while G and H color diamonds are near colorless. The more you move down the color chart, the lower the color grade is, and the more noticeable the light yellow hue becomes.</p>
		</div>
	</div>
	<div class="diamond-slide-container">
		<div class="diamond-case">
			<img alt="High Quality Clarity Diamond Color D E F G H I J K L M N O P Q R S Z Surrey Langley Canada Vancouver" class="diamond-img" src="{{ asset('storage/image/page_img/d-cut.png') }}">
		</div>
		<div id="slider-step"></div>	
	</div>
	<div>
		<img alt="High Quality Clarity Diamond Color D E F G H I J K L M N O P Q R S Z Surrey Langley Canada Vancouver" class="chart" src="{{ asset('storage/image/page_img/color-chart.jpg') }}">
	</div>
</div>


<style type="text/css">

	.color-container{
		padding: 10px;
	}

/*diamond text */
	.diamond-title{
		text-align: center;
		color: #d60d8c;
    	font-size: 30px;
		padding: 30px 0px 30px 0px;
	}


	.chart{
		padding-top: 60px;
		width: 100%;
	}

/*	*/
	.color-container{
		max-width: 1000px;
		margin: auto;
	}

	.diamond-slide-container{
		padding:0px 20px;
	}

	#slider-step{
		max-width: 500px;
		margin: auto;
	}

	#slider-label{
		max-width: 500px;
		margin: auto;
		display: grid;
		grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
	}

	.slider-j{
		text-align: right;
		padding-right:103px;
	}

	.slider-i{
		text-align: right;
		padding-right:85px;
	}

	.slider-h{
		text-align: right;
		padding-right:65px;
	}

	.slider-g{
		text-align: right;
		padding-right:47px;
	}

	.slider-f{
		text-align: right;
		padding-right:100%;
	}

	.slider-e{
		text-align: right;
		padding-right:60%;
	}

	.slider-d{
		text-align: right;
	}

	.diamond-case{
		text-align: center;
		padding: 5%;
	}

	.diamond-case img{
		width: 30%;
	}

	.noUi-marker-horizontal.noUi-marker-large{
		height: 5px;
	}

	.noUi-value{
		font-size: 12px;
	}

</style>
<script type="text/javascript">
    $(document).on('ready', function() {

		var stepSlider = document.getElementById('slider-step');

		var color = [
		"k",
		"J",
		"I",
		"H",
		"G",
		"F",
		"E",
		"D"
		]

		noUiSlider.create(stepSlider, {
		    start: [7],
		    step: 1,
		    range: {
		        'min': [0],
		        'max': [7]
		    },
		    pips: {
		        mode: 'values',
		        values: [0,1, 2, 3, 4, 5, 6,7],
		        density:100
		    }
		});

		$('.noUi-value').each(function(values){
			$('.noUi-value[data-value='+values+']').text(color[parseInt(values)]);
		});

		stepSlider.noUiSlider.on('update', function (values, handle) {
		    $('.diamond-img').attr('src','<?php echo(asset('storage/image/page_img')) ?>'+'/'+(color[parseInt(values)])+'-cut.png');
		});

    });
</script>
@endsection