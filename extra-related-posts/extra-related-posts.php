// from wp-content/themes/Extra/includes/template-tags.php around line 1591
function extra_get_post_related_posts() {
	$post_id = get_the_ID();
	$terms = get_the_terms( $post_id, 'category' );

	$term_ids = array();
	if ( is_array( $terms ) ) {
		foreach ( $terms as $term ) {
			$term_ids[] = $term->term_id;
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
