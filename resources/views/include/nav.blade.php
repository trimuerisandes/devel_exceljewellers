<?php
  if (session('cart.shopping_cart')) {
    $count = count(session('cart.shopping_cart'));
  }else{
    $count = 0;
  }
?>

<nav>
    <div class="notification-info">FREE SHIPPING ON ORDERS OVER ${{env('FREE_SHIPPING_AMOUNT')}} CANADA/USA ONLY</div>

    <div class="top-bar">

    <div class="search-container">
      <div class="inner-search-container">
        <span class="icon-close search-exit"></span>
        <form method="GET" action="{{url('/search')}}">
        <input placeholder="Search Excel Jewellers" required type="text" name="search"><button><span class="icon-search"></span></button>
        </form>
      </div>
    </div>

      <div class="left-bar">
        <a href="{{url('/contact')}}"><span class="icon-phone"></span></a> 
        <a href="{{url('/contact')}}"><span class="icon-mail-envelope-closed"></span></a> 
        <span class="icon-search icon-search-desktop"></span>
      </div>
      
      <div class="right-bar">
                @guest
                      <a class="login-nav" href="{{ route('login') }}"><span class="icon-key"></span><span class="top-text">{{ __('LOGIN') }}</span></a>
                @else
                    <a class="login-nav" href="{{url('/home')}}"><span class="icon-user"></span><span class="top-text">PROFILE</span></a>
                    <a class="login-nav" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <span class="icon-logout"></span><span class="top-text">{{ __('LOGOUT') }}</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest

      <style type="text/css">.currency-ul{list-style:none;padding:0 5px;display:inline-block;margin:auto;position:relative;top:-4px}.currency-ul li img{width:25px}.currency-li{cursor:pointer;margin-right:12px}.currency-dropdown{list-style:none;padding:0;display:none;margin:auto;position:absolute;top:15px;left:50%;transform:translate(-50%,0)}.currency-ul:hover ul{display:inline-block}.currency-icon-arrow{position:relative;top:2px;left:3px}</style>

        <a href="{{url('/shopcart')}}"><span class="icon-cart" style="padding-left: 5px;"></span><span class="top-text cart-text">CART (<span class="cart-num">{{$count}}</span>)</span></a>

      <a>
        <ul class="currency-ul">
        @if(session('currency'))

          @if(session('currency') == "CAD")
            <li class="main-currency-li"><img class="currency" src="{{ asset('storage/image/page_img/'.session('currency').'.jpg') }}"><span class="currency-icon-arrow icon-keyboard_arrow_down"></span></li>
            <ul class="currency-dropdown">
              <li class="currency-li" id="USD"><img src="{{ asset('storage/image/page_img/USD.jpg') }}"></li>
            </ul>
          @elseif(session('currency') == "USD")
            <li><img class="currency" src="{{ asset('storage/image/page_img/'.session('currency').'.jpg') }}"><span class="currency-icon-arrow icon-keyboard_arrow_down"></span></li>
            <ul class="currency-dropdown">
              <li class="currency-li" id="CAD"><img src="{{ asset('storage/image/page_img/CAD.jpg') }}"></li>
            </ul>
          @endif

        @else
          <li><img class="currency" src="{{ asset('storage/image/page_img/CAD.jpg') }}"><span class="currency-icon-arrow icon-keyboard_arrow_down"></span></li>
          <ul class="currency-dropdown">
            <li class="currency-li" id="USD"><img src="{{ asset('storage/image/page_img/USD.jpg') }}"></li>
          </ul>
        @endif
        </ul>
      </a>
      <script type="text/javascript">$(".currency-li").click(function(){$.ajax({url:"/currency",headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},method:"POST",data:{currency:$(this).attr("id")},success:function(c){location.reload()},error:function(c,r,t){location.reload()}})});</script>

      </div>
    </div>

    <div class="middle-bar">
      <a href="{{ url('/') }}"><img alt="Excel Jewellers Diamond Engagement Ring Bracelet Earring Chain Surrey Langley Vancouver Canada Burnaby" src="{{asset('storage/image/page_img/excel_logo.png')}}"></a>
    </div>

    <ul id="main-menu">
        <li class="li"><a class="a" href="{{url('/engagement-ring')}}">ENGAGEMENT RING</a>
          <div class="dropdown-container">
            <div class="dropdown-inner">
              <div class="dropdown-column">
                  <h3>DESIGN YOUR OWN ENGAGEMENT RINGS</h3>
                  <a href="{{url('/engagement-ring')}}"><div><span class="icon-Ring-Setting-01"></span> Start With A Setting</div></a>
                  <a href="{{url('/diamonds')}}"><div><span class="icon-diamond diamond"></span> Start With A Diamond</div></a>
                  <a href="{{url('/lab-grown-diamond')}}"><div><span class="icon-diamond l-diamond"></span> Start With A Lab Grown Diamond</div></a>
                  <a href="{{url('/moissanite')}}"><div><span class="icon-diamond moissanite"></span> Start With A Moissanite</div></a>
              </div>
              <div class="dropdown-column">
                  <h3>SHOP BY COLOR</h3>
                  <div class="dropdown-case">
                    <a href="{{url('/engagement-ring?color=rose')}}"><div><span class="icon-ring rose-gold"></span> Rose Gold</div></a>
                    <a href="{{url('/engagement-ring?color=yellow')}}"><diV><span class="icon-ring yellow-gold"></span> Yellow Gold</diV></a>
                    <a href="{{url('/engagement-ring?color=white')}}"><diV><span class="icon-ring white-gold"></span> White Gold</diV></a>
                    <a href="{{url('/engagement-ring?color=platinum')}}"><diV><span class="icon-ring platinum"></span> Platinum</diV></a>
                  </div>
                  <h3>SHOP BY ENGAGEMENT RING STYLE</h3>
                  <div class="dropdown-case">
                      <a href="{{url('/engagement-ring?category=three-stone')}}"><div><span class="icon-Three-Stone-01 jewelry-nav-icon"></span> Three-Stone</div></a>
                      <a href="{{url('/engagement-ring?category=solitaire')}}"><div><span class="icon-Solitare-01 jewelry-nav-icon"></span> Solitaire</div></a>
                      <a href="{{url('/engagement-ring?category=straight')}}"><div><span class="icon-Straight-01 jewelry-nav-icon"></span> Straight</div></a>
                      <a href="{{url('/engagement-ring?category=split shank')}}"><div><span class="icon-Split-Shank-01 jewelry-nav-icon"></span> Split Shank</div></a>
                      <a href="{{url('/engagement-ring?category=free Form')}}"><div><span class="icon-Free-Form-01 jewelry-nav-icon"></span> Free Form</div></a>
                      <a href="{{url('/engagement-ring?category=pave')}}"><div><span class="icon-Pave-01 jewelry-nav-icon"></span> Pave</div></a>
                      <a href="{{url('/engagement-ring?category=halo')}}"><div><span class="icon-Halo-01 jewelry-nav-icon"></span> Halo</div></a>
                      <a href="{{url('/engagement-ring?category=double halo')}}"><div><span class="icon-Double-Halo-01 jewelry-nav-icon"></span> Double Halo</div></a>
                  </div>
              </div>
              <div class="dropdown-column"> 
                  <h3>DESIGNER BRANDS</h3>
                  <div class="dropdown-case">
                    <a href="{{url('/engagement-ring?brand=verragio')}}"><div><img alt="Verragio Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/verragio.png')}}"></div></a>
                    <a href="{{url('/engagement-ring?brand=gabrielco')}}"><div><img alt="Gabriel&Co Diamond Classic Engagement Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/gabriel.svg')}}"></div></a>
                    <a href="{{url('/engagement-ring?brand=valina')}}"><div><img alt="Valina Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/valina.png')}}"></div></a>
                    <a href="{{url('/engagement-ring?brand=romance')}}"><div><img alt="Romance Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/romance.png')}}"></div></a>
                    <a href="{{url('/engagement-ring?brand=simong')}}"><div><img alt="Simon G. Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/simong.png')}}"></div></a>
                  </div>
              </div>
            </div>
          </div>
        </li>
        <li class="li"><a class="a" href="{{url('/wedding-band')}}">WEDDING BAND</a>
          <div class="dropdown-container">
            <div class="dropdown-inner">
              <div class="dropdown-column">
                  <h3>SHOP BY COLOR</h3>
                  <a href="{{url('/wedding-band?color=rose')}}"><div><span class="icon-ring rose-gold"></span> Rose Gold</div></a>
                  <a href="{{url('/wedding-band?color=yellow')}}"><diV><span class="icon-ring yellow-gold"></span> Yellow Gold</diV></a>
                  <a href="{{url('/wedding-band?color=white')}}"><diV><span class="icon-ring white-gold"></span> White Gold</diV></a>
                  <a href="{{url('/wedding-band?color=platinum')}}"><diV><span class="icon-ring platinum"></span> Platinum</diV></a>
                  <h3>DESIGNER BRANDS</h3>
                  <div class="dropdown-case">
                    <a href="{{url('/wedding-band?brand=verragio')}}"><div><img alt="Verragio Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/verragio.png')}}"></div></a>
                    <a href="{{url('/wedding-band?brand=gabrielco')}}"><div><img alt="Gabriel&Co Diamond Classic Engagement Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/gabriel.svg')}}"></div></a>
                    <a href="{{url('/wedding-band?brand=valina')}}"><div><img alt="Valina Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/valina.png')}}"></div></a>
                    <a href="{{url('/wedding-band?brand=romance')}}"><div><img alt="Romance Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/romance.png')}}"></div></a>
                    <a href="{{url('/wedding-band?brand=malo')}}"><div><img alt="Malo Diamond Wedding Satin Gold Yellow White Rose Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/malo.png')}}"></div></a>
                    <a href="{{url('/wedding-band?brand=simong')}}"><div><img alt="Simon G. Diamond Wedding Satin Gold Yellow White Rose Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/simong.png')}}"></div></a>
                  </div>
              </div>
              <div class="dropdown-column">
                  <h3>WOMEN STYLE</h3>
                  <div class="dropdown-case">
                    <a href="{{url('/wedding-band?category=curved')}}"><div><span class="icon-Curved-01 jewelry-nav-icon"></span> Curved</div></a>
                    <a href="{{url('/wedding-band?category=eternity')}}"><div><span class="icon-Eternity-01 jewelry-nav-icon"></span> Eternity</div></a>
                    <a href="{{url('/wedding-band?category=stackable')}}"><div><span class="icon-Stackable-01 jewelry-nav-icon"></span> Stackable</div></a>
                    <a href="{{url('/wedding-band?category=jacket')}}"><div><span class="icon-Jacket-01 jewelry-nav-icon"></span> Jacket</div></a>
                    <a href="{{url('/wedding-band?category=anniversary')}}"><div><span class="icon-Anniversary-01 jewelry-nav-icon"></span> Anniversary</div></a>
                  </div>

                  
              </div>
              <div class="dropdown-column">
              
                  <h3>MEN STYLE</h3>
                  <div class="dropdown-case">
                    <a href="{{url('/wedding-band?category=men classic')}}"><div><span class="icon-Classic-01 jewelry-nav-icon"></span> Classic</div></a>
                    <a href="{{url('/wedding-band?category=alternative')}}"><div><span class="icon-Alternative-01 jewelry-nav-icon"></span> Alternative</div></a>
                    <a href="{{url('/wedding-band?category=lux')}}"><div><span class="icon-Lux-01 jewelry-nav-icon"></span> Lux</div></a>
                    <a href="{{url('/wedding-band?category=men diamond')}}"><div><span class="icon-Diamond-01 jewelry-nav-icon"></span> Diamond</div></a>
                  </div>
              </div>
            </div>
          </div>
        </li>
        <li class="li"><a class="a" href="{{url('/fine-jewellery')}}">FINE JEWELRY</a>
          <div class="dropdown-container">
            <div class="dropdown-inner">
              <div class="dropdown-column">
                  <a href="{{url('/fine-jewellery?category=bracelets')}}"><h3>BRACELETS/CHAINS</h3></a>
                  <div class="dropdown-case">
                    <a href="{{url('/fine-jewellery?style=tennis&category=bracelets')}}"><div><span class="icon-Tennis-Bracelet-01 jewelry-nav-icon"></span> Tennis</div></a>
                    <a href="{{url('/fine-jewellery?style=bangle&category=bracelets')}}"><div><span class="icon-Bangle-Bracelet-01 jewelry-nav-icon"></span> Bangle</div></a>
                    <a href="{{url('/fine-jewellery?style=chain&category=bracelets')}}"><div><span class="icon-Chain-bracelet-01 jewelry-nav-icon"></span> Chain</div></a>
                    <a href="{{url('/fine-jewellery?style=charm&category=bracelets')}}"><div><span class="icon-Charm-Bracelet-01 jewelry-nav-icon"></span> Charm</div></a>
                    <a href="{{url('/fine-jewellery?style=cuff&category=bracelets')}}"><div><span class="icon-Cuff-Bracelet-01 jewelry-nav-icon"></span> Cuff</div></a>
                    <a href="{{url('/fine-jewellery?style=heart&category=bracelets')}}"><div><span class="icon-Heart-01 jewelry-nav-icon"></span> Heart</div></a>
                  </div>
                  <a href="{{url('/fine-jewellery?category=necklaces')}}"><h3>NECKLACES</h3></a>
                  <div class="dropdown-case">
                    <a href="{{url('/fine-jewellery?style=y knots&category=necklaces')}}"><div><span class="icon-Y-Knots-01 jewelry-nav-icon"></span> Y Knots</div></a>
                    <a href="{{url('/fine-jewellery?style=bar&category=necklaces')}}"><div><span class="icon-Bar-01 jewelry-nav-icon"></span> Bar</div></a>
                    <a href="{{url('/fine-jewellery?style=Choker&category=necklaces')}}"><div><span class="icon-Choker-01 jewelry-nav-icon"></span> Choker</div></a>
                    <a href="{{url('/fine-jewellery?style=fashion&category=necklaces')}}"><div><span class="icon-Fashion-01 jewelry-nav-icon"></span> Fashion</div></a>
                    <a href="{{url('/fine-jewellery?style=heart&category=necklaces')}}"><div><span class="icon-Heart-01 jewelry-nav-icon"></span> Heart</div></a>
                    <a href="{{url('/fine-jewellery?style=locket&category=necklaces')}}"><div><span class="icon-Locket-01 jewelry-nav-icon"></span> Locket</div></a>
                  </div>
              </div>
              <div class="dropdown-column">
                  
                  <a href="{{url('/fine-jewellery?category=rings')}}"><h3>RINGS</h3></a>
                  <a href="{{url('/fine-jewellery?category=rings&gem=diamond')}}"><div><span class="icon-Diamond-Ring-01 jewelry-nav-icon"></span> Diamond Ring</div></a>
                  <a href="{{url('/fine-jewellery?category=rings&gem=gemstone')}}"><div><span class="icon-Gem-Stone-Ring-01 jewelry-nav-icon"></span> Gemstone Ring</div></a>
                  <a href="{{url('/fine-jewellery?category=rings&gem=Pearl')}}"><div><span class="icon-Pearl-Ring-01 jewelry-nav-icon"></span> Pearl Ring</div></a>
              </div>
              <div class="dropdown-column">
                  <a href="{{url('/fine-jewellery?category=earrings')}}"><h3>EARRINGS</h3></a>
                  <div class="dropdown-case">
                    <a href="{{url('/fine-jewellery?style=drop&category=earrings')}}"><div><span class="icon-Drops-01 jewelry-nav-icon"></span> Drop</div></a>
                    <a href="{{url('/fine-jewellery?style=hoops&category=earrings')}}"><div><span class="icon-Hoops-01 jewelry-nav-icon"></span> Hoops</div></a>
                    <a href="{{url('/fine-jewellery?style=huggies&category=earrings')}}"><div><span class="icon-Huggies-01 jewelry-nav-icon"></span> Huggies</div></a>
                    <a href="{{url('/fine-jewellery?style=stud&category=earrings')}}"><div><span class="icon-Studs-01 jewelry-nav-icon"></span> Studs</div></a>
                  </div>
              </div>
            </div>
          </div>
        </li>
        <li class="li"><a class="a" href="{{url('/diamonds')}}">DIAMONDS</a>
          <div class="dropdown-container">
            <div class="dropdown-inner">
              <div class="dropdown-column">
                  <h3>DESIGN YOUR OWN ENGAGEMENT RING</h3>
                  <a href="{{url('/engagement-ring')}}"><div><span class="icon-Ring-Setting-01"></span> Start With A Setting</div></a>
                  <a href="{{url('/diamonds')}}"><div><span class="icon-diamond diamond"></span> Start With A Diamond</div></a>
                  <a href="{{url('/lab-grown-diamond')}}"><div><span class="icon-diamond l-diamond"></span> Start With A Lab Grown Diamond</div></a>
                  <a href="{{url('/moissanite')}}"><div><span class="icon-diamond moissanite"></span> Start With A Moissanite</div></a>
                  <h3>JEWELRY</h3>
                  <div class="dropdown-case">
                    <a href="{{url('/fine-jewellery?page=1&category=rings&gem=diamond')}}"><div><span class="icon-Diamond-Ring-01 jewelry-nav-icon"></span> Diamond Rings</div></a>
                    <a href="{{url('fine-jewellery?page=1&category=necklaces&gem=diamond')}}"><div><span class="icon-Choker-01 jewelry-nav-icon"></span> Diamond Necklaces</div></a>
                    <a href="{{url('fine-jewellery?page=1&category=bracelets&gem=diamond')}}"><div><span class="icon-Tennis-Bracelet-01 jewelry-nav-icon"></span> Diamond Bracelet</div></a>
                    <a href="{{url('fine-jewellery?page=1&category=earrings&gem=diamond')}}"><div><span class="icon-Drops-01 jewelry-nav-icon"></span> Diamond Earrings</div></a>
                    <a href="{{url('fine-jewellery?page=1&category=earrings&style=Stud&gem=diamond')}}"><div><span class="icon-Studs-01 jewelry-nav-icon"></span> Diamond Studs</div></a>
                  </div>
              </div>
              <div class="dropdown-column">
                  <h3><a href="{{url('/diamonds')}}">LOOSE MINED DIAMOND SHAPES</a></h3>
                  <div class="dropdown-case">
                      <a href="{{url('/diamonds?shape=round')}}"><div><span class="icon-round dia-color"></span> Round</div></a>
                      <a href="{{url('/diamonds?shape=pear')}}"><div><span class="icon-pear dia-color"></span> Pear</div></a>
                      <a href="{{url('/diamonds?shape=oval')}}"><div><span class="icon-oval dia-color"></span> Oval</div></a>
                      <a href="{{url('/diamonds?shape=marquise')}}"><div><span class="icon-marquise dia-color"></span> Marquise</div></a>
                      <a href="{{url('/diamonds?shape=radiant')}}"><div><span class="icon-radiant dia-color"></span> Radiant</div></a>
                      <a href="{{url('/diamonds?shape=cushion')}}"><div><span class="icon-cushion dia-color"></span> Cushion</div></a>
                      <a href="{{url('/diamonds?shape=trillion')}}"><div><span class="icon-trillion-1 dia-color"></span> Trillion</div></a>
                      <a href="{{url('/diamonds?shape=square')}}"><div><span class="icon-square dia-color"></span> Square</div></a>
                      <a href="{{url('/diamonds?shape=emerald')}}"><div><span class="icon-emerald dia-color"></span> Emerald</div></a>
                      <a href="{{url('/diamonds?shape=asscher')}}"><div><span class="icon-asscher dia-color"></span> Asscher</div></a>
                      <a href="{{url('/diamonds?shape=heart')}}"><div><span class="icon-heart dia-color"></span> Heart</div></a>
                  </div>
                  <h3><a href="{{url('/lab-grown-diamond')}}">LOOSE LAB GROWN DIAMOND SHAPES</a></h3>
                  <div class="dropdown-case">
                      <a href="{{url('/lab-grown-diamond?shape=round')}}"><div><span class="icon-round lab-color"></span> Round</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=pear')}}"><div><span class="icon-pear lab-color"></span> Pear</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=oval')}}"><div><span class="icon-oval lab-color"></span> Oval</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=marquise')}}"><div><span class="icon-marquise lab-color"></span> Marquise</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=radiant')}}"><div><span class="icon-radiant lab-color"></span> Radiant</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=cushion')}}"><div><span class="icon-cushion lab-color"></span> Cushion</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=trillion')}}"><div><span class="icon-trillion-1 lab-color"></span> Trillion</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=princess')}}"><div><span class="icon-square lab-color"></span> Princess</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=emerald')}}"><div><span class="icon-emerald lab-color"></span> Emerald</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=asscher')}}"><div><span class="icon-asscher lab-color"></span> Asscher</div></a>
                      <a href="{{url('/lab-grown-diamond?shape=heart')}}"><div><span class="icon-heart lab-color"></span> Heart</div></a>
                  </div>
              </div>
              <div class="dropdown-column">
                  <h3><a href="{{url('/moissanite?shape=round')}}">LOOSE MOISSANITE SHAPES</a></h3>
                  <div class="dropdown-case">
                      <a href="{{url('/moissanite?shape=round')}}"><div><span class="icon-round moi-color"></span> Round</div></a>
                      <a href="{{url('/moissanite?shape=pear')}}"><div><span class="icon-pear moi-color"></span> Pear</div></a>
                      <a href="{{url('/moissanite?shape=oval')}}"><div><span class="icon-oval moi-color"></span> Oval</div></a>
                      <a href="{{url('/moissanite?shape=marquise')}}"><div><span class="icon-marquise moi-color"></span> Marquise</div></a>
                      <a href="{{url('/moissanite?shape=radiant')}}"><div><span class="icon-radiant moi-color"></span> Radiant</div></a>
                      <a href="{{url('/moissanite?shape=cushion')}}"><div><span class="icon-cushion moi-color"></span> Cushion</div></a>
                      <a href="{{url('/moissanite?shape=trillion')}}"><div><span class="icon-trillion-1 moi-color"></span> Trillion</div></a>
                      <a href="{{url('/moissanite?shape=square')}}"><div><span class="icon-square moi-color"></span> Square</div></a>
                      <a href="{{url('/moissanite?shape=emerald')}}"><div><span class="icon-emerald moi-color"></span> Emerald</div></a>
                      <a href="{{url('/moissanite?shape=asscher')}}"><div><span class="icon-asscher moi-color"></span> Asscher</div></a>
                      <a href="{{url('/moissanite?shape=heart')}}"><div><span class="icon-heart moi-color"></span> Heart</div></a>
                  </div>
              </div>
            </div>
          </div>
        </li>
        <li class="li"><a class="a">EDUCATION</a>
          <div class="dropdown-container">
            <div class="dropdown-inner">
              <div class="dropdown-column">
                  <a href="{{url('/education-diamond')}}"><h3>ABOUT DIAMONDS</h3></a>
                  <div class="dropdown-case">
                    <a href="{{url('/education-diamond-carat')}}"><div>Diamond Carat</div></a>
                    <a href="{{url('/education-diamond-clarity')}}"><div>Diamond Clarity</div></a>
                    <a href="{{url('/education-diamond-color')}}"><div>Diamond Color</div></a>
                    <a href="{{url('/education-diamond-cut')}}"><div>Diamond Cut</div></a>
                    <a href="{{url('/education-diamond-shape')}}"><div>Diamond Shape</div></a>
                  </div>
              </div>
              <div class="dropdown-column">
                  <a href="{{url('/education-engagement')}}"><h3>ABOUT ENGAGEMENT RINGS</h3></a>
                  <div class="dropdown-case">
                    <a href="{{url('/education-eng-style')}}"><div>Style</div></a>
                    <a href="{{url('/education-eng-setting')}}"><div>Setting</div></a>
                  </div>
              </div>
              <div class="dropdown-column">
                  <a href="{{url('/education-weddingband')}}"><h3>ABOUT WEDDING BANDS</h3></a>
                  <div class="dropdown-case">
                    <a href="{{url('/education-weddingband-style')}}"><div>Style</div></a>
                    <a href="{{url('/education-weddingband-metal')}}"><div>Alternative Metals</div></a>
                  </div>
              </div>
            </div>
          </div>
        </li>
        <li class="li"><a class="a">JEWELRY SERVICES</a>
          <div class="dropdown-container">
            <div class="dropdown-inner">
              <div class="dropdown-column">
                  <a href="{{url('/insurrance')}}"><h3>Insurrance Replacement</h3></a>
                  <a href="{{url('/layaway-and-financing')}}"><h3>Financing & Layaway</h3></a>
                  <a href="{{url('/repair')}}"><h3>Jewellery Repair</h3></a>
              </div>
              <div class="dropdown-column">
                  <a href="{{url('/appraisal')}}"><h3>Appraisals</h3></a>
                  <a href="{{url('/warranty')}}"><h3>Warranty</h3></a>
              </div>
              <div class="dropdown-column">
                  <a href="{{url('/consignment')}}"><h3>Consignment</h3></a>
                  <a href="{{url('/trade-sell')}}"><h3>Trade/Sell</h3></a>
              </div>
            </div>
          </div>
        </li>
    </ul>
    @include('include.mobile-nav')
</nav>

<!-- <div class="media-side">
  <div class="media-side-bar">
    <a href="https://www.instagram.com/excel_jewellers/"><div class="icon-instagram ms-instagram"></div></a>
    <a href="https://www.facebook.com/ExcelJewellersCanada"><div class="icon-facebook ms-facebook"></div></a>
    <a href="https://www.pinterest.ca/exceljewellers/"><div class="icon-pinterest2 ms-pinterest"></div></a>
    <a href="mailto:sales@exceljewellers.com"><div class="icon-mail-envelope-closed ms-mail"></div></a>
    <a href="tel:604-588-0085"><div class="icon-phone ms-phone"></div></a>
  </div>
  <div class="arrow-away">
    <svg class="flickity-button-icon" viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" class="arrow"></path></svg>
  </div>
</div> -->