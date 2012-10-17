<div class="users form">
<?php
// in your view file
$this->Html->script('auth', array('inline' => false));
$this->Html->css('auth', null, array('inline' => false));
?>
<?php echo $this->Form->create('DomainName'); ?>
	<fieldset>
		<legend><?php echo __('Domain registration'); ?></legend>
	<?php
	
		echo $this->Form->input('domain', array('label' => 'Check for domain availability.'));
	
		//echo $this->Form->hidden('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Login'), array('controller' => 'users', 'action' => 'login'));?></li>
	</ul>
</div>
