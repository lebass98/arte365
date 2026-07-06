<div class="archive-header search-header">
    <h1 class="category-name">검색결과</h1>

    <form id="searchForm" method="get">
        <div class="search_input_box">
            <select name="term_id">
                <option value="">전체기사</option>
                <option value="2815" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2815) ? 'selected="selected"': '';?>>이슈</option>
                <option value="6188" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 6188) ? 'selected="selected"': '';?>>인터뷰</option>
                <option value="6189" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 6189) ? 'selected="selected"': '';?>>리뷰</option>
                <option value="2808" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2808) ? 'selected="selected"': '';?>>아이디어</option>
                <option value="2810" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2810) ? 'selected="selected"': '';?>>리포트</option>
                <!-- <option value="11856" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2810) ? 'selected="selected"': '';?>>영상</option> -->
                <option value="2806" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2806) ? 'selected="selected"': '';?>>현장소식</option>
            </select>
            <input class="" type="text" name="s" placeholder="검색어를 입력하세요" value="">
            <button class="btn" type="submit">
                <image src="/wp-content/themes/arte365_v2019/img/search_con.png"/>
            </button>
        </div>

        <?php
        $term_id = empty($_GET['term_id']) ? '2815, 6188, 6189, 2808, 2810, 2806' : $_GET['term_id'];
        $paged = empty($_GET['paged']) ? '1' : $_GET['paged'];
        $allsearch = new WP_Query( array(
                'cat' => $term_id,
                's' => get_search_query(),
                'st' => true,
                'paged' => $paged)
        );
        $wp_query =  $allsearch;
        ?>

        <div class="text-center current_word">
            키워드 <span class="txt-em">[<?php echo $_GET['s'];?>]</span>에 대해<br/>
            전체 '<span class="txt-em"><?php echo $wp_query->found_posts;?></span>'건의 기사가 검색되었습니다.
        </div>

        <div class="sch-select">
            <p>카테고리 선택</p>

            <div class="search-swiper-container swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == null) ? 'class="searchClick current"': 'class="searchClick"';?> href="/?s=<?php echo get_search_query(); ?>&term_id=">
                            전체기사
                            <span class="txt-em">
								(<?php
                                $allsearch = new WP_Query( array(
                                        'cat' => '6188, 2815, 6189, 2808, 2810',
                                        's' => get_search_query(),
                                        'st' => true)
                                );
                                $count = $allsearch ->found_posts;
                                echo $count;
                                ?>)
							</span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2815) ? 'class="searchClick current"': 'class="searchClick"';?> href="/?s=<?php echo get_search_query(); ?>&term_id=2815" >
                            이슈
                            <span class="txt-em">
								(<?php
                                $allsearch = new WP_Query( array(
                                        'cat' => '2815',
                                        's' => get_search_query(),
                                        'st' => true)
                                );
                                $count = $allsearch ->found_posts;
                                echo $count;
                                ?>)
							</span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 6188) ? 'class="searchClick current"': 'class="searchClick"';?> href="/?s=<?php echo get_search_query(); ?>&term_id=6188">
                            인터뷰
                            <span class="txt-em">
								(<?php
                                $allsearch = new WP_Query( array(
                                        'cat' => '6188',
                                        's' => get_search_query(),
                                        'st' => true)
                                );
                                $count = $allsearch ->found_posts;
                                echo $count;
                                ?>)
							</span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 6189) ? 'class="searchClick current"': 'class="searchClick"';?> href="/?s=<?php echo get_search_query(); ?>&term_id=6189">
                            리뷰
                            <span class="txt-em">
								(<?php
                                $allsearch = new WP_Query( array(
                                        'cat' => '6189',
                                        's' => get_search_query(),
                                        'st' => true)
                                );
                                $count = $allsearch ->found_posts;
                                echo $count;
                                ?>)
							</span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2808) ? 'class="searchClick current"': 'class="searchClick"';?> href="/?s=<?php echo get_search_query(); ?>&term_id=2808">
                            아이디어
                            <span class="txt-em">
								(<?php
                                $allsearch = new WP_Query( array(
                                        'cat' => '2808',
                                        's' => get_search_query(),
                                        'st' => true)
                                );
                                $count = $allsearch ->found_posts;
                                echo $count;
                                ?>)
							</span>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2810) ? 'class="searchClick current"': 'class="searchClick"';?> href="/?s=<?php echo get_search_query(); ?>&term_id=2810">
                            리포트
                            <span class="txt-em">
								(<?php
                                $allsearch = new WP_Query( array(
                                        'cat' => '2810',
                                        's' => get_search_query(),
                                        'st' => true)
                                );
                                $count = $allsearch ->found_posts;
                                echo $count;
                                ?>)
							</span>
                        </a>
                    </div>
                    <!-- <div class="swiper-slide">
						<a <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 11630) ? 'class="searchClick current"': 'class="searchClick"';?> href="/?s=<?php echo get_search_query(); ?>&term_id=11630">
							영상
							<span class="txt-em">
								(<?php
                    $allsearch = new WP_Query( array(
                            'cat' => '11630',
                            's' => get_search_query(),
                            'st' => true)
                    );
                    $count = $allsearch ->found_posts;
                    echo $count;
                    ?>)
							</span>
						</a>
					</div> -->
                    <div class="swiper-slide">
                        <a <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2806) ? 'class="searchClick current"': 'class="searchClick"';?> href="/?s=<?php echo get_search_query(); ?>&term_id=2806">
                            현장소식
                            <span class="txt-em">
								(<?php
                                $allsearch = new WP_Query( array(
                                        'cat' => '2806',
                                        's' => get_search_query(),
                                        'st' => true)
                                );
                                $count = $allsearch ->found_posts;
                                echo $count;
                                ?>)
							</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="archive-utils">

        <!-- <form id="searchForm2" method="get">
			<input type="hidden" name="s" placeholder="검색어를 입력하세요"  value="<?php echo get_search_query(); ?>">
			<select name="term_id">
					<option value="">전체기사</option>
					<option value="2815" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2815) ? 'selected="selected"': '';?>>비틀</option>
					<option value="6188" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 6188) ? 'selected="selected"': '';?>>꿈틀</option>
					<option value="6189" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 6189) ? 'selected="selected"': '';?>>움틀</option>
					<option value="2808" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2808) ? 'selected="selected"': '';?>>싹틀</option>
					<option value="2810" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2810) ? 'selected="selected"': '';?>>동틀</option>
                    <option value="2806" <?php echo (isset($_GET['term_id']) && $_GET['term_id'] == 2806) ? 'selected="selected"': '';?>>현장기사</option>
				</select>
		</form> -->

        <script>
            (function($){
                $('form#searchForm2 select').on('change', function(e){
                    $('form#searchForm2').submit();
                })
                $('.searchClick').on('click', function(e){
                    $('form#searchForm2').submit();
                })
            })(jQuery);

            var search_swiper = new Swiper('.search-swiper-container', {
                slidesPerView: 7,
                spaceBetween: 0,
                //freeMode: true,
                breakpoints: {
                    640: {
                        slidesPerView: 4.2,
                    },
                    768: {
                        slidesPerView: 6.5,
                    },
                    1024: {
                        slidesPerView: 7.5,
                    },
                }
            });
            setTimeout(function(){
                <?php if(isset($_GET['term_id']) && $_GET['term_id'] == 2808){?>
                search_swiper.slideTo(5, false,false);
                <?php } ?>
                <?php if(isset($_GET['term_id']) && $_GET['term_id'] == 2810){?>
                search_swiper.slideTo(6, false,false);
                <?php } ?>
//            <?php if(isset($_GET['term_id']) && $_GET['term_id'] == 11856){?>
//                search_swiper.slideTo(7, false,false);
//            <?php } ?>
                <?php if(isset($_GET['term_id']) && $_GET['term_id'] == 2806){?>
                search_swiper.slideTo(8, false,false);
                <?php } ?>
            }, 200);

        </script>

    </div>

</div>



<div class="post-list">

    <?php if (have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('partials/post', 'item');?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php if( have_posts() ):?> <!--  페이징 처리.  -->
        <?php get_template_part('partials/pagination'); ?>

    <?php else :?>

        <div class="no-result">
            <p class="text-center">등록된 포스트가 없습니다.</p>
        </div>
    <?php endif?>


</div>
