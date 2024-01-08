<?php

include_once('includes/theme-options.php');
add_theme_support( 'post-thumbnails' );

/* Enqueue Styles */
if ( ! function_exists('thr_enqueue_styles') ) {
    function thr_enqueue_styles() {
        wp_enqueue_style( 'twenty-twenty-three-style', get_template_directory_uri() .'/style.css' );
    }
    add_action('wp_enqueue_scripts', 'thr_enqueue_styles');
}



add_action( 'after_setup_theme', 'when_theme_isset' );
function when_theme_isset() {
  register_nav_menu( 'header_menu', __( 'Header Menu', 'algo' ) );
  register_nav_menu( 'footer_menu', __( 'Footer Menu', 'algo' ) );
}

add_action('admin_enqueue_scripts', 'theme_backend_scripts_styles');
function theme_backend_scripts_styles()
{
  wp_enqueue_style('thickbox');
  // wp_enqueue_style('admin-styles-css', get_stylesheet_directory_uri().'/css/admin-style.css');

  wp_enqueue_script('jquery');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  wp_enqueue_script('admin-scripts', get_stylesheet_directory_uri().'/js/admin-scripts.js');
}

add_action('wp_enqueue_scripts', 'theme_frontend_scripts_styles');
function theme_frontend_scripts_styles()
{
  wp_enqueue_style('bootstrap-min-css', get_stylesheet_directory_uri().'/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome5-min-css', get_stylesheet_directory_uri().'/css/fontawesome5.min.css');
  wp_enqueue_style('css-slick-css', get_stylesheet_directory_uri().'/css/slick.css');
  wp_enqueue_style('css-slick-theme-css', get_stylesheet_directory_uri().'/css/slick-theme.css');
  wp_enqueue_style('css-styles-css', get_stylesheet_directory_uri().'/css/style.css');
      
  wp_enqueue_script('jquery-min-js', get_stylesheet_directory_uri().'/js/jquery-3.6.1.min.js' ,'','',true);
  wp_enqueue_script('popper-min-js', get_stylesheet_directory_uri().'/js/bootstrap.bundle.min.js' ,'','',true);
  wp_enqueue_script('fontawesome5-min-js', get_stylesheet_directory_uri().'/js/fontawesome5.min.js' ,'','',true);
  wp_enqueue_script('slick-js', get_stylesheet_directory_uri().'/js/slick.min.js' ,'','',true);
  wp_enqueue_script('bootstrap-min-js', get_stylesheet_directory_uri().'/js/custum.js' ,'','',true);
}

function wpdocs_channel_nav_class( $classes, $item, $args ) {
    if ( 'header_menu' === $args->theme_location ) {
        $classes[] = "nav-item";
    }
    return $classes;
}
add_filter( 'nav_menu_css_class' , 'wpdocs_channel_nav_class' , 10, 4 );

add_filter( 'nav_menu_link_attributes', function($atts) {
        $atts['class'] = "nav-link";
        return $atts;
}, 100, 1 );

function get_image_alt_by_url( $image_url ) {
    global $wpdb;

    if( empty( $image_url ) ) {
        return false;
    }
    $query_arr  = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid='%s';", strtolower( $image_url ) ) );
    if(empty($query_arr))
    {
      $image_url = str_replace("https", "http", $image_url);
      $query_arr  = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid='%s';", strtolower( $image_url ) ) );
    }

    // print_r($query_arr);
    $image_id   = ( ! empty( $query_arr ) ) ? $query_arr[0] : 0;

    return get_post_meta( $image_id, '_wp_attachment_image_alt', true );
}

add_action( 'widgets_init', 'theme_widgets_init' );
function theme_widgets_init()
{
    register_sidebar( array(
    'name' => __( 'Top Header Bar', 'twentytwentythree' ),
    'id' => 'top-header-bar-1',
    'description' => __( 'TopHeaderBar-1' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name' => __( 'Footer Section 1', 'twentytwentythree' ),
    'id' => 'footer-section-1',
    'description' => __( 'FooterSection-1' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name' => __( 'Footer Section 2', 'twentytwentythree' ),
    'id' => 'footer-section-2',
    'description' => __( 'FooterSection-2' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
  register_sidebar( array(
    'name' => __( 'Footer Section 3', 'twentytwentythree' ),
    'id' => 'footer-section-3',
    'description' => __( 'FooterSection-3' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}

add_action( 'init' , 'custompostypescb' );
function custompostypescb(){
  $labels = array(
        'name'               => _x( 'Service', 'post type general name' ),
        'singular_name'      => _x( 'Service', 'post type singular name' ),
        'add_new'            => _x( 'Add Service', 'services' ),
        'add_new_item'       => __( 'Add Service' ),
        'edit_item'          => __( 'Edit Service' ),
        'new_item'           => __( 'New Service' ),
        'all_items'          => __( 'All Services' ),
        'view_item'          => __( 'View Service' ),
        'search_items'       => __( 'Search' ),
        'menu_name'          => 'Services'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Let\'s Create Service post',
        'public'        => true,
        'menu_position' => '',
        'supports'      => array( 'title', 'thumbnail', 'editor'),
        'has_archive'   => true,
    // 'register_meta_box_cb' => 'bdscpartnershops_metaboxes',
        // 'exclude_from_search'   => true,
        // 'publicly_queryable'   => false,
    );
  register_post_type( 'services', $args);
}

function custom_excerpt($content)
{
  $text = strip_shortcodes( $content );
  $text = apply_filters( 'the_content', $text );
  $text = str_replace(']]>', ']]&gt;', $text);
  $excerpt_length = apply_filters( 'excerpt_length', 23 );
  // $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
  $excerpt_more = '';
  $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  return $text;
}

add_action('wp_ajax_load_blog_ajax', 'load_blog_ajax');
add_action('wp_ajax_nopriv_load_blog_ajax', 'load_blog_ajax');
function load_blog_ajax() {

  $paged = $_POST['page'];
  $number_of_posts_per_page = 6;
  $initial_offset = 6;
  $number_of_posts_past = $number_of_posts_per_page * ($paged - 1);
  $offset = $initial_offset + (($paged > 1) ? $number_of_posts_past : 0);

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => $number_of_posts_per_page,
    'paged' => $paged,
    'offset' => $number_of_posts_past,
    'orderby'          => 'date',
    'order'            => 'DESC'
  );

  $blogs = get_posts( $args );
  if(!empty($blogs))
  {
    foreach($blogs as $sngl)
    {
      $blog_id = $sngl->ID;
      $permalink = get_permalink($blog_id);
      $blog_title = $sngl->post_title;
      $blog_title = substr($blog_title, 0, 100);
      $feature_image = wp_get_attachment_url( get_post_thumbnail_id($blog_id) );
      $excerpt = wp_trim_words( $sngl->post_content, 35, '' );
      $excerpt = substr($excerpt, 0, 150);
      $author_link = get_author_posts_url($sngl->post_author);
    ?>
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="blog_boxsec">
                <div class="img_sec">
                    <img src="<?php echo $feature_image; ?>"   alt="<?php echo get_image_alt_by_url($feature_image); ?>"/>
                </div>
                
                <div class="contnt_mainsec">
                    <h3><a href="<?php echo $permalink; ?>"><?php echo $blog_title;?>...</a></h3>
                    
                    <p><?php echo $excerpt; ?>...</p>
                    
                    <div class="btn_mainsec">
                        <a class="btn_style" href="<?php echo $permalink; ?>">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
  }
   else {
    echo 'no_post';
  }
  wp_die();
}

function remove_comment_url($arg) {
echo "<pre>";
    print_r($arg);
    echo "</pre>";
return $arg;
}

// add_filter('comment_form_default_fields', 'remove_comment_url');

function comment_text_before($arg) {
    unset($arg['fields']['url']);
    unset($arg['fields']['cookies']);
    unset($arg['title_reply']);
    unset($arg['comment_notes_before']);
    unset($arg['comment_field']);
    $arg['comment_field'] = '';
    $arg['title_reply'] = '';
    $arg['comment_notes_before'] = '';
    
    $arg['fields']['author'] = '<div class="row"><div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="author" name="author" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) .'">
                    </div>
                </div>';
    $arg['fields']['email'] = '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="" required="required">
                    </div>
                </div>';
    $arg['fields']['phone'] = '<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="">
                    </div>
                </div></div>';

    $arg['comment_field'] = '<div class="row"><div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group mb-3">
                                <textarea type="text" class="form-control" placeholder="Comment" id="comment" name="comment" required="required"></textarea>
                            </div>
                        </div></div>';
    $arg['submit_button'] = '<div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="btn_mainsec">
                                         <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </div>
                                </div>
                            </div>';
    return $arg;
}

add_filter('comment_form_defaults', 'comment_text_before');


function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
 
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );