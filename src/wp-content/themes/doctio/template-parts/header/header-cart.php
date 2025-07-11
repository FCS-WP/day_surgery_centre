<?php $header_cart = doctio_option('header_cart', true) ?>
<?php if(class_exists( 'WooCommerce' ) && $header_cart == true): ?>
	<li class="header-mini-cart">
		<a class="td-header-cart-url" href="<?php echo esc_url( wc_get_cart_url() );?>">
            <i class="flaticon-shopping-cart-1"></i>
            <span class="cart-product-count"><?php echo WC()->cart->get_cart_contents_count();?></span>
		</a>
	</li>
<?php endif; ?>
