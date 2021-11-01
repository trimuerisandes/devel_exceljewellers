<div class="media-container">
	<div>
		<a><img src="{{ asset('image/icons/instagram.png') }}"></a>
	</div>
	<div>
		<a><img src="{{ asset('image/icons/facebook.png') }}"></a>
	</div>
</div>

<style type="text/css">

	.media-container{
		position: fixed;
    top: 50%;  /* position the top  edge of the element at the middle of the parent */
    left: 97.5%; /* position the left edge of the element at the middle of the parent */

    transform: translate(-50%, -50%); 
	}

	.media-container div{
		padding:5px;
	}
	
	.media-container img{
		width: 50px;
	}

</style>