<div id="kboard-default-document">

	<div class="reader_text">
			아르떼<span style="color:#ef0a25;font-weight:500;">[</span>365<span style="color:#ef0a25;font-weight:500;">]</span>는 독자분들의 이야기를 기다립니다.<br />
			<span class="reader_cap">나누고 싶은 이야기, 감상평을 공개글로 남겨주시면 추첨을 통해 소정의 상품을 드립니다. <br />
			독자에게 더욱 가깝게 다가가는 웹진이 되도록 노력하겠습니다.<br/><br/>
			
			게시물 내 개인정보는 기록하지 않도록 주의하여 주세요. <br/>
			상업성 광고, 저속한 표현, 특정인 및 단체에 대한 비방, 반복적 게시물은 통보 없이 삭제 됩니다.<br/>
			※ 이 외 아르떼365의 독자 게시판 서비스에 바람직하지 않다고 판단되는 경우 조치를 취할 수 있습니다.<br/>
			</span>
	</div>

	<div class="kboard-header"></div>
	
	<div class="kboard-document-wrap" itemscope itemtype="http://schema.org/Article">
		<div class="kboard-title" itemprop="name">
			<p><?php echo $content->title?></p>
		</div>
		
		<div class="kboard-detail">
			<?php if($content->category1):?>
			<div class="detail-attr detail-category1">
				<div class="detail-name"><?php echo $content->category1?></div>
			</div>
			<?php endif?>
			<?php if($content->category2):?>
			<div class="detail-attr detail-category2">
				<div class="detail-name"><?php echo $content->category2?></div>
			</div>
			<?php endif?>
			<div class="detail-attr detail-writer">
				<div class="detail-name"><?php echo __('Author', 'kboard')?></div>
				<div class="detail-value"><?php echo $content->member_display?></div>
			</div>
			<div class="detail-attr detail-date">
				<div class="detail-name"><?php echo __('Date', 'kboard')?></div>
				<div class="detail-value"><?php echo date('Y-m-d H:i', strtotime($content->date))?></div>
			</div>
			<div class="detail-attr detail-view">
				<div class="detail-name"><?php echo __('Views', 'kboard')?></div>
				<div class="detail-value"><?php echo $content->view?></div>
			</div>
		</div>
		
		<div class="kboard-content" itemprop="description">
			<div class="content-view">
				<?php echo $content->content?>
			</div>
		</div>
		
		<?php if(isset($content->attach->file1)):?>
		<div class="kboard-attach">
			<?php echo __('Attachment', 'kboard')?> : <a href="<?php echo $url->getDownloadURLWithAttach($content->uid, 'file1')?>"><?php echo $content->attach->file1[1]?></a>
		</div>
		<?php endif?>
		
		<?php if(isset($content->attach->file2)):?>
		<div class="kboard-attach">
			<?php echo __('Attachment', 'kboard')?> : <a href="<?php echo $url->getDownloadURLWithAttach($content->uid, 'file2')?>"><?php echo $content->attach->file2[1]?></a>
		</div>
		<?php endif?>
	</div>
	
	<?php if($board->isComment()):?>
	<div class="kboard-comments-area"><?php echo $board->buildComment($content->uid)?></div>
	<?php endif?>
	
	<!-- <div class="kboard-document-navi">
		<div class="kboard-prev-document">
			<?php
			$bottom_content_uid = $content->getPrevUID();
			if($bottom_content_uid):
			$bottom_content = new KBContent();
			$bottom_content->initWithUID($bottom_content_uid);
			?>
			<a href="<?php echo $url->getDocumentURLWithUID($bottom_content_uid)?>">
				<span class="navi-arrow">«</span>
				<span class="navi-document-title cut_strings"><?php echo $bottom_content->title?></span>
			</a>
			<?php endif?>
		</div>
		
		<div class="kboard-next-document">
			<?php
			$top_content_uid = $content->getNextUID();
			if($top_content_uid):
			$top_content = new KBContent();
			$top_content->initWithUID($top_content_uid);
			?>
			<a href="<?php echo $url->getDocumentURLWithUID($top_content_uid)?>">
				<span class="navi-document-title cut_strings"><?php echo $top_content->title?></span>
				<span class="navi-arrow">»</span>
			</a>
			<?php endif?>
		</div>
	</div> -->
	
	<div class="kboard-control">
		<div class="left">
			<a href="<?php echo $url->toString()?>" class="kboard-default-button-small"><?php echo __('목록보기', 'kboard')?></a>
			<?php if($board->isWriter() && !$content->notice):?><a href="<?php echo $url->set('parent_uid', $content->uid)->set('mod', 'editor')->toString()?>" class="kboard-default-button-small"><?php echo __('답글쓰기', 'kboard')?></a><?php endif?>
		</div>
		<?php if($board->isEditor($content->member_uid) || $board->permission_write=='all'):?>
		<div class="right">
			<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'editor')->toString()?>" class="kboard-default-button-small"><?php echo __('글수정', 'kboard')?></a>
			<a href="<?php echo $url->set('uid', $content->uid)->set('mod', 'remove')->toString()?>" class="kboard-default-button-small" onclick="return confirm('<?php echo __('삭제 하시겠습니까?', 'kboard')?>');"><?php echo __('글삭제', 'kboard')?></a>
		</div>
		<?php endif?>
	</div>
	
	<div class="kboard-default-poweredby">
		<a href="http://www.cosmosfarm.com/products/kboard" onclick="window.open(this.href);return false;" title="<?php echo __('KBoard is the best community software available for WordPress', 'kboard')?>">Powered by KBoard</a>
	</div>
</div>