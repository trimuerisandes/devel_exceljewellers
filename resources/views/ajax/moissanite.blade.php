@if(count($db) > 0)
<?php $i = 0; ?>
@foreach($db as $gem)
<?php $i++ ?>
@if($i == 1)
<div class="moissanite-inner" data-count="{{ $count }}">
@else
<div class="moissanite-inner">
@endif
<a href="{{url('/moissanite/'.$gem->id)}}">
<div class="ajax-ctn">
<img class="logo-corner" src="{{ url('storage/image/logo/charlescolvard.svg') }}">
<div class="preloader-ctn">
<img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
</div>
<img class="ajax-img" alt='{{$gem->MM}} {{$gem->shape}} {{$gem->weight}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ asset('storage/image/moissanite/'.$gem->img_link.'.jpg') }}">
@if($gem->video_link)
<video width="100%" autostart="false" loop muted playsinline>
<source src="{{ asset('storage/image/moissanite/'.$gem->video_link.'.mp4') }}" type="video/mp4">
</video>
@endif
</div>
<div class="moissanite-text">
<p class="moissanite-text-title">{{$gem->MM}}mm {{ $gem->shape }} Moissanite</p>
<p class="moissanite-text-price">${{ number_format(\App\Helper\AppHelper::conversion($gem->currency,$gem->price,session('currency')),2) }}</p>
</div>
</a>
</div>
@endforeach
@else
<div class="no-results">No Results Were Found</div>
@endif