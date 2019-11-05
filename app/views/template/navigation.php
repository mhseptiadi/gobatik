		<!-- Navigation -->
		<div class="navbar bs-docs-nav" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<nav class="collapse navbar-collapse bs-navbar-collapse collapse in" role="navigation"><!-- sep: add class  collapse in -->
					<ul class="nav navbar-nav">
						<li><a href="<?=MAINHTTP?>"><i class="fa fa-home"></i>&nbsp;Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-Tag"></i>&nbsp;Tag <b class="caret"></b></a>
							<ul class="dropdown-menu">
								  <?php
								  foreach ($taglist as $val)
								  {
									  echo "<li><a href=\"".MAINHTTP."tag/{$val->seoname}\">{$val->name}</a></li>";
								  }
								  ?>
							</ul>
						</li>
                        <?php
                        foreach ($menuHold as $val)
                        {
                         echo "<li><a href=\"".MAINHTTP."page/{$val->seoname}\">{$val->title}</a></li>";
                        }
                        ?>                                      
					</ul>
				</nav>
			</div>
		</div>
		<!--/ Navigation End -->
