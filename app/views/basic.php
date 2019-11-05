
<?php $this->output('template/tagHead');?>
	
	<body>

<?php $this->output('template/header');?>
<?php $this->output('template/navigation');?>
		   
<!-- Page content starts -->

<div class="content">
  <div class="container">
    <div class="row">
<!--
      <div class="col-md-6">
                  
		</div>
-->

                <div class="col-md-12">
                  <div class="formy well">
                     <h4 class="title"><?=$headWord?></h4>
						<?php
						echo isset($error)?'<div class="text-center" style="color:red">'.$error.'</div>':'';
						?>
							<?=$form?>
							
									  <div class="clearfix"></div>
									  <hr />
										<?=$footWord?>
				  </div>

			</div>
    </div>
  </div>
</div>

<!-- Page content ends -->



<?php $this->output('box/subscribe');?>

<?php $this->output('template/footer');?>

<?php $this->output('template/tagFoot'); ?>	
