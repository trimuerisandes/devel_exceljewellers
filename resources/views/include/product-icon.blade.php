<li class="special-order"><span class="icon-truck"></span> Get In On 
@if(isset($setting))

    @if($setting->brand == "Verragio")
    {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(42)->format('D M d') }}
    @else
    {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }}
    @endif
    
@elseif(isset($band))

    @if($band->brand == "Verragio")
    {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(42)->format('D M d') }}
    @elseif($band->brand == "Malo")
    {{ Carbon\Carbon::now()->addDays(14)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }}
    @else
    {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }}
    @endif
@elseif(isset($jewellery))
    
    @if($jewellery->brand == "GabrielCo")
    {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(28)->format('D M d') }}
    @else
    {{ Carbon\Carbon::now()->addDays(14)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }}
    @endif

@else

{{ Carbon\Carbon::now()->addDays(14)->format('D M d') }} - {{ Carbon\Carbon::now()->addDays(21)->format('D M d') }}

@endif

</li>
<li><span class="icon-cart"></span> Free Shipping On Orders Over ${{env('FREE_SHIPPING_AMOUNT')}}</li>
<br>
<li><a href="{{ url('contact')}}"><span class="icon-mail-envelope-closed"></span> Email Us</a></li>
<br>
<li><a href="{{ url('contact')}}"><span class="icon-phone"></span> Call Us</a></li>