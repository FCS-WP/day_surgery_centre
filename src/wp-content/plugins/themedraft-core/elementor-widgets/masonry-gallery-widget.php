<?php

namespace Elementor;

class ThemeDraft_Masonry_Gallery_Widget extends Widget_Base {

	public function get_name() {

		return "themedraft_filtarable_masonry";
	}

	public function get_title() {
		return __( "Masonry Gallery", "themedraft-core" );
	}

	public function get_icon() {

		return "eicon-gallery-grid";
	}

	public function get_categories() {
		return [ 'themedraft_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'masonry_items_section',
			[
				'label' => esc_html__( 'Masonry Images', 'themedraft-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		    'gallery_id',
		    [
		        'label'       => __( 'Gallery Id', 'themedraft-core' ),
		        'type'        => Controls_Manager::TEXT,
		        'description' => __( 'Unique id for gallery. Number Only. ( Usefull if you want to use multiple gallery on same page. )', 'themedraft-core' ),
		    ]
		);

		$this->add_control(
			'masonry_images',
			[
				'label' => __( 'Add Images', 'themedraft-core' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->end_controls_section();
	}

	//Render In HTML
	protected function render() {
		$settings = $this->get_settings_for_display();

		if($settings['gallery_id']){
			$grid_id   = $settings['gallery_id'];
        }else{
		    $grid_id   = '1';
        }
		?>

            <div class="col-xl-3"></div>

		<div class="td-masonry-items-main-container">
            <div class="container">
                <div class="row td-masonry-item-wrapper td-masonry-grid-<?php echo $grid_id ?>">
                    <?php if ( $settings['masonry_images'] ) {
                        $count = 0;
                        foreach ( $settings['masonry_images'] as $masonry_image ) {
                            $count++;
                            ?>
                            <div class="col-lg-6 col-md-6 p-0 single-td-masonry-item td-gallery-item-<?php echo $count?>">
                                <a class="td-popup-image" href="<?php echo $masonry_image['url']; ?>">
                                <div class="td-masonry-box td-cover-bg" style="background-image: url(<?php echo $masonry_image['url']; ?>)">
                                    <div class="td-masonry-overlay"></div>
                                    <div class="td-masonry-icon"><i class="flaticon-plus-1"></i></div>
                                </div>
                                </a>
                            </div>
                            <?php
                        }
                    } ?>
                </div>
            </div>
		</div>
		<script>
            jQuery(window).on('load',function ($) {
                jQuery(".td-masonry-grid-<?php echo $grid_id ?>").imagesLoaded(function () {
                    jQuery(".td-masonry-grid-<?php echo $grid_id ?>").isotope({
                        itemSelector: ".single-td-masonry-item",
                        percentPosition: true,
                        transitionDuration: '.8s',
                        masonry: {
                            columnWidth: 1
                        }
                    });
                });
            });
		</script>
		<?php
	}

	protected function content_template() { ?>
        <div class="td-masonry-items-main-container">
            <div class="container">

                <# if(settings.gallery_id){ grid_id = settings.gallery_id; #>
                <# }else{ grid_id = 1; #>
                <# } #>

                <div class="row td-masonry-item-wrapper td-masonry-grid-{{grid_id}}">

                    <# if(settings.masonry_images){ count = 0; #>

                    <# _.each( settings.masonry_images, function( item ) { count++; #>

                    <div class="col-lg-6 col-md-6 p-0 single-td-masonry-item td-gallery-item-{{count}}">
                        <a class="td-popup-image" href="{{item.url}}">
                            <div class="td-masonry-box td-cover-bg" style="background-image: url({{item.url}})">
                                <div class="td-masonry-overlay"></div>
                                <div class="td-masonry-icon"><i class="flaticon-plus-1"></i></div>
                            </div>
                        </a>
                    </div>

                    <# }); #>

                    <# } #>
                </div>
            </div>
        </div>
        <script>
            jQuery(window).on('load',function ($) {
                jQuery(".td-masonry-grid-{{{grid_id}}}").imagesLoaded(function () {
                    jQuery(".td-masonry-grid-{{{grid_id}}}").isotope({
                        itemSelector: ".single-td-masonry-item",
                        percentPosition: true,
                        transitionDuration: '.8s',
                        masonry: {
                            columnWidth: 1
                        }
                    });
                });
            });
        </script>
<?php

    }
}

Plugin::instance()->widgets_manager->register( new ThemeDraft_Masonry_Gallery_Widget );