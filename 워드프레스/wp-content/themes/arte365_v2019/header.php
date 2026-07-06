<?php
// if ( $_SERVER['SERVER_ADDR'] != '115.68.184.234' && !is_super_admin() ) {
//   wp_redirect('/');
// }
?>
<!DOCTYPE html>
<html lang="ko"	prefix="og: http://ogp.me/ns#" class="no-js">
<!-- <html <?php language_attributes(); ?> class="no-js"> -->
<!--<![endif]-->

<head>
<title>문화예술교육 전문 웹진 : 아르떼365</title> 
<meta property="og:type" content="website"> 
<meta property="og:title" content="<?php 
	// 2026.06.16 수정: 상세 기사 페이지(single)인 경우 메타 타이틀을 해당 기사의 제목으로 동적 로드
	if ( is_single() ) {
		single_post_title();
	} else {
		echo '아르떼365';
	}
?>">
<meta property="og:description" content="한국문화예술교육진흥원 웹진, 문화예술교육 사례/아이디어/리포트/컬럼/인터뷰/지원정책">
<meta property="og:image" content="<?php the_post_thumbnail_url();?>">
<!-- <meta property="og:url" content="https://arte365.kr/"> -->

<!-- <meta charset="<?php bloginfo( 'charset' ); ?>"> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="format-detection" content="telephone=no,address=no,email=no">

<meta name="google-site-verification" content="agQrIA7AvvEC3T4KJQyZYnYAaQGqIIJicTAP8XhMq5k" />
<?php if ( is_search() ) : ?>
    <meta name="robots" content="noindex, follow">
<?php endif; ?>
<?php if ( ARTE365_DEVICE == 'desktop') : ?>
<meta name="viewport" content="width=1180">
<?php else :?>
<meta name="viewport" content="width=device-width, user-scalable=0">
<?php endif; ?>
 <title><?php wp_title(); ?></title> 
<!--<title>아르떼365</title>-->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" href="/wp-content/themes/arte365_v2019/css/bootstrap.min.css">
<link rel="stylesheet" href="/wp-content/themes/arte365_v2019/css/animate.css">
<link rel="stylesheet" href="/wp-content/themes/arte365_v2019/css/swiper.min.css">
<?php wp_head();?>
<link rel="stylesheet" href="/wp-content/themes/arte365_v2019/css/n-style.css?asdfi20200716">
<link rel="stylesheet" href="/wp-content/themes/arte365_v2019/css/print.css" type="text/css" media="print">
<script>
	window.admin_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
	window.template_directory_uri = '<?php echo get_template_directory_uri();?>';
</script>
<script src="/wp-content/themes/arte365_v2019/js/bootstrap.min.js"></script>
<script src="/wp-content/themes/arte365_v2019/js/swiper.min.js"></script>
<script src="/wp-content/themes/arte365_v2019/js/wow.min.js"></script>
<script src="/wp-content/themes/arte365_v2019/js/jquery.rwdImageMaps.min.js"></script>
<script src='/wp-content/themes/arte365_v2019/js/anime.min.js'></script>
<script src="https://unpkg.com/scrollreveal"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-89RJQDSNGN"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GZNEFJH3NW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-89RJQDSNGN');
  gtag('config', 'G-GZNEFJH3NW');
</script>
<!-- Google tag (gtag.js) -->
	
<script type="text/javascript" src="//wcs.pstatic.net/wcslog.js"></script>
<script type="text/javascript">
if(!wcs_add) var wcs_add = {};
wcs_add["wa"] = "19b9d87d2b4c8c0";
if(window.wcs) {
wcs_do();
}
</script>

</head>

<body <?php body_class( ARTE365_DEVICE  ); ?>>
	<div class="wrapper">

        <?php get_template_part('partials/layout/header', ARTE365_DEVICE_CODE);?>
        <!-- main -->
        <div id="main">