<h5 class="title">Give a Comment</h5>



<div class="form form-small">

    <?php
    if(isset($account->username)):
    ?>
  <!-- Comment form (not working)-->
  <form method="post" action="<?=$this->location('comment/add');?>" class="form-horizontal"> 

      <!-- Comment -->
      <div class="form-group">
        <label class="control-label col-md-3" for="name">Your Comment</label>
        <div class="col-md-6">
            <input type="hidden" name="controller" value="<?=$this->controller?>"/>
            <input type="hidden" name="method" value="<?=$this->method?>"/>
          <textarea name="content" class="form-control"></textarea>
        </div>
      </div>
      <!-- Buttons -->
      <div class="form-group">
         <!-- Buttons -->
         <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-default">Post</button>
            <button type="reset" class="btn btn-default">Reset</button>
        </div>
      </div>
  </form>
    <?php
    else:
    ?>
    <a href="#login" role="button" data-toggle="modal">Login here</a>
    <?php
    endif;
    ?>
</div> 

				 <hr>

<h5>Comments</h5>

<?php
if(!empty($this->commentList)):
foreach ($this->commentList as $val):
//~ echo '<pre>';print_r($val);echo '</pre>';
?>
<div class="item-review">
<h5><?=$val->username?> - <span class="color"><?=$val->type?></span></h5>
<p class="rmeta"><?=date("d/m/Y",$val->date)?></p>
<p><?=$val->content?></p>
</div>
<?php
endforeach;
endif;
?>


 
