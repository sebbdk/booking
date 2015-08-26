<center style="padding: 40px;">
	
	<?php echo $this->Html->image("logo.png", ["url" => "/", "class" => "logo-image"]); ?>

	<h1>Tak for din reservation!</h1>

	<p>For at betale skal du sende <?php echo $booking["BookingType"]["price"]; ?> til via mobile pay til telefon nummer: <?php echo $booking["BookingType"]["mobile_pay_number"]; ?></p>

	<p>Hvis vi ikke modtager din betaling inden booking-tidspunktet, vil din resevertaion blive slettet.</p>

</center>