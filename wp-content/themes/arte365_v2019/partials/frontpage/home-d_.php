<?php
$main_banner = get_field('d_main_banner');
$main_banner_link = get_field('d_main_banner_link');
$full_banner = get_field('d_full_banner');
$full_banner_link = get_field('d_full_banner_link');

?>

<style>
	.left-area.right-bordered{    background: url(/wp-content/uploads/2019/08/main_190805.jpg) no-repeat;background-position: top center;height: 650px;}
	.featured-post:first-child .tb{width:700px;height:400px;box-sizing:border-box;background:url(/wp-content/uploads/2019/08/kum_190805_260.jpg) no-repeat 0 0;background-size:100% 100%;}
	.featured-post:nth-child(2) .tb{width:700px;height:400px;box-sizing:border-box;background:url(/wp-content/uploads/2019/08/sak_190805_260.jpg) no-repeat 0 0;background-size:100% 100%;}
/* 	.featured-post:last-child .tb{width:350px;height:340px;background:url(http://arte365.nisus.kr/wp-content/uploads/2019/06/second_ban_03.jpg) no-repeat 0 0;background-size:100% 100%;}  */
</style>

<!-- container -->
<div class="container">
	<div class="over_bg">
		<!-- split-area -->
		<div class="split-area clearfix">
			<div class="inner">
			<!-- left-area -->
				<div class="left-area right-bordered">
					<div class="inner home-main-banner">
					  <a href="<?php echo $main_banner_link;?>">
						<!-- <img src="<?php echo $main_banner['url'];?>" class="img"> -->
						<div class="banner-desc">
							<span class="category">비틀</span>
							<div class="post-meta">
								<h1 class="post-title">묵묵히 꿈틀거리는 <br/><span class="f_bold">고유한 터무니를 찾아서</span></h1>
								<p class="post-excerpt">웹진 [아르떼365] 편집위원 좌담</p>
								<p class="publisher">정리 _ 프로젝트 궁리</p>
							</div>
						</div>
						</a>
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
								<div class="featured-post">
									<a href="<?php the_permalink();?>">
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
												<!-- <span class="post-date"><?php the_time('Y.m.d.');?></span> --> <span class="authur"><?php the_field('publisher');?></span>
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
	<div class="subject_wrap">
		<div class="subject_list">
			<div class="subject_tit"><span>주제별</span> 기사 보기</div>
		<?php
			
			$year_subject_id = get_field('main_subjects'); //전체
			
			$subjects_val=get_field('subject_pc'); //추가필드 주제아이디
			$subjects_arr = explode(",", $subjects_val);

			$subjects = new WP_Query( array( 'post_type' => 'sublist', 'post__in' => $subjects_arr, 'orderby' => 'post__in' )); //주제별
		?>
			<ul>
				<?php
					if ( $subjects->have_posts() ) :
					while ( $subjects->have_posts() ) :
						$subjects->the_post();
				?>
				<li>
					<a href="/?post_type=sublist&s_post=<?php the_ID(); ?>"><?php the_title();?></a>
				</li>
				<?php
					endwhile;
					endif;
				?>
				
			</ul>

			
			<button type="button" onclick="location.href='/?post_type=subject&as_post=<?php echo $year_subject_id; ?>';">주제별 전체기사</button>
		</div>
		<div class="main-slide">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					
					<div class="swiper-slide" onclick="location.href='?p=71822'">
						<p class="category">인터뷰</p>
						<p class="slide_tit">아이를 보아주고 인정하는 것이 먼저다</p>
						<p class="slide_subtit">탁동철 양양 조산초등학교 교사	 </p>
						<p class="date">
						<span>고영직 _ 문학평론가	 </span>
						2019.03.25. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=71111'">
						<p class="category">기획포커스</p>
						<p class="slide_tit">무게 중심의 이동, 로드맵이 필요하다</p>
						<p class="slide_subtit">지역 현장 탐방형 연수 좌담		</p>
						<p class="date">
							<span>정리 _ 프로젝트 궁리</span>
							2019.02.11. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=60127'">
						<p class="category">칼럼</p>
						<p class="slide_tit">지역 문화로서 생활문화, 그리고 문화예술교육		</p>
						<p class="date">
							<span>정민룡_광주북구문화의집 관장</span>
							2017.07.24. 
						</p>
					</div>

					<div class="swiper-slide" onclick="location.href='?p=74417'">
						<p class="category">보다</p>
						<p class="slide_tit">미디어로 동네일에 참견해 보세요!</p>
						<p class="slide_subtit">문화공동체 아우름 ‘양산마을 미디어 기록단’		</p>
						<p class="date">
						<span>정민룡 _ 광주 북구문화의집 관장 </span>
						2019.07.29. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=74446'">
						<p class="category">보다</p>
						<p class="slide_tit">복숭아꽃 피는 마을에 노래꽃이 피었습니다</p>
						<p class="slide_subtit">예술꽃 씨앗학교 감곡초등학교 학부모합창단 ‘해피싱어즈’		</p>
						<p class="date">
						<span>오혜자 _ 초롱이네도서관 관장</span>
						2019.07.29. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=74306'">
						<p class="category">인터뷰</p>
						<p class="slide_tit">한 사람을 위하는 세상, 한 사람 안의 세상</p>
						<p class="slide_subtit">이언옥 배움과실천의공동체 ‘고치’ 대표		</p>
						<p class="date">
						<span>김대성 _ 문학평론가 </span>
						2019.07.22. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=74206'">
						<p class="category">만나다</p>
						<p class="slide_tit">한미서점은 서점입니다. 그리고,</p>
						<p class="slide_subtit">한미서점 대표 김시연·장원혁	 </p>
						<p class="date">
							<span>달라라 _ 2019 꿈다락 토요문화학교 ‘일상의 작가’ 기록작가</span>
							2019.07.15. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=72800'">
						<p class="category">만나다</p>
						<p class="slide_tit">경험과 상상, 도전과 실험의 학교</p>
						<p class="slide_subtit">최규성 달꽃창작소 대표 		</p>
						<p class="date">
						<span>민경은 _ 여러가지연구소 대표</span>
						2019.05.07. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=72576'">
						<p class="category">칼럼</p>
						<p class="slide_tit">수요자와 활동주체의 욕구를 반영한 기초 센터를 기대하며</p>
						<p class="slide_subtit">기초단위 문화예술교육 활성화를 위한 지역릴레이 간담회를 마치고		</p>
						<p class="date">
						<span>강승진 _ 히든어셈블 대표커넥터</span>
						2019.04.29. 
						</p>
					</div>
					
					<div class="swiper-slide" onclick="location.href='?p=71490'">
						<p class="category">아이디어</p>
						<p class="slide_tit">로컬의 미래는 행복의 경제학에 있다</p>
						<p class="slide_subtit">인문과 교육	 </p>
						<p class="date">
						<span>고영직 _ 문학평론가 	 </span>
						2019.03.04. 
						</p>
					</div>
					
					<div class="swiper-slide" onclick="location.href='?p=69480'">
						<p class="category">기획포커스</p>
						<p class="slide_tit">지역의 필요와 관점에서, 협력의 경험을 쌓아야</p>
						<p class="slide_subtit">지역, 협력을 말하다</p>
						<p class="date">
							<span>정리_프로젝트 궁리</span>
							2018.11.13
					</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=68078'">
						<p class="category">만나다</p>
						<p class="slide_tit">매일매일 켜켜이, 시간의 힘으로 책을 짓는다</p>
						<p class="slide_subtit">김진섭 책공방북아트센터 대표 		</p>
						<p class="date">
						<span>장시형 _ 완주문화재단 예술진흥팀장</span>
						2018.08.27. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=67422'">
						<p class="category">만나다</p>
						<p class="slide_tit">나와 타인, 삶과 세계를 탐구하는 순례자</p>
						<p class="slide_subtit">민경은 여러가지연구소 대표		</p>
						<p class="date">
						<span>박유미 _ 미술작가</span>
						2018.07.23. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=67404'">
						<p class="category">보다</p>
						<p class="slide_tit">예술이 동네의 미래를 응원하는 방법</p>
						<p class="slide_subtit">어반아츠 프로젝트 ‘차이나는 스웩 미디어 밴드’		</p>
						<p class="date">
							<span>김준수(몬구) _ 음악가, 문화예술교육자</span>
							2018.07.23. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=67284'">
						<p class="category">보다</p>
						<p class="slide_tit">이웃의, 이웃에 의한, 이웃을 위한 쓸모 있는 예술</p>
						<p class="slide_subtit">이웃상회 ‘안정맞춤 프로젝트’	</p>
						<p class="date">
							<span>최순화_문화기획자</span>
							2018.07.16. 
						</p>
						</div>
						<div class="swiper-slide" onclick="location.href='?p=62994'">
						<p class="category">해외리포트</p>
						<p class="slide_tit">‘바로 그 지역’에서만 가능한 문화예술교육을 찾아서</p>
						<p class="slide_subtit">지역성을 담은 일본의 문화예술교육 프로그램	</p>
						<p class="date">
							<span>신일_영화 연출가</span>
							2017.12.12. 
						</p>
						</div>
					
					<div class="swiper-slide" onclick="location.href='?p=55374'">
						<p class="category">칼럼</p>
						<p class="slide_tit">예술보다 더 예술적인, 삶을 캐내다</p>
						<p class="slide_subtit">일상을 발견하는 문화예술교육에 대하여 		</p>
						<p class="date">
							<span>전고필 _ 대인예술시장 총감독</span>
							2016.11.14. 
						</p>
					</div>
					<div class="swiper-slide" onclick="location.href='?p=52853'">
						<p class="category">보다</p>
						<p class="slide_tit">예술을 향하는 교육, 교육을 품은 마을</p>
						<p class="slide_subtit">경기 세월초등학교 통합문화예술교육		</p>
						<p class="date">
							<span>이선옥 _ 자유기고가</span>
							2016.07.11.
						</p>
					</div>
						


				</div>
			</div>
			<div class="swiper-pagination"></div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
		<button type="button" class="remote_fold"></button>
	</div>
    <div class="home-tab-content">
		<input type="text" class="scroll_slide" value=""  />
        <div class="inner">
			<input type="text" id="post_num" value="8">
			<div class="main_sort clearfix">
				<p>최신 기사</p>
				<select name="" id="post_sort">
					<option value="">최신등록순</option>
					<option value="C">가장많이 본 기사</option>
					<option  value="A">전체기사보기</option>
				</select>
			</div>
            <div class="tab-contents clearfix">
                <!-- left-area -->
                <div class="left-area">
                    <div class="tab-content active" id="recentPosts">
					
							<div class="post-list clearfix" id="main_last_post">
							
							</div>
							<div class="text-center">
								<button type="button" class="btn_more_post" id="main_post_add">
									<img src="/wp-content/uploads/2019/07/btn_more.png" alt="">
								</button>
									<button type="button" class="btn_more_post" id="main_post_remove">
									<img src="/wp-content/uploads/2019/07/btn_remove.png" alt="">
								</button>
							</div>
                    </div>
                </div><!--// left-area -->
            </div>
        </div>
    </div>
</div><!--// container -->
<div class="submit_area mt_40">
	<div>
		<div class="newsList" id="recentPosts">
			<button type="button" class="note_more" onclick="location.href='/?cat=2806'"><img src="/wp-content/uploads/2019/07/btn_more.png" alt=""></button>
			<p class="tit">현장소식</p>
				<?php
				$recent_posts = new WP_Query( array( 'post_type' => 'post',  'category__in' => array(2806) , 'orderby' => 'date', 'order' => 'desc','posts_per_page' => 5 ) );
				if ( $recent_posts->have_posts() ) :
				?>
				<div class="post-list">
					<?php
						while ( $recent_posts->have_posts() ) :
							$recent_posts->the_post();
					?>
					<?php get_template_part('partials/post', 'item-s');?>
					<?php                            
						endwhile;
						wp_reset_postdata();
					?>
				</div>
				<?php
				endif;
				?>
		</div>


		<!-- 최신순 현장소식 리스트-->
		<!-- <div class="newsList" id="recentPosts">
			<button type="button" class="note_more" onclick="location.href='/?cat=2806'"><img src="/wp-content/uploads/2019/07/btn_more.png" alt=""></button>
			<p class="tit">현장소식</p>
				<?php
				$recent_posts = new WP_Query( array( 'post_type' => 'post',  'category__in' => array(2806) , 'orderby' => 'date', 'order' => 'desc','posts_per_page' => 5 ) );
				if ( $recent_posts->have_posts() ) :
				?>
				<div class="post-list">
					<?php
						while ( $recent_posts->have_posts() ) :
							$recent_posts->the_post();
					?>
					<?php get_template_part('partials/post', 'item-s');?>
					<?php                            
						endwhile;
						wp_reset_postdata();
					?>
				</div>
				<?php
				endif;
				?>
		</div> -->


		<div class="submit_news">
			<?php get_template_part('partials/page', 'main_subscribe');?>
		</div>
	</div>
</div>
<script>
	var swiper = new Swiper('.swiper-container', {
		slidesPerView:3,
		slidesPerGroup:3,
		spaceBetween : 20,
		pagination: {
		  el: '.swiper-pagination',
		  type: 'fraction',
		},
		navigation: {
		  nextEl: '.swiper-button-next',
		  prevEl: '.swiper-button-prev',
		},
	});
	</script>