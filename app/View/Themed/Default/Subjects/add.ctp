<div class="subjects form">
<?php echo $this->Form->create('Subject')?>
<fieldset>
	<legend><?php echo __('Subject')?></legend>
	
	<?php 
		echo $this->Form->input('subject');
		echo $this->Form->input('email_body');
	
	?>
	
	
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Sign out'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
		
	</ul>
</div>