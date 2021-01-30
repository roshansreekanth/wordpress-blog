<?php

    function enqueue_parent_styles()
    {
        wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    }
    
    add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

    if(!function_exists(twentynineteen_posted_by))
    { 
        function twentynineteen_posted_by() {
            printf(
                /* translators: 1: SVG icon. 2: Post author, only visible to screen readers. 3: Author link. */
                '<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
                twentynineteen_get_icon_svg( '', 16 ),
                __( 'Posted by', 'twentynineteen' ),
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_html( get_the_author() )
            );
        }
    }

    if ( ! function_exists( 'twentynineteen_entry_footer' ) ) :
        /**
         * Prints HTML with meta information for the categories, tags and comments.
         */
        function twentynineteen_entry_footer() {
    
            // Hide author, post date, category and tag text for pages.
            if ( 'post' === get_post_type() ) {
    
                /* translators: Used between list items, there is a space after the comma. */
                $categories_list = get_the_category_list( __( ', ', 'twentynineteen' ) );
                if ( $categories_list ) {
                    printf(
                        /* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of categories. */
                        ' <script>function myFunction() {var x = document.getElementById("moreDetails");if (x.style.display === "block") {x.style.display = "none";} else {x.style.display = "block";}}</script>
                      <p><button onClick="myFunction()">Show More...</button></p><div id="moreDetails"><span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
                        twentynineteen_get_icon_svg( 'archive', 16 ),
                        __( 'Posted in', 'twentynineteen' ),
                        $categories_list
                    ); // WPCS: XSS OK.
                }
    
                /* translators: Used between list items, there is a space after the comma. */
                $tags_list = get_the_tag_list( '', __( ', ', 'twentynineteen' ) );
                if ( $tags_list && ! is_wp_error( $tags_list ) ) {
                    printf(
                        /* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of tags. */
                        '<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span></div>',
                        twentynineteen_get_icon_svg( 'tag', 16 ),
                        __( 'Tags:', 'twentynineteen' ),
                        $tags_list
                    ); // WPCS: XSS OK.
                }
            }
    
            // Comment count.
            if ( ! is_singular() ) {
                twentynineteen_comment_count();
            }
    
            // Edit post link.
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Post title. Only visible to screen readers. */
                        __( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
                '</span>'
            );
        }
    endif;
         


