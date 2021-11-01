$('select[name=choice_select]').change(function(){

	if ($(this).val() == "store_pickup") {
		$('.pickup-main-container').slideDown();
		$('.customer_address_container').slideUp();

		$('.customer_address_container > input').removeAttr('required');

		$('input[type=radio]').attr('required','required');



	}else{
		$('.pickup-main-container').slideUp();
		$('.customer_address_container').slideDown();

		$('.customer_address_container > input').not('input[name=shipping_address_line_2]').attr('required','required');

		$('input[type=radio]').prop('checked',false);

		$('input[type=radio]').removeAttr('required');


	}

});



		$(window).load(function () {
            $('input[type=radio]').prop('checked',false);
            $("select[name=choice_select] option:first").prop('selected',true);
        });

        $('.pickup-container').click(function(){
        	$(this).find("input").prop("checked", !0);
        })



    $('.shopping-cart-container').delay(150).slideDown();

	$('main h2').delay(150).fadeIn();

	
$('.summary-tab').click(function(){
	$('.cart-product-container').slideToggle();
});