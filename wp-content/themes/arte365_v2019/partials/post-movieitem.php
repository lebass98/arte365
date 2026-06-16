
<!--<div class="post-item movie-item clearfix wow fadeInUp ">-->
	
	<article class="post" id="post-<?php the_ID(); ?>">
		<?php
			$ex_link=get_field('ex_link'); //외부링크
			$post_target='';
			$post_link=get_permalink();
			$catego = get_the_category();
			$categoNum =  $catego[0]->term_id;
			if($categoNum =='11630' && strlen($ex_link)>0){
				$post_link=$ex_link;
				$post_target=" target='blank'";
			}
		?>
		
				<!-- 동영상 -->
				<div>
					<a class="modal-link play_video_modal" data-hash="video-<?php the_ID(); ?>" title="<?php the_title();?> 기사클릭 동영상 팝업">
						<?php if(has_post_thumbnail()) : ?>
							<div class='post-tb'>
									<?php the_post_thumbnail('full'); ?>	
							</div>
						<?php endif; ?>
						
						<div class="post-desc">

							<div class="movie_info">
                                <p class="post-excerpt"><?php the_field('small_title');?></p>
								<h3 class="post-title">
									<!-- <div class="movie_logo">
										<img src="/wp-content/uploads/page/logo.jpg"/>
									</div> -->
									<?php the_title();?>
								</h3>
								<!-- <span class="post-category">영상</span> -->
								<!-- <span class="post-category"><?php the_arte365_get_category_string();?></span> -->
								
								
								<!--<div class="post-meta">
									<?php
									$publisher = get_field('publisher');
									if ($publisher && $publisher != '') :
									?>
									<span class="publisher"><?php echo $publisher;?></span>
									<span class="post-date"><?php the_time('Y.m.d.');?></span>
									<?php
									endif;
									?>
								</div>-->
							</div>

						</div>
					</a>
					<?php 
						$video_link = get_field('video_link');
						//echo $video_link;
					?>
                    <span class="video_link" style="display: none"><?php echo $video_link;?></span>
					<span class="post_title" style="display: none"><?php the_title();?></span>
					<span class="post_subtit" style="display: none"><?php the_field('small_title');?></span>
                    <?php 
						$ex_link = get_field('ex_link');
					?>
					<span class="ex_link" style="display: none"><?php echo $ex_link;?></span>
				</div>
		
	</article>
<!--</div>-->