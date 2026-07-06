
<div id="kboard-default-editor">
	<form method="post" action="<?php echo $url->set('mod', $_GET['mod'])->set('uid', $_GET['uid'])->toString()?>">
		<div class="kboard-header"></div>
		
		<div class="kboard-attr-row kboard-attr-title">
			<label class="attr-name"><?php echo __('비밀번호', 'kboard')?></label>
			<div class="attr-value"><input type="password" name="password"></div>
			<div id="confirm_info">작성하신 비밀번호로 입력해주세요.</div>
			<div id="password_txt"></div>
		</div>
		
		<div class="kboard-control">
			<div class="left">
				<?php if($content->uid):?>
				<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toString()?>" class="kboard-default-button-small"><?php echo __('본문보기', 'kboard')?></a>
				<?php endif?>
				<a href="<?php echo $url->toString()?>" class="kboard-default-button-small"><?php echo __('목록보기', 'kboard')?></a>
			</div>
			<div class="right">
				<button type="submit" class="kboard-default-button-small"><?php echo __('확인', 'kboard')?></button>
			</div>
		</div>
	</form>
</div>