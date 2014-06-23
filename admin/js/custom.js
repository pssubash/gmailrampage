
$(document).ready(function (){
	
	setInterval(callValidBuyNow,5000);
	
	$(".class_buynow").live("click",function(){
		detail = this.id.split("_");//1-valid count,2-letter
		$("#item_name").val("GmailRampage.com - "+detail[1]+" - "+detail[2]+" character permute");
		amount =0;
		amount = Math.round(detail[3]*detail[1]);
		//alert(amount);
		$("#amount").val(amount);
		$("#frm_paypal").submit();
	});
});

function callValidBuyNow () {
	var baseurl = $("#baseurl").val();
	//alert(baseurl);
	$.ajax({
		url:baseurl+'index.php/gmailemail/emailbynum',
		async : true,
		dataType :'html',
		success:function (data){
			$("#valid_buynow").html(data);
			
		}
	});
	
	$.ajax({
		url:baseurl+'index.php/gmailemail/emailbychar',
		async : true,
		dataType :'html',
		success:function (data){
			$("#valid_buy_char").html(data);
			
		}
	});

	
}