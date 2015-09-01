<?php echo $this->Html->image("logo.png", ["url" => "http://fitnessconsulting.dk", "class" => "logo-image"]); ?>

<h2>Vælg dagen, og tryk videre</h2>

<hr />

<input type="hidden" value="<?php echo $bookingType; ?>" id="booking-type-id" >

<div id='calendar'></div>