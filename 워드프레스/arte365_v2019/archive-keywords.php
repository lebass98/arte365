<?php get_header(); ?>

<div class="container subject all">
    <div class="subject_cat">
        <div class="archive-header">
            <h1 class="category-name">키워드별 큐레이션</h1>
            <p class="category-description">아르떼365의 기사들을 다양한 키워드별로 분류해 놓았습니다.</p>
        </div>
        <?php
        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

        $all_keywords = new WP_Query( array( 'post_type' => 'keywords' )); //연도별
        if ( $all_keywords->have_posts() ) : 
            $all_keywords->the_post(); //연도 post 
            $keywords_val=get_field('keywords'); //추가필드 주제아이디
            $keywords_arr = explode(",", $keywords_val);
            $wp_query = new WP_Query( array( 'post_type' => 'keywordlist', 'post__in' => $keywords_arr, 'orderby' => 'post__in', 'posts_per_page' => 5, 'paged' => $paged ));
            $keywords = $wp_query; //주제별
            if ( $keywords->have_posts() ) :
                while ( $keywords->have_posts() ) :
                    $keywords->the_post();
                    $posts_val=get_field('keyword_post_id'); //추가필드 post아이디
                    $posts_arr = explode(",", $posts_val);
                    $posts_count=count($posts_arr);
                    $keywords_id=get_the_ID();

                    $sub_posts = new WP_Query( array( 'post_type' => 'post', 'post__in' => $posts_arr, 'orderby' => 'post__in','posts_per_page'=>$posts_count )); //주제별
        ?><!--<em></em>-->
        <div class="cat_wrap keywords">
            <div class="cat_item">
                <div class="category-name">
                    <h3 id="h3_<?php echo $keywords_id?>" >
						<a href="/?post_type=keywordlist&as_post=<?php echo $keywords_id?>">
							<?php the_title();?>
						</a>
                    </h3>
                    <p><?php the_field('page_detail');?></p>
                </div>
                <input type="text" id="ul_cnt_<?php echo $keywords_id?>" value="1">
                <?php
                if ( $sub_posts->have_posts() ) :
                    $post_num=0;
                    $ul_num=1;
                    while ( $sub_posts->have_posts() ) :
                        $sub_posts->the_post();
                ?>
                <?php
                if(($post_num%4)==0):
                ?>
                <ul class="post-list is-parent-category clearfix" <?php if($post_num!=0): echo' style="display:none"'; endif;?> id="s_post_<?php echo $keywords_id?>_<?php echo $ul_num?>">
                <?php
                endif;
                ?>
                    <li class="post-item clearfix">
						<article class="post">
							<a href="<?php the_permalink();?>">
								<div class="post-tb">
									<?php echo get_the_post_thumbnail(null,'full','');?>
								</div>
								<div class="post-desc">
									<span class="post-category"><?php the_arte365_get_category_string();?></span>
									<p class="sub_title"><?php the_title();?></p>
									<?php 
									$small_title = get_field('small_title');
									 //echo $small_title;
									?>
									<p class="post-small-title"><?php echo $small_title;?></p>

									<?php
									$publisher = get_field('publisher');
									if ($publisher && $publisher != '') :
									?>
									<span class="publisher"><?php echo $publisher;?></span>
									<?php
									endif;
									?>

									<span class="post-date"><?php the_time('Y.m.d');?></span>
								</div>
							</a>
						</article>
					</li>
                <?php
                    $post_num++;
                    if(($post_num%4)==0):
                ?>
                </ul>
                <?php
                    $ul_num++;
                    endif;
                ?>
                <?php
                    endwhile;
                endif;
                ?>
                <input type="hidden" id="max_ul_<?php echo $keywords_id?>" value="<?php echo $ul_num?>">
            </div>
        </div>

        <div class="text-center">
            <button type="button" class="btn_more_post subject_more" id="sub_post_add_<?php echo $keywords_id?>" onclick="show_posts('<?php echo $keywords_id?>');">
                <!-- <img src="/wp-content/uploads/2019/07/btn_more.png" alt=""> -->
            </button>
            <button type="button" class="btn_more_post subject_remove" id="sub_post_remove_<?php echo $keywords_id?>" onclick="hidden_posts('<?php echo $keywords_id?>');">
                <!-- <img src="/wp-content/uploads/2019/07/btn_remove.png" alt=""> -->
            </button>
        </div>
        <?php
            endwhile;
            arte365_pagination_new('page');
            endif;
            endif;
        ?>
    </div>
</div>

<script>
    function show_posts(keywords_id){
        if(keywords_id.length > 0){
            var click_num = jQuery("#ul_cnt_" + keywords_id).val();
            var add_ul_num = Number(click_num) + 1;
            var next_ul_num = Number(add_ul_num) + 1;
            if(jQuery("#s_post_" + keywords_id + "_" + add_ul_num).length > 0){
                jQuery("#s_post_" + keywords_id + "_" + add_ul_num).css('display', 'flex');
                jQuery("#ul_cnt_" + keywords_id).val(add_ul_num);

                if(jQuery("#s_post_" + keywords_id + "_" + next_ul_num).length <= 0){
                    jQuery("#sub_post_remove_" + keywords_id).css('display', 'inline-block');
                    jQuery("#sub_post_add_" + keywords_id).css('display', 'none');
                }
            }
        }
    }

    function hidden_posts(keywords_id){
        var max_ul_num = Number(jQuery("#max_ul_" + keywords_id).val()); //마지막 num 값 가져오기
        for(var ii = 2; ii <= max_ul_num; ii++){
            jQuery("#s_post_" + keywords_id + "_" + ii).css('display', 'none'); //가리기
        }
        jQuery("#ul_cnt_" + keywords_id).val(1); //초기값 1로 변경
        var offset = jQuery("#h3_" + keywords_id).offset(); //주제별 h3 위치
        jQuery('html, body').animate({scrollTop: offset.top - 100}, 400); //스크롤 이동
        jQuery("#sub_post_remove_" + keywords_id).css('display', 'none');
        jQuery("#sub_post_add_" + keywords_id).css('display', 'inline-block');
    }
</script>

<?php get_footer(); ?>