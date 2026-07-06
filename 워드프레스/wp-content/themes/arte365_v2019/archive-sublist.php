<?php get_header(); ?>

<div class="container subject list">
	<div class="subject_cat">
		<div class="archive-header">
			<h1 class="category-name">주제별 기사</h1>
			<p class="category-description">아르떼365 기사들을 주제별로 분류해놓았습니다.</p>
		</div>
		<?php
			$subjects = new WP_Query( array( 'post_type' => 'sublist', 'page_id' => $_GET['s_post'], 'orderby' => 'post__in' )); //주제별
			if ( $subjects->have_posts() ) :
				$subjects->the_post();
				$posts_val=get_field('subject_post_id'); //추가필드 post아이디
				$posts_arr = explode(",", $posts_val);
				$posts_count=count($posts_arr);
				$subjects_id=get_the_ID();

				$sub_posts = new WP_Query( array( 'post_type' => 'post', 'post__in' => $posts_arr, 'orderby' => 'post__in','posts_per_page'=>$posts_count )); //주제별
		?>
		<div class="archive-body">
			<div class="cat_wrap">
				<button type="button" class="subject_all" onclick="location.href='/?post_type=subject&amp;as_post=74562';">주제별 전체기사</button>
				<div class="category-name">
					<h3 >
						<?php the_title();?>
					</h3>
					</div>
					<?php
						if ( $sub_posts->have_posts() ) :
							$post_num=0;
							$ul_num=1;
					?>
					<ul class="clearfix">
						<?php
							while ( $sub_posts->have_posts() ) :
								$sub_posts->the_post();
						?>
						<li>
							<a href="<?php the_permalink();?>">
								<?php echo get_the_post_thumbnail(null,'full','');?>
								<span class="post-category"><?php the_arte365_get_category_string();?></span>
							</a>
							<div class="post-desc">
								<p class="sub_title"><?php the_title();?></p>
								<?php 
								$small_title = get_field('small_title');
								 //echo $small_title;
								?>
								<p class="post-small-title"><?php echo $small_title;?></p>

								<?php
								$publisher = get_field('publisher');
								if ($publisher && $publisher != '') :
								?>
								<span class="publisher"><?php echo $publisher;?></span>
								<?php
								endif;
								?>

								<span class="post-date"><?php the_time( 'Y.m.d.' ) ; ?></span>
							</div>
						</li>
						<?php
							endwhile;
						?>
					</ul>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>

	</div>
</div>


<?php get_footer(); ?>