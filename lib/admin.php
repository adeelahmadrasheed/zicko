<?php

/**
 * Add Theme Options page.
 */
function furnihome_theme_admin_page(){
	add_theme_page(
		esc_html__('Theme Options', 'furnihome'),
		esc_html__('Theme Options', 'furnihome'),
		'manage_options',
		'furnihome_theme_options',
		'furnihome_theme_admin_page_content'
	);
}
add_action('admin_menu', 'furnihome_theme_admin_page', 49);

function furnihome_theme_admin_page_content(){ ?>
	<div class="wrap">
		<h2><?php esc_html_e( 'Furnihome Advanced Options Page', 'furnihome' ); ?></h2>
		<?php do_action( 'furnihome_theme_admin_content' ); ?>
	</div>
<?php
}