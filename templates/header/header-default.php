<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php bloginfo( 'name' ); ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php 
				$l = wp_nav_menu( array('theme_location' => 'leftmainmenu','menu_id' => 'leftmainmenu','container'=>'ul','menu_class'=>'nav navbar-nav','echo'=>false) ); 
				$r = wp_nav_menu( array('theme_location' => 'rightmainmenu','menu_id' => 'leftmainmenu','container'=>'ul','menu_class'=>'nav navbar-nav navbar-right','echo'=>false) ); 
				echo $l;
				echo $r? $r : '';
			?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
