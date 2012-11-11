
<?php
// in your view file

$this->Html->css('home', null, array('inline' => false));
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td class="shadow_left">&nbsp;</td>
    <td class="header_column">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="linkcontainer">
      <tr>
      
      <td><div class="navigation"><?php echo $this->Html->link(__('Home'), array('action' => 'index'),array('class' => 'main_link'));?></div></td>
		        <td><div class="navigation"><a href="#" class="main_link">Gallery</a></div></td>
		       
		      
		        <td><div class="navigation"><?php echo $this->Html->link(__('About'), array('controller' => 'about', 'action' => 'index'),array('class' => 'main_link'));?></div>&nbsp;</td>
		        
		      
		        <td><div class="navigation"><?php echo $this->Html->link(__('Services'), array('controller' => 'services', 'action' => 'index'),array('class' => 'main_link'));?></div></td>
		        <td><div class="navigation"><?php echo $this->Html->link(__('Contact'), array('controller' => 'contact', 'action' => 'index'),array('class' => 'main_link'));?></div></td>
      			</tr>
    		</table>
    	</td>
    	<td class="shadow_right">&nbsp;</td>
    
  </tr>
<!--  
<tr>
    <td class="horizontal_column">&nbsp;</td>
 		<td class="horizontal_center">
 		<table width="110%" border="0" cellpadding="0" cellspacing="0" class="linkcontainer">
      		<tr>
		        <td><div class="navigation"><?php echo $this->Html->link(__('Home'), array('action' => 'index'),array('class' => 'main_link'));?></div></td>
		        <td><div class="navigation"><a href="#" class="main_link">Gallery</a></div></td>
		       
		      
		        <td><div class="navigation"><?php echo $this->Html->link(__('About'), array('controller' => 'about', 'action' => 'index'),array('class' => 'main_link'));?></div>&nbsp;</td>
		        
		      
		        <td><div class="navigation"><?php echo $this->Html->link(__('Services'), array('action' => 'contact'),array('class' => 'main_link'));?></div></td>
		        <td><div class="navigation"><?php echo $this->Html->link(__('Contact'), array('controller' => 'contact', 'action' => 'index'),array('class' => 'main_link'));?></div></td>
	      </tr>
    	</table></td>
     <td class="horizontal_column">&nbsp;</td>
  </tr>-->
</table>

