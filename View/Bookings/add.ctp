<h1>Vælg tidspunkt</h1>

<div class="times">
	<?php
		$timeLength = 1.25;
		$rows = floor(8 / $timeLength);
		$hour = 60 * 60;

		for($c = 0; $c < $rows; $c++) {
			$time = $timeLength * $c * 60 * 60 + (60 * 60 * 9);
			$dateTime = intval($date + $time) + $hour;
			echo '
			<a href="#" class="item availeble" date-time="' . $dateTime . '">
				<span class="time">' . date("H:i", $dateTime) . '</span> <span class="status">Vælg tid</span>
			</a>
			';
		}
	?>
</div>

<?php echo $this->Form->create('booking', ['class' => 'form']); ?>

	<h1>Oplysninger:</h1>

	<input type="hidden" name="data[Booking][date_time]" class="form-control" id="date-time">

	<div class="form-group">
		<label for="exampleInputEmail1">Navn</label>
		<input type="text" name="data[Booking][name]" class="form-control" id="exampleInputEmail1" placeholder="name">
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Telefon nummer</label>
		<input type="text" name="data[Booking][phone]" class="form-control" id="exampleInputEmail1" placeholder="phone">
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Email addresse</label>
		<input type="email" name="data[Booking][email]" class="form-control" id="exampleInputEmail1" placeholder="Email">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-default">Reserver tid</button>
	</div>

<?php echo $this->Form->end(); ?>