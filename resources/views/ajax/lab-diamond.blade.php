@if(count($db) > 0)
<?php $i = 0; ?>
@foreach($db as $gem)
<?php $i++ ?>
@if($i == 1)
<div class="gemstone-inner" data-count="{{ $count }}">
@else
<div class="gemstone-inner">
@endif
<a href="{{url('/lab-grown-diamond/'.$gem->id)}}">
<div class="ajax-ctn">
<div class="preloader-ctn">
<img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
</div>
<img class="ajax-img @if($gem->company == 'Stuller') ajax-dia @endif" alt='{{$gem->width}} {{$gem->shape}} {{$gem->carat}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{$gem->img_link}}">
</div>
<div class="gemstone-text">
<p class="gemstone-text-title">{{$gem->carat}} CT {{ $gem->shape }} Lab Diamond</p>
<div class="gemstone-text-block">
<div><b>Color:</b> {{$gem->color}}</div>
<div><b>Clarity:</b> {{ $gem->clarity }}</div>
@if($gem->cut)
<div><b>Cut:</b> {{ $gem->cut }}</div>
@endif
</div>
<p class="gemstone-text-price">${{ number_format(\App\Helper\AppHelper::conversion($gem->currency,$gem->price,session('currency')),2) }}</p>
</div>
</a>
</div>
@endforeach
@else
<div class="no-results">No Results Were Found</div>
@endif