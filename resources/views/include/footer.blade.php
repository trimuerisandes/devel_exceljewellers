<hr>

<div class="footer-container">
	<div class="footer-inner">
        <div class="footer-title"><b>SHOPPING OUR SITE</b><span class="foot-icon icon-chevron-down"></span></div>
        <div class="footer-open">
            <div><a href="{{url('/contact')}}">Contact Us</a></div>
            <div><a href="{{url('/warranty')}}">Warranty</a></div>
            <div><a href="{{url('/shipping-returns')}}">Shipping & Returns</a></div>
            <div><a href="{{url('/insurrance')}}">Insurrance</a></div>
            <div><a href="{{url('/location')}}">Location</a></div>
            <div><a href="{{url('/about')}}">Company Info</a></div>
        </div>
    </div>
    <hr class="phone-hr">
	<div class="footer-inner">
        <div class="footer-title"><b>SAFE & SECURE SHOPPING</b><span class="foot-icon icon-chevron-down"></span></div>
        <div class="footer-open">
            <div><a href="{{url('/terms-condition')}}">Terms & Condition</a></div>
            <div><a href="{{url('/privacy-policy')}}">Privacy Policy</a></div>
        </div>
    </div>
    <hr class="phone-hr">
	<div class="footer-inner">
        <div class="footer-title"><b>GET OUR NEWSLETTER</b><span class="foot-icon icon-chevron-down"></span></div>
        <div class="footer-open">
            <form id="newsletter-form" action="https://www.snapretail.com/retailer/ConsumerSignupForm.aspx/Save?DataCollectionType=EmbeddedWebForm" method="post" target="_blank"><input id="Token" name="Token" type="hidden" value="iOPgyySGcFGjb4nqD0MKeg" />

                <input id="RedirectUrl" name="RedirectUrl" type="hidden" value="" />                

                <div class="collectEmailFormGroup">
                    <div class="label-error-group">
                        <span class="field-validation-valid validation-message" data-valmsg-for="EmailAddress" data-valmsg-replace="true"></span>
                    </div>
                    <input data-val="true" data-val-required="Required" id="EmailAddress" maxlength="255" name="EmailAddress" placeholder="Your Email" type="email" value="" />
                </div>

                
                    <div class="collectEmailFormGroup">
                        <div class="label-error-group">
                             <span class="field-validation-valid validation-message" data-valmsg-for="FirstName" data-valmsg-replace="true"></span>
                        </div>
                        <input id="FirstName" maxlength="255" name="FirstName" placeholder="Your Full Name" type="text" value="" />
                    </div>

                <div class="collectEmailFormGroup collectEmailFormActions">
                    <button type="submit" class="newsletter-btn">Submit</button>
                </div>

            </form>
        </div>
        <hr class="phone-hr">
        <b>FOLLOW US</b>
        <div class="social-media-container">
            <a href="https://www.facebook.com/ExcelJewellersCanada"><div class="icon-facebook"></div></a>
            <a href="https://www.instagram.com/excel_jewellers/"><div class="icon-instagram"></div></a>
<!--             <a href=""><div class="icon-twitter"></div></a>
            <a href=""><div class="icon-youtube"></div></a> -->
     <!--        <a href=""><div class="icon-linkedin2"></div></a> -->
            <a href="https://www.pinterest.ca/exceljewellers/"><div class="icon-pinterest2"></div></a>
        </div>
    </div>
</div>
<hr>
<div class="footer-bottom">
        <div class="payment-container">
            <div class="payment-icon"><img alt="Visa Icon Card Excel Jewellers" src="{{ asset('storage/image/icons/visa.png') }}"></div>
            <div class="payment-icon"><img alt="Mastercard Icon Card Excel Jewellers" src="{{ asset('storage/image/icons/mastercard.png') }}"></div>
            <div class="payment-icon"><img alt="Paypal Icon Card Excel Jewellers" src="{{ asset('storage/image/icons/paypal.png') }}"></div>
            <div class="payment-icon"><img alt="American Eagle Icon Card Excel Jewellers" src="{{ asset('storage/image/icons/ae.png') }}"></div>
        </div>
</div>
<div class="trademark">
    <div>&copy <?php echo date("Y"); ?> Excel Jewellers</div>
</div>