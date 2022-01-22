<?php get_template_part('header'); ?>
<?php 
	$furnihome_sidebar_template = furnihome_options()->getCpanelValue('sidebar_blog') ;
	$furnihome_blog_styles = furnihome_options()->getCpanelValue('blog_layout');
?>

<div class="furnihome_breadcrumbs">
	<div class="container">
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
		<div class="category-contents <?php furnihome_content_blog(); ?>">
			<div class="listing-title">			
				<h1><span><?php furnihome_title(); ?></span></h1>				
			</div>
			<!-- No Result -->
			<?php if (!have_posts()) : ?>
			<?php get_template_part('templates/no-results'); ?>
			<?php endif; ?>			
			
			<?php 
				$furnihome_blogclass = 'blog-content blog-content-'. $furnihome_blog_styles;
				if( $furnihome_blog_styles == 'grid' ){
					$furnihome_blogclass .= ' row';
				}
			?>
			<div class="<?php echo esc_attr( $furnihome_blogclass ); ?>">
			<?php 			
				while( have_posts() ) : the_post();
					get_template_part( 'templates/content', $furnihome_blog_styles );
				endwhile;
			?>
			<?php get_template_part('templates/pagination'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		
		<?php if ( is_active_sidebar('left-blog') && $furnihome_sidebar_template == 'left' ):
			$furnihome_left_span_class = 'col-lg-'.furnihome_options()->getCpanelValue('sidebar_left_expand');
			$furnihome_left_span_class .= ' col-md-'.furnihome_options()->getCpanelValue('sidebar_left_expand_md');
			$furnihome_left_span_class .= ' col-sm-'.furnihome_options()->getCpanelValue('sidebar_left_expand_sm');
		?>
		<aside id="left" class="sidebar <?php echo esc_attr($furnihome_left_span_class); ?>">
			<?php dynamic_sidebar('left-blog'); ?>
		</aside>

		<?php endif; ?>
		<?php if ( is_active_sidebar('right-blog') && $furnihome_sidebar_template =='right' ):
			$furnihome_right_span_class = 'col-lg-'.furnihome_options()->getCpanelValue('sidebar_right_expand');
			$furnihome_right_span_class .= ' col-md-'.furnihome_options()->getCpanelValue('sidebar_right_expand_md');
			$furnihome_right_span_class .= ' col-sm-'.furnihome_options()->getCpanelValue('sidebar_right_expand_sm');
		?>
		<aside id="right" class="sidebar <?php echo esc_attr($furnihome_right_span_class); ?>">
			<?php dynamic_sidebar('right-blog'); ?>
		</aside>
		<?php endif; ?>
	</div>
</div>
<?php get_template_part('footer'); ?>
