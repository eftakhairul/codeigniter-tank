<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

include_once (APPPATH . '/config/servers.php');

$active_group  = getCurrentServer();
$active_record = true;

$db['default']['hostname'] = "localhost";
$db['default']['username'] = "root"; // Database User Nam
$db['default']['password'] = "commonrbs"; // Database User Password
$db['default']['database'] = "carsreun_carsreunited"; // Database Name
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_unicode_ci";

$db['staging']['hostname'] = "localhost";
$db['staging']['username'] = "shopofth_cars"; // Staging Database User Name
$db['staging']['password'] = "c@rsreunited"; // Staging Database User Password
$db['staging']['database'] = "shopofth_content";   // Staging Database Name
$db['staging']['dbdriver'] = "mysql";
$db['staging']['dbprefix'] = "";
$db['staging']['pconnect'] = TRUE;
$db['staging']['db_debug'] = TRUE;
$db['staging']['cache_on'] = FALSE;
$db['staging']['cachedir'] = "";
$db['staging']['char_set'] = "utf8";
$db['staging']['dbcollat'] = "utf8_unicode_ci";

$db['production']['hostname'] = "";
$db['production']['username'] = ""; // Production Database Name
$db['production']['password'] = ""; // Production Database User Password
$db['production']['database'] = ""; // Production Database Name
$db['production']['dbdriver'] = "mysql";
$db['production']['dbprefix'] = "";
$db['production']['pconnect'] = TRUE;
$db['production']['db_debug'] = TRUE;
$db['production']['cache_on'] = FALSE;
$db['production']['cachedir'] = "";
$db['production']['char_set'] = "utf8";
$db['production']['dbcollat'] = "utf8_unicode_ci";


/* End of file database.php */
/* Location: ./application/config/database.php */