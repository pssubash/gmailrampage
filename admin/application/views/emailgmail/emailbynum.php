<?php $this->load->view('layout/header');?>
<script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script>
		<div id="main">
			
			
		
			
			<div class="full_w">
				<div class="h_title">Emails By Permutation</div>
				
				
				<div class="entry">
					<div class="sep"></div>
				</div>
				<div id='valid_buynow'>
				<?php echo $tbl_emailbynum; ?>
				</div>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post"
	target="_blank" dir="ltr" name="frm_paypal" id="frm_paypal"><input
	type="hidden" name="cmd" value="_xclick"> <input type="hidden"
	name="business" value="<?php
	echo $payplaemail;
	?>"> <input type="hidden" name="undefined_quantity" value="1"> <input
	type="hidden" name="item_name" id="item_name"
	value="DANGEROUS MAILER CLONED VERSION $25 ONE TIME PAYMENT"> <input
	type="hidden" name="amount" id="amount" value="25.00"> <input
	type="hidden" name="page_style" value="Primary"> <input type="hidden"
	name="no_shipping" value="0"> <input type="hidden" name="return"
	value="http://www.gmailrampage.com/-----paymentcomplete-----.htm"> <input
	type="hidden" name="currency_code" value="USD"> <input type="hidden"
	name="lc" value="US"> <input type="hidden" name="bn"
	value="PP-BuyNowBF"></form>
				<!--  <div class="entry">
					<div class="pagination">
						<span>« First</span>
						<span class="active">1</span>
						<a href="">2</a>
						<a href="">3</a>
						<a href="">4</a>
						<span>...</span>
						<a href="">23</a>
						<a href="">24</a>
						<a href="">Last »</a>
					</div>
					<div class="sep"></div>		
					<a class="button add" href="">Add new page</a> <a class="button" href="">Categories</a> 
				</div>-->
			</div>
		</div>

<?php $this->load->view('layout/footer');?>