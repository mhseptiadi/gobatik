		<div class="promo">
		  <div class="container">
			<div class="row">
            <?php 
            $color = array('rcolor','gcolor','bcolor');
            ?>
			<!-- Red color promo box -->
            <?php
            foreach ($hl3 as $key => $val):
            ?>
			  <div class="col-md-4">
				<!-- rcolor =  Red color -->
				<div class="pbox <?=$color[$key]?>">
				  <div class="pcol-left">
					<!-- Image -->
					<a href="<?=SITE.'item/'.$val->seoname?>"><div style="width:90px;height: 110px;overflow: hidden;" ><img style="width:auto;" src="<?=$val->cover;?>" alt="" /></div></a>
				  </div>
				  <div class="pcol-right">
					<!-- Title -->
					<p class="pmed"><a href="<?=SITE.'item/'.$val->seoname?>"><?=$val->name;?></a></p>
					<!-- Para -->
					<p class="psmall"><a href="<?=SITE.'item/'.$val->seoname?>">Buy batik just for $<?=$val->sell;?>. <?=$val->description?></a></p>
				  </div>
				  <div class="clearfix"></div>
				</div>
			  </div>
            <?php
            endforeach;
            ?>


			</div>
		  </div>
		</div>
