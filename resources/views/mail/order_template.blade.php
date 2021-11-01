<h1 style="color: #d60d8c !important;">Customer</h1>
<hr>
<p><span class="pink">Email Address:</span> {{ $data['customer']['email'] }}</p>
<p><span class="pink">Name:</span> {{ $data['customer']['contact_name'] }}</p>
<p><span class="pink">Phone:</span> {{ $data['customer']['phone_number'] }}</p>
<p><span class="pink">Address:</span> {{ $data['customer']['address'] }}</p>
<p><span class="pink">Country:</span> {{ $data['customer']['country'] }}</p>
<p><span class="pink">S/P/R:</span> {{ $data['customer']['spr'] }}</p>
<p><span class="pink">City:</span> {{ $data['customer']['city'] }}</p>
<p><span class="pink">Zipcode/Postal Code:</span> {{ $data['customer']['zipcode'] }}</p>
<h1 style="color: #d60d8c !important;">Order</h1>
<hr>
@foreach( $data['order'] as $orders => $order)

<p><span class="pink">Order Number:</span> {{ $order['order_num'] }}</p>
<p><span class="pink">Item SKU:</span> {{ $order['item_sku'] }}</p>
<p><span class="pink">Item Name:</span> {{ $order['item_name'] }}</p>
<p><span class="pink">Price:</span> {{ $order['price'] }}</p>
<p><span class="pink">Brand:</span> {{ $order['brand'] }}</p>
<p><span class="pink">Size:</span> {{ $order['size'] }}</p>
<p><span class="pink">Engraving:</span> {{ $order['engraving'] }}</p>
<p><a href="{{ $order['link'] }}">Product Link</a></p>
@if(isset($order['stone']))
<h3>Stone</h3>
<p><span class="pink">Stone Cert:</span> {{ $order['stone']['cert_num'] }}</p>
<p><span class="pink">Stone ID:</span> {{ $order['stone']['diamond_id'] }}</p>
<p><span class="pink">Stone SKU:</span> {{ $order['stone']['diamond_sku'] }}</p>
<p><span class="pink">Stone Image:</span><br><img src="{{ $order['stone']['default_img'] }}"></p>
<p><span class="pink">Stone Name:</span> {{ $order['stone']['name'] }}</p>
<p><span class="pink">Stone Price:</span> {{ $order['stone']['price'] }}</p>
<p><span class="pink">Stone Size:</span> {{ $order['stone']['size'] }}</p>
@endif

<hr>
<style type="text/css">
	
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');

*{
	font-family: 'Montserrat', sans-serif;
}

.pink{
	color: #d60d8c !important;
	font-weight: bold;
}

a{
	color: #d60d8c !important; 
	font-weight: bold;
}

hr{
	margin: 0px;
	padding: 0px;
}

</style>
@endforeach