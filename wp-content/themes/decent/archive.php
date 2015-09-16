<?php
/**
 * Template for displaying archive page.
 * 
 * @package Decent
 */
?>
<?php get_header() ?>

<div class="archive-meta-container">
    <div class="archive-head">
        <h1><?php if (is_day()) : ?>
                <?php printf(__('Daily Archives:', 'decent') . ' %s', '<span>' . get_the_date() . '</span>'); ?>
            <?php elseif (is_month()) : ?>
                <?php printf(__('Monthly Archives:', 'decent') . ' %s', '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'decent')) . '</span>'); ?>
            <?php elseif (is_year()) : ?>
                <?php printf(__('Yearly Archives:', 'decent') . ' %s', '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'decent')) . '</span>'); ?>
            <?php else : ?>
                <?php _e('Blog Archives', 'decent'); ?>
            <?php endif; ?></h1>
    </div>
    <div class="archive-description">
        <?php printf('<p>' . __('Archive of posts published in the specified', 'decent') . ' %s</p>', decent_date_text()) ?>
    </div>
</div><!-- Archive Meta Container ends -->

<div id="content-section" class="content-section grid-col-16">
    <div class="inner-content-section">
        
        <?php if (have_posts()) : ?>

            
            <div class="loop-container-section clearfix">

                <?php
                    // Here starts the loop
                    while (have_posts()): the_post();
                        get_template_part('loop', 'archive');
                    endwhile;
                ?>                
                
            </div><!-- loop-container-section ends -->

            <?php decent_archive_nav() // Calls the 'Previous' and 'Next' Post Links.  ?>

        <?php else : ?>

            <?php decent_404_show() // Function dedicated for handling empty queries.  ?>

        <?php endif; ?>

    </div> <!-- inner-content-section ends here -->
    
    <?php get_sidebar() ?>
    
</div><!-- Content-section ends here -->

<?php get_footer() ?>