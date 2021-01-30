<head>
        <title><?php bloginfo('name'); ?></title>

        <h1>
            <a href = "<?php echo get_home_url(); ?>">
            <?php bloginfo('name'); ?>
            </a>
        </h1>
        
        <p><?php bloginfo('description'); ?> </p>
        
        <nav><ul id = "pages"><?php wp_nav_menu("depth=1"); ?></ul></nav>
        <div class="search"><?php echo get_search_form(); ?></div>

        <?php wp_head();?>
</head>
