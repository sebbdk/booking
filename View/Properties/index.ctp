<h3>Properties</h3>

<div class="row">

	<div class="col-md-12 property">
		<div class="well">
			<h3>Overall data</h3>

			<div style="height: 300px;">
				<canvas class="graph" width="500" height="200" data-source="<?php echo Router::url(['controller' => 'points', 'action' => 'get_range']); ?>"></canvas>
			</div>
		</div>
	</div>
	
	<?php foreach ($properties as $property): ?>

		<div class="col-md-6 property">
			<div class="well">
				<h3><?php echo $this->Html->link($property['Property']['slug'], ['action' => 'view', $property['Property']['slug']]); ?></h3>

				<div style="height: 300px;">
					<canvas class="graph" width="500" height="200" data-source="<?php echo Router::url(['controller' => 'points', 'action' => 'get_range', $property['Property']['slug']]); ?>"></canvas>
				</div>
			</div>
		</div>

	<?php endforeach; ?>

</div>