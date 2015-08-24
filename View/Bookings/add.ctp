<?php echo $this->Html->image("logo.png", ["class" => "logo-image"]); ?>

<h2>Vælg tidspunkt</h2>

<?php echo $this->element("time_selector", ["date_time" => date("Y-m-d", $date)]); ?>

<?php echo $this->Form->create('Booking', ['class' => 'form']); ?>

	<h1>Oplysninger:</h1>

	<?php echo $this->Form->input("date_time", ["type" => "hidden", "id" => "date-time"]); ?>
	<?php echo $this->Form->input("booking_type_id", ["type" => "hidden",  "value" => $bookingType, "id" => "BookingBookingTypeId"]); ?>

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
		<button type="submit" class="btn btn-default">Reserver tid</button>
	</div>

<?php echo $this->Form->end(); ?>