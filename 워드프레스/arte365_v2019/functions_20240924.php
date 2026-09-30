<?php

define('ARTE365_VER', '1.1.0');
define('ARTE365_DEBUG_M', FALSE);


require_once(get_template_directory() . '/libs/Mobile_Detect.php');

if (ARTE365_DEBUG_M) {

    define('ARTE365_DEVICE', 'mobile');
    define('ARTE365_DEVICE_CODE', 'm');

} else {

    if (arte365_is_mobile()) {
        define('ARTE365_DEVICE', 'mobile');
        define('ARTE365_DEVICE_CODE', 'm');
    } else {
        define('ARTE365_DEVICE', 'desktop');
        define('ARTE365_DEVICE_CODE', 'd');
    }
}

function arte365_is_mobile() {
    $detect = new Mobile_Detect;

    if( $detect->isMobile() && !$detect->isTablet() ){
        return true;
    } else {
        return false;
    }

}



function arte365_theme_setup() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'arte365_theme_setup' );



function arte365_register_my_menus() {
    register_nav_menus(
        array(
            'arte365-primary-menu' => __( 'Primary Menu' ),
            'arte365-footer-menu' => __( 'Footer Menu' )
        )
    );
};

add_action( 'init', 'arte365_register_my_menus' );


function arte365_scripts() {
    wp_enqueue_style( 'style-arte365-style', get_template_directory_uri() . '/css/'.ARTE365_DEVICE.'.css', ARTE365_VER );

    wp_enqueue_script( 'script-arte365-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), ARTE365_VER, false );
    wp_enqueue_script( 'script-arte365-jquery-easing', get_template_directory_uri() . '/js/vendor/jquery.easing.min.js', array('jquery'), ARTE365_VER, false );
    wp_enqueue_script( 'script-arte365-common', get_template_directory_uri() . '/js/common.js', array('jquery'), ARTE365_VER, false );


    // slick
    wp_enqueue_style( 'style-slick', get_template_directory_uri() . '/lib/slick/slick.css', ARTE365_VER );
    wp_enqueue_style( 'style-slick-theme', get_template_directory_uri() . '/lib/slick/slick-theme.css', ARTE365_VER );
    wp_enqueue_script( 'script-slick', get_template_directory_uri() . '/lib/slick/slick.min.js', array('jquery'), ARTE365_VER, false );

}

add_action( 'wp_enqueue_scripts', 'arte365_scripts' );




// function arte365_custom_sidebar() {
//     register_sidebar(
//         array (
//             'name' => __( 'ARTE365 Sidebar', 'arte365' ),
//             'id' => 'arte365-sidebar',
//             'description' => __( 'ARTE365 Sidebar', 'arte365' ),
//             'before_widget' => '<div class="widget-content">',
//             'after_widget' => "</div>",
//             'before_title' => '<h3 class="widget-title">',
//             'after_title' => '</h3>',
//         )
//     );
// }
// add_action( 'widgets_init', 'arte365_custom_sidebar' );


function arte365_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'arte365_custom_excerpt_length', 999 );





function the_arte365_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}


function the_arte365_get_category_string_return() {
    $post_cats = get_the_category();
    $post_cat = '';
    foreach($post_cats as $cat) {
        if ($cat->parent > 0) {
            $post_cat = $cat->cat_name;
            break;
        } else {
            $post_cat = $cat->cat_name;
        }
    }
    return $post_cat;
}

function the_arte365_get_category_string() {
    $post_cat=the_arte365_get_category_string_return();
    if($post_cat === '아이디어') {
        echo '아이<br>디어';
    } else {
        echo $post_cat;
    }
}

function recent_post_exclude_news( $query ) {
    if($query->is_main_query() && $query->is_home()) {
        $query->set('cat', array( -9, -10 ));
    }
}


function arte365_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    unset( $fields['url'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'arte365_move_comment_field_to_bottom' );




/***********************************************************************************************/
/* Custom Comment Form */
/***********************************************************************************************/

function si_custom_comments( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment;
extract($args, EXTR_SKIP);
if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
} else {
    $tag = 'li';
    $add_below = 'div-comment';
}
?><!-- Comment start -->
<<?php echo esc_attr($tag) ?> <?php comment_class($depth > 1 ? 'comment-list-children' : 'comment-list-item') ?> id="comment-<?php comment_ID() ?>" data-id="<?php comment_ID() ?>">
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID() ?>" class='comment-content-wrapper'>
    <?php endif; ?>
    <?php if ($args['avatar_size'] != 0 && !($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback'))
        echo '<div class="comment-image"><img src="'.si_get_avatar_url( get_avatar($comment, $args['avatar_size']) ).'" alt="author avatar" /></div>';
    if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','SnoopyIndustries') ?></em>
        <br />
    <?php endif; ?>
    <div class='comment-content'>
        <div class='comment-meta'>
            <span class='author-name'><?php comment_author_link()?></span>
            <span class='comment-date'><?php printf( __('%1$s at %2$s'), get_comment_date('Y년 m월 d일'),  get_comment_time() ); ?></span>
            <div class="comment-btn">
                <?php
                if($comment->comment_password != null) {
                    echo '<a class="modify edit" href="javascript:void(0)">수정</a>';
                    echo '<a class="modify delete" href="javascript:void(0)">삭제</a>';
                }
                ?>

                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>
        <div class='comment-text'>
            <?php comment_text() ?>
        </div>
        <div id="comment-modify-<?php comment_ID() ?>" data-id="<?php comment_ID() ?>" class='comment-modify mt_25' style="display: none">
            <form class="comment-form">
                <input name="comment_no" type="hidden" value="<?php comment_ID() ?>" aria-required="true">
                <input name="token" type="hidden" value="" aria-required="true">
                <!-- <div class="input-block author">
                     <label for="" class="n1"><span>*</span><br>이 름</label><input id="author" placeholder="작성자" class="comment-input" name="author" type="text" value="" aria-required="true">
                 </div>
                 <div class="input-block email">
                     <label for="" class="n2"><span>*</span><br>이메일</label>
                     <input id="email" placeholder="이메일" class="comment-input" name="email" type="text" value="" aria-required="true">
                 </div>
                 <div class="input-block pw">
                     <label for="" class="n2"><span>*</span><br>비밀번호</label>
                     <input id="pw" placeholder="비밀번호" class="comment-input" name="pw" type="password" value="" aria-required="true">
                 </div>-->
                <div class="input-block comment"><textarea name="comment" cols="40" rows="10" class="comment-input n3" placeholder=""></textarea></div>
                <p class="form-submit modifyBtn">
                    <input type="button" class="submit" value="확인">
                </p>
            </form>
        </div>
    </div>
</div>
<?php if ( 'div' != $args['style'] ) : ?>
<?php endif; echo '<div class="clear"></div>' ?>
<?php
}

function si_get_avatar_url( $avatar ) {

    preg_match( '#src=["|\'](.+)["|\']#Uuis', $avatar, $matches );

    return ( isset( $matches[1] ) && ! empty( $matches[1]) ) ?
        esc_url((string) $matches[1]) : '';

}



function arte365_exclude_pages_from_search($query) {
    if ( $query->is_main_query() && is_search() ) {
        $query->set( 'post_type', 'post' );
        $query->set( 'cat', '-2806' );
    }
    return $query;
}
add_filter( 'pre_get_posts','arte365_exclude_pages_from_search' );


// postlist all
function arte365_postall_callback($atts) {
    ob_start();
    get_template_part('partials/page', 'postall');
    return ob_get_clean();
}
add_shortcode('arte365_postall', 'arte365_postall_callback');


// sitemap
function arte365_sitemap_callback($atts) {
    ob_start();
    get_template_part('partials/page', 'sitemap');
    return ob_get_clean();
}
add_shortcode('arte365_sitemap', 'arte365_sitemap_callback');





// newsletter
function arte365_subscribe_callback($atts) {
    ob_start();
    get_template_part('partials/page', 'subscribe');
    return ob_get_clean();
}
add_shortcode('arte365_subscribe', 'arte365_subscribe_callback');




add_action('wp_ajax_arte365_subscribe_newsletter', 'arte365_subscribe_newsletter_callback');
add_action('wp_ajax_nopriv_arte365_subscribe_newsletter', 'arte365_subscribe_newsletter_callback');

function arte365_subscribe_newsletter_callback() {

    check_ajax_referer( 'arte365-subscribe-newsletter', 'nonce' );

    $email  = sanitize_text_field( $_POST['email'] );

    global $wpdb;


    $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}easymail_subscribers WHERE email = '%s'", $email ) );

    if ( $result ) {
        echo '이미 신청된 메일입니다.';
    } else {
        $fields['email'] = $email; //edit : added all this line
        $fields['name'] = $email; //edit : added all this line
        if ( alo_em_add_subscriber( $fields, 1, $lang ) == "OK" ) {
            echo '뉴스레터 신청이 완료되었습니다.';
        } else {
            echo '뉴스레터 신청 중 에러가 났습니다. 다시 확인해 주세요.';
        }
    }


    die();
}

function arte365_unsubscribe_callback($atts) {
    ob_start();
    get_template_part('partials/page', 'unsubscribe');
    return ob_get_clean();
}
add_shortcode('arte365_unsubscribe', 'arte365_unsubscribe_callback');



add_action('wp_ajax_arte365_unsubscribe_newsletter', 'arte365_unsubscribe_newsletter_callback');
add_action('wp_ajax_nopriv_arte365_unsubscribe_newsletter', 'arte365_unsubscribe_newsletter_callback');

function arte365_unsubscribe_newsletter_callback() {

    check_ajax_referer( 'arte365-unsubscribe-newsletter', 'nonce' );

    $email  = sanitize_text_field( $_POST['email'] );

    global $wpdb;

    $result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}easymail_subscribers WHERE email = '%s'", $email ) );


    if (!$result) {
        echo "등록된 메일 주소가 없습니다.";
    }else {
        $wpdb->delete( $wpdb->prefix . 'easymail_subscribers', array('email' => $email));
        echo "이메일 수신 거부가 정상적으로 완료되었습니다.";
    }

    die();
}



function arte365_get_video_embed_html_from_url($url) {


    $vendor = VideoUrlParser::identify_service($url);
    // returns string "youtube"

    $video_id = VideoUrlParser::get_url_id($url);
    // returns string "x_8kFbZf20I"



    if( $vendor == 'youtube '){

        ?>
        <iframe width="640" height="360" src="http://www.youtube.com/embed/<?php echo $video_id; ?>" frameborder="0" allowfullscreen></iframe>

        <?php
    }

    if($vendor == 'vimeo'){
        ?>
        <iframe src="http://player.vimeo.com/video/<?php echo $video_id; ?>" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        <?php
    }
}



/**
 * Video Url Parser
 *
 * Parses URLs from major cloud video providers. Capable of returning
 * keys from various video embed and link urls to manipulate and
 * access videos in various ways.
 */
class VideoUrlParser
{
    /**
     * Determines which cloud video provider is being used based on the passed url.
     *
     * @param string $url The url
     * @return null|string Null on failure to match, the service's name on success
     */
    public static function identify_service($url)
    {
        if (preg_match('%youtube|youtu\.be%i', $url)) {
            return 'youtube';
        }
        elseif (preg_match('%vimeo%i', $url)) {
            return 'vimeo';
        }
        return null;
    }

    /**
     * Determines which cloud video provider is being used based on the passed url,
     * and extracts the video id from the url.
     *
     * @param string $url The url
     * @return null|string Null on failure, the video's id on success
     */
    public static function get_url_id($url)
    {
        $service = self::identify_service($url);

        if ($service == 'youtube') {
            return self::get_youtube_id($url);
        }
        elseif ($service == 'vimeo') {
            return self::get_vimeo_id($url);
        }
        return null;
    }

    /**
     * Determines which cloud video provider is being used based on the passed url,
     * extracts the video id from the url, and builds an embed url.
     *
     * @param string $url The url
     * @return null|string Null on failure, the video's embed url on success
     */
    public static function get_url_embed($url)
    {
        $service = self::identify_service($url);

        $id = self::get_url_id($url);

        if ($service == 'youtube') {
            return self::get_youtube_embed($id);
        }
        elseif ($service == 'vimeo') {
            return self::get_vimeo_embed($id);
        }
        return null;
    }

    /**
     * Parses various youtube urls and returns video identifier.
     *
     * @param string $url The url
     * @return string the url's id
     */
    public static function get_youtube_id($url)
    {
        $youtube_url_keys = array('v','vi');

        // Try to get ID from url parameters
        $key_from_params = self::parse_url_for_params($url, $youtube_url_keys);
        if ($key_from_params) return $key_from_params;

        // Try to get ID from last portion of url
        return self::parse_url_for_last_element($url);
    }

    /**
     * Builds a Youtube embed url from a video id.
     *
     * @param string $youtube_video_id The video's id
     * @return string the embed url
     */
    public static function get_youtube_embed($youtube_video_id, $autoplay = 1)
    {
        $embed = "http://youtube.com/embed/$youtube_video_id?autoplay=$autoplay";

        return $embed;
    }

    /**
     * Parses various vimeo urls and returns video identifier.
     *
     * @param string $url The url
     * @return string The url's id
     */
    public static function get_vimeo_id($url)
    {
        // Try to get ID from last portion of url
        return self::parse_url_for_last_element($url);
    }

    /**
     * Builds a Vimeo embed url from a video id.
     *
     * @param string $vimeo_video_id The video's id
     * @return string the embed url
     */
    public static function get_vimeo_embed($vimeo_video_id, $autoplay = 1)
    {
        $embed = "http://player.vimeo.com/video/$vimeo_video_id?byline=0&amp;portrait=0&amp;autoplay=$autoplay";

        return $embed;
    }

    /**
     * Find the first matching parameter value in a url from the passed params array.
     *
     * @access private
     *
     * @param string $url The url
     * @param array $target_params Any parameter keys that may contain the id
     * @return null|string Null on failure to match a target param, the url's id on success
     */
    private static function parse_url_for_params($url, $target_params)
    {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_params );
        foreach ($target_params as $target) {
            if (array_key_exists ($target, $my_array_of_params)) {
                return $my_array_of_params[$target];
            }
        }
        return null;
    }

    /**
     * Find the last element in a url, without any trailing parameters
     *
     * @access private
     *
     * @param string $url The url
     * @return string The last element of the url
     */
    private static function parse_url_for_last_element($url)
    {
        $url_parts = explode("/", $url);
        $prospect = end($url_parts);
        $prospect_and_params = preg_split("/(\?|\=|\&)/", $prospect);
        if ($prospect_and_params) {
            return $prospect_and_params[0];
        } else {
            return $prospect;
        }
        return $url;
    }
}


// sort by date
add_action( 'pre_get_posts', 'arte365_change_sort_order');
function arte365_change_sort_order($query){
    if(is_archive() || is_search()):
        /* 2018-07-09 날짜 최신순 막기  */
        //$query->set( 'order', 'ASC' );
        $query->set( 'orderby', 'date' );
    endif;
};



function arte365_is_backend_login(){
    $ABSPATH_MY = str_replace(array('\\','/'), DIRECTORY_SEPARATOR, ABSPATH);
    return ((in_array($ABSPATH_MY.'wp-login.php', get_included_files()) || in_array($ABSPATH_MY.'wp-register.php', get_included_files()) ) || $GLOBALS['pagenow'] === 'wp-login.php' || $_SERVER['PHP_SELF']== '/wp-login.php');
}


/*
if (arte365_is_backend_login() && $_SERVER['SERVER_ADDR'] != '115.68.184.234' ) {

	 if(
		 $_SERVER[REMOTE_ADDR]!="58.127.42.72" &&
		 $_SERVER[REMOTE_ADDR]!="121.126.232.17" &&
		 $_SERVER[REMOTE_ADDR]!="183.109.79.73" &&
		 $_SERVER[REMOTE_ADDR]!="182.172.1.62" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.61" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.64" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.66" &&
		 $_SERVER[REMOTE_ADDR]!="125.132.186.22" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.65" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.55" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.57" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.62" &&
		 $_SERVER[REMOTE_ADDR]!="182.222.23.169" &&
		 $_SERVER[REMOTE_ADDR]!="110.12.44.143"  &&
		 $_SERVER[REMOTE_ADDR]!="220.88.94.160"  &&
		 $_SERVER[REMOTE_ADDR]!="59.11.97.122"  &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.44"  &&
		 $_SERVER[REMOTE_ADDR]!="121.125.129.172"  &&
		 $_SERVER[REMOTE_ADDR]!="1.224.138.187"  &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.59"  &&
		 $_SERVER[REMOTE_ADDR]!="175.114.48.164"  &&
		 $_SERVER[REMOTE_ADDR]!="1.225.178.67" &&
		 $_SERVER[REMOTE_ADDR]!="223.62.202.176" &&
		 $_SERVER[REMOTE_ADDR]!="125.186.164.206" &&
		 $_SERVER[REMOTE_ADDR]!="211.108.177.215" &&
		 $_SERVER[REMOTE_ADDR]!="180.71.182.142" &&
		 $_SERVER[REMOTE_ADDR]!="180.71.182.164" &&
		 $_SERVER[REMOTE_ADDR]!="211.108.177.214" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.178.19" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.38" &&
		 $_SERVER[REMOTE_ADDR]!="1.225.161.153" &&
 		 $_SERVER[REMOTE_ADDR]!="211.36.133.206" // 성재주임 임시 아이피
		 $_SERVER[REMOTE_ADDR]!="211.186.195.133"
	 ) {
		wp_die("허용된 아이피가 아닙니다.");
		exit;
	 }

}*/


// if (isset($_GET['test'])) {
// 	$query = new WP_Query(array('posts_per_page' => 2000, 'paged' => 1));

// 	if ( $query->have_posts() ) {
// 		// The Loop
// 		while ( $query->have_posts() ) {
// 			$query->the_post();
// 			echo '<li>' . get_the_ID() . '</li>';

// 			$post_id = get_the_ID();
// 			$viewcount = wpp_get_views($post_id);
// 			// $view_count = get_field('view_count', $post_id);
// 			// $view_count = ($view_count) ? intval($view_count) : 0 ;
// 			// $viewcount = intval($viewcount) + $view_count;
// 			update_post_meta($post_id, 'arte365_post_views', intval(str_replace(',', '', $viewcount)));

// 		}

// 		wp_reset_postdata();
// 	}

// 	die();
// }




function arte365_pagination($paged_key = 'paged') {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $PAGE_SIZE = (ARTE365_DEVICE_CODE == 'm') ? 5 : 10;
    $paged = get_query_var( $paged_key ) ? absint( get_query_var( $paged_key ) ) : 1;
    $max_page  = intval( $wp_query->max_num_pages );


    $start_page = floor( ($paged - 1) / $PAGE_SIZE  ) * $PAGE_SIZE + 1;
    $end_max_page = $start_page + $PAGE_SIZE - 1;
    $end_page = min($max_page, $end_max_page);



    echo '<div class="pagination"><ul>' . "\n";

    if ( $paged > $PAGE_SIZE ) {
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", 'first', esc_url( get_pagenum_link( 1 ) ), '<i class="icon-double-angle-left"></i> 처음' );
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", 'prev', esc_url( get_pagenum_link( $start_page - 1 ) ), '<i class="icon-angle-left"></i> 이전' );
    }

    for ( $i = $start_page ; $i <= $end_page ; ++ $i ) {
        $class = ($i == $paged) ? 'current' : '';
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $i ) ), $i );
    }

    if ( $end_page < $max_page ) {
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", 'next', esc_url( get_pagenum_link( $end_page + 1 ) ), '다음 <i class="icon-angle-right"></i>' );
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", 'last', esc_url( get_pagenum_link( $max_page ) ), '마지막 <i class="icon-double-angle-right"></i>' );
    }



    echo '</ul></div>' . "\n";

}

function arte365_pagination_new($paged_key = 'paged') {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $PAGE_SIZE = (ARTE365_DEVICE_CODE == 'm') ? 5 : 10;
    $paged = $_GET[$paged_key] ? absint( $_GET[$paged_key] ) : 1;
    $max_page  = intval( $wp_query->max_num_pages );


    $start_page = floor( ($paged - 1) / $PAGE_SIZE  ) * $PAGE_SIZE + 1;
    $end_max_page = $start_page + $PAGE_SIZE - 1;
    $end_page = min($max_page, $end_max_page);



    echo '<div class="pagination"><ul>' . "\n";

    if ( $paged > $PAGE_SIZE ) {
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", 'first', esc_url( get_pagenum_link_new( 1, $paged_key ) ), '<i class="icon-double-angle-left"></i> 처음' );
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", 'prev', esc_url( get_pagenum_link_new( $start_page - 1, $paged_key ) ), '<i class="icon-angle-left"></i> 이전' );
    }

    for ( $i = $start_page ; $i <= $end_page ; ++ $i ) {
        $class = ($i == $paged) ? 'current' : '';
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link_new( $i, $paged_key ) ), $i );
    }

    if ( $end_page < $max_page ) {
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", 'next', esc_url( get_pagenum_link_new( $end_page + 1, $paged_key ) ), '다음 <i class="icon-angle-right"></i>' );
        printf( '<li class="%s"><a href="%s">%s</a></li>' . "\n", 'last', esc_url( get_pagenum_link_new( $max_page, $paged_key ) ), '마지막 <i class="icon-double-angle-right"></i>' );
    }



    echo '</ul></div>' . "\n";

}

function get_pagenum_link_new( $pagenum = 1, $paged_key = 'paged', $escape = true ) {
    global $wp_rewrite;

    $pagenum = (int) $pagenum;

    $request = remove_query_arg( $paged_key );

    $home_root = parse_url( home_url() );
    $home_root = ( isset( $home_root['path'] ) ) ? $home_root['path'] : '';
    $home_root = preg_quote( $home_root, '|' );

    $request = preg_replace( '|^' . $home_root . '|i', '', $request );
    $request = preg_replace( '|^/+|', '', $request );

    if ( ! $wp_rewrite->using_permalinks() || is_admin() ) {
        $base = trailingslashit( get_bloginfo( 'url' ) );

        if ( $pagenum > 1 ) {
            $result = add_query_arg( $paged_key, $pagenum, $base . $request );
        } else {
            $result = $base . $request;
        }
    } else {
        $qs_regex = '|\?.*?$|';
        preg_match( $qs_regex, $request, $qs_match );

        if ( ! empty( $qs_match[0] ) ) {
            $query_string = $qs_match[0];
            $request      = preg_replace( $qs_regex, '', $request );
        } else {
            $query_string = '';
        }

        $request = preg_replace( "|$wp_rewrite->pagination_base/\d+/?$|", '', $request );
        $request = preg_replace( '|^' . preg_quote( $wp_rewrite->index, '|' ) . '|i', '', $request );
        $request = ltrim( $request, '/' );

        $base = trailingslashit( get_bloginfo( 'url' ) );

        if ( $wp_rewrite->using_index_permalinks() && ( $pagenum > 1 || '' != $request ) ) {
            $base .= $wp_rewrite->index . '/';
        }

        if ( $pagenum > 1 ) {
            $request = ( ( ! empty( $request ) ) ? trailingslashit( $request ) : $request ) . user_trailingslashit( $wp_rewrite->pagination_base . '/' . $pagenum, $paged_key );
        }

        $result = $base . $request . $query_string;
    }

    /**
     * Filters the page number link for the current request.
     *
     * @since 2.5.0
     * @since 5.2.0 Added the `$pagenum` argument.
     *
     * @param string $result  The page number link.
     * @param int    $pagenum The page number.
     */
    $result = apply_filters( 'get_pagenum_link', $result, $pagenum );

    if ( $escape ) {
        return esc_url( $result );
    } else {
        return esc_url_raw( $result );
    }
}



function arte365_search_page($query) {
    if ( $query->is_main_query() && is_search() ) {
        if ( isset($_GET['term_id']) && $_GET['term_id'] != '') {
            // $tax_query = array(
            //     array(
            //         'cat' => $_GET['term_id'],
            //         'exclude' => array(2806),
            //     )
            // );
            // $query->set( 'cat', $tax_query );
            $query->set('cat', $_GET['term_id']);
        }
    }
    return $query;
}
add_filter( 'pre_get_posts','arte365_search_page' );


add_filter('acf/settings/remove_wp_meta_box', '__return_false');

/*main 최신기사*/
add_action( 'wp', 'wpse_check_home' );
function wpse_check_home() {
    if ( is_home()  ||  is_front_page() || is_single() )
        add_action( 'wp_enqueue_scripts', 'get_Mainpost' );
}

function get_Mainpost() {

    wp_enqueue_script( 'mainpost_ajax_plugin',  get_stylesheet_directory_uri() . '/js/get_mainpost.js', array( 'jquery' ) );

    wp_localize_script('mainpost_ajax_plugin', 'mainPostAjax', array(
        'ajaxurl' =>admin_url( 'admin-ajax.php' ),
    ),false,true ); // mainPostAjax.ajaxurl에 admin-ajax.php url 입력하고 해당 문자열은 위의 mainpost_ajax_plugin 핸들을 사용한 스크립트에 반영됩니다.
}


function arr_sort($array, $key, $sort='asc') //정렬대상 array, 정렬 기준 key, 오름/내림차순
{

    $keys = array();

    $vals = array();

    foreach ($array as $k=>$v)

    {

        $i = $v[$key].'.'.$k;

        $vals[$i] = $v;

        array_push($keys, $k);

    }

    unset($array);



    if ($sort=='asc') {

        ksort($vals);

    } else {

        krsort($vals);

    }



    $ret = array_combine($keys, $vals);

    unset($keys);

    unset($vals);



    return $ret;

}


function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function wpdocs_custom_excerpt_length( $length ) {
    return 80;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/*검색정렬*/
function my_search_query( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
        if ( is_search() ) {
            $query->set( 'orderby', 'date');
        }
    }
}
add_action( 'pre_get_posts', 'my_search_query' );

/*검색정렬 끝*/

/** 이전글, 다음글 코드 **/
add_filter( 'get_next_post_join', 'navigate_in_same_taxonomy_join', 20);
add_filter( 'get_previous_post_join', 'navigate_in_same_taxonomy_join', 20 );
function navigate_in_same_taxonomy_join() {
    global $wpdb;
    return " INNER JOIN $wpdb->term_relationships AS tr ON p.ID = tr.object_id INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";
}
add_filter( 'get_next_post_where' , 'navigate_in_same_taxonomy_where' );
add_filter( 'get_previous_post_where' , 'navigate_in_same_taxonomy_where' );
function navigate_in_same_taxonomy_where( $original ) {
    global $wpdb, $post;
    $where   = '';
    $taxonomy   = 'category';
    $op   = ('get_previous_post_where' == current_filter()) ? '<' : '>';
    $where   = $wpdb->prepare( "AND tt.taxonomy = %s", $taxonomy );
    if ( ! is_object_in_taxonomy( $post->post_type, $taxonomy ) )
        return $original ;

    $term_array = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );

    $term_array = array_map( 'intval', $term_array );

    if ( ! $term_array || is_wp_error( $term_array ) )
        return $original ;

    $where   = " AND tt.term_id IN (" . implode( ',', $term_array ) . ")";
    return $wpdb->prepare( "WHERE p.post_date $op %s AND p.post_type = %s AND p.post_status = 'publish' $where", $post->post_date, $post->post_type );
}

/*main 동영상*/
function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 4;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        //'post_type' => 'post',
        'post_status' => array('post'),
        'post_status' => array('publish'),
        'posts_per_page' => $ppp,
        'order' => 'DESC',
        'orderby' => 'date',
        'cat' => 11856,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
        echo '<div class="post-item movie-item clearfix wow fadeInUp swiper-slide">';
        $out .= get_template_part('partials/post', 'movieitem');
        echo '</div>';

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


/*function highlight_results($text){
    if(is_search()){
		$keys = implode('|', explode(' ', get_search_query()));
		$text = preg_replace('/(' . $keys .')/iu', '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}

add_filter('the_content', 'highlight_results');
add_filter('the_excerpt', 'highlight_results');
add_filter('the_title', 'highlight_results');
add_filter('small_title', 'highlight_results');

function highlight_results_css() {
	?>
	<style>
	.search-highlight { background-color:#FF0; font-weight:bold; }
	</style>
	<?php
}
add_action('wp_head','highlight_results_css');*/


/* 썸네일 이미지 url 가져오기 */
function get_the_post_thumbnail_src($img)
{
    return (preg_match('~\bsrc="([^"]++)"~', $img, $matches)) ? $matches[1] : '';
}



function bg_recent_comments($no_comments = 5, $comment_len = 80, $avatar_size = 48) {
    $comments_query = new WP_Comment_Query();
    $comments = $comments_query->query( array( 'number' => $no_comments ) );
    $comm = '';
    if ( $comments ) : foreach ( $comments as $comment ) :
        $comm .= '<li><a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '">';
        $comm .= get_avatar( $comment->comment_author_email, $avatar_size );
        $comm .= get_comment_author( $comment->comment_ID ) . ':</a> ';
        $comm .= '<p>' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '...</p></li>';
    endforeach; else :
        $comm .= 'No comments.';
    endif;
    echo $comm;
}