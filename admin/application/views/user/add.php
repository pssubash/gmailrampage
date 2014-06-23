<?php $this->load->view('layout/header');?>
<div id="main">
<div class="full_w">
				<div class="h_title">Add User</div>
				<?php if(validation_errors()){?>
				<div class='cust_err' >
				<?php echo validation_errors(); ?>
				</div>
			<?php }?>
				<form action="" method="post">
					<?php if($loggedin_userrole == 'admin') {?>
					<div class="element">
						<label for="usr_email">Email <span class="red">(required)</span></label>
						<input id="usr_email" name="usr_email" class="text" value="<?php echo preset_value('usr_email',@$userdetail['usr_email'],'');?>" />
					</div>
					<?php } else { ?>
					<div class="element">
						<label for="usr_email">Email <span class="red">(required)</span></label>
						<input readonly id="usr_email" name="usr_email" class="text" value="<?php echo preset_value('usr_email',@$userdetail['usr_email'],'');?>" />
					</div>
					<?php } ?>
					
					<div class="element">
						<label for="usr_email">Password <span class="red">(required)</span></label>
						<input id="usr_password" name="usr_password" class="text" value="<?php echo preset_value('usr_password',@$userdetail['usr_password'],'');?>" />
					</div>
					
					<div class="entry">
						 <button type="submit" class="add">Save User</button> <button class="cancel">Cancel</button>
					</div>
				</form>
			</div>
</div>
<?php $this->load->view('layout/footer');?>