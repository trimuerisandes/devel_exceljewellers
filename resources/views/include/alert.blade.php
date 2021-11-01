<div class="alert popup_status">
	<button type="button" id="close_alert" class="close">&times;</button>
</div>
<style type="text/css">
	
	.popup_status{
		position:fixed;top: 80%;left: 50%;transform: translate(-50%, -50%);
    	z-index: 10;
    	display:none;
    	color: white;
	}

</style>
<script type="text/javascript">

	
	function popup(result, post) {
        if (result === "green") {
            $('.popup_status').text(post).css({
                background:"#d60d8c"
            })
        }else if (result === "red") {
        	$('.popup_status').text(post).css({
                background:"#ff4747"
            })
        }else{
        	$('.popup_status').text('Error Try Again').css({
                background:"#ff4747"
            })
        }
        $('.popup_status').stop(!0).fadeIn('fast').delay(1000).fadeOut('fast')
    }

</script>
