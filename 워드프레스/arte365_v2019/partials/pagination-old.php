<?php

global $wp_query; 

$big = 999999999; 
$total_pages = $wp_query->max_num_pages;
?>


<?php
if ( $total_pages > 1 ) {
	
		$current_page = max( 1, get_query_var( 'paged' ) );
		$args = array(
			'base' 		   => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' 	   => '/page/%#%',
			'total'        => $total_pages,
			'current'      => $current_page,
			'show_all'     => false,
			'end_size'     => 2,
			'mid_size'     => 2,
			'prev_next'    => false,
			'prev_text'    => '&lt;',
			'next_text'    => '&gt;',
			'type'         => 'list',
			'add_args'     => False,
			'add_fragment' => ''
		);?>
			<div class="pagination">
			        <?php $pagination = paginate_links( $args );						
						$pagination = str_replace( "<ul class='page-numbers'>", '<ul class="page-pagination">', $pagination ); 
						$pagination = str_replace( "<li><span class='page-numbers current'>", '<li class="page-selected"><a href="#">', $pagination );
						$pagination = str_replace( '</span></li>', '</a></li>', $pagination );						
						print $pagination ?>
						</div>
	
<?php 
}