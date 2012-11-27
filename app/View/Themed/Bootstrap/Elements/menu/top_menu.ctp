<?php 
	
	$current_page = $this->params['action'];
	$current_controller = $this->params['controller'];

?>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<!-- <a class="brand" target="_blank" href="http://twitter.github.com/bootstrap/">Our Company Name</a>-->
			<?php echo $this->Html->link(__('Our Company Name'), array('controller' => 'home', 'action' => 'index'),array('class' => 'brand'));?>
			<div class="nav-collapse">
				<ul class="nav">
					<li <?php if($current_controller=="home"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Home', array('controller' => 'home', 'action' => 'index')); ?>
					</li>
					<li <?php if($current_controller=="about"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('About', array('controller' => 'about', 'action' => 'us/1')); ?>
					</li>
					<li <?php if($current_controller=="contact"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Contact', array('controller' => 'contact', 'action' => 'index')); ?>
					</li>
					
					<li <?php if($current_controller=="posts"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Our Blog', array('controller' => 'posts', 'action' => 'index')); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>