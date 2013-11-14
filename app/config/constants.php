<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');



/*
|--------------------------------------------------------------------------
| Twitter Setting
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
include_once (APPPATH . '/config/servers.php');
$active_group = getCurrentServer();


switch ($active_group) {
    case 'staging':
        define("CONSUMER_KEY",      "");
        define("CONSUMER_SECRET",   "");
        define("OAUTH_TOKEN",       "");
        define("OAUTH_SECRET",      "");
        break;

    case 'production':
        define("CONSUMER_KEY",      "");
        define("CONSUMER_SECRET",   "");
        define("OAUTH_TOKEN",       "");
        define("OAUTH_SECRET",      "");
        break;

    case 'default':
        define("CONSUMER_KEY",      "");
        define("CONSUMER_SECRET",   "");
        define("OAUTH_TOKEN",       "");
        define("OAUTH_SECRET",      "");
        break;
}

/*
|--------------------------------------------------------------------------
| Facebook and Twitter Setting
|--------------------------------------------------------------------------
|
| Facebook and Twitter setting is loaded based on server environment
|
*/
switch ($active_group) {
    case 'staging':
        define("fb_app_id",      "");
        define("fb_app_secret",  "");
        break;

    case 'production':
        define("fb_app_id",      "");
        define("fb_app_secret",  "");
        break;

    case 'default':
        define("fb_app_id",      "");
        define("fb_app_secret",  "");
        break;
}


/* End of file constants.php */
/* Location: ./app/config/constants.php */