<?php
/**
 * Template for displaying category archive posts.
 * 
 * @package Decent
 */
?>
<?php get_header() ?>
<div class="archive-meta-container">
    <div class="archive-head">
        <h1><?php _e('Category Archives', 'decent') ?></h1>
    </div>
    <div class="archive-description">
        <?php
        $decent_category_description = term_description();
        if (!empty($decent_category_description)) {
            echo '<span>' . $decent_category_description . '</span>';
        } else {
            printf(__('Archive of posts published in the category:', 'decent') . ' %s', single_cat_title('', false));
        }
        ?>
    </div>

</div><!-- Archive Meta Container ends -->


<div id="content-section" class="content-section grid-col-16">
    <div class="inner-content-section">

            <?php if( have_posts() ) : ?>

                    <div class="loop-container-section clearfix">

                        <?php
                            // Here starts the loop
                            while (have_posts()): the_post();
                                get_template_part('loop', 'archive');
                            endwhile;
                        ?>                

                    </div><!-- loop-container-section ends -->
					
                    <?php decent_archive_nav() // Calls the 'Previous' and 'Next' Post Links. ?>

              <?php else : ?>

                    <?php decent_404_show() // Function dedicated for handling empty queries. ?>

              <?php endif;?>
                    
    </div><!-- inner-content-section ends -->
    
    <?php get_sidebar() ?>
    
</div><!-- Content-section ends here -->

<?php get_footer() ?>