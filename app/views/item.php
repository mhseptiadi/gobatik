
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

				<!-- Breadcrumbs -->
				<ul class="breadcrumb">
				  <li><a href="<?=MAINHTTP?>">Home</a></li>
				  <li class="active"><?=$item[0]->name;?></li>
				</ul>

				<!-- Product details -->

				<div class="product-main">
				  <div class="row">
					<div class="col-md-6 col-sm-6">
<?php
//~ echo '<pre>';print_r($item[0]);echo '</pre>';
?>
					  <!-- Image. Flex slider -->
						<div class="product-slider">
						  <div class="product-image-slider flexslider">
							<ul class="slides">
								<!-- Each slide should be enclosed inside li tag. -->
							<?php
							$images = json_decode($item[0]->images);
							$i = 1;
							foreach ($images as $val)
							{
								$display = ($i == 1)?'list-item':'none';
							?>	
								<!-- Slide #1 -->
<!--
							  <li style="width: 315px;overflow: hidden;">
-->
							  <li style="width: 100%; overflow: hidden; float: left; margin-right: -100%; position: relative; display: <?=$display?>;">
								<!-- Image -->
								<img src="<?=$val?>" alt=""/>
							  </li>
							<?php
								$i++;
							}
							?>
								                
							  
							</ul>
						  </div>
					  </div>

					</div>
					<div class="col-md-6 col-sm-6">
					  <!-- Title -->
						<h4 class="title"><?=$item[0]->name;?></h4>
						<h5>Price : $<?=$item[0]->sell;?></h5>
						<p>Stock : <?=$item[0]->stock;?></p>

							<!-- Quantity and add to cart button -->
													
						<form action="<?=MAINHTTP?>cart/add" method="post">
							<input name="ref" type="hidden" class="form-control" value="item/<?=$item[0]->seoname?>">
							<input name="itemId" type="hidden" class="form-control" value="<?=$item[0]->itemId?>">
							<div class="row">
								<div class="col-md-6">
									<div class="input-group">
									  <input id="quantity" name="quantity" type="number" class="form-control" value="1">
									  <span class="input-group-btn">
										<button class="btn btn-default" onclick="addCart(<?=$item[0]->itemId?>)" type="submit">Add to Cart</button>
									  </span>								  
									</div>
								</div>
							</div>
						</form>

						<!-- Add to wish list 
						<a href="wish-list.html">+ Add to Wish List</a>
						-->

								
					</div>
				  </div>
				</div>

		<br />
				
				<!-- Description, specs and review -->

				<ul class="nav nav-tabs">
				  <!-- Use uniqe name for "href" in below anchor tags -->
				  <li class="active"><a href="#tab1" data-toggle="tab">Description</a></li>
				  <li><a href="#tab3" data-toggle="tab">Review (5)</a></li>
				</ul>

				<!-- Tab Content -->
				<div class="tab-content">
				  <!-- Description -->
				  <div class="tab-pane active" id="tab1">
					<h5><?=$item[0]->name;?></h5>
					<?=$item[0]->description;?>
				  </div>

				  <!-- Review -->

				  <div class="tab-pane" id="tab3">
<?php $this->output('box/comment');?>
				  </div>


				</div>

			  </div>                                                                    



			</div>
		  </div>
		</div>

		<!-- Owl Carousel Starts -->
		<?=$box2;?>
		<!-- Owl Carousel Ends -->


<?php $this->output('box/subscribe');?>

<?php $this->output('template/footer');?>

<?php $this->output('template/tagFoot'); ?>	
