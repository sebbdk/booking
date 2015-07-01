<?php
	$time = strtotime($booking["Booking"]["date_time"]);
?>

<center>
	
<h1>Booking oplysninger:</h1>

<p>Hej <?php echo $booking["Booking"]["name"]; ?></p>
<p>
	Du har booket tid <b><?php echo $booking["BookingType"]["name"]; ?></b> den 
	<?php echo date("d.m.Y"); ?> klokken <?php echo date("H:i", $time); ?>
	hos fitnessconsulting.dk
</p>

<p>Gem dette link, hvis du senere vil aflyse din booking.</p>

<br />
<?php
	echo $this->Html->link(
	    'Delete booking',
	    ['controller' => 'bookings', 'action' => 'delete', $booking["Booking"]["id"]],
	    [
	    	'class' => 'btn btn-danger delete-link'
	    ]
	);
?>
<br />
<br />
</center>