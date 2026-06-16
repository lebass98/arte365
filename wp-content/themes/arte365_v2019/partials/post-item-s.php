<div class="post-item newsList post-item-s clearfix search">
	<article class="post" id="post-<?php the_ID(); ?>">
	<?php
		$ex_link=get_field('ex_link');
		$post_link=get_permalink();
		$post_target='';
		if(strlen($ex_link)>0){
			$post_link=$ex_link;
			$post_target=" target='blank'";
		}
	?>
		<a href="<?php echo $post_link ?>" <?php echo $post_target?>>
		<div class="post-desc">
			<div class="post-meta">
				
				<!-- <span class="post-category"><?php the_arte365_get_category_string();?></span> -->
				<h3 class="post-title"><?php the_title();?></h3>

<?php
				$publisher = get_field('publisher');
				
				if ($publisher && $publisher != '') :
				?>
				
				<p class="publisher"><?php echo $publisher;?></p>
				<?php
				endif;
				?>

				<span class="post-date"><?php the_time( 'Y.m.d.' ) ; ?></span>
			</div>
		</div>
		</a>
	</article>
</div>