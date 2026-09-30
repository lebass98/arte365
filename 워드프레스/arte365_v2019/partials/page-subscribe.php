
<div class="arte365-newsletter postall_w newsletter_submit newBg">
	<div class="tit">뉴스레터 신청하기</div>
	<div class="sub_tit">정기적으로 아르떼365 새로운 기사를 받아 보세요.</div>
	<p class="posttext">아르떼365 뉴스레터를 구독하시면 문화예술교육 안팎의 흐름과 경향, 문화예술(교육) 종사자에게<br/>유용한 정보를 담아 매주 화요일 여러분의 메일함으로 배달합니다. </p>

	<div class="agreement-container">
		<h5>○ (근거조항) 「개인정보 보호법」 제15조 1항</h5>
		<div class="agreement-box">
			<dl>
				<dd><em>①</em>개인정보처리자는 다음 각 호의 어느 하나에 해당하는 경우에는 개인정보를 수집할 수 있으며, 그 수집 목적의 범위에서 
    이용할 수 있다.</dd>
		    <dt><em>1.</em>정보주체의 동의를 받은 경우</dt>
			</dl>
		</div>
		
		<h5>○ 개인정보 수집·이용 동의(필수)</h5>
		<div class="agreement-table-box">
			<table>
				<thead>
					<tr>
						<th>항목</th>
						<th>수집·이용 목적</th>
						<th>보유·이용 기간</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>전자우편(이메일 주소)</td>
						<td>아르떼365 뉴스레터 발송</td>
						<td style="color:#1a66ac; font-weight: 600;">구독 해지 시까지 보관 후 즉시 파기</td>
					</tr>
				</tbody>
			</table>
			<p class="agreement-table-box-text">
				<em>※</em>이용자는 개인정보 수집에 동의를 거부할 권리가 있으며, 동의를 거부할 경우에는 서비스 이용에 제한됨을 알려드립니다.
			</p>
			<p class="agreement-table-box-text">
				<em>※</em>자세한 사항은 한국문화예술교육진흥원 개인정보처리방침을 참고하여 주시기 바랍니다.<a href="https://www.arte.or.kr/disclosure/data/Data_BoardView.do?board_id=BRD_ID0066459" target="_blank">(바로가기)</a>
			</p>
		</div>
		<div class="agreement-box">
			<div class="agreement-radio-box">
				<span>필수항목 개인정보를 수집·이용하는데 동의하십니까?</span>
				<br/>
				<label>
					<input type="radio" name="agreement" id="disagree" value="no" checked /> 미동의
				</label>
				<label>
					<input type="radio" name="agreement" id="agree" value="yes" /> 동의
				</label>
			</div>
		</div>
	</div>
	<div class="post_box mt_50">
		<form id="arte365SubscribeForm" method="post">
			<!-- <input type="email" name="email" id="email" value="" placeholder="이메일주소를 입력해 주세요" title="이메일 주소 텍스트 입력 "> -->
			<input type="email" name="email" id="email" value="" placeholder="이메일주소를 입력해 주세요" title="이메일 주소 텍스트 입력 "  readonly />
			<button type="text" class="btn-submit" id="btn-submit" title="이메일 주소 신청하기 버튼 클릭">신청하기</button>
		</form>
	</div>
	<div class="result"></div>
	<!-- <ul class="ban_link">
		<li onclick="location.href='/?cat=4259'" style="cursor:pointer">
			<p class="tit">뉴스레터보기</p>
			<p class="con">
				이전에 발행된 뉴스레터를<br/>일자별로 확인하실 수 있습니다
			</p>
		</li>
		<li onclick="location.href='/?page_id=51291'" style="cursor:pointer">
			<p class="tit">독자게시판</p>
			<p class="con">
				독자 여러분의 이야기를 기다립니다.<br/>아르떼365는 여러분과 함께 만들어가는 공간입니다.
			</p>
		</li>
	</ul> -->

	<div class="arte365-newsletter mobile_news">
		<ul class="ban_link">
			<li onclick="location.href='/?cat=4259'" style="cursor:pointer">
				<p class="title">뉴스레터 보기</p>
				<p class="con">
					이전에 발행된 뉴스레터를<br>일자별로 확인하실 수 있습니다.
				</p>
			</li>
			<li onclick="location.href='/?page_id=51291'" style="cursor:pointer">
				<p class="title">독자게시판</p>
				<p class="con">
					독자 여러분의 이야기를 기다립니다.<br>아르떼365는 여러분과 함께 만들어가는 공간입니다.
				</p>
			</li>
		</ul>
	</div>
</div>


<script>
	jQuery(function($){

		$('.arte365-newsletter').parent().parent().parent().prev().children().css('display','none');
		$('.arte365-newsletter.newBg').parent().parent().parent().parent().addClass("newsletter");

		
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

<script>
  const agreeRadio = document.getElementById('agree');
  const disagreeRadio = document.getElementById('disagree');
  const emailInput = document.getElementById('email');
  const buttonSubmit = document.getElementById('btn-submit');

  // 동의 라디오 버튼 클릭 시
  agreeRadio.addEventListener('change', function () {
    if (this.checked) {
      emailInput.removeAttribute('readonly');
      buttonSubmit.removeAttribute('disabled');
      buttonSubmit.setAttribute('type', 'submit'); // type 변경
    }
  });

  // 미동의 라디오 버튼 클릭 시
  disagreeRadio.addEventListener('change', function () {
    if (this.checked) {
      emailInput.setAttribute('readonly', true);
      buttonSubmit.setAttribute('disabled', true);
      buttonSubmit.setAttribute('type', 'text'); // type 변경
    }
  });
</script>
