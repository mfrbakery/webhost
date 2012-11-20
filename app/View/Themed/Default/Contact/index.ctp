
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
      
      <td><div class="navigation"><?php echo $this->Html->link(__('Home'), array('controller' => 'home', 'action' => 'index'),array('class' => 'main_link'));?></div></td>
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












<div class="center">
<?php
// in your view file
$this->Html->script('home', array('inline' => false));
$this->Html->css('home', null, array('inline' => false));
?>

<?php echo $this->Form->create('Contact')?>

	<fieldset>
		<div class="right">
	
 <?php //echo $this->Html->image('email.png', array('alt' => 'CakePHP', 'width' => '450px'));?>
 
 </div>
	<legend><?php echo __('Contact Us')?></legend>
	
	<?php
		echo $this->Form->input('subject_id');
		echo $this->Form->input('email');
		echo $this->Form->input('body', array('label' => 'Please enter your message below:'));
		
		
	
	?>

	
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>