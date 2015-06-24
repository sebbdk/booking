<?php echo $this->Html->css('signin'); ?>

<?php echo $this->Form->create('User', ['class' => 'form-signin']); ?>

	<?php echo $this->Session->flash(); ?>

	<h2 class="form-signin-heading">Enter new password</h2>

	<input type="password" name="data[User][new_password]" class="form-control" placeholder="New password" required>

	<div>
		<?php echo $this->Form->input('User.id'); ?>
	</div>

	<button class="btn btn-lg btn-primary btn-block" type="submit">Save</button>

<?php echo $this->Form->end(); ?>
