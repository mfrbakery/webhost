<div class="about form">
<?php
// in your view file
$this->Html->script('home', array('inline' => false));
$this->Html->css('home', null, array('inline' => false));
?>
 <td class="horizontal_center"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="linkcontainer">
      <tr>
        <td><div class="navigation"><?php echo $this->Html->link(__('Home'), array('action' => 'index'),array('class' => 'main_link'));?></div></td>
        <td><div class="navigation"><a href="#" class="main_link">Gallery</a></div></td>
       
      
        <td><div class="navigation"><?php echo $this->Html->link(__('About'), array('controller' => 'about', 'action' => 'index'),array('class' => 'main_link'));?></div>&nbsp;</td>
        
      
        <td><div class="navigation"><?php echo $this->Html->link(__('Services'), array('action' => 'contact'),array('class' => 'main_link'));?></div></td>
        <td><div class="navigation"><?php echo $this->Html->link(__('Contact'), array('controller' => 'contact', 'action' => 'index'),array('class' => 'main_link'));?></div></td>
      </tr>
    </table></td>

</div>