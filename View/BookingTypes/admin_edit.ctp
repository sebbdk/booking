<?php 

	$options = [
		"0.25" => "15 minutter", 
		"0.5" => "30 minutter", 
		"0.75" => "45 minutter", 
		"1" => "1 time",
		"1.25" => "1 time og 15 minutter",
		"1.5" => "1 time og 30 minutter",
		"1.75" => "1 time og 45 minutter",
		"2" => "2 timer",
		"2.25" => "2 time og 15 minutter",
		"2.5" => "2 time og 30 minutter",
		"2.75" => "2 time og 45 minutter",
		"3" => "3 timer"
	];

?>

<div class="col-me-12">
	<div class="well">
		<h3><?php echo __('Edit Booking Type'); ?></h3>
	</div>

	<div class="well">
		<?php echo $this->Form->create('BookingType', array('class' => 'row')); ?>

			<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>

			<div class="form-group col-md-6">
				<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Title'));?>
			</div>
			<div class="form-group col-md-6">
				<?php echo $this->Form->input('length', array('options' =>  $options, 'class' => 'form-control', 'disabled'));?>
			</div>
			<div class="form-group col-md-6">
				<?php echo $this->Form->input('color', array('type' => 'color', 'class' => 'form-control', 'placeholder' => 'Asset File Id'));?>
			</div>
			<div class="form-group col-md-6">
				<?php echo $this->Form->input('asset_image', array('type' => 'file', 'class' => 'form-control', 'label' => 'Preview image'));?>
			</div>
			<div class="form-group col-md-12">
				<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
			</div>

		<?php echo $this->Form->end() ?>

	</div>
</div>
