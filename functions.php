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
    $github_issue_title='?title='.get_the_title();
    $github_issue_body='&body=['.get_the_title().']('.get_permalink().') - Describe the issue/suggestion and improve the title. Please keep a link to the original article if relevant';
    $github_issue_labels='&labels=docs';
    $github_issue_full_url='https://github.com/diydrones/ardupilot-wiki-issue-tracker/issues/new'.$github_issue_title .$github_issue_body .$github_issue_labels;
    //Replace spaces, [, ] in url - not handled properly by esc_url()
    $github_issue_full_url=str_replace(' ', '%20', $github_issue_full_url);
    $github_issue_full_url=str_replace('[', '%5B', $github_issue_full_url);
    $github_issue_full_url=str_replace(']', '%5D', $github_issue_full_url);


    $github_issue_full_url_esc= esc_url( $github_issue_full_url,'https' );
    $custom_content = '<hr/><p>Questions, issues, and suggestions about this page can be raised on the 
          <a href="http://ardupilot.com/forum/">APM Forum</a>.  Issues and suggestions may be posted on the forums or the
          <a href="'.$github_issue_full_url_esc.'">Github Issue Tracker</a>.';
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
