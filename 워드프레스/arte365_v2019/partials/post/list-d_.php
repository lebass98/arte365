<?php
$current_category = get_category(get_query_var('cat'));
?>

<?php 
	$catego = get_the_category();
	$categoNum =  $catego[0]->term_id;


		if($current_category->name == ""){
?>
			<div class="container">
			<?php 			

		}else if($categoNum == 8 || $categoNum == 9 || $categoNum == 10 || $categoNum == 16|| $categoNum == 2806){
			?>
		<div class="container news_list">
		<?php 
		}else{
			?>
			<div class="container">
			<?php 
		}
?>


<?php 
	if($current_category->name == ""){
		?>
		<div class="archive-header">
			<h1 class="category-name">전체기사</h1>
			<p class="category-description">
				아르떼365 전체기사입니다.
			</p>
		</div>
		<?php 
	}else{
		?>
		<div class="archive-header">
			<h1 class="category-name"><?php echo $current_category->name;?></h1>
			<p class="category-description">
				<?php echo $current_category->description;?>
			</p>
		</div>
		<?php 
		}
?>





	<div class="archive-body clearfix">
		<div class="left-area">
			<!-- <h2 class="archive-title">
				<?php if (get_query_var('cat')) {
					echo '최신 기사';
				} else {
					echo '전체 기사';
				}
				?>
			</h2> -->
			<div class="post-list <?php echo ($current_category->parent > 0) ? 'is-sub-category' : 'is-parent-category';?>">
				<?php 
				
				query_posts(array('orderby'=>'date','order'=>'ASC'));
				if (have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
						<?php get_template_part('partials/post', 'item');?>
					<?php endwhile; ?>
					</div>
				<?php endif; 
				wp_reset_query();
				?>

				<?php if( have_posts() ):?> <!--  페이징 처리.  -->
					<?php get_template_part('partials/pagination'); ?>

				<?php else :?>

					<div class="no-result">
						<p class="text-center">등록된 포스트가 없습니다.</p>
					</div>
				<?php endif?>

			
		</div>
		<div class="right-area">
			<?php get_sidebar();?>
		</div>
	</div>

</div><!--// container -->
