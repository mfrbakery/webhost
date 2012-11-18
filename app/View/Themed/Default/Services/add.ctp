<div class="services form">
<?php
// in your view file
$this->Html->script('auth', array('inline' => false));
$this->Html->css('auth', null, array('inline' => false));
?>
<?php echo $this->Form->create('Service'); ?>
	<fieldset>
		<legend><?php echo __('Add Service'); ?></legend>
	<?php
		echo $this->Form->input('servicename', array('label' => 'Please enter the name of the service.'));
		echo $this->Form->input('description', array('label' => 'Enter the description of the service.'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Services'), array('action' => 'index')); ?></li>
	</ul>
</div>
