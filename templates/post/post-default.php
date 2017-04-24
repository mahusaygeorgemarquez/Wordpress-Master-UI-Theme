<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php $this->theTitle(); ?>
		<?php //the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
		<?php $this->theTimeLink(); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php $this->theContent(); ?>
	</div><!-- .entry-summary -->

</article><!-- #post-## -->