<div class="users form">

<?php
echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('action' => 'login'));?>
    <fieldset>
        <legend><?php echo __('Please enter your username and password'); ?></legend>
       
    <?php
       echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
		echo $this->Form->input('User.username');
		echo $this->Form->input('User.password');
		echo $this->Form->end('Login');
       
    ?>
   
    </fieldset>

</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Register'), array('action' => 'register'));?></li>
	</ul>
</div>