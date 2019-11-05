<?php $this->output('template/tagHead');?>
	
	<body>

<?php $this->output('template/header');?>
<?php $this->output('template/navigation');?>

<?=$slider;?>

		<!-- Promo box starts -->

			  <?=$hl3;?>
			  
		<!--/ Promo box ends -->

		<!-- Items -->
		<div class="items">
		  <div class="container">
			<div class="row">
			  
			 <?php 
			 echo $box1;
			 ?>                                                       

			</div>
		  </div>
		</div>
		<!--/ Items end -->

		<!-- Owl Carousel Starts -->
		<?=$box2;?>
		<!-- Owl Carousel Ends -->


<?php $this->output('box/subscribe');?>
<?php $this->output('template/footer');?>

<?php $this->output('template/tagFoot'); ?>	
