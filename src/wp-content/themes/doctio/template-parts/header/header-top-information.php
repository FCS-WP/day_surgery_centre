<?php
$top_info_text = doctio_option('header_top_info_text');
$top_info_icon = doctio_option('top_info_icon');
?>
<?php if(is_array($top_info_text)) : ?>
<div class="header-top-info">
	<ul class="td-list-style td-list-inline">
		<?php foreach ($top_info_text as $top_info) : ?>
			<li class="top-info-item">
                <i class="<?php echo esc_attr($top_info['top_info_icon']);?>"></i>
				<?php echo wp_kses( $top_info['info_text'], doctio_allow_html() );?>
			</li>
		<?php endforeach;?>
	</ul>
</div>
<?php endif; ?>
