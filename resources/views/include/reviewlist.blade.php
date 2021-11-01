<!-- <div class="review-container">

		@foreach($reviews as $reviews)
		<div class="review-inner">
			<div class="review-img">
				<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png">
			</div>
			<div class="review-comment">
					@for($i = 0; $i < $reviews->ratings; $i++)
					<span class="yellow">★</span>
					@endfor
					@php
					$missing = 5 - $i 
					@endphp

					@for($i = 0; $i < $missing; $i++)
					<span class="grey">★</span>
					@endfor
					<div>{{ $reviews->comment }}</div>
			</div>
		</div>
		@endforeach

</div>
<style type="text/css">
	
.yellow{
	color: #ff4747;
}

.grey{
	color:#cccccc;
}

.review-container{
	display:inline-block;
}

.review-inner{
	display: flex;
	padding: 2.5px;
	margin: 2.5px 0px;
	border: solid 1px #f2f2f2;
}

.review-img{
	width: 150px;
}

img{
	width: 100%;
}

.review-comment{
	width: 100%;
	padding: 0px 5px;
}

</style>
 -->