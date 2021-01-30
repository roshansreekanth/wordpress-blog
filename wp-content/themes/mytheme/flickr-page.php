<?php 
/**
 * Template Name: Flickr Page
 */
?> 

<html>

    <?php get_header() ?>

    <?php
            $baseurl = "https://www.flickr.com/services/rest/";
            $method = "flickr.photos.search";
            $key = "c48e7b1c385ea0e2964e39cb20864360";
            $request = "$baseurl?api_key=$key&method=$method";
            $request .= "&per_page=10&tags=puppies,cats&tag_mode=all";
            $xml = simplexml_load_file ($request);
    ?>
        

    <body>

        <?php  get_sidebar(); ?>
        <h2>Flickr API (Tags: puppies, cats)</h2>
        <div class="gallery">
        <?php
            foreach ($xml->photos->photo as $photo)
            {
                echo "<div class = 'photo'>";
                echo "<a href = \"https://www.flickr.com/photos/";
                echo "{$photo['owner']}/{$photo['id']}\">";
                echo "<img src =\"https://farm{$photo['farm']}.static.flickr.com/";
                echo "{$photo['server']}/";
                echo "{$photo['id']}_{$photo['secret']}_s.jpg\">";
                echo "</a>";
                echo "</div>";
            }
        ?>
        </div>
        <div id = "postsnav"><?php posts_nav_link(); ?> </div>
        <?php get_footer();?>
    </body>
</html>