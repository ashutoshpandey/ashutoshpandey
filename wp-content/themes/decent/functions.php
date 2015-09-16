<?php
/**
 * Decent Theme functions and definitions
 * 
 * @package Decent
 * @since 1.0
 */


/**
 * Global JS Directory URL
 * 
 * @since 1.0.0
 */
define('DECENT_GLOBAL_JS_URL', get_template_directory_uri() . '/assets/global/js/');

/**
 * Global Images Directory URL
 * 
 * @since 1.0.0
 */
define('DECENT_GLOBAL_IMAGES_URL', get_template_directory_uri() . '/assets/global/images/');

/**
 * Global CSS Directory URL
 * 
 * @since 1.0.0
 */
define('DECENT_GLOBAL_CSS_URL', get_template_directory_uri() . '/assets/global/css/');

/**
 * Includes Directory
 * 
 * @since 1.0.0
 */
define('DECENT_INCLUDES_DIR' , get_template_directory() . '/includes/' );


// Include Customizer Options
require_once DECENT_INCLUDES_DIR . 'customizer.php';


/**
 * Sets up theme defaults and registers support for various theme features
 * 
 * @since 1.0
 */
function decent_setup() {
    
    global $content_width;
    
    /**
     * Primary content width according to the design and stylesheet.
     */
    if ( ! isset( $content_width ) ) { $content_width = 660; }
    
    /**
     * Makes decent Theme ready for translation.
     * Translations can be filed in the /languages/ directory
     */
    load_theme_textdomain('decent', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to head.
     */
    add_theme_support('automatic-feed-links');
    
    /**
     * Add custom background.
     * @todo Put E7E7E7 in a variable and then change it according to the skin
     */
    add_theme_support('custom-background', array('default-color' => 'E7E7E7'));
    
    /**
     * Adds supports for Theme menu.
     * Decent uses wp_nav_menu() in a single location to diaplay one single menu.
     */
    register_nav_menu('primary', 'Primary Menu');

    /**
     * Add support for Post Thumbnails.
     * Defines a custom name and size for Thumbnails to be used in the theme.
     *
     * Note: In order to use the default theme thumbnail, add_image_size() must be removed
     * and 'decentThumb' value must be removed from the_post_thumbnail in the loop file.
     */
    add_theme_support('post-thumbnails');
    add_image_size('decentThumb', 212, 0, true);
}
add_action( 'after_setup_theme', 'decent_setup' );



/**
 * Defines menu values and call the menu itself.
 * The menu is registered using register_nav_menu function in the theme setup.
 * 
 * @since 1.0
 */
function decent_nav() {
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_id' => 'menu',
        'menu_class' => 'sf-menu decent_menu',
        'menu_id' => 'decent_menu',
        'fallback_cb' => 'decent_nav_fallback' // Fallback function in case no menu item is defined.
    ));
}



/**
 * Displays a custom menu in case either no menu is selected or
 * menu does not contains any items or wp_nav_menu() is unavailable.
 * 
 * @since 1.0
 */
function decent_nav_fallback() {
?>
    <div id="menu">
    	<ul class="sf-menu" id="decent_menu">
			<?php
            	wp_list_pages( 'title_li=&sort_column=menu_order&depth=3');
            ?>
        </ul>
    </div>
<?php
}



/**
 * Register sidebars one at right and three footer sidebars in a box.
 * 
 * @since 1.0
 */
function decent_sidebars() {

    // Primary Sidebar
    register_sidebar(array(
        'name' => __('Right Sidebar', 'decent'),
        'id' => 'right_sidebar',
        'description' => __('Right Sidebar', 'decent'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #1
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #1', 'decent'),
        'id' => 'footerbox_sidebar_1',
        'description' => __('Footerbox Sidebar #1', 'decent'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #2
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #2', 'decent'),
        'id' => 'footerbox_sidebar_2',
        'description' => __('Footerbox Sidebar #2', 'decent'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #3
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #3', 'decent'),
        'id' => 'footerbox_sidebar_3',
        'description' => __('Footerbox Sidebar #3', 'decent'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Top Sidebar
    /*
    register_sidebar(array(
        'name' => __('Top Sidebar', 'decent'),
        'id' => 'top_sidebar',
        'description' => __('Top Sidebar', 'decent'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
     */
    
}
add_action( 'widgets_init', 'decent_sidebars' );



/**
 * Enqueue CSS and JS files
 * 
 * @since 1.0
 */
function decent_enqueue() {
    global $decent_version;
    
    decent_enqueue_font();
    
    wp_enqueue_style('decent-font-awesome', DECENT_GLOBAL_CSS_URL . 'font-awesome.4.1.0.css');
    wp_enqueue_style('decent-stylesheet', get_stylesheet_uri(), false, $decent_version, 'all' );
    
    // Enqueue (comment-reply )Javascript in case of threaded comments.
    if (is_singular() && comments_open() && get_option('thread_comments')) :
        wp_enqueue_script('comment-reply');
    endif;
    
    wp_enqueue_script('decent-superfish', DECENT_GLOBAL_JS_URL . 'superfish.min.js', array( 'jquery' ), '1.4.8', true);
    wp_enqueue_script('jquery-color');
    wp_enqueue_script('decent-custom', DECENT_GLOBAL_JS_URL . 'custom.js', array( 'jquery' ), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'decent_enqueue');



/**
 * Enqueues Google Font
 * 
 * @since 1.0.0
 */
function decent_enqueue_font() {
    wp_enqueue_style('google-fonts-Lato', '//fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic', false, null, 'all');
    wp_enqueue_style('google-fonts-Open+Sans', '//fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic', false, null, 'all');
}



/**
 * Hooks respond.js for IE in the wp_head hook.
 * 
 * @since 1.0
 */
function decent_enqueue_ie_script() {
    echo "\n";
    ?><!--[if lt IE 9]><script type='text/javascript' src='<?php echo DECENT_GLOBAL_JS_URL ?>respond.js?ver=1.4.2'></script><![endif]--><?php
    echo "\n";
}
add_action('wp_head', 'decent_enqueue_ie_script', 100);



/**
 * Defines the number of characters for post excerpts
 * and is added to excerpt_length filter.
 * 
 * @since 1.0
 */
function decent_excerpt_length( $length ) {
	return 43;
}
add_filter( 'excerpt_length', 'decent_excerpt_length' );



/**
 * Defines the text for the (read more) link for post excerpts
 * and is added to excerpt_more filter.
 * 
 * @since 1.0
 */
function decent_auto_excerpt_more( $more ) {
	return '&#8230;' ;
}
add_filter( 'excerpt_more', 'decent_auto_excerpt_more' );



/**
 * Modifies the default title of the blog and is hooked to wp_title filter.
 * 
 * @since 1.0
 */
function decent_modify_title( $title, $sep ) {
    
    global $page, $paged;

    if (is_feed())
        return $title;

    // Add the blog name
    $title .= get_bloginfo('name', 'display');

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title .= " $sep $site_description";

    // Add a page number if necessary:
    if ($paged >= 2 || $page >= 2)
        $title .= " $sep " . sprintf(__('Page', 'decent') . ' %s', max($paged, $page));

    return $title;
}
add_filter( 'wp_title', 'decent_modify_title', 10, 2 );



/**
 * Used to return body classes
 * 
 * @param array $classes
 * @return array
 * @since 1.0
 */
function decent_body_class($classes) {
    
    if(is_single()):
        
        $classes[] = 'single-template';
        $classes[] = 'post-template';
    
    elseif(is_page()):
        
        $classes[] = 'page-template';
        $classes[] = 'post-template';

    elseif(is_front_page()):
        
        $classes[] = 'home-template';
    
    elseif(is_home()):
        
        $classes[] = 'home-template';
        $classes[] = 'blog-template';
    
    elseif (is_archive()):
        
        $classes[] = 'archive-template';
    
    elseif(is_404()):
        
        $classes[] = 'archive-template';
        $classes[] = 'empty-template';
    
    elseif(is_search()):
        
        $classes[] = 'archive-template';
        $classes[] = 'search-template';
    
    endif;

        $classes[] = 'orange';
        $classes[] = 'right_sidebar';
        $classes[] = 'theme-wide';
        $classes[] = 'thumbnail-left';
    
    return $classes;
}
add_filter('body_class', 'decent_body_class');



/**
 * Returns social icons individually
 * 
 * @param string $option Name of option in DB
 * @param string $title
 * @param string $icon Name of icon as in mdf-[icon]
 * @return string
 * 
 * @since 1.0.0
 */
function decent_get_social_section_individual_icon($option, $title, $icon) {
    $output = '';

    if(decent_get_option($option)){
        $output .= '<a href="'.esc_url(decent_get_option($option)).'" title="'.esc_attr($title).'" target="_blank"><i class="mdf mdf-'.esc_attr($icon).'"></i></a>';
    }
    return $output;
    
}



/**
 * Used to display social section
 * 
 * @since 1.0
 */
function decent_social_section_show() {
    
    if(!decent_get_option('disable_social_section')):

    $output = false;
    
    $output .= decent_get_social_section_individual_icon('facebook', 'Facebook', 'facebook');
    $output .= decent_get_social_section_individual_icon('twitter', 'Twitter', 'twitter');
    $output .= decent_get_social_section_individual_icon('rss', 'RSS feed', 'rss');
    
    ?>            
                
                <?php if($output !== false): ?>
                <div id="social-section" class="social-section">
                    <?php echo $output ?>
                </div>
                <?php endif ?>
            
            <div class="socialicons-mi"></div><div class="socialicons-mo"></div>

<?php
    endif;
}



/**
 * Displays the content in case of 404 page, empty search query
 * and any other query which does not output any result.
 * 
 * Both heading and content of the page will be displayed with a
 * search form. Any modification to this module will effect only
 * 404 error or related pages.
 * 
 * @since 1.0
 */
function decent_404_show(){
?>
        <div class="archive-meta-container">
            <div class="archive-head">
                <?php if (is_404()) : ?>
                    <h1><?php _e('Ooops! Nothing Found', 'decent'); ?></h1>
                <?php elseif (is_search()) : ?>
                    <h1><?php printf(__('Nothing found for:', 'decent') . ' %s', get_search_query()); ?></h1>
                <?php else : ?>
                    <h1><?php printf(__('Nothing found for:', 'decent') . ' %s', single_term_title('', false)); ?></h1>
                <?php endif; ?>
            </div>
        </div><!-- Archive Meta Container ends -->
        
        <div class="archive-loop-container archive-empty">
            <div class="archive-excerpt">
                <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'decent'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
<?php }



/**
 * Decides and returns the accurate 'text' to be displayed.
 * 
 * @return string
 * @since 1.0
 */
function decent_date_text() {
    if (is_date()):
        if (is_day()):
            $date_text = __('Day', 'decent');
        elseif (is_month()):
            $date_text = __('Month', 'decent');
        elseif (is_year()):
            $date_text = __('Year', 'decent');
        else:
            $date_text = __('Period', 'decent');
        endif;

        return $date_text;

    endif;
}



/**
 * Displays the navigation links for the archive pages. Is only
 * applicable if the total number of pages is more than 'one'.
 * 
 * @since 1.0
 */
function decent_archive_nav() {
    
    global $wp_query;

    if ($wp_query->max_num_pages > 1): ?>
        
        <div class="archive-nav grid-col-16">
            <div class="nav-next"><?php previous_posts_link('<span class="meta-nav">&larr;</span> '.__('Newer posts', 'decent')); ?></div>
            <div class="nav-previous"><?php next_posts_link(__('Older posts', 'decent').' <span class="meta-nav">&rarr;</span>'); ?></div>
        </div>
        
<?php endif;
}



/**
 * Displays the navigation links for the posts and pages.
 * 
 * @since 1.0
 */
function decent_post_nav() {
?>
    <div class="post-nav">
        <div class="nav-previous"><?php previous_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Previous post link', 'decent' ) . '</span>' ) ?></div>
        <div class="nav-next"><?php next_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Next post link', 'decent' ) . '</span> %title' ) ?></div>
    </div>
<?php
}



/**
 * Display site title/description or logo
 * 
 * @since 1.0
 */
function decent_logo() {
?>
	<?php if(!decent_get_option('site_logo')): ?>
        <div id="site-title" class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) . ' | ' . esc_attr( get_bloginfo('description') ) ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name', 'display' )) ?></a>
        </div>
        <?php if(!decent_get_option('disable_site_desc')): ?><div id="site-description" class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ) ?></div><?php endif ?>
	<?php else: ?>
        <div id="site-title" class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) . ' | ' . esc_attr( get_bloginfo('description') ) ?>" rel="home"><img src="<?php echo esc_url(decent_get_option('site_logo')) ?>" /></a>
        </div>
	<?php endif ?>
<?php
}



/**
 * Template for comments and pingbacks.
 * 
 * @since 1.0
 */
function decent_comment_callback( $comment, $args, $depth ) {

  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ):

         case '' :
		 // Proceed with normal comments.
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <?php if ($comment->comment_approved == '0') : ?><div class="comment-awaiting"><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'decent'); ?></em></div><?php endif; ?>
        <?php $decent_get_comment_ID = get_comment_ID() ?>
        <?php $decent_is_comment_reply = get_comment($decent_get_comment_ID)->comment_parent ?>
        <?php $decent_the_comment_author = get_comment_author(get_comment($decent_get_comment_ID)->comment_parent) ?>
        <?php // if($decent_is_comment_reply != 0 ) printf('<div class="comment-parent-author"><span>Replied to %s</span></div>', $decent_the_comment_author ) ?>
      <div id="comment-<?php comment_ID(); ?>" class="comment-block-container grid-float-left grid-col-16">
          
          
                     <div class="comment-info-container grid-col-4 grid-float-left">
                          <div class="comment-author vcard">
                              <div class="comment-author-avatar-container"><?php echo get_avatar($comment, 125); ?></div>
                              <div class="comment-author-info-container">
                                  <div class="comment-author-name"><?php printf('<span class="says">%s</span>', sprintf('<cite class="fn">%s</cite>', get_comment_author_link())) ?></div>
                                  <div class="comment-meta comment-date"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php printf('%1$s', get_comment_date()); ?></a></div>
                              </div>
                          </div><!-- .comment-author .vcard -->
                     </div>
          
                     <div class="comment-body-container grid-col-12 grid-float-left">
                        <div class="comment-body"><?php comment_text(); ?></div>
                        <div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
                        <?php edit_comment_link(__('(Edit)', 'decent'), '<div class="comment-edit">', '</div>');?>
                     </div>

      </div><!-- #comment-##  -->

<?php
         break;

         case 'pingback' :
         case 'trackback' :
		 // Display trackbacks differently than normal comments.
  ?>

  <li class="post pingback">
      <p><?php _e( 'Pingback:', 'decent' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'decent' ), ' ' ); ?></p>

  <?php
         break;

  endswitch;
}



/**
 * Adds text to decent_blog_template_heading_filter used on home.php
 * 
 * @return string
 * @since 1.0
 */
function decent_blog_heading_text() {
    return '<h1>' . get_bloginfo('name') . ' ' . __('Blog', 'decent') . '</h1>';
}
add_filter('decent_blog_template_heading_filter', 'decent_blog_heading_text', 10);



/**
 * Adds read more link to blog.
 *
 * @since 1.0
 */
function decent_wp_readmore_link($button, $text) {
	$post = get_post();

	return '<div class="read-more"><a href="' . get_permalink() . "#more-{$post->ID}\">Read more</a></div>";
}
add_filter('the_content_more_link', 'decent_wp_readmore_link', 100, 2);


/**
 *
 */
function decent_customizer_css() {
	global $wp_customize;
	$output = '';
	$options_color = array(
		'color_site_title' => '#wrapper .site-title a',
		'color_site_desc' => '#wrapper .site-description',
		'color_blog_p_title' => '#wrapper .loop-post-title h1 a',
		'color_blog_p_meta' => '#wrapper .loop-post-meta, #wrapper .loop-post-meta .loop-meta-comments a',
		'color_blog_p_content' => '#wrapper .loop-post-excerpt',
		'color_p_title' => '#wrapper .post-title h1',
		'color_p_meta' => '#wrapper .post-meta',
		'color_p_content' => '#wrapper .post-content',
	);
	
	$output .= "\n" . '<style type="text/css">';
	
	foreach($options_color as $option=>$location){
		if(decent_get_option($option)) {
			$output .= $location .'{color:'.decent_get_option($option).';}';
		}
	}
	
	$output .= '</style>' . "\n";
	
	echo $output;
}
add_action('wp_head', 'decent_customizer_css');