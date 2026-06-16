<div class="related-post-item clearfix ">

	<article class="post inner" id="post-<?php the_ID(); ?>">
		
		<a href="<?php the_permalink(); ?>"  target="_self">
		
		<div class="post-tb" <?php if (has_post_thumbnail()) { ?> style="background-image:url(<?php the_post_thumbnail_url('full');?>);" <?php } ?>>
		</div>
		

		<div class="post-desc">

			<span class="post-category"><?php the_arte365_get_category_string();?></span>
			<h3 class="post-title"><?php the_title();?></h3>
			<div class="hide">
			<?php 
			$small_title = get_field('small_title');
			if ( $small_title == '') {
				?>
				<p class="post-excerpt"><?php the_excerpt();?></p>
				<?php
			} else {
				?>
				<p class="post-small-title"><?php echo $small_title;?></p>
				<?php
			}
			
			?>
			</div>
		</div>
		</a>
		
	</article>
</div>