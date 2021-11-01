@extends('layouts.web')

@section('page-title')
Excel Jewellers | Thank You
@endsection

@section('include')

@endsection

@section('main')


	@if($thankyou)

		@if(Auth::user())
		
			<div class="thankyou-container">
				<div class="thankyou-container-inner">
					<h4><div><span class="bold">Thank you</span> For Choosing <span class="pink">Excel Jewellers</span></div></h4>
					<div>Your Order <span class="pink">{{ session('order_num') }}</span> Has Been Succesfully Fulfilled</div>
					<div>To View Your Orders Please <a class="pink" href="{{ url('/orders')}}">Click Here</a></div>
				</div>
			</div>
		
		@else
			<div class="thankyou-container">
				<div class="thankyou-container-inner">
					<h4><div><span class="bold">Thank you</span> For Choosing <span class="pink">Excel Jewellers</span></div></h4>
					<div>Your Order <span class="pink">{{ session('order_num') }}</span> Has Been Succesfully Fulfilled</div>
					<div>To View Your Order Please Check Your Email</div>
				</div>
			</div>
		@endif

	@endif

	<style type="text/css">
		.thankyou-container{
			max-width: 1000px;
			padding:10px;
			margin: auto;
		}

		.thankyou-container-inner{
			padding:50px;
			border: solid 1px #e6e6e6;
		}

		.pink{
			color: #d60d8c;
		}

		a:hover{
			text-decoration:none;
		}


	</style>
@endsection