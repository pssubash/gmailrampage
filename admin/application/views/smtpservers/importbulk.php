<?php $this->load->view('layout/header');?>
<div id="main">
<div class="full_w">
				<div class="h_title">Import csv</div>
				<?php if(validation_errors() || isset($error)){?>
				<div class='cust_err' >
				<?php echo validation_errors().$error; ?>
				</div>
			<?php }?>
				<?php echo form_open_multipart('smtpservers/importbulk',array('method' => 'POST'));?>
					
					<div class="element">
						<label for="upload_csv">Browse CSV <span class="red">(required)</span></label>
						<input type="file" id="upload_csv" name="upload_csv" class="text" />
					</div>
					
					<div class="entry">
						 <button type="submit" class="add">Import</button> <button class="cancel">Cancel</button>
					</div>
				</form>
			</div>
</div>
<?php $this->load->view('layout/footer');?>