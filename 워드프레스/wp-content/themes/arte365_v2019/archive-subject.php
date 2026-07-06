<?php get_header(); ?>
<style>
	.container.subject .keyword-box + .keyword-box{border-top:none;}
</style>

<div class="container subject all">
	<div class="subject_cat">
		<div class="archive-header">
			<h1 class="category-name">편집노트</h1>
            <p class="category-description">주제의 기획 의도와 방향을 공유하여 독자의 폭넓은 이해를 돕는 편집위원의 글을 제공합니다.</p>
		</div>

        <?php

        $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

        $all_subjects = new WP_Query( array( 'post_type' => 'subject' )); //연도별
        if ( $all_subjects->have_posts() ) :
        $all_subjects->the_post(); //연도 post
        $subjects_val=get_field('subjects'); //추가필드 주제아이디
        $subjects_arr = explode(",", $subjects_val);

        $wp_query = new WP_Query( array( 'post_type' => 'sublist', 'post__in' => $subjects_arr, 'orderby' => 'post__in', 'posts_per_page' => 10, 'paged' => $paged )); //주제별
        ?>

        <div class="keyword-wrap">
            <p class="keyword-list--tit">주제별 기사</p>
            <div class="keyword-inner">

            <?php
                if ($wp_query->have_posts()) :
                    while($wp_query->have_posts()) : $wp_query->the_post();
                        $posts_val=get_field('subject_post_id'); //추가필드 post아이디
                        $posts_arr = explode(",", $posts_val);
                        $posts_count=count($posts_arr);
                        $subjects_id=get_the_ID();
                ?>
                <div class="keyword-box">
                    <div class="keyword-cont">
                        <a href="/?post_type=subjectgroup&as_post=<?php echo $subjects_id?>">
                            <p class="month"><?php the_field('page_title');?></p>
                            <p class="tit"><?php the_title();?></p>
                            <p class="txt"><?php the_field('page_description');?></p>
                        </a>
                    </div>
                </div>

                <?php

                    endwhile;

                    arte365_pagination_new('page');

                    endif;

                ?>

            </div>
        </div>

    <?php endif; ?>

	</div>
</div>


<script>
	function show_posts(subjects_id){
		if(subjects_id.length>0){
			var click_num=jQuery("#ul_cnt_"+subjects_id).val();
			var add_ul_num=Number(click_num)+1;
			var next_ul_num=Number(add_ul_num)+1;
			if(jQuery("#s_post_"+subjects_id+"_"+add_ul_num).length>0){
					jQuery("#s_post_"+subjects_id+"_"+add_ul_num).css('display','block');
					jQuery("#ul_cnt_"+subjects_id).val(add_ul_num);
						
					if(jQuery("#s_post_"+subjects_id+"_"+next_ul_num).length<=0){
						jQuery("#sub_post_remove_"+subjects_id).css('display','inline-block');
						jQuery("#sub_post_add_"+subjects_id).css('display','none');
					}
			}
		}
	}

	function hidden_posts(subjects_id){
		
		var max_ul_num=Number(jQuery("#max_ul_"+subjects_id).val()); //마지막 num 값 가져오기
		for(var ii=2; ii<=max_ul_num; ii++){
			jQuery("#s_post_"+subjects_id+"_"+ii).css('display','none'); //가리기
		}
		jQuery("#ul_cnt_"+subjects_id).val(1); //초기값 1로 변경
		var offset = jQuery("#h3_"+subjects_id).offset(); //주제별 h3 위치
		jQuery('html, body').animate({scrollTop : offset.top-100}, 400); //스크롤 이동
		jQuery("#sub_post_remove_"+subjects_id).css('display','none');
		jQuery("#sub_post_add_"+subjects_id).css('display','inline-block');
	}
</script>


<?php get_footer(); ?>