<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('//arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.css');
		echo $this->Html->css('screen');
		echo $this->Html->script([
			'bower_components/jquery/dist/jquery.min',
			'//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js',
			'//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.0/js/bootstrap.min.js',
			'//arshaw.com/js/fullcalendar-1.5.3/fullcalendar/fullcalendar.min.js',
			'main'
		]);

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<title>Admin</title>
</head>
<body>
	<div class="container">

		<div class="header">
			<div class="header-info">
				Kontakt: <a href="tel:+4540521604">+45 40521604</a>
				<span class="sep"> | </span>
				<a href="mailto:bb@fitnessconsulting.dk">bb@fitnessconsulting.dk</a>
			</div>
		</div>

		<div class="container-fluid">
			<?= $this->fetch('content'); ?>   
		</div>

	</div>

	<script>
		window.appInfo = <?php echo json_encode(['basepath' => Router::url()]); ?>;
	</script>
</body>
</html>
