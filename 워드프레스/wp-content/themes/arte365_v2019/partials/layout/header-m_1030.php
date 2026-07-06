<div class="skip_nav">
	<span class="hidden">스킵 네비게이션</span>
	<a href="#main" target="_self">컨텐츠 이동하기</a>
	<a href="#footer" target="_self">푸터 이동하기</a>
</div>
<!-- 띠배너 주석처리 부분 -->
<!-- 
<div class="event_wrap" style="display:block;">
 	<div class="event_banner">
 		<a href="https://arte365.kr/" target="_blank"><img src="/wp-content/uploads/2025/10/event_20251028_main_m.jpg" alt="" ></a>
 		<button type="button" class="event_close"></button>
 	</div>
 </div>
-->
<!-- 띠배너 주석처리 부분 -->

<!--div class="event_wrap" style="display:block;">
 	<div class="event_banner">
 		 <a href="/?p=94834" target="_blank"><img src="/wp-content/uploads/2022/07/event_20220704_main_m.png" alt="" ></a>
 		<button type="button" class="event_close"></button>

		<a href="http://www.arte-talk.com/" target="_blank">
			<img src="/wp-content/uploads/2022/06/event_20220623_main_m.jpg" alt="" usemap="#map1">
		</a>
		 <map id="map1" name="map1">
			<area shape="rect" coords="0,0,698,350" href="http://www.arte-talk.com/" target="_blank">
			<area shape="rect" coords="701,0,1400,350" href="https://arte365.kr/?p=94834">
		</map> 
 	</div> 
 </div>-->
<!-- header -->
<header id="header">
    <div class="container">
        <h1 class="logo"><a href="<?php echo site_url('/');?>" target="_self">ARTE 365</a></h1>
        <a href="#" class="btn-toggle"><span>MENU</span></a>
        <div class="offcanvas" id="offcanvas">
			<div class="search-form">
                <form action="" id="searchForm">
                    <input type="text" name="s" placeholder="검색어를 입력하세요">
                    <button type="submit" title="검색버튼 클릭">검색</button>
                </form>
            </div>
			<div class="hash-tag">
				<p class="tit"><span>#</span>추천키워드</p>
				<ul>
					<li><a href="/?term_id=&s=문화예술교육정책" target="_self">#문화예술교육정책</a></li>
					<li><a href="/?term_id=&amp;s=지역" target="_self">#지역</a></li>
					<li><a href="/?term_id=&amp;s=농산어촌" target="_self">#농산어촌</a></li>
					<li><a href="/?term_id=&amp;s=인프라" target="_self">#인프라</a></li>
					<li><a href="/?term_id=&amp;s=문화권리" target="_self">#문화권리</a></li>
					<li><a href="/?term_id=&amp;s=시각예술" target="_self">#시각예술</a></li>
					<li><a href="/?term_id=&amp;s=설치예술" target="_self">#설치예술</a></li>
					<li><a href="/?term_id=&amp;s=아르떼" target="_self">#아르떼</a></li>
					<li><a href="/?term_id=&amp;s=예술교육가" target="_self">#예술교육가</a></li>
					<li><a href="/?term_id=&amp;s=생태" target="_self">#생태</a></li>
					<li><a href="/?term_id=&amp;s=기초단위" target="_self">#기초단위</a></li>
					<li><a href="/?term_id=&amp;s=문화예술교육사" target="_self">#문화예술교육사</a></li>
					<li><a href="/?term_id=&amp;s=음악교육" target="_self">#음악교육</a></li>
				</ul>
			</div>
            <nav id="nav">
                <?php wp_nav_menu( array( 'theme_location' => 'arte365-primary-menu', 'container_class' => 'gnb' ,'link_before' => '<span>',  'link_after'  => '</span>' ) ); ?>
            </nav>
        </div>
    </div>
</header>
<!--// header -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-33981874-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-33981874-1');
</script>
