						<div class="form">
                            
                            <?php $this->output('box/socialAccount');?>

							<form action="<?=SITE?>login/ing" method="post" class="form-horizontal">   
							  <div class="form-group">
								<label class="control-label col-md-3" for="username">Username</label>
								<div class="col-md-7">
								  <input type="text" class="form-control" name="username" required>
								</div>
							  </div>
                                  <input type="hidden" value="<?=isset($_GET['r'])?$_GET['r']:(($this->redirect != 'login')?$this->redirect:'')?>" name="redirect" >
							  <div class="form-group">
								<label class="control-label col-md-3" for="email">Password</label>
								<div class="col-md-7">
								  <input type="password" class="form-control" name="password" required>
								</div>
							  </div>
							  <div class="form-group">
								<div class="col-md-7 col-md-offset-3">
								 <div class="checkbox inline">
									<label>
									   <input type="checkbox" name="inlineCheckbox1" value="agree"> Remember Password
									</label>
								 </div>
								 </div>
							  </div> 
							  
							  <div class="form-group">
							  <div class="col-md-7 col-md-offset-3">
								<button type="submit" class="btn btn-default">Login</button>
								<button type="reset" class="btn btn-default">Reset</button>
							  </div>
							  </div>
							</form>
						</div> 
