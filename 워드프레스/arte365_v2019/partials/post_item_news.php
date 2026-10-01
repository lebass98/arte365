<div class="post-item clearfix" >

	<article class="post" id="post-<?php the_ID(); ?>">

		<a href="<?php the_permalink(); ?>"  target="_self">
		<?php if(has_post_thumbnail()) : ?>
		<div class='post-tb'>
			
				<?php the_post_thumbnail('full'); ?>
			
		</div>
		<?php endif; ?>

		<div class="post-desc">
			<span class="post-category"><?php the_arte365_get_category_string();?></span>
			<h3 class="post-title"><?php the_title();?></h3>
			
			<?php 
			$small_title = get_field('small_title');
			 //echo $small_title;
			?>
			
			<p class="post-small-title"><?php echo $small_title;?></p>
			
			
			<div class="post-meta">
				<?php
				$publisher = get_field('publisher');
				if ($publisher && $publisher != '') :
				?>
				<span class="publisher"><?php echo $publisher;?></span>
				<?php
				endif;
				?>
				<!-- <span class="comment">댓글 <strong><?php comments_number(__('0','arte365'),__('1','arte365'),__('%','arte365'),''); ?></strong></span>  
				<span> · </span>
				<span class="hit">조회수 <strong><?php echo number_format(get_field('arte365_post_views'));?></strong></span> -->
			</div>
			<span class="post-date"><?php the_time( 'Y.m.d' ) ; ?></span>
		</div>
		</a>
		
	</article>
</div>