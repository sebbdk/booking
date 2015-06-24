<?php echo $this->Html->css('signin'); ?>

<?php echo $this->Form->create('User', ['class' => 'form-signin']); ?>

	<?php echo $this->Session->flash(); ?>

	<h2 class="form-signin-heading">Recover password</h2>

	<input type="email" name="data[User][email]" class="form-control" placeholder="E-mail" required>

	<button class="btn btn-lg btn-primary btn-block" type="submit">Request reset</button>

<?php echo $this->Form->end(); ?>
