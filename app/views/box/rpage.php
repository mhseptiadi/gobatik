
                              <div class="widget">
                                 <h4>Recent Posts</h4>
                                 <ul>
									 <?php
									 foreach ($rpage as $val)
									 {
										 //~ echo '<pre>';print_r($val);echo '</pre>';
										 echo "
										<li><a href=\"".SITE."page/{$val->seoname}\">{$val->title}</a></li>
										 ";
									 }
									 
									 ?>
                                 </ul>
                              </div>  
