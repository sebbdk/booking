<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
echo $this->Html->meta('icon');

echo $this->Html->css('bootstrap.min');
echo $this->Html->script([
	'bower_components/jquery/dist/jquery.min',
	'bower_components/chartjs/Chart.js',
	'main.js'
]);

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');

echo $this->Html->css('screen');
?>
<title>Admin</title>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>
	<div class="container">

		<div id="wrapper">

			<!-- Sidebar -->
			<?= $this->element('menu'); ?>

			<!-- Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<?php echo $this->Session->flash(); ?>

					<?= $this->fetch('content'); ?>   
				</div>
			</div>
			<!-- /#page-content-wrapper -->

		</div>

	</div>

	<script>
		window.appInfo = <?php echo json_encode(['basepath' => Router::url()]); ?>;
	</script>
</body>
</html>
