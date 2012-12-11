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
			<a class="brand" target="_blank" href="http://twitter.github.com/bootstrap/">Bootstrap</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li <?php if($current_page=="index"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Scaffolding', array('controller' => 'app', 'action' => 'index')); ?>
					</li>
					<li <?php if($current_page=="base_css"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Base CSS', array('controller' => 'app', 'action' => 'base_css')); ?>
					</li>
					<li <?php if($current_controller=="contact"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Contact', array('controller' => 'contact', 'action' => 'index')); ?>
					</li>
					<li <?php if($current_page=="javascript"){echo'class="active"';} ?>>
						<?php echo $this->Html->link('Javascript plugins', array('controller' => 'app', 'action' => 'javascript')); ?>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>