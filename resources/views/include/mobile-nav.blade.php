<div class="shadow"></div>

<ul id="side-menu">
  <div id="showLeft" class="icon-menu"></div>
</ul>

<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<div id="outer-nav">
		<div class="outer-arrow">
			<div class="icon-close" id="goback"></div>
		</div>
			<div class="mobile-nav-search">
				<form method="GET" action="search">
					<input placeholder="Search Excel Jewellers" required type="text" name="search"><button><span class="icon-search"></span></button>
				</form>
			</div>
		@guest
			<div>
				<a class="login-nav-mobile" href="{{ route('login') }}"><h3><span class="icon-key"></span> {{ __('Login') }}</h3></a>
			</div>
        @else
        	<div>
        		<a href="{{url('/home')}}"><h3><span class="icon-user"></span> Profile</h3></a>
        	</div>
        	<div>
        		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><h3><span class="icon-logout"></span> {{ __('Logout') }}</h3>
            	</a>
        	</div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
		<div>
			<h3 class="side-nav-h3">ENGAGEMENT RINGS<span class="icon-chevron-down"></span></h3>
			<div class="dropdown-outer">
				<div class="dropdown-inner">
	              <div class="dropdown-column">
		              <h4>DESIGN YOUR OWN ENGAGEMENT RING</h4>
	                  <a href="{{url('/engagement-ring')}}"><div><span class="icon-Ring-Setting-01"></span> Start With A Setting</div></a>
	                  <a href="{{url('/diamonds')}}"><div><span class="icon-diamond diamond"></span> Start With A Diamond</div></a>
	                  <a href="{{url('/lab-grown-diamond')}}"><div><span class="icon-diamond l-diamond"></span> Start With A Lab Grown Diamond</div></a>
	                  <a href="{{url('/moissanite')}}"><div><span class="icon-diamond moissanite"></span> Start With A Moissanite</div></a>
	              </div>
	              <div class="dropdown-column">
	                  <h4>SHOP BY COLOR</h4>
	                  <div class="dropdown-case">
		                  <a href="{{url('/engagement-ring?color=rose')}}"><div><span class="icon-ring rose-gold"></span> Rose Gold</div></a>
	                    <a href="{{url('/engagement-ring?color=yellow')}}"><diV><span class="icon-ring yellow-gold"></span> Yellow Gold</diV></a>
	                    <a href="{{url('/engagement-ring?color=white')}}"><diV><span class="icon-ring white-gold"></span> White Gold</diV></a>
	                    <a href="{{url('/engagement-ring?color=platinum')}}"><diV><span class="icon-ring platinum"></span> Platinum</diV></a>
	              	  </div>
	                  <h4>DESIGNER BRANDS</h4>
	                  <div class="dropdown-case">
	                    <a href="{{url('/engagement-ring?brand=verragio')}}"><div><img alt="Verragio Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/verragio.png')}}"></div></a>
	                    <a href="{{url('/engagement-ring?brand=gabrielco')}}"><div><img alt="Gabriel&Co Diamond Classic Engagement Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/gabriel.svg')}}"></div></a>
	                    <a href="{{url('/engagement-ring?brand=valina')}}"><div><img alt="Valina Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/valina.png')}}"></div></a>
	                    <a href="{{url('/engagement-ring?brand=romance')}}"><div><img alt="Romance Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/romance.png')}}"></div></a>
	                    <a href="{{url('/engagement-ring?brand=simong')}}"><div><img alt="Simon G. Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/simong.png')}}"></div></a>
	                  </div>
	              </div>
	              <div class="dropdown-column">
	                  <h4>ENGAGEMENT STYLE</h4>
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
	            </div>
			</div>
				
		</div>
		<div>
			<h3 class="side-nav-h3">WEDDING BANDS<span class="icon-chevron-down"></span></h3>
			<div class="dropdown-outer">
				<div class="dropdown-inner">
	              <div class="dropdown-column">
	                  <h4>SHOP BY COLOR</h4>
	                  <div class="dropdown-case">
		                  <a href="{{url('/wedding-band?color=rose')}}"><div><span class="icon-ring rose-gold"></span> Rose Gold</div></a>
		                  <a href="{{url('/wedding-band?color=yellow')}}"><diV><span class="icon-ring yellow-gold"></span> Yellow Gold</diV></a>
		                  <a href="{{url('/wedding-band?color=white')}}"><diV><span class="icon-ring white-gold"></span> White Gold</diV></a>
		                  <a href="{{url('/wedding-band?color=platinum')}}"><diV><span class="icon-ring platinum"></span> Platinum</diV></a>
	              	  </div>
	              </div>
	              <div class="dropdown-column">
	                  <h4>WOMEN STYLE</h4>
	                  <div class="dropdown-case">
	                    <a href="{{url('/wedding-band?category=curved')}}"><div><span class="icon-Curved-01 jewelry-nav-icon"></span> Curved</div></a>
	                    <a href="{{url('/wedding-band?category=eternity')}}"><div><span class="icon-Eternity-01 jewelry-nav-icon"></span> Eternity</div></a>
	                    <a href="{{url('/wedding-band?category=stackable')}}"><div><span class="icon-Stackable-01 jewelry-nav-icon"></span> Stackable</div></a>
	                    <a href="{{url('/wedding-band?category=jacket')}}"><div><span class="icon-Jacket-01 jewelry-nav-icon"></span> Jacket</div></a>
	                    <a href="{{url('/wedding-band?category=anniversary')}}"><div><span class="icon-Anniversary-01 jewelry-nav-icon"></span> Anniversary</div></a>
	                  </div>
		              <div class="dropdown-column">
		                  <h4>MEN STYLE</h4>
		                  <div class="dropdown-case">
		                    <a href="{{url('/wedding-band?category=men classic')}}"><div><span class="icon-Classic-01 jewelry-nav-icon"></span> Classic</div></a>
		                    <a href="{{url('/wedding-band?category=alternative')}}"><div><span class="icon-Alternative-01 jewelry-nav-icon"></span> Alternative</div></a>
		                    <a href="{{url('/wedding-band?category=lux')}}"><div><span class="icon-Lux-01 jewelry-nav-icon"></span> Lux</div></a>
		                    <a href="{{url('/wedding-band?category=men diamond')}}"><div><span class="icon-Diamond-01 jewelry-nav-icon"></span> Diamond</div></a>
		                  </div>
		              </div>
	                  <h4>DESIGNER BRANDS</h4>
	                  <div class="dropdown-case">
	                    <a href="{{url('/wedding-band?brand=verragio')}}"><div><img alt="Verragio Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/verragio.png')}}"></div></a>
	                    <a href="{{url('/wedding-band?brand=gabrielco')}}"><div><img alt="Gabriel&Co Diamond Classic Engagement Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/gabriel.svg')}}"></div></a>
	                    <a href="{{url('/wedding-band?brand=valina')}}"><div><img alt="Valina Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/valina.png')}}"></div></a>
	                    <a href="{{url('/wedding-band?brand=romance')}}"><div><img alt="Romance Diamond Classic Engagement Gold Ring Wedding Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/romance.png')}}"></div></a>
	                    <a href="{{url('/wedding-band?brand=malo')}}"><div><img alt="Malo Diamond Wedding Satin Gold Yellow White Rose Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/malo.png')}}"></div></a>
	                    <a href="{{url('/wedding-band?brand=simong')}}"><div><img alt="Simon G. Diamond Wedding Satin Gold Yellow White Rose Band Jewellery Surrey Langley Vancouver Canada" src="{{asset('storage/image/logo/simong.png')}}"></div></a>
	                  </div>
	              </div>
	            </div>
			</div>
		</div>
		<div>
			<h3 class="side-nav-h3">FINE JEWELRY<span class="icon-chevron-down"></span></h3>
			<div class="dropdown-outer">
				<div class="dropdown-inner">
	              <div class="dropdown-column">
	                  <h4><a href="{{url('/fine-jewellery?category=bracelets')}}">BRACELETS/CHAINS</a></h4>
	                  <div class="dropdown-case">
	                    <a href="{{url('/fine-jewellery?style=tennis&category=bracelets')}}"><div><span class="icon-Tennis-Bracelet-01 jewelry-nav-icon"></span> Tennis</div></a>
	                    <a href="{{url('/fine-jewellery?style=bangle&category=bracelets')}}"><div><span class="icon-Bangle-Bracelet-01 jewelry-nav-icon"></span> Bangle</div></a>
	                    <a href="{{url('/fine-jewellery?style=chain&category=bracelets')}}"><div><span class="icon-Chain-bracelet-01 jewelry-nav-icon"></span> Chain</div></a>
	                    <a href="{{url('/fine-jewellery?style=charm&category=bracelets')}}"><div><span class="icon-Charm-Bracelet-01 jewelry-nav-icon"></span> Charm</div></a>
	                    <a href="{{url('/fine-jewellery?style=cuff&category=bracelets')}}"><div><span class="icon-Cuff-Bracelet-01 jewelry-nav-icon"></span> Cuff</div></a>
	                    <a href="{{url('/fine-jewellery?style=heart&category=bracelets')}}"><div><span class="icon-Heart-01 jewelry-nav-icon"></span> Heart</div></a>
	                  </div>
	                  <h4><a href="{{url('/fine-jewellery?category=rings')}}">RINGS</a></h4>
	                  <a href="{{url('/fine-jewellery?category=rings&gem=diamond')}}"><div><span class="icon-Diamond-Ring-01 jewelry-nav-icon"></span> Diamond Ring</div></a>
	                  <a href="{{url('/fine-jewellery?category=rings&gem=gemstone')}}"><div><span class="icon-Gem-Stone-Ring-01 jewelry-nav-icon"></span> Gemstone Ring</div></a>
	                  <a href="{{url('/fine-jewellery?category=rings&gem=Pearl')}}"><div><span class="icon-Pearl-Ring-01 jewelry-nav-icon"></span> Pearl Ring</div></a>
	              </div>
	              <div class="dropdown-column">
	                  <h4><a href="{{url('/fine-jewellery?category=necklaces')}}">NECKLACES</a></h4>
	                  <div class="dropdown-case">
	                    <a href="{{url('/fine-jewellery?style=y knots&category=necklaces')}}"><div><span class="icon-Y-Knots-01 jewelry-nav-icon"></span> Y Knots</div></a>
	                    <a href="{{url('/fine-jewellery?style=bar&category=necklaces')}}"><div><span class="icon-Bar-01 jewelry-nav-icon"></span> Bar</div></a>
	                    <a href="{{url('/fine-jewellery?style=Choker&category=necklaces')}}"><div><span class="icon-Choker-01 jewelry-nav-icon"></span> Choker</div></a>
	                    <a href="{{url('/fine-jewellery?style=fashion&category=necklaces')}}"><div><span class="icon-Fashion-01 jewelry-nav-icon"></span> Fashion</div></a>
	                    <a href="{{url('/fine-jewellery?style=heart&category=necklaces')}}"><div><span class="icon-Heart-01 jewelry-nav-icon"></span> Heart</div></a>
	                    <a href="{{url('/fine-jewellery?style=locket&category=necklaces')}}"><div><span class="icon-Locket-01 jewelry-nav-icon"></span> Locket</div></a>
	                  </div>
	                  <h4><a href="{{url('/fine-jewellery?category=earrings')}}">EARRINGS</a></h4>
	                  <div class="dropdown-case">
	                    <a href="{{url('/fine-jewellery?style=drop&category=earrings')}}"><div><span class="icon-Drops-01 jewelry-nav-icon"></span> Drop</div></a>
	                    <a href="{{url('/fine-jewellery?style=hoops&category=earrings')}}"><div><span class="icon-Hoops-01 jewelry-nav-icon"></span> Hoops</div></a>
	                    <a href="{{url('/fine-jewellery?style=huggies&category=earrings')}}"><div><span class="icon-Huggies-01 jewelry-nav-icon"></span> Huggies</div></a>
	                    <a href="{{url('/fine-jewellery?style=stud&category=earrings')}}"><div><span class="icon-Studs-01 jewelry-nav-icon"></span> Studs</div></a>
	                  </div>
	              </div>
	            </div>
			</div>
		</div>
		<div>
			<h3 class="side-nav-h3">DIAMONDS<span class="icon-chevron-down"></span></h3>
			<div class="dropdown-outer">
				<div class="dropdown-container">
	            <div class="dropdown-inner">
	              <div class="dropdown-column">
	                  <h4>DESIGN YOUR OWN ENGAGEMENT RING</h4>
	                  <a href="{{url('/engagement-ring')}}"><div><span class="icon-Ring-Setting-01"></span> Start With A Setting</div></a>
	                  <a href="{{url('/diamonds')}}"><div><span class="icon-diamond diamond"></span> Start With A Diamond</div></a>
	                  <a href="{{url('/lab-grown-diamond')}}"><div><span class="icon-diamond l-diamond"></span> Start With A Lab Grown Diamond</div></a>
	                  <a href="{{url('/moissanite')}}"><div><span class="icon-diamond moissanite"></span> Start With A Moissanite</div></a>
	              </div>
	              <div class="dropdown-column">
	              	  <h4>Jewellery</h4>
	              	  	<a href="{{url('/fine-jewellery?page=1&category=rings&gem=diamond')}}"><div><span class="icon-Diamond-Ring-01 jewelry-nav-icon"></span> Diamond Rings</div></a>
	                    <a href="{{url('fine-jewellery?page=1&category=necklaces&gem=diamond')}}"><div><span class="icon-Choker-01 jewelry-nav-icon"></span> Diamond Necklaces</div></a>
	                    <a href="{{url('fine-jewellery?page=1&category=bracelets&gem=diamond')}}"><div><span class="icon-Tennis-Bracelet-01 jewelry-nav-icon"></span> Diamond Bracelet</div></a>
	                    <a href="{{url('fine-jewellery?page=1&category=earrings&gem=diamond')}}"><div><span class="icon-Drops-01 jewelry-nav-icon"></span> Diamond Earrings</div></a>
	                    <a href="{{url('fine-jewellery?page=1&category=earrings&style=Stud&gem=diamond')}}"><div><span class="icon-Studs-01 jewelry-nav-icon"></span> Diamond Studs</div></a>
	              </div>


	              <div class="dropdown-column">
	              	<h4><a href="{{url('/diamonds')}}">LOOSE MINED DIAMOND SHAPES</a></h4>
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
	              </div>


	              <div class="dropdown-column">
	              	<h4><a href="{{url('/lab-grown-diamond')}}">LOOSE LAB GROWN DIAMOND SHAPES</a></h4>
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
	              	<h4><a href="{{url('/moissanite?shape=round')}}">LOOSE MOISSANITE SHAPES</a></h4>
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
			</div>
		</div>
		<div>
			<h3 class="side-nav-h3">EDUCATION<span class="icon-chevron-down"></span></h3>
			<div class="dropdown-outer">
				<div class="dropdown-container">
	            <div class="dropdown-inner">
	              <div class="dropdown-column">
	                  <a href="{{url('/education-diamond')}}"><h4>ABOUT DIAMONDS</h4></a>
	                  <div class="dropdown-case">
	                    <a href="{{url('/education-diamond-carat')}}"><div>Diamond Carat</div></a>
	                    <a href="{{url('/education-diamond-clarity')}}"><div>Diamond Clarity</div></a>
	                    <a href="{{url('/education-diamond-color')}}"><div>Diamond Color</div></a>
	                    <a href="{{url('/education-diamond-cut')}}"><div>Diamond Cut</div></a>
	                    <a href="{{url('/education-diamond-shape')}}"><div>Diamond Shape</div></a>
	                  </div>
	              </div>
	              <div class="dropdown-column">
	                  <a href="{{url('/education-engagement')}}"><h4>ABOUT ENGAGEMENT RINGS</h4></a>
	                    <a href="{{url('/education-eng-style')}}"><div>Style</div></a>
	                    <a href="{{url('/education-eng-setting')}}"><div>Setting</div></a>
	              </div>
	              <div class="dropdown-column">
	                  <a href="{{url('/education-weddingband')}}"><h4>ABOUT WEDDING BANDS</h4></a>
	                    <a href="{{url('/education-weddingband-style')}}"><div>Style</div></a>
	                    <a href="{{url('/education-weddingband-metal')}}"><div>Alternative Metals</div></a>
	              </div>
	            </div>
	          </div>
			</div>
		</div>
		<div>
			<h3 class="side-nav-h3">JEWELRY SERVICE<span class="icon-chevron-down"></span></h3>
			<div class="dropdown-outer">
				<div class="dropdown-container">
	            <div class="dropdown-inner">
	              <div class="dropdown-column">
	              	<h4>Services</h4>
	              	  <a href="{{url('/appraisal')}}"><div>Appraisals</div></a>
	                  <a href="{{url('/warranty')}}"><div>Warranty</div></a>
	                  <a href="{{url('/repair')}}"><div>Jewellery Repair</div></a>
	                  <a href="{{url('/consignment')}}"><div>Consignment</div></a>
	                  <a href="{{url('/trade-sell')}}"><div>Trade/Sell</div></a>
	                  <a href="{{url('/insurrance')}}"><div>Insurrance Replacement</div></a>
	                  <a href="{{url('/layaway-and-financing')}}"><div>Financing & Layaway</div></a>
	              </div>
	            </div>
	          </div>
			</div>
		</div>
		<div>
			<a href="{{ url('contact') }}"><h3><span class="icon-mail-envelope-closed"></span> Contact Us</h3></a>
		</div>
		<div>
			<a href="{{ url('wishlist') }}"><h3><span class="icon-heart-o"></span> Wish List</h3></a>
		</div>
	</div>
</div>
