 <div class="col-md-3 col-sm-3 hidden-xs">

				<h5 class="title">Tags</h5>
				<!-- Sidebar navigation -->
				  <nav>
					<ul id="nav">
					  <!-- Main menu. Use the class "has_sub" to "li" tag if it has submenu. -->
					  <?php
					  foreach ($taglist as $val)
					  {
						  echo "<li><a href=\"".MAINHTTP."tag/{$val->seoname}\">{$val->name}</a></li>";
					  }
					  ?>

<!--
					  <li class="has_sub"><a href="#">Tablet</a>
						<ul>
									  <li><a href="items.html">Samsung</a></li>
									  <li><a href="items.html">Apple</a></li>
									  <li><a href="items.html">Motorola</a></li>
						</ul>
					  </li>
					  
-->
					</ul>
				  </nav>
		<br />
				  <!-- Sidebar items (featured items)-->
				  <div class="sidebar-items">

					<h5 class="title">Other Items</h5>

					<!-- Item #1 -->
					<?php
					foreach ($others as $val)
					{
						
					?>
					<div class="sitem">
					  <!-- Don't forget the class "onethree-left" and "onethree-right" -->
					  <div class="onethree-left">
						<!-- Image -->
						<a href="<?=MAINHTTP.'item/'.$val->seoname;?>"><img style="width:45px;height: 60px;overflow: hidden;" src="<?=$val->cover?>" alt="" /></a>
					  </div>
					  <div class="onethree-right">
						<!-- Title -->
						<a href="<?=MAINHTTP.'item/'.$val->seoname;?>"><?=$val->name?></a>
						<!-- Para -->
						<p><?=$val->description?></p>
						<!-- Price -->
						<p class="bold">$<?=$val->sell?></p>
					  </div>
					  <div class="clearfix"></div>
					</div>
					<?php
					
					}
					
					?>	
				  </div>

			  </div>
