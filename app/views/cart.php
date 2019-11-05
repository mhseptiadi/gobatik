
<?php $this->output('template/tagHead');?>
	
	<body>

<?php $this->output('template/header');?>
<?php $this->output('template/navigation');?>


<!-- Checkout starts -->

<div class="checkout">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <!-- Checkout page title -->
          <h4 class="title"><i class="fa fa-shopping-cart"></i> Checkout</h4>

      <!-- Cart details section -->
        <!-- Title -->
          <h5 class="title">Cart Details</h5>

                    <?php $this->output('box/cart');?>
                

          <hr />


      <!-- Register form (not working)-->
      <form action="<?=MAINHTTP?>cart/checkout" method="post" class="form-horizontal">

          <!-- Sub title -->
          <h5 class="title">Shipping &amp; Billing Details</h5>
          <!-- Address and Shipping details form -->
            <div class="form form-small">
                                          <!-- Name -->
                                          <div class="form-group">
                                            <label class="control-label col-md-2" for="name">Name</label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" name="name" required>
                                            </div>
                                          </div>   
                                          <!-- Email -->
                                          <div class="form-group">
                                            <label class="control-label col-md-2" for="email">Email</label>
                                            <div class="col-md-6">
                                              <input type="email" class="form-control" name="email">
                                            </div>
                                          </div>
                                          <!-- Telephone -->
                                          <div class="form-group">
                                            <label class="control-label col-md-2" for="telephone">Telephone</label>
                                            <div class="col-md-6">
                                              <input type="number" class="form-control" name="telephone">
                                            </div>
                                          </div>  
                                          <!-- Address -->
                                          <div class="form-group">
                                            <label class="control-label col-md-2" for="address">Address</label>
                                            <div class="col-md-6">
                                              <textarea class="form-control" rows="5" name="address" required></textarea>
                                            </div>
                                          </div>                           
                                          <!-- Country -->
                                          <div class="form-group">
                                            <label class="control-label col-md-2">Country</label>
                                            <div class="col-md-3">                           
                                                <select name="country" class="form-control" required>
                                                <option value=""> --- Please Select --- </option>
                                                        <?php 
                                                        foreach ($postCountry as $val)
                                                        {
                                                            echo "<option value=\"{$val->postCountryId}\">{$val->name}</option>";   
                                                        }
                                                        ?>
                                                </select>  
                                            </div>
                                          </div>  
                                          <!-- State -->
                                          <div class="form-group">
                                            <label class="control-label col-md-2" for="city">State</label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" name="state" required>
                                            </div>
                                          </div>                                               
                                          <!-- City -->
                                          <div class="form-group">
                                            <label class="control-label col-md-2" for="city">City</label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" name="city" required>
                                            </div>
                                          </div>    
                                          
                                      
                                    </div>

                                    <hr />


      <!-- Payment details section -->
        <!-- Title -->
          <h5 class="title">Payment Details</h5>

          <!-- Radio buttons to select payment type -->
          <label class="radio-inline">
            <input type="radio" name="payment" id="optionsRadios5" value="5" checked>
            Paypal
          </label>                    

          <hr />

          <!-- Confirm order button -->
              <div class="row">
                <div class="col-md-4 col-md-offset-8">
                  <div class="pull-right">
                      <input type="submit" class="btn btn-danger" value="Confirm Order" />
                  </div>
                </div>
              </div>
    </form>
    
      </div>
    </div>
  </div>
</div>

<!-- Cart ends -->



<?php $this->output('box/subscribe');?>

<?php $this->output('template/footer');?>

<?php $this->output('template/tagFoot'); ?>	
