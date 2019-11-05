
<!-- Main content starts -->

<div class="content">
	<?php
		//~ echo '<pre>';print_r($this->path);echo '</pre>';
	?>
  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="<?=MASTERHTTP?>#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <!-- Main menu with font awesome icon -->
          <li <?php $this->sidebarActive('home');?> ><a href="<?=MASTERHTTP?>"><i class="fa fa-home"></i> Dashboard</a>
			  <li <?php $this->sidebarActive('sub','item');?>>
				<a href="<?=MASTERHTTP?>#"><i class="fa fa-shopping-cart"></i> Item  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
				<ul>
				  <li <?php $this->sidebarActive('subsub','item');?>><a href="<?=MASTERHTTP?>item"><i class="fa fa-list"></i>List Item</a></li>
				  <li <?php $this->sidebarActive('subsub','item','add');?>><a href="<?=MASTERHTTP?>item/add"><i class="fa fa-plus"></i>Add Item</a></li>
				</ul>
			  </li> 
			  <li <?php $this->sidebarActive('sub','tag');?>>
				<a href="<?=MASTERHTTP?>#"><i class="fa fa-tag"></i> Tag  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
				<ul>
				  <li <?php $this->sidebarActive('subsub','tag');?>><a href="<?=MASTERHTTP?>tag"><i class="fa fa-list"></i>List Tag</a></li>
				  <li <?php $this->sidebarActive('subsub','tag','add');?>><a href="<?=MASTERHTTP?>tag/add"><i class="fa fa-plus"></i>Add Tag</a></li>
				</ul>
			  </li> 
			  <li <?php $this->sidebarActive('sub','page');?>>
				<a href="<?=MASTERHTTP?>#"><i class="fa fa-pencil"></i> Page  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
				<ul>
				  <li <?php $this->sidebarActive('subsub','page');?>><a href="<?=MASTERHTTP?>page"><i class="fa fa-list"></i>List Page</a></li>
				  <li <?php $this->sidebarActive('subsub','page','add');?>><a href="<?=MASTERHTTP?>page/add"><i class="fa fa-plus"></i>Add Page</a></li>
				</ul>
			  </li> 			  
			  <li><a href="<?=MASTERHTTP?>filemanager/iframe"><i class="glyphicon glyphicon-picture"></i>Imange Manager</a></li>
              <li <?php $this->sidebarActive('sub','slide');?>>
				<a href="<?=MASTERHTTP?>#"><i class="fa fa-pencil"></i> Slide  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
				<ul>
				  <li <?php $this->sidebarActive('subsub','slide');?>><a href="<?=MASTERHTTP?>slide"><i class="fa fa-list"></i>List Slide</a></li>
				  <li <?php $this->sidebarActive('subsub','slide','add');?>><a href="<?=MASTERHTTP?>slide/add"><i class="fa fa-plus"></i>Add Slide</a></li>
				</ul>
			  </li> 	
<!--
			  <li class="has_sub">
				<a href="<?=MASTERHTTP?>#"><i class="fa fa-file-o"></i> Pages #2  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
				<ul>
				  <li><a href="<?=MASTERHTTP?>media.html">Media</a></li>
				</ul>
			  </li>   
-->
          </li>
        </ul>
    </div>

    <!-- Sidebar ends -->
