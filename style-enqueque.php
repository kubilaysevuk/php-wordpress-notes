<?php
function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'my-style', get_template_directory_uri() . '/assets/css/app.main.css', false, '1.0', 'all' ); // Inside a parent theme
/*	wp_enqueue_style( 'my1-style', get_template_directory_uri() . '/assets/css/form.css', false, '1.0', 'all' ); // Inside a parent theme
	wp_enqueue_style( 'my2-style', get_template_directory_uri() . '/plugins/fontawesome-free/css/all.min.css', false, '1.0', 'all' ); // Inside a parent theme
	wp_enqueue_style( 'my3-style', get_template_directory_uri() . '/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css', false, '1.0', 'all' ); // Inside a parent theme
	wp_enqueue_style( 'my1-style', get_template_directory_uri() . '/plugins/jqvmap/jqvmap.min.css', false, '1.0', 'all' ); // Inside a parent theme
	wp_enqueue_style( 'my1-style', get_template_directory_uri() . '/dist/css/adminlte.min.css', false, '1.0', 'all' ); // Inside a parent theme
	wp_enqueue_style( 'my1-style', get_template_directory_uri() . '/plugins/overlayScrollbars/css/OverlayScrollbars.min.css', false, '1.0', 'all' ); // Inside a parent theme
	wp_enqueue_style( 'my1-style', get_template_directory_uri() . '/plugins/daterangepicker/daterangepicker.css', false, '1.0', 'all' ); // Inside a parent theme
	wp_enqueue_style( 'my1-style', get_template_directory_uri() . '/plugins/summernote/summernote-bs4.css', false, '1.0', 'all' ); // Inside a parent theme
	wp_enqueue_style( 'my1-style', get_template_directory_uri() . '/dist/dropzone.css', false, '1.0', 'all' ); // Inside a parent theme */

	wp_enqueue_style( 'style-name', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


/*
 * Enqueue a script with the correct path.
 */
function wpdocs_scripts_method() {
	wp_enqueue_script('custom_script', get_template_directory_uri() . '/assets/js/app.main.js', array('jquery'));
	wp_enqueue_script('custom0_script', get_template_directory_uri() . '/assets/js/runtime.main.js', array('jquery'));
/*	wp_enqueue_script('custom1_script', get_template_directory_uri() . '/plugins/jquery/jquery.min.js', array('jquery'));
	wp_enqueue_script( 'script1-name', get_template_directory_uri() . '/plugins/jquery-ui/jquery-ui.min.js', array('jquery') );
	wp_enqueue_script( 'script2-name', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.bundle.min.js', array('jquery'));
	wp_enqueue_script( 'script3-name', get_template_directory_uri() . '/plugins/chart.js/Chart.min.js', array('jquery'));
	wp_enqueue_script( 'script4-name', get_template_directory_uri() . '/plugins/sparklines/sparkline.js', array('jquery'));
	wp_enqueue_script( 'script5-name', get_template_directory_uri() . '/plugins/jqvmap/jquery.vmap.min.js', array('jquery'));
	wp_enqueue_script( 'script6-name', get_template_directory_uri() . '/plugins/jqvmap/maps/jquery.vmap.usa.js', array('jquery') );
	wp_enqueue_script( 'script7-name', get_template_directory_uri() . '/plugins/jquery-knob/jquery.knob.min.js', array('jquery') );
	wp_enqueue_script( 'script8-name', get_template_directory_uri() . '/plugins/moment/moment.min.js', array('jquery') );
	wp_enqueue_script( 'script9-name', get_template_directory_uri() . '/plugins/daterangepicker/daterangepicker.js', array('jquery') );
	wp_enqueue_script( 'script10-name', get_template_directory_uri() . '/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', array('jquery') );
	wp_enqueue_script( 'script11-name', get_template_directory_uri() . '/plugins/summernote/summernote-bs4.min.js', array('jquery') );
	wp_enqueue_script( 'script12-name', get_template_directory_uri() . '/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js', array('jquery') );
	wp_enqueue_script( 'script13-name', get_template_directory_uri() . '/dist/dashboard.js', array('jquery') );
	wp_enqueue_script( 'script14-name', get_template_directory_uri() . '/dist/demo.js', array('jquery') );
	wp_enqueue_script( 'script15-name', get_template_directory_uri() . '/dist/adminlte.js', array('jquery') );
	wp_enqueue_script( 'script16-name', get_template_directory_uri() . '/dist/dropzone.js', array('jquery') );
	wp_enqueue_script( 'script17-name', get_template_directory_uri() . '/build/config/rollup.config.js', array('jquery') );
	wp_enqueue_script( 'script18-name', get_template_directory_uri() . '/build/config/postcss.config.js', array('jquery') ); */
}
add_action('wp_enqueue_scripts', 'wpdocs_scripts_method'); ?>
