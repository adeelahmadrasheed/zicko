<?php if( !furnihome_options()->getCpanelValue( 'disable_search' ) ) : ?>
<div class="top-form top-search">
	<div class="topsearch-entry">
		<?php get_template_part('templates/searchform'); ?>
	</div>
</div>
<?php endif; ?>