
<?php
	$year_subject_id = get_field('main_subjects'); //전체
?>
<!-- 띠배너 주석처리 부분 -->
<!--
<div class="event_wrap" style="display:block;">
 	<div class="event_banner">
 		<a href="https://arte365.kr/" target="_blank"><img src="/wp-content/uploads/2025/10/event_20251028_main.jpg" alt="" ></a>
		<button type="button" class="event_close"></button>
 	</div> 
</div> 
-->
<!-- 띠배너 주석처리 부분 -->
 
<!--<div class="event_wrap" style="display:block;">
 	<div class="event_banner">
		 <a href="http://www.arte-talk.com/" target="_blank">
			<img src="/wp-content/uploads/2022/06/event_20220623_main.jpg" alt="" usemap="#map1">
		</a> 
		<map id="map1" name="map1">
			<area shape="rect" coords="0,0,800,139" href="http://www.arte-talk.com/" target="_blank">
			<area shape="rect" coords="802,0,1600,140" href="https://arte365.kr/?p=94834">
		</map> 
 	</div> 
</div> -->
 
<!-- header -->
<header id="header">
    <div class="container clearfix">
		<h1 class="logo"><a href="<?php echo site_url('/');?>" target="_self">ARTE 365</a></h1>
        <div class="bottom-area clearfix">
            <nav id="nav">
            	<?php wp_nav_menu( array( 'theme_location' => 'arte365-primary-menu', 'container_class' => 'gnb' ,'link_before' => '<span>',  'link_after'  => '</span>' ) ); ?>
            </nav>
        </div>
		
		<div class="menu-all">
			<div class="top clearfix">
				<h1>
					<!-- <a href="/"><img src="/wp-content/uploads/2019/08/logo.jpg" alt=""></a> -->
					<a href="/"><img src="https://arte365.kr/wp-content/themes/arte365_v2019/img/logo.png" alt=""></a>
				</h1>
				<button  class="btn_close" title="">
					<span></span>
				</button>
			</div>
			<div class="list">
				<div class="inner">
					<ul>
						<li>
							<p><a href="/?post_type=subject&as_post=" target="_self">편집노트</a></p>
							<!-- <p class="list_caption" onclick="location.href='/?post_type=subject&as_post='">편집노트</p> -->
							<p><a href="/?post_type=subject&as_post=<?php echo $year_subject_id; ?>">주제별 기사</a></p>
							<!-- <p><a href="/?cat=2815">기획포커스</a></p>
							<p><a href="/?cat=2816">칼럼</a></p>
							<p><a href="/?cat=2817">인터뷰</a></p> -->
						</li>
						<li>
							<p><a href="/?cat=2815" target="_self">이슈</a></p>
							<!-- <p class="list_caption" onclick="location.href='/?cat=2815'">비틀어 보는 <span>이슈</span></p> -->
							<!-- <p><a href="/?cat=2815">기획포커스</a></p>
							<p><a href="/?cat=2816">칼럼</a></p>
							<p><a href="/?cat=2817">인터뷰</a></p> -->
						</li>
						<li>
							<p><a href="/?cat=6188" target="_self">인터뷰</a></p>
							<!-- <p class="list_caption" onclick="location.href='/?cat=6188'">꿈꾸는 <span>사람</span></p> -->
							<!-- <p><a href="/?cat=6188">만나다</a></p>
							<p><a href="/?cat=6189">보다</a></p> -->
						</li>
						<li>
							<p><a href="/?cat=6189" target="_self">리뷰</a></p>
							<!-- <p class="list_caption" onclick="location.href='/?cat=6189'">움트는 <span>현장</span></p> -->
						</li>
						<li>
							<p><a href="/?cat=2808" target="_self">아이디어</a></p>
							<!-- <p class="list_caption" onclick="location.href='/?cat=2808'">싹트는 <span>아이디어</span></p> -->
							<!-- <p><a href="/?cat=2808">아이디어</a></p> -->
						</li>
						<li>
							<p><a href="/?cat=2810" target="_self">리포트</a></p>
							<!-- <p class="list_caption" onclick="location.href='/?cat=2810'">동트는 <span>리포트</span></p> -->
							<!-- <p><a href="/?cat=3096">해외리포트</a></p>
							<p><a href="/?cat=5614">정책리포트</a></p> -->
						</li>
						<!--<li>
							<p><a href="/?p=79482">영상</a></p>
						</li> -->
						<!-- <li>
						<p>뉴스</p>
							<p><a href="/?cat=2812">국내뉴스</a></p>
							<p><a href="/?cat=2811">해외뉴스</a></p>
						</li> -->
						<li>
							<p>아르떼365</p>
							<p><a href="/?page_id=20289" target="_self">아르떼365 소개</a></p>
							<p><a href="/?cat=2806" target="_self">현장소식</a></p>
							<!-- <p><a href="/?p=79482">영상</a></p> -->
							<p><a href="/?cat=11856" target="_self">아르떼365 영상</a></p>
							<p><a href="/?cat=2809" target="_self">공지사항</a></p>
							<!-- <p><a href="/?page_id=51291" target="_self">독자게시판</a></p> -->
							<p><a href="/?cat=4259" target="_self">뉴스레터 보기</a></p>
							<p><a href="/?page_id=39807" target="_self">뉴스레터 신청</a></p>
							<p><a href="/?page_id=20286" target="_self">수신거부</a></p>
							<p><a href="https://www.arte.or.kr/disclosure/data/Data_BoardView.do?board_id=BRD_ID0052362" target="_blank">개인정보처리방침</a></p>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="sch-bg"></div>
		<div class="sch-wrap">
			<h2>통합검색</h2>
			<div class="search-form">
				<div class="btn_close"></div>
				<form id="search_Form" method="get">
					<select name="term_id" title="카테고리 선택 클릭">
						<option value="">전체기사</option>
						<option value="2815" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2815) ? 'selected="selected"': '';?>>이슈</option>
						<option value="6188" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 6188) ? 'selected="selected"': '';?>>인터뷰</option>
						<option value="6189" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 6189) ? 'selected="selected"': '';?>>리뷰</option>
						<option value="2808" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2808) ? 'selected="selected"': '';?>>아이디어</option>
						<option value="2810" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2810) ? 'selected="selected"': '';?>>리포트</option>
						<option value="2806" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2806) ? 'selected="selected"': '';?>>현장소식</option>
					</select>
					<input type="text" name="s" id="serachText" placeholder="검색어를 입력하세요"  value="<?php  get_search_query(); ?>">
					<button type="submit" title="검색버튼 클릭">검색</button>
				</form>
			</div>

			<?php get_template_part('partials/post', 'hashTag');?>

		</div>
    </div>
    <script>
        (function($){
            $('#searchForm').on('submit', function(e){
                var s = $('input[name="s"]', this).val();
                if ( s.split(' ').join('') == '') {
                    alert('검색어를 입력하세요!');
                    e.preventDefault();
                    return false;
                }
            })

			$('#serachText').keydown(function(e) {
				var s = $('#serachText').val();
				if (e.keyCode == 13 && s.split(' ').join('') == '') {
					alert('검색어를 입력하세요!');
                    e.preventDefault();
                    return false;
				}
			});

			$('#menu-item-74504').click(function(){
				 setTimeout(function(){$('#serachText').focus();});
			})

        })(jQuery);

    </script>
</header><!--// header -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-33981874-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-33981874-1');
</script>
