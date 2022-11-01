

<?php
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');
define('THEME', get_site_url() . '/wp-content/themes/vape');
/* ---------------------------------------------------------------------------
 * Load Textdomain
 * --------------------------------------------------------------------------- */
require_once(CORE . '/init.php');



if (!function_exists('mfnch_textdomain')) :
    function mfnch_textdomain()
    {
        load_theme_textdomain('vape', get_template_directory() . '/languages/');

        add_theme_support('post-thumbnails');

        add_theme_support('automatic-feed-links');


        add_image_size('post-thumbnail-350-257', 350, 257, true);

        register_nav_menus(array(
            'menu_main' => __('Main Menu', 'vape'),
            'footer_menu_1' => __('Footer Menu 1', 'vape'),
            'footer_menu_2' => __('Footer Menu 2', 'vape'),
        ));

        /*
        * Remove admin bar in frontend
        */
        // show_admin_bar(false);
    }
endif;
add_action('after_setup_theme', 'mfnch_textdomain');

/* ---------------------------------------------------------------------------
 * LIMIT WORD
 * --------------------------------------------------------------------------- */
function limitWords($text, $limit)
{
    $word_arr = explode(" ", $text);

    if (count($word_arr) > $limit) {
        $words = implode(" ", array_slice($word_arr, 0, $limit));
        return $words . '...';
    }
    return $text;
}





/*
* Implement title site
*/
add_theme_support('title-tag');

/*
* Remove image size default
*/
add_filter('intermediate_image_sizes_advanced', 'prefix_remove_default_images');
function prefix_remove_default_images($sizes)
{
    // unset( $sizes['small']); // 150px
    unset($sizes['medium']); // 300px
    unset($sizes['large']); // 1024px
    unset($sizes['medium_large']); // 768px
    return $sizes;
}

// disable new editor
add_filter('use_block_editor_for_post', '__return_false', 10);

// add page excerpt
add_post_type_support('page', 'excerpt');

/*
* Contact form 7 remove span
*/
// add_filter('wpcf7_form_elements', function($content) {
//     $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

//     return str_replace('<br />', '', $content);
// });

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');

// customize pre / next post link
add_filter('previous_post_link', 'filter_single_post_pagination_prev', 10, 4);
function filter_single_post_pagination_prev($output, $format, $link, $post)
{
    $title = get_the_title($post);
    $url   = get_permalink($post->ID);
    $img = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $excerpt = get_the_excerpt($post);
    $text  = 'Read previous';
    $class = 'prev-post';
    $rel   = 'prev';

    if ('next_post_link' === current_filter()) {
        $text  = 'Read next';
        $class = 'next-post';
        $rel   = 'next';
    }
    return "<div class='col-md-6'>
                <div class='view-room-other'>
                    <a href='$url'>
                        <div class='field-room-other__img'><img src='$img' />
                        </div>
                        <div class='group-field'>
                            <div class='arrow'><i class='fal fa-long-arrow-left'></i></div>
                            <div class='field-room-other__title font-secondary'>$title</div>
                            <div class='field-room-other__description font-size-small'>$excerpt</div>
                        </div>
                    </a>
                </div>
            </div>";
}

add_filter('next_post_link', 'filter_single_post_pagination_next', 10, 4);
function filter_single_post_pagination_next($output, $format, $link, $post)
{
    $title = get_the_title($post);
    $url   = get_permalink($post->ID);
    $img = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $excerpt = get_the_excerpt($post);
    $text  = 'Read previous';
    $class = 'prev-post';
    $rel   = 'prev';

    if ('next_post_link' === current_filter()) {
        $text  = 'Read next';
        $class = 'next-post';
        $rel   = 'next';
    }
    return "<div class='col-md-6'>
                <div class='view-room-other'>
                    <a href='$url'>
                        <div class='field-room-other__img'><img src='$img' />
                        </div>
                        <div class='group-field'>
                            <div class='arrow'><i class='fal fa-long-arrow-right'></i></div>
                            <div class='field-room-other__title font-secondary'>$title
                            </div>
                            <div class='field-room-other__description font-size-small'>$excerpt</div>
                        </div>
                    </a>
                </div>
            </div>";
}

// add class to link tags
function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);
// add class to a tags 
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);



if (!function_exists('bootstrapBasicEnqueueScripts')) {
    /**
     * Enqueue scripts & styles
     */
    function bootstrapBasicEnqueueScripts()
    {
        global $wp_scripts;

        wp_enqueue_style('vape-bootstrap', get_template_directory_uri() .  '/dist/includes/bootstrap/css/bootstrap.min.css', array(), '1.0.1');
        wp_enqueue_style('vape-slick', get_template_directory_uri() .  '/dist/includes/slick/slick.css', array(), '1.0.1');
        wp_enqueue_style('vape-circle',  get_template_directory_uri() .  '/dist/includes/circle.css', array(), '1.0.1');
        wp_enqueue_style('vape-style', get_template_directory_uri() . '/dist/css/style.css', array());
        wp_enqueue_style('vape-font',  get_template_directory_uri() .  '/dist/font/poppins/stylesheet.css', array(), '1.0.1');

        wp_enqueue_script('vape-jquery',  get_template_directory_uri() .  '/dist/js/jquery-3.2.1.min.js', array(), '1.0.1');
        wp_enqueue_script('vape-bootstrapjs',  get_template_directory_uri() .  '/dist/includes/bootstrap/js/bootstrap.bundle.js', array(), '1.0.1');
        wp_enqueue_script('vape-slickjs',  get_template_directory_uri() .  '/dist/includes/slick/slick.min.js', array(), '1.0.1');
        wp_enqueue_script('vape-script',  get_template_directory_uri() .  '/dist/js/script.js', array(), '1.0.1');
    } // bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');

if (!function_exists('scriptFooter')) {
    /**
     * Enqueue scripts & styles
     */
    function scriptFooter()
    {
        global $wp_scripts;
        // wp_enqueue_style('vape-bootstrap', get_template_directory_uri() .  '/dist/includes/bootstrap/css/bootstrap.min.css', array(), '1.0.1');
        // wp_enqueue_style('vape-slick', get_template_directory_uri() .  '/dist/includes/slick/slick.css', array(), '1.0.1');
        // wp_enqueue_style('vape-circle',  get_template_directory_uri() .  '/dist/includes/circle.css', array(), '1.0.1');
        // wp_enqueue_style('vape-style', get_template_directory_uri() . '/dist/css/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
        // wp_enqueue_style('vape-font',  get_template_directory_uri() .  '/dist/font/poppins/stylesheet.css', array(), '1.0.1');
        // wp_enqueue_style('vape-jquery',  get_template_directory_uri() .  '/dist/js/jquery-3.2.1.min.js', array(), '1.0.1');
        // wp_enqueue_style('vape-bootstrapjs',  get_template_directory_uri() .  '/dist/includes/bootstrap/js/bootstrap.bundle.js', array(), '1.0.1');
        // wp_enqueue_style('vape-slickjs',  get_template_directory_uri() .  '/dist/includes/slick/slick.min.js', array(), '1.0.1');
        // wp_enqueue_style('vape-wow',  get_template_directory_uri() .  '/dist/js/wow.min.js', array(), '1.0.1');
        // wp_enqueue_style('vape-script',  get_template_directory_uri() .  '/dist/js/script.js', array(), '1.0.1');
        wp_enqueue_script('vape-jquery',  get_template_directory_uri() .  '/dist/js/jquery-3.2.1.min.js', array(), '1.0.1');
        wp_enqueue_script('vape-bootstrapjs',  get_template_directory_uri() .  '/dist/includes/bootstrap/js/bootstrap.bundle.js', array(), '1.0.1');
        wp_enqueue_script('vape-slickjs',  get_template_directory_uri() .  '/dist/includes/slick/slick.min.js', array(), '1.0.1');
        wp_enqueue_script('vape-script',  get_template_directory_uri() .  '/dist/js/script.js', array(), '1.0.1');
    } // scriptFooter
}
add_action('wp_footer', 'scriptFooter');


add_theme_support('custom-logo');
add_theme_support('featured-content');


add_action('wp_ajax_loadpost', 'loadpost_init');
add_action('wp_ajax_nopriv_loadpost', 'loadpost_init');
function loadpost_init()
{



    //load more posts
    $post_id = $_POST["ID"];

    $query = new WP_Query(array(
        'p' => $post_id,
        'post_type' => 'member'
    ));

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            echo '<div class="row">
                            <div class="col-md-4">
                                <div class="block_text">
                                    <h3>';
            the_title();
            echo '</h3>
                                    <h4>';
            echo get_field('position');
            echo '</h4>
                                    <div class="content">';
            echo the_content();
            echo '</div>
                                    <div class="information_circle">';
            $social = get_field('social');
            foreach ($social as $item) {
                echo '<div class="circle_item">
                                            <a href="';
                echo $item['link'];
                echo '" target="_blank">';
                echo $item['icon'];
                echo '</a>
                                        </div>';
            }


            echo '</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="information_img">';
            $image = get_field('image');
            if (!empty($image)) {
                echo '<img src="';
                echo $image['url'];
                echo '" />';
            }
            echo '</div>
                            </div>
                            <div class="col-md-4">
                                <div class="information_skill">';
            $skill = get_field('skill');
            foreach ($skill as $item) {
                echo '<div class="information_skill_item">
                                        <div class="skill">
                                            <h4>';
                echo $item['label'];
                echo '</h4>
                                        </div>
                                        <div class="progress-bar-wrap">
                                            <div class="wrap">
                                                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:';
                echo $item['value'];
                echo '%">
                                                    <span class="title">';
                echo $item['value'];
                echo '</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
            }


            echo '</div>
                            </div>
                        </div>';

        endwhile;
    else :
        echo 'end';
    endif;

    wp_reset_postdata();
    die();
}


add_action('wp_ajax_loadpost_project', 'loadpost_project_init');
add_action('wp_ajax_nopriv_loadpost_project', 'loadpost_project_init');
function loadpost_project_init()
{

    //load more posts
    $post_id = $_POST["ID"];

    $query = new WP_Query(array(
        'p' => $post_id,
        'post_type' => 'project'
    ));

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();

            $images = get_field('gallery');
            if ($images) :
                foreach ($images as $image) :
                    echo '<div class="col-md">
                            <div class="img_project">
                                <div class="img_project_item">
                                    <img src="';
                    echo esc_url($image['url']);
                    echo '"
                                        alt="';
                    echo esc_attr($image['alt']);
                    echo '" />
                                </div>
                            </div>
                        </div>';
                endforeach;
            endif;

        endwhile;
    else :
        echo 'end';
    endif;





    wp_reset_postdata();
    die();
}
