<?php if ( !have_comments() && !comments_open()) 
	return; 
?>

<div class='comments-wrapper' style="width:1000px;margin:0 auto">
	<?php if ( post_password_required() ) : ?>
			<p><?php _ex( 'This post is password protected. Enter the password to view any comments ','single', 'SnoopyIndustries' ); ?></p>
		</div>

		<?php

		return;
	endif;?>


	

	<?php if ( have_comments() ) : ?>
			<div class='comments-number'><?php echo get_comments_number(); ?> <?php _e('Comments','SnoopyIndustries') ?></div>
			<ul class='comment-list'>
				<?php wp_list_comments( array( 'callback' => 'si_custom_comments' , 'avatar_size'=>'77','style'=>'ul'));?>
			</ul>
			<div class="pagination-wrap full-width-container text-center transition-effect-childs">
				<?php paginate_comments_links(); ?>
			</div>

	<?php endif; ?>

	<?php if (comments_open()) : ?>
		<div class='comment-form'>
			<div class="comment-form-header">
				<h3><?php _e('댓글 남기기','arte365') ?></h3>
				<div class="msg">
					이메일은 공개되지 않습니다. <!-- <br/>로그인을 해야 댓글을 작성하실 수 있습니다. -->
				</div>
					<?php
					$args = array(
						'fields' => apply_filters( 'comment_form_default_fields', array(
							'author' => '<div class="input-block author"><label for="" class="n1"><span>*</span><br />이 름</label><input id="author" placeholder="'.esc_attr_x('작성자','comment form','SnoopyIndustries').'" class="comment-input" name="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" aria-required="true"></div>',
							'email' => '<div class="input-block email"><label for="" class="n2"><span>*</span><br />이메일</label><input id="email" placeholder="'.esc_attr_x('이메일','comment form','SnoopyIndustries').'" class="comment-input" name="email" type="text" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" aria-required="true"></div>',
							'url' => '<div class="url input-block"><label for="website" class="n3"><span>&nbsp;</span><br />웹사이트</label><input id="url" placeholder="'.esc_attr_x('웹사이트','comment form','SnoopyIndustries').'" class="comment-input comment-url" name="url" type="text" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '"></div>',
							'password' => '<div class="input-block author password"><label class="n3"><span>&nbsp;</span><br />비밀번호</label><input id="password" minlength="4" maxlength="4" placeholder="'.esc_attr_x('수정·삭제를 위한 비밀번호 숫자 4자리','comment form','SnoopyIndustries').'" class="comment-input comment-password number-only" name="password" type="password" value="" aria-required="true"></div>',
							)
						),
						'comment_notes_after' => '',
						'comment_notes_before' => '',
						'title_reply' => '',
						'comment_field' => '<div class="input-block comment"><textarea name="comment" cols="40" rows="10" class="comment-input n3" placeholder="'.esc_attr_x('','comment form','SnoopyIndustries').'"></textarea></div>',
						'label_submit' => _x('댓글 남기기','comment form','SnoopyIndustries')
					);
					comment_form( $args );
					?>
			</div>
			
		</div>
	<?php endif; ?>
</div>