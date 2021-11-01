@if(count($fine_jewellery) > 0)
<?php $i = 0; ?>
@foreach($fine_jewellery as $fj)
<?php $i++ ?>
@if($i == 1)
<div class="fine-jewellery-inner" data-count="{{$count}}">
@else
<div class="fine-jewellery-inner">
@endif
<a href="{{url('/fine-jewellery/'.$fj['product']->item_sku)}}">
<div class="ajax-ctn">
@if($fj['product']->brand == 'Verragio')
<img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
@elseif($fj['product']->brand == 'GabrielCo')
<img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
@elseif($fj['product']->brand == 'Valina')
<img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
@elseif($fj['product']->brand == 'Romance')
<img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
@elseif($fj['product']->brand == 'SimonG')
<img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
@elseif($fj['product']->brand == 'charles&colvard')
<img class="logo-corner" src="{{ url('storage/image/logo/charlescolvard.svg') }}">
@endif
<div class="preloader-ctn">
<img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
</div>
<img class="ajax-img" alt="{{$fj['product']->metal}} {{$fj['product']->color}} Gold {{$fj['product']->style}} {{$fj['product']->name}} {{$fj['product']->brand}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/fine-jewellery-list/'.$fj['product']->image.'-1.jpg') }}">
</div>
<div class="colors">
<div class="{{$fj['product']->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery-list/'.$fj['product']->image.'-1.jpg') }}" data-link="{{url('/fine-jewellery/'.$fj['product']->item_sku)}}" data-name="{{$fj['product']->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($fj['product']->currency,$fj['product']->price,session('currency')),2) }}"></div>
@foreach($fj['other_color'] as $other => $o)
<div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery-list/'.$o->image.'-1.jpg') }}" data-link="{{url('/fine-jewellery/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
@endforeach
</div>
@if($fj['product']->sale_price)
<div class="sale_label">LIMITED TIME OFFER</div>
@endif
<div class="fine-jewellery-text">
<p class="fine-jewellery-text-title">{{$fj['product']->name}}</p>
@if($fj['product']->sale_price)
<p><span class="text-sale-price">${{ number_format(\App\Helper\AppHelper::conversion($fj['product']->currency,$fj['product']->sale_price,session('currency')),2) }}</span> <span class="cross-text-price">${{ number_format(\App\Helper\AppHelper::conversion($fj['product']->currency,$fj['product']->price,session('currency')),2) }}</span></p>
@else
<p class="fine-jewellery-text-price">${{ number_format(\App\Helper\AppHelper::conversion($fj['product']->currency,$fj['product']->price,session('currency')),2) }}</p>
@endif
</div>
</a>
</div>
@endforeach
@else
<div class="no-results">No Results Were Found</div>
@endif