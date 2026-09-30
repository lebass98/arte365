// GNB 편집노트 진입시 활성화 효과 추가
document.addEventListener('DOMContentLoaded', () => {
  const li = document.getElementById('menu-item-112792');
  if (!li) return;

  const params = new URLSearchParams(location.search);
  const postType = params.get('post_type');
  const asPost = params.get('as_post');

  const isEditNote =
    postType === 'subjectgroup' ||
    postType === 'subject';

  if (isEditNote) {
    li.classList.add('current-menu-item', 'current_page_item');
    li.querySelector('a')?.setAttribute('aria-current', 'page');
  }
});

jQuery(function ($) {
  subMobileCheckFn();

  var singleTabSlider;

  function subMobileCheckFn() {
    var h = $(".tabLink").height();
    if (h === 60) { //PC
      if (!(singleTabSlider == undefined)) {
        singleTabSlider.destroy();
      }
    } else { //mobile 1024
      if (singleTabSlider == undefined || singleTabSlider.destroyed == true) {
        tabSwitchSlide();
      }
    }
  }
  function tabSwitchSlide() {
    singleTabSlider = new Swiper('.tabLink', {
      breakpoints: {
        700: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    });
  }



  var mousePos = 0;
  var currentPos = 0;
  var position = 0;
  var draggable = false;
  var countAnimePlus = anime.timeline(), countAnimeMinus = anime.timeline();
  var offset = 130;
  var direction;
  var dur = 2000;
  var count = parseInt($('.count').text());
  var countAnime, blockAnime;
  var pause = false;

  anime({
    targets: '.circle',
    scale: 0,
    duration: 0
  })

  $(document).on('mousedown', '.stepper', function () {
    currentPos = mousePos;

    draggable = true;
    if (pause) {
      blockAnime.pause();
      countAnime.pause();
    }

    if (direction == 'plus') {
      countAnimePlus.pause();
    }

    if (direction == 'minus') {
      countAnimeMinus.pause();
    }
  })

  $(document).on("mousemove", function (event) {
    mousePos = event.pageY;

    if (draggable) {
      position = mousePos - currentPos;
      $('.stepper').css('transform', 'translateY(' + position / 2 + 'px)');
      $('.count').css('transform', 'translateX(' + Math.abs(position / 5) + 'px)');
    }

    if (position <= (offset * -1) && draggable) {
      if ($('.wrap.like').length === 0) {
        count++;
        plus();
      }

      if (pause) {
        countAnime.pause();
      }
      center();
    }

    if (position >= offset && draggable) {
      if ($('.wrap').hasClass('like')) {
        count--;
        minus();
      }

      if (pause) {
        countAnime.pause();
      }
      center();
    }
  });

  $(document).on("mouseup", function (event) {
    if (draggable) {
      center();
    }
  });


  function center() {
    draggable = false;
    pause = true;
    blockAnime = anime({
      targets: '.stepper',
      duration: dur,
      translateY: 0,
    });

    countAnime = anime({
      targets: '.count',
      duration: dur,
      translateX: 0,
    })
  }

  function plus() {
    direction = 'plus';
    countAnimePlus = anime.timeline();

    $('.circle').removeClass('white').addClass('pink');

    countAnimePlus.add({
      targets: '.circle',
      scale: 1,
      duration: 200,
      easing: 'linear',
      complete: function () {
        $('.wrap').addClass('like');
      }
    })
      .add({
        targets: '.stepper svg',
        scale: 0,
        duration: 0,
        complete: function () {
          anime({
            targets: '.stepper svg',
            scale: 1,
            duration: 700,
          })
        }
      })

    anime({
      targets: '.count',
      right: 0,
      duration: 300,
      easing: 'linear',
      complete: function () {
        $('.count').text(count);

        anime({
          targets: '.count',
          right: 5,
          duration: 300,
          easing: 'easeOutBack'
        })
      }
    })
  }

  /*function minus() {
    direction = 'minus';
    countAnimeMinus = anime.timeline();

    $('.wrap').removeClass('like');

    countAnimeMinus.add({
      targets: '.circle',
      scale: 0,
      duration: 200,
      easing: 'linear'
    })
    .add({
      targets: '.stepper svg',
      scale: 0,
      duration: 0,
      complete: function () {
        anime({
          targets: '.stepper svg',
          scale: 1,
          duration: 700,
        })
      }
    })

    anime({
      targets: '.count',
      right: 0,
      duration: 300,
      easing: 'linear',
      complete: function () {
        $('.count').text(count);

        anime({
          targets: '.count',
          right: -3,
          duration: 300,SELECT * FROM `wp_ulike_meta` WHERE `item_id` = 85464 ORDER BY `item_id` DESC
          easing: 'easeOutBack'
        })
      }
    })
  }*/

  //좋아요.. 카운트....
  $(document).on('click', '.stepper', function () {
    if ($('.wrap.like').length === 0) {
      count++;

      //추가 작업.__start
      var p = $("#like_count").text();
      console.log('like cout =' + count + '& p=' + p);
      $.ajax({
        url: "/wp-content/themes/arte365_v2019/single_like.php",
        method: "POST",
        async: true,
        data: { p: p, count: count },
        dataType: 'html',

        success: function (res) {
          // 서번단에서 HTML을 반환해서 기존 페이지를 깜빡임없이 새로 고친다.
          console.log(res);
        },
        error: function (xhr) {
          alert("fail");
        }
      });
      //추가 작업.__start

      plus();
    }
  })



  // 이벤트 고정 배너 표시확이 되면 id=main에 event_show 클래스 추가 (프로그레스바 위치변경 이슈때문)
  if (document.querySelector('.event_wrap')) {
    // 특정 id 요소에 active 클래스 추가
    document.getElementById('main').classList.add('event_show');
  }






  const share = document.querySelector('.share');
  const share_wrap = document.querySelector('.share_wrap');

  $('.share').click(function () {
    share_wrap.classList.toggle('active')
  })

  const share_p = document.querySelector('.share_wrap.snsmobile .share');
  const share_wrap_p = document.querySelector('.share_wrap.snsmobile');

  $('.share_wrap.snsmobile .share').click(function () {
    share_wrap_p.classList.toggle('active')
  })


  //20200513 주제별 기사보기 카테고리 불러오기
  var lists_tit = $('.main_subject_slider .swiper-slide-active a').text();
  var data_tit
  $('.swiper-pagination-bullet').click(function () {
    var data_tit = $(this).parents('.num140').find('.swiper-slide-active').children('a').text();
    //$('.subject_tit').text(data_tit);
  });
  // $('.sort_reply > label').click(function(){
  // 	$('.sort_reply > label').css('color', 'black').css('background', '#fff').css('border', '1px solid #eee');
  // 	$(this).css('color', '#fff').css('background', '#2e3136').css('border', '1px solid #2e3136');;
  // });

  // 20240626 최신등록순/최근댓글달린기사 불러오기
  // $('.sort_reply > label').click(function(){
  // 	$('.sort_reply > label').css('color', '#111').css('background', 'transparent').css('border', 'none').css('font-size','18px').css('line-height','28px').css('font-weight','400');
  // 	$(this).css('color', '#111').css('background', 'transparent').css('border', 'none').css('font-size','28px').css('line-height','40px').css('font-weight','bold');
  // });

  // 20240626 최신등록순/최근댓글달린기사 불러오기
  $('.sort_reply > label').click(function () {
    $('.sort_reply > label').removeClass('is-active');
    $(this).addClass('is-active');
  })


  /*20200611 ======================================*/
  // //헤더 메뉴 서브 텍스트
  // $('#menu-item-74809 span').append('<span>비틀어 보는 이슈</span>');
  // $('#menu-item-74736 span').append('<span>꿈꾸는 사람</span>');
  // $('#menu-item-74536 span').append('<span>움트는 현장</span>');
  // $('#menu-item-74502 span').append('<span>싹트는 아이디어</span>');
  // $('#menu-item-74503 span').append('<span>동트는 리포트</span>');
  // 20230630 아르떼 개편 gnb 추가
  //헤더 메뉴 서브 텍스트
  //$('#menu-item-74809 a').append('<span class="hover-text">비틀어 보는<br/>이슈</span>');
  //$('#menu-item-74736 a').append('<span class="hover-text">꿈꾸는<br/>사람</span>');
  //$('#menu-item-74536 a').append('<span class="hover-text">움트는<br/>현장</span>');
  //$('#menu-item-74502 a').append('<span class="hover-text">싹트는<br/>아이디어</span>');
  //$('#menu-item-74503 a').append('<span class="hover-text">동트는<br/>리포트</span>');

  //$('#header .gnb > ul > li > a').on('hover', function(){
  //    $(this).toggleClass('is-hover');
  //});
  //검색창 수정
  $('.search-form .btn_close').click(function () {
    $('.sch-wrap').removeClass('on');
    $('.sch-bg').removeClass('on');
    $('body').css('overflow', 'inherit');
  })
  //tag #추가
  $('.tag-links a').prepend('<span>#</span>');

  //독자게시판 form title 수정
  $('.kboard-search select').attr('title', '검색조건 선택 클릭');
  $('.kboard-search input').attr('title', '검색어 text 입력');
  $('.kboard-search button').attr('title', '검색 버튼 클릭');
  $('.kboard-list-title a img').attr('alt', '');



  $(window).resize(function () {
    var w_size = window.outerWidth;

    if (w_size > 1600) {
      $('.post_move').removeClass('on');
    } else {
      $('.post_move').addClass('on');
    };

  });



  $(window).scroll(function () {
    var position = $(window).scrollTop();
    var num = $(".desktop .wrapper").height() - $(".sns-linker").height();

    if (position <= num) {
      $('.sns-linker').stop().animate({ 'top': position + 'px' }, 500);
    };

    if ($(this).scrollTop() > 300) {
      $('.tabLink').addClass('fixed');
    } else {
      $('.tabLink').removeClass('fixed');
    }

    var proG = $('#progressbar').width();

    if (proG > "90%") {
      $('.tabLink').hide();
    } else {
      $('.tabLink').show();
    }


    var position = $(window).scrollTop();
    var commentTop = $(".wrapper").height() - $(".comment-wrap").height();

    if (position <= commentTop) {
      $('.comment-wrap').stop().animate({ 'top': position + 'px' }, 1000);
    }

    var positionY = $(window).scrollTop();
    var commentTop1 = $(".wrapper").height() - $(".popCuration.mobile").height();

    if (positionY <= commentTop1) {
      $('.popCuration.mobile').stop().animate({ 'top': position + 'px' }, 1000);
    }
  });

  /* 250422 고객사측에서 프로그래스바 게이지 작동 범위를 전체화면이 아닌 기사영역으로 적용해달라는 요청
  $(window).on('scroll', function () {
    const postBody = $('.post-body');
    const postTop = postBody.offset().top;
    const postHeight = postBody.outerHeight();
    const scrollTop = $(window).scrollTop();
    const windowHeight = $(window).height();

    const start = postTop - windowHeight; // 포스트가 화면에 처음 등장할 때
    const end = postTop + postHeight;     // 포스트가 화면에서 완전히 사라질 때

    const progress = (scrollTop - start) / (end - start);
    const percent = Math.min(100, Math.max(0, progress * 100));

    $('#progressbar').css('width', percent + '%');

    if (percent > 90) {
      $('.tabLink').hide();
    } else {
      $('.tabLink').show();
    }
  });
  */






  // 영상 모달
  $(".play_video_modal").on('click', function () {
    var videoLink = $(this).parent().find('.video_link').text().trim();
    var postTitle = $(this).parent().find('.post_title').text();
    var exLink = $(this).parent().find('.ex_link').text().trim();
    $('#modalTutorialYoutube').modal("show");
    $('#movieTitle').html('<h4 class="movie_post_tltle">' + postTitle + '</h4>');
    if (exLink && exLink.trim() !== '') {
      $('#movieOutLink').html('<a class="btn movie_outlink" href="' + exLink + '" target="_blank">관련기사보기</a>');
    } else {
      $('#movieOutLink').html('');
    }
    $('#playYoutubeView').html('<iframe width="740" height="455" src="' + videoLink + '?autoplay=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
  });
  $('#modalTutorialYoutube').on('hidden.bs.modal', function () {
    $('#movieTitle').html('')
    $('#movieOutLink').html('')
    $("#playYoutubeView").html('');
  });

  /*************** *************** *************** *************** *************** *************** *************** 
header 
*************** *************** *************** *************** *************** *************** ***************

/************** header:: 마우스 스크롤에 따른 fix, relative 처리 **************/
  $(window).on('scroll', function () {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > 5) {
      $('#header').addClass('solid');
      $('#main').addClass('solid2'); // 20250701 이재광 - 상단 고정 배너 있을때 프로그레스바 위치 조정
    } else {
      $('#header').removeClass('solid');
      $('#main').removeClass('solid2'); // 20250701 이재광 - 상단 고정 배너 있을때 프로그레스바 위치 조정
    };
    if (scrollTop > 160) {
      $('#main').addClass('response');
    } else {
      $('#main').removeClass('response');
    };
    if (scrollTop > 99) {
      $('.youtube_').addClass('sticky_on');
    } else {
      $('.youtube_').removeClass('sticky_on');
    };
    if (scrollTop > 10) {
      $('.post_move').addClass('off');
      $('.post_move.off').on('mouseover', function () {
        $(this).removeClass('off');
        //$('#main').removeClass('response');
      });
      $('.post_move').on('mouseleave', function () {
        $(this).addClass('off');
        //$('#main').addClass('response');
      });
    } else {
      $('.post_move').removeClass('off');
      $('.post_move.off').on('mouseover', function () {
        $(this).removeClass('off');
        //$('#main').removeClass('response');
      });
      $('.post_move').on('mouseleave', function () {
        $(this).removeClass('off');
        //$('#main').addClass('response');
      });
    };
  }).trigger('scroll');
  /*$(document).ready(function(){
    $('.post_move').on('mouseover', function(){
      $(this).removeClass('off');
      //$('#main').removeClass('response');
    })
      $('.post_move').on('mouseleave', function(){
      $(this).addClass('off');
      //$('#main').addClass('response');
    })
  });





  /* header::menu */
  $(".menu-item-74504").click(function () {
    $('body').css('overflow', 'hidden');
    $('.sch-bg').addClass('on');
    $('.sch-wrap').addClass('on');
    $(this).toggleClass('on');
    if ($(this).hasClass('on')) {
      //$('.sch-wrap').removeClass('on');
    } else {
      $('.sch-wrap').addClass('on');
    }
  });


  $(".menu-item-74505").click(function () {
    $(".menu-all").slideDown();
    $(".menu-all button").addClass('on');
  });

  $(".menu-all button").click(function () {
    $(".menu-all").slideUp();
    $(this).removeClass('on');
  });

  /* main_menu::hover */
  /*$(".gnb li").mouseover(function(){
    $(this).addClass('on');
  });
  $(".gnb li").mouseleave(function(){
    $(this).removeClass('on');
  });*/

  /* 메인메뉴 하단 캡션 */
  /*$(".gnb li:nth-child(2)").append('<button type="button" class="menu1" onclick="">비틀어 보는<span>이슈</span></button>');
  $(".gnb li:nth-child(3)").append('<button type="button" class="menu2" onclick="">꿈을 꾸는 <span>사람</span></button>');
  $(".gnb li:nth-child(4)").append('<button type="button" class="menu3" onclick="">움트는 <span>현장</span></button>');
  $(".gnb li:nth-child(5)").append('<button type="button" class="menu4" onclick="">싹트는 <span>아이디어</span></button>');
  $(".gnb li:nth-child(6)").append('<button type="button" class="menu5" onclick="">동트는 <span>리포트</span></button>');
  $(".menu1").attr('onclick', 'location.href="/?cat=2815" ');
  $(".menu2").attr('onclick', 'location.href="/?cat=6188" ');
  $(".menu3").attr('onclick', 'location.href="/?cat=6189" ');
  $(".menu4").attr('onclick', 'location.href="/?cat=2808" ');
  $(".menu5").attr('onclick', 'location.href="/?cat=2810" ');*/



  // 1. 프로그레스 바 요소를 추가 2025년 4월 23일 이재광 추가
  var progress = '<div id="progressbar"></div>';
  
  $('#header').append(progress); /* 프로그래스바 위치 변경 .post-body -> #header
  *  2025년 프로그래스바 개편 작업후 게이지 시작점이 이미 약 5% 정도 차지하고 있어서 페이지 초기 진입 시 이벤트 배너와 프로그래스바가 겹치는 현상이 발생함.
	└ 그래서 프로그래스바를 기존 post-body가 아닌 header에 그려지도록 수정함. 이벤트 배너 유무에 따라 헤더 높이를 수정할 때 프로그래스바도 자동으로 위치 조정되는 원리.
  */

  // 2. 스크롤 이벤트로 진행률 계산
  $(window).on('scroll', function () {
    // 기준이 될 .post-body 요소
    var $post = $('.post-body');

    // .post-body가 화면 위에서 얼마나 떨어져 있는지
    var postTop = $post.offset().top;

    // .post-body의 전체 높이
    var postHeight = $post.outerHeight();

    // 현재 스크롤 위치
    var scrollTop = $(window).scrollTop();

    // 화면 높이
    var windowHeight = $(window).height();

    // 현재 스크롤 위치가 .post-body 위로 얼마나 들어왔는지 계산
    var distanceScrolled = scrollTop + windowHeight - postTop;

    // .post-body 영역 전체에서 어느 정도 스크롤됐는지를 백분율로 계산
    var scrollPercentage = (distanceScrolled / postHeight) * 100;

    // 0% ~ 100% 사이로 제한 (스크롤 전/후 넘치지 않게)
    scrollPercentage = Math.max(0, Math.min(scrollPercentage, 100));

    // 진행바 너비 설정
    $('#progressbar').width(scrollPercentage + '%');
  });




  /* 메인 상단 이벤트 배너  */
  $('.event_close').on('click', function () {
    $('.event_banner').slideUp('fast');
    $('.event_banner').addClass('slideup');
    $('#header').css('top', '0');
  });

  /************** 주제별 기사 Slide Up **************/
  $(window).on('scroll', function () {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > 850) {
      if ($('.scroll_slide').val() != 'in') {
        $('.main-slide').slideUp();
        $('.subject_wrap').addClass('fold');
        $('.scroll_slide').attr('value', 'in');
      }
    }
  })

  $('.remote_fold').on('click', function () {
    $('.main-slide').slideToggle();
    $('.subject_wrap').toggleClass('fold');
  });

  $('#header .btn-toggle').on('click', function (e) {
    e.preventDefault();
    $('#header').toggleClass('show-offcanvas');
    $(body).css('overflow', 'hidden');
  });

  $('.mobile #nav .gnb > ul > li > a').on('click', function (e) {
    var subMenu = $(this).next('.sub-menu');
    if (subMenu[0]) {
      e.preventDefault();
      $(this).parent().toggleClass('active').siblings().removeClass('active');
    }
  });

  $('.arte365-share .btn-toggle').on('click', function (e) {
    e.preventDefault();
    $('.arte365-share').toggleClass('active');
  });

  /*************** *************** *************** *************** *************** *************** *************** 
  content 
  *************** *************** *************** *************** *************** *************** ***************/
  //(sns-linker) single 페이지 sns 링크 컨트롤러::jquery 내부에서 위치값, 슬라이드 속도 수정
  $('.sns-linker .top').on('click', function (e) {
    e.preventDefault();
    $('html,body').stop().animate({ 'scrollTop': 0 }, 800, 'easeInOutQuint');
  });
  function changeOverImage(element) {
    var url = $(element).prop('src'),
      url_over = $(element).data('change-over');
    $(element).prop('src', url_over).data('change-over', url);
  }
  $(document).delegate('img[data-change-over]', 'mouseover', function () {
    changeOverImage(this);
  });
  $(document).delegate('img[data-change-over]', 'mouseout', function () {
    changeOverImage(this);
  });


  $("#addon").click(function () {
    $(".share-buttons").toggleClass("on");
  });

  $(".facebook").mouseover(function () {
    $(".facebook a img").attr("src", "/wp-content/themes/arte365_v2017/img/icon/icon-facebook-on.png")
  });
  $(".facebook").mouseleave(function () {
    $(".facebook a img").attr("src", "/wp-content/themes/arte365_v2017/img/icon/icon-facebook.jpg")
  });
  $(".twitter").mouseover(function () {
    $(".twitter a img").attr("src", "/wp-content/themes/arte365_v2017/img/icon/icon-twitter-on.png")
  });
  $(".twitter").mouseleave(function () {
    $(".twitter a img").attr("src", "/wp-content/themes/arte365_v2017/img/icon/icon-twitter.png")
  });

  $('a[href="http://lib.arte.or.kr/index.do"]').attr('target', '_blank');

  $('#main_post_add').on('click', function () {
    $(this).children('img').css('transform', 'rotate(180deg)')
  });
  $('.btn_more_post').on('click', function () {
    $(this).children('img').css('transform', 'rotate(180deg)')
    $('#recentPosts').removeClass('A');
  });


  $(".tabLink a").click(function () {
    $(".tabLink a").removeClass("selected");
    $(this).addClass("selected");
    $('html,body').animate({ scrollTop: $(this.hash).offset().top - 53 }, 500);
    return false;
  });


  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $('.tabLink').addClass('fixed');
    } else {
      $('.tabLink').removeClass('fixed');
    }

    var proG = $('#progressbar').width();

    if (proG > "90%") {
      $('.tabLink').hide();
    } else {
      $('.tabLink').show();
    }
  });

  /*$('.post_move').mouseover(function(){
    $(this).addClass('on');
  });
  $('.post_move').mouseleave(function(){
    $(this).removeClass('on');
  });*/

  /*************** *************** *************** *************** *************** *************** *************** 
    footer 
    *************** *************** *************** *************** *************** *************** ***************/
  $(".foot_sitemap").click(function () {
    $(".menu-item-457").addClass('foot_link');
    $(".menu-all").slideDown();
    $(".menu-all button").addClass('on');
  });

  // footer:: Top버튼
  $('#footer .btn-top').on('click', function (e) {
    e.preventDefault();
    $('html,body').stop().animate({ 'scrollTop': 0 }, 800, 'easeInOutQuint');
  });


  //검색결과 카테고리 셀렉트
  var slideNum = $(".swiper-wrapper").children().length;
  if (slideNum >= 1) {
    $(".swiper-wrapper").addClass('num' + slideNum);
  }
  $('.sch-select p').on('click', function () {
    $(this).next().stop().slideToggle();
  });

  $('.ul_floatkyh6 li a').attr('title', '새창 이미지 열기');

  //20210624 메인 최신등록순 수정
  $('.article_view').click(function () {
    $('.tab-contents .tab-content').addClass('A');
  });
  $('.apply_relate').click(function () {
    $('.tab-contents .tab-content').addClass('A');
  })

  //$('img[src="http://arte365.kr/wp-content/uploads/2021/05/Newsletter_20210601.jpg"]').attr('src', 'http://arte365.kr/wp-content/uploads/2021/06/Newsletter_20210601.jpg');

/*
  var eventimg = $(".event_banner img"); // 이벤트배너 img 파일 찾기
  var eventsrc = eventimg.attr('src');     // 이벤트배너 이미지 주소값 src 가지고 오기  https://java7.tistory.com/89
  if (typeof eventsrc != "undefined") {
    console.log("eventsrc", eventsrc);
    var newSrc = eventsrc.substring(0, eventsrc.lastIndexOf('.')); // .png, .jpg와 같이 파일명 자르기, 뒤에서 부터 시작해서 '.'점있는 곳 까지 컷!
    $(window).resize(function () {
      var mainimg_width = window.outerWidth;


      if (mainimg_width > 900) {
        $('.left-area.right-bordered').removeClass('responsiveimg');
        $('.left-area.right-bordered').addClass('fullimg');
      } else {
        $('.left-area.right-bordered').removeClass('fullimg');
        $('.left-area.right-bordered').addClass('responsiveimg');
      }

      var w = window.innerWidth;

      if (w > 900) {
        //eventPcBox();
      }
      else {
        //eventMobilekjBox();
      }

    });
  }
  */

  /*function eventPcBox(){
    eventimg.removeClass("on");
    $(".event_banner").find('img').attr('src', newSrc + '.' + /[^.]+$/.exec(eventsrc)); //hover시 _m 때기
  }

  function eventMobilekjBox(){
    eventimg.addClass("on");
    $(".event_banner").find('img').attr('src', newSrc+ '_m.' + /[^.]+$/.exec(eventsrc)); //hover시 _m 붙이기
  }*/

});

function arte_url_page() {

  var arte_url = document.createElement("textarea"); //url 복사할 textarea 수정
  document.body.appendChild(arte_url);
  arte_url.value = location.href;
  arte_url.select();
  document.execCommand('copy');
  document.body.removeChild(arte_url);
  alert('기사 URL 주소가 복사되었습니다.');
}

/*function arte_url_page(){
	
    var arte_url= document.createElement("textarea"); //url 복사할 textarea 수정
        document.body.appendChild(arte_url);
        arte_url.value = location.href;
        arte_url.select();
        document.execCommand('copy');
        document.body.removeChild(arte_url);
    alert('기사 URL 주소가 복사되었습니다.');
}*/

jQuery(function ($) {
  // mobile slider 
  /*var slider = $('.single .mobile_slide');
  var slickOptions = {
    dots:true,
    arrows:true,
  };
  $(window).on('load resize', function() {
    if($(window).width() > 800) {
      slider.slick('unslick');
    }else{
      slider.not('.slick-initialized').slick(slickOptions);
    }
  });*/
  $(document).ready(function () {
    mainMobileCheckFn();
  });

  var m_slider;
  var slider = $('.single .mobile_slide');

  function mainMobileCheckFn() {
    var w = $(window).width();
    if (w > 800) { //PC
      if (slider.hasClass('slick-slider')) {
        m_slider.slick('unslick');
      }
    } else { //mobile 
      if (!slider.hasClass('slick-slider')) {
        m_slider = slider.slick();
      }
    }
  };

  $(window).resize(function () {
    mainMobileCheckFn();
  });

  var windowWidth = $(window).width();
  if (windowWidth < 1024) {
    new Swiper('.tabLink.swiper-container', {
      slidesPerView: 2,
      touchRatio: 1,
      // 스크롤바 설정하기
      scrollbar: {
        el: '.tabLink .swiper-scrollbar',
        draggable: true,
      },
    });
  }




  /*  20220610 폰트사이트 키우기 & 폰트변경 */

  $(document).ready(function () {

    var contTit = $('.arte365-post-single .post-title');
    var contSubTit = $('.arte365-post-single .post-small-title');
    var contAuthor = $('.arte365-post-single .post-meta span.publisher');
    var contDate = $('.pull-right');
    var contCont = $('.arte365-post-single .post-content');

    var m_contDate = $('.arte365-post-single .post-meta .pull-left');
    /* var m_contCont = $('.arte365-post-single .post-content'); */



    $(".size").click(function () {
      contTit.toggleClass("zoom");
      contSubTit.toggleClass("zoom");
      contAuthor.toggleClass("zoom");
      contDate.toggleClass("zoom");
      contCont.toggleClass("zoom");

      m_contDate.toggleClass("zoom");
    });


    $(".font").click(function () {
      contTit.toggleClass("maruburi");
      contSubTit.toggleClass("maruburi");
      contAuthor.toggleClass("maruburi");
      contDate.toggleClass("maruburi");
      contCont.toggleClass("maruburi");

      //m_contTit.toggleClass("maruburi");
      //m_contSubTit.toggleClass("maruburi");
      //m_contAuthor.toggleClass("maruburi");
      m_contDate.toggleClass("maruburi");
      //m_contCont.toggleClass("maruburi");
    });
  });

  /* 20220616 댓글 수정,삭제 팝업 */
  $(".comment-btn a.modify").click(function () {
    $('body').css('overflow', 'hidden');
    //$('.comment-bg').addClass('on');
    $('.comment-bg').toggleClass('on');
    if ($('.comment-bg').hasClass('on')) {
      $(".comment-wrap").addClass('on');
    } else {
      $(".comment-wrap").removeClass('on');
    }

    var comment_id = $(this).closest('.comment-list-item').data('id');
    $('#comment_no').val(comment_id);

    if ($(this).hasClass('edit')) {
      $('#comment_action').val('edit');
    } else if ($(this).hasClass('delete')) {
      $('#comment_action').val('delete');
    }
  });

  $('#checkCommentPw').on('click', function () {
    var comment_action = $('#comment_action').val();
    var comment_no = $('#comment_no').val();
    var comment_pw = $('#comment_pw').val();

    if (comment_pw == undefined || comment_pw == null || comment_pw == '') {
      alert('비밀번호를 입력하세요.');
      return;
    }

    jQuery.ajax({
      type: "POST",
      dataType: "json",
      url: '/comment-ajax.php',
      data: { comment_no: comment_no, comment_pw: comment_pw, comment_action: comment_action },
      async: true,
      success: function (data) {
        var result = data['result'];
        if (result) {
          if (comment_action == 'edit') {
            $('.comment-modify[data-id=' + comment_no + ']').show();
            $('.comment-modify[data-id=' + comment_no + ']').find('[name=comment]').text(data['content']);
            $('.comment-modify[data-id=' + comment_no + ']').find('[name=token]').val(data['token']);

            $('.comment-wrap').removeClass('on');
            $('.comment-bg').removeClass('on');
            $('body').css('overflow', 'inherit');
          } else if (comment_action = 'delete') {
            location.reload();
          }
        } else {
          alert('비밀번호가 틀렸습니다.');
        }
      }
    });

  });

  $('.comment-modify .submit').on('click', function () {
    var form = $(this).closest('.comment-form');
    var comment_action = 'editProc'
    var comment_no = form.find('[name=comment_no]').val();
    var comment = form.find('[name=comment]').val();
    var token = form.find('[name=token]').val();

    jQuery.ajax({
      type: "POST",
      dataType: "json",
      url: '/comment-ajax.php',
      data: { comment_no: comment_no, comment_content: comment, comment_action: comment_action, token: token },
      async: true,
      success: function (data) {
        var result = data['result'];
        if (result) {
          location.reload();
        } else {
          alert('처리 실패');
        }
      }
    });
  });


  $('.search-form .btn_close').click(function () {
    $('.comment-wrap').removeClass('on');
    $('.comment-bg').removeClass('on');
    $('body').css('overflow', 'inherit');
  });


  /* 20220629 주제별 큐레이션 팝업 */
  $(".menuBtn").click(function () {
    $('body').css('overflow', 'hidden');
    //$('.comment-bg').addClass('on');
    $('.cu-bg').toggleClass('on');
    if ($('.cu-bg').hasClass('on')) {
      $(".popCuration").addClass('on');
    } else {
      $(".popCuration").removeClass('on');
    }
  });

  $(".popCuration ul li").click(function () {
    $('body').css('overflow', 'inherit');
    $('.popCuration').removeClass('on');
    $('.cu-bg').removeClass('on');
  });



  $('.popCuration .btn_close').click(function () {
    $('.popCuration').removeClass('on');
    $('.cu-bg').removeClass('on');
    $('body').css('overflow', 'inherit');
  });

  //scroll popup :: follow
  /*$(window).scroll(function() {
    var position = $(window).scrollTop();
    var num = $(".wrapper").height()-$(".comment-wrap").height();


    if(position <= num){
      $('.comment-wrap').stop().animate({'top':position+'px'},1000);
    }
  });*/


  $('.number-only').on('change keyup', function () {
    $(this).val($(this).val().replace(/[^0-9]/gi, ''));
  });

  if (window.location == 'https://arte365.kr/?p=87078') {
    window.location.href = 'https://arte365.kr/?p=94766';
  }

  let hash = window.location.hash;
  if (hash) {
    hash = hash.slice(1);
    if (hash.startsWith('video-')) {
      $(`[data-hash=${hash}]`).click();
    }

  }
  var Accordion = function (el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;
    var links = this.el.find('.accordion__tit');
    links.on('click', { el: this.el, multiple: this.multiple }, this.dropdown)
  }
  Accordion.prototype.dropdown = function (e) {
    var $el = e.data.el;
    $this = $(this),
      $next = $this.parent().next();

    $('.accordion__tit').parent().removeClass('is-open');
    $next.slideToggle();
    $this.parent().toggleClass('is-open');

    if (!e.data.multiple) {
      $el.find('.accordion__cont').not($next).slideUp().parent().removeClass('is-open');
    };
  }
  var accordion = new Accordion($('.js-accordion'), false);
});

// 241114 아르떼 편집위원 소개 탭
// 특정 탭 내용을 표시하는 함수
function showTabContent(index) {
  // 모든 탭과 내용을 비활성화
  const tabs = document.querySelectorAll(".tab");
  const contents = document.querySelectorAll(".editor-tabCont");

  // 모든 탭을 비활성화 (PC용)
  tabs.forEach(tab => tab.classList.remove("active-tab"));
  // 모든 내용을 숨김
  contents.forEach(content => content.classList.remove("active-content"));

  // 선택한 탭과 내용을 활성화
  if (tabs[index]) {
    tabs[index].classList.add("active-tab"); // 선택된 탭 활성화 (PC용)
  }
  contents[index].classList.add("active-content"); // 선택된 내용 표시
}