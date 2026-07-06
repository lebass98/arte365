/**
 * @author http://www.cosmosfarm.com/
 */

var console = window.console || { log: function() {} };

function kboard_editor_execute(form){
	jQuery.fn.exists = function(){
		return this.length>0;
	};

	if(!jQuery('select[name=category1]', form).val()){
		alert('구분을 선택해주세요');
		jQuery('select[name=category1]', form).focus();
		return false;
	
	}
	
	if(!jQuery('input[name=title]', form).val()){
		alert(kboard_localize.please_enter_a_title);
		jQuery('input[name=title]', form).focus();
		return false;
	}
	else if(jQuery('input[name=member_display]', form).eq(1).exists() && !jQuery('input[name=member_display]', form).eq(1).val()){
		alert(kboard_localize.please_enter_a_author);
		jQuery('[name=member_display]', form).eq(1).focus();
		return false;
	}
	if(!jQuery('input[name=kboard_option_email]', form).val()){
		alert('이메일을 입력해주세요');
		jQuery('input[name=kboard_option_email]', form).focus();
		return false;
	
	}
	if(jQuery('input[name=password]', form).exists() && !jQuery('input[name=password]', form).val()){
		alert(kboard_localize.please_enter_a_password);
		jQuery('input[name=password]', form).focus();
		return false;
	}
	
	if(jQuery('input[name=captcha]', form).exists() && !jQuery('input[name=captcha]', form).val()){
		alert(kboard_localize.please_enter_the_CAPTCHA_code);
		jQuery('input[name=captcha]', form).focus();
		return false;
	}

	// 에디터의 내용이 textarea에 적용된다.
	//oEditors.getById["kboard_content"].exec("UPDATE_CONTENTS_FIELD", []);
	
	return true;
}