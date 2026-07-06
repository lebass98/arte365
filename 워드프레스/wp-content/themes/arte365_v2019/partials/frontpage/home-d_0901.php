<?php
    $filepath = realpath(__FILE__);
    include($_SERVER["DOCUMENT_ROOT"]."/cache/top-cache.php");
    if(!$cacheCheck) {
?>


<?php
$main_banner = get_field('d_main_banner');
$main_banner_link = get_field('d_main_banner_link');
$full_banner = get_field('d_full_banner');
$full_banner_link = get_field('d_full_banner_link');
$ex_link_url = get_field('ex_link');
?>

<style>
/* -----------------------------메인 이미지----------------------- */
	.left-area.right-bordered.fullimg {background: url(/wp-content/uploads/2024/08/issue_20240826_main.jpg) no-repeat center center;background-position: top center;}
	.left-area.right-bordered.responsiveimg {background: url(/wp-content/uploads/2024/08/issue_20240826_main_m.jpg) no-repeat center center;background-position: bottom; background-size:contain}
	.featured-post:first-child .tb{background:url(/wp-content/uploads/2024/08/issue2_20240826_main.jpg) no-repeat 0 0;background-size:100% 100%;} 
    /* .featured-post:nth-child(2) .tb{background:url(/wp-content/uploads/2023/11/issue3_20231113_main.jpg) no-repeat 0 0;background-size:100% 100%;} */
	.featured-post:last-child .tb{background:url(/wp-content/uploads/2024/08/issue3_20240826_main.jpg) no-repeat 0 0;background-size:100% 100%;}
/* -----------------------------메인 이미지----------------------- */
	

	/* .featured-post:nth-child(2) .authur, .featured-post:nth-child(3) .authur{display:none} */



	.cover-bg:before{width:100%;height:100%;background:#000;opacity:0.3;content:""}
	a[href="http://arte365.kr/?p=78449"] .post-excerpt{display:none}
	a[href="http://arte365.kr/?p=78449"] .post-title{margin-bottom:60px}
	.post-meta .mobile{display:none;}

	/* 230428 임시 추가 */
	/* .home-featured-posts .featured-post:nth-child(1) .post-title{width:80%;} */
</style>

<script type="text/javascript">
/*
	jQuery(window).on('load resize', function() {
		if(jQuery(window).width() < 1200) {
				jQuery('.month-box').css("cursor","pointer").click(function() {
				jQuery(location).attr('href','https://arte365.kr/?post_type=subject&as_post=');
			});
		}else {
		}
	});
	*/
</script>

<!-- container -->	
<div class="container ">
	<div class="over_bg">
		<!-- split-area -->
		<div class="split-area clearfix">
			<div class="inner">
			<!-- left-area -->
				<div class="left-area right-bordered cover-bg fullimg">
                    <!-- 이달의 주제 -->
                    <div class="month-box">
                        <div class="month-box_inner">
                                <span>이달의 주제</span>
                                <div class="month-cont">
                                    [아르떼365] 창간 20주년
                                    <p>[웹진 땡땡]에서 시작한 문화예술교육 전문 웹진 [아르떼365]가 창간 20주년을 맞았습니다.
									앞으로도 문화예술교육 현장과 담론을 잇는 가교 역할을 하며 독자 여러분과 오래도록 함께 하겠습니다!</p>
                                </div>

                                <div class="month-page">
                                <a class="month-pc-a" href="/?post_type=subject&as_post="><span>주제별 관련</span> 기사보기</a>
                                </div>
                                </div>
                            </div>
                    <!-- 이달의 주제 -->
					<div class="inner home-main-banner">
					  <!-- <a href="<?php echo $main_banner_link;?>" target="_self"> -->
						<div class="main-text-wrap">
								<!-- <div class="month-box">
									<span>이달의 주제</span>
									<div class="month-cont">
										쌓이는 것, <br /> 흘러가는 것 
										<p>‘흐르는 정체성’의 관점에서 전통문화의 본질을 재해석해보고, 
											한국문화의 속성과 전통적 흐름에 기반을 두고 활동하는 문화예술교육의 현장과 사례를 짚어본다.
										</p>   
									</div>
								
									<div class="month-page">
										<a class="month-pc-a" href="/?post_type=subject&as_post="><span>주제 관련</span> 기사 보기</a>
									</div>
								</div> -->
							<a href="/?p=105271" target="_self">
								<div class="banner-desc">
									<span class="category">이슈</span>      
									<div class="post-meta">         
										<h1 class="post-title">들끓는 청년<span>의</span><br/>마음<span>으로,</span><br/>내일<span>도 </span>잘 부탁해!</h1>
										<p class="post-excerpt">창간 20주년 축하 메시지 <br/>‘아르떼365는 ○○이다’</p> 
										<span class="authur">[아르떼365] 편집팀</span>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div><!-- left-area -->

				<!-- right-area -->
				<div class="right-area">
					<?php
					$idx = 0;
					$featured_post_ids = get_field('featured_posts');
					if ($featured_post_ids) :
						$featured_post_ids = explode(",", $featured_post_ids);

					?>
					<div class="inner home-featured-posts">
						<?php
						$featured_posts = new WP_Query( array( 'post_type' => 'post', 'post__in' => $featured_post_ids, 'orderby' => 'post__in' ));
						if ( $featured_posts->have_posts() ) :
							while ( $featured_posts->have_posts() ) :
								$featured_posts->the_post();
						?>
								<div class="featured-post ">
									<a href="<?php the_permalink();?>"  target="_self" alt="<?php the_title();?> 기사보기 클릭">
										<div class="category"><?php the_arte365_get_category_string();?></div>
										<div class="tb">
											<!-- <img src="<?php the_post_thumbnail_url();?>"> -->
										</div>
										<div class="info">
											<div class="post-desc">
												<!-- <div class="tb" style="background-image:url(<?php the_post_thumbnail_url();?>);"> -->
												<h1 class="post-title"><?php the_title();?></h1>
												<p class="post-excerpt"><?php the_field('small_title');?></p>
												
											</div>
											<div class="post-meta">
												<!-- <span class="post-date"><?php the_time('Y.m.d.');?></span> --> 
												<span class="authur"><?php the_field('publisher');?></span>
											</div>
										</div>
									</a>
								</div>
								<?php if (count($featured_post_ids) - 1 > $idx ) :?>
								<!-- <div class="gap"></div> -->
								<?php endif ;?>

						<?php 
							$idx++; 
							endwhile;
					  
							wp_reset_postdata();
						endif;
						?>

			
					</div>
					<?php 
					endif;
					?>
				</div><!-- right-area -->
			</div>
		</div> <!--// split-area -->
		
		<?php if ( $full_banner ) :?>
		<div class="home-full-banner">
			<a href="<?php echo $full_banner_link;?>">
			<img src="<?php echo $full_banner['url'];?>" class="img">
			</a>
		</div>
		<?php endif; ?>
    </div>
    
	<!-- 원본 -->
    <div class="main_subject_wrap">
        <div class="curationWrap">

            <div class="subject_list ">
                <div class="subject_tab_title">주제별 큐레이션</div>
                <button type="button" onclick="location.href='/?post_type=subject&as_post=<?php echo $year_subject_id; ?>';" title="주제별 전체기사 보기 클릭">주제별 전체기사</button>
            </div>

            <div class="curation">

                <div class="row">
                    <div class="col-sm-12 col-md-12 curation-slider">
                        <div class="single-swiper-container swiper-container main_subject_slider nav">
                            <div class="single-swiper-wrapper swiper-wrapper" >
                                <?php
                                $subjects = new WP_Query( array( 'post_type' => 'main_sublist', 'post__in' => $subjects_arr, 'orderby' => 'post__in' )); //주제별
                                if ( $subjects->have_posts() ) :
                                    $num = 1;
                                    while ( $subjects->have_posts() ) :
                                        $subjects->the_post();
                                        // $posts_val=get_field('subject_post_id'); //추가필드 post아이디
                                        // $posts_arr = explode(",", $posts_val);
                                        // $posts_count=count($posts_arr);
                                        $subjects_id=get_the_ID();
                                        ?>
                                        <div class="swiper-slide">
                                            <a class="slide_txt move3" id="<?php the_ID(); ?>-tab" data-toggle="tab" href="#<?php the_ID(); ?>-tab" role="tab" aria-controls="<?php the_ID(); ?>" aria-selected="true"><?php the_title();?></a>
                                        </div>

                                    <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                            <!-- <div class="single-swiper-pagination swiper-pagination"></div> -->
                            <!-- <div class="box"> -->
                                <div class="swiper-button-prev"></div>
                                <!-- <div class="menuBtn"></div> -->
                                <div class="swiper-button-next"></div>
                            <!-- </div> -->
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-12">
                        <div class="main_subject_list">
                            <div class="main-tab-content" id="myTabContent">
                                <?php
                                //$subjects = new WP_Query( array( 'post_type' => 'main_sublist', 'post__in' => $subjects_arr, 'orderby' => 'post__in' )); //주제별
                                if ( $subjects->have_posts() ) :
                                    while ( $subjects->have_posts() ) :
                                        $subjects->the_post();
                                        $posts_val=get_field('main_subject_post_id'); //추가필드 post아이디
                                        $posts_arr = explode(",", $posts_val);
                                        $posts_count=count($posts_arr);

                                        $subjects_id=get_the_ID();

                                        $sub_posts = new WP_Query( array(
                                            'post_type' => 'post',
                                            'post__in' => $posts_arr,
                                            'orderby' => 'post__in',
                                            'posts_per_page'=>$posts_count,
                                        )); //주제별
                                        ?>
                                        <div id="<?php the_ID(); ?>-tab" class="tab_box multiple-swiper-container swiper-container">
                                            <?php
                                            if ( $sub_posts->have_posts() ) :
                                                $post_num=0;
                                                while ( $sub_posts->have_posts() ) :
                                                    $sub_posts->the_post();
                                                    ?>
                                                    <?php
                                                    if(($post_num%$posts_count)==0):
                                                        ?>
                                                        <div class="multiple-swiper-wrapper swiper-wrapper">

                                                    <?php
                                                    endif;
                                                    ?>
                                                    <div class="swiper-slide" style="width: 50%">
                                                        <a class="main_tab_box " href="/?p=<?php the_ID(); ?>" title="<?php the_title();?> 기사보기 클릭">
                                                            <div class="category"><?php the_arte365_get_category_string();?></div>
                                                            <div class="slide_tit"><?php the_title();?></div>
                                                            <div class="slide_subtit"><?php the_field('small_title');?></div>
                                                            <span class="authur"><?php the_field('publisher');?></span>
                                                        </a>
                                                    </div>
                                                    <?php
                                                    $post_num++;
                                                    if(($post_num%$posts_count)==0):
                                                        ?>
                                                        </div>
                                                    <?php
                                                    endif;
                                                    ?>
                                                <?php
                                                endwhile;
                                            endif;
                                            ?>
                                            <div class="multiple-swiper-pagination"></div>
                                            <div class="multiple-swiper-button-prev swiper-button-prev"><span>주제별 기사 보기 다음 슬라이드 버튼 클릭</span></div>
                                            <div class="multiple-swiper-button-next swiper-button-next"><span>주제별 기사 보기 이전 슬라이드 버튼 클릭</span></div>
                                        </div>
                                    <?php
                                    endwhile;
                                endif;
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- popCuration -->
            <div class="cu-bg"></div>
            <div class="popCuration">
                <div class="cu-wrap" style="display:block;">
                    <div class="topWrap">
                        <h2>주제별 큐레이션 목록</h2>
                        <div class="btn_close"></div>
                    </div>
                    <div id="curationPop" class="cu-content">
                        <ul>
                            <?php
                            if ( $subjects->have_posts() ) :
                                $num = 1;
                                while ( $subjects->have_posts() ) :
                                    $subjects->the_post();
                                    // $posts_val=get_field('subject_post_id'); //추가필드 post아이디
                                    // $posts_arr = explode(",", $posts_val);
                                    // $posts_count=count($posts_arr);
                                    $subjects_id=get_the_ID();
                                    ?>
                                    <li data-no="<?php echo $num; ?>">
                                        <a id="<?php the_ID(); ?>-pop" href="javascript:void(0);"><?php the_title();?></a>
                                    </li>
                                    <?php
                                    $num++;
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- //popCuration -->

        </div>
    </div>
    <!-- //원본 -->


    <div class="home-tab-content">
		<input type="text" class="scroll_slide" value=""  />
        <div class="inner">
			<input type="text" id="post_num" value="8">
			<div class="main_sort clearfix">

				<div class="sort_reply" id="post_sort">
					<label for="posts_group1" class="apply_relate">
						<input type="radio" value="" id="posts_group1" name="post_sel" checked />
						<span>최신등록순</span>
					</label>
					<label for="posts_group2" class="article_view">
						<input type="radio" value="C" id="posts_group2" name="post_sel" />
						<span>최근 댓글 달린 기사<div class="commentNew" style="display:none;">N</div></span>
					</label>
				</div>

				<!-- <p class="selectPost_tit">최신등록순</p>
				<select name="" id="post_sort" >
					<option value="" >최신등록순</option>
					<option value="C" >가장많이 본 기사</option>
					<option  value="A">전체기사보기</option>  
				</select>-->

			</div>
            <div class="tab-contents clearfix mainList">
                <!-- left-area -->
                <div class="left-area">
                    <div class="tab-content active" id="recentPosts">
					
							<div class="post-list clearfix row" id="main_last_post">
							
							</div>
							<div class="text-center" style="margin-top:30px;">
								<button type="button" class="btn_more_post" id="main_post_add" title="더보기 버튼 클릭">
									<img src="http://arte365.kr/wp-content/uploads/2019/07/btn_more.png" alt="">
								</button>
								<button type="button" class="btn_more_post" id="main_post_remove" title="빼기 버튼 클릭">
									<img src="http://arte365.kr//wp-content/uploads/2019/07/btn_remove.png" alt="">
								</button>
							</div>
                    </div>
                </div><!--// left-area -->
            </div>
        </div>
    </div>


    <div class="home-tab-content mt_40  mainVideo">
        <!-- <input type="text" class="scroll_slide" value=""  /> -->
        <div class="inner video">
            <!-- <input type="text" id="post_movie_num" value="4"> -->
            <div class="clearfix">
                <p class="movie_title text-left">아르떼365 영상보기</p>
                <a class="moviepage_view plusTop" href="/?cat=11856">영상 더보기</a>
            </div>

            <?php
            $postsPerPage = 13;
            $args = array(
                //'post_type' => 'post',
                'post_status' => array('post'),
                'post_status' => array('publish'),
                'posts_per_page' => $postsPerPage,
                //'nopaging' => true,
                'order' => 'DESC',
                'orderby' => 'date',
                'cat' => 11856,
            );

            $loop = new WP_Query($args);

            $loop->the_post();
            ?>

            <div class="tab-contents clearfix">
                <!-- left-area -->
                <div class="left-area">

                    <div class="page-content">
                        <section class="content">
                            <div class="entry_content">
                                <div class="mainVideo">
                                    <div class="post-item movie-item clearfix wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">

                                        <article class="post videoBig" id="post-85701">

                                            <!-- 동영상 -->
                                            <div>
                                                <a class="modal-link play_video_modal" data-hash="video-<?php the_ID(); ?>" title="<?php the_title();?> 기사클릭 동영상 팝업">
                                                    <div class="post-tb">
                                                        <?php the_post_thumbnail('full'); ?>
                                                    </div>

                                                    <div class="post-desc">

                                                        <div class="movie_info">
                                                            <h3 class="post-title">
                                                                <?php the_title();?>
                                                            </h3>
                                                            <p class="post-excerpt"><?php the_field('small_title');?></p>

                                                            <div class="post-meta">
                                                                <span class="post-date"><?php the_time('Y.m.d.');?></span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </a>
                                                <span class="video_link" style="display: none"><?php the_field('video_link'); ?></span>
                                                <span class="post_title" style="display: none"><?php the_title();?></span>
                                                <span class="ex_link" style="display: none"><?php the_field('ex_link'); ?></span>
                                                <span class="post_subtit" style="display: none"><?php the_field('small_title');?></span>
                                            </div>

                                        </article>
                                    </div>
                                </div>
                                <!-- //mainVideo -->
                                <div id="ajax-posts" class="post-list is-parent-category vScroll">
                                    <?php
                                    while ($loop->have_posts()) : $loop->the_post();

                                        echo '<div class="post-item movie-item clearfix wow fadeInUp swiper-slide">';
                                        get_template_part('partials/post', 'movieitem');
                                        echo '</div>';

                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </section>
                    </div>

                    <!--  <div class="text-center">
                         <button type="button" class="btn_more_post videoScroll" id="more_posts">
                             <img src="http://arte365.kr/wp-content/uploads/2019/07/btn_more.png" alt="">
                         </button>
                     </div> -->

                </div><!--// left-area -->
            </div>
            <div class="clearfix">
                <a class="moviepage_view plusBottom" href="/?cat=11856">영상 더보기</a>
            </div>
        </div>
    </div>

</div><!--// container -->
<div class="submit_area mt_60">
	<div>
		<div class="newsList" id="recentPosts">
			 <button type="button" class="note_more top" onclick="location.href='/?cat=2806'">현장소식 더보기</button>
				<p class="tit">현장소식</p>
				<div class="post-list">

	
<div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.arte.or.kr/information/notice/Notice_BoardView.do?board_id=BRD_ID0065847" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="r">진흥원</span></p>
					<div class="text">
						<h3 class="post-title">2024 문화예술교육사 실습처 운영 지원사업 관련 실습처 운영기관 안내</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div>

<div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.arte.or.kr/information/notice/Notice_BoardView.do?board_id=BRD_ID0065679" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="r">진흥원</span></p>
					<div class="text">
						<h3 class="post-title">2024 아르떼 아카데미 연수 참여자 모집 안내</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div>

<div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.arte.or.kr/information/notice/Notice_BoardView.do?board_id=BRD_ID0065700" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="r">진흥원</span></p>
					<div class="text">
						<h3 class="post-title">예술과 책이 있는 점심, &lt;아르떼 북 토크&gt; 시즌2 라인업 공개</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div>

<div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://ifac.or.kr/IFACBBS/board.php?bo_table=Ifacbbs_oc4601&wr_id=4067" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">인천</span></p>
					<div class="text">
						<h3 class="post-title">2024 인천 문화예술교육 기획 지원 운영 프로그램 안내 (프로그램별 상이)</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div>

<div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.cbfc.or.kr/home/sub.php?menukey=6430&mod=view&no=1476647" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">충북</span></p>
					<div class="text">
						<h3 class="post-title">2024 충북도립극단 역량강화프로그램 모집공고 (~8.29.)</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div>



<div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.cacf.or.kr/site/board/index.php?table_nm=tbl_culture&fn=view&no=2024070408061565368&page=1" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">충남</span></p>
					<div class="text">
						<h3 class="post-title">장애인 문화예술교육 이용권 준비사업 교육시설 모집 공고 (~10.31.)</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div>

<!-- <div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.gacf.kr:2035/coding/sub1/sub1.asp?bseq=1&cat=-1&sk=&sv=&yy=&page=1&mode=view&aseq=8660" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">경북</span></p>
					<div class="text">
						<h3 class="post-title">2024년도 문화예술교육사업 공모 일정 안내 (공모별 마감 상이)</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div> -->

<!-- <div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.cbfc.or.kr/home/sub.php?menukey=6441&mod=view&no=1273428" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">충북</span></p>
					<div class="text">
						<h3 class="post-title">2024 충북 문화예술지원사업 공모 (공모별 마감 상이)</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div> -->

<!-- <div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.cacf.or.kr/_kor/developer/m_board/m_board.php?tb_nm=tbl_culture&m_mode=view&pds_no=2024011116085824856&PageNo=1" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">충남</span></p>
					<div class="text">
						<h3 class="post-title">2024 지역특성화 문화예술교육 지원사업 공모 (~2.13.)</h3>
						<span class="post-date">2024.08.27.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div> -->
	
	
	
	
	


						

				</div>
				<button type="button" class="note_more bottom" onclick="location.href='/?cat=2806'">현장소식 더보기</button>
        </div>

		<div class="submit_news">
			<?php get_template_part('partials/page', 'main_subscribe');?>
		</div>
	</div>
</div>

<!-- 230601 신청하기 팝업 추가 -->
<div class="news-bg"></div>
<div class="newsletter_popup">
    <div class="newsletter_popup__inner">
        <span class="newsletter_popup__tit">뉴스레터 신청</span>
        <p class="newsletter_popup__txt">
                뉴스레터 신청이 완료되었습니다.
        </p>
        <button type="button" class="newsletter_popup__close-btn">확인</button>
    </div>
</div>
<!--// 230601 신청하기 팝업 추가 -->

<script>
	jQuery('#myTabContent>.tab_box:nth-child(3)').addClass('active');
    jQuery(".single-swiper-container").each(function(index, element){
        var $this = jQuery(this);
        $this.addClass("instance-" + index);
        var swiper = new Swiper(".instance-" + index, {
            //direction: 'vertical',
            slidesPerView: 1,
            observer: true,
            observeParents: true,
            centeredSlides: true,
            initialSlide: 2,
            visibilityFullFit: true,
            speed: 1000,
            pagination: {
                el: '.curation .single-swiper-pagination',
                type: 'fraction',
                /*renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                },*/
            },
            navigation: {
                nextEl: ".curation-slider .swiper-button-next",
                prevEl: ".curation-slider .swiper-button-prev",
            },
        });
        swiper.on('slideChange', function () {
            //console.log(swiper.realIndex);
            var swiperNum = swiper.realIndex+1
            jQuery('#myTabContent>.tab_box').removeClass('active');
            jQuery('#myTabContent>.tab_box:nth-child('+swiperNum+')').addClass('active');
        });
		jQuery('#curationPop li').on('click', function() {
            var tab_no = jQuery(this).attr('data-no') - 1;
            swiper.slideTo(tab_no, 700, function() {
                jQuery('.popCuration').removeClass('on');
                jQuery('.cu-bg').removeClass('on');
                jQuery('body').css('overflow', 'inherit');
            });
        });
    });

    jQuery(".multiple-swiper-container").each(function(index, element){
        var $this = jQuery(this);
        $this.addClass("multiple-" + index);
        $this.find(".multiple-swiper-button-prev").addClass("multiple-btn-prev-" + index);
        $this.find(".multiple-swiper-button-next").addClass("multiple-btn-next-" + index);
        var multipleSwiper = new Swiper(".multiple-" + index, {
            //slidesPerView: 2,
            //slidesPerColumn: 2,
            slidesPerGroup: 1,
            spaceBetween: 40,
            pagination: {
                el: '.multiple-swiper-pagination',
                clickable: true,
                //type: 'fraction'
            },
            navigation: {
                nextEl: ".multiple-btn-next-" + index,
                prevEl: ".multiple-btn-prev-" + index,
            },
					loop: true,

			 breakpoints: {
				// when window width is >= 320px
				800: {
				  slidesPerView: 1,
				},
				// when window width is >= 640px
				2560: {
				  slidesPerView: 4,
				}
			  }
        });
    });
    // slide 
    jQuery('#myTabContent>.tab_box').css('display', 'block')
    // setTimeout(() => {    
    // }, 1000);
    jQuery('#myTabContent>.tab_box.active ').css('display', '')
    jQuery('#myTabContent>.tab_box').css('display', 'none')
    
    var ppp = 4; // Post per page
    var cat = 11856;
    var pageNumber = 1;

    function load_posts(){
        pageNumber++;
        var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        jQuery.ajax({
            type: "POST",
            dataType: "html",
            //url: ajax_posts.ajaxurl,
            url: '<?php echo admin_url('admin-ajax.php');?>',
            data: str,
            success: function(data){
                var $data = jQuery(data);
                if($data.length){
                    jQuery("#ajax-posts").append($data);
                    jQuery("#more_posts").attr("disabled",false);
                } else{
                    jQuery("#more_posts").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        return false;
    }

    jQuery("#more_posts").on("click",function(){ // When btn is pressed.
        jQuery("#more_posts").attr("disabled",true); // Disable the button, temp.
        load_posts();
    });
    
    // ajax 로드일 경우 영상 모달
    jQuery('#ajax-posts').on('click', ".play_video_modal", function() {
        // const dataHash = $(this).data('hash');
        // window.location.hash = dataHash ?? '';
        var videoLink =  jQuery(this).next('.video_link').text();
        var postTitle =  jQuery(this).next().next('.post_title').text();
        var exLink =  jQuery(this).next().next().next().next('.ex_link').text();
		var sTitle =  jQuery(this).next().next().next('.post_subtit').text();

        jQuery('#modalTutorialYoutube').modal("show");
        //jQuery('#movieTitle').html('<h4 class="movie_post_tltle">'+ postTitle + '</h4>');
		jQuery('#movieTitle').html('<p class="movie_post_tltle">'+ sTitle + '</p>');
        jQuery('#movieOutLink').html('<a class="btn movie_outlink" href="'+exLink+'" target="_blank">관련기사보기</a>');
        jQuery('#playYoutubeView').html('<iframe width="740" height="455" src="'+ videoLink + '?autoplay=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    });

    jQuery('#modalTutorialYoutube').on('hidden.bs.modal', function () {
        jQuery('#movieTitle').html('')
        jQuery('#movieOutLink').html('')
        jQuery("#playYoutubeView").html('');
    });
    
</script>


<script>
function hideMe(s) {
  var divObj = document.getElementById(s);
  divObj.style.display = "none";
} 

function showMe(s) { 
  document.s.visibility="show"; 
} 

//document.onmousedown=ddInit; 
document.onmouseup=Function("ddEnabled=false"); 

//쿠키 가져오기
function divpop_getCookie( name ){
	var nameOfCookie = name + "=";
	var x = 0;
	
	while ( x <= document.cookie.length )
	{
		var y = (x+nameOfCookie.length);
		if ( document.cookie.substring( x, y ) == nameOfCookie ) {
		if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
		endOfCookie = document.cookie.length;		
		return unescape( document.cookie.substring( y, endOfCookie ) );
	}
	x = document.cookie.indexOf( " ", x ) + 1;
	if ( x == 0 )
		break;
	}
	return "";
}

//쿠키굽기
function divpop_setCookie_OLD( name, value, expiredays )
{
	var todayDate = new Date(); 
	var expiretime = 23-todayDate.getHours();
	var expireminutes = 60-todayDate.getMinutes(); 

	todayDate.setHours( todayDate.getHours() + expiretime ); 
	todayDate.setMinutes(todayDate.getMinutes() + expireminutes);
	document.cookie = name + "=" + escape( value ) + "; path=/main/; expires=" + todayDate.toGMTString() + ";";
}

function divpop_setCookie( name, value, expiredays ){
	var todayDate = new Date();   
	todayDate = new Date(parseInt(todayDate.getTime() / 86400000) * 86400000 + 54000000);  
	if ( todayDate > new Date() ){  
		expiredays = expiredays - 1;  
	}  
	todayDate.setDate( todayDate.getDate() + expiredays );   
	 document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"   
}



function divpop_closeWin(obj){

  var todayDate = new Date(); 
  var expiretime = 23-todayDate.getHours();
  var expireminutes = 60-todayDate.getMinutes(); 

  todayDate.setHours( todayDate.getHours() + expiretime ); 
  todayDate.setMinutes(todayDate.getMinutes() + expireminutes);

  divpop_setCookie( obj, 'done' , 1);

  //query_frm.location.href="divpop_status.asp?div_name="+obj+"&exdate="+todayDate.toGMTString();
  hideMe(obj);
}

function divpop_status(obj) 
{		
	if(divpop_getCookie(obj) == 'done'){				
		document.getElementById(obj).style.display = "none";
	}		
}
</script>
<!-- #################################################     팝업관련 소스 시작  ############################################################### -->
<!-- <style type="text/css">
 div#divpop1 {display:block;position:absolute; left:50%; top:0;transform:translateX(-50%);z-index:1000;width:587px;height:549px;}
 div#divpop1 div.con_box2 {position:relative;width:587px;height:549px;background:#fff;}
 div#divpop1 div.bo_box {position:relative;width:100%;height:50px;background:#fff;}
 div#divpop1 div.bo_box span {color:#000; display:inline-block;width:250px;padding:16px 20px;box-sizing:border-box;line-height:15px;letter-spacing:-0.05em;  font-size:15px;}
 div#divpop1 div.bo_box span em {color:#000; }
 div#divpop1 div.bo_box input {vertical-align:middle;float:left;display:inline-block;width:13px;height:13px;margin-top:1px;margin-right:7px;line-height:15px;}
 div#divpop1 div.bo_box a.btn_close {display:block;height:auto;padding:0;line-height:15px;position:absolute;top:18px;right:22px;color:#000;  font-size:15px;}
 </style>
 <div id="divpop1" onload="startTime01();">
 	<form name="notice_form01">
 		<div class="con_box2">
 			<img src="http://arte365.kr/wp-content/uploads/2020/07/popup_0717.jpg" border="0"/>
 		</div>
 
 		<div class="bo_box">
 		<span><input type="checkbox" name="chkbox" onClick="javascript:divpop_closeWin('divpop1');" value="checkbox"> 오늘 하루 이 창을 열지 않음</span>
 		<a href="javascript:hideMe('divpop1');" class="btn_close">닫기</a>
 		</div>
 
 
 	</form>
 </div>
 <script type="text/javascript" language="Javascript">
 divpop_status("divpop1");
 </script> -->
<!-- #################################################     팝업관련 소스 끝   ############################################################### -->

<script>
	jQuery(function($){
			var eventimg = $(".event_banner img"); // 이벤트배너 img 파일 찾기
			var eventsrc = eventimg.attr('src');     // 이벤트배너 이미지 주소값 src 가지고 오기  https://java7.tistory.com/89
			var newSrc = eventsrc?.substring(0, eventsrc.lastIndexOf('.')); // .png, .jpg와 같이 파일명 자르기, 뒤에서 부터 시작해서 '.'점있는 곳 까지 컷!
			$(window).resize(function (){
				var w = window.innerWidth;
				
				if(w > 900){
					eventPcBox();
				}
				else {
					eventMobilekjBox();
				}
			   
			});


			function eventPcBox(){
				eventimg.removeClass("on");
				$(".event_banner").find('img').attr('src', newSrc + '.' + /[^.]+$/.exec(eventsrc)); //hover시 _m 때기
			}

			function eventMobilekjBox(){
				eventimg.addClass("on");
				$(".event_banner").find('img').attr('src', newSrc+ '_m.' + /[^.]+$/.exec(eventsrc)); //hover시 _m 붙이기
			}
		
	});
</script>

<script>
    // 20230607 메인 뉴스레터 팝업 추가
	jQuery('.btn-submit').on('click', function() {
	 //console.log("a");
		/*
		jQuery('body').css('overflow', 'hidden');
		jQuery('.news-bg').addClass('on');
		jQuery(".newsletter_popup").toggleClass('on');
		if(jQuery(this).hasClass('on')){
			jQuery(".newsletter_popup").removeClass('on');
		}else{
			jQuery(".newsletter_popup").addClass('on');
		}
		*/
	});

    jQuery('.newsletter_popup__close-btn').click(function(){
		jQuery('.newsletter_popup').removeClass('on');
		jQuery('.news-bg').removeClass('on');
		jQuery('body').css('overflow', 'inherit');
	});
</script>

<?php
    }
    include($_SERVER["DOCUMENT_ROOT"]."/cache/bottom-cache.php");
?>
