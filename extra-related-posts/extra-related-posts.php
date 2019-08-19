// placed into child theme functions.php
function usa_extra_get_post_related_posts() {
	$post_id = get_the_ID();
	$terms = get_the_terms( $post_id, 'category' );

	$term_ids = array();
	if ( is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			if ($term->term_id != 33) { $term_ids[] = $term->term_id; }  // do not use cat 33 which is giveaways
		}
	}

	$related_posts = new WP_Query( array(
		'tax_query'      => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $term_ids,
				'operator' => 'IN',
			),
		),
		'date_query' => array(
        array(
            'after'    => array(
                'year'  => 2017,
                'month' => 1,
                'day'   => 1,
            ),
        ),
    ),
		'post_type'      => 'post',
		'posts_per_page' => '4',
		'orderby'        => 'rand',
		'post__not_in'   => array( $post_id ),
	) );

	if ( $related_posts->have_posts() ) {
		return $related_posts;
	} else {
		return false;
	}
}
