<?php get_header();?>
<?php get_sidebar(); ?>
<div id="content">
<!--START THE LOOP-->
	<?php while(have_posts()) : the_post(); 
	get_template_part( 'content', get_post_format() );
		 endwhile; ?>
<!--END THE LOOP-->
	<div id="nav-below" class="navigation">
		<div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts')) ?></div>
		<div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&rarr;</span>')) ?></div>
	</div>
</div>
<?php get_footer(); ?>