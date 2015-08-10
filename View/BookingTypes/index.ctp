<div class="row booking-container">
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