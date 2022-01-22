<?php 
	/* 
	** Content Header
	*/
	$furnihome_mobile_logo = furnihome_options()->getCpanelValue( 'mobile_logo' );
	$fb_link = furnihome_options()->getCpanelValue('social-share-fb');
	$tw_link = furnihome_options()->getCpanelValue('social-share-tw');
	$gg_link = furnihome_options()->getCpanelValue('social-share-go');
?>
<?php if( is_front_page() || get_post_meta( get_the_ID(), 'page_mobile_enable', true )  || is_search()):?>
<header id="header" class="header header-mobile-style5">
	<div class="header-wrrapper clearfix">
		<div class="header-top-mobile">
			<div class="header-menu-categories pull-left">
				<div class="show_menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
				<?php if ( has_nav_menu('vertical_menu') ) {?>
					<div class="vertical_megamenu">
						<?php wp_nav_menu(array('theme_location' => 'vertical_menu', 'menu_class' => 'nav vertical-megamenu')); ?>
						<?php if( $fb_link != '' || $tw_link != '' || $gg_link != '' ): ?>
								<div class="furnihome-socials"><ul>
							<?php if( $fb_link != '' ): ?>
								<li><a href="<?php echo esc_url( $fb_link ) ?>" title="<?php echo esc_attr__( 'Facebook', 'furnihome' ) ?>"><i class="fa fa-facebook"></i></a></li>
							<?php endif; ?>
							
							<?php if( $tw_link != '' ): ?>
								<li><a href="<?php echo esc_url( $tw_link ) ?>" title="'<?php echo esc_attr__( 'Twitter', 'furnihome' ) ?>"><i class="fa fa-twitter"></i></a></li>
							<?php endif; ?>
							
							<?php if( $gg_link != '' ): ?>
								<li><a href="<?php echo esc_url( $gg_link ) ?> " title="<?php echo esc_attr__( 'Google', 'furnihome' ) ?>"><i class="fa fa-google-plus"></i></a></li>
							<?php endif; ?>
							</ul></div>
						<?php endif; ?>
					</div>
					<?php } ?>
			</div>
			<div class="furnihome-logo">
				<a  href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if( $furnihome_mobile_logo != '' ){ ?>
						<img src="<?php echo esc_url( $furnihome_mobile_logo ); ?>" alt="<?php bloginfo('name'); ?>"/>
					<?php }else{
						$logo = get_template_directory_uri().'/assets/img/logo-mobile5.png'; ?>
						<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo('name'); ?>"/>
					<?php } ?>					
				</a>				
			</div>
			<div class="header-right pull-right">
				<div class="search-mobile"></div>
				<div class="header-cart">
					<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id') ); ?>">
						<?php get_template_part( 'woocommerce/minicart-ajax-mobile' ); ?>
					</a>
				</div>
			</div>
			<div class="mobile-search">
				<div class="non-margin">
					<div class="widget-inner">
						<?php get_template_part( 'widgets/sw_top/searchcate' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<?php else : ?>
<!--  header page -->
<header id="header" class="header-page">
	<div class="header-shop clearfix">
		<div class="container">
			<div class="back-history"></div>
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php if ( has_nav_menu('vertical_menu') ) {?>
					<div class="vertical_megamenu vertical_megamenu_shop pull-right">
						<?php wp_nav_menu(array('theme_location' => 'vertical_menu', 'menu_class' => 'nav vertical-megamenu')); ?>
					</div>
			<?php } ?>
		</div>
	</div>
</header>
	<!-- End header -->
<?php endif; ?>