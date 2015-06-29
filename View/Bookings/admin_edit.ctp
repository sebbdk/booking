<h1>Choose time</h1>

<?php 
	echo $this->element("time_selector", ["date_time" => $this->data["Booking"]["date_time"]]);
	echo $this->Form->create('Booking', ['class' => 'form', 'style' => 'display: block;']); 
?>

	<h1>Client information:</h1>

	<?php echo $this->Form->input("id", ["type" => "hidden"]); ?>
	<?php echo $this->Form->input("date_time", ["type" => "hidden", "id" => "date-time"]); ?>
	<?php echo $this->Form->input("booking_type_id", ["type" => "hidden", "id" => "BookingBookingTypeId"]); ?>

	<div class="form-group">
		<?php echo $this->Form->input("name", ["class" => "form-control", "placeholder" => "Name"]); ?>
	</div>

	<div class="form-group">
		<?php echo $this->Form->input("phone", ["class" => "form-control", "placeholder" => "Phonenumber"]); ?>
	</div>

	<div class="form-group">
		<?php echo $this->Form->input("email", ["class" => "form-control", "placeholder" => "E-mail"]); ?>
	</div>

	<div class="form-group">
		<?php echo $this->Form->input("confirmed", ["class" => "form-control", "label" => "Confirm time (Sends a email letting the user know)"]); ?>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-default">Save resevation</button>
	</div>

<?php echo $this->Form->end(); ?>