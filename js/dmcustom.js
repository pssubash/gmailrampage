/**
 * 
 */
$(document).ready(function (){
	
	$('.cls_msg_templates').hide();
	/*
	 * Unsubscribe
	 */
	if ($('#chk_unsublink').is(':checked')) {
		$('#chk_unsublink_span').show();
	}else{
		$('#chk_unsublink_span').hide();
	}
	
	$('#chk_unsublink').click(function (){
		if ($('#chk_unsublink').is(':checked')) {
			$('#chk_unsublink_span').show();
		}else{
			$('#chk_unsublink_span').hide();
		}
	});
	
	
	/*
	 * Email existenace
	 */
	if ($('#chk_emailexists').is(':checked')) {
		
		$('.cls_chk_emailexists').show();
	}else{
		
		$('.cls_chk_emailexists').hide();
	}
	
	$('#chk_emailexists').click(function (){
		if ($('#chk_emailexists').is(':checked')) {
			
			$('.cls_chk_emailexists').show();
		}else{
			
			$('.cls_chk_emailexists').hide();
		}
	});
	
	/*
	 * External SMTP
	 */
	if ($('#chk_smtp').is(':checked')) {
		
		$('.cls_chk_smtp').show();
	}else{
		
		$('.cls_chk_smtp').hide();
	}
	
	$('#chk_smtp').click(function (){
		if ($('#chk_smtp').is(':checked')) {
			
			$('.cls_chk_smtp').show();
		}else{
			
			$('.cls_chk_smtp').hide();
		}
	});
	
	/*
	 * Load Meassgaes from template
	 */
	$("#is_load_template").click(function (){
		if ($('#is_load_template').is(':checked')) {
			
			$('.cls_msg_templates').show();
		}else{
			
			$('.cls_msg_templates').hide();
		}
	});
	
	
	$(".msgtemplate").click(function () {
		//console.log($(this).val());
		queryString = "id="+$(this).val();
		$.ajax({
            url : "aj_msgtemplate.php",
            type : "post",
            
            dataType :'json',
              data : queryString,
            success:function (data){
            	$("#usermessage").val(data.template);
            	$("#subject").val(data.title);
            	if(data.msgtype == 'html') {
            		$("#contenttype_html").attr("checked",true);
            	}else {
            		$("#contenttype_plain").attr("checked",true);
            	}
     
            }
    });
	});
	/*
	 * CAN SPAN complaint
	 * 
	 */
	/*
	 * Email existenace
	 */
	if ($('#chk_cancomplaint').is(':checked')) {
		
		$('.cls_can_complaint').show();
	}else{
		
		$('.cls_can_complaint').hide();
	}
	
	$('#chk_cancomplaint').click(function (){
		if ($('#chk_cancomplaint').is(':checked')) {
			
			$('.cls_can_complaint').show();
		}else{
			
			$('.cls_can_complaint').hide();
		}
	});
	
	/*
	 * List manipulation
	 * 
	 */
	var  listtype = $('input:radio[name=chk_listtype]:checked').val();
	switch (listtype) {
		case 'existing' :
			$(".newfile").hide ();
			$(".fromlist").hide ();
			$(".existing").show ();
		break;
		case 'fromlist':
			$(".newfile").hide ();
			$(".fromlist").show ();
			$(".existing").hide ();
		break;
		
		case 'new':
			$(".newfile").show ();
			$(".fromlist").hide ();
			$(".existing").hide ();
		break;
		
	}
	
	
	$("input:radio[name=chk_listtype]").click(function() {
	     listtype = $(this).val();
	     switch (listtype) {
			case 'existing' :
				$(".newfile").hide ();
				$(".fromlist").hide ();
				$(".existing").show ();
			break;
			case 'fromlist':
				$(".newfile").hide ();
				$(".fromlist").show ();
				$(".existing").hide ();
			break;
			
			case 'new':
				$(".newfile").show ();
				$(".fromlist").hide ();
				$(".existing").hide ();
			break;
			
		}
	});
	
});