
<div class="post-item clearfix" >

	<article class="post" id="post-<?php the_ID(); ?>">
		<?php
			$ex_link=get_field('ex_link'); //외부링크
			$post_target='';
			$post_link=get_permalink();
			$catego = get_the_category();
			$categoNum =  $catego[0]->term_id;
			if($categoNum =='2806' && strlen($ex_link)>0){
				$post_link=$ex_link;
				$post_target=" target='_blank'  title='새창 열림'";
			}else if($categoNum =='11856' && strlen($ex_link)>0){
				$post_link=$ex_link;
				$post_target=" target='_blank' title='새창 열림'";
			}
		?>
		
		
		<?php
			if($categoNum =='2806'){
		?>
		<!-- 현장기사 -->
		<a href="<?php echo $post_link ?>" <?php echo $post_target?> >
		<div class="post-desc note">
			<?php 
				$capt_cat = get_field('caption_cat');
				$capt_text = get_field('caption_text');
			?>
			<span class="<?php echo $capt_cat;?>">
				<?php echo $capt_text;?>
			</span>
			<span class="post-category">
				<?php the_arte365_get_category_string();?>
			</span>
			<h3 class="post-title"><?php the_title();?></h3>
			
			<?php 
			$small_title = get_field('small_title');
			?>
			
			<p class="post-small-title"><?php echo $small_title;?></p>

			<div class="post-news-cont">
			<?php the_excerpt(); ?>
			</div>
			
			
			<div class="post-meta">
				<?php
				$publisher = get_field('publisher');
				if ($publisher && $publisher != '') :
				?>
				<span class="publisher"><?php echo $publisher;?></span>
				<?php
				endif;
				?>

				<div class="news_only">
				등록일: <?php the_time( 'Y.m.d.' ) ; ?> &middot; 댓글 : <?php comments_number(__('0','arte365'),__('1','arte365'),__('%','arte365'),''); ?> &middot; 조회수 <?php echo number_format(get_field('arte365_post_views'));?>
				</div>
			</div>
			<span class="post-date"><?php the_time( 'Y.m.d.' ) ; ?></span>
		</div>
		</a>

		
		<?php
			}else if($categoNum =='11856'){
		?>
		<!-- 동영상 -->
		<div>
			<a class='modal-link play_video_modal' data-hash="video-<?php the_ID(); ?>">
				<?php if(has_post_thumbnail()) : ?>
					<div class='post-tb'>
							<?php the_post_thumbnail('full'); ?>	
					</div>
				<?php endif; ?>
				
				<div class="post-desc">
					<span class="post-category">영상</span>
					<?php 
					$small_title = get_field('small_title');
					//echo $small_title;
					?>
					<p class="post-small-title"><?php echo $small_title;?></p>

					<h3 class="post-title"><?php the_title();?></h3>

					<div class="post-news-cont">
					<?php the_excerpt(); ?>
					</div>
					<div class="post-meta">
						<?php
						$publisher = get_field('publisher');
						if ($publisher && $publisher != '') :
						?>
						<span class="publisher" style="display: none"><?php echo $publisher;?></span>
						<?php
						endif;
						?>

						<!-- <div class="news_only">
						등록일: <?php the_time( 'Y.m.d.' ) ; ?> &middot; 댓글 : <?php comments_number(__('0','arte365'),__('1','arte365'),__('%','arte365'),''); ?> &middot; 조회수 <?php echo number_format(get_field('arte365_post_views'));?>
						</div> -->
					</div>
					<span class="post-date"><?php the_time( 'Y.m.d.' ) ; ?></span>
				</div>
			</a>
			<?php 
				$video_link = get_field('video_link');
				//echo $video_link;
            ?>
            <span class="video_link" style="display: none"><?php echo $video_link;?></span>
            <span class="post_title" style="display: none"><?php echo $small_title;?></span>
            <?php 
                $ex_link = get_field('ex_link');
            ?>
            <span class="ex_link" style="display: none"><?php echo $ex_link;?></span>
		<div>

		<?php
			}else{
		?>
		<!-- other -->
		<a class="other_post" href="<?php echo $post_link ?>" <?php echo $post_target?>  target="_self" title="기사 클릭 페이지 이동 ">
		<?php if(has_post_thumbnail()) : ?>
			<div class='post-tb'>
					<?php the_post_thumbnail('full'); ?>	
			</div>
		<?php endif; ?>
		
		<?php if(!has_post_thumbnail()) : ?>
			<div class="post-desc note">		
		<?php endif; ?>
		<?php if(has_post_thumbnail()) : ?>
			<div class="post-desc">
		<?php endif; ?>
			<span class="post-category"><?php the_arte365_get_category_string();?></span>
			<h3 class="post-title"><?php the_title();?></h3>
			
			<?php 
			$small_title = get_field('small_title');
			 //echo $small_title;
			?>
			
			<p class="post-small-title"><?php echo $small_title;?></p>

			<div class="post-news-cont">
			<?php the_excerpt(); ?>
			</div>
			
			
			<div class="post-meta">
				<?php
				$publisher = get_field('publisher');
				if ($publisher && $publisher != '') :
				?>
				<span class="publisher"><?php echo $publisher;?></span>
				<?php
				endif;
				?>

				<!-- <div class="news_only">
				등록일: <?php the_time( 'Y.m.d.' ) ; ?> &middot; 댓글 : <?php comments_number(__('0','arte365'),__('1','arte365'),__('%','arte365'),''); ?> &middot; 조회수 <?php echo number_format(get_field('arte365_post_views'));?>
				</div> -->
			</div>
			<span class="post-date"><?php the_time( 'Y.m.d.' ) ; ?></span>
		</div>
		</a>
		<?php
			}
		?>
		
		
	</article>
</div>
