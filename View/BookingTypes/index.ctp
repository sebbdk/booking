<div class="row booking-container">

	<div class="col-md-12">
		<h2>Vælg din booking type</h2>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
	</div>

	<?php foreach ($bookingTypes as $booking): ?>
		<div class="col-md-12">
			<?php 
				if(!empty($booking["BookingType"]["asset_file"])) {
					echo $this->Html->image("/files/uploads/".$booking["BookingType"]["asset_file"], ["url" => ["controller" => "bookings", $booking['BookingType']['id']]]);	
				} else {
					echo $this->Html->image("https://placeholdit.imgix.net/~text?txtsize=107&bg=330000&txtclr=eeeeee&w=1000&h=400&txttrack=0&txt=" . $booking['BookingType']['name'], ["url" => ["controller" => "bookings", $booking['BookingType']['id']]]);
				}
			?>
		</div>
	<?php endforeach; ?>
</div>