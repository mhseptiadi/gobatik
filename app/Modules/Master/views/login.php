<?php $this->output('template/tagHead2');?>

<body>

<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="fa fa-lock"></i> Login 
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form method="post" action="login/check" class="form-horizontal">
                    <!-- Username -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputUsername">Username</label>
                      <div class="col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" placeholder="Username" required>
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Password</label>
                      <div class="col-lg-9">
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                      </div>
                    </div>
				
					<div class="col-lg-9 col-lg-offset-3">
						<button type="submit" class="btn btn-info btn-sm">Sign in</button>
						<button type="reset" class="btn btn-default btn-sm">Reset</button>
					</div>
                    <br />
                  </form>
				  
				</div>
                </div>
              
            </div>  
      </div>
    </div>
  </div> 
</div>

<?php $this->output('template/footer2');?>
