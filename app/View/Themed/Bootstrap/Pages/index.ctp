<?php
// in your view file
$this->Html->css('bootstrap', null, array('inline' => false));
$this->Html->css('bootstrap-custom', null, array('inline' => false));
?>


<!-- Carousel
    ================================================== -->
    
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <?php echo $this->Html->image('bootstrap-mdo-sfmoma-01.jpg');?>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php //echo //h($abouts['0']['About']['title']); ?></h1>
              <p class="lead"><?php //echo //h($abouts['0']['About']['body']); ?></p>
              <a class="btn btn-large btn-primary" href="#">Sign up today</a>
            </div>
          </div>
        </div>
        <div class="item">
          <?php echo $this->Html->image('bootstrap-mdo-sfmoma-02.jpg');?>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php //echo //h($abouts['1']['About']['title']); ?></h1>
              <p class="lead"><?php //echo h($abouts['1']['About']['body']); ?></p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>
        </div>
        <div class="item">
          <?php echo $this->Html->image('bootstrap-mdo-sfmoma-03.jpg');?>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php //echo h($abouts['2']['About']['title']); ?></h1>
              <p class="lead"><?php //echo h($abouts['2']['About']['body']); ?></p>
              <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
    </div><!-- /.carousel -->
    
    
<script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    
    <div class="center">
<h2><?php  //echo __('Coming soon!'); ?></h2>
	

		<table>
		
		 <?php //foreach ($abouts as $about): ?>
		
		 <tr>
			<h3><b><?php //echo h($about['About']['title']); ?></b></h3>
			<p>
			<?php //echo h($about['About']['body']); ?>
			</p>
			
		
		</tr>
		 <?php //endforeach; ?>
		 
	</table>
	
</div>