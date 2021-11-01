	<div class="filter-case">
		<div class="filter-inner">
			<div class="filter-name first">Gemstone</div>
			<div class="filter-dropdown-outer">
				<div class="filter-dropdown">

					<a param-name="gem" param-value="diamond">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/diamond.png') }}">
							<div class="gem-name">Diamond</div>
						</div>

					</a>

					<a param-name="gem" param-value="garnet">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/garnet.png') }}">
							<div class="gem-name">Garnet</div>
						</div>

					</a>

					<a param-name="gem" param-value="pearl">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/pearl.png') }}">
							<div class="gem-name">Pearl</div>
						</div>

					</a>

					<a param-name="gem" param-value="sapphire">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/sapphire.png') }}">
							<div class="gem-name">Sapphire</div>
						</div>

					</a>

					<a param-name="gem" param-value="emerald">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/emerald.png') }}">
							<div class="gem-name">Emerald</div>
						</div>

					</a>

					<a param-name="gem" param-value="ruby">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/ruby.png') }}">
							<div class="gem-name">Ruby</div>
						</div>

					</a>

					<a param-name="gem" param-value="amethyst">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/amethyst.png') }}">
							<div class="gem-name">Amethyst</div>
						</div>

					</a>

					<a param-name="gem" param-value="aquamarine">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/aquamarine.png') }}">
							<div class="gem-name">Aquamarine</div>
						</div>

					</a>

					<a param-name="gem" param-value="citrine">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/citrine.png') }}">
							<div class="gem-name">Citrine</div>
						</div>

					</a>

					<a param-name="gem" param-value="peridot">

						<div class="filter-case-inner stone-case">
							<img src="{{ asset('storage/image/gemstone/peridot.png') }}">
							<div class="gem-name">Peridot</div>
						</div>

					</a>

				</div>	
			</div>
			
		</div>


		<div class="filter-inner">
			<div class="filter-name">Sort By</div>
			<div class="filter-dropdown-outer">
				<div class="filter-dropdown sort-by-dropdown">

					<a param-name="sort" param-value="">

						<div class="filter-case-inner sort-by-case">
							<div class="sort-by" id="best">Best Seller <span class="icon-star-empty"></span></div>
						</div>

					</a>

					<a param-name="sort" param-value="low">

						<div class="filter-case-inner sort-by-case">
							<div class="sort-by" id="low">Price: Low To High <span class="icon-keyboard_arrow_down"></span></div>
						</div>

					</a>

					<a param-name="sort" param-value="high">

						<div class="filter-case-inner sort-by-case">
							<div class="sort-by" id="high">Price: High To Low <span class="icon-keyboard_arrow_up"></span></div>
						</div>

					</a>

				</div>	
			</div>
			
		</div>

		<div class="filter-inner">
			<div class="filter-name second">Metal</div>
			<div class="filter-dropdown-outer">
				<div class="filter-dropdown">

					<a param-name="metal{}color" param-value="10k{}white">

						<div class="filter-case-inner metal-case">
							<span class="icon-ring white-gold"></span> <div><span class="metal-carat">10K</span> <span class="metal-color">White</span></div>
						</div>

					</a>

					<a param-name="metal{}color" param-value="14k{}white">
					<div class="filter-case-inner metal-case">
						<span class="icon-ring white-gold"></span> <div><span class="metal-carat">14K</span> <span class="metal-color">White</span></div>
					</div>
					</a>

					<a param-name="metal{}color" param-value="18k{}white">
					<div class="filter-case-inner metal-case">
						<span class="icon-ring white-gold"></span> <div><span class="metal-carat">18K</span> <span class="metal-color">White</span></div>
					</div>
					</a>

					<a param-name="metal{}color" param-value="10k{}yellow">
						<div class="filter-case-inner metal-case">
							<span class="icon-ring yellow-gold"></span> <div><span class="metal-carat">10K</span> <span class="metal-color">Yellow</span></div>
						</div>
					</a>

					<a param-name="metal{}color" param-value="14k{}yellow">
						<div class="filter-case-inner metal-case">
							<span class="icon-ring yellow-gold"></span> <div><span class="metal-carat">14K</span> <span class="metal-color">Yellow</span></div>
						</div>
					</a>

					<a param-name="metal{}color" param-value="18k{}yellow">
						<div class="filter-case-inner metal-case">
							<span class="icon-ring yellow-gold"></span> <div><span class="metal-carat">18K</span> <span class="metal-color">Yellow</span></div>
						</div>
					</a>


					<a param-name="metal{}color" param-value="14k{}rose">
						<div class="filter-case-inner metal-case">
							<span class="icon-ring rose-gold"></span> <div><span class="metal-carat">14K</span> <span class="metal-color">Rose</span></div>
						</div>
					</a>

					<a param-name="metal{}color" param-value="platinum{}platinum">
						<div class="filter-case-inner metal-case">
							<span class="icon-ring platinum"></span> <div><span class="metal-carat metal-color">Platinum</span></div>
						</div>
					</a>

				</div>
			</div>
		</div>

		<div class="filter-inner">
			<div class="filter-name">Category</div>
			<div class="filter-dropdown-outer">
				<div class="filter-dropdown">
					<a href="{{ url('/fine-jewellery?category=bracelets')}}">
						<div class="filter-case-inner category-case">
							<span class="icon-Tennis-Bracelet-01 dd-ring-icon"></span><div class="category-text">Bracelets</div>
						</div>
					</a>
					<a href="{{ url('/fine-jewellery?category=earrings')}}">
						<div class="filter-case-inner category-case">
							<span class="icon-Drops-01 dd-ring-icon"></span><div class="category-text">Earrings</div>
						</div>
					</a>
					<a href="{{ url('/fine-jewellery?category=necklaces')}}">
						<div class="filter-case-inner category-case">
							<span class="icon-Bar-01 dd-ring-icon"></span><div class="category-text">Necklaces</div>
						</div>
					</a>
					<a href="{{ url('/fine-jewellery?category=rings')}}">
						<div class="filter-case-inner category-case">
							<span class="icon-Diamond-Ring-01 dd-ring-icon"></span><div class="category-text">Rings</div>
						</div>
					</a>
				</div>	
			</div>
			
		</div>


		<div class="filter-inner filter-inner-dropdown">
			<a param-name="video" param-value="image_360">
				<div id="image_360" class="filter-name">360° Video</div>
			</a>
		</div>


	</div>
