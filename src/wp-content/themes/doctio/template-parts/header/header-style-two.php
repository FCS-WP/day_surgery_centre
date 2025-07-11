<?php
$enable_header_top = doctio_option('enable_header_top', true);
$sticky_header    = doctio_option( 'sticky_header', true );

?>
<?php if($enable_header_top == true) : ?>
<div class="header-top-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8 col-lg-7 col-12">
		        <?php get_template_part( 'template-parts/header/header-top-information' );?>
            </div>

            <div class="col-xl-4 col-lg-5 col-12">
	            <?php get_template_part( 'template-parts/header/header-top-social' );?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="main-menu-area" <?php if($sticky_header == true ){echo 'data-uk-sticky="top: 250; animation: uk-animation-slide-top;"';} ?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-sm-3 col-6">
				<?php get_template_part( 'template-parts/header/header-logo' ); ?>
            </div>

            <div class="col-lg-10 col-sm-9 col-6">
                <div class="header-nav-and-buttons">
                    <div class="header-navigation-area">
						<?php get_template_part( 'template-parts/header/header-menu' );?>
                    </div>
                    <div class="header-buttons-area">
                        <ul class="header-buttons-wrapper td-list-style">
	                        <?php get_template_part( 'template-parts/header/header-search' );?>
	                        <?php get_template_part( 'template-parts/header/header-cart' );?>
	                        <?php get_template_part( 'template-parts/header/header-cta-button' );?>
                            <li class="mobile-menu-trigger"><span></span><span></span><span></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>