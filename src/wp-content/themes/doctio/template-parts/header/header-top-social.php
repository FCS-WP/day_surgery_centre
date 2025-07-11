<?php
$top_social = doctio_option('header_top_socials');
$top_hotline_number = doctio_option('top_hotline_number');
?>
<div class="header-top-social-icon">
	<ul class="td-list-style td-list-inline">
		<?php if(is_array($top_social)) :
			foreach ($top_social as $socialSite) : ?>
				<li>
					<a href="<?php echo esc_url($socialSite['profile_url']);?>" target="_blank">
						<i class="<?php echo esc_attr($socialSite['icon']);?>"></i>
					</a>
				</li>
			<?php endforeach;
		endif; ?>

        <?php if ($top_hotline_number) : ?>
            <li class="top-info-item">
		        <?php echo wp_kses( $top_hotline_number, doctio_allow_html() );?>
            </li>
        <?php endif; ?>
	</ul>
</div>