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
          <a href="<?=MASTERHTTP?>slide/<?=$method?><?php if(isset($slide->slideId)){echo '/'.$slide->slideId;}?>" class="bread-current"><?=ucfirst($method)?> Slide</a>
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
$images = @json_decode($slide->images);
?>

                    <br />
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" action="<?=MASTERHTTP?>slide/<?=$method?>" method="post">
								<?php
								if(isset($slide->slideId)){
								?>
								<input name="slideId" value="<?=$slide->slideId?>" type="hidden" />
								<?php
								}
								?>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Slide Title</label>
                                  <div class="col-lg-5">
                                    <input name="title" value="<?=@$slide->title?>" type="text" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Description</label>
                                  <div class="col-lg-6">
                                    <textarea name="description" class="cleditor"><?=@$slide->description?></textarea>
                                  </div>
                                </div>   
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Url</label>
                                  <div class="col-lg-5">
                                    <input name="url" value="<?=@$slide->url?>" type="text" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Url word</label>
                                  <div class="col-lg-5">
                                    <input name="urlword" value="<?=@$slide->urlword?>" type="text" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>
                                
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Image</label>
                                  <div class="col-lg-5">
									<img style="display:<?php echo !isset($slide->image)?'none':'block'?>;max-height:100%; max-width:100%;cursor:pointer;" onclick="imgPop(this.src)" src="<?=@$slide->image?>" id="imageImg" />
									<div class="input-group">
										<input name="image" value="<?=@$slide->image?>" id="image" type="text" class="form-control" placeholder="image">
										<span class="input-group-btn">
										<button onclick="fileadd('image')" class="btn btn-default" type="button"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>
										<button onclick="fileremove('image')" class="btn btn-default" type="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
										</span>
									</div>
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

<!-- bpopup Start -->
<script src="<?=SITEMASTER?>js/jquery.js"></script> <!-- jQuery -->
<script>
function fileadd(id){
	$('#filemanager').attr({src: "<?=$this->location()?>master/filemanager?id="+id});
	width =  $( window ).width();
	height =  $( window ).height();
	wd = (width - 1000) / 2;
	ht = (height - 600) / 2;
	$('#popIframe').bPopup({
		position: [wd, ht]
	});
}
function imgPop(src){
	$('#imageViewer').attr({src:src});
	$('#popImage').bPopup({
	});
}
function fileremove(id){
	$('#'+id).val("");
	$('#'+id+'Img').hide();
}
</script>

<div id="popIframe" style="display: none;">
	<iframe id="filemanager" src="" width="1000px" height="600px"></iframe>
</div>
<div id="popImage" style="display: none;">
	<img id="imageViewer" src="" />
</div>

<!-- bpopup End -->
<!-- Content ends -->
<?php $this->output('template/footer');?>
