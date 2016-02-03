$(document).ready(
		function() {

			setInterval(callValidBuyNow, 5000);

			$(".class_buynow").live(
					"click",
					function() {
						// alert("fff");
						detail = this.id.split("_");// 1-valid count,2-letter
					//	console.log(detail);
						$("#item_name").val(
								"GmailRampage.com - " + detail[1] + " - "
										+ detail[2] + " character permute");
						amount = 0;
						amount = Math.round(detail[3] * detail[1]);
						// alert(amount);
						$("#amount").val(amount);
						$("#frm_paypal").submit();
					});
			$(".class_buynow_char").live(
					"click",
					function() {
						// alert("fff");
						detail = this.id.split("_");// 1-valid count,2-letterbuynow_3_All Letter_39.6
					//	console.log(detail);
						$("#item_name").val(
								"GmailRampage.com - " + detail[1]
										+ " - Email starting with character "
										+ detail[4]);
						amount = 0;
						amount = Math.round(detail[3] * detail[1]);
						// alert(amount);
						$("#amount").val(amount);
						$("#frm_paypal").submit();
					});

			$(".offer_buy_now").live(
					'click',
					function() {
						// alert("I am clicked");
						$("#item_name").val(
								"GmailRampage.com - Offer Price - $"
										+ $("#hid_offer_price").val());
						amount = 0;
						amount = Math.round($("#hid_offer_price").val());
						// alert(amount);
						$.ajax({
							url : 'update_offer_counter.php',
							async : true,
							dataType : 'html',
							success : function(data) {

							}
						});
						$("#amount").val(amount);
						$("#frm_paypal").submit();
					});
		});

function callValidBuyNow() {
	$.ajax({
		url : 'valid_buynow.php?t=aj',
		async : true,
		dataType : 'html',
		success : function(data) {
			$("#valid_buynow").html(data);

		}
	});

	$.ajax({
		url : 'valid_buynow_char.php?t=aj',
		async : true,
		dataType : 'html',
		success : function(data) {
			$("#valid_buynow_character").html(data);

		}
	});
}
