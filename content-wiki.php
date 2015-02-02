<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<!-- #HW content-wiki.php from child theme  -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfourteen_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
		</div>
		<?php
			endif;

			if ( is_single() ) :
if ( 'wiki' == get_post_type() ) { echo '<!-- #HW is a wiki page  -->';}
?>
<div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<?php

/* Strip 'common-' from the title and record if is a common page */
$stripped_title=get_the_title();
$this_is_common_page=false;
if (0 === strpos($stripped_title, 'common-')) {
    // It starts with 'common-'
    $this_is_common_page=true;
    $stripped_title=substr($stripped_title, 7); //strip common- from title
  } 

                                echo '<h1 class="entry-title">'.$stripped_title.'</h1>';
				/* the_title( '<h1 class="entry-title">', '</h1>' ); */
			else :
				echo  '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'.$stripped_title.'</a></h1>';
				/* the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); */
			endif;
		?>




		<div class="entry-meta">
			<?php
				if ( 'post' == get_post_type() )
					twentyfourteen_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
				endif;

/* Add note about common wiki articles in other wikis
 - if this is a common wiki article
 - that can be edited
 - that is not in planner wiki */
if(current_user_can('edit_posts')) {
  if (!(0 === strpos(get_blog_details()->domain, 'planner.')) AND ($this_is_common_page==true) ) {
    echo '<div class="warning-common-page"><!-- defined in theme -->EDITORS: This is a MissionPlanner common page - <a href="http://planner.ardupilot.com/wiki/'.$post->post_name.'">Edit original only</a> in APM MissionPlanner Wiki.</div>';
  }
  else {
    edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
  }
}


/*
				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );  */
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
