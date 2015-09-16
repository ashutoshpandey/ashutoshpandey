<?php
/*
 * Template for displaying footer.
 * 
 * @package Decent
 */
?>
<?php get_sidebar('footer') ?>

            <div class="footer-bg-section grid-col-16 clearfix">
                <div id="footer-section" class="footer-section grid-col-16">
                        <div id="copyright" class="copyright"><?php _e( 'Copyright', 'decent' ) ?> <?php echo date( 'Y' ) ?> | <?php _e( 'Powered by', 'decent' ) ?> <a href="http://www.wordpress.org">WordPress</a> | <?php _e( 'Decent theme by', 'decent' ) ?> <a href="http://www.mudthemes.com/" target="_blank">mudThemes</a></div>
                        <?php  decent_social_section_show() ?>
                </div>
            </div>
        </div><!-- wrapper ends -->
    </div><!-- parent-wrapper ends -->
    <?php wp_footer(); ?>
</body>
</html>