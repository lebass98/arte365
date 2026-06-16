<?php
$current_category = get_category(get_query_var('cat'));
?>

<?php 
	$catego = get_the_category();
	$categoNum =  $catego[0]->term_id;
	if($current_category->name == ""){
			?>
			<div class="post_container">
			<?php 			

		}else if($categoNum == 8 || $categoNum == 9 || $categoNum == 10 || $categoNum == 16 || $categoNum == 2806){
			?>
		<div class="post_container news_list">
		<?php 
		}else{
			?>
			<div class="post_container">
			<?php 
		}
?>

<?php 
	if($current_category->name == ""){
		?>
		<div class="archive-header">
			<h1 class="category-name">전체기사</h1>
			<p class="category-description">아르떼 전체기사입니다.</p>
		</div>
		<?php 
	}else{
		?>
		<div class="archive-header">
			<h1 class="category-name"><?php echo $current_category->name;?></h1>
			<p class="category-description"><?php echo $current_category->description;?></p>
		</div>
		<?php 
		}
?>




<div class="post-list <?php echo ($current_category->parent > 0) ? 'is-sub-category' : 'is-parent-category';?>">
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