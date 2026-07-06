<?php get_header(); ?>


	<?php if( have_posts() ) : the_post();?>
	
	<?php
	$publisher = get_field('publisher');

	$post_categories = get_the_category();
	$category_name = $post_categories[0]->name;
	foreach( $post_categories as $category ) {
		if ( $category->parent > 0 ) $category_name = $category->name;
	}
	?>
	<div class="container single">
		<article <?php post_class( 'arte365-post-single' ); ?> >
			<div class="post-header">
				<div class="post-top">
					<div class="post-category">
						<!-- <?php the_category();?> -->
						<!-- <span class="post-category"><?php the_arte365_get_category_string();?></span> -->
						<span class="cap_category"><?php the_arte365_get_category_string();?></span>
					</div>
					<div>
						<h1 class="post-title"><?php the_title();?></h1>
						<p class="post-small-title"><?php the_field('small_title');?></p>
					</div>
				</div>
				<div class="post-meta clearfix">
					<div class="inner">
						<div class="pull-left">
							<?php if ( $publisher && $publisher != '') :?>
							<span class="publisher"><?php echo $publisher;?></span>
							<?php endif; ?>
						</div>
						<div class="pull-right">
							<span>
							<!-- <span class="hide-mobile"> -->
								<span class="post-date"><?php the_time('Y.m.d.');?></span>
								<span class="comment">댓글 <strong><?php comments_number(__('0','arte365'),__('1','arte365'),__('%','arte365'),''); ?></strong></span>  
								<span class="hit">조회수 <strong><?php echo number_format(get_field('arte365_post_views'));?></strong></span>
							</span>
							
							<!-- <div  id="addon">
								<img src="/wp-content/themes/arte365_v2017/img/icon/btn-addon.jpg" alt="addon" />
							</div> -->
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part('sns', 'linker');?>
			<div class="post-body">
				<div class="post-content">
					<?php the_content();?>
					<div class="post-tags">
						<h2 class="tags-title">태그</h2>
						<?php the_tags( '<div class="tag-links">', '<span class="split">,</span> ', '</div>' ); ?>
					</div>
				</div>
			</div>
			
			<div class="post_move next">
				<?php
					$prevPost = get_previous_post();
					$prevThumbnail = get_the_post_thumbnail( $prevPost->ID );
					$nextPost = get_next_post();
					$nextThumbnail = get_the_post_thumbnail( $nextPost->ID );
				?>
				<p class="link_cont">
					<?php next_post_link('%link', "$nextThumbnail<span>%title</span>"); ?>
				</p>
				<p class="nopost"></p>
			</div>
			<div class="post_move prev">
				<p>
					<?php previous_post_link( '%link', "$prevThumbnail<span>%title</span>"); ?>
				</p>
			</div>
		</article>
	</div>


	<div class="post-comment pc">
		<div class="container" style="width:1400px;margin:0 auto">
			<?php comments_template('',true); ?>
		</div>
	</div>

	<div class="post-comment bar_mobile">
		<div class="container" style="width:100%;">
			<?php comments_template('',true); ?>
		</div>
	</div>


	<div class="related-posts pc" >
		<div class="container" style="width:1400px;margin:0 auto">
			<h3>최신기사</h3>
			<div class="related-post-list clearfix">
			<?php
			$categories = wp_get_post_categories(get_the_ID());
		
			if ($categories) {
				
				$args=array(
					'category__in' => $categories,
					'post__not_in' => array(get_the_ID()),
					'posts_per_page'=>3,
					'caller_get_posts'=>1
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) :
				?>
				<div class="post-list">
		
				<?php
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php get_template_part('partials/post', 'related');?>
				<?php
				endwhile;
				?>
				</div>
				<?php
				endif;
			wp_reset_query();
			}
			?>
			</div>

		</div>
	</div>


	<div class="related-posts bar_mobile" >
		<div class="container" style="width:100%;">
			<h3>최신글보기</h3>
			<div class="related-post-list clearfix">
			<?php
			$categories = wp_get_post_categories(get_the_ID());
		
			if ($categories) {
				
				$args=array(
					'category__in' => $categories,
					'post__not_in' => array(get_the_ID()),
					'posts_per_page'=>3,
					'caller_get_posts'=>1
				);
				$my_query = new WP_Query($args);
				if( $my_query->have_posts() ) :
				?>
				<div class="post-list">
		
				<?php
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<?php get_template_part('partials/post', 'related');?>
				<?php
				endwhile;
				?>
				</div>
				<?php
				endif;
			wp_reset_query();
			}
			?>
			</div>

		</div>
	</div>

<!--  조회수 카운터 소스  -->
<?php
	$post_id = get_the_ID();
	$viewcount = wpp_get_views($post_id);
	$arte365_post_views = get_post_meta($post_id, 'arte365_post_views', true);
	if ( $arte365_post_views ) {
		$viewcount = intval($arte365_post_views) + 1;
	} else {
		$viewcount = intval(str_replace(',', '', $viewcount));
	}
	update_post_meta($post_id, 'arte365_post_views', $viewcount);
?>
<!--  /조회수 카운터 소스  -->

<?php get_footer(); ?>

<script>
	jQuery(document).ready(function() {
	  jQuery("#send_email").click(function() {

		//jQuery("h2").css({ "color" : "red" });
		//alert("메일발송");
		
		var mail_cotent="<?php echo (single_post_title( '', false ).'| '.get_bloginfo('name'))?> <?php echo urlencode(get_permalink())?>";
		//alert(mail_cotent);
		window.location.href= 'mailto:?body='+mail_cotent;
	  });
	});
	
</script>



<?php endif ;?>