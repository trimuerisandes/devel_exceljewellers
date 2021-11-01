@if(session('success'))
<div class="green">Product Added</div>
@elseif(session('fail'))
<div class="red">Product Exist Or Not Added</div>
@endif
@if (Auth::user()->hasRole('admin'))

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<div class="admin-container">
<form action="/newexcel/eng-post1" method="POST" enctype="multipart/form-data" >
	@csrf
	
	<div class="group">

		<label>Group Info</label>
		<input type="" name="item_code" placeholder="Item Code">

		<select name="style">
		    <option value="Double Halo">Double Halo</option>
		    <option value="Halo">Halo</option>
		    <option value="Free Form">Free Form</option>
		    <option value="Solitaire">Solitaire</option>
		    <option value="Split Shank">Split Shank</option>
		    <option value="Straight">Straight</option>
		    <option value="Pave">Pave</option>
		    <option value="Three-Stone">Three-Stone</option>
		</select>

		<select name="currency">
			<option value="CAD">CAD</option>
			<option value="USD">USD</option>
		</select>

		<input type="" name="brand" placeholder="Brand">

		<!-- <input type="" name="width" placeholder="Width"> -->

		<input type="" name="collection" placeholder="Collection">

		<input type="" name="setting_type" placeholder="Setting Type">

	</div>

	<hr>

	<div>
		
		@for($i=0; $i < 40; $i++)

		<div class="individual">
			<label>Individual Label</label>

			<input type="" name="item_sku[]" placeholder="Item SKU">

			<input type="" name="name[]" placeholder="Name">

			<input type="number" name="price[]" placeholder="Price">

			<input type="number" name="sale_price[]" placeholder="Sale Price">

			<input type="" name="image_360[]" placeholder="Image 360 Folder Name">

			<input type="" name="width[]" placeholder="Width">

			<textarea name="description[]" placeholder="Product Description"></textarea>

			<select name="stoneshape[]">
				<option value="Round">Round</option>
				<option value="Pear">Pear</option>
				<option value="Oval">Oval</option>
				<option value="Marquise">Marquise</option>
				<option value="Cushion">Cushion</option>
				<option value="Princess">Princess</option>
				<option value="Emerald">Emerald</option>
				<option value="Asscher">Asscher</option>
			</select>

			<input type="" name="stone_carat[]" placeholder="Stone Carat">

			<label style="margin: 5px 0px 0px 5px;">Metal Type</label>

			<select name="metal[]">
				<option value="10K">10k</option>
				<option value="12K">12k</option>
				<option value="14K">14k</option>
				<option value="16K">16k</option>
				<option value="18K">18k</option>
				<option value="20K">20k</option>
				<option value="22K">22k</option>
				<option value="24K">24k</option>
                <option value="Platinum">Platinum</option>
                <option value="Silver">Silver</option>
			</select>

			<input type="text" placeholder="color" name="color[]">

			<input type="" name="item_link[]" placeholder="Item Link">

			<input type="" name="image_name[]" placeholder="Main Name For Image(s)">

			<input type="file" name="img1[]" accept="image/*">

			<input type="file" name="img2[]" accept="image/*">

			<input type="file" name="img3[]" accept="image/*">

			<input type="file" name="img4[]" accept="image/*">

			<input type="file" name="img5[]" accept="image/*">

			<input type="file" name="img6[]" accept="image/*">

			<input type="file" name="img7[]" accept="image/*">

			<input type="file" name="img8[]" accept="image/*">

			<input type="file" name="img9[]" accept="image/*">

  <!--           <video style="border:solid 1px black;" id="video-{{ $i }}" width="300" height="300" controls>
              <source id="source-{{ $i }}" src="" type="">
            </video>

            <input type="file" name="file[]" class="video_360_file" id="file-{{ $i }}" accept="video/*" onchange="video_view(<?php echo($i) ?>)">


                        <div class="form-group range-slider">

                            <span class="badge bg-dark">Contrast</span>

                            <div class="d-inline-block">
                                <input data-id="{{$i}}" type="range"
                                name="contrast[]"
                                class="form-control-range range-slider__range"
                                value="1" min="0" max="10" step ="0.0001"
                                id="contrast-{{$i}}">
                                <span class="range-slider__value">0</span>
                            </div>

                          </div>

                       
                          <div class="form-group range-slider">

                            <span class="badge bg-dark">Brightness</span>

                            <div class="d-inline-block">
                                <input data-id="{{$i}}" type="range" 
                                  name="brightness[]"
                                  class="form-control-range range-slider__range" 
                                  value="1" min="0" max="10" step ="0.0001"
                                  id="brightness-{{$i}}">
                                <span class="range-slider__value">0</span>
                            </div>
                            
                          </div>

                     
                          <div class="form-group range-slider">

                            <span class="badge bg-dark">Saturation</span>

                            <div class="d-inline-block">
                                <input data-id="{{$i}}" type="range" 
                                name="saturation[]"
                                class="form-control-range range-slider__range"
                                value="1" min="0" max="10" step ="0.0001"
                                id="saturation-{{$i}}">
                                <span class="range-slider__value">0</span>
                            </div>
                
                          </div>

                        
                          <div class="form-group range-slider">

                            <span class="badge bg-dark">Vibrance</span>

                            <div class="d-inline-block">
                                <input data-id="{{$i}}" type="range" 
                                name="vibrance[]"
                                class="form-control-range range-slider__range"
                                value="0" min="-2" max="2" step ="0.0001"
                                id="vibrance-{{$i}}">
                                <span class="range-slider__value">0</span>
                            </div>
                
                          </div>

                          <input type="text" name="folder_name[]" placeholder="360 Name" id="folder_name"> -->

		</div>

		@endfor

	</div>


	<button style="cursor: pointer;" class="submit-btn" type="submit">Submit</button>
</form>


	

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

        function video_view($id){

            const video = document.getElementById('video-'+$id+'');
            const input = document.getElementById('file-'+$id+'').files[0];
            const source = document.getElementById('source-'+$id+'');
            source.setAttribute("src", URL.createObjectURL(input));
            video.load();
        }


    $('.mains').keyup(function(){
     $('.commons').val($(this).val());
    });

    $(document).click(function(){
     $('.commons').val($('.mains').val());
    });
</script>

<style type="text/css">
	@import url("https://fonts.googleapis.com/css?family=Open + Sans&display=swap");
	* {
	    font-family: "Open Sans", sans-serif;
	    -ms-box-sizing:content-box;
	-moz-box-sizing:content-box;
	-webkit-box-sizing:content-box; 
	box-sizing:content-box;
	}

	*{
		font-size: 10px;
	}

	.admin-container{
		display: flex;
	}

	label{
		background: #d60d8c;
    border: none;
    border-radius: 3px;
    color: #fff;
    padding: 5px 5px;
	}

	.individual{
		display: inline-grid;
	}

	.individual input,.individual select,.individual textarea{
		margin: 5px;
		padding: 3px;
	}

	.group{
		display: inline-grid;
	}

	.group input,.group select{
		margin: 5px;
		padding: 3px;
	}

	.submit-btn{
		background: #d60d8c;
	    border: none;
	    border-radius: 3px;
	    color: #fff;
	    padding: 9px 30px;
	    font-size: 15px;
	}

	.green{
		padding: 20px;
		background: #45f542;
	}

	.red{
		padding: 20px;
		background: #f74f60;
	}

</style>
 <script>

        $("input[type=range]").on("input change", function() {

            id = $(this).attr('data-id');

            var c_value = $('#contrast-'+id+'').val();
            var s_value = $('#saturation-'+id+'').val();
            var b_value = $('#brightness-'+id+'').val();
            console.log(id);
console.log(c_value);
            $('#video-'+id+'').css({"filter":"contrast("+c_value+")" + " " +
                             "saturate("+s_value+")" + " " +
                             "brightness("+b_value+")"});

        });



      var rangeSlider = function(){
      var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    
      slider.each(function(){

        value.each(function(){
          var value = $(this).prev().attr('value');
          $(this).html(value);
        });

        range.on('input', function(){
          $(this).next(value).html(this.value);
          });
        });
       };
      rangeSlider();
    </script>
@endif