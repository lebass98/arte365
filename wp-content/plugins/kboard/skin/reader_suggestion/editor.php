<div id="kboard-default-editor">
	<form method="post" action="<?php echo $url->getContentEditorExecute()?>" enctype="multipart/form-data" onsubmit="return kboard_editor_execute(this);">
		<?php wp_nonce_field('kboard-editor-execute', 'kboard-editor-execute-nonce');?>
		<input type="hidden" name="action" value="kboard_editor_execute">
		<input type="hidden" name="mod" value="editor">
		<input type="hidden" name="uid" value="<?php echo $content->uid?>">
		<input type="hidden" name="board_id" value="<?php echo $content->board_id?>">
		<input type="hidden" name="parent_uid" value="<?php echo $content->parent_uid?>">
		<input type="hidden" name="member_uid" value="<?php echo $content->member_uid?>">
		<input type="hidden" name="member_display" value="<?php echo $content->member_display?>">
		<input type="hidden" name="date" value="<?php echo $content->date?>">
		
		<div class="kboard-header"></div>

		<?php if($board->use_category):?>
			<?php if($board->initCategory1()):?>
			<div class="kboard-attr-row">
				<label class="attr-name"><?php echo __('구분', 'kboard')?><span> *</span></label>
				<div class="attr-value">
					<select name="category1">
						<option value=""><?php echo __('선택', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if($content->category1 == $board->currentCategory()):?> selected="selected"<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				</div>
			</div>
			<?php endif?>
		
		<div class="kboard-attr-row kboard-attr-title">
			<label class="attr-name"><?php echo __('제목')?><span> *</span></label>
			<div class="attr-value"><input type="text" name="title" value="<?php echo $content->title?>"></div>
		</div>
		
		
			
			<?php if($board->initCategory2()):?>
			<div class="kboard-attr-row">
				<label class="attr-name"><?php echo __('Category', 'kboard')?>2</label>
				<div class="attr-value">
					<select name="category2">
						<option value=""><?php echo __('Select', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if($content->category2 == $board->currentCategory()):?> selected="selected"<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				</div>
			</div>
			<?php endif?>
		<?php endif?>
		
		
		
		
		<?php if(!is_user_logged_in()):?>
		<div class="kboard-attr-row i80">
			<label class="attr-name"><?php echo __('작성자', 'kboard')?><span> *</span></label>
			<div class="attr-value"><input type="text" name="member_display" value="<?php echo $content->member_display?>"></div>
		</div>
		<?php endif?>

		<div class="kboard-attr-row i80">
			<label class="attr-name"><?php echo __('이메일', 'kboard')?><span> *</span></label>
			<div class="attr-value"><input type="text" name="kboard_option_email" value=""></div>
		</div>

		

		<div class="kboard-attr-row i80">
			<label class="attr-name"><?php echo __('휴대폰', 'kboard')?><span> </span></label>
			<div class="attr-value">
				<input type="text" name="kboard_option_phone" value="<?php echo $content->option->phone?>">
				<p class="i80_txt">아이템 제안, 이벤트 참여시 반드시 휴대폰 번호를 남겨주세요.</p>
			</div>
		</div>

<!-- 		<div class="kboard-attr-row i80 secret_raio">
			<label class="attr-name"><?php echo __('비밀글 설정', 'kboard')?></label>
			<div class="attr-value">
		
		  <input type="radio" id="male" name="gender" value="<?php echo $content->option->{'secret_editor'}?>">
		  <label for="male">공개</label>
		  <input type="radio" id="female" name="gender" value="<?php echo $content->option->{'secret_editor'}?>">
		  <label for="female">비공개</label><br>
						
			</div>
		</div>
		
		<div class="kboard-attr-row i80">
			<label class="attr-name"<?php echo __('비밀글', 'kboard')?></label>
			<div class="attr-value"><input type="checkbox" name="secret" value="true"<?php if($content->secret):?> checked<?php endif?>>1</div>
		</div>
		 -->

		<div class="kboard-attr-row">
			<label class="attr-name"><?php echo __('비밀글', 'kboard')?></label>
			<div class="attr-value">
				 <!-- 2021/06/24 아래 라디오 버튼으로 변경 <input type="checkbox" name="secret" value="true"<?php if($content->secret):?> checked<?php endif?>>-->
				 <input type="radio" name="secret" value="" >공개 &nbsp; &nbsp; &nbsp;&nbsp;
				  <input type="radio" name="secret" value="true" <?php if($content->secret):?> checked<?php endif?>> 비공개
                  
               
			</div>
		</div>
        <?php if(current_user_can('manage_options')) { ?>
            <div class="kboard-attr-row">
                <label class="attr-name"><?php echo __('공지사항', 'kboard')?></label>
                <div class="attr-value">
                    <label>
                        <input type="checkbox" name="notice" value="true" <?php if($content->notice):?> checked<?php endif?>>선택 &nbsp; &nbsp; &nbsp;&nbsp;
                    </label>
                </div>
            </div>
        <?php } ?>
		<?php if(!is_user_logged_in()):?>
		<div class="kboard-attr-row i80">
			<label class="attr-name"><?php echo __('비밀번호', 'kboard')?><span> *</span></label>
			<div class="attr-value"><input type="password" name="password" value="<?php echo $content->password?>"></div>
		</div>
		<div class="kboard-attr-row i80">
			<label class="attr-name">자동입력 방지문자<!-- <img src="<?php echo kboard_captcha()?>" alt=""> --><span> *</span></label>
			<div class="attr-value"><img src="<?php echo kboard_captcha()?>" alt="" width="60px">&nbsp;&nbsp;&nbsp;<input type="text" name="captcha" value="" style="padding-right:20px;"><p class="i80_txt">빨간색 글자가 보이는 대로 입력해주세요.</p></div>
		</div>
		<?php endif?>
		
		
		<div class="kboard-content kboard-attr-row i80">
			<label class="attr-name"><?php echo __('내용', 'kboard')?></label>
			 <?php if($board->use_editor == "yes" && ARTE365_DEVICE_CODE == 'd'):?>
			 	<?php wp_editor($content->content, 'kboard_content'); ?>
			 <?php elseif($board->use_editor == "smart"  && ARTE365_DEVICE_CODE == 'd'):?>
			 <textarea name="kboard_content" id="kboard_content"><?php echo $content->content?></textarea>
			 
			 <script type="text/javascript" src="<?php echo plugins_url('../../smarteditor/js/HuskyEZCreator.js', __FILE__)?>" charset="utf-8"></script>
			 <script type="text/javascript">
			 var oEditors = [];
			 nhn.husky.EZCreator.createInIFrame({
			 oAppRef: oEditors,
			 elPlaceHolder: "kboard_content",
			 sSkinURI: "<?php echo plugins_url('../../smarteditor/SmartEditor2Skin.html', __FILE__)?>",
			 fCreator: "createSEditor2"
			 });
			 </script>
			 <?php else:?>
			 <textarea name="kboard_content" id="kboard_content"><?php echo $content->content?></textarea>
			 <?php endif?>
		</div>
		
		<!-- <div class="kboard-attr-row">
			<label class="attr-name"><?php echo __('Thumbnail', 'kboard')?></label>
			<div class="attr-value">
				<?php if($content->thumbnail_file):?><?php echo $content->thumbnail_name?> - <a href="<?php echo $url->getDeleteURLWithAttach($content->uid);?>" onclick="return confirm('<?php echo __('Are you sure you want to delete?', 'kboard')?>');"><?php echo __('Delete file', 'kboard')?></a><?php endif?>
				<input type="file" name="thumbnail">
			</div>
		</div> -->
		
		<div class="kboard-attr-row">
			<label class="attr-name"><?php echo __('첨부파일', 'kboard')?></label>
			<div class="attr-value">
				<?php if(isset($content->attach->file1)):?><?php echo $content->attach->file1[1]?> - <a href="<?php echo $url->getDeleteURLWithAttach($content->uid, 'file1');?>" onclick="return confirm('<?php echo __('Are you sure you want to delete?', 'kboard')?>');"><?php echo __('Delete file', 'kboard')?></a><?php endif?>
				<input type="file" name="kboard_attach_file1">
			</div>
		</div>
		<div class="kboard-attr-row">
			<label class="attr-name"><?php echo __('첨부파일', 'kboard')?></label>
			<div class="attr-value">
				<?php if(isset($content->attach->file2)):?><?php echo $content->attach->file2[1]?> - <a href="<?php echo $url->getDeleteURLWithAttach($content->uid, 'file2');?>" onclick="return confirm('<?php echo __('Are you sure you want to delete?', 'kboard')?>');"><?php echo __('Delete file', 'kboard')?></a><?php endif?>
				<input type="file" name="kboard_attach_file2">
			</div>
		</div>
		
		<!-- <div class="kboard-attr-row">
			<label class="attr-name"><?php echo __('WP Search', 'kboard')?></label>
			<div class="attr-value">
				<select name="wordpress_search">
					<option value="1"<?php if($content->search == '1'):?> selected<?php endif?>><?php echo __('Public', 'kboard')?></option>
					<option value="2"<?php if($content->search == '2'):?> selected<?php endif?>><?php echo __('Only title (secret document)', 'kboard')?></option>
					<option value="3"<?php if($content->search == '3'):?> selected<?php endif?>><?php echo __('Exclusion', 'kboard')?></option>
				</select>
			</div>
		</div> -->
		
		<div class="kboard-control">
			<div class="left">
				<?php if($content->uid):?>
				<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toString()?>" class="kboard-default-button-small"><?php echo __('돌아가기', 'kboard')?></a>
				<a href="<?php echo $url->toString()?>" class="kboard-default-button-small"><?php echo __('리스트', 'kboard')?></a>
				<?php else:?>
				<a href="<?php echo $url->toString()?>" class="kboard-default-button-small"><?php echo __('돌아가기', 'kboard')?></a>
				<?php endif?>
			</div>
			<div class="right">
				<?php if($board->isWriter()):?>
				<button type="submit" class="kboard-default-button-small"><?php echo __('작성하기', 'kboard')?></button>
				<?php endif?>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
var kboard_localize = {
	please_enter_a_title:'<?php echo __('Please enter a title.', 'kboard')?>',
	please_enter_a_author:'<?php echo __('Please enter a author.', 'kboard')?>',
	please_enter_a_password:'<?php echo __('Please enter a password.', 'kboard')?>',
	please_enter_the_CAPTCHA_code:'<?php echo __('Please enter the CAPTCHA code.', 'kboard')?>'
}

</script>
<script type="text/javascript" src="<?php echo $skin_path?>/script.js"></script>