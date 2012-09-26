<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css('default'); 
echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');

?> 

</head>

<body>
<!--Header Background Part Starts -->
<div id="header-bg">
	<!--Header Contant Part Starts -->
	<div id="header">
    <?php
    //echo //$html->link($html->image("logo.gif"), array('controller'=>'jobs', 'action' => 'index'), array('escape' => false));
    ?>   
		<!-- <a href="index.html"><img src="images/logo.gif" alt="Package" width="205" height="62" border="0" class="logo" title="Package" /></a> -->
		<!--Login Background Starts -->
		<?php echo $this->element('login', array('cache' => true)); ?>
		</div>
		
	<!--Header Contant Part Ends -->
</div>
<!--Header Background Part Ends -->
<?php echo $this->element('menu', array('cache' => true)); ?>
<!--Our Company Bacground Part Starts -->
<div id="ourCompany-bg">
	<!--Our Company Part Starts -->
	<div id="ourCompany-part">
		<?php //echo $content_for_layout; ?>
		<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		<br class="spacer" />
	</div>
	<div id="content">

			
		</div>
	<!--Our Company Part Ends -->
</div>
<!--Our Company Bacground Part Ends -->
<!--Footer Part Starts -->
<div id="footer-bg">
	<!--Footer Menu Part Starts -->
	<div id="footer-menu">
		<ul class="footMenu">
			<li class="noDivider"><a href="#" title="Home">Home</a></li>
			<li><a href="#" title="About">About</a></li>
			<li><a href="#" title="Services">Services</a></li>
			<li><a href="#" title="Support">Support</a></li>
			<li><a href="#" title="Chat">Chat</a></li>
			<li><a href="#" title="History">History</a></li>
			<li><a href="#" title="Contact">Contact</a></li>
		</ul>
		<br class="spacer" />
		<p class="copyright">Copyright?&copy; Package 2007 All Rights Reserved</p>
		<p class="copyright topPad">Powered by <a href="http://www.templatekingdom.com/Web-Templates/Web-Design/" target="_blank" title="TemplateKingdom.com">TemplateKingdom.com</a></p>
	</div>
	<!--Footer Menu Part Ends -->
</div>
<!--Footer Part Ends -->
</body>
</html>