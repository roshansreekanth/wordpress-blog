<html>

    <?php get_header() ?>

    <body>
        <?php  get_sidebar(); ?>
        
        <?php if(have_posts()) : ?>

            <?php while ( have_posts() ) : the_post(); ?>
                <article>

                <h2><a href = "<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                <div class = "author"><?php the_author_posts_link(); ?></div>
                <div class = "date"><?php the_date() ?> </div>
                <div class = "excerpt"><?php the_content(); ?> </div>
                <div class = "category"><?php the_category(", ") ?> </div>
                </article>

            <?php endwhile; ?>

        <?php else : ?>
            <p>No Posts</p>
        <?php endif; ?>
        
        <div id = "postsnav"><?php posts_nav_link(); ?> </div>
        <?php get_footer();?>
    </body>
</html>