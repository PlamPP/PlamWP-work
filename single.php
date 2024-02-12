<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PlamWP-work
 */

get_header();
?>
	<main id="primary" class="site-main">

<?php
/** 
 * Simple Social sharing (to "Facebook" and "X") for the current post.
*/
function plamwp_social_sharing_buttons() {
    // Get the current post URL
    $post_url = get_permalink();

    // Output the Facebook share and X buttons.
    echo '<a class="share facebook" href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode($post_url) . '" target="_blank">Share on Facebook</a>';
    echo '<a class="share x" href="https://www.x.com/intent/tweet?url=' . urlencode($post_url) . '" target="_blank">Share on X</a>';
	}
	add_action('the_post', 'plamwp_social_sharing_buttons');

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'plamwp-work' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'plamwp-work' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
