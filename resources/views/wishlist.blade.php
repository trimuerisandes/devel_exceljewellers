@extends('layouts.web')

@section('include')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/wishlist.css?'.time().'') }}">

@endsection

@section('main')

<div class="home-container">

    <div class="wishlist-container">
        <div><b>My Wish List</b></div>
        <hr>
        @if(isset($item))
            @foreach($item as $details)
            <div class="item-container">
                <div class="item-img-container">
                    <img class="other-img" id="wedding-band" onerror="this.style.display='none'" src="{{ $details->img }}">
                </div>
                <div class="item-img-description">
                    <div class="img-sku">{{ $details->item_sku }}</div>
                    @if(isset($details->name))
                    <div class="img-title">{{ $details->name }}</div>
                    @else
                    @if(isset($details->type))
                    <div class="img-title">{{ $details->type }}</div>
                    @else
                    <div class="img-title">{{ $details->clarity }} {{ $details->color }} {{ $details->shape }} Diamond</div>
                    @endif
                    @endif
                    <div class="img-price">${{ $details->price }}</div>
                </div>
                <div class="item-option">
                    <div>
                        <a href="{{ $details->link }}"><button class="add-to-cart" id="{{ $details->id }}">View</button></a>
                        <button class="remove-btn" id="{{ $details->item_sku }}">Remove</button>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach
        @else
            <div>Empty</div>
        @endif

    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/wishlist.js?'.time().'') }}"></script>
<script type="text/javascript">
    $('.other-img').on("error",function(){
            $(this).remove();
        });
</script>
@endsection
