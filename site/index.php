<?php
// Sets the default timezone used by all date/time. Adjust to your location
date_default_timezone_set('Asia/Jakarta');

// You can adjust this following constants if necessary.
define('ABSPATH', dirname(dirname(__FILE__)).'/' );
define('SITE', '/');
define('SITEMASTER', '/admin/');

//~ define('MAINHTTP', 'http://128.199.106.100/gobatik/site/');
define('MAINHTTP', 'http://gobatik.com/');
//~ define('MASTERHTTP', 'http://128.199.106.100/gobatik/site/master/');
define('MASTERHTTP', 'http://gobatik.com/master/');

//UPLIB = upload library using upload handler
define('UPLIBHTTP', MASTERHTTP.'uploadhandler/php');
define('UPLIBSITE', ABSPATH.'site/image/item/');
define('UPLIBURL', MAINHTTP.'image/item/');

// The APP constant is where your application folder located.
//~ define('APP', dirname(__FILE__) . '/');
define('APP', ABSPATH . 'app/');

// The INDEX_FILE constant is this default file name.
define('INDEX_FILE', basename(__FILE__));

// And the GEAR constant is where panada folder located.
define('GEAR', '../../panada/');

require_once GEAR.'Gear.php';

// To sets which PHP errors are reported just like documented in this page
// http://php.net/manual/en/function.error-reporting.php
// You can pass a parameter into the Gear class.

// Turn off all errors reporting - production use.
// new Gear(0);

// By default all errors will displayed - development use.
new Gear;
