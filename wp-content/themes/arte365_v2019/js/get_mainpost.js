jQuery(document).ready(function($) {

    get_main_Sortpost();

    //정렬 selectbox
    /*
     jQuery("#post_sort").on('change', function(){
     if(jQuery(this).val()=='A' || jQuery(this).val()==''){
     location.href='/?cat=0';
     $('.selectPost_tit').text('최신등록순');
     }else{
     get_main_Sortpost();
     $('.selectPost_tit').text('가장 많이 본 기사');
     }
     });
     */

    jQuery(document).on('change', '#post_sort', function() {
		get_weekCommentCount();

		var st = $(":input:radio[name=post_sel]:checked").val();
		//console.log("선택된 post_sel 값:", st);

		if (st === 'C') {
			get_main_recnet(0); // 댓글 기반 데이터만 가져옴
			$('.selectPost_tit').text('최신댓글달린순');
			return; // 여기서 종료하여 더 이상 get_main_Sortpost 호출되지 않도록 함
		}

		// 그 외에는 최신등록순 or 많이 본 기사
		if (jQuery(this).val() == '') {
			get_main_Sortpost();
			$('.selectPost_tit').text('최신등록순');
		} else {
			get_main_Sortpost();
			$('.selectPost_tit').text('가장 많이 본 기사');
		}
	});

    //더보기
    jQuery("#main_post_add").on('click',function(){


        var post_num=Number(jQuery("#post_num").val());



        if(post_num>=24){
            alert('최대 24개까지 가져오실수 있습니다');
        }else{
            var change_num=post_num+8;

            jQuery("#post_num").val(change_num);

            if(change_num>=24){
                jQuery("#main_post_add").css('display','none');
                jQuery("#main_post_remove").css('display','inline-block');
            }

            //최신댓글 더보기 처리_START
            var st = $(":input:radio[name=post_sel]:checked").val();
            if(st == 'C'){
                get_main_recnet(post_num);
            }else {
                //최신댓글 더보기 처리_END
                get_main_Sortpost();
            }

        }
    });


    //감추기
    jQuery("#main_post_remove").on('click',function(){

        jQuery("#post_num").val(8);
        jQuery("#main_post_add").css('display','inline-block');
        jQuery("#main_post_remove").css('display','none');

        var st = $(":input:radio[name=post_sel]:checked").val();
        if(st == 'C'){
            var post_num = 0;
            get_main_recnet(post_num);
        }else{
            get_main_Sortpost();
        }
        //최신댓글 감추기 처리_end

        var offset = $(".home-tab-content").offset();
        $('html, body').animate({scrollTop : offset.top-50}, 400);

    });

    //더보기
    jQuery("#main_movie_post_add").on('click',function(){
        var post_num=Number(jQuery("#post_num").val());

        if(post_num>=24){
            alert('최대 24개까지 가져오실수 있습니다');
        }else{
            var change_num=post_num+8;

            jQuery("#post_num").val(change_num);

            if(change_num>=24){
                jQuery("#main_post_add").css('display','none');
                jQuery("#main_post_remove").css('display','inline-block');
            }
            get_main_Sortpost();
        }
    });

});

function get_main_Sortpost(){
    get_weekCommentCount();

    var sort_type=jQuery("#post_sort input:checked").val(); //정렬
    var post_num=jQuery("#post_num").val();

    console.log(sort_type);

    var data = {
        'action': 'Get_mainPost', // 워드프레스에 등록할 action입니다. 이 action에서 불리는 함수에서 아래의 포스트 id를 처리하려고 합니다.
        'sort_type': sort_type,
        'post_num': post_num
    };

    jQuery.get(mainPostAjax.ajaxurl, data, function(responses){
        // mainPostAjax.ajaxurl 은 wp_localize_script에서 url 문자열을 받아 사용합니다.
        // console.log("테이터"+responses); // 로그로 제대로 서버의 답변이 오는 지 확인합니다.

        var ajax_data=JSON.parse(responses); //json 파싱
        console.log("갯수"+ajax_data.length);
        var main_post=''; //html 데이터
        var currentDate = new Date();
        for(var d_num=0; d_num<ajax_data.length; d_num++){

            // var content = ajax_data[d_num]['content'].replace(/<style[^>]*>((\n|\r|.)*?)<\/style>/gim, "");
            // content = content.replace(/<script[^>]*>((\n|\r|.)*?)<\/script>/gim, "");
            // content = content.replace(/(<([^>]+)>)/gi, "");
            // content = content.replace(/\r\n|\r|\n|\t/gim, "");

            var dateStr = ajax_data[d_num]['date'].slice(0, -1).replace('.', '-').replace('.', '-');
            var date = new Date(dateStr);
            var diffDate = parseInt(currentDate.getTime() - date.getTime());
            var diffDays = Math.abs(diffDate / (1000 * 3600 * 24));

            main_post+='<div class="post-item clearfix wow fadeInUp">';
            main_post+='<article class="post" id="post-'+ajax_data[d_num]['id']+'">';
            main_post+='<a href="'+ajax_data[d_num]['link']+' " target="_self" title="'+ajax_data[d_num]['title']+' 기사 클릭 페이지 이동">';
            main_post+='<div class="post-tb">';
            main_post+=ajax_data[d_num]['img'];
            main_post+='</div>';
            main_post+='<div class="post-desc">';
            main_post+='<span class="post-category">'+ajax_data[d_num]['catname']+'</span>';
            main_post+='<h3 class="post-title">'+ajax_data[d_num]['title'];

            if(diffDays <= 14) {
                main_post += '<em class="post-new">N</em>';
            }

            main_post+='</h3><p class="post-small-title">'+ajax_data[d_num]['small_title']+'</p>';
            main_post+='<div class="post-meta">';
            main_post+='<div class="publisherContets">' + ajax_data[d_num]['content'] + '</div>';
            main_post+='<span class="publisher">'+ajax_data[d_num]['publisher']+'</span>';
            main_post+='</div>';
            main_post+='<span class="post-date">'+ajax_data[d_num]['date']+'<!--'+ajax_data[d_num]['view']+'--></span>';
            main_post+='</div>';
            main_post+='</a>';
            main_post+='</article>';
            main_post+='</div>';
        }

        /*console.log("------");
         console.log(main_post);*/
        jQuery("#main_last_post").html(main_post);

    });
}


//2021/06/30_최신댓글 작업.
function get_main_recnet(post_num){
    get_weekCommentCount();
    
    jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: '/wp-admin/admin-ajax_recentcomment.php',
        async: true,
        success: function(data){
            var $data = jQuery(data);
            var ajax_data=JSON.parse(data); //json 파싱
            var main_post=''; //html 데이터
            console.log("========post_num====="+post_num);
            for(var d_num=0; d_num<post_num+8; d_num++){ //250513 red :: 87186 기사 노출 제외 시키면서 'post_num+8;' -> 'post_num+9;'로 변경 //250530 red :: 'post_num+9;'로 변경 완료
				 //console.log("▶ 댓글 기반 ID 확인:", ajax_data[d_num]['id'], typeof ajax_data[d_num]['id']);

				if (parseInt(ajax_data[d_num]['id']) === 87186) { //250513 red :: 87186 기사 노출 제외하였음.
																//추후 87186게시글이 자연적으로 노출 순서에서 밀려났을때 리스트가 9개씩 노출될것임으로 위에 post_num+8로 롤백해줘야함.
					//console.log("❌ 87186 걸러졌습니다.");
					continue;
				}

                // var content = ajax_data[d_num]['content'].replace(/<style[^>]*>((\n|\r|.)*?)<\/style>/gim, "");
                // content = content.replace(/<script[^>]*>((\n|\r|.)*?)<\/script>/gim, "");
                // content = content.replace(/(<([^>]+)>)/gi, "");
                // content = content.replace(/\r\n|\r|\n|\t/gim, "");

                main_post+='<div class="post-item clearfix wow fadeInUp">';
                main_post+='<article class="post" id="post-'+ajax_data[d_num]['id']+'">';
                main_post+='<a href="'+ajax_data[d_num]['link']+' " target="_self" title="'+ajax_data[d_num]['title']+' 기사 클릭 페이지 이동">';
                main_post+='<div class="post-tb">';
                main_post+=ajax_data[d_num]['img'];
                main_post+='</div>';
                main_post+='<div class="post-desc">';
                main_post+='<span class="post-category">'+ajax_data[d_num]['catname']+'</span>';
                main_post+='<h3 class="post-title">'+ajax_data[d_num]['title']+'<div class="post-new">(' + ajax_data[d_num]['comment_count'] + ')</div></h3>';
                main_post+='<p class="post-small-title">'+ajax_data[d_num]['small_title']+'</p>';
                main_post+='<div class="post-meta">';
                main_post+='<div class="publisherContets">' + ajax_data[d_num]['content'] + '</div>';
                main_post+='<span class="publisher">'+ajax_data[d_num]['publisher']+'</span>';
                main_post+='</div>';
                main_post+='<span class="post-date">'+ajax_data[d_num]['date']+'<!--'+ajax_data[d_num]['view']+'--></span>';
                main_post+='</div>';
                main_post+='</a>';
                main_post+='</article>';
                main_post+='</div>';
            }
            /*
             console.log("------");
             console.log(main_post);
             */

            jQuery("#main_last_post").html(main_post);

        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }
    });

}

function get_weekCommentCount(){
    var url = '/wp-admin/admin-ajax.php';
    var data = {
        'action': 'Get_weekCommentCount', // 워드프레스에 등록할 action입니다. 이 action에서 불리는 함수에서 아래의 포스트 id를 처리하려고 합니다.
    };

    jQuery.get(url, data, function(response){
        if(response > 0) {
            jQuery('.commentNew').css('display', 'inline-block');
        } else {
            jQuery('.commentNew').css('display', 'none');
        }
    });
}