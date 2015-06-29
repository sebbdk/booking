<div class="row booking-container">
	<?php foreach ($bookingTypes as $booking): ?>
		<div class="col-md-6">
			<?php echo $this->Html->image("http://placehold.it/500/500/EEEEEE?text=" . $booking['BookingType']['name'], ["url" => ["controller" => "bookings", $booking['BookingType']['id']]]) ?>
		</div>
	<?php endforeach; ?>
</div>