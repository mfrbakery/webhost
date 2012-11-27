
<div class="about form">
<?php
// in your view file
$this->Html->script('auth', array('inline' => false));
$this->Html->css('auth', null, array('inline' => false));
?>
<?php echo $this->Form->create('About'); ?>
	<fieldset>
		<legend><?php echo __('Add About content'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body', array('type' => 'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('About Backend'), array('action' => 'backend')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Notes'), array('controller' => 'notes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Note'), array('controller' => 'notes', 'action' => 'add')); ?> </li>
	</ul>
</div>