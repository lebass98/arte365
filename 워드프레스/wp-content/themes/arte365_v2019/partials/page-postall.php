	<div class="page-content">
			<section class="content">
				<div class="entry_content">
					<?php
						$wp_query =new WP_Query( array( 'post_type' => 'post',  'category__not_in' => array(2809, 4259,2812,2811,1, 2806, 11856),'orderby' => 'date',  'order' => 'desc','paged'=>$paged) );
					?>
				
					<div class="post-list is-parent-category row">
						<?php if (have_posts()) : ?>
							<?php while(have_posts()) : the_post(); ?>
								<?php get_template_part('partials/post', 'item');?>
							<?php endwhile; ?>
							</div>
						<?php endif; ?>

						<?php if( have_posts() ):?> <!--  ����¡ ó��.  -->
							<?php get_template_part('partials/pagination'); ?>

						<?php else :?>

							<div class="no-result">
								<p class="text-center">��ϵ� ����Ʈ�� �����ϴ�.</p>
							</div>
						<?php endif?>
					</div>
				</div><!-- /.entry_content -->
			</section><!-- /.content -->
	</div>
