@foreach($jewelry as $j)
	<div class="list-case">
		@if($j->file_type == "fine-jewellery")
		<a href="{{ url('/fine-jewellery/'.$j->item_sku.'') }}">
			<img alt="{{$j->metal}} {{$j->color}} Gold {{$j->style}} {{ $j->name }} Surrey Vancouver Canada Langley Burnaby Richmond"  class="other-img" src="{{ asset('storage/image/fine-jewellery/'.$j->image.'') }}">
		</a>
		@endif
		<h4>{{$j->name}}</h4>
	</div>
@endforeach

@foreach($jewelry as $j)
	<div class="list-case">
		@if($j->file_type == "fine-jewellery")
		<a href="{{ url('/fine-jewellery/'.$j->item_sku.'') }}">
			<img alt="{{$j->metal}} {{$j->color}} Gold {{$j->style}} {{ $j->name }} Surrey Vancouver Canada Langley Burnaby Richmond"  class="other-img" src="{{ asset('storage/image/fine-jewellery/'.$j->image.'') }}">
		</a>
		@endif
		<h4>{{$j->name}}</h4>
	</div>
@endforeach

@foreach($jewelry as $j)
	<div class="list-case">
		@if($j->file_type == "fine-jewellery")
		<a href="{{ url('/fine-jewellery/'.$j->item_sku.'') }}">
			<img alt="{{$j->metal}} {{$j->color}} Gold {{$j->style}} {{ $j->name }} Surrey Vancouver Canada Langley Burnaby Richmond"  class="other-img" src="{{ asset('storage/image/fine-jewellery/'.$j->image.'') }}">
		</a>
		@endif
		<h4>{{$j->name}}</h4>
	</div>
@endforeach

@foreach($jewelry as $j)
	<div class="list-case">
		@if($j->file_type == "fine-jewellery")
		<a href="{{ url('/fine-jewellery/'.$j->item_sku.'') }}">
			<img alt="{{$j->metal}} {{$j->color}} Gold {{$j->style}} {{ $j->name }} Surrey Vancouver Canada Langley Burnaby Richmond"  class="other-img" src="{{ asset('storage/image/fine-jewellery/'.$j->image.'') }}">
		</a>
		@endif
		<h4>{{$j->name}}</h4>
	</div>
@endforeach

<style type="text/css">
	.list-case{
		width: 100%;
		background: white;
		margin: 5px;
		display: grid;
		grid-template-columns: 40% 60%;
		border-radius: 5px;
		overflow: hidden;
		transition: .3s;
	}

	.list-case:hover{
		transform: scale(1.1);
	}

	.list-case img{
		width: 60%;
		margin: auto;
	}

	.list-case h4{
		font-size: 10px;
		margin: auto;
		padding: 0px 3px 0px 0px;
	}

	.view-container-ctn a{
		color: inherit;
		text-decoration: none;
	}
</style>