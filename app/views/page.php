
<?php $this->output('template/tagHead');?>
	
	<body>

<?php $this->output('template/header');?>
<?php $this->output('template/navigation');?>
		   
<!-- Page heading starts -->

<!--
<div class="page-head">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Blog</h2>
        <h4>something goes here</h4>
      </div>
    </div>
  </div>
</div>
-->

<!-- Page Heading ends -->

<!-- Page content starts -->

<div class="content blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
                           <div class="posts">
                              <!-- Each posts should be enclosed inside "entry" class" -->
                              <!-- Post one -->
                              <div class="entry">
                                 <h2><a href="#"><?=$page[0]->title?></a></h2>
                                 
                                 <!-- Meta details -->
                                 <div class="meta">
                                    <i class="fa fa-calendar"></i> <?=date("d-m-Y H:i",strtotime($page[0]->date))?>  
                                    <span class="pull-right">
<!--
										<i class="fa fa-comment"></i> <a href="#">2 Comments</a>
-->
									</span>
                                 </div>
                                 
                                 <?=$page[0]->content?>
                              </div>
                              
<?php $this->output('box/share');?>

<?php $this->output('box/comment');?>
                              
                              <hr />
                              

                              
                              <div class="clearfix"></div>
                           </div>
                        </div>                        
                        <div class="col-md-4">
                          <!-- Sidebar -->
                           <div class="sidebar">
                              <!-- Widget -->
                              <div class="widget">
                                 <h4>Search</h4>
                                 <form action="<?=MAINHTTP?>search" class="form-inline" role="form">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search for...">
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
										</span>
									</div><!-- /input-group -->
								 </form>
                              </div>
								<?php $this->output('box/rpage');?>
                           </div>                                                
                        </div>
    </div>
  </div>
</div>

<!-- Page content ends -->

<?php $this->output('box/subscribe');?>


<?php $this->output('template/footer');?>

<?php $this->output('template/tagFoot'); ?>	
