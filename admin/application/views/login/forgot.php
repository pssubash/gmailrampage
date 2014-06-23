<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="" />
<title>SimpleAdmin</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/login.css" media="screen" />
</head>
<body>
<div class="wrap">
	<div id="content">
		<div id="main">
			<div class="full_w">
			<?php if(isset($loginerrormessage) && strlen($loginerrormessage) > 0) {?>
				<div class='cust_err' >
						<p>Username Required</p>
				</div>
			<?php } ?>
			<?php if(validation_errors()){?>
				<div class='cust_err' >
				<?php echo validation_errors(); ?>
				</div>
			<?php }?>
				<form action="" method="post">
					<label for="login">Email:</label>
					<input id="login" name="usr_email"  id="usr_email" class="text" />
					
					<div class="sep"></div>
					<button type="submit" class="ok">Send</button> 
					<a href="<?php echo base_url()."index.php/login/index"?>">Log In</a>
				</form>
			</div>
			<div class="footer">&raquo; <a href=""></a> | Admin Panel</div>
		</div>
	</div>
</div>

</body>
</html>
