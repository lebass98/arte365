<?php
$filepath = realpath(__FILE__);
include($_SERVER["DOCUMENT_ROOT"] . "/cache/top-cache.php");
if (!$cacheCheck) {
	?>


	<?php
	$main_banner = get_field('m_main_banner');
	$main_banner_link = get_field('m_main_banner_link');
	$full_banner = get_field('m_full_banner');
	$full_banner_link = get_field('m_full_banner_link');
	$video = get_field('m_video');
	?>
	<style>
		/* -----------------------------메인 이미지----------------------- */
		#main .swiper-slide01 .home-main-banner {
			height: 206px;
			background: url('https://arte365.kr/wp-content/uploads/2026/06/issue1_20260615_main.jpg') no-repeat;
			background-size: cover;
		}

		#main .swiper-slide02 .home-main-banner {
			height: 206px;
			background: url('https://arte365.kr/wp-content/uploads/2026/06/issue2_20260615_main.jpg') no-repeat;
			background-size: cover;
		}

		/* #main .swiper-slide03 .home-main-banner {
			height: 206px;
			background: url('https://arte365.kr/wp-content/uploads/2026/05/idea_20260522_main.jpg') no-repeat;
			background-size: cover;
		} */

		/* #main .swiper-slide04 .home-main-banner {height: 206px; background: url(https://arte365.kr/wp-content/uploads/2025/10/report2_20251027_main.jpg) no-repeat; background-size: cover;} */
		/* -----------------------------메인 이미지----------------------- */


		.featured-posts .post-item:first-child .tb:before {
			background-size: 100% 90%;
			opacity: 1
		}

		.featured-posts .post-item:last-child .tb:before {
			background-size: 100% 77%;
		}

		/* #main	.home-main-banner .banner-desc .post-meta{top:5%;bottom:auto; left: 23%; width: auto;text-shadow: 0px 0px 2px #000000;} */
		/* #main	.home-main-banner .banner-desc .post-meta{top: 25%; bottom: 5%; left: 15px;width: 74%; text-shadow: 0px 0px 2px #000000; text-align:left} */
		#main .home-main-banner .banner-desc .post-meta {
			top: 12%;
			bottom: 5%;
			left: 85px;
			width: 74%;
			text-align: left
		}

		.cover-bg:before {
			display: block;
			width: 100%;
			height: 100%;
			content: ""
		}

		@media (min-width:600px) {
			#main .home-main-banner .banner-desc .post-meta {
				top: 80px;
				left: 45px;
			}
		}

		@media screen and (max-width:1024px) {
			.home-main-banner .banner-desc .post-meta .post-excerpt {
				width: 85%;
			}
		}

		/* @media (max-width:600px){
					 #main .home-main-banner .banner-desc .post-meta{top: 125%; bottom: 5%; left: 25px;width: 74%;  text-align:left}
			
				 } */

		a[href="http://arte365.kr/?p=78449"] .post-excerpt {
			display: none
		}

		a[href="http://arte365.kr/?p=78449"] .authur {
			color: #000;
		}

		a[href="http://arte365.kr/?p=78449"] .tb:before {
			display: none
		}

		a[href="http://arte365.kr/?p=74753"] .post-meta {
			display: none
		}


		.post-meta .mobile {
			display: none;
		}

		/* 230428 임시 추가 */
		/* .post-list .post-item:nth-child(1) .post-title{width:70%;} */
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

	<div class="month-box mobile">
		<span class="month-box--tit">이달의 주제</span>
		<div class="month-cont">
			지금 문화예술교육은 무엇과 맞서고 있나
			<p>각자가 애쓰고 힘을 다하는 지점들로부터 출발해 문화예술교육이 마주한 현실에 대한 서로 다른 경험과 감각, 고민과 기대를 펼쳐놓습니다. 우리가 놓치고 있었던 질문과 아직 충분히 말해지지 않은 이야기를 발견하고자 합니다.</p>
		</div>
		<div class="month-page">
			<!-- <a class="month-pc-a" href="/?post_type=subject&as_post="><span>주제별 관련</span> 기사보기</a> -->
			<a class="month-pc-a" href="/?post_type=subjectgroup&as_post=113887">편집노트 더보기</a>
		</div>
	</div>

	<div class="mainSwiper_box">
		<div class="swiper swiper_main">
			<div class="swiper-wrapper">
				<?php
				$idx = 0;
				$featured_post_ids = get_field('featured_posts');
				if ($featured_post_ids):
					$featured_post_ids = explode(",", $featured_post_ids);
					?>
					<?php
					$featured_posts = new WP_Query(array('post_type' => 'post', 'post__in' => $featured_post_ids, 'orderby' => 'post__in'));
					if ($featured_posts->have_posts()):
						while ($featured_posts->have_posts()):
							$featured_posts->the_post();
							$slide_class = 'swiper-slide swiper-slide0' . (($idx % 3) + 1);
							?>
							<div class="<?php echo $slide_class; ?>">
								<a href="<?php the_permalink(); ?>" target="_self" alt="<?php the_title(); ?> 기사보기 클릭">
									<div class="home-main-banner cover-bg">
										<img src="<?php the_post_thumbnail_url(); ?>">
										<span class="category"><?php the_arte365_get_category_string(); ?></span>
									</div>
									<div class="banner-desc">
										<div class="post-meta">
											<h1 class="post-title">
												<?php the_title(); ?>
											</h1>
											<p class="post-excerpt"><?php the_field('small_title'); ?></p>
											<span class="authur"><?php the_field('publisher'); ?></span>
										</div>
									</div>
								</a>
							</div>
							<?php
							$idx++;
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				<?php
				endif;
				?>

			</div>
		</div>
	</div>

	<?php
	$idx = 0;
	$featured_post_ids = get_field('featured_posts');
	if ($featured_post_ids):
		$featured_post_ids = explode(",", $featured_post_ids);

		?>
		<!-- <div class="featured-posts">
	<div class="post-list">
		<?php
		$featured_posts = new WP_Query(array('post_type' => 'post', 'post__in' => $featured_post_ids, 'orderby' => 'post__in'));
		if ($featured_posts->have_posts()):
			while ($featured_posts->have_posts()):
				$featured_posts->the_post();
				?>

						<div class="post-item">
							<div class="inner">
								<a href="<?php the_permalink(); ?>"   target="_self" alt="<?php the_title(); ?> 기사보기 클릭">
									<div class="tb"></div>
									<div class="post-category"><span><?php the_arte365_get_category_string(); ?></span></div>
									<div class="meta-box">
										<h1 class="post-title"><?php the_title(); ?></h1>
										<p class="post-excerpt"><?php the_field('small_title'); ?></p>
										<div class="post-meta">
											<span class="authur"><?php the_field('publisher'); ?></span>
										</div>
									</div>
								</a>
							</div>
						</div>
			<?php
					$idx++;
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>    
</div> -->

		<div class="home-tab-content">
			<div class="inner mVideo_inner">
				<!-- <input type="text" id="post_movie_num" value="4"> -->
				<div class="clearfix mVideo_list" style="position:relative;">
					<p class="movie_title text-center">아르떼365 영상</p>
					<a class="moviepage_view plusTop" href="/?cat=11856">더보기</a>
				</div>
				<?php
				$postsPerPage = 2;
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
				?>
				<!-- left-area -->
				<div class="left-area mVideo">
					<div class="tab-content clearfix">

						<div class="swiper_box">
							<div class="swiper swiper_video">
								<div class="swiper-wrapper">
									<?php
									while ($loop->have_posts()):
										$loop->the_post();

										echo '<div class="post-item movie-item clearfix wow fadeInUp swiper-slide">';
										get_template_part('partials/post', 'movieitem');
										echo '</div>';

									endwhile;
									wp_reset_postdata();
									?>
								</div>
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>

					<!-- //mainVideo -->
				</div>
			</div>
			<!-- <div class="btnBox" style="overflow: hidden;margin:40px 3% 0 3%; width: 93%; box-sizing: border-box;">
				<a href="/?cat=11856" style="display: block;padding: 0 5px 0 5px;bottom: 0; width: 100%; height: 40px;color: #fff; border: 1px solid #c8c8c8; background-color: #333333; line-height: 40px; font-size: 18px; text-align: center; cursor: pointer;  z-index: 10; box-sizing: border-box;font-weight:300;">영상 더보기</a>
			</div> -->
		</div>
		</div>
		<div class="main-event__wrap">
			<div class="sec-tit-flex">
				<p class="sec-tit event_title text-left">아르떼365 event</p>
				<a class="sec-viewBtn eventpage_view plusTop" href="/?cat=2809">더보기</a>
			</div>
			<div class="event-poster">
				<a href="/?p=113154">
					<img src="/wp-content/uploads/2026/04/event1_20260406_01_main_.jpg" alt="365 댓글 ON 이벤트">
				</a>

				<!-- <a href="/?p=112417">
				<img src="/wp-content/uploads/2026/01/event1_20260119_main.jpg" alt="덕담 릴레이 이벤트">
			</a> -->

				<!-- 251121 온라인폴 당첨자발표 -->
				<!-- <a href="/?p=111566">
				<img src="/wp-content/uploads/2025/11/event_202501121_main.jpg" alt="온라인폴 당첨자발표 배너">
			</a> -->

				<!-- 260417 온라인폴 -->
				<!-- <a class="moaform-embed" href="https://moaform.com/q/arte365_fight?embed" data-type="popup" target="_blank">
				<img src="/wp-content/uploads/2026/04/event1_20260417_01_main.jpg" alt="아르떼365 2026 독자 설문조사 포스터">
			</a>
			<script>(function() { var s, b; s = document.createElement('script'); s.src = '//asset.moaform.com/embed/e.js'; b = document.getElementsByTagName('body')[0]; b.insertBefore(s, b.firstChild); })()</script> -->
			</div>

		</div>

		<!-- 주제별 기사 -->
		<div class="month_wrap">
			<div class="month_inner">
				<div class="month_list">
					<div class="month_list__tit">주제별 기사</div>
					<button type="button" onclick="location.href='/?post_type=subject&amp;as_post=';" title="더보기">더보기</button>
				</div>
				<div class="swiper_box">
					<div class="swiper swiper_month">
						<div class="swiper-wrapper">

							<div class="swiper-slide">
								<div class="month_cont month_cont01">
									<div class="month_cont__list">
										<a class="month_cont__tit" href="/?post_type=subjectgroup&as_post=113225/">회고하며 나아가기</a>
										<div class="month_cont__txt">
											<span>#기록</span>
											<span>#성찰</span>
											<span>#전환</span>
											<span>#담론</span>
											<span>#변화</span>
											<span>#현장과 정책</span>

										</div>
									</div>
									<div class="month_link__list">
										<div class="month_link__cont">
											<a href="/?p=113586/">
												<span>이슈</span>
												<p>시작은 돌봄이라도, 본질은 예술에</p>
											</a>
										</div>
										<div class="month_link__cont">
											<a href="/?p=113406/">
												<span>이슈</span>
												<p>전환의 시간, 다시 질문을 시작하자</p>
											</a>
										</div>
										<div class="month_link__cont">
											<a href="/?p=113483/">
												<span>인터뷰</span>
												<p>인문정신문화-문화예술교육을 축으로, ‘문화국가’를 꿈꾼다</p>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="month_cont month_cont02">
									<div class="month_cont__list">
										<a class="month_cont__tit" href="/?post_type=subjectgroup&as_post=112748/">문화예술교육의 방향
											찾기</a>
										<div class="month_cont__txt">
											<span>#AI시대</span>
											<span>#변화</span>
											<span>#존엄</span>
											<span>#변하지 않는 것</span>
											<span>#가치</span>
											<span>#본질</span>
										</div>
									</div>
									<div class="month_link__list">
										<div class="month_link__cont">
											<a href="/?p=112719/">
												<span>이슈</span>
												<p>너의 말에 귀 기울일 때 세상은 변한다</p>
											</a>
										</div>
										<div class="month_link__cont">
											<a href="/?p=112853/">
												<span>이슈</span>
												<p>그 마음이 노동이다</p>
											</a>
										</div>
										<div class="month_link__cont">
											<a href="/?p=112855/">
												<span>리뷰</span>
												<p>닫힌 몸에서 피어난 순간</p>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="month_cont month_cont03">
									<div class="month_cont__list">
										<a class="month_cont__tit" href="/?post_type=subjectgroup&as_post=112172/">살아가는 감각
											well-being</a>
										<div class="month_cont__txt">
											<span>#주관적 웰빙</span>
											<span>#긍정적</span>
											<span>#행복</span>
											<span>#예술치유</span>
											<span>#삶</span>
											<span>#자기돌봄</span>
										</div>
									</div>
									<div class="month_link__list">
										<div class="month_link__cont">
											<a href="/?p=112242/">
												<span>이슈</span>
												<p>“밭 몇 마지기나 더 사지, 쓸데없는 짓 허네”</p>
											</a>
										</div>
										<div class="month_link__cont">
											<a href="/?p=112635/">
												<span>이슈</span>
												<p>창작자의 잘살기</p>
											</a>
										</div>
										<div class="month_link__cont">
											<a href="/?p=112474/">
												<span>인터뷰</span>
												<p>끓어오르기까지, 채우고 비우고 나누는 에너지</p>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>
		<!--// 주제별 기사 -->

		<!-- 키워드별 큐레이션 -->
		<div class="main_subject_wrap">
			<div class="curationWrap">
				<div class="curationWrap_inner">
					<div class="subject_list">
						<div class="subject_tab_title">키워드별 큐레이션</div>
						<button type="button" onclick="location.href='/?post_type=keywords&amp;as_post=';"
							title="더보기">더보기</button>
					</div>
					<div class="swiper_box">
						<div class="swiper swiper_subject">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<a href="/?post_type=keywordlist&as_post=105444">
										<p class="subject_cont__tit">장벽 없는 문화예술교육</p>
										<div class="subject_keyword__cont">
											<div class="subject_keyword__inner">
												<span>접근성</span>
												<span>다양성</span>
												<span>장벽 없애기</span>
												<span>장애예술</span>
												<span>배리어프리</span>
												<span>라포 형성</span>
											</div>
										</div>
									</a>
								</div>
								<div class="swiper-slide">
									<a href="/?post_type=keywordlist&as_post=109623">
										<p class="subject_cont__tit">참여자 관점 문화예술교육</p>
										<div class="subject_keyword__cont">
											<div class="subject_keyword__inner">
												<span>문화예술교육주체</span>
												<span>새로운 관계 맺기</span>
												<span>나의 문화예술교육 이야기</span>
												<span>관점의 전환</span>
												<span>삶의 변화</span>
											</div>
										</div>
									</a>
								</div>
								<div class="swiper-slide">
									<a href="/?post_type=keywordlist&as_post=105431">
										<p class="subject_cont__tit">지구를 생각하는 예술</p>
										<div class="subject_keyword__cont">
											<div class="subject_keyword__inner">
												<span>기후위기</span>
												<span>환경</span>
												<span>생태감수성</span>
												<span>공존</span>
												<span>SDGs</span>
												<span>전지구적문제</span>
											</div>
										</div>
									</a>
								</div>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--// 키워드별 큐레이션 -->

		<div class="home-tab-content home-tab-content_news">
			<div class="inner">
				<input type="text" id="post_num" value="8">
				<div class="main_sort clearfix">

					<div class="sort_reply" id="post_sort">
						<label for="posts_group1" class="apply_relate is-active">
							<input type="radio" value="" id="posts_group1" name="post_sel" checked />
							<span>최신등록순</span>
						</label>
						<span class="sort_reply__icon">/</span>
						<label for="posts_group2" class="article_view">
							<input type="radio" value="C" id="posts_group2" name="post_sel" />
							<span>최근 댓글 달린 기사<div class="commentNew" style="display:none;">N</div></span>
						</label>
					</div>
					<button type="button" onclick="location.href='/?page_id=74904'" title="더보기">더보기</button>

					<!--<div class="sort_tit selectPost_tit">최신등록순</div>
				<select name="" id="post_sort">
					<option value="">최신등록순</option>
					<option value="C">가장많이 본 기사</option>
					<option  value="A">전체기사보기</option> 
				</select>-->


				</div>
				<div class="tab-contents clearfix">
					<!-- left-area -->
					<div class="left-area">
						<div class="tab-content active" id="recentPosts">

							<div class="post-list clearfix" id="main_last_post">

							</div>
							<div class="text-center">
								<button type="button" class="btn_more_post" id="main_post_add">
									<!-- <img src="http://arte365.kr/wp-content/uploads/2019/07/btn_more.png" alt=""> -->
								</button>
								<button type="button" class="btn_more_post" id="main_post_remove">
									<!-- <img src="http://arte365.kr/wp-content/uploads/2019/07/btn_remove.png" alt=""> -->
								</button>
							</div>

						</div>
					</div><!--// left-area -->


				</div>
			</div>
		</div>

		<div class="home-tab-content mt_40">
			<!-- <input type="text" class="scroll_slide" value=""  /> -->

			<div class="submit_area mt_50">
				<div class="mt_40">
					<div class="newsList text-center" id="recentPosts">
						<div class="submit_list">
							<p class="tit">현장소식</p>
							<button type="button" class="note_more top" onclick="location.href='/?cat=2806'">더보기</button>
						</div>
						<div class="post-list">

				

							<div class="post-item newsList post-item-s clearfix">
								<article class="post" id="">
									<a href="https://www.gcaf.or.kr/bbs/board.php?bo_table=sub3_7&wr_id=2207&me_code=a020"
										target="_blank">
										<div class="post-desc">
											<div class="post-meta">
												<p class="publisher"><span class="b">경남</span></p>
												<div class="text">
													<h3 class="post-title">2026 문화대장간 풀무 문화예술지원실 입주 지원 사업 추가(3차)공모 공고 (~6.22.)</h3>
													<span class="post-date">2026.06.15</span>
												</div>
											</div>
										</div>
									</a>
								</article>
							</div>

							<div class="post-item newsList post-item-s clearfix">
								<article class="post" id="">
									<a href="https://ggarte.ggcf.kr/?p=79&page=1&viewMode=view&reqIdx=202606121539402849"
										target="_blank">
										<div class="post-desc">
											<div class="post-meta">
												<p class="publisher"><span class="b">경기</span></p>
												<div class="text">
													<h3 class="post-title">2026 경기문화예술교육 매개자 연수 [성큼] 참여자 모집 (~6.23.)</h3>
													<span class="post-date">2026.06.15</span>
												</div>
											</div>
										</div>
									</a>
								</article>
							</div>

							<div class="post-item newsList post-item-s clearfix">
								<article class="post" id="">
									<a href="https://www.ggcf.kr/boards/businessNotices/articles/21337" target="_blank">
										<div class="post-desc">
											<div class="post-meta">
												<p class="publisher"><span class="b">경기</span></p>
												<div class="text">
													<h3 class="post-title">2026년 경기문화예술교육 기반구축 판로지원 <노는예술> 2차 공모 안내 (~6.25.)</h3>
													<span class="post-date">2026.06.15</span>
												</div>
											</div>
										</div>
									</a>
								</article>
							</div>

							<div class="post-item newsList post-item-s clearfix">
								<article class="post" id="">
									<a href="https://dgfca.or.kr/article/NOTICE/detail/13600?article_seq=&prt_seq=&flag=&pageIndex=1&searchOrderBy=&searchCondition=TA.SUBJECT&searchKeyword=" target="_blank">
										<div class="post-desc">
											<div class="post-meta">
												<p class="publisher"><span class="b">대구</span></p>
												<div class="text">
													<h3 class="post-title">2026년 꿈의 스튜디오 대구 참여 학생 모집 (~6.26.)</h3>
													<span class="post-date">2026.06.15</span>
												</div>
											</div>
										</div>
									</a>
								</article>
							</div>

							<div class="post-item newsList post-item-s clearfix">
								<article class="post" id="">
									<a href="https://www.bscf.or.kr/view.do?pageIndex=1&pgMode=show&sv=&sw=&no=1010&nowUrl=%2Fview.do%3Fno%3D1010&siteId=SITE003&pbancSn=2351&_csrf=83e07258-bb96-4788-aa7b-aae6f7411469"
										target="_blank">
										<div class="post-desc">
											<div class="post-meta">
												<p class="publisher"><span class="b">부산</span></p>
												<div class="text">
													<h3 class="post-title">2026 구석구석 문화가 있는 날 <우리동네 다락방(多樂房)> 운영단체 모집 공모 (~6.26.)</h3>
													<span class="post-date">2026.06.15</span>
												</div>
											</div>
										</div>
									</a>
								</article>
							</div>


							<div class="post-item newsList post-item-s clearfix">
								<article class="post" id="">
									<a href="https://dcaf.or.kr/web/board.do?menuIdx=375&bbsIdx=18959"
										target="_blank">
										<div class="post-desc">
											<div class="post-meta">
												<p class="publisher"><span class="b">서울</span></p>
												<div class="text">
													<h3 class="post-title">2026 꿈의 예술단 플러스 단원 모집 (~7.31. 모집 시까지)</h3>
													<span class="post-date">2026.06.15</span>
												</div>
											</div>
										</div>
									</a>
								</article>
							</div>

							<!-- <div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://dgfca.or.kr/article/NOTICE/detail/12897?article_seq=&prt_seq=&flag=&pageIndex=1&searchOrderBy=&searchCondition=TA.SUBJECT&searchKeyword=" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">대구</span></p>
					<div class="text">
						<h3 class="post-title">2026년도 대구문화예술지원사업 공모계획 및 일정 안내 (12.12.~1.5.)</h3>
						<span class="post-date">2025.12.01.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div> -->


							<!-- <div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.sfac.or.kr/opensquare/notice/notice_list.do?cbIdx=955&bcIdx=136835&type=" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">서울</span></p>
					<div class="text">
						<h3 class="post-title">2025 서울연극창작센터 《OPEN:LAB THEATER(오픈랩 씨어터)》 공모 (~7.30.)</h3>
						<span class="post-date">2025.12.01.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div> -->

							<!-- <div class="post-item newsList post-item-s clearfix">
	<article class="post" id="">
		<a href="https://www.gacf.kr:2035/coding/sub1/sub1.asp?bseq=1&cat=-1&sk=&sv=&yy=&page=1&mode=view&aseq=8660" target="_blank">
			<div class="post-desc">
				<div class="post-meta">
					<p class="publisher"><span class="b">경북</span></p>
					<div class="text">
						<h3 class="post-title">2024년도 문화예술교육사업 공모 일정 안내 (공모별 마감 상이)</h3>
						<span class="post-date">2024.12.16.</span>
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
						<span class="post-date">2024.12.16.</span>
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
						<span class="post-date">2024.12.16.</span>
					</div>
				</div>
			</div>
		</a>
	</article>
</div> -->

						</div>
						<!-- <button type="button" style="margin:40px 3% 0 3%;bottom:0;width:94%;height:48px;color: #888888;border: 1px solid #c8c8c8;background: #f8f8f8;font-size:32px;text-align:center;cursor: pointer;z-index:10;" onclick="location.href='/?cat=2806'"><div style="margin-top:-4px;">+</div></button> -->
					</div>
					<div class="submit_news">
						<?php get_template_part('partials/page', 'main_subscribe'); ?>
					</div>
				</div>
			</div>

		<?php
	endif;
	?>
	</div>

	<?php if ($video): ?>
		<div class="home-video">
			<div class="video-area">
				<img src="https://dummyimage.com/1920x1080/000/000">
				<?php arte365_get_video_embed_html_from_url($video); ?>
			</div>
		</div>
	<?php endif; ?>

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
		var vScrollswiper = new Swiper(".vScroll .mySwiper", {
			slidesPerView: 1,
			scrollbar: {
				el: ".vScroll .swiper-scrollbar",
				//hide: false,
			},
		});
	</script>

	<script>
		// 메인 기사 슬라이드
		jQuery(".mainSwiper_box").each(function (index, element) {
			var swiper = new Swiper(".swiper_main", {
				// loop: false,
				loop: true,
				slidesPerView: "auto",
				spaceBetween: 8,
				allowTouchMove: true,
				observer: true,
				observeParents: true,
				freeMode: false,
				watchSlidesVisibility: true,
				watchSlidesProgress: true,
				centeredSlides: true,
				speed: 300,
			});
		});

		// 메인 영상 슬라이드
		jQuery(".swiper_video").each(function (index, element) {
			var swiper = new Swiper(".swiper_video", {
				// loop: false,
				loop: true,
				slidesPerView: "auto",
				spaceBetween: 8,
				allowTouchMove: true,
				observer: true,
				observeParents: true,
				freeMode: false,
				watchSlidesVisibility: true,
				watchSlidesProgress: true,
				centeredSlides: true,
				speed: 300,
				pagination: {
					el: ".swiper-pagination",
				},
			});
		});
		// 메인 키워드별 큐레이션
		jQuery(".swiper_subject").each(function (index, element) {
			var swiper = new Swiper(".swiper_subject", {
				// loop: false,
				loop: true,
				slidesPerView: "auto",
				spaceBetween: 16,
				allowTouchMove: true,
				observer: true,
				observeParents: true,
				freeMode: false,
				watchSlidesVisibility: true,
				watchSlidesProgress: true,
				centeredSlides: true,
				speed: 300,
				pagination: {
					el: ".swiper-pagination",
				},
			});
		});
		// 메인 과월호 슬라이드
		jQuery(".swiper_month").each(function (index, element) {
			var swiper = new Swiper(".swiper_month", {
				// loop: false,
				loop: true,
				slidesPerView: "auto",
				spaceBetween: 16,
				allowTouchMove: true,
				observer: true,
				observeParents: true,
				freeMode: false,
				watchSlidesVisibility: true,
				watchSlidesProgress: true,
				centeredSlides: true,
				speed: 300,
				pagination: {
					el: ".swiper-pagination",
				},
			});
		});

		jQuery('#myTabContent>.tab_box:nth-child(3)').addClass('active');
		jQuery(".single-swiper-container").each(function (index, element) {
			var $this = jQuery(this);
			$this.addClass("instance-" + index);
			var swiper = new Swiper(".instance-" + index, {
				slidesPerView: 1,
				observer: true,
				observeParents: true,
				centeredSlides: true,
				initialSlide: 2,
				visibilityFullFit: true,
				paginationClickable: true,
				speed: 1000,
				pagination: {
					el: '.single-swiper-pagination',
					clickable: true,
					type: 'fraction',
					//renderBullet: function (index, className) {
					//    return '<span class="' + className + '">' + (index + 1) + '</span>';
					//},
				},
				navigation: {
					nextEl: ".box .swiper-button-next",
					prevEl: ".box .swiper-button-prev",
				},

			});
			swiper.on('slideChange', function () {
				//console.log(swiper.realIndex);
				var swiperNum = swiper.realIndex + 1
				jQuery('#myTabContent>.tab_box').removeClass('active');
				jQuery('#myTabContent>.tab_box:nth-child(' + swiperNum + ')').addClass('active');
			});
			jQuery('#curationPop li').on('click', function () {
				var tab_no = jQuery(this).attr('data-no') - 1;
				swiper.slideTo(tab_no, 700, function () {
					jQuery('.popCuration').removeClass('on');
					jQuery('.cu-bg').removeClass('on');
					jQuery('body').css('overflow', 'inherit');
				});
			});
		});

		jQuery(".multiple-swiper-container").each(function (index, element) {
			var $this = jQuery(this);
			$this.addClass("multiple-" + index);
			$this.find(".multiple-swiper-button-prev").addClass("multiple-btn-prev-" + index);
			$this.find(".multiple-swiper-button-next").addClass("multiple-btn-next-" + index);
			var multipleSwiper = new Swiper(".multiple-" + index, {
				slidesPerView: 1,
				//slidesPerColumn: 2,
				//spaceBetween: 15,
				pagination: {
					el: '.multiple-swiper-pagination',
					type: 'bullets',
					clickable: true,
				},
				/*pagination: {
					el: '.multiple-swiper-pagination',
					clickable: true,
					type: 'fraction'
				},*/
				loop: true,
				navigation: {
					nextEl: ".multiple-btn-next-" + index,
					prevEl: ".multiple-btn-prev-" + index,
				},
			});
		});
		// slide 
		jQuery('#myTabContent>.tab_box').css('display', 'block')
		setTimeout(() => {
			jQuery('#myTabContent>.tab_box.active ').css('display', '')
			jQuery('#myTabContent>.tab_box').css('display', 'none')
		}, 1000);

		var ppp = 4; // Post per page
		var cat = 11856;
		var pageNumber = 1;

		function load_posts() {
			pageNumber++;
			var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
			jQuery.ajax({
				type: "POST",
				dataType: "html",
				//url: ajax_posts.ajaxurl,
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				data: str,
				success: function (data) {
					var $data = jQuery(data);
					if ($data.length) {
						jQuery("#ajax-posts").append($data);
						jQuery("#more_posts").attr("disabled", false);
					} else {
						jQuery("#more_posts").attr("disabled", true);
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}
			});
			return false;
		}

		jQuery("#more_posts").on("click", function () { // When btn is pressed.
			jQuery("#more_posts").attr("disabled", true); // Disable the button, temp.
			load_posts();
		});

		// ajax 로드일 경우 영상 모달
		jQuery('#ajax-posts').on('click', ".play_video_modal", function () {
			var videoLink = jQuery(this).next('.video_link').text();
			var postTitle = jQuery(this).next().next().next('.post_subtit').text();
			var exLink = jQuery(this).next().next().next().next('.ex_link').text();
			jQuery('#modalTutorialYoutube').modal("show");
			jQuery('#movieTitle').html('<h4 class="movie_post_tltle">' + postTitle + '</h4>');
			jQuery('#movieOutLink').html('<a class="btn movie_outlink" href="' + exLink + '" target="_blank">관련기사보기</a>');
			jQuery('#playYoutubeView').html('<iframe width="740" height="455" src="' + videoLink + '?autoplay=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
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
			document.s.visibility = "show";
		}

		//document.onmousedown=ddInit; 
		document.onmouseup = Function("ddEnabled=false");

		//쿠키 가져오기
		function divpop_getCookie(name) {
			var nameOfCookie = name + "=";
			var x = 0;

			while (x <= document.cookie.length) {
				var y = (x + nameOfCookie.length);
				if (document.cookie.substring(x, y) == nameOfCookie) {
					if ((endOfCookie = document.cookie.indexOf(";", y)) == -1)
						endOfCookie = document.cookie.length;
					return unescape(document.cookie.substring(y, endOfCookie));
				}
				x = document.cookie.indexOf(" ", x) + 1;
				if (x == 0)
					break;
			}
			return "";
		}

		//쿠키굽기
		function divpop_setCookie_OLD(name, value, expiredays) {
			var todayDate = new Date();
			var expiretime = 23 - todayDate.getHours();
			var expireminutes = 60 - todayDate.getMinutes();

			todayDate.setHours(todayDate.getHours() + expiretime);
			todayDate.setMinutes(todayDate.getMinutes() + expireminutes);
			document.cookie = name + "=" + escape(value) + "; path=/main/; expires=" + todayDate.toGMTString() + ";";
		}

		function divpop_setCookie(name, value, expiredays) {
			var todayDate = new Date();
			todayDate = new Date(parseInt(todayDate.getTime() / 86400000) * 86400000 + 54000000);
			if (todayDate > new Date()) {
				expiredays = expiredays - 1;
			}
			todayDate.setDate(todayDate.getDate() + expiredays);
			document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
		}



		function divpop_closeWin(obj) {

			var todayDate = new Date();
			var expiretime = 23 - todayDate.getHours();
			var expireminutes = 60 - todayDate.getMinutes();

			todayDate.setHours(todayDate.getHours() + expiretime);
			todayDate.setMinutes(todayDate.getMinutes() + expireminutes);

			divpop_setCookie(obj, 'done', 1);

			//query_frm.location.href="divpop_status.asp?div_name="+obj+"&exdate="+todayDate.toGMTString();
			hideMe(obj);
		}

		function divpop_status(obj) {
			if (divpop_getCookie(obj) == 'done') {
				document.getElementById(obj).style.display = "none";
			}
		}
	</script>
	<!-- #################################################     팝업관련 소스 시작  ############################################################### -->
	<!-- <style type="text/css">
 div#divpop1 {display:block;position:absolute; left:50%; top:100px;transform:translateX(-50%);z-index:10;width:350px;height:382px;}
 div#divpop1 div.con_box2 {position:relative;width:350px;height:332px;background:#fff;}
 div#divpop1 div.bo_box {position:relative;width:100%;height:50px;background:#fff;}
 div#divpop1 div.bo_box span {color:#000; display:inline-block;width:250px;padding:16px 20px;box-sizing:border-box;line-height:15px;letter-spacing:-0.05em;  font-size:15px;}
 div#divpop1 div.bo_box span em {color:#000; }
 div#divpop1 div.bo_box input {vertical-align:middle;float:left;display:inline-block;width:13px;height:13px;margin-top:1px;margin-right:7px;line-height:15px;    border: 1px solid #000;}
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
		// 20230607 메인 뉴스레터 팝업 추가
		jQuery('.btn-submit').on('click', function () {
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

		jQuery('.newsletter_popup__close-btn').click(function () {
			jQuery('.newsletter_popup').removeClass('on');
			jQuery('.news-bg').removeClass('on');
			jQuery('body').css('overflow', 'inherit');
		});
	</script>

	<?php
}
include($_SERVER["DOCUMENT_ROOT"] . "/cache/bottom-cache.php");
?>