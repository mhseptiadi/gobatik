
<?php $this->output('template/tagHead');?>
	
	<body>

<?php $this->output('template/header');?>
<?php $this->output('template/navigation');?>
		
<!-- Page content starts -->

<div class="content error-page">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-5">  
        <!-- Big 404 text -->
        <div class="big-text">404</div>
        <hr />
      </div>
      <div class="col-md-5 col-sm-5 col-sm-offset-1 col-md-offset-1">
        <h2>Oops<span class="color">!!!</span></h2>
        <h4>Page Not Found</h4>
        <hr />
        <!-- Some site links -->
        <?php $this->output('box/siteLinks');?>
        <hr />
      </div>

    </div>
  </div>
</div>

<!-- Page content ends -->


<?php $this->output('box/subscribe');?>

<?php $this->output('template/footer');?>
