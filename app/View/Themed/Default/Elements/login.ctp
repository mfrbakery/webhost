
		<div id="header-bg">
    <!--Navigation Part Starts -->
    <div id="header">
    <div id="login-bg">
        <div id="login-area">
        
            <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
            <?php echo $this->Form->input('User.username');?>
            <?php echo $this->Form->input('User.password');?>
            <?php echo $this->Html->link('Sign up', array('controller'=>'users', 'action' => 'login'));?>
            <?php echo $this->Form->end('Login'); ?>
            
        
        
        
     </div>
       </div>
    </div>
    <!--Navigation Part Ends -->
</div>
<!--Navigation Background Part Ends -->