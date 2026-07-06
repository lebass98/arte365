		</div><!--// main -->
        
        <?php get_template_part('partials/layout/footer', ARTE365_DEVICE_CODE);?>
    </div>


<!-- 동영상 게시판 모달 -->
<div class="modal fade modal_video modal-trans" id="modalTutorialYoutube" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="press_modal_box_wrap">
                <div class="modal_close_btn">					
                    <button id="modalTutorialYoutubeClose" type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <img src="/wp-content/uploads/page/close.png" alt="동영상 게시판 모달 닫힘 클릭" />
                    </button>
                </div>
                <div class="press_modal_box">
                    <div class="movie_modal_logo">
                        <img src="/wp-content/uploads/page/movie_logo.png" alt="arte365 영상" />
                    </div>
                    <div class="movie_modal_title" id="movieTitle"></div>
                    <div id="movieOutLink" class="movie_outlink"></div>
                    <div id="playYoutubeView" class="video_container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer();?>
<script>
jQuery(document).ready(function(e) {
	jQuery('img[usemap]').rwdImageMaps();
	
	jQuery('area').on('click', function() {
		alert($(this).attr('alt') + ' clicked');
	});
});
</script>

<script>
	new WOW().init();
</script>
</body>
</html>