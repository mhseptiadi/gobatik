						<div class="form">
                            
                            <?php $this->output('box/socialAccount');?>
                            
							<form action="<?=SITE?>register/ing" method="post" class="form-horizontal"> 
							  <div class="form-group">
								<label class="control-label col-md-3" for="email">Email</label>
								<div class="col-md-7">
								  <input type="email" class="form-control" name="email" required>
								</div>
							  </div>          
							  <div class="form-group">
								<label class="control-label col-md-3" for="username">Username</label>
								<div class="col-md-7">
								  <input type="text" class="form-control" name="username" required>
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-md-3" for="password">Password</label>
								<div class="col-md-7">
								  <input type="password" class="form-control" name="password" required>
								</div>
							  </div>
							  <div class="form-group">
								<label class="control-label col-md-3" for="password">Retype Password</label>
								<div class="col-md-7">
								  <input type="password" class="form-control" name="repassword" required>
								</div>
							  </div>
							  <div class="form-group">
<!--
							  <div class="col-md-7 col-md-offset-3">
								 <div class="checkbox inline">
									<label>
									   <input type="checkbox" id="inlineCheckbox2" value="agree"> Agree with Terms and Conditions
									</label>
								 </div>
								</div>
-->
							  </div> 
							  
							  <div class="form-group">
								<div class="col-md-9 col-md-offset-3">
								<button type="submit" class="btn btn-default">Register</button>
								<button type="reset" class="btn btn-default">Reset</button>
								</div>
							  </div>
							</form>
						</div>
					
