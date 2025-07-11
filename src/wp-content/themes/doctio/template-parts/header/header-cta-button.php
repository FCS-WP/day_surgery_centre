<?php
$header_cta = doctio_option('header_cta_btn');
?>

<?php if($header_cta['cta_btn_text']) : ?>
<li class="header-cta-button">
	<a class="td-button" href="<?php echo esc_url($header_cta['cta_btn_url']);?>"><?php echo esc_html($header_cta['cta_btn_text']);?> <i class="fas fa-plus"></i></a>
</li>
<?php endif; ?>