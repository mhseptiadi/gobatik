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
          <a href="<?=MASTERHTTP?>item/<?=$method?><?php if(isset($item->itemId)){echo '/'.$item->itemId;}?>" class="bread-current"><?=ucfirst($method)?> Item</a>
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
$images = @json_decode($item->images);
$itemTag = @json_decode($item->tag);
?>

                    <br />
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" action="<?=MASTERHTTP?>item/<?=$method?>" method="post">
								<?php
								if(isset($item->itemId)){
								?>
								<input name="itemId" value="<?=$item->itemId?>" type="hidden" />
								<?php
								}
								?>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Item Name</label>
                                  <div class="col-lg-5">
                                    <input name="name" value="<?=@$item->name?>" type="text" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Buy Price</label>
                                  <div class="col-lg-5">
                                    <input name="buy" value="<?=@$item->buy?>" type="number" min="0" step="1" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Sell Price</label>
                                  <div class="col-lg-5">
                                    <input name="sell" value="<?=@$item->sell?>" type="number" min="0" step="1" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Weight</label>
                                  <div class="col-lg-5">
                                    <input name="weight" value="<?=@$item->weight?>" type="decimal" min="0" step="1" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>
                                
								<div class="form-group">
                                  <label class="col-lg-2 control-label">Cover Image</label>
                                  <div class="col-lg-5">
									<img style="display:<?php echo !isset($item->cover)?'none':'block'?>;max-height:100%; max-width:100%;cursor:pointer;" onclick="imgPop(this.src)" src="<?=@$item->cover?>" id="coverImg" />
									<div class="input-group">
										<input name="cover" value="<?=@$item->cover?>" id="cover" type="text" class="form-control" placeholder="cover">
										<span class="input-group-btn">
										<button onclick="fileadd('cover')" class="btn btn-default" type="button"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>
										<button onclick="fileremove('cover')" class="btn btn-default" type="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
										</span>
									</div>
                                  </div>
                                </div>
                                <div id="imagesContainer">
									<?php
									if(!isset($item->images) || empty($images)){
									?>
									<div class="form-group">
									  <label class="col-lg-2 control-label">Images</label>
									  <div class="col-lg-5">
										<img style="display:none;max-height:100%; max-width:100%;cursor:pointer;" onclick="imgPop(this.src)" src="" id="images1Img" />
										<div class="input-group">
											<input name="images[]" id="images1" type="text" class="form-control" placeholder="Images 1">
											<span class="input-group-btn">
											<button onclick="fileadd('images1')" class="btn btn-default" type="button"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>
											<button onclick="fileremove('images1')" class="btn btn-default" type="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
											</span>
										</div>
									  </div>
									</div>
									<?php
									}else{
										foreach ($images as $key => $val)
										{
											$num = $key + 1;
											echo "
									<script>imagesCount++;</script>
									<div class=\"form-group\">
									  <label class=\"col-lg-2 control-label\">Images</label>
									  <div class=\"col-lg-5\">
										<img style=\"display:block;max-height:100%; max-width:100%;cursor:pointer;\" onclick=\"imgPop(this.src)\" src=\"{$val}\" id=\"images{$num}Img\" />
										<div class=\"input-group\">
											<input name=\"images[]\" value=\"{$val}\" id=\"images{$num}\" type=\"text\" class=\"form-control\" placeholder=\"Images {$num}\">
											<span class=\"input-group-btn\">
											<button onclick=\"fileadd('images{$num}')\" class=\"btn btn-default\" type=\"button\"><span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span></button>
											<button onclick=\"fileremove('images{$num}')\" class=\"btn btn-default\" type=\"button\"><span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span></button>
											</span>
										</div>
									  </div>
									</div>											
											";
										}
									}
									?>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label"></label>
                                  <div class="col-lg-5">
									<button id="addImages" type="button" class="btn btn-default">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Images
									</button>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Description</label>
                                  <div class="col-lg-6">
                                    <textarea name="description" class="cleditor" name="input"><?=@$item->description?></textarea>
                                  </div>
                                </div>   
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Stock</label>
                                  <div class="col-lg-5">
                                    <input name="stock" value="<?=@$item->stock?>" type="number" min="0" step="1" class="form-control" placeholder="Input Box" required>
                                  </div>
                                </div>       
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Tag</label>
                                  <div class="col-lg-10">
                                    
									<table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
										<thead>
											<tr>
												<th>Tag ID</th>
												<th>Name</th>
												<th>Desciption</th>
												<th style="text-align: center;">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if(!empty($tag))
											foreach ($tag as $val)
											{
												echo '<tr>';
												foreach ($val as $subkey => $subval)
												{
													echo "<td>{$subval}</td>";
												}
												$checked = isset($itemTag) && in_array($val->tagId,$itemTag)?"checked":"";
												echo "<td style=\"text-align: center;\">
													<input type=\"checkbox\" name=\"tag[]\" value=\"{$val->tagId}\" {$checked}>
												</td>";
												echo '</tr>';
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th>Tag ID</th>
												<th>Name</th>
												<th>Desciption</th>
												<th style="text-align: center;">Action</th>
											</tr>
										</tfoot>
									</table>
                                    
                                    
                                  </div>
                                </div>       
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Note</label>
                                  <div class="col-lg-5">
                                    <textarea name="note" class="form-control" rows="5" placeholder="Textarea"><?=@$item->note?></textarea>
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
$('#addImages').click(
	function (){
		imagesCount++;
		$('#imagesContainer').append(
			'<div class="form-group">'+
			'  <label class="col-lg-2 control-label">Images</label>'+
			'  <div class="col-lg-5">'+
			'	<img style="display:none;max-height:100%; max-width:100%;cursor:pointer;" onclick="imgPop(this.src)" src="" id="images'+imagesCount+'Img" />'+
			'	<div class="input-group">'+
			'		<input name="images[]" id="images'+imagesCount+'" type="text" class="form-control" placeholder="Images '+imagesCount+'">'+
			'		<span class="input-group-btn">'+
			'		<button onclick="fileadd(\'images'+imagesCount+'\')" class="btn btn-default" type="button"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>'+
			'		<button onclick="fileremove(\'images'+imagesCount+'\')" class="btn btn-default" type="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'+
			'		</span>'+
			'	</div>'+
			'  </div>'+
			'</div>'
			
		);
	}
);
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
