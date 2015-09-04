<center style="padding: 40px;">
	
	<?php echo $this->Html->image("logo.png", ["url" => "http://fitnessconsulting.dk", "class" => "logo-image"]); ?>

	<h1>Tak for din reservation!</h1>

	<p>For at konfirmere din booking bedes du betale <?php echo $booking["BookingType"]["price"]; ?> i booking-gebyr via mobile pay til telefon nummer: <?php echo $booking["BookingType"]["mobile_pay_number"]; ?></p>
	<p>Booking-gebyret vil blive fratrukket den endelig pris.</p>

	<p>Hvis vi ikke modtager din betaling, vil din reservation blive slettet.</p>

</center>