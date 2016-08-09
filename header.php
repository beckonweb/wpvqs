<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?> xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:og="http://ogp.me/ns#">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title> 
		<?php bloginfo('name'); ?> <?php wp_title(); ?> 
	</title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>	
<?php
    if(is_single() || is_page())
        {
        echo '
			<meta property="og:title" content="'.get_bloginfo('name').' : '.single_post_title('', false).'" />
			';
        while(have_posts()):the_post();
        	$og_thumb_meta = get_post_meta($post->ID,'_thumbnail_id',false);
        	$og_img = wp_get_attachment_image_src($og_thumb_meta[0], false);
        	$og_thumb = $og_img[0];

            $og_excerpt = str_replace(array("\r\n", "\r", "\n"), "", get_the_excerpt());
            $og_excerpt_clean = apply_filters('the_excerpt_rss', $og_excerpt);
        endwhile;	
        echo '<meta property="og:description" content="'.strip_tags($og_excerpt_clean).'" />';
        }
        else{
        echo '
            <meta property="og:title" content="'.get_bloginfo('name').'" />
        	<meta property="og:description" content="'.get_bloginfo('description').'" />
            ';   
        }

    if(is_home() || is_front_page())
        {
	    echo '
	        <meta property="og:type" content="website" />
	    	<meta property="og:url" content="'.get_bloginfo('url').'"/>
            ';    
        }
        else{
	    echo '
	        <meta property="og:type" content="article" />
	        <meta property="og:url" content="'.get_permalink().'"/>
	        ';
        }

	if(!isset($og_thumb) || $og_thumb == null)
	    {
        $og_thumb = get_bloginfo('stylesheet_directory').'/images/wpbook-v2.jpg';
        }
    echo '
        <meta property="og:image" content="'.$og_thumb.'" />
        <meta property="fb:admins" content="586580569"/>
        ';
?>
	<!-- END FB CODE -->
	<?php 
	$content_text_color = get_option('content_text_color');
	$content_bg_color = get_option('content_bg_color'); 
	$content_link_color = get_option('content_link_color');
	?>
<style> 
	#content { color:  <?php echo $content_text_color; ?>; background: <?php echo $content_bg_color; ?>;} 
	#content a { color:  <?php echo $content_link_color; ?>;}
</style>
</head>
<body <?php body_class(); ?>>
	<div id="page">
		<div id="header">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h4><?php bloginfo('description'); ?></h4>
		</div>