<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="content">
	<h1 class="portfolio-page-title">Our Work</h1>
	<?php 
		$loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 10)); 
	?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
 	<div class="portfolio-listing">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_post_thumbnail( 'portfolio-thumb' ); ?>
		<?php the_excerpt(); ?>
		<?php echo get_the_term_list($post->ID, 'features', 'Features: ', ', ', ''); ?>
	</div>
        <?php endwhile; ?>  
        </div><!-- #content -->
<?php get_footer(); ?>