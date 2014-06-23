<?php
define("COST_PER_VALID_EMAIL", 0.0001);//Cost Price per Valid email address
define("PAYPAL_EMAIL","underpri@underpricedhost.com");//Paypal email address
define("ALERT_EMAIL", "underpricedhost@gmail.com");
define("ALERT_EMAIL_SUBJECT","DM Generate Count : Letter <<<letter>>>");
define("GENERTE_ALERT_COUNT",100000);
define('NUM_VERIFICATION_PER_RUN',50);

/************************************************************************************
 *  ADEVERTISEMENT CONFIGSRSTIONS
 * 
 *************************************************************************************/

define("OFFER_PRICE", 50);
define("IS_SEND_EMAIL_ADVERISEMENT_TO_VERIFIED",'Yes') ;//Yes,No

define('AD_SMTP_HOST','mail.gmailrampage.com');
define('AD_SMTP_PORT','25');
define('AD_SMTP_USER','noreply@gmailrampage.com');
define('AD_SMTP_PWD','adminkerala');

$emailConfig = array ();
$emailConfig['protocol'] = 'smtp';
$emailConfig['smtp_host'] = AD_SMTP_HOST;
$emailConfig['smtp_user'] = AD_SMTP_USER;
$emailConfig['smtp_pass'] = AD_SMTP_PWD;
$emailConfig['smtp_port'] = AD_SMTP_PORT;


$email_advertisement = <<<EOD
---- EMAIL Advertisement 
I am the DANGEROUS MAILER. Use me with CAUTION.

I am the DANGEROUS MAILER. Use me with CAUTION.

I am the DANGEROUS MAILER. Use me with CAUTION.

==>> http://bit.ly/1i5aN2P

==>> http://bit.ly/1i5aN2P

==>> http://bit.ly/1i5aN2P

************************************************************************************

Powered by Blockbuster Offer  
$64/Year RESELLER ACCOUNT of http://www.UnderPricedHost.com

************************************************************************************
EOD;
