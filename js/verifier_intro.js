$(document).ready(function (){
	function scrollWindow6() {
		console.log("I am window 1");
	   // window.scrollBy(0, document.body.scrollHeight);
	    $('#verifier_6').scrollTop( $('#verifier_6').scrollHeight);
	}
	//scrollHeight
	function initScroll() {
	    //setInterval("scrollWindow6()", 100);
	}
	callVerifier6 ();
	setInterval(callVerifier6,1000);

	callVerifier7 ();
	setInterval(callVerifier7,1000);

	callVerifier8 ();
	setInterval(callVerifier8,1000);
	
	callVerifier9 ();
	setInterval(callVerifier9,1000);
	
	callVerifier10 ();
	setInterval(callVerifier10,1000);
	
	callVerifier11 ();
	setInterval(callVerifier11,1000);
	
	callVerifier12 ();
	setInterval(callVerifier12,1000);
	
	callVerifier13 ();
	setInterval(callVerifier13,1000);
	
	callVerifier14 ();
	setInterval(callVerifier14,1000);
	
	callVerifier15 ();
	setInterval(callVerifier15,1000);
	
	callVerifier16 ();
	setInterval(callVerifier16,1000);
	
	callVerifier17 ();
	setInterval(callVerifier17,1000);
	
	callVerifier18 ();
	setInterval(callVerifier18,1000);
	
	callVerifier19();
	setInterval(callVerifier19,1000);
	
	callVerifier20 ();
	setInterval(callVerifier20,1000);
	setInterval(callValidBuyNow,5000);
	
	
	$(".class_buynow").live("click",function(){
		//alert("fff");
		detail = this.id.split("_");//1-valid count,2-letter
		$("#item_name").val("GmailRampage.com - "+detail[1]+" - "+detail[2]+" character permute");
		amount =0;
		amount = Math.round(detail[3]*detail[1]);
		//alert(amount);
		$("#amount").val(amount);
		$("#frm_paypal").submit();
	});
	$(".class_buynow_char").live("click",function(){
		//alert("fff");
		detail = this.id.split("_");//1-valid count,2-letter
		$("#item_name").val("GmailRampage.com - "+detail[1]+" - Email starting with character "+detail[4]);
		amount =0;
		amount = Math.round(detail[3]*detail[1]);
		//alert(amount);
		$("#amount").val(amount);
		$("#frm_paypal").submit();
	});
	
	$(".offer_buy_now").live('click',function (){
		//alert("I am clicked");
		$("#item_name").val("GmailRampage.com - Offer Price - $"+$("#hid_offer_price").val());
		amount =0;
		amount = Math.round($("#hid_offer_price").val());
		//alert(amount);
		$.ajax({
			url:'update_offer_counter.php',
			async : true,
			dataType :'html',
			success:function (data){
				
				
			}
		});
		$("#amount").val(amount);
		$("#frm_paypal").submit();
	});
});

function callValidBuyNow () {
	$.ajax({
		url:'valid_buynow.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#valid_buynow").html(data);
			
		}
	});

	$.ajax({
		url:'valid_buynow_char.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#valid_buynow_character").html(data);
			
		}
	});
}
function callVerifier6 () {
	$.ajax({
		url:'verifier_6.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_6").append(data);
			scrollWindow6 ();
		}
	});

	$.ajax({
		url:'verifier_6_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_6_status").html(data);
			
		}
	});
}
function scrollWindow6() {
	console.log(document.getElementById("verifier_6").scrollHeight);
	   // window.scrollBy(0, document.body.scrollHeight);
	   // $('#verifier_6').scrollTop($('#verifier_6').scrollHeight);
	var newheight = (document.getElementById("verifier_6").scrollHeight) + 300
	$("#verifier_6").animate({ scrollTop:newheight }, "fast");
	}


function callVerifier7 () {
	$.ajax({
		url:'verifier_7.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_7").append(data);
			scrollWindow7 ();
		}
	});

	$.ajax({
		url:'verifier_7_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_7_status").html(data);
			
		}
	});
	
}
function scrollWindow7() {
	console.log(document.getElementById("verifier_7").scrollHeight);
	   // window.scrollBy(0, document.body.scrollHeight);
	   // $('#verifier_6').scrollTop($('#verifier_6').scrollHeight);
	var newheight = (document.getElementById("verifier_7").scrollHeight) + 300
	$("#verifier_7").animate({ scrollTop:newheight }, "fast");
	}


function callVerifier8 () {
	$.ajax({
		url:'verifier_8.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_8").append(data);
			scrollWindow8 ();
		}
	});

	$.ajax({
		url:'verifier_8_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_8_status").html(data);
			
		}
	});
}
function scrollWindow8() {
	console.log(document.getElementById("verifier_8").scrollHeight);
	   // window.scrollBy(0, document.body.scrollHeight);
	   // $('#verifier_6').scrollTop($('#verifier_6').scrollHeight);
	var newheight = (document.getElementById("verifier_8").scrollHeight) + 300
	$("#verifier_8").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier9 () {
	$.ajax({
		url:'verifier_9.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_9").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_9_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_9_status").html(data);
			
		}
	});
}
function scrollWindow9() {
	var newheight = (document.getElementById("verifier_9").scrollHeight) + 300;
	$("#verifier_9").animate({ scrollTop:newheight }, "fast");
	}


function callVerifier10 () {
	$.ajax({
		url:'verifier_10.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_10").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_10_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_10_status").html(data);
			
		}
	});
}
function scrollWindow10() {
	var newheight = (document.getElementById("verifier_10").scrollHeight) + 300;
	$("#verifier_10").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier11 () {
	$.ajax({
		url:'verifier_11.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_11").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_11_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_11_status").html(data);
			
		}
	});
}
function scrollWindow11() {
	var newheight = (document.getElementById("verifier_11").scrollHeight) + 300;
	$("#verifier_11").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier12 () {
	$.ajax({
		url:'verifier_12.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_12").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_12_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_12_status").html(data);
			
		}
	});
}
function scrollWindow12() {
	var newheight = (document.getElementById("verifier_12").scrollHeight) + 300;
	$("#verifier_12").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier13 () {
	$.ajax({
		url:'verifier_13.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_13").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_13_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_13_status").html(data);
			
		}
	});
}
function scrollWindow13() {
	var newheight = (document.getElementById("verifier_13").scrollHeight) + 300;
	$("#verifier_13").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier14 () {
	$.ajax({
		url:'verifier_14.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_14").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_14_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_14_status").html(data);
			
		}
	});
}
function scrollWindow14() {
	var newheight = (document.getElementById("verifier_14").scrollHeight) + 300;
	$("#verifier_14").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier15 () {
	$.ajax({
		url:'verifier_15.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_15").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_15_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_15_status").html(data);
			
		}
	});
}
function scrollWindow15() {
	var newheight = (document.getElementById("verifier_15").scrollHeight) + 300;
	$("#verifier_15").animate({ scrollTop:newheight }, "fast");
	}


function callVerifier16 () {
	$.ajax({
		url:'verifier_16.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_16").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_16_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_16_status").html(data);
			
		}
	});
}
function scrollWindow16() {
	var newheight = (document.getElementById("verifier_16").scrollHeight) + 300;
	$("#verifier_16").animate({ scrollTop:newheight }, "fast");
	}


function callVerifier17 () {
	$.ajax({
		url:'verifier_17.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_17").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_17_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_17_status").html(data);
			
		}
	});
}
function scrollWindow17() {
	var newheight = (document.getElementById("verifier_17").scrollHeight) + 300;
	$("#verifier_17").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier18 () {
	$.ajax({
		url:'verifier_18.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_18").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_18_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_18_status").html(data);
			
		}
	});
}
function scrollWindow18() {
	var newheight = (document.getElementById("verifier_18").scrollHeight) + 300;
	$("#verifier_18").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier19 () {
	$.ajax({
		url:'verifier_19.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_19").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_19_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_19_status").html(data);
			
		}
	});
}
function scrollWindow19() {
	var newheight = (document.getElementById("verifier_19").scrollHeight) + 300;
	$("#verifier_19").animate({ scrollTop:newheight }, "fast");
	}

function callVerifier20 () {
	$.ajax({
		url:'verifier_20.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_20").append(data);
			scrollWindow9 ();
		}
	});

	$.ajax({
		url:'verifier_20_status.php?t=aj',
		async : true,
		dataType :'html',
		success:function (data){
			$("#verifier_20_status").html(data);
			
		}
	});
}
function scrollWindow20() {
	var newheight = (document.getElementById("verifier_20").scrollHeight) + 300;
	$("#verifier_20").animate({ scrollTop:newheight }, "fast");
	}