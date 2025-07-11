<?php
// Video Post Meta
$doctio_video_post_meta = 'video_post_format_meta';

CSF::createMetabox( $doctio_video_post_meta, array(
	'title'        => esc_html__('Video Post Format Options', 'doctio' ),
	'post_type'    => 'post',
	'post_formats' => array('video'),
) );

CSF::createSection( $doctio_video_post_meta, array(
	'fields' => array(

		array(
			'id'    => 'post_video_url',
			'type'  => 'text',
			'title' => esc_html__('Video URL', 'doctio' ),
			'desc'    => esc_html__( 'Paste video URL here', 'doctio' ),
		),

	)
));

// Audio Post Meta
$doctio_audio_post_meta = 'audio_post_format_meta';

CSF::createMetabox( $doctio_audio_post_meta, array(
	'title'        => esc_html__('Audio Post Format Options', 'doctio' ),
	'post_type'    => 'post',
	'post_formats' => array('audio'),
) );

CSF::createSection( $doctio_audio_post_meta, array(
	'fields' => array(

		array(
			'id'    => 'audio_embed_code',
			'type'  => 'code_editor',
			'settings' => array(
				'theme'  => 'monokai',
				'mode'   => 'htmlmixed',
			),
			'title' => esc_html__('Audio Embed Code', 'doctio' ),
			'desc'    => esc_html__( 'Paste sound cloud audio embed code here', 'doctio' ),
		),

	)
));


// Gallery Post Meta
$doctio_gallery_post_meta = 'gallery_post_format_meta';

CSF::createMetabox( $doctio_gallery_post_meta, array(
	'title'        => esc_html__('Gallery Post Format Options', 'doctio' ),
	'post_type'    => 'post',
	'post_formats' => array('gallery'),
) );

CSF::createSection( $doctio_gallery_post_meta, array(
	'fields' => array(

		array(
			'id'          => 'post_gallery_images',
			'type'        => 'gallery',
			'title' => esc_html__('Gallery Images', 'doctio' ),
			'add_title'   => esc_html__('Upload Gallery Images', 'doctio'),
			'edit_title'  => esc_html__('Edit Gallery Images', 'doctio'),
			'clear_title' => esc_html__('Remove Gallery Images', 'doctio'),
			'desc'    => esc_html__( 'Upload gallery images from here', 'doctio' ),
		),

	)
));