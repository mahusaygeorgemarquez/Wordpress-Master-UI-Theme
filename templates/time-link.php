<?php if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php
			echo masterui_time_link();
			masterui_edit_link();
		?>
	</div><!-- .entry-meta -->
<?php elseif ( 'page' === get_post_type() && get_edit_post_link() ) : ?>
	<div class="entry-meta">
		<?php masterui_edit_link(); ?>
	</div><!-- .entry-meta -->
<?php endif; ?>