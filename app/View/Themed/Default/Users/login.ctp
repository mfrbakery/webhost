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
    /*
       echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.password');
		echo $this->Form->end('Login');*/
       
    ?>
   
    </fieldset>
    </fieldset>

</div>

<div class="actions">
	<h3><?php echo __('Login'); ?></h3>
	
	<div class="formactions">
	 <?php
       echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.password');
		echo $this->Form->end('Login');
		?>
		<?php 
		 ?>
       
   
    </div>
    
</div>