<?php $this->output('template/tagHead');?>

<body>

<?php $this->output('template/header');?>
<?php $this->output('template/sidebar');?>

  	<div class="mainbar">

      <!-- Page heading -->
      <div class="page-head">
        <h2 class="pull-left"><i class="fa fa-table"></i> List Comment</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?=MASTERHTTP?>"><i class="fa fa-home"></i> Dashboard</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="<?=MASTERHTTP?>comment" class="bread-current">Comment</a>
        </div>

        <div class="clearfix"></div>

      </div>
      <!-- Page heading ends -->

	    <!-- Matter -->

	    <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Data Tables</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    
							<!-- Table Page -->
							<div class="page-tables">
								<!-- Table -->
								<div class="table-responsive">
									<table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
										<thead>
											<tr>
												<th>Date</th>
												<th>CommentId   </th><th>Type</th><th>Username</th><th>Content</th><th>Status</th>
												<th style="text-align: center;">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$skipfield = array('accountId','parrentId','controller','method','password','typename','data'
                                            ,'status'
                                            );
                                            if(!empty($comment))
											foreach ($comment as $val)
											{
												echo '<tr>';
												foreach ($val as $subkey => $subval)
												{
													if(!in_array($subkey,$skipfield))
													echo "<td>{$subval}</td>";
												}
												echo '<td>';
                                                
                                                if($val->status == 0)
                                                echo '<button type="button" onclick="changeStatus('.$val->commentId.',1)" class="btn btn-danger btn-xs">Inactive</button>';
                                                else
                                                echo '<button type="button" onclick="changeStatus('.$val->commentId.',0)" class="btn btn-success btn-xs">Active</button>';
                                                echo'</td>';
                                                
                                                echo "<td style=\"text-align: center;\">";
                                                echo "<button onclick=\"delme({$val->commentId})\" type=\"button\" class=\"btn btn-default btn-xs\">
														<span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>
													</button>
												</td>";
												echo '</tr>';
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th>Date</th>
												<th>CommentId   </th><th>Type</th><th>Username</th><th>Content</th><th>Status</th>
												<th style="text-align: center;">Action</th>
											</tr>
										</tfoot>
									</table>
									<div class="clearfix"></div>
								</div>
								</div>
							</div>

					
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
              
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
function changeStatus(id,status){
    	$.confirm({
		title:"Status confirmation",
        text: "Are you want to change status comment "+id+"?",
        confirm: function(button) {
			$.post( "<?=$this->location()?>master/comment/change", { commentId: id, status:status })
			.done(function( data ) {
				if(data == true)
				window.location.href = "<?=$this->location()?>master/comment";
				else
				alert('Change failed!!!');
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
    
function delme(id){
	$.confirm({
		title:"Delete confirmation",
        text: "Are you want to delete comment "+id+"?",
        confirm: function(button) {
			$.post( "<?=$this->location()?>master/comment/delete", { id: id })
			.done(function( data ) {
				if(data == true)
				window.location.href = "<?=$this->location()?>master/comment";
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
