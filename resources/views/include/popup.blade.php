	@if($message = Session::get('success'))

	@else
	<div class="popup-shadow"></div>
	<div class="popup-container">
		<div class="icon-close exit"></div>
		<!-- <div>
			<img src="{{ asset('storage/image/page_img/banner.jpg?2') }}" alt="Gabriel&Co Verragio Diamond Engagement Gold Ring Earring Bracelet Necklaces Jewellery Surrey Canada">
		</div>
		<div class="popup-ctn-inner">
			<div><b>SATURDAY, APRIL 18TH</b></div>
			<div><b>10:00 am - 7:00 pm</b></div>
			<div><b class="pink">BOOK YOUR APPOINTMENT TODAY</b></div>
			<form action="verragio_show" method="POST">
				@csrf
				<div><input placeholder="Name" required type="text" name="name"></div>
				<div><input placeholder="Your Email" required type="email" name="email"></div>
				<div><input placeholder="Phone Number" required type="cell-phone" name="phone"></div>
				<div>
					<select name="time" required>
						<option value="10:00 AM">10:00 AM</option>
						<option value="10:30 AM">10:30 AM</option>
						<option value="11:00 AM">11:00 AM</option>
						<option value="11:30 AM">11:30 AM</option>
						<option value="12:00 PM">12:00 PM</option>
						<option value="12:30 PM">12:30 PM</option>
						<option value="1:00 PM">1:00 PM</option>
						<option value="1:30 PM">1:30 PM</option>
						<option value="2:00 PM">2:00 PM</option>
						<option value="2:30 PM">2:30 PM</option>
						<option value="3:00 PM">3:00 PM</option>
						<option value="3:30 PM">3:30 PM</option>
						<option value="4:00 PM">4:00 PM</option>
						<option value="4:30 PM">4:30 PM</option>
						<option value="5:00 PM">5:00 PM</option>
						<option value="5:30 PM">5:30 PM</option>
						<option value="6:00 PM">6:00 PM</option>
						<option value="6:30 PM">6:30 PM</option>
						<option value="7:00 PM">7:00 PM</option>
					</select>
				</div>
				<div><button type="submit">Book My Appointment</button></div>
			</form>
		</div> -->

	<div class="message">
		<div class="pink big">NEW HOURS</div>
		<!--<div>Dear our clients, our team and our community due to the outbreak all of our retail stores have temporarily been closed. Stay Safe!<div class="pink">For inquiry please email <a href="mailto:sales@exceljewellers.com">sales@exceljewellers.com</a> or text <a href="callto:7788786575">778-878-6575</a></div></div>-->
		<!--</div>-->
		<div class="pink">LANGLEY</div>
		<div>Monday-Friday 10:00AM - 5:30PM<br>Saturday 10:00AM - 5:00PM<br>Closed Sunday & Holidays</div>
		<div class="pink">GUILDFORD</div>
		<div>Monday-Saturday 10:00AM - 7:00PM<br>Sunday 11:00AM - 7:00PM</div>
		<div class="pink">For inquiry please email <a href="mailto:sales@exceljewellers.com">sales@exceljewellers.com</a></div>
	</div>
	
	@endif

<script type="text/javascript">
	
// $(document).ready(function(){$(".popup-container").delay(2e3).fadeIn(),$(".popup-shadow").delay(2e3).fadeIn(),$(".exit").click(function(p){$(".popup-shadow").fadeOut(),$(".popup-container").fadeOut()}),$(".popup-shadow").click(function(p){$(this).fadeOut(),$(".popup-container").fadeOut()})});

</script>

<style type="text/css">

@media only screen and (min-width:0px){.popup-container{width:90%}}@media only screen and (min-width:768px){.popup-container{width:550px}}.exit{position:fixed;top:6%;left:97%;transform:translate(-50%,-50%);font-size:15px;color:#d60d8c;display:inline-block;cursor:pointer}.popup-shadow{position:fixed;z-index:1001;top:50%;left:50%;transform:translate(-50%,-50%);width:100%;height:100%;background:rgba(0,0,0,.5);display:none}.popup-container{position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);color:#fff;color:#000;background:#fff;text-align:center;z-index:1002;display:none}.popup-ctn-inner{padding:5px}.popup-ctn-inner div{padding:2px 0}.popup-ctn-inner input{width:250px;padding:2px}.popup-ctn-inner select{width:250px;padding:2px}.popup-container img{width:100%}.popup-container button{border:none;background:#d60d8c;color:#fff;border-radius:3px;padding:5px 15px}b.pink{color:#d60d8c}.big{font-weight: bold;font-size: 26px}.pink{color:#d60d8c}.message{padding: 50px;}
/*.message{*/
/*	background:white;*/
/*	color: white;*/
/*	padding: 145px;*/
/*}*/
</style>