<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<?php
	if ( have_posts() ) :

		while ( have_posts() ) : the_post();
			$this->contentPage('post');
		endwhile;

		the_posts_pagination( array(
			'prev_text' => '&lt;Prev',
			'next_text' => 'Next&gt;',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'masterui' ) . ' </span>',
		) );

	else :

		//get_template_part( 'template-parts/post/content', 'none' );

	endif;
	?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php $this->sidebarPage('sidebar-1'); ?>