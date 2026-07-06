<?php get_header(); ?>
<?php
$error = '';
if ( isset( $_POST['d_email']) ) {
	$d_email = $_POST['d_email'];
	global $wpdb;
	$result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}easymail_subscribers WHERE email = '%s' ", $d_email ) );
	if ( $result ) {
		$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->prefix}easymail_subscribers WHERE email = '%s' ", $d_email ) );
?>
<script>
	alert('메일 수신 거부가 정상적으로 완료되었습니다.');
	window.location.href = '/';
</script>
<?php
		die();
	} else {
		$error = '뉴스레터에 등록된 이메일이 없습니다. 다시 확인해 주세요!';
	}
}
?>
<div class='container'>
    <div class='row'>


				

				<!-- post-entry -->
				<div class="post-entry w770 ">				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>						
						<div class="post-content page-unsubscribe-content page-static-content">
							<div class="text-center">
								<img src="<?php echo get_template_directory_uri(); ?>/img365/logo-black.png" alt="arte365" class="logo">
								<h3>아르떼<span class="fc-ec1439">365</span> 뉴스레터를 그만 받겠습니다.</h3>
								<p>아래의 필수 정보를 입력한 후 <span class="fc-ec1439">그만 받기 버튼</span>을 누르시면 뉴스레터 발송이 중단됩니다.<br>더 나은 아르떼365를 위해 노력하겠습니다. 감사합니다.</p>
							</div>
							<hr>
							<?php if ( $error != '') : ?>
							<p class="error red text-center"><?php echo $error; ?></p>
							<br>
							<?php endif; ?>
							<form name="unsubscribeForm" id="unsubscribeForm" action="" method="post" class="unsubscribe-form" onsubmit="unsubscribeNewsletter();">
								<div class="inputs pull-left">									
									<div class="input-block">
										<label for="d_email" class="input-label">이메일</label>
										<div class="input-controls">
											<input type="email" name="d_email" id="d_email" class="inactive">
										</div>
									</div>
								</div>
								<button class="btn btn-submit" id="btnUnsubscribe" type="submit">그만 받기</button><hr>
							</form>
							<div class="text-center">
							<h2><span style="color:#777777; font-size: 12px;">*한국문화예술교육진흥원의 홈페이지를 통해 메일을 받는 분은<br>진흥원 홈페이지<a href="http://www.arte.or.kr" target="_blank">(http://www.arte.or.kr)</a>의 회원 정보 변경 메뉴에서 수신 해제를 진행해 주시기 바랍니다.</span></h2>
							</div>
							<div class="clear"></div>
						</div>
											
					</article>
				</div><!-- post-entry -->









    </div>
</div>

<?php get_footer(); ?>