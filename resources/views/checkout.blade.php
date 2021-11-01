@extends('layouts.web')

@section('page-title')
Excel Jewellers | Checkout
@endsection

@section('main')
<?php

$path = storage_path() . "/json/country.json"; // ie: /var/www/laravel/app/storage/json/filename.json

$json = json_decode(file_get_contents($path), true); 

$i=0;
?>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/checkout.css?'.time().'') }}">
	<div class="checkout-form">



		@if($errors->any())
		<div class="error-container">
			Please Retry Again
		</div>
		@endif
		<div class="summary-tab">
			<div class="slidedown"><span class="icon-cart"></span> Show Order</div>
		</div>
		<div class="order_summary">
			<div class="order_summary_inner">
			@if(session('cart')|| !empty(session('cart')))

					<?php
					$cart_t_price = 0;
					?>
		            @foreach(session('cart.shopping_cart') as $sku => $details)			
		 		  					

					  		<div class="item-container" id="{{ $details['id'] }}">
					  			<div class="item-container-inner">
									<div class="item-img-container">
										<img src="{{ $details['default_img'] }}">
									</div>
									<div class="item-img-description">
										<div>{{ $details['sku'] }}</div>
										<div class="dropdown-name">{{ $details['name'] }}</div>
										<div>@if($details['engraving']) ( {{ $details['engraving']}} Engraved )@endif</div>
									</div>
								</div>
								<div class="item-price">
									<div>${{ number_format(\App\Helper\AppHelper::conversion( $details['currency'], $details['price'],session('currency')),2) }}</div>
								</div>
							</div>
							@if(isset($details['stone']))
							<div class="item-container" id="{{ $details['stone']['stone_id'] }}">
								
								<div class="item-container-inner">
									<div class="item-img-container">
										<img src="{{ $details['stone']['default_img'] }}">
									</div>
									<div class="item-img-description">
										<div>{{ $details['stone']['cert_num'] }}</div>
										<div class="dropdown-name">{{ $details['stone']['name'] }}</div>
									</div>
								</div>
								<div class="item-price">
									<div>${{ number_format(\App\Helper\AppHelper::conversion( $details['stone']['currency'], $details['stone']['price'],session('currency')),2) }}</div>
								</div>

							</div>
							@endif

							<?php
							$cart_t_price += \App\Helper\AppHelper::conversion( $details['currency'], $details['price'],session('currency'));

		  					if (isset($details['stone']['price'])) {
		  						$cart_t_price += \App\Helper\AppHelper::conversion( $details['stone']['currency'],$details['stone']['price'],session('currency'));
		  					}
							?>
							<hr>
		            @endforeach
		            <div class="final_total">Shipping: <span class="shipping-cost"> -- </span></div>
		            <div class="final_total">Tax: <span class="tax-cost"> -- </span></div>
		            <div class="final_total">Total: <span class="total-cost">${{ number_format($cart_t_price,2) }}</span></div>
		            <input type="hidden" name="total-cost" value="{{ number_format($cart_t_price,2) }}">
					<hr>
	        @endif
		    </div>
		</div>


		<div class="inside-form">
			<div class="deliver-name">Delivery & Pickup Options</div>
			<div class="select-address-ctn select-option-ctn">
				<div class="select-option" id="{{ $i++ }}">
					<div>Delivery</div>
					<div>
						<input type="radio" value="delivery" name="radio-group-option">
    					<label></label>
					</div>
				</div>
				<div class="select-option" id="{{ $i++ }}">
					<div>Pickup</div>
					<div>
						<input type="radio" value="pickup" name="radio-group-option">
    					<label></label>
					</div>
				</div>
<!-- 				<div class="select-address" id="{{ $i++ }}">
					<div><span class="select-contact_name">Excel Jewellers Guildford</span>, <span class="select-phone_number">(604) 588-0085</span></div>
					<div><span class="select-addresses">upper level, 10355 152 St</span> <span class="select-unit">#2203</span></div>
					<div><span class="select-city">Surrey</span>, <span class="select-spr">British Columbia</span>, <span class="select-country">Canada</span>, <span class="select-zipcode">V3R 7C1</span></div>
					<div>
						<input type="radio" name="radio-group">
    					<label></label>
					</div>
				</div>
				<div class="select-address" id="{{ $i++ }}">
					<div><span class="select-contact_name">Excel Jewellers Langley</span>, <span class="select-phone_number">(604) 539-7720</span></div>
					<div><span class="select-addresses">20202 66 Ave</span> <span class="select-unit">#370</span></div>
					<div><span class="select-city">Langley City</span>, <span class="select-spr">British Columbia</span>, <span class="select-country">Canada</span>, <span class="select-zipcode">V2Y 1P3</span></div>
					<div>
						<input type="radio" name="radio-group">
    					<label></label>
					</div>
				</div> -->
			</div>

			<div class="select-pickup-ctn">
				<div class="deliver-name">Pickup Options</div>
				<form action="payment-type" method="POST">
					{{ csrf_field() }}
					<div class="select-address-ctn">
						<div class="select-address" id="{{ $i++ }}">
							<div><span class="select-contact_name">Excel Jewellers Guildford</span>, <span class="select-phone_number">(604) 588-0085</span></div>
							<div><span class="select-addresses">upper level, 10355 152 St</span> <span class="select-unit">#2203</span></div>
							<div><span class="select-city">Surrey</span>, <span class="select-spr">British Columbia</span>, <span class="select-country">Canada</span>, <span class="select-zipcode">V3R 7C1</span></div>
							<div>
								<input value="1" type="radio" required name="pickup_radio">
		    					<label></label>
							</div>
						</div>
						<div class="select-address" id="{{ $i++ }}">
							<div><span class="select-contact_name">Excel Jewellers Langley</span>, <span class="select-phone_number">(604) 539-7720</span></div>
							<div><span class="select-addresses">20202 66 Ave</span> <span class="select-unit">#370</span></div>
							<div><span class="select-city">Langley City</span>, <span class="select-spr">British Columbia</span>, <span class="select-country">Canada</span>, <span class="select-zipcode">V2Y 1P3</span></div>
							<div>
								<input type="radio" value="2" required name="pickup_radio">
		    					<label></label>
							</div>
						</div>
					</div>
					<div class="address-container">
					<div>
						<input type="text" name="contact_name" class="red-border" required placeholder="Full Name">
					</div>
					@guest
					<div>
						<input type="email" name="email_address" class="red-border" required placeholder="Email Address">
					</div>
					@else
					<input type="hidden" name="email_address" class="red-border" value="{{ Auth::user()->email }}">
					@endguest
					</div>
					<button type="submit" name="pickup" value="pickup" class="proceed_btn">Proceed To Payment</button>
				</form>
			</div>

			<div class="deliver-address-ctn">
				<div class="deliver-name">Deliver To:</div>
				<form action="payment-type" method="POST">
				{{ csrf_field() }}
					<div class="address-container">
						<div>
							<input type="text" name="contact_name" class="red-border" required placeholder="Full Name">
						</div>
						@guest
						<div>
							<input type="email" name="email_address" class="red-border" required placeholder="Email Address">
						</div>
						@else
						<input type="hidden" name="email_address" class="red-border" value="{{ Auth::user()->email }}">
						@endguest
						<div>
							<input type="text" required name="phone_number" class="red-border" placeholder="Phone Number">
						</div>
						<div>
							<input type="text" required name="address" class="red-border" placeholder="Street">
						</div>
						<div>
							<input type="text" name="unit" placeholder="Apartments, Units, Etc">
						</div>
						<div>
							<select required name="country">
								@foreach(array_column($json,'name') as $key => $value)
								<option id="{{ $key }}" value="{{ $json[$key]['name'] }}">{{ ($json[$key]['name']) }}</option>
								@endforeach
							</select>
						</div>
						<div>
							<span class="spr">
								<select name="spr" required class="spr-select">
	                            @foreach($json[0]['states'] as $key => $value)
	                                <option id="{{ $key }}" value="{{ $value }}">{{ $value }}</option>
	                            @endforeach
	                            </select>
							</span>
						</div>
						<div>
							<input type="text" class="red-border" required name="city" placeholder="City">
						</div>
						<div>
							<input type="text" class="red-border" required name="zipcode" placeholder="Zip code/Postal Code">
						</div>
					</div>

					<button type="submit" name="shipto" value="shipto" class="proceed_btn">Proceed To Payment</button>

				</form>
			</div>
		</div>
			@if (\Session::has('error'))
			<div class="alert alert-dismissible collapse" style="margin:0px 4px; display:none; background: rgba(200,35,51,.8); color:white;">
			    <div class="alert-message">Please Fill Out.</div>
			</div>
			@endif
	</div>
	
<script type="text/javascript" src="{{ URL::asset('js/checkout.js?'.time().'') }}"></script>
@endsection
