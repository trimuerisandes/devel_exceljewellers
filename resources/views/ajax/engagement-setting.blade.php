@if(count($engagement_rings) > 0)
<?php $i = 0; ?>
@foreach($engagement_rings as $eng)
<?php $i++ ?>
@if($i == 1)
<div class="engagement-ring-inner" data-count="{{$count}}">
@else
<div class="engagement-ring-inner">
@endif
<a href="{{url('/engagement-ring/'.$eng['product']->item_sku)}}">
<div class="ajax-ctn">
@if($eng['product']->brand == 'Verragio')
<img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
@elseif($eng['product']->brand == 'GabrielCo')
<img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
@elseif($eng['product']->brand == 'Valina')
<img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
@elseif($eng['product']->brand == 'Romance')
<img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
@elseif($eng['product']->brand == 'SimonG')
<img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
@endif
<div class="preloader-ctn">
<img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
</div>
<img class="ajax-img" alt='@if($eng["product"]->color == "Platinum")Platinum @else {{$eng["product"]->metal}} {{$eng["product"]->color}} Gold @endif {{$eng["product"]->style}} {{$eng["product"]->name}}  {{$eng["product"]->brand}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ asset('storage/image/engagement-ring-list/'.$eng['product']->image.'-1.jpg') }}">
</div>
<div class="colors">
<div class="{{$eng['product']->color}}-code alt-m" data-img="{{ asset('storage/image/engagement-ring-list/'.$eng['product']->image.'-1.jpg') }}" data-link="{{url('/engagement-ring/'.$eng['product']->item_sku)}}" data-name="{{$eng['product']->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($eng['product']->currency,$eng['product']->price,session('currency')),2) }}"></div>
@foreach($eng['other_color'] as $other => $o)
<div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/engagement-ring-list/'.$o->image.'-1.jpg') }}" data-link="{{url('/engagement-ring/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
@endforeach
</div>
@if($eng['product']->sale_price)
<div class="sale_label">LIMITED TIME OFFER</div>
@endif
<div class="engagement-ring-text">
<p class="engagement-ring-text-title">{{$eng['product']->name}}</p>
@if($eng['product']->sale_price)
<p><span class="text-sale-price">${{ number_format(\App\Helper\AppHelper::conversion($eng['product']->currency,$eng['product']->sale_price,session('currency')),2) }}</span> <span class="cross-text-price">${{ number_format(\App\Helper\AppHelper::conversion($eng['product']->currency,$eng['product']->price,session('currency')),2) }}</span></p>
@else
<p class="engagement-ring-text-price">${{ number_format(\App\Helper\AppHelper::conversion($eng['product']->currency,$eng['product']->price,session('currency')),2) }}</p>
@endif
</div>
</a>
</div>
</div>
@endforeach
@else
<div class="no-results">No Results Were Found</div>
@endif