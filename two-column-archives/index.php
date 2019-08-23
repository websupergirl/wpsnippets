<?php get_header(); ?>

	<main role="main">
		<!-- section -->
        <section class="bg-notes border-top-green" id="intro">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h1 class="half-border">Blog</h1>
					</div>
				</div>
			</div>
		</section>
		
		<section id="list">
			<div class="container">
				<div class="row">
<?php 
	$current_count = 1; 
	$total_count = get_option('posts_per_page');
	if ($total_count > $wp_the_query->post_count ) { $total_count = $wp_the_query->post_count; }
	$halfway = ceil($total_count / 2);
	if (have_posts()): while (have_posts()) : the_post();
	if ( ( $current_count == 1 ) || ( $current_count == $halfway + 1 )) { echo '<div class="col-xs-12 col-lg-6"><div class="text-wrapper">'; } 
?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<!-- post thumbnail -->
						<?php if ( has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'archive-thumb', array( 'class' => 'alignleft' ) ); ?></a>
						<?php endif; ?>
						<!-- /post thumbnail -->

						<!-- post title -->
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<!-- /post title -->

						<!-- post details -->
						<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span> | <span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
						<!-- /post details -->

						<?php html5wp_excerpt('html5wp_index');	?>

					</article>
					<!-- /article -->
					
<?php 
	if (( $current_count == $halfway ) || ( $current_count == $total_count )) { echo '</div></div>'; }
	$current_count++;
	endwhile;
	else: 
?>
					<div class="col-xs-12 col-lg-12">
						<div class="text-wrapper">
							<!-- article -->
							<article>
								<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
							</article>
							<!-- /article -->
						</div>
					</div>
<?php endif; ?>
                    
					<!-- pagination -->
					<div class="col-xs-12 col-lg-12">
						<div class="text-wrapper">
							<div class="pagination">
								<?php html5wp_pagination(); ?>
							</div>
						</div>
					</div>
					<!-- /pagination -->

				</div>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>