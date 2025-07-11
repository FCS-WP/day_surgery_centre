<?php
$sticky_header    = doctio_option( 'sticky_header', true );

?>

<div class="header-top-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-2 col-lg-0 header-three-large-logo">
	            <?php get_template_part( 'template-parts/header/header-logo' ); ?>
            </div>

            <div class="col-xl-10 col-lg-12 col-md-12">
				<div class="header-three-info-and-cta">
					<?php get_template_part( 'template-parts/header/header-top-information' );?>
                    <div class="header-three-cta-button">
                        <ul class="td-list-style td-list-inline">
							<?php get_template_part( 'template-parts/header/header-cta-button' );?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main-menu-area" <?php if($sticky_header == true ){echo 'data-uk-sticky="top: 250; animation: uk-animation-slide-top;"';} ?>>
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="header-style-three-menu-area-wrapper">
                    <div class="header-style-three-menu-area">
                        <div class="row align-items-center">
                            <div class="col-xl-0 col-lg-3 col-sm-3 col-6 header-three-small-logo">
                                <?php get_template_part( 'template-parts/header/header-logo' ); ?>
                            </div>

                            <div class="col-xl-12 col-lg-9 col-sm-9 col-6">
                                <div class="header-three-nav">
                                    <div class="header-nav-and-buttons">
                                        <div class="header-navigation-area">
                                            <?php get_template_part( 'template-parts/header/header-menu' );?>
                                        </div>
                                        <div class="header-buttons-area">
                                            <ul class="header-buttons-wrapper td-list-style">
                                                <?php get_template_part( 'template-parts/header/header-search' );?>
                                                <?php get_template_part( 'template-parts/header/header-cart' );?>
                                                <li class="mobile-menu-trigger"><span></span><span></span><span></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>