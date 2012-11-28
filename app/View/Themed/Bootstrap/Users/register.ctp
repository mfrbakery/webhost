<div class="users form">
<?php
// in your view file
$this->Html->script('auth', array('inline' => false));
$this->Html->css('auth', null, array('inline' => false));
?>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Register'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('password');
		echo $this->Form->input('User.confirmpassword', array('label' => 'Confirm Password', 'type'=>'password'));
		echo $this->Form->input('useremail', array('label' => 'Please enter your email address.'));
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Login'), array('action' => 'login'));?></li>
	</ul>
</div>
