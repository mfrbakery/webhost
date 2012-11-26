<div class="container">
<form class="form-signin">
<?php
// in your view file
$this->Html->script('jquery-1.8.3.js', array('inline' => false));
$this->Html->script('bootstrap.min.js', array('inline' => false));
$this->Html->script('bootstrap-button.js', array('inline' => false));
$this->Html->css('bootstrap.min.css', null, array('inline' => false));
?>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username', array('div' => 'clearfix'));
		echo $this->Form->input('password');
		echo $this->Form->hidden('group_id', array('default' => 4))
	?>
	</fieldset>
<?php echo $this->Form->end('Submit'); ?>
</form>
</div>
<form class="form-actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Login'), array('action' => 'login'));?></li>
	</ul>
</form>
