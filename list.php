<?php
/*
Template Name: Sub Page List
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content">
	<!--START THE LOOP-->
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div class="entry">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-body">
		<ul>
  <?php
  global $id;
  wp_list_pages("title_li=&child_of=$id&show_date=modified
  &date_format=$date_format"); ?>
</ul>
		<?php the_content(); ?>
			
		</div>
	</div>	
		<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
<!--END THE LOOP-->

    </div><!-- #content -->
<?php get_footer(); ?>