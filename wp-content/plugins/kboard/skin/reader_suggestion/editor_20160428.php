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
						<option value=""><?php echo __('Select', 'kboard')?></option>
						<?php while($board->hasNextCategory()):?>
						<option value="<?php echo $board->currentCategory()?>"<?php if($content->category1 == $board->currentCategory()):?> selected="selected"<?php endif?>><?php echo $board->currentCategory()?></option>
						<?php endwhile?>
					</select>
				</div>
			</div>
			<?php endif?>
		
		<div class="kboard-attr-row kboard-attr-title">
			<label class="attr-name"><?php echo __('Title')?><span> *</span></label>
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
		
		<div class="kboard-attr-row secret">
			<label class="attr-name"><?php echo __('Secret', 'kboard')?></label>
			<!-- <div class="attr-value"><input type="checkbox" name="secret" value="true"<?php if($content->secret):?> checked<?php endif?>></div> -->
			<div class="attr-value"><input type="checkbox" name="secret" value="true" checked onclick="return false;"></div>
		</div>
		
		
		<?php if(!is_user_logged_in()):?>
		<div class="kboard-attr-row i80">
			<label class="attr-name"><?php echo __('Author', 'kboard')?><span> *</span></label>
			<div class="attr-value"><input type="text" name="member_display" value="<?php echo $content->member_display?>"></div>
		</div>
		<?php endif?>

		<div class="kboard-attr-row i80">
			<label class="attr-name"><?php echo __('이메일', 'kboard')?><span> *</span></label>
			<div class="attr-value"><input type="text" name="kboard_option_email" value="<?php echo $content->option->email?>"></div>
		</div>

		

		<div class="kboard-attr-row i80">
			<label class="attr-name"><?php echo __('연락처', 'kboard')?><span> </span></label>
			<div class="attr-value"><input type="text" name="kboard_option_phone" value="<?php echo $content->option->phone?>">
			<p class="i80_txt">아이템 제안, 이벤트 참여시 반드시 연락처를 남겨주세요.</p>
			</div>
		</div>

		<?php if(!is_user_logged_in()):?>
		<div class="kboard-attr-row i80">
			<label class="attr-name"><?php echo __('Password', 'kboard')?><span> *</span></label>
			<div class="attr-value"><input type="password" name="password" value="<?php echo $content->password?>"><p>독자게시판은 비공개 게시판으로 운영됩니다.</p></div>
		</div>

		
		<div class="kboard-attr-row i80">
			<label class="attr-name"><img src="<?php echo kboard_captcha()?>" alt=""><span> *</span></label>
			<div class="attr-value"><input type="text" name="captcha" value=""></div>
		</div>
		<?php endif?>
		
		
		<div class="kboard-content">
		 <?php if($board->use_editor == "yes"):?>
		 <?php wp_editor($content->content, 'kboard_content'); ?>
		 <?php elseif($board->use_editor == "smart"):?>
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
			<label class="attr-name"><?php echo __('Attachment', 'kboard')?></label>
			<div class="attr-value">
				<?php if(isset($content->attach->file1)):?><?php echo $content->attach->file1[1]?> - <a href="<?php echo $url->getDeleteURLWithAttach($content->uid, 'file1');?>" onclick="return confirm('<?php echo __('Are you sure you want to delete?', 'kboard')?>');"><?php echo __('Delete file', 'kboard')?></a><?php endif?>
				<input type="file" name="kboard_attach_file1">
			</div>
		</div>
		<div class="kboard-attr-row">
			<label class="attr-name"><?php echo __('Attachment', 'kboard')?></label>
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
		<div class="kboard-info">
			<div>
			<p>제안/제보 해주신 내용이 아르떼365에서 다루어질 경우 이메일 또는 전화로 연락을 드립니다.</p>
				<ul>
					<li>콘텐츠의 사용권은 한국문화예술교육진흥원에 있으며, 콘텐츠에 대한 저작권은 창작자에게 있습니다.</li>
			 		<li>한국문화예술교육진흥원은 기관 방침에 따라 모든 콘텐츠에 CCL(Creative Commons Licence)을 적용하고 있음을 알려드립니다. <br>(CC: BY-NC-ND "저작자와 출처 등을 표시하면 자유이용을 허락합니다. 단 영리적 이용과 2차적 저작물의 작성은 허용되지 않습니다.")</li>
				</ul>
			</div>
		</div>
		<div class="kboard-control">
			<div class="left">
				<?php if($content->uid):?>
				<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'document')->toString()?>" class="kboard-default-button-small"><?php echo __('Back', 'kboard')?></a>
				<a href="<?php echo $url->toString()?>" class="kboard-default-button-small"><?php echo __('List', 'kboard')?></a>
				<?php else:?>
				<a href="<?php echo $url->toString()?>" class="kboard-default-button-small"><?php echo __('Back', 'kboard')?></a>
				<?php endif?>
			</div>
			<div class="right">
				<?php if($board->isWriter()):?>
				<button type="submit" class="kboard-default-button-small"><?php echo __('Save', 'kboard')?></button>
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