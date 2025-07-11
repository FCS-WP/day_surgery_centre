<?php

function doctio_comment_form($doctio_comment_form_fields){

	$doctio_comment_form_fields['author'] = '
        <div class="row comment-form-wrap">
        <div class="col-lg-6">
            <div class="form-group td-comment-input">
                <input type="text" name="author" id="name-cmt" placeholder="'.esc_attr__('Name*', 'doctio').'">
                <i class="far fa-user"></i>
            </div>
        </div>
    ';

	$doctio_comment_form_fields['email'] =  '
        <div class="col-lg-6">
            <div class="form-group td-comment-input">
                <input type="email" name="email" id="email-cmt" placeholder="'.esc_attr__('Email*', 'doctio').'">
                <i class="far fa-envelope"></i>
            </div>
        </div>
    ';

	$doctio_comment_form_fields['url'] = '
        <div class="col-lg-12">
            <div class="form-group td-comment-input">
                <input type="text" name="url" id="website-cmt"  placeholder="'.esc_attr__('Website', 'doctio').'">
                <i class="fas fa-globe-europe"></i>
            </div>
        </div>
        </div>
        
    ';

	return $doctio_comment_form_fields;
}

add_filter('comment_form_default_fields', 'doctio_comment_form');

function doctio_comment_default_form($default_form){

	$default_form['comment_field'] = '
        <div class="row">
            <div class="col-sm-12">
                <div class="comment-message td-comment-input">
                    <textarea name="comment" id="message-cmt" rows="5" required="required"  placeholder="'.esc_attr__('Your Comment*', 'doctio').'"></textarea>
                    <i class="fas fa-pencil-alt"></i>
                </div>
            </div>
        </div>
    ';

	$default_form['submit_button'] = '
        <button type="submit" class="td-button">'.esc_html__('Post Comment', 'doctio').'<i class="fas fa-plus"></i></button>
    ';

	$default_form['comment_notes_before'] = esc_html__('All fields marked with an asterisk (*) are required', 'doctio' );
	$default_form['title_reply'] = esc_html__('Leave A Comment', 'doctio');
	$default_form['title_reply_before'] = '<h4 class="comments-heading">';
	$default_form['title_reply_after'] = '</h4>';

	return $default_form;
}

add_filter('comment_form_defaults', 'doctio_comment_default_form');


function doctio_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'doctio_move_comment_field_to_bottom' );