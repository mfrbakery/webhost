<?php
App::uses('AppController', 'Controller', 'AuthHelper');
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
if($this->Session->read('Auth.User.id')!=null){
	$name = 'Logout';
	$navLinks[] = array('name' => $name, 'controller' => 'users', 'action' => 'logout');
}else{
	$name = 'Login';
	$navLinks[] = array('name' => $name, 'controller' => 'users', 'action' => 'login');
}
$cakeDescription = __d('cake_dev', 'Name goes here');

$navLinks[] = array('name' => 'Register', 'controller' => 'users', 'action' => 'register');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		//echo //$this->Html->meta('icon');

		echo $this->Html->css('webhost');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		<h1><?php foreach($navLinks as $nav) {
				//echo $this->Html->link(__(ucwords(strtolower($nav['name']))), "/{$nav['controller']}/{$nav['action']}").' ';
				}
			?></h1>
			<h2><?php echo $this->Html->link($cakeDescription, ''); ?>
				
			
			</h2>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
