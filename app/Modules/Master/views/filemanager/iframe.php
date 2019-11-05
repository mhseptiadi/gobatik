<?php $this->output('template/tagHead');?>

<body>

<?php $this->output('template/header');?>
<?php $this->output('template/sidebar');?>

  	<div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-table"></i> List Tags</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?=MASTERHTTP?>"><i class="fa fa-home"></i> Dashboard</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="<?=MASTERHTTP?>tags" class="bread-current">Tags</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->

	    <!-- Matter -->

	    <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <iframe src="<?=$this->location()?>master/filemanager" width="100%" height="auto" scrolling="no" frameBorder="0"></iframe>
              <script type="text/javascript" src="<?=SITEMASTER?>js/jquery.js"></script>
              <script>
				$('iframe').load(
					function (){
						setTimeout(function(){ 
							var iframeHeight = $( "iframe" ).contents().find("html").height();
							$( "iframe" ).height(iframeHeight);
							$('iframe').attr("frameBorder","0"); 
						},500);
					}
				);
              </script>
              
            </div>
          </div>
        </div>
		  </div>

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->

<script>
function delme(id){
	$.confirm({
		title:"Delete confirmation",
        text: "Are you want to delete tags "+id+"?",
        confirm: function(button) {
			$.post( "<?=$this->location()?>master/tags/delete", { id: id })
			.done(function( data ) {
				if(data == true)
				window.location.href = "<?=$this->location()?>master/tags";
				else
				alert('Delete failed!!!');
			});
        },
        //~ cancel: function(button) {
            //~ alert("You cancelled.");
        //~ },
		//~ confirmButton: "Yes I am",
		//~ cancelButton: "No",
		confirmButtonClass: "btn-danger",
		//~ cancelButtonClass: "btn-info"
    });
}
</script>

<?php $this->output('template/footer');?>
