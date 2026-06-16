<div class="arte365-newsletter postall_w newsletter_submit">
	<div class="unsubscribe">
		<p class="posttext">
			아래의 필수 정보를 입력한 후 그만 받기 버튼을 누르시면 뉴스레터 발송이 중단됩니다.<br>
			더 나은 아르떼365를 위해 노력하겠습니다. 감사합니다.
		</p>
	</div>
	
	<div class="post_box mt_50">
		<form id="arte365UnsubscribeForm" method="post">
			<input type="email" name="email" id="email" value="" placeholder="이메일주소를 입력해 주세요">
			<button type="submit" class="btn-submit">그만받기</button>
		</form>
	</div>
	<div class="result"></div>
	<div class="attention">
		<p>
			한국문화예술교육진흥원의 홈페이지를 통해 메일을 받는 분은<br>
			진흥원 홈페이지(<a href="http://www.arte.or.kr" target="_blank" class="txt-em" rel="noopener noreferrer">http://www.arte.or.kr</a>)의 회원 정보 변경 메뉴에서 수신 해제를 진행해 주시기 바랍니다.
		</p>
	</div>

	<!-- <div class="notice">
			<p>
				<i class="txt-em">*</i> 
				한국문화예술교육진흥원의 홈페이지를 통해 메일을 받는 분은<br>
	   			진흥원 홈페이지(<a href="http://www.arte.or.kr" target="_blank" class="txt-em">http://www.arte.or.kr</a>)의 회원 정보 변경 메뉴에서 수신 해제를 진행해 주시기 바랍니다.
			</p>
	</div> -->
</div>


<script>
	jQuery(function($){
		
		function checkEmail(email) {
			var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return pattern.test(email);
		}

		$('#arte365UnsubscribeForm').on('submit', function(e){
			e.preventDefault();
			var email = $('input[name="email"]', this).val();
			if ( checkEmail(email) == false) {
				alert('이메일 형식이 정확하지 않습니다.');
				$('input[name="email"]', this).focus();
				return false;
			}

			var params = {
				action: 'arte365_unsubscribe_newsletter',
				nonce: '<?php echo wp_create_nonce( "arte365-unsubscribe-newsletter" );?>',
				email: email

			}
			$.post('<?php echo admin_url('admin-ajax.php');?>', params, function(res){
				$('.arte365-newsletter .result').html(res);
				$('#arte365UnsubscribeForm')[0].reset();
			});
		})
	});
</script>