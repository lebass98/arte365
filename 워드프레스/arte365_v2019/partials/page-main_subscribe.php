<div class="arte365-newsletter">
	<div class="ban_link">
		<div>
			<h3>아르떼[365] 뉴스레터 신청</h3>
			<p>정기적으로 아르떼[365]의 새로운 기사를 받아보세요.</p>
			<form id="arte365SubscribeForm" method="post">
				<!-- <input type="email" name="email" id="email" value="" placeholder="이메일 주소를 입력해 주세요."> -->
				<!-- <button type="submit" class="btn-submit">구독하기</button> -->
				<a href="/?page_id=39807" class="btn-submit">구독하기</a>
			</form>
        </div>
        <div class="flex_box">
            <div onclick="location.href='/?cat=4259'" style="cursor:pointer">
                <p class="tit">뉴스레터 보기</p>
                <p class="con">
                    이전에 발행된 뉴스레터를<br/>일자별로 확인하실 수 있습니다.
                </p>
            </div>
            <div onclick="location.href='/?p=113154'" style="cursor:pointer">
                <p class="tit">상시 댓글 이벤트</p>
                <p class="con">
                기사에 댓글로 감상평을 남겨주세요.<br/>추첨을 통해 상품을 드립니다.
                </p>
            </div>
        </div>
		<div onclick="location.href='/?page_id=20289'" style="cursor:pointer">
			<p class="tit">아르떼365 소개</p>
			<p class="con">
				우리 삶과 함께하는 문화예술교육 현장 곳곳을 전하고, 다양한 목소리를 들을 수 있는 촉매제로서의 웹진이 되겠습니다.
			</p>
        </div>
	</div>
</div>


<script>
	jQuery(function($){
		
		function checkEmail(email) {
			var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return pattern.test(email);
		}

		$('#arte365SubscribeForm').on('submit', function(e){
			e.preventDefault();
			var email = $('input[name="email"]', this).val();
			if ( checkEmail(email) == false) {
				alert('이메일 형식이 정확하지 않습니다.');
				$('input[name="email"]', this).focus();
				return false;
			}

			var params = {
				action: 'arte365_subscribe_newsletter',
				nonce: '<?php echo wp_create_nonce( "arte365-subscribe-newsletter" );?>',
				email: email

			}
			$.post('<?php echo admin_url('admin-ajax.php');?>', params, function(res){
				$('.arte365-newsletter .result').html(res);
				$('#arte365SubscribeForm')[0].reset();

				 jQuery('body').css('overflow', 'hidden');
               			 jQuery('body').css('overflow', 'hidden');
                		 jQuery('.news-bg').addClass('on');
                		 jQuery(".newsletter_popup").toggleClass('on');
                		 if(jQuery(this).hasClass('on')){
                		     jQuery(".newsletter_popup").removeClass('on');
                		 }else{
                		     jQuery(".newsletter_popup").addClass('on');
                		 }
			});
		})
	});
</script>