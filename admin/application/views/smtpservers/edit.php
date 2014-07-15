<?php $this->load->view('layout/header');?>
    <div id="main">
        <div class="full_w">
            <div class="h_title">Smtp</div>
            <?php if(validation_errors()){?>
                <div class='cust_err' >
                    <?php echo validation_errors(); ?>
                </div>
            <?php }?>
            <form action="" method="post">

                    <div class="element">
                        <label for="smtp_name">Smtp Name <span class="red">(required)</span></label>
                        <input id="smtp_name" name="smtp_name" class="text" value="<?php echo preset_value('smtp_name',@$smtpdetails['smtp_name'],'');?>" />
                    </div>


                <div class="element">
                    <label for="smtp_host">Smtp Host <span class="red">(required)</span></label>
                    <input id="smtp_host" name="smtp_host" class="text" value="<?php echo preset_value('smtp_host',@$smtpdetails['smtp_host'],'');?>" />
                </div>

                <div class="element">
                    <label for="smtp_port">Smtp Port <span class="red">(required)</span></label>
                    <input id="smtp_port" name="smtp_port" class="text" value="<?php echo preset_value('smtp_port',@$smtpdetails['smtp_port'],'');?>" />
                </div>


                <div class="element">
                    <label for="smtp_login">Smtp Login <span class="red">(required)</span></label>
                    <input id="smtp_login" name="smtp_login" class="text" value="<?php echo preset_value('smtp_login',@$smtpdetails['smtp_login'],'');?>" />
                </div>

               <div class="element">
                <label for="smtp_password">Smtp Password <span class="red">(required)</span></label>
                <input id="smtp_password" name="smtp_password" class="text" value="<?php echo preset_value('smtp_password',@$smtpdetails['smtp_password'],'');?>" />
        </div>

		<input type="hidden" name="smtp_id" value="<?php echo @$smtpdetails['smtp_id'];?>" />
        <div class="element">
            <label for="smtp_sender">Smtp Sender <span class="red">(required)</span></label>
            <input id="smtp_sender" name="smtp_sender" class="text" value="<?php echo preset_value('smtp_sender',@$smtpdetails['smtp_sender'],'');?>" />
        </div>

                <div class="element">
                    <label for="smtp_sender">Smtp Secure <span class="red">(required)</span></label>
                   <input type="checkbox" id="smtp_secure" name="smtp_secure" value="1" class="text" v/>
                </div>

                <div class="entry">
                    <button type="submit" class="add">Save </button> <button class="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
<?php $this->load->view('layout/footer');?>