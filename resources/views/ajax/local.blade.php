@if(count($local) > 0)
<?php
 $i = 0;
?>
	@foreach($local as $fj)
	<?php
	$i++
	?>

	@if($i == 1)
	<div class="fine-jewellery-inner" data-count="{{$count}}">
	@else
	<div class="fine-jewellery-inner">
	@endif
		<a href="{{url('/local/'.$fj->item_sku)}}">
			<div class="ajax-ctn">
				<div class="preloader-ctn">
					<img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
				</div>
				<img class="ajax-img" alt="{{$fj->metal}} {{$fj->color}} Gold {{$fj->style}} {{$fj->description}} {{$fj->itVendorId}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/fine-jewellery/'.$fj->image.'') }}">
			</div>
			<div class="colors">
                <div class="{{$fj->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$fj->image.'') }}" data-link="{{url('/fine-jewellery/'.$fj->item_sku)}}" data-name="{{$fj->description}}" data-price="{{$fj->price}}"></div>
              @foreach($other as $o)
                @if($o->item_code == $fj->item_code && $o->price == $fj->price)
                <div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$o->image.'') }}" data-link="{{url('/fine-jewellery/'.$o->item_sku)}}" data-name="{{$o->description}}" data-price="{{$o->price}}"></div>
                @endif
              @endforeach
            </div>
			<div class="fine-jewellery-text">
				<p class="fine-jewellery-text-title">{{$fj->description}}</p>
                  <p class="fine-jewellery-text-price">${{$fj->price}}</p>
			</div>
		</a>
	</div>
@endforeach
@else
	<div class="no-results">No Results Were Found</div>
@endif
