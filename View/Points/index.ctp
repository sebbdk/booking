<?php
	echo $this->Html->script([
		'bower_components/jquery/dist/jquery.min',
		'bower_components/chartjs/Chart.js',
		'main.js'
	]);
?>

<div style="width: 100%; height: 500px;">
	<canvas id="myChart" width="500" height="500"></canvas>
</div>