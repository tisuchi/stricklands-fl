
CKEDITOR_BASEPATH  =  base_url +  "admin_assets/plugins/form-ckeditor/";	

var listmsg_limitlength = 25;

$(document).ready(function(){
	_page_init();
	//_showEmailList(pagedata);
//   $(function(){
// 	  $(".mailbox-msg-list-item .msg").each(function(i){
// 	    len=$(this).text().length;
// 	    if(len>listmsg_limitlength)
// 	    {
// 	      $(this).text($(this).text().substr(0,listmsg_limitlength)+'...');
// 	    }
// 	  });       
// 	});
})



function _page_init(){
	$("#e12").select2({width: "100%", tags:pagedata.email_to_arr});
}


// function _showEmailList(data){
// 	var emails = data.sent_emails;
// 	$('.mailbox-msg-list').html('');
// 	for (var i = emails.length - 1; i >= 0; i--) {
// 		var str = '<li onclick="selEmailItem(this)" data="'+emails[i].email_id+'">'+
// 		              	'<a href="#" class="mailbox-msg-list-item">'+
// 		                '<span class="time">'+emails[i].email_add_date+'</span>'+
// 		                '<div>'+
// 		                	'<span class="name">'+emails[i].email_subject+'</span>'+
// 		                	'<span class="msg">'+emails[i].email_content+'</span>'+
// 	                	'</div>'+
// 		              '</a>'+
// 		            '</li>';
// 		$('.mailbox-msg-list').append(str);            
// 	}
// }

// function selEmailItem(obj){
// 	$('.mailbox-msg-list-item').removeClass('sel-email-item-row');
// 	$(obj).find('a').eq(0).addClass('sel-email-item-row');

// 	$('#btn_send_email').attr('style','display:none;');
// 	$('#btn_new_email').attr('style','display:block;');

// 	var email_id = $(obj).attr('data');
// 	$.ajax({
//       type: 'post'
//       ,dataType: 'json'
//       , async: true
//       , url: rootpath+'Admin/CRMCtrl/getSelEmailInfo'
//       ,data: 'email_id='+email_id
//       , success: function(json) {
//         if(json.status == 'success'){
//         	var emailinfo = json.email_info;
//         	_showSelEmailInfo(emailinfo);
//           	wippyShowMessage('Successfully.','success');
//         }else{
//           wippyShowMessage('Faild.','warning');
//         }
        
//         }
//       , error: function(data, status, err) {
//         wippyShowMessage('Faild.','error');
//       },
//       complete: function() {
        
//       }
//     });
// }

// function _showSelEmailInfo(emailinfo){
// 	$('#dv_msg_main_content').html(emailinfo.email_content);
// 	$('#txt_email_subject').val(emailinfo.email_subject);
// 	$('#txt_email_from').html(emailinfo.email_from);
// 	$('.select2-choices').empty();
// 	var emailstr = '<li class="select2-search-choice">'+
// 						'<div>'+emailinfo.email_to+'</div>'+
// 						'<a href="#" onclick="return false;" class="select2-search-choice-close" tabindex="-1"></a>'+
// 					'</li>';
// 	$('.select2-choices').prepend(emailstr);
// }	


$('#btn_send_email').on('click',function(){
	var email_content = $('#dv_msg_main_content').html();
	var email_subject = $('#txt_email_subject').val();
	var email_to = $('#e12').val();
	var email_from = $('#txt_email_from').html();

	if(email_from == ''){
		vbShowMessage('Your Email address is invalid.','warning');
		return;
	}
	if(email_to == ''){
		vbShowMessage('Please input email address.','warning');
		return;
	}
	if(email_subject == ''){
		vbShowMessage('Please input email subject.','warning');
		return;	
	}
	if(email_content == ''){
		vbShowMessage('Please input email contents.','warning');
		return;
	}

	$.ajax({
      type: 'post'
      ,dataType: 'json'
      , async: true
      , url: base_url+'admin/sendEmail'
      ,data: 'email_content='+email_content+'&email_subject='+email_subject + '&email_to='+email_to + '&email_from='+email_from
      , success: function(json) {
        if(json.status == 'success'){
          vbShowMessage(json.msg,'success');
          window.location.href = base_url + 'admin/email';	  
        }else{
          vbShowMessage('Faild.','warning');
        }
        
			}
      , error: function(data, status, err) {
        vbShowMessage('Email Sending Faild.','error');
      },
      complete: function() {
        
      }
    });
	
});

$('#btn_new_email').on('click', function(){
	window.location.href = base_url + 'admin/email';
});


