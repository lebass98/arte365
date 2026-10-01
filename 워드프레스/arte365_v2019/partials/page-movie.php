<div class="page-content ">
		<section class="content">
			<div class="entry_content">
				<?php
					$wp_query =new WP_Query( array( 'post_type' => 'post',  'category__in' => array(11856),'orderby' => 'date',  'order' => 'desc','paged'=>$paged) );
				?>
			
				<div class="post-list is-parent-category">
					<?php if (have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<?php get_template_part('partials/post', 'movieitem');?>
						<?php endwhile; ?>

						<?php get_template_part('partials/pagination'); ?>

						</div>

					<?php endif; ?>

					<!-- <?php
						global $wp_query; // you can remove this line if everything works for you
						// don't display the button if there are not enough posts
						if (  $wp_query->max_num_pages > 1 )
							echo '<div class="misha_loadmore">More posts</div>'; // you can use <a> as well
					?> -->
				</div>
			</div><!-- /.entry_content -->
		</section><!-- /.content -->
</div>
