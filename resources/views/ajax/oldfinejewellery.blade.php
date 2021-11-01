          @foreach($fine_jewellery as $fj)
          <?php
          $i++
          ?>
          @if($i == 1)
          <div class="fine-jewellery-inner" data-count="{{$count}}">
          @else
          <div class="fine-jewellery-inner">
          @endif
              <a href="{{url('/fine-jewellery/'.$fj->item_sku)}}">
                <div class="ajax-ctn">
                  @if($fj->brand == 'Verragio')
                  <img class="logo-corner" src="{{ url('storage/image/logo/verragio.png') }}">
                  @elseif($fj->brand == 'GabrielCo')
                  <img class="logo-corner" src="{{ url('storage/image/logo/gabriel.svg') }}">
                  @elseif($fj->brand == 'Valina')
                  <img class="logo-corner" src="{{ url('storage/image/logo/valina.png') }}">
                  @elseif($fj->brand == 'Romance')
                  <img class="logo-corner" src="{{ url('storage/image/logo/romance.png') }}">
                  @elseif($fj->brand == 'SimonG')
                  <img class="logo-corner" src="{{ url('storage/image/logo/simong.png') }}">
                  @endif
                  <div class="preloader-ctn">
                    <img class="preloader-img" src="{{asset('storage/image/page_img/loader.svg')}}">
                  </div>
                  <img class="ajax-img" alt="{{$fj->metal}} {{$fj->color}} Gold {{$fj->style}} {{$fj->name}} {{$fj->brand}} Surrey Vancouver Canada Langley Burnaby Richmond" src="{{ asset('storage/image/fine-jewellery/'.$fj->image.'-1.jpg') }}">
                </div>
                <div class="colors">
                  @foreach($other as $o)
                  @if($fj->color != "Platinum" && $o->price == $fj->price)
                  <div class="{{$fj->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$fj->image.'-1.jpg') }}" data-link="{{url('/fine-jewellery/'.$fj->item_sku)}}" data-name="{{$fj->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($fj->currency,$fj->price,session('currency')),2) }}"></div>
                  @break
                  @endif  
                  @endforeach                
                  @foreach($other as $o)
                    @if($o->item_code == $fj->item_code && $o->color == "Yellow")
                    <div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$o->image.'-1.jpg') }}" data-link="{{url('/fine-jewellery/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
                    @break
                    @endif
                  @endforeach

                  @foreach($other as $o)
                    @if($o->item_code == $fj->item_code && $o->color == "White")
                    <div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$o->image.'-1.jpg') }}" data-link="{{url('/fine-jewellery/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
                    @break
                    @endif
                  @endforeach

                  @foreach($other as $o)
                    @if($o->item_code == $fj->item_code && $o->color == "Rose")
                    <div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$o->image.'-1.jpg') }}" data-link="{{url('/fine-jewellery/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
                    @break
                    @endif
                  @endforeach

                  @foreach($other as $o)
                    @if($o->item_code == $fj->item_code && $o->color == "Platinum")
                    <div class="{{$o->color}}-code alt-m" data-img="{{ asset('storage/image/fine-jewellery/'.$o->image.'-1.jpg') }}" data-link="{{url('/fine-jewellery/'.$o->item_sku)}}" data-name="{{$o->name}}" data-price="{{ number_format(\App\Helper\AppHelper::conversion($o->currency,$o->price,session('currency')),2) }}"></div>
                    @break
                    @endif
                  @endforeach
                </div>
                @if($fj->sale_price)
                <div class="sale_label">LIMITED TIME OFFER</div>
                @endif
                <div class="fine-jewellery-text">
                  <p class="fine-jewellery-text-title">{{$fj->name}}</p>
                  @if($fj->sale_price)
                  <p><span class="text-sale-price">${{ number_format(\App\Helper\AppHelper::conversion($fj->currency,$fj->sale_price,session('currency')),2) }}</span> <span class="cross-text-price">${{ number_format(\App\Helper\AppHelper::conversion($fj->currency,$fj->price,session('currency')),2) }}</span></p>
                  @else
                  <p class="fine-jewellery-text-price">${{ number_format(\App\Helper\AppHelper::conversion($fj->currency,$fj->price,session('currency')),2) }}</p>
                  @endif
                </div>
              </a>
            </div>
          @endforeach