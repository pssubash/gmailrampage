<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="P" />
<title>SimpleAdmin</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/navi.css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
</head>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<p>Welcome, <strong><?php echo $this->session->userdata('loggedin_useremail');?></strong> 
				[ 
				<a href="<?php echo base_url()?>index.php/users/add">Profile</a>&nbsp;|&nbsp;
				<a href="http://gmailrampage.com/minterface/help" target="_blank">Help</a>&nbsp;|&nbsp;
				<a href="http://gmailrampage.com/minterface/contact" target="_blank">Contact Us</a>&nbsp;|&nbsp;
				<a href="<?php echo base_url()?>index.php/login/logout">logout</a> 
				]</p>
			</div>
			<div class="right">
				<div class="align-right">
					<p>Now: <strong><?php echo date('F d,Y H:i');?></strong></p>
				</div>
			</div>
		</div>
		<?php $this->load->view('layout/admin_nav_top');?>
	</div>
	
	<div id="content">
		<?php $this->load->view('layout/admin_nav_side');?>