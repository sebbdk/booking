<h3>Properties</h3>

<div class="row">

	<div class="col-md-12 property">
		<div class="well">
			<h3>Total points tracked</h3>

			<div style="height: 300px;">
				<canvas class="graph" width="500" height="300" data-source="<?php echo Router::url(['controller' => 'points', 'action' => 'get_range', $property['Property']['slug']]); ?>"></canvas>
			</div>
		</div>
	</div>

	<?php foreach ($slugs as $slug): if($slug['Point']['count'] > 20) : ?>

		<div class="col-md-6 property">
			<div class="well">
				<h3><?php echo $slug['Point']['slug']; ?> - <?php echo $slug['Point']['count']; ?></h3>

				<div style="height: 300px;">
					<canvas class="graph" width="500" height="200" data-source="<?php echo Router::url(['controller' => 'points', 'action' => 'get_range', $property['Property']['slug'], $slug['Point']['slug'] ]); ?>"></canvas>
				</div>
			</div>
		</div>

	<?php endif; endforeach; ?>

</div>