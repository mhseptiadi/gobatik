<div class="container">
		
			<div class="rp">
				<!-- Recent News Starts -->
				<h4 class="title">All Items</h4>
				<div class="recent-news block">
						<!-- Recent Item -->
						<div class="recent-item">
							<div class="custom-nav">
								<a class="prev"><i class="fa fa-chevron-left br-lblue"></i></a>
								<a class="next"><i class="fa fa-chevron-right br-lblue"></i></a>
							</div>
							<div id="owl-recent" class="owl-carousel">
								<!-- Item -->
								<?php
								foreach ($box2 as $val)
								{
									
								?>
								<div class="item">
									<a href="<?=SITE.'item/'.$val->seoname?>"><img style="width:196px;height: 170px;height: 170px;overflow: hidden;" src="<?=$val->cover?>" alt="" class="img-responsive" /></a>
									<!-- Heading -->
									<h4><a href="<?=SITE.'item/'.$val->seoname?>"><?=$val->name?><span class="pull-right">$<?=$val->sell?></span></a></h4>
									<div class="clearfix"></div>
									<!-- Paragraph -->
									<?=$val->description?>
								</div>
								<?php
								
								}
								?>
							</div>
						</div>
				</div>
				
				<!-- Recent News Ends -->
			</div>
			
		</div>
		
