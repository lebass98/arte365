<!-- container -->
<div class="container">
	
	<div class="archive-header">
		<h1 class="category-name">태그 '<span class="txt-em"><?php echo single_tag_title(); ?></span>'</h1>
	</div>

	<div class="archive-body clearfix">
		<div class="left-area">
			<h2 class="archive-title">최신기사</h2>
			<div class="post-list">
				<?php if (have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<?php get_template_part('partials/post', 'item');?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php if( have_posts() ):?> <!--  페이징 처리.  -->
					<?php get_template_part('partials/pagination'); ?>

				<?php else :?>

					<div class="no-result">
						<p class="text-center">등록된 포스트가 없습니다.</p>
					</div>
				<?php endif?>

			</div>
		</div>
		<div class="right-area">
			<?php get_sidebar();?>
		</div>
	</div>
	
</div><!--// container -->

