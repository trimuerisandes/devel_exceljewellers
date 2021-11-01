@extends('layouts.service')

@section('include')

@endsection

@section('page-title')
Our Store Location - Excel Jewellers
@endsection

@section('page-description')
Excel Jewellers located at Langley and Guildford Mall Town Center Upper Level. We offer top quality brand named jewellery such as Verragio, Gabriel & Co and many more. 
@endsection

@section('canonical')
<link rel="canonical" href="https://www.exceljewellers.com/services/location">
@endsection

@section('title')
  Our Locations
@endsection
@section('sub-title')

@endsection
@section('main')
	
<div class="location-ctn">
	<h4 class="pink">Excel Jewellers Guildford</h4>
	<img src="{{ asset('storage/image/page_img/guildford.jpg') }}">
	<ul>
		<a href="https://www.google.com/maps/place/Excel+Jewellers/@49.1903229,-122.8073424,16z/data=!4m19!1m13!4m12!1m4!2m2!1d-122.7085906!2d49.104961!4e1!1m6!1m2!1s0x5485d76d2d03fa2d:0x2930d208f23b3948!2sExcel+Jewellers,+upper+level,+10355+152+St+%232203,+Surrey,+BC+V3R+7C1!2m2!1d-122.803713!2d49.1904168!3m4!1s0x5485d76d2d03fa2d:0x2930d208f23b3948!8m2!3d49.1904168!4d-122.803713"><li>2203 - 10355 - 152nd St Surrey, BC V3R 7C1</li></a>
		<a href="tel:604-588-0085"><li>604-588-0085</li></a>
		<a href="{{url('/contact-us')}}"><li>sales@exceljewellers.com</li></a>
	</ul>
	<h5 class="pink">Store Hours</h5>
	<ul>
		<li>Monday to Saturday 10:00AM - 7:00PM</li>
		<li>Sunday - 11:00AM - 7:00PM</li>
		<li>Holiday Hours May Vary</li>
		<li>Guildford - See Extended Mall hours in Guildford</li>
	</ul>
	<h4 class="pink">Excel Jewellers Langley</h4>
	<img src="{{ asset('storage/image/page_img/langley.jpg') }}">
	<ul>
		<a href="https://www.google.com/maps/place/Excel+Jewellers/@49.1121903,-122.7208622,13z/data=!3m1!5s0x5485d1d22f139b31:0xad0170a79366ca3c!4m19!1m13!4m12!1m4!2m2!1d-122.7085906!2d49.104961!4e1!1m6!1m2!1s0x5485d1d1c3457215:0x2ae11da4380fea15!2sExcel+Jewellers,+20202+66+Ave+%23370,+Langley+City,+BC+V2Y+1P3!2m2!1d-122.6641683!2d49.1200775!3m4!1s0x5485d1d1c3457215:0x2ae11da4380fea15!8m2!3d49.1200775!4d-122.6641683"><li>Suite 370-20202 - 66 Ave Langley BC V2Y 1P3</li></a>
		<a href="tel:604-539-7720"><li>604-539-7720</li></a>
		<a href="{{url('/contact-us')}}"><li>info@exceljewellers.com</li></a>
	</ul>
	<h5 class="pink">Store Hours</h5>
	<ul>
		<li>Monday - Friday 10:00AM - 5:30PM</li>
		<li>Saturday 10:00AM - 5:00PM</li>
		<li>Sunday & Statutory Holidays - Closed</li>
	</ul>

</div>

<style type="text/css">

	.location-ctn a{
		text-decoration: none;
	}
	
	img{
		max-width: 400px;
	}

	.pink{
		color: #d60d8c;
	}

	ul{
		padding:0px;
	}

	ul li{
		list-style: none;
	}

</style>

@endsection