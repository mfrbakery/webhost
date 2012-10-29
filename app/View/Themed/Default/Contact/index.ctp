<div class="contacts form">
<?php
// in your view file
$this->Html->script('home', array('inline' => false));
$this->Html->css('home', null, array('inline' => false));
?>
<?php echo $this->Form->create('Contact')?>

	<fieldset>
	<legend><?php echo __('Contact Us')?></legend>
	
	<?php
		echo $this->Form->input('subject_id');
		echo $this->Form->input('email');
		echo $this->Form->input('body');
		
	
	?>
	
	
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>