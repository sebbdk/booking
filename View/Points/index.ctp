<?php
	echo $this->Html->script([
		'bower_components/jquery/dist/jquery.min',
		'bower_components/chartjs/Chart.js',
		'main.js'
	]);



	foreach($points as $point) {
	//	debug($point['Point']);
	}
?>



<div style="width: 100%; height: 500px;">
	<canvas id="myChart" width="500" height="500"></canvas>
</div>