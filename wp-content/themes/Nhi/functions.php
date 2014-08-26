<?php

function theme_name_wp_title( $title, $sep ) {



	if ( is_feed() ) {

		return $title;

	}

	global $page, $paged;

	// Add the blog name

	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) ) {

		$title .= " $sep $site_description";

	}

	// Add a page number if necessary:

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {



		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );



	}

	return $title;

}



add_filter( 'wp_title', 'theme_name_wp_title', 10, 2 );







function register_menu() {



    register_nav_menus( array(

    	'menu-header' => 'Menu Header',



    ) );



}



add_action('init', 'register_menu');







function get_excerpt($count,$txt){



  $excerpt =$txt;



   if($count>strlen($excerpt)){



     return $excerpt;



 }else{          



    $excerpt = strip_tags($excerpt);



     $excerpt = substr($excerpt, 0, $count);



     $excerpt = substr($excerpt, 0, strripos($excerpt, " "));



     $excerpt = $excerpt.'...';



     return $excerpt;



 }



}













add_theme_support( 'post-thumbnails' );



add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only



add_theme_support( 'post-thumbnails', array( 'page' ) );          // Pages only



add_theme_support( 'post-thumbnails', array( 'post', 'slidehome','testimonial' ) ); // Posts and Movies









function reg_widgets_init() {







register_sidebar( array(



'name' => __( 'Footer Area Right', 'FooterArearight' ),



'id' => 'area-footer-right',



'before_widget' => '<div class="col-md-5 widget">',



'after_widget' => "</div>",



'before_title' => '<h3>',



'after_title' => '</h3>',



) );

register_sidebar( array(



'name' => __( 'Sidebar', 'Sider Area' ),



'id' => 'area-sidebar',



'before_widget' => '<div class="widget-sider">',



'after_widget' => "</div></div>",



'before_title' => '<div class="title">',



'after_title' => '</div><div class="content">',



) );




}



add_action( 'widgets_init', 'reg_widgets_init' );



//show_admin_bar(false);

add_action( 'init', 'codex_book_init' );

/**

 * Register a book post type.

 *

 * @link http://codex.wordpress.org/Function_Reference/register_post_type

 */

function codex_book_init() {

	$labels = array(

		'name'               => _x( 'Testimonial', 'post type general name', 'your-plugin-textdomain' ),

		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'your-plugin-textdomain' ),

		'menu_name'          => _x( 'Testimonial', 'admin menu', 'your-plugin-textdomain' ),

		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'your-plugin-textdomain' ),

		'add_new'            => _x( 'Add New', 'Testimonial', 'your-plugin-textdomain' ),

		'add_new_item'       => __( 'Add New Testimonial', 'your-plugin-textdomain' ),

		'new_item'           => __( 'New Testimonial', 'your-plugin-textdomain' ),

		'edit_item'          => __( 'Edit Testimonial', 'your-plugin-textdomain' ),

		'view_item'          => __( 'View Testimonial', 'your-plugin-textdomain' ),

		'all_items'          => __( 'All Testimonial', 'your-plugin-textdomain' ),

		'search_items'       => __( 'Search Testimonial', 'your-plugin-textdomain' ),

		'parent_item_colon'  => __( 'Parent Testimonial:', 'your-plugin-textdomain' ),

		'not_found'          => __( 'No Testimonial found.', 'your-plugin-textdomain' ),

		'not_found_in_trash' => __( 'No Testimonial found in Trash.', 'your-plugin-textdomain' )

	);



	$args = array(

		'labels'             => $labels,

		'public'             => true,

		'publicly_queryable' => true,

		'show_ui'            => true,

		'show_in_menu'       => true,

		'query_var'          => true,

		'rewrite'            => array( 'slug' => 'testimonial' ),

		'capability_type'    => 'post',

		'has_archive'        => true,

		'hierarchical'       => false,

		'menu_position'      => null,

        'menu_icon' => 'http://png-2.findicons.com/files/icons/129/soft_scraps/24/user_clients_01.png',

		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )

	);



	register_post_type( 'testimonial', $args );

}



