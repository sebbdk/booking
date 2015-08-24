<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('User', array('role' => 'form')); ?>
			<?php echo $this->Form->input('id', array('type' => 'hidden'));?>

			<div class="form-group">
				<?php echo $this->Form->input('username', array('class' => 'form-control'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('email', array('class' => 'form-control'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('password', array('class' => 'form-control', 'value' => ''));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
			</div>

		<?php echo $this->Form->end() ?>

	</div>
</div>
