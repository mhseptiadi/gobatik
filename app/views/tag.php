
<?php $this->output('template/tagHead');?>
	
	<body>

<?php $this->output('template/header');?>
<?php $this->output('template/navigation');?>


		<!-- Items -->

		<div class="items">
		  <div class="container">
			<div class="row">

			  <!-- Sidebar -->
			  <?php $this->output('template/sidebar');?>

		<!-- Main content -->
			  <div class="col-md-9 col-sm-9">

				<!-- Breadcrumb -->
				<ul class="breadcrumb">
				  <li><a href="<?=MAINHTTP;?>home">Home</a></li>
				  <li><a href="<?=MAINHTTP;?>tag">Tag</a></li>
				  <li class="active"><?=$tag[0]->name;?></li>
				</ul>

									<!-- Title -->
									  <h4 class="pull-left"><?=$tag[0]->name;?></h4>


												  <!-- Sorting
													<div class="form-group pull-right">                               
														<select class="form-control">
														<option>Sort By</option>
														<option>Name (A-Z)</option>
														<option>Name (Z-A></option>
														<option>Price (Low-High)</option>
														<option>Price (High-Low)</option>
														<option>Ratings</option>
														</select>  
													</div> -->

								  <div class="clearfix"></div>

					  <div class="row">
						<?php
						foreach ($item as $val)
						{
							
						?>
						<!-- Item #1 -->
						<div class="col-md-4 col-sm-6">
						  <!-- Each item should be enclosed in "item" class -->
						  <div class="item">
							<!-- Item image -->
							<div class="item-image">
							  <a href="<?=MAINHTTP.'item/'.$val->seoname;?>"><img src="<?=$val->cover;?>" alt="" class="img-responsive" /></a>
							</div>
							<!-- Item details -->
							<div class="item-details">
							  <!-- Name -->
							  <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
							  <h5>
								  <a href="<?=MAINHTTP.'item/'.$val->seoname;?>"><?=$val->name;?></a>
<!--
								  <span class="ico"><img src="img/hot.png" alt="" /></span>
-->
							  </h5>
							  <div class="clearfix"></div>
							  <!-- Para. Note more than 2 lines. -->
							  <p><?=$val->description;?></p>
							  <hr />
							  <!-- Price -->
							  <div class="item-price pull-left">$<?=$val->sell;?></div>
							  <!-- Add to cart -->
							  <div class="button pull-right"><a href="javascript:void(0)" onclick="addCart(<?=$val->itemId?>)">Add to Cart</a></div>
							  <div class="clearfix"></div>
							</div>
						  </div>
						</div>
						<?php
						}
						?>
						<div class="col-md-9 col-sm-9">
											<!-- Pagination 
											<div class="paging">
											   <span class='current'>1</span>
											   <a href='#'>2</a>
											   <span class="dots">&hellip;</span>
											   <a href='#'>6</a>
											   <a href="#">Next</a>
											</div>-->
						</div>           

					  </div>


					</div>                                                                    



			</div>
		  </div>
		</div>

		<!-- Owl Carousel Starts -->
		<?=$box2;?>
		<!-- Owl Carousel Ends -->

		<!-- Newsletter starts -->

<?php $this->output('box/subscribe');?>

<?php $this->output('template/footer');?>

<?php $this->output('template/tagFoot'); ?>	
