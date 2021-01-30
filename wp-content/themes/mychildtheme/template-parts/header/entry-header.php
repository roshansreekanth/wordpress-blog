<?php
/**
 * Displays the post header
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

$discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null; ?>

<div class="entry-date"><?php the_date()?></div>
<h3 class="main-title"><?php the_title(); ?></h3>

<?php if ( ! is_page() ) : ?>
<div class="entry-meta">
	<div class="author-details">By <?php twentynineteen_posted_by(); ?></div>
	<span class="comment-count">
		<?php
		if ( ! empty( $discussion ) ) {
			twentynineteen_discussion_avatars_list( $discussion->authors );
		}
		?>
	</span>
</div><!-- .entry-meta -->
<?php endif; ?>
