<html>

    <?php get_header() ?>

    <body>
        <?php  get_sidebar(); ?>
        
        <?php if(have_posts()) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    <h2><a href = "<?php the_permalink() ?>"><?php the_title() ?></a></h2>                
                    <div class = "author"><?php the_author_posts_link(); ?></div>
                    <p>(Being viewed as a page)</p>
                    <div class = "content"><?php the_content()?> </div>
                    <?php
                    $children = wp_list_pages( 'title_li=&child_of='.$post->ID.'&echo=0' );
                    if ( $children) : ?>
                        <p>Subpages:</p>
                        <ul>
                            <?php echo $children; ?>
                        </ul>
                    <?php endif; ?>

                </article>

            <?php endwhile; ?>

        <?php else : ?>
            <p>No Posts</p>
        <?php endif; ?>
        
        <div id = "postsnav"><?php posts_nav_link(); ?> </div>
        <?php get_footer();?>
    </body>
</html>