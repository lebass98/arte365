<?php get_header(); ?>

    <div class="container subject all editorial-view subjectGroup">
        <div class="subject_cat">
            <div class="archive-header">
                <h1 class="category-name">편집노트</h1>
                <p class="category-description">주제의 기획 의도와 방향을 공유하여 독자의 폭넓은 이해를 돕는 편집위원의 글을 제공합니다.</p>
            </div>
            <?php
            $subjects = new WP_Query( array( 'post_type' => 'sublist', 'page_id' => $_GET['as_post'], 'orderby' => 'post__in' )); //주제별
            if ( $subjects->have_posts() ) :
                $subjects->the_post();
                $posts_val=get_field('subject_post_id'); //추가필드 post아이디
                $posts_arr = explode(",", $posts_val);
                $posts_count=count($posts_arr);
                $subjects_id=get_the_ID();

                $sub_posts = new WP_Query( array( 'post_type' => 'post', 'post__in' => $posts_arr, 'orderby' => 'post__in','posts_per_page'=>$posts_count )); //주제별
                ?>
                <div class="archive-body">
                    <div class="cat_wrap">
                        <div class="category-name">
							
							<p class="date"><?php the_field('page_title');?></p>
							
                            <h3>
                                <?php the_title();?>
                            </h3>
                            <!-- <div class="detailed_description"> -->
                            <?php the_field('page_detail');?>
                            <!-- </div> -->
                            <div>
                                <img src="<?php the_post_thumbnail_url();?>">
                            </div>
                        </div>
                        <?php
                        if ( $sub_posts->have_posts() ) :
                            $post_num=0;
                            $ul_num=1;
                            ?>
                            <div class="cat_item">
                                <ul class="clearfix">
                                    <?php
                                    while ( $sub_posts->have_posts() ) :
                                        $sub_posts->the_post();
                                        ?>
                                        <li>
                                            <a href="<?php the_permalink();?>">
                                                <img class="attachment-full size-full wp-post-image" src="<?php the_post_thumbnail_url(); ?>">
                                                <div class="post-desc">
                                                    <div class="flex-box">
                                                        <span class="post-category"><?php the_arte365_get_category_string();?></span>
                                                        <span class="post-date"><?php the_time('Y.m.d'); ?></span>
                                                    </div>
                                                    <div class="txt-box">
                                                        <p class="sub_title">
															<?php the_title(); ?>
															
														</p>
                                                        <p class="post-small-title"><?php the_field('page_description'); ?></p>
                                                    </div>
                                                    <span class="publisher"><?php the_field('publisher'); ?> <? //소제목 필드값 찾음 small_title ?></span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php
                                    endwhile;
                                    ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- 에디토리얼 키워드별 -->
                        <div class="keyword-wrap monthly-list">
                            <div class="keyword_btn__wrap">
                                <p class="keyword-list--tit">주제별 기사</p>
                                <button type="button" onclick="location.href='/?post_type=subject&amp;as_post=';" title="더보기">더보기</button>
                            </div>
                            <div class="keyword-inner">
                                <?php
                                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                                $all_subjects = new WP_Query( array( 'post_type' => 'subject' )); //연도별
                                if ( $all_subjects->have_posts() ) :
                                    $all_subjects->the_post(); //연도 post
                                    $subjects_val=get_field('subjects'); //추가필드 주제아이디
                                    $subjects_arr = explode(",", $subjects_val);

                                    $wp_query = new WP_Query( array( 'post_type' => 'sublist', 'post__in' => $subjects_arr, 'orderby' => 'post__in', 'posts_per_page' => 10, 'paged' => $paged )); //주제별
                                    if ( $wp_query->have_posts() ) :
                                        while ( $wp_query->have_posts() ) :
                                            $wp_query->the_post();
                                            $posts_val=get_field('subject_post_id'); //추가필드 post아이디
                                            $posts_arr = explode(",", $posts_val);
                                            $posts_count=count($posts_arr);
                                            $subjects_id=get_the_ID();
                                            ?>

                                            <div class="keyword-box">
                                                <?php
                                                $post_num=0;
                                                $ul_num=1;
                                                ?>
                                                <div class="keyword-cont" <?php if($post_num!=0): echo' style="display:none"'; endif;?> id="s_post_<?php echo $subjects_id?>_<?php echo $ul_num?>">

                                                    <!-- <a href="<?php the_permalink();?>"> -->
                                                    <a href="/?post_type=subjectgroup&as_post=<?php echo $subjects_id?>">
													
														<!-- 2025년 4월 4일 이재광 날짜필드추가 -->
														
														 <p class="month"><?php the_field('page_title');?></p>
                                                        <!-- <p class="month"><?php the_time('Y년 m월');?></p> -->
                                                        <p class="tit"><?php the_title();?></p>
                                                        <!-- <p class="txt"><?php the_field('page_detail');?></p> -->
                                                    </a>
                                                </div>
                                                <input type="hidden" id="max_ul_<?php echo $subjects_id?>" value="<?php echo $ul_num?>">

                                            </div>
                                        <?php
                                        endwhile;

                                    endif;
                                endif;
                                ?>
                            </div>

                        </div>

                        <!-- 에디토리얼 키워드별 -->
                    </div>
                    
                </div>
            <?php endif; ?>
        </div>
    </div>


<?php get_footer(); ?>