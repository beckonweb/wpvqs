<?php

add_action( 'widgets_init', 'my_sidebar' );

function my_sidebar() {

/* Register the 'primary' sidebar */
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary' ),
			'description' => __( 'This is the primary sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	}

/* Portfolio Custom Post Type */	
add_action('init', 'create_portfolio');
function create_portfolio() {
$portfolio_args = array(
        'label' => __('Portfolio'),
        'singular_label' => __('Portfolio Item'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
        );
register_post_type('portfolio',$portfolio_args);
	}
/* Register the Portfolio taxonomy */	
register_taxonomy('features', 'portfolio', array( 'hierarchical' => false, 'label' => 'Features', 'query_var' => true, 'rewrite' => true));


/* Add Custom Thumbnail support */
add_theme_support( 'post-thumbnails' );
/* Custom thumbnail sizes */
add_image_size('portfolio-full', 700, 500, true);
add_image_size('portfolio-thumb', 300, 300, true);

/* Add Support for Flexible Custom Header */
add_theme_support( 'custom-header', array(
	// Flex height 
	'flex-height' => true,
	// Recommended height
	'height' => 200,
	// Flex width
	'flex-width' => true,
	// Recommended width
	'width' => 1000,
	// Template header style callback
	'wp-head-callback' => $wphead_cb,
	// Admin header style callback
	'admin-head-callback' => $adminhead_cb,
	// Admin preview style callback
	'admin-preview-callback' => $adminpreview_cb
) );

/* Add Support for Infinite Scroll */
add_theme_support( 'infinite-scroll', array(
    'type'           => 'scroll',
    'footer_widgets' => false,
    'container'      => 'content',
    'wrapper'        => true,
    'render'         => false,
    'posts_per_page' => false,
) );

/* Add Support for Theme Customizer */
add_action( 'customize_register', 'ourtheme_customize_register' );
function ourtheme_customize_register($wp_customize)
{
  $colors = array();
  $colors[] = array( 'slug'=>'content_bg_color', 'default' => '#ffffff', 'label' => __( 'Content Background Color', 'ourtheme' ) );
  $colors[] = array( 'slug'=>'content_text_color', 'default' => '#000000', 'label' => __( 'Content Text Color', 'ourtheme' ) );
  $colors[] = array( 'slug'=>'content_link_color', 'default' => '#000000', 'label' => __( 'Content Link Color', 'ourtheme' ) );

  foreach($colors as $color)
  {
    // SETTINGS
    $wp_customize->add_setting( $color['slug'], array( 'default' => $color['default'], 'type' => 'option', 'capability' => 'edit_theme_options' ));

    // CONTROLS
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $color['slug'], array( 'label' => $color['label'], 'section' => 'colors', 'settings' => $color['slug'] )));
  }
}

?>