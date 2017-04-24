<header class="page-header">
	<h1 class="page-title"><?php $this->theTitle(); ?></h1>
</header>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php
	if ( have_posts() ) :
		the_post();
		$this->theContent();
	else :

		//get_template_part( 'template-parts/post/content', 'none' );

	endif;
	?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php $this->sidebarPage('sidebar-1'); ?>