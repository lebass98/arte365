<div id="kboard-default-list">

    <div class="reader_text">
        아르떼<span style="color:#ef0a25;font-weight:500;">[</span>365<span style="color:#ef0a25;font-weight:500;">]</span>는 문화예술교육 현장의 생생한 목소리를 담고자 <br />독자 여러분의 이야기를 기다립니다.
        <span class="reader_cap test">기사로 만나고 싶은 콘텐츠(인물, 현장 등) 추천은
            독자의 추천을 통해 참여하실 수 있습니다.

            <!-- 게시물 내 개인정보는 기록하지 않도록 주의하여 주세요. <br/>
            상업성 광고, 저속한 표현, 특정인 및 단체에 대한 비방, 반복적 게시물은 통보 없이 삭제 됩니다.<br/>
            ※ 이 외 아르떼365의 독자 게시판 서비스에 바람직하지 않다고 판단되는 경우 조치를 취할 수 있습니다.<br/> -->
			</span>
        <!-- <a id="recommend" class="kboard-default-button-small default-button01 default-button01_1">독자의 추천</a> -->
		<a href="javascript:alert('현재 기능 개선 사유로 당분간 독자 글쓰기가 불가능합니다.\n
			작업 완료 시 별도 공지를 통해 안내 될 예정입니다.')"  class="kboard-default-button-small" style="margin-top:10px;">독자의 추천</a>
    </div>

    <!-- 검색폼 시작 -->
    <div class="kboard-header">
        <form id="kboard-search-form" method="get" action="<?php echo $url->set('mod', 'list')->toString()?>">
            <?php echo $url->set('category1', '')->set('category2', '')->set('pageid', '1')->set('target', '')->set('keyword', '')->set('mod', 'list')->toInput()?>

            <?php if($board->use_category == 'yes'):?>
                <div class="kboard-category">
                    <?php if($board->initCategory1()):?>
                        <select name="category1" onchange="jQuery('#kboard-search-form').submit();">
                            <option value=""><?php echo __('구분', 'kboard')?> <span>*</span></option>
                            <?php while($board->hasNextCategory()):?>
                                <option value="<?php echo $board->currentCategory()?>"<?php if($_GET['category1'] == $board->currentCategory()):?> selected="selected"<?php endif?>><?php echo $board->currentCategory()?></option>
                            <?php endwhile?>
                        </select>
                    <?php endif?>

                    <?php if($board->initCategory2()):?>
                        <select name="category2" onchange="jQuery('#kboard-search-form').submit();">
                            <option value=""><?php echo __('All', 'kboard')?></option>
                            <?php while($board->hasNextCategory()):?>
                                <option value="<?php echo $board->currentCategory()?>"<?php if($_GET['category2'] == $board->currentCategory()):?> selected="selected"<?php endif?>><?php echo $board->currentCategory()?></option>
                            <?php endwhile?>
                        </select>
                    <?php endif?>
                </div>
            <?php endif?>

            <div class="kboard-search">
                <select name="target">
                    <option value=""><?php echo __('전체', 'kboard')?></option>
                    <option value="title"<?php if($_GET['target'] == 'title'):?> selected="selected"<?php endif?>><?php echo __('제목', 'kboard')?></option>
                    <option value="content"<?php if($_GET['target'] == 'content'):?> selected="selected"<?php endif?>><?php echo __('내용', 'kboard')?></option>
                    <option value="member_display"<?php if($_GET['target'] == 'member_display'):?> selected="selected"<?php endif?>><?php echo __('작성자', 'kboard')?></option>
                </select>
                <input type="text" name="keyword" value="<?php echo $_GET['keyword']?>">
                <button type="submit" class="kboard-default-button-small"><?php echo __('Search', 'kboard')?></button>
            </div>
        </form>
    </div>
    <!-- 검색폼 끝 -->

    <!-- 리스트 시작 -->
    <div class="kboard-list">
        <table>
            <colgroup>
                <col style="width:8%">
                <col style="width:auto">
                <col style="width:10%">
                <col style="width:10%">
                <col style="width:8%">
            </colgroup>
            <thead>
            <tr>
                <td class="kboard-list-uid"><?php echo __('번호', 'kboard')?></td>
                <td class="kboard-list-title"><?php echo __('제목', 'kboard')?></td>
                <td class="kboard-list-user"><?php echo __('작성자', 'kboard')?></td>
                <td class="kboard-list-date"><?php echo __('작성일', 'kboard')?></td>
                <td class="kboard-list-view"><?php echo __('조회', 'kboard')?></td>
            </tr>
            </thead>
            <tbody>
            <?php while($content = $list->hasNextNotice()):?>
                <tr class="kboard-list-notice">
                    <td class="kboard-list-uid"><?php echo __('Notice', 'kboard')?></td>
                    <td class="kboard-list-title"><div class="cut_strings">
                            <a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toString()?>"><?php echo $content->title?></a>
                            <?php echo $content->getCommentsCount()?>
                        </div></td>
                    <td class="kboard-list-user"><?php echo $content->member_display?></td>
                    <td class="kboard-list-date"><?php echo date("Y.m.d", strtotime($content->date))?></td>
                    <td class="kboard-list-view"><?php echo $content->view?></td>
                </tr>
            <?php endwhile?>
            <?php while($content = $list->hasNext()):?>
                <tr>
                    <td class="kboard-list-uid"><?php echo $list->index()?></td>
                    <td class="kboard-list-title"><div class="cut_strings">
                            <a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toString()?>"><?php echo $content->title?>
                                <?php if($content->secret):?><img src="<?php echo $skin_path?>/images/icon_lock.png" alt="<?php echo __('Secret', 'kboard')?>"><?php endif?>
                            </a>
                            <?php echo $content->getCommentsCount()?>
                        </div></td>
                    <td class="kboard-list-user"><?php echo $content->member_display?></td>
                    <td class="kboard-list-date"><?php echo date("Y.m.d", strtotime($content->date))?></td>
                    <td class="kboard-list-view"><?php echo $content->view?></td>
                </tr>
                <?php $boardBuilder->builderReply($content->uid)?>
            <?php endwhile?>
            </tbody>
        </table>
    </div>
    <!-- 리스트 끝 -->

    <!-- 페이징 시작 -->
    <div class="kboard-pagination">
        <ul class="kboard-pagination-pages">
            <?php echo kboard_pagination($list->page, $list->total, $list->rpp)?>
        </ul>
    </div>
    <!-- 페이징 끝 -->

    <?php if($board->isWriter()):?>
        <!-- 버튼 시작 -->
        <div class="kboard-control">
            <a href="javascript:alert('현재 기능 개선 사유로 당분간 독자 글쓰기가 불가능합니다.\n
			작업 완료 시 별도 공지를 통해 안내 될 예정입니다.')" class="kboard-default-button-small">글쓰기</a>
            <!-- <a href="<?php echo $url->set('mod', 'editor')->toString()?>" class="kboard-default-button-small"><?php echo __('글쓰기', 'kboard')?></a> -->
        </div>
        <!-- 버튼 끝 -->
    <?php endif?>

    <div class="kboard-default-poweredby">
        <a href="http://www.cosmosfarm.com/products/kboard" onclick="window.open(this.href); return false;" title="<?php echo __('KBoard is the best community software available for WordPress', 'kboard')?>">Powered by KBoard</a>
    </div>
</div>
</div>


<!-- 20230609 독자게시판 독자의 추천 팝업 -->
<div class="kboard-bg"></div>
<div class="kboard_popup-wrap">
    <h2>독자의 추천</h2>
    <div class="kboard-form">
        <div class="btn_close"></div>
        <form id="userPickForm" class="kboard-form_box" method="post">
            <div class="kboard-attr-row pd_0">
                <p class="arte_txt">
                    아르떼365에서는 <br>
                    문화예술교육의 장에 더욱 가까이 다가가고자, <br>
                    독자분들의 추천에 귀를 기울입니다. <br>
                    문화예술교육의 이슈, 사람, 현장, 리포트 등 <br>
                    기사로 만나고 싶은 콘텐츠(인물, 사업현장 등)을 추천해주세요. <br>
                </p>
                <!-- <label class="attr-name">구분<span> *</span></label> -->
                <!-- <div class="attr-value">
                <select name="category1">
                    <option value="">선택</option>
                    <option value="아이템제보">아이템제보</option>
                    <option value="이벤트참여">이벤트참여</option>
                    <option value="오류신고">오류신고</option>
                    <option value="기타문의">기타문의</option>
                </select>
                </div> -->
            </div>
            <div class="kboard-attr-row kboard-attr-title">
                <label class="attr-name">제목<span> *</span></label>
                <div class="attr-value"><input type="text" name="title" title="제목" class="required" required value=""></div>
            </div>
            <div class="kboard-attr-row i80">
                <label class="attr-name">작성자<span> *</span></label>
                <div class="attr-value"><input type="text" name="member_display" title="작성자" class="required" required value=""></div>
            </div>
            <div class="kboard-attr-row i80">
                <label class="attr-name">이메일<span> *</span></label>
                <div class="attr-value"><input type="text" name="kboard_option_email" title="이메일" class="required" required value=""></div>
            </div>
            <div class="kboard-attr-row i80">
                <label class="attr-name">휴대폰<span> </span></label>
                <div class="attr-value">
                    <input type="text" name="kboard_option_phone" value="">
                    <!-- <p class="i80_txt">아이템 제안, 이벤트 참여시 반드시 휴대폰 번호를 남겨주세요.</p> -->
                </div>
            </div>
            <div class="kboard-attr-row i80">
                <label class="attr-name">자동입력<br>방지문자<span> *</span></label>
                <div class="attr-value"><img id="captcha_img" src="" alt="" width="60px">&nbsp;&nbsp;&nbsp;<input type="text" name="captcha" value="" title="자동입력 방지문자" class="required" required style="padding-right:20px;"><p class="i80_txt">빨간색 글자가 보이는 대로 입력해주세요.</p></div>
            </div>
            <div class="kboard-content kboard-attr-row i80">
                <label class="attr-name">내용<span class="cl_red"> *</span></label>
                <textarea name="kboard_content" id="kboard_content" title="내용" class="required" required></textarea>
                <p id="kboard_content_length" class="s_txt">0/255</p>
            </div>
            <!--
            <div class="kboard-attr-row">
                <label class="attr-name">첨부파일</label>
                <div class="attr-value">
                    <input type="file" name="kboard_attach">
                </div>
            </div>
            -->
        </form>
    </div>
    <div class="kboard-attr-row">
        <div class="attr-value attr_box">
            <!-- 2021/06/24 아래 라디오 버튼으로 변경 <input type="checkbox" name="secret" value="true">-->
            <div class="check_box">
                <input id="content_chk" type="checkbox" name="check" value="" class="attr-check"><p class="check_txt">개인정보 수집 및 이용에 관한 사항 내용을 숙지하였으며, 해당 내용에 동의합니다. <span class="f_red">(필수)</span></p>
            </div>
            <button type="button" class="attr-btn">자세히 보기</button>
        </div>
        <div class="btn_popup">
            <p>1. 개인정보를 제공받는 기관 : 한국문화예술교육진흥원</p>
            <p>2. 개인정보 수집항목 : 이름,전화번호,이메일주소</p>
            <p>3. 개인정보 수집 목적 : 독자의참여 게시판 메일 수신 시 사용</p>
            <p>4. 개인정보 수집 동의에 거부하실 수 있으며, 동의 거부 시 독자의 추천을 이용하실 수 없습니다.</p>
        </div>
    </div>
    <div class="kboard-control">
        <div class="left">
            <a href="/?page_id=51291" class="kboard-default-button-small">돌아가기</a>
        </div>
        <div class="right">
            <button id="userPickBtn" type="button" class="kboard-default-button-small">전송하기</button>
        </div>
    </div>
</div>

<script>
    // jQuery('.kboard-default-button-small.default-button01').click(function(){
    // jQuery('.kboard_popup-wrap').addClass('on');
    // jQuery('.kboard-bg').addClass('on');
    // jQuery('body').css('overflow', 'inherit');
    //     })
    // jQuery('.kboard-form .btn_close').click(function(){
    // jQuery('.kboard_popup-wrap').removeClass('on');
    // jQuery('.kboard-bg').removeClass('on');
    // jQuery('body').css('overflow', 'inherit');
    //     })

    jQuery(function() {
       if(window.location.hash === '#recommend') {
            jQuery('#recommend').click();
           window.location.hash = '';
       }
        window.addEventListener("hashchange", function(){
            if(window.location.hash === '#recommend') {
                jQuery('#recommend').click();
                window.location.hash = '';
            }
        });
    });

    jQuery('.kboard-default-button-small.default-button01').on('click', function() {
        jQuery('body').css('overflow', 'hidden');
        jQuery('.kboard-bg').addClass('on');
        jQuery(".kboard_popup-wrap").toggleClass('on');
        if(jQuery(this).hasClass('on')){
            jQuery(".kboard_popup-wrap").removeClass('on');
        }else{
            setCaptcha();
            jQuery(".kboard_popup-wrap").addClass('on');
        }
    });

    jQuery('.kboard_popup-wrap .btn_close').click(function(){
        jQuery('.kboard_popup-wrap').removeClass('on');
        jQuery('.kboard-bg').removeClass('on');
        jQuery('body').css('overflow', 'inherit');
    });

    // jQuery('.kboard_popup-wrap .kboard-default-button-small').click(function(){
    //     jQuery('.kboard_popup-wrap').removeClass('on');
    //     jQuery('.kboard-bg').removeClass('on');
    //     jQuery('body').css('overflow', 'inherit');
    // });

    function setCaptcha() {
        jQuery.ajax({
            type: 'POST',
            url: '/wp-admin/wp-ajax.php?action=Get_kboard_captcha',
            success: function (res) {
                const resp = JSON.parse(res);
                jQuery('#captcha_img').attr('src', resp.captcha_img);
            },
        });
    }

    jQuery('#kboard_content').on('keyup keypress keydown', function() {
        const max_length = 255;
        let cur_length = jQuery(this).val().length;

        if(cur_length > max_length) {
            jQuery(this).val(jQuery(this).val().substring(0, max_length));
            cur_length = jQuery(this).val().length;
        }

        jQuery('#kboard_content_length').text(cur_length + '/' + max_length);
    });

    jQuery('#userPickBtn').click(function() {
        var isValid = true;

        jQuery.each(jQuery('#userPickForm .required'), function(i, e) {
            if(jQuery(e).val() == '') {
                alert(jQuery(e).attr('title') + '을(를) 입력해주세요.');
                isValid = false;
                return false;
            }
        });
        if(!isValid) return;

        if(!jQuery('#content_chk').is(':checked')) {
            alert('개인정보 수집 및 이용에 동의해주세요.');
            return false;
        }

        var form = jQuery('#userPickForm')[0];
        var formData = new FormData(form);

        jQuery.ajax({
            type: 'POST',
            url: '/wp-admin/wp-ajax.php?action=Get_send_email',
            contentType : false,
            processData : false,
            data: formData,
            success: function (res) {
                const resp = JSON.parse(res);
                const status = resp.status;
                if(status == 200) {
                    jQuery('.kboard_popup-wrap').removeClass('on');
                    jQuery('.kboard-bg').removeClass('on');
                    jQuery('body').css('overflow', 'inherit');

                    jQuery.each(jQuery('#userPickForm input, #userPickForm textarea'), function(i, e) {
                        jQuery(e).val('');
                    });
                    setCaptcha();

                    jQuery('#kboard_content_length').text('0/255');
                } else {
                    alert(resp.msg);
                }
            },
        });
    });
</script>

<script>
    jQuery('.attr-btn').click(function(){
        jQuery(this).toggleClass('is-click');
        jQuery('.kboard-attr-row .btn_popup').slideToggle();
    });
</script>