
<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
	<?php
	$page_description = get_field('page_description');
	$page_description_class = '';
	if ( mb_strlen($page_description) > 50) {
		$page_description_class = 'size-sm';
	}
	?>
	<div class="page-header">
		<h1 class="page-name"><?php the_field('page_title');?></h1>
		<p class="page-description <?php echo $page_description_class;?>"><?php echo $page_description;?></p>
	</div>
	<div class="page-content">
			<section class="content">
				<div class="entry_content">
					<?php the_content() ?>
				</div><!-- /.entry_content -->
				
			</section><!-- /.content -->
		
	</div>

	<?php endwhile; // end of the loop. ?>
</div>