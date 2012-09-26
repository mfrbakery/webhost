<!--Navigation Background Part Starts -->

<div id="navigation-bg">

    <!--Navigation Part Starts -->

    <div id="navigation">

        <ul class="mainMenu">
<?php
// in your view file
$this->Html->script('webhost', array('inline' => false));
$this->Html->css('webhost', null, array('inline' => false));
?>
            <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>

           <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>

            <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>

        </ul>

        <a href="#" class="signup" title="signup now"></a>

    </div>

    <!--Navigation Part Ends -->

</div>

<!--Navigation Background Part Ends -->
