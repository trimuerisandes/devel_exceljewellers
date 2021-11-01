@if(session('success'))
<div class="green">Product Added</div>
@elseif(session('fail'))
<div class="red">Product Exist Or Not Added</div>
@endif
@if (Auth::user()->hasRole('admin'))
<form action="/newexcel/wedding-post" method="POST">
	@csrf
	<div class="box">
		Metal
		<input type="text" placeholder="metal" name="metal[]">
		<input type="text" placeholder="color" name="color[]">
		<input type="text" name="item_link[]" placeholder="item_link">
	</div>

	<div class="box">
		Alternative Metal
		<input type="text" placeholder="metal" name="metal[]">
		<input type="text" placeholder="color" name="color[]">
		<input type="text" name="item_link[]" placeholder="item_link">
	</div>

	<div class="box">
		Alternative Metal
		<input type="text" placeholder="metal" name="metal[]">
		<input type="text" placeholder="color" name="color[]">
		<input type="text" name="item_link[]" placeholder="item_link">
	</div>

	<div class="box">
		Alternative Metal
		<input type="text" placeholder="metal" name="metal[]">
		<input type="text" placeholder="color" name="color[]">
		<input type="text" name="item_link[]" placeholder="item_link">
	</div>

	<button type="submit">Submit</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $('.mains').keyup(function(){
     $('.commons').val($(this).val());
    });
</script>
<style type="text/css">

	form{
		max-width: 700px;
		margin: auto;
	}
	
	form{
		display: grid;
		grid-template-columns: 1fr 1fr 1fr 1fr;
		grid-template-rows: 1fr 1fr;
	}

	div{
		padding: 20px;
	}

	form input{
		margin: 4px 0px;
	}

	input[type="checkbox"]{

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
@endif