<?php echo $this->Html->css('signin'); ?>

<?php echo $this->Form->create('User', ['class' => 'form-signin']); ?>
	<?php echo $this->Session->flash(); ?>

	<h2 class="form-signin-heading">Please sign in</h2>
	<label for="inputEmail" class="sr-only">Username</label>
	<input type="ssn" name="data[User][login]" class="form-control" placeholder="Username" required autofocus>

	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" name="data[User][password]"  id="inputPassword" class="form-control" placeholder="Password" required>

	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

	<br />
	<?php echo $this->Html->link("Forgot password?", ['admin' => false, 'action' => 'password_recover']); ?>
<?php echo $this->Form->end(); ?>
