<div class="row post-pagination">
	<div class="col-lg-12 text-center td-list-style">
		<?php
		the_posts_pagination(array(
			'next_text' => '<i class="flaticon-long-right-arrow"></i>',
			'prev_text' => '<i class="flaticon-long-right-arrow"></i>',
			'screen_reader_text' => ' ',
			'type'                => 'list'
		));
		?>
	</div>
</div>