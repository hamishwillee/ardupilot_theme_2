<?php
/* Add style to the pages */

function theme_enqueue_styles() {
    wp_enqueue_style( 'the-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'the-light-theme', get_stylesheet_directory_uri() . '/light-theme.css' );
  /*  wp_enqueue_style( 'the-child-style', get_stylesheet_uri(), array( 'parent-style' ) ); */
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

?>
<?php
/* add  request for feedback to bottom of content for wiki pages only */
function theme_filter_add_any_questions_text_after_the_content( $content ) {
    $custom_content = '<hr/><p>Questions about this page? Comments? Suggestions? Post to <a href="http://ardupilot.com/forum/">APM Forum</a>! Use the platform specific to your query, and make sure to include the name of the page you are referring to.';
    if ('wiki' == get_post_type() ) {
     $custom_content = $content.$custom_content;
     return  $custom_content;
    }
    else {
          return $content;
    }
}


add_filter( 'the_content', 'theme_filter_add_any_questions_text_after_the_content' );


?>
