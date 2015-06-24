<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
		echo $this->Html->script([
			'bower_components/jquery/dist/jquery.min',
			'lib/moment.min.js',
			'lib/jquery-ui.custom.min.js',
			'fullcalendar.min.js',
			'admin'
		]);

		echo $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,300,700,800');
		echo $this->Html->css('fullcalendar.min.css');
		echo $this->Html->css('admin');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
		<title>Admin</title>

	</head>
	<body>

		<?php echo $this->element("menu"); ?>

		<div class="container row">

			<!-- Page Content -->
			<div id="page-content-wrapper" class="col-sm-12">
				<div class="content col-sm-12">
					<?php echo $this->Session->flash(); ?>

					<?= $this->fetch('content'); ?>   
				</div>
			</div>
			<!-- /#page-content-wrapper -->

		</div>

		<script>
			window.appInfo = <?php echo json_encode([
				"basepath" => Router::url(),
				"admin" => true
			]); ?>;
		</script>
	</body>
</html>
