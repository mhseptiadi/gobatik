		<!-- Cart, Login and Register form (Modal) -->
		<!-- Cart Modal starts -->
		<div id="cart" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4>Shopping Cart</h4>
					</div>
					
                    <div id="cartTable">
                    <?php $this->output('box/cart');?>
                    </div>
                        
                    <div class="modal-footer">
                        <a data-dismiss="modal" class="btn">Continue Shopping</a>
						<a href="<?=MAINHTTP?>cart" class="btn btn-danger">Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<!--/ Cart modal ends -->

		<!-- Login Modal starts -->
		<div id="login" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4>Login</h4>
					</div>
					<div class="modal-body">
						<?php $this->output('box/login');?>
					</div>
					<div class="modal-footer">
						<p>Dont have account? <a href="<?=MAINHTTP?>register">Register</a> here.</p>
					</div>
				</div>
			</div>
		</div>
		<!--/ Login modal ends -->

		<!-- Register Modal starts -->
		<div id="register" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4>Register</h4>
					</div>
					<div class="modal-body">
						<?php $this->output('box/register');?>
					</div>
					<div class="modal-footer">
						<p>Already have account? <a href="<?=MAINHTTP?>login">Login</a> here.</p>
					</div>
				</div>
			</div>
		</div>
		<!--/ Register modal ends -->

		<!-- Header starts -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<!-- Logo. Use class "color" to add color to the text. -->
						<div class="logo">
							<h1><a href="#">Mac<span class="color bold">Kart</span></a></h1>
							<p class="meta">online shopping is fun!!!</p>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-4">
	  
						<!-- Search form -->
						<form role="form">
							<div class="input-group">
								<input type="email" class="form-control" id="search1" placeholder="Search">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default">Search</button>
								</span>
							</div>
						</form>

						<div class="hlinks">
							<span>
								<!-- item details with price -->
								<a href="#cart" role="button" data-toggle="modal">
									<span id="topCartQuantity"><?=isset($this->data['cart']['total']['quantity'])?$this->data['cart']['total']['quantity']:0;?></span> Item(s) in your <i class="fa fa-shopping-cart"></i>
								</a> -<span id="topCartPrice" class="bold">$ <?=isset($this->data['cart']['total']['price'])?$this->data['cart']['total']['price']:0;?></span>  
							</span>
							<?php
								if(empty($account)){
							?>
							<!-- Login and Register link -->
							<span class="lr"><a href="#login" role="button" data-toggle="modal">Login</a>
							or <a href="#register" role="button" data-toggle="modal">Register</a></span>
							<?php
								}else{
							?>
							<span class="lr"><a href="<?=MAINHTTP?>account"><?=ucfirst($account->username)?></a>
							- <a href="<?=isset($this->logoutUrl)?$this->logoutUrl:MAINHTTP.'login/logout';?>" >Logout</a></span>
							<?php
								}
							?>
						</div>

					</div>
				</div>
			</div>
		</header>
		<!--/ Header ends -->

