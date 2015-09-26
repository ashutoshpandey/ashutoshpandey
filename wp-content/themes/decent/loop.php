<?php
/*
 * Template for displaying the loop
 * 
 * @package Decent
 */
?>

<div class="loop-section-col grid-col-15">
    <div class="loop-section">
        <div id="post-<?php the_ID() ?>" <?php post_class() ?>>
             <div class="loop-post-title">

                 <div class="loop-stylish-date">
                     <div class="loop-stylish-date-month">
                        <?php echo get_the_time('M') ?>
                     </div>
                     <div class="loop-stylish-date-num">
                        <?php echo get_the_time('j') ?>
                     </div>
                 </div>

                  <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo __('Permalink to', 'decent'). ' ' ?><?php the_title_attribute() ?>"><?php the_title() ?></a></h1>

<!--                <div class="loop-post-meta">-->
<!--                     <span>--><?php //_e('Written on', 'decent') ?><!-- </span><span class="loop-meta-date">--><?php //echo get_the_time('M, d, Y') ?><!--</span>-->
<!--                     <span>--><?php //_e('by', 'decent') ?><!-- </span><span class="loop-meta-author">--><?php //the_author_posts_link() ?><!--</span>-->
<!--                     <span class="loop-meta-comments"> | --><?php //comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'No Comments'); ?><!--</span>-->
<!--                </div>-->

                 <div class="loop-post-meta">
                     <span><?php _e('Written on', 'decent') ?> </span><span class="loop-meta-date"><?php echo get_the_time('M, d, Y') ?></span>
                 </div>
             </div>

             <div class="loop-post-excerpt clearfix">
                  <?php if ( has_post_thumbnail() ) { ?>
                    <div class="loop-post-text grid-col-16">
                        <div class="loop-thumbnail"><?php the_post_thumbnail( 'decentThumb' ) ?></div>
                        <?php the_excerpt() ?>
                        <div class="read-more"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php _e('Read more', 'decent') ?></a></div>
                    </div>
                  <?php } else { ?>
                  <div class="loop-post-text grid-col-16">
                      <?php the_excerpt() ?>
                      <div class="read-more"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php _e('Read more', 'decent') ?></a></div>
                  </div>
                  <?php } ?>
                  <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'decent') . '</span>', 'after' => '</div>')) ?>
             </div>

        </div>
    </div>
</div>