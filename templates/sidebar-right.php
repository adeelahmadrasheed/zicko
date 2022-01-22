<?php if ( is_active_sidebar('right') ):
	$furnihome_right_span_class = 'col-lg-'.furnihome_options()->getCpanelValue('sidebar_right_expand');
	$furnihome_right_span_class .= ' col-md-'.furnihome_options()->getCpanelValue('sidebar_right_expand_md');
	$furnihome_right_span_class .= ' col-sm-'.furnihome_options()->getCpanelValue('sidebar_right_expand_sm');
?>
<aside id="right" class="sidebar <?php echo esc_attr($furnihome_right_span_class); ?>">
	<?php dynamic_sidebar('right'); ?>
</aside>
<?php endif; ?>