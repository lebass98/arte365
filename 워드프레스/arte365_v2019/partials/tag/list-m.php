<div class="post_container">
	<div class="archive-header">
		<h1 class="category-name">태그 '<span class="txt-em"><?php echo single_tag_title(); ?></span>'</h1>
	</div>

	<div class="post-list">
		<?php if (have_posts()) : ?>
			<div class="container">
			<?php while(have_posts()) : the_post(); ?>
				<?php get_template_part('partials/post', 'item');?>
			<?php endwhile; ?>
			</div>
			
			<?php get_template_part('partials/pagination'); ?>
			<?php else :?>
		<div class="no-result">
			<p class="text-center">등록된 포스트가 없습니다.</p>
		</div>
	<?php endif?>

		
	 </div>
 </div>

