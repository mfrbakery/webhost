<!--Navigation Background Part Starts -->
<div id="navigation-bg">
    <!--Navigation Part Starts -->
    <div id="navigation">
        <ul class="mainMenu">
            <li><?php echo $this->Html->link('Home', array('controller'=>'users', 'action' => 'index'));?></li>
            <li><?php echo $this->Html->link('Categories', array('controller'=>'users', 'action' => 'index'));?></li>
            <li><?php echo $this->Html->link('Users', array('controller'=>'users', 'action' => 'index'));?></li>
        </ul>
        <div class="signup">
        	<?php echo $this->Html->link('Sign up', array('controller'=>'users', 'action' => 'login'));?>
        </div>
       
    </div>
    <!--Navigation Part Ends -->
</div>
<!--Navigation Background Part Ends -->