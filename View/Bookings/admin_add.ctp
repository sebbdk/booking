<h1>Choose time</h1>

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
				<span class="time">' . date("H:i", $dateTime) . '</span> <span class="status">Choose time</span>
			</a>
			';
		}
	?>
</div>

<?php echo $this->Form->create('booking', ['class' => 'form']); ?>

	<h1>Client information:</h1>

	<input type="hidden" name="data[Booking][date_time]" class="form-control" id="date-time">

	<div class="form-group">
		<label for="exampleInputEmail1">name</label>
		<input type="text" name="data[Booking][name]" class="form-control" id="exampleInputEmail1" placeholder="name">
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">telephone-number</label>
		<input type="text" name="data[Booking][phone]" class="form-control" id="exampleInputEmail1" placeholder="phone">
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">E-mail address</label>
		<input type="email" name="data[Booking][email]" class="form-control" id="exampleInputEmail1" placeholder="Email">
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Confirmed time</label>
		<input type="hidden" name="data[Booking][confirmed]" value="0">
		<input type="checkbox" name="data[Booking][confirmed]" value="1">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-default">Reserve time</button>
	</div>

<?php echo $this->Form->end(); ?>