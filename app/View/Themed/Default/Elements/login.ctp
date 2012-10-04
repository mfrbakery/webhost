<div class="users form">

<?php
echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('action' => 'login'));?>
    
        <legend><?php echo __('Please enter your username and password'); ?></legend>
       
    <?php
       echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.password');
		echo $this->Form->end('Login');
       
    ?>
   
    

</div>