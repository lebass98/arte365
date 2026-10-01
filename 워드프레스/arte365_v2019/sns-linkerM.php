<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.3/clipboard.min.js"></script>
<div class="link_box">
    <div class="size msize"><img src="http://arte365.kr/wp-content/uploads/2022/sizeM.png" /></div> 
    <div class="font mfont"><img src="http://arte365.kr/wp-content/uploads/2022/fontM.png" /></div>

    <div class="share_wrap">
        <div class="share">
            <a href="#"><img src="/wp-content/uploads/2019/07/sns_share.png" /></a>
        </div>
        <div class="sns sns-linker">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink())?>" target="_blank" title="페이스북 클릭 새창이동">
            <img src="/wp-content/uploads/2019/07/sns_facebook.png" /></a>
            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink())?>&text=<?php echo urlencode(single_post_title( '', false )." | ".get_bloginfo('name'))?>" target="_blank"  title="트위터 클릭 새창이동"><img src="/wp-content/uploads/2019/07/sns_twitter.png" /></a>
            <a href="javascript:;" id="send_email_m" title="이메일 버튼 클릭">
                <img src="/wp-content/uploads/2019/07/sns_mail.png" alt="mail">
            </a>
            <a href="javascript:arte_url_page()"   title="공유버튼 클릭"><img src="/wp-content/uploads/2019/07/sns_copy.png" /></a>
        </div>
    </div>
</div>