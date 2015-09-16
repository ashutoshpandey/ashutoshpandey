<?php
/*
 * Template for displaying Search Form.
 * 
 * @package Decent
 */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="search-box clearfix">
        <input type="text" value="" name="s" id="s" placeholder="<?php _e('Search...', 'decent') ?>" />
        <input type="submit" id="searchsubmit" value="<?php _e('Go', 'decent') ?>" />
    </div>
</form>