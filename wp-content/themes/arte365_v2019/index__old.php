<?php get_header();?>

<div class='container allsearch_www'>
    <div class='row'>

        <div class='span12 main-content-area blog-masonry blog-standard blog-with-sidebar'>
            <div class='row'>

                <div class='allsearch_ww'>

                    <?php if( have_posts() ){ 
                        $has_posts = true;
                        while ( have_posts() ){
                            the_post();
                            //post_types
                            ?>


<article <?php post_class( 'ln-item post-default ' . $page_width ); ?> id="post-<?php the_ID(); ?>">


 <div class="post-box clearfix">

        <!-- 좌측 썸네일 이미지 -->
        <?php if(has_post_thumbnail()) : ?>
            <div class='ln-item-content'>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full'); ?>
                </a>
            </div>
        <?php endif; ?>
        <!-- //좌측 썸네일 이미지 -->
        <!-- 우측 -->
        <div class="post-body kyhdth2">
                    
                <h2 class='ln-item-heading'>
                    <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
                    <p style="margin-top:7px"><?php
                        $post_id = get_post();
                        echo get_field('small_title', $post_id);
                    ?></p>
                </h2>
                <div class='content-teaser-wrapper'>                    
                    <?php 
                        $excerpt = get_the_excerpt();
                        if (empty($excerpt))
                        the_content();
                        else
                        echo the_excerpt();
                    ?>
                    <!-- <a href="<?php the_permalink(); ?>">
                        <?php _e('Read More','arte365') ?>
                    </a> -->     
                    <div class="clearfix">
                    </div>   
                </div>

                <div class='ln-item-meta'>
                    <div class='text-center'>
                        <ul class="ulboth">
                        <li>
                        <?//php the_author_posts_link(); ?>
                        <?php echo $publicher_user;?>&nbsp;<?php the_time( get_option( 'date_format' ) ); ?>
                        </li>
                        <li>
                        <?php if($page_width !== 'span3kyh'): ?>
<div class='ln-item-footer-meta'>
    <!-- 임시 숨기기<a href='<?php the_permalink(); ?>'>--><?php comments_number(__('댓글_0','arte365'),__('댓글 _ 1','arte365'),__('댓글_ %','arte365'),''); ?></a> &nbsp;&nbsp; <span class="hit">조회수 _ <?php echo number_format(get_field('arte365_post_views'));?></span>
</div> 
<!-- <div class='tagskyh'>
   <span class='ln-item-footer-meta-tags'><?php _e('태그','DailyNews'); ?> <?php the_tags('',', ',''); ?></span>
</div> -->                        <?php endif; ?>  
                        </li>
                        </ul>
                    </div>
                </div>

    </div>  
    <!-- //post-body -->
</div>  
<!-- //post-box -->
</article>


                            <?php

                        }
                            
                        }else { ?>

                        <div>                               
                            <h1 class="title"><!-- <?php _e('검색어 대한 검색결과가 없습니다.', 'arte365'); ?>-->                   

                            검색어 '<em><?php printf( __( '%s' ), '<span>' . get_search_query() . '</span>'); ?></em>'에 대한 검색결과가 없습니다.
                            
                            </h1>
                            <!-- <p class="lead"><?php _e('We could not find the post that you were looking for. Please try searching again.', 'arte365'); ?></p> 
                            <?php echo get_search_form(); ?>-->
                            
                            <div class="btn_schback">
                            <a href="javascript:;" onclick="history.back();">뒤로가기 &gt;</a>
                            </div>

                        </div>
                        <!-- //allsearchNO_w -->
                    <?php }
                ?> 
                </div>
                <?php if( have_posts() ):?> <!--  페이징 처리.  -->
                    <?php get_template_part('partials/pagination'); ?>
                <?php endif?>
            </div>
            <!-- //row -->
           
        </div>
        <!-- //span12.main-content-area -->
       
    </div>
    <!-- //row -->
</div>
<!-- //container -->
<?php get_footer();?>