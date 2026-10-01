<?php
$sidebar_post = get_page_by_path('arte365-sidebar',OBJECT,'page');
if ( $sidebar_post ) :
$sidebar_post_id = $sidebar_post->ID;
?>
<aside class="sidebar">
    
    <?php
    if (get_field('banner_show', $sidebar_post_id)) :
        $banners = get_field('banners', $sidebar_post_id);
    ?>
    <div class="sidebar-widget">
        <div class="banner">
			<p class="banner-title">가장 많이 본 기사</p>
			<div>
				<?php
                    
                    $popular_posts = new WP_Query( array( 'post_type' => 'post', 'category__not_in' => array(1,2809,2806,2811,2812,4259) , 'orderby' => 'meta_value_num', 'meta_key'  => 'arte365_post_views', 'order' => 'desc', 'posts_per_page' => 3,
                        'date_query' => array(
                            array(
                                'column' => 'post_date_gmt',
                                'after' => '1 month 12days ago',
								'before' => '15 days ago',
                            ) 
                        ) 
                    ));
                    if ( $popular_posts->have_posts() ) :
                    ?>
                        <div class="post-list">
                            <?php
                                while ( $popular_posts->have_posts() ) :
                                    $popular_posts->the_post();
                            ?>
                            <div class="post-item clearfix">

                                <article class="post" id="post-<?php the_ID(); ?>">

                                    <a href="<?php the_permalink(); ?>">
                                    <?php if(has_post_thumbnail()) : ?>
                                    <div class='post-tb'>
                                            
                                            <?php the_post_thumbnail('full'); ?>
                                        
                                    </div>
                                    <?php endif; ?>

                                    <div class="post-desc">
										<span class="post-date"><?php the_time( 'Y.m.d' ) ; ?></span>
										<h3 class="post-title"><?php the_title();?></h3>                                        
										<p class="post-sub"><?php the_field('small_title');?></p>
                                    </div>
                                    </a>
                                    
                                </article>
                            </div>

                        <?php
                            
                            endwhile;
                            wp_reset_postdata();
                        ?>
                        </div>
                    <?php
                    endif;
                    ?>
			</div>
        </div>
    </div>
    <?php endif; ?>
    


    <?php
    if (get_field('interview_show', $sidebar_post_id)) :
    ?>
    <div class="sidebar-widget">
        <h3 class="widget-title category">인터뷰</h3>
        <div class="post-box">
            <a href="<?php the_field('interview_link', $sidebar_post_id);?>">
            <img src="<?php the_field('interview_image', $sidebar_post_id);?>" class="tb">
            <div class="post-excerpt ">
                <p class="font-serif hide">
                    <?php the_field('interview_description', $sidebar_post_id);?>

                </p>
                <p><?php the_field('interviewee', $sidebar_post_id);?></p>
            </div>
            </a>
        </div>
    </div>
    <?php endif; ?>
    
    <?php
    if (get_field('inspired_show', $sidebar_post_id)) :
        $inspired_contents = get_field('inspired_contents', $sidebar_post_id);

    ?>

    <div class="sidebar-widget" id="inpiredWidget">
        <h3 class="widget-title category">아이디어</h3>
        <div class="post-box">
            <?php foreach ( $inspired_contents as $inspired_content ) :?>
            <a href="<?php echo $inspired_content['link'];?>"><img src="<?php echo $inspired_content['image'];?>" class="tb"></a>
            <?php endforeach;?>
        </div>
    </div>

    <script>
        jQuery(function($){
            $('#inpiredWidget .post-box').slick({
                'arrows':false,
                'dots':true
            });
        });
    </script>
    <?php endif; ?>


</aside>

<?php endif; ?>