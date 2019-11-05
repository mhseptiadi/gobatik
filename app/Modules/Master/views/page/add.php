<?php $this->output('template/tagHead');?>

<body>

<?php $this->output('template/header');?>
<?php $this->output('template/sidebar');?>

<script>
	var imagesCount = 1;
</script>

  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
        <!-- Page heading -->
	      <h2 class="pull-left"><i class="fa fa-file-o"></i> <?=ucfirst($method)?></h2>
        </h2>


        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="<?=MASTERHTTP?>"><i class="fa fa-home"></i> Dashboard</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="<?=MASTERHTTP?>page/<?=$method?><?php if(isset($page->pageId)){echo '/'.$page->pageId;}?>" class="bread-current"><?=ucfirst($method)?> Page</a>
        </div>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container">

          <div class="row">

            <div class="col-md-12">


              <div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Forms</div>
<!--
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
-->
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

<?php
$images = @json_decode($page->images);
?>

                    <br />
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" action="<?=MASTERHTTP?>page/<?=$method?>" method="post">
								<?php
								if(isset($page->pageId)){
								?>
								<input name="pageId" value="<?=$page->pageId?>" type="hidden" />
								<?php
								}
								?>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Page Title</label>
                                  <div class="col-lg-5">
                                    <input name="title" value="<?=@$page->title?>" type="text" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Content</label>
                                  <div class="col-lg-6">
                                    <textarea name="content" class="cleditor" name="input"><?=@$page->content?></textarea>
                                  </div>
                                </div>   
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Description</label>
                                  <div class="col-lg-6">
                                    <textarea name="description" class="cleditor" name="input"><?=@$page->description?></textarea>
                                  </div>
                                </div>   
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Status</label>
                                  <div class="col-lg-5">
									  <?php
									  $status = isset($page->status)?$page->status:'draft';
									  if($status == 'draft'){
										  $statusDraft = 'checked';
										  $statusPublish = '';
									  }elseif($status == 'publish'){
										  $statusDraft = '';
										  $statusPublish = 'checked';
									  }
									  ?>
                                    <input type="radio" name="status" value="draft" <?=$statusDraft?>>Draft &nbsp;
									<input type="radio" name="status" value="publish" <?=$statusPublish?>>Publish
                                  </div>
                                </div>   
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Menu hold</label>
                                  <div class="col-lg-5">
                                    <input name="menu" value="<?=isset($page->menu)?$page->menu:0?>" type="number" class="form-control" placeholder="Input Box">
                                  </div>
                                </div>
                                                         
                                <div class="form-group">
                                  <label class="col-lg-2 control-label"></label>
                                  <div class="col-lg-5">
                                    <button type="submit" class="btn btn-sm btn-default">Submit</button>
                                  </div>
                                </div>                                
                                
                              </form>
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

		<!-- Matter ends -->

    </div>

   <!-- Mainbar ends -->	    	
   <div class="clearfix"></div>

</div>
<!-- Content ends -->
<?php $this->output('template/footer');?>
