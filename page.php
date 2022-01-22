<?php get_header(); ?>
<?php 
	$furnihome_sidebar_template	= get_post_meta( get_the_ID(), 'page_sidebar_layout', true );
	$furnihome_sidebar 					= get_post_meta( get_the_ID(), 'page_sidebar_template', true );
?>

	<div class="furnihome_breadcrumbs">
		<div class="container">
			<div class="listing-title">			
				<h1><span><?php furnihome_title(); ?></span></h1>				
			</div>
			<?php
				if (!is_front_page() ) {
					if (function_exists('furnihome_breadcrumb')){
						furnihome_breadcrumb('<div class="breadcrumbs custom-font theme-clearfix">', '</div>');
					} 
				} 
			?>
		</div>
	</div>	
	<div class="container">
		<div class="row">
		<?php 
			if ( is_active_sidebar( $furnihome_sidebar ) && $furnihome_sidebar_template != 'right' && $furnihome_sidebar_template !='full' ):
			$furnihome_left_span_class = 'col-lg-'.furnihome_options()->getCpanelValue('sidebar_left_expand');
			$furnihome_left_span_class .= ' col-md-'.furnihome_options()->getCpanelValue('sidebar_left_expand_md');
			$furnihome_left_span_class .= ' col-sm-'.furnihome_options()->getCpanelValue('sidebar_left_expand_sm');
		?>
			<aside id="left" class="sidebar <?php echo esc_attr( $furnihome_left_span_class ); ?>">
				<?php dynamic_sidebar( $furnihome_sidebar ); ?>
			</aside>
		<?php endif; ?>
		
			<div id="contents" role="main" class="main-page <?php furnihome_content_page(); ?>">
				<?php
				get_template_part('templates/content', 'page')
				?>
			</div>
			<?php 
			if ( is_active_sidebar( $furnihome_sidebar ) && $furnihome_sidebar_template != 'left' && $furnihome_sidebar_template !='full' ):
				$furnihome_left_span_class = 'col-lg-'.furnihome_options()->getCpanelValue('sidebar_left_expand');
				$furnihome_left_span_class .= ' col-md-'.furnihome_options()->getCpanelValue('sidebar_left_expand_md');
				$furnihome_left_span_class .= ' col-sm-'.furnihome_options()->getCpanelValue('sidebar_left_expand_sm');
			?>
				<aside id="right" class="sidebar <?php echo esc_attr($furnihome_left_span_class); ?>">
					<?php dynamic_sidebar( $furnihome_sidebar ); ?>
				</aside>
			<?php endif; ?>
		</div>		
	</div>
<?php get_footer(); ?>

