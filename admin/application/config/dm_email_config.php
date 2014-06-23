<?php

$config['start_letter_count'] = 6;
$config['end_letter_count'] = 20;
$config['cost_per_valid_email'] = 0.0001;
$config['paypal_email'] = "underpri@underpricedhost.com";
$config['from_email'] = "underpri@underpricedhost.com";


$useraddemail = <<<EOD
Hello <<<user_email>>>,<br/>
Your GmailRampage login link is present below..<br/>

http://gmailrampage.com/minterface/admin/<br/>

Username : <<<user_email>>><br/>

Password : <<<user_password>>><br/>
<br/><br/><br/>

Best Regards,<br/>
GmailRampage<br/>
underpricedhost@gmail.com<br/>
http://gmailrampage.com<br/>
EOD;

$config['dm_user_add_email_template'] = $useraddemail;


$userforgotemail = <<<EOD
Hello <<<user_email>>>,<br/>
Your GmailRampage login link is present below..<br/>

http://gmailrampage.com/minterface/admin/<br/>

Username : <<<user_email>>><br/>

Password : <<<user_password>>><br/>
<br/><br/><br/>

Best Regards,<br/>
GmailRampage<br/>
underpricedhost@gmail.com<br/>
http://gmailrampage.com<br/>
EOD;

$config['dm_user_forgot_email_template'] = $userforgotemail;
