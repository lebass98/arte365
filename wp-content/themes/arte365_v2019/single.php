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
	<link href="https://hangeul.pstatic.net/hangeul_static/css/maru-buri.css" rel="stylesheet">
	<div class="container single">
		<article <?php post_class( 'arte365-post-single' ); ?> >
			<div class="post-header">
				<div class="m_thumb">
					<?php the_post_thumbnail('full'); ?>	
				</div>
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
				<?php get_template_part('sns', 'linkerM');?>
			</div>

			<?php get_template_part('sns', 'linker');?>
			<div class="post-body">
				<div class="post-content">
					<?php the_content();?>
					<div class="post-tags">
						<div class="inner">
							<h2 class="tags-title">#</h2>
							<?php the_tags( '<div class="tag-links">', '<span class="split"></span> ', '</div>' ); ?>
						</div>
					</div>

					<div class="like_wrap">

						
							<div class="click_like"><p class="txt">기사가 좋았다면 눌러주세요!</p><div>
							<div class="click_like"><p class="txt">기사가 좋았다면 눌러주세요!</p><div>
							<?php
								//좋아요 불러 오기
								//83857 post count_distinct_like 0
								global $wpdb;
								$result = $wpdb->get_row( $wpdb->prepare( "SELECT meta_value FROM `wp_ulike_meta` WHERE item_id = '%s'", $p ) );
							?>
							<span id="like_count" style="display: none"><?php echo $p;?></span>
							<div class="wrap">
								<div class="stepper" style="">

									<svg class="minus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="54px" height="54px"><image x="0px" y="0px" width="54px" height="54px" xlink:href="data:img/png;base64,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"/></svg>

									<svg class="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="54px" height="54px" style="transform: scale(0);"><image x="0px" y="0px" width="54px" height="54px" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADYAAAA2CAMAAAC7m5rvAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACtVBMVEUAAAD/dmcAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA5GhfiaVv1cWP5c2X9dWb+dmf/dmf7dGX4c2TxcGHYZFciEA4AAADMXlL4c2T+dmf9dWbxcGGuUUYAAADCWk74c2T/dmfycGKKQDgAAAAAAADxcGH+dmf9dWbeZ1oAAABdKyb4c2TxcGEsFBIAAACWRT37dGX1cWNVJyL7dGX0cWMmEg8AAAD4c2TubmAAAADvb2HSYVW6Vkv9dWZyNS7pbF4AAAAAAADJXVH/dmf+dmeEPTUAAAAAAAD0cWPiaVsAAAAuFRP9dWb6dGUOBgYAAADbZVilTEPxcGHXY1cAAAAAAADsbV8AAAAAAAAAAAD7dGX2cmMAAAAAAAD+dmf7dGUAAAD+dmcAAAAAAAAAAAAAAAD9dWYAAAAAAAD6dGX1cWP1cWPoa17qbF/PYFTGXFCURDwYCwr8dWb4c2QKBQTqbF/WY1YAAACVRTxfLCYAAADsbV/dZlkAAABxNC5GIBzQYFS1VEkAAADcZlkAAAAAAAAsFBLwb2Hna10aDAsAAAA+HRnwb2Hoa14oExAAAAAiEA7na13cZlkVCggAAADFW1D7dGX6dGWzU0gAAABZKSTkalzcZllGIBxsMizbZVj6dGX4c2TTYlVaKiQAAAALBQSXRj3QYFTzcGL7dGXmal3MXlKOQjkJBAQAAAD/dmf/nJH/29f/+vr/////7ev/vLT/fW//e2z/tq//5+T//Pv/9fT/1dH/l4z/u7P/6+j/hHb/gXP/5uP/ta3/n5X/2tb/1tL/39v/3Nj/+/v//v7/x8H/ycP/j4L/j4P/y8b/zMb/fnD/7uz/f3H/joH/9/f/joL/lIj/kIT/8fD/7u3/g3X/3tv/gHL/eGn/urP//f3/d2j/4d7/2dX/in2cJdogAAAAsXRSTlMAAAECAwQFBgcICQoJPn2w1O741bF/QQ8LI4vj5I8pDRmZ+Z0jDgxb7O1kEQuboBcQEba6HrS5GxKcoxddbBrvL6YbFSb6+zoZE42YHgvl6CQUQFWAjiEauiQdD9bbJx/t8Cn6KyMsHO4tJdfcs72ElEhfFebpNJOhMDBLLqGuMytFbH8msTUiI7zDPDIpwcZAICaosDwocu/wfzc5qa9JQp7p6qRPNi9dlNzyv5djOTT2nb4gAAAAAWJLR0S1Mw5aSwAAAAd0SU1FB+UGCQotKRca3e4AAAQCSURBVEjHlZb3nxNFGMbvLtmSiQ1EXesquie6oIeKRldFsnJmNZZYEjfRHCS5hByIvURPg3peVA70LNh7B9ugOdvZUBQQO3A0e/k7nJlNdibZTVaen/azz34/7zvvzL7zdnS4qstWx/8U/tbn8/mJ0IMH20mEGb+f43heQOJ5jkMsetnZ2QazGF4QAwAEkQAIiAJvkS0xCxJ2232PPfeaNHnypL2n7LPvflIQiEIbkFCcsP8BB0JGBx18iCyBAALdOQLxhx42FTZp6uFHKN1A5F1BK9SR06CLjjpaVSTXgISaPgO20DHH9qCATg5R/MzjYEsdf4IqB0UecU0UN30WbKMTTwopQRKPTdHPiSfDtjpFszgmzS4fJ5wKPXSaFpKBwNFweGGnT/PCZp+hqd0BZnk4xRleFIRzwnqPhNO0gwlnzvXGes+KGAoQ6uFQsMDZ3hSE50RxmrVwqIzCuedRc/U771bH3nsfwg8+/Gj8408+pc75F4RjOBwpJiqjeCH1PqsSfb7miy+tp7XUuwiFQ6sjWXb5eXCx7XxVrenrdfWn1bZ5STxhyID3W5gQnGI766sObbDNS82kngoKBEM5SpfZzrgT+8Y2L0/3WVmSpQXkebaz0YlttM35mXgkJAfw4rp8PJDpvznmxMZsM5vrJ4vDGKqIQrFvndh3FMubBbQFuCa4IqkFtvO9M8sfaJLFgUKtJgRbSPfmx2bqJ+otKg4kWewKav28qZHatJl6i5uwK5mTt2WCpSa2MtZVbJKoJFezJ3Ybw01sY51rmJLgDbj2OtbdvqNO7WRjwetvYDYAb3foxoY/5Jdfa8fqt4bXN5XodpPDpd6cbfjg9z/+rFbH1/7V8DJ7yyA9XFZN9Ftho7b//c+/Ta9uK+eZo4xrIhtLFkAPzb8d5cj8OCRL7Q4v7M5ycYj9TVGWQIkl5rSn7houZSpMUyAtqFvV7r6nHXXv0pGcybYg0vCAYkSWLW9N3Xd/uZgebWh4pL1KPXr4gQdbUQ89XB5cUWlsr6SZ4zQLlUcedYMee/wJTBWamjm5OoAc0pKVJ5/KNkPZp58ZHimuqCSbrw7rogoqIRQv/exzz7PQCy++9HK5lEujWI6LiqRJuPComXnl1dcWr1zV27tq5etvvPnWcLlUzJijYUK5XKeIk1U9Eq0MZfKDpZHy20jlkdJgPjNUiUZ0t0uYXPm8CLp7DC0cjZvpTC5fRMrnMmkzHg1rBr7y+RajghCQFDWmJZJ98X5zAMnsj/clE1qs1YBRH2dQQEU1dC2SKBSSyUIhEdF0Q209ztCAQJJTasiI6UgxI6Sm2g5PNQ6BIghKsqykkBRZ9hrVKLhLg2EddB9DO7y0i0Ovg203Yv8HGQPtj9KfzCEAAAAASUVORK5CYII="/></svg>
								
									<div class="circle white"></div>
									<div class="like_txt">
										<p>좋아요</p>
										<span class="count active"><?php echo number_format($result->meta_value);?></span>
									<div>
								</div>
							</div> 
					</div>


				</div>
			</div>
			
			<div class="post_move next on">
				<?php
					$prevPost = get_previous_post();

					
					if(isset($prevPost->ID)){ 
						$prevThumbnail = get_the_post_thumbnail( $prevPost->ID );
					}
					$nextPost = get_next_post();
					 if(isset($nextPost->ID)){  
						$nextThumbnail = get_the_post_thumbnail( $nextPost->ID );
					 }
				?>
				<!-- <p class="link_cont">
					<?php next_post_link('%link', "$nextThumbnail<span>%title</span>"); ?>
				</p> -->
				<p>
					<?php if(isset($nextPost->ID)){   next_post_link('%link', "$nextThumbnail<span>%title</span>"); }else{ echo "<span>다음 글이 없습니다</span>"; } ?>
				</p>
			</div>
			<div class="post_move prev on">
				<p>
					<?php if(strlen($prevPost->ID)>0){  previous_post_link( '%link', "$prevThumbnail<span>%title</span>"); }else{ echo "이전 글이 없습니다"; } ?>
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

    <div class="subject-posts subject-posts__corner">
        <div class="subject-posts_inner">
            <div class="subject-posts_tit__box">
                <h3>코너별 기사보기</h3>
				
				<!--- 이재광 2025.3.19 [더보기 링크 카테고리 이동] 시작 --->
				<?php
					$catego = get_the_category();
					$categoNum =  $catego[0]->term_id;
					?>
                <!-- <button type="button" onclick="location.href='/?post_type=subject&amp;as_post=';" title="더보기">더보기</button>   -->
                 <button type="button" onclick="location.href='/?cat=<?php echo $categoNum;?>';" title="더보기">더보기</button>
				
				<!--- 이재광 2025.3.19 [더보기 링크 카테고리 이동] 끝  --->
            </div>
            <div class="posts-box posts-box_pc">
				<?php
					$postsPerPage = 5;
					$catego = get_the_category();
					$categoNum =  $catego[0]->term_id;
					
					$args = array(
						'post_status' => 'publish',
						'posts_per_page' => $postsPerPage,
						'category__in' => $categoNum,
					);

					$query = new WP_Query($args);

					if ($query->have_posts()) :
						while ($query->have_posts()) : $query->the_post();
							// Set the link and target for each post within the loop
							$post_link = get_permalink();
							$ex_link = get_field('ex_link'); // External link (if applicable)
							$post_target = $ex_link ? 'target="_blank"' : 'target="_self"';
				?>
				 <!-- <?php echo $categoNum;?> -->
				<div class="posts-cont">
					<a class="other_post" href="<?php echo $post_link ?>" <?php echo $post_target?>  target="_self" title="기사 클릭 페이지 이동 ">
						<?php if(has_post_thumbnail()) : ?>
							<div class='post-tb'>
									<?php the_post_thumbnail('full'); ?>	
							</div>
						<?php endif; ?>
						<div class="posts-top">
							<span class="posts-r"><?php the_arte365_get_category_string();?></span>
							<p class="post-title"><?php the_title();?></p>
						</div>
						<?php 
						$small_title = get_field('small_title');
						 //echo $small_title;
						?>
						<div class="posts-bottom">
							<?php
								$publisher = get_field('publisher');
								$small_title = get_field('small_title');
								if ($publisher && $publisher != '') :
								?>
								<p class="post-small-title"><?php echo $small_title;?></p>
								<p class="publisher"><?php echo $publisher;?></p>
								<span class="post-date"><?php the_time( 'Y.m.d.' ) ; ?></span>
							<?php
							endif;
							?>
						</div>
					</a>
				</div>
				<?php
					endwhile;
					wp_reset_postdata();
					endif;
				?>
			</div>
		</div>
	</div>

    <div class="related-posts single-post">
        <div class="related-posts_inner">
            <div class="related-posts_tit__box">
                <h3>최신기사</h3>
                <button type="button" onclick="location.href='/?page_id=74904';" title="더보기">더보기</button>
            </div>
			<div id="ajax-posts" class="post-list is-parent-category">
				<?php
					$postsPerPage = 5;
					$args = array(
							//'post_type' => 'post',
							'post_status' => array('post'),
							'post_status' => array('publish'),
							'posts_per_page' => $postsPerPage,
							//'nopaging' => true,
							//'orderby' => 'date',
							'cat' => array(2815, 6188, 6189, 2808, 2810),
					);
			
					$loop = new WP_Query($args);
			
					while ($loop->have_posts()) : $loop->the_post();
				?>
					<?php get_template_part('partials/post', 'item');?>
			
				<?php
						endwhile;
				wp_reset_postdata();
				?>
			</div> 
        </div>
    </div>


	<div class="comment-bg"></div>
    <div class="comment-wrap">
        <h2>비밀번호 확인</h2>
        <div class="search-form">
            <div class="btn_close"></div>
            <div class="input-block pw">
                <label for="" class="n2"></label>
                <input id="comment_action" class="comment-input" type="hidden" value="" aria-required="true">
                <input id="comment_no" class="comment-input" type="hidden" value="" aria-required="true">
                <input id="comment_pw" placeholder="비밀번호를 입력해 주세요." class="comment-input" type="password" value="" aria-required="true">
            </div>
            <p class="form-submit">
                <input type="submit" id="checkCommentPw" class="submit" value="확인">
            </p>
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

	  // 2026.06.16 수정: 브라우저 상에서 h1.post-title의 기사 제목을 가져와 og:title 메타태그의 content 값으로 교체
	  var postTitle = jQuery('.post-title').text().trim();
	  if (postTitle) {
		jQuery('meta[property="og:title"]').attr('content', postTitle);
	  }

	});
	
</script>



<?php endif ;?>