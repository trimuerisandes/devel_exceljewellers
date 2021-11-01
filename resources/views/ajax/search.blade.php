@foreach($search as $sh)
	<div class="wedding-band-inner">
		<a href="{{url('/'.$sh['file_type'].'/'.$sh['link_sku'])}}">
            <div class="ajax-ctn">
                @if($sh['brand'] == 'Verragio')
                <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                @elseif($sh['brand'] == 'GabrielCo')
                <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                @elseif($sh['brand'] == 'Valina')
                <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                @elseif($sh['brand'] == 'Romance')
                <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                @elseif($sh['brand'] == 'SimonG')
                <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                @elseif($sh['brand'] == 'Malo')
                <img class="logo-corner" src="{{ url('storage/image/logo/malo.png') }}">
                @endif
                <div class="preloader-ctn">
                    <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
                </div>
                
                <img class="ajax-img" alt='@if($sh["color"] == "Platinum")Platinum @else {{$sh["metal"]}} {{$sh["color"]}} Gold @endif {{$sh["style"]}} {{$sh["name"]}}  {{$sh["brand"]}} Surrey Vancouver Canada Langley Burnaby Richmond' src="{{ $sh['image'] }}">
            </div>


            <div class="colors">
                <div class="{{$sh['color']}}-code alt-m"></div>
            </div>


            @if($sh['sale_price'])
                <div class="sale_label">LIMITED TIME OFFER</div>
            @endif
            <div class="wedding-band-text">
                <p class="wedding-band-text-title">{{$sh['name']}}</p>
                @if($sh['sale_price'])
                <p><span class="text-sale-price">${{ number_format(\App\Helper\AppHelper::conversion($sh['currency'],$sh['sale_price'],session('currency')),2) }}</span> <span class="cross-text-price">${{ number_format(\App\Helper\AppHelper::conversion($sh['currency'],$sh['price'],session('currency')),2) }}</span></p>
                @else
                <p class="wedding-band-text-price">${{ number_format(\App\Helper\AppHelper::conversion($sh['currency'],$sh['price'],session('currency')),2) }}</p>
                @endif
            </div>
        </a>
	</div>
@endforeach

<style type="text/css">
	.no-results-search{
		text-align: center;
		color: #d60d8c;
		padding-top: 25px;
		font-size: 25px;
	}


  .cross-text-price{
    text-decoration: line-through !important;
    font-size: .8rem;
  }

  .text-sale-price{
    color: #d60d8c;
    font-weight: bold;
  }

  .sale_label{
    color:white;
    background:#d60d8c;
    text-align: center;
  }
</style>

