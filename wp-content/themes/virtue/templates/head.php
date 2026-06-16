<?php 
/**
 * Head Template
 *
 * @version 3.2.5
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> <?php kadence_html_tag_schema();?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="http://arte365.nisus.kr/wp-content/themes/virtue/assets/css/swiper.min.css">
  <script type="text/javascript" src="http://arte365.nisus.kr/wp-content/themes/virtue/assets/js/swiper.min.js"></script>
</head>
