
<div class="col-md-12">
<h3 class="title">Latest Deals</h3>
</div>
<?php
			  
foreach ($box1 as $val)
{						
	//~ echo '<pre>';print_r($val);echo '</pre>';
?>
			  <!-- Item #1 -->
			  <div class="col-md-3 col-sm-4">
				<div class="item">
				  <!-- Item image -->
				  <div class="item-image">
					<a href="<?=SITE?>item/<?=$val->seoname?>"><img src="<?=$val->cover?>" alt="" /></a>
				  </div>
				  <!-- Item details -->
				  <div class="item-details">
					<!-- Name -->
					<!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
					<h5><a href="<?=SITE?>item/<?=$val->seoname?>"><?=$val->name?></a><span class="ico"><img src="<?=SITE?>img/hot.png" alt="" /></span></h5>
					<div class="clearfix"></div>
					<!-- Para. Note more than 2 lines. -->
					<p><?=$val->description?></p>
					<hr />
					<!-- Price -->
					<div class="item-price pull-left">$<?=$val->sell?></div>
					<!-- Add to cart -->
					<div class="button pull-right"><a href="<?=SITE?>item/<?=$val->seoname?>" onclick="addCart(<?=$val->itemId?>)">Add to Cart</a></div>
					<div class="clearfix"></div>
				  </div>
				</div>
			  </div>			  
<?php
}

?>
