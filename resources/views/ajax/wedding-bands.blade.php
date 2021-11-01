@if(count($wedding_bands) > 0)
<?php $i = 0; ?>
@foreach($wedding_bands as $wb)
<?php $i++ ?>
@if($i == 1)
<div class="wedding-band-inner" data-count="{{$count}}">
@else
<div class="wedding-band-inner">
@endif
<a href="{{url('/wedding-band/'.$wb['product']->item_sku)}}">
<div class="ajax-ctn">
@if($wb['product']->brand == 'Verragio')
<img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
@elseif($wb['product']->brand == 'GabrielCo')
<img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
@elseif($wb['product']->brand == 'Valina')
<img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
@elseif($wb['product']->brand == 'Romance')
<img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
@elseif($wb['product']->brand == 'SimonG')
<img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
@elseif($wb['product']->brand == 'Malo')
<img class="logo-corner" src="{{ url('storage/image/logo/malo.png') }}">
@endif
<div class="preloader-ctn">
<img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
</div>
<img class="ajax-img" alt='@if($wb["product"]->color == "Platinum")Platinum @else {{$wb["product"]->metal}} {{$wb["product"]->color}} @if($wb["product"]->metal == "Cobalt") @else Gold @endif @endif{{$wb["product"]->style}} {{$wb["product"]->name}} {{$wb["product"]->brand}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ asset('storage/image/wedding-band-list/'.$wb['product']->image.'-1.jpg') }}">
</div>
<div class="colors">
<div class="{{$wb['product']->color}}-code alt-m" data-img="{{ asset('storage/image/wedding-band-list/'.$wb['product']->image.'-1.jpg') }}" data-link="{{url('/wedding-band/'.$wb['product']->item_sku)}}" data-name="{{$wb['product']->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($wb['product']->currency,$wb['product']->price,session('currency')),2) }}"></div>
@foreach($wb['other_color'] as $other => $o)
<div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/wedding-band-list/'.$o->image.'-1.jpg') }}" data-link="{{url('/wedding-band/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
@endforeach
</div>
@if($wb['product']->sale_price)
<div class="sale_label">LIMITED TIME OFFER</div>
@endif
<div class="wedding-band-text">
<p class="wedding-band-text-title">{{$wb['product']->name}}</p>
@if($wb['product']->sale_price)
<p><span class="text-sale-price">${{ number_format(\App\Helper\AppHelper::conversion($wb['product']->currency,$wb['product']->sale_price,session('currency')),2) }}</span> <span class="cross-text-price">${{ number_format(\App\Helper\AppHelper::conversion($wb['product']->currency,$wb['product']->price,session('currency')),2) }}</span></p>
@else
<p class="wedding-band-text-price">${{ number_format(\App\Helper\AppHelper::conversion($wb['product']->currency,$wb['product']->price,session('currency')),2) }}</p>
@endif
</div>
</a>
</div>
@endforeach
@else
<div class="no-results">No Results Were Found</div>
@endif