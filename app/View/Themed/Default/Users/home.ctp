<div class="users form">
<?php
// in your view file
$this->Html->script('auth', array('inline' => false));
$this->Html->css('auth', null, array('inline' => false));
?>
<?php
echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('action' => 'login'));?>
<fieldset>
	<legend><?php echo __('Please enter your username and password'); ?></legend>
    <fieldset>
        
       
    <?php
    
      
		echo $this->Form->input('User.whois');
		
       
    ?>
   
    </fieldset>
    </fieldset>

</div>