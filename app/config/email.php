<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Email Setting
|--------------------------------------------------------------------------
|
| All setting related to email goes here. This FIle will be auto loaded.
| Currently setting available based on Gmail SMTP Service
|
*/
$config['email']['protocol']  = 'smtp';
$config['email']['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['email']['smtp_user'] = 'your gmail address';
$config['email']['smtp_pass'] = 'gmail password';
$config['email']['smtp_port'] = 465;
$config['email']['mailtype']  = 'html';
$config['email']['charset']   = 'utf-8';

/* End of file email.php */
/* Location: ./app/config/email.php */
