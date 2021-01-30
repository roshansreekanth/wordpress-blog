<html>

    <?php get_header() ?>

    <body>
        <?php  get_sidebar(); ?>

        <div class="author-image"><img src = "<?php echo get_template_directory_uri(); ?>/john-smith.jpg"></div>

        <?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
        <h1 id="john-smith-text">This is <?php echo $curauth->nickname; ?>'s page</h1>

        <?php if(have_posts()) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <article>

                <h2><a href = "<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                <div class = "author"><a href = "<?php the_author_link() ?>"><?php the_author_link(); ?></a></div>
                <div class = "date"><?php the_date() ?> </div>
                <div class = "content"><?php the_content()?> </div>
                <div>
                    <p>Subpages</p>
                    <ul class="subpages">
                        <?php
                        wp_list_pages( array(
                            'title_li'    => '',
                            'child_of'    => $post->ID,
                            'show_date'   => 'modified',
                            'date_format' => $date_format
                        ) );
                        ?>
                    </ul>
                </div>
                <div class = "category"><?php the_category(", ") ?> </div>
                <div id = "links">
                <div class = "previous"><?php previous_post_link() ?> </div>
                <div class="next"><?php next_post_link() ?> </div>
                </div>
                </article>

            <?php endwhile; ?>

        <?php else : ?>
            <p>No Posts</p>
        <?php endif; ?>
        
        <div id = "postsnav"><?php posts_nav_link(); ?> </div>
        <?php get_footer();?>
    </body>
</html>