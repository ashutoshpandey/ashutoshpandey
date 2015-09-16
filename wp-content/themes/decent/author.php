<?php
/**
 * Template for displaying author archive page.
 * 
 * @package Decent
 */
?>
<?php get_header() ?>
<div class="archive-meta-container">
    <div class="archive-head">
        <h1 class="page-title author"><?php _e('Author Archives', 'decent') ?></h1>
    </div>
    <div class="archive-description">
        <?php
        if ( have_posts() ) : the_post();
            if (get_the_author_meta('description')) :
                printf('%s', "<p>" . get_the_author_meta('description') . "</p>");
            else :
                printf(__('Archive of the posts written by author :', 'decent') . ' %s.', get_the_author());
            endif;
        endif;
        rewind_posts();
        ?>
    </div>
</div><!-- Archive Meta Container ends -->

<div id="content-section" class="content-section grid-col-16">
    <div class="inner-content-section">
        
              <?php if ( have_posts() ) : ?>


                    <div class="loop-container-section clearfix">

                        <?php
                            // Here starts the loop
                            while (have_posts()): the_post();
                                get_template_part('loop', 'archive');
                            endwhile;
                        ?>                

                    </div><!-- loop-container-section ends -->
                    
                    <?php decent_archive_nav() // Calls the 'Previous' and 'Next' Post Links ?>

              <?php else : ?>

                    <?php decent_404_show() // Function dedicated for handling empty queries. ?>

              <?php endif ?>

        
    </div><!-- inner-content-section ends -->
    
    <?php get_sidebar() ?>
    
</div><!-- Content-section ends here -->

<?php get_footer() ?>