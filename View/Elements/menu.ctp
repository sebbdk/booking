<?php
	$menuItems = isset($this->request->params['admin']) ? Configure::read('menu'):Configure::read('menu');
	
	if($menuItems) {
		usort($menuItems, function($a, $b) {
			if(!isset($a['sort'])) {
				return 0;
			}

			if(!isset($b['sort']) || $a['sort'] > $b['sort']) {
				return 1;
			} else {
				return 0;
			}
		});
	} else {
		$menuItems = [];
	}

?>

<div id="sidebar-wrapper">
	<ul class="sidebar-nav">
		<li class="sidebar-brand">
			<a href="#">
				Track
			</a>
		</li>
		<?php foreach($menuItems as $menuItem) : ?>
			<?php
				$isActive = $this->params['controller'] == $menuItem['url']['controller'] && 
							$this->action == $menuItem['url']['action'];
			?>
			<li <?= $isActive ? 'class="active"':''; ?>>
				<?= $this->Html->link($menuItem['name'], $menuItem['url']); ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>