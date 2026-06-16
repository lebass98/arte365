<?php
error_reporting(E_ALL);

ini_set("display_errors", 1);



add_action( 'wp_ajax_hwangcGetPost', 'ajax_hwangcGetPost');
add_action( 'wp_ajax_nopriv_hwangcGetPost', 'ajax_hwangcGetPost' );
 
function get_main_Sortpost() {
  /*  if ( ! empty( $_GET['post_id'] ) ) {
        $post = get_post( $_GET['post_id'] );
 
        echo json_encode( $post );
    }*/

	echo "안녕";
 
    wp_die();
}

function get_main_movieSortpost() {
    /*  if ( ! empty( $_GET['post_id'] ) ) {
          $post = get_post( $_GET['post_id'] );
   
          echo json_encode( $post );
      }*/
  
      echo "안녕";
   
      wp_die();
  }

?>

