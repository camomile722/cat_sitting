<?php
// DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'cat-sitting');
// App Root
//echo __FILE__; // path to file config.php  /Applications/MAMP/htdocs/blog/app/config/config.php
//echo dirname(__FILE__); // path to config folder Applications/MAMP/htdocs/blog/app/config
//echo dirname(dirname(__FILE__)); // path to app folder /Applications/MAMP/htdocs/blog/app
// to put this path in constant APPROOT with define function
define('APPROOT', dirname(dirname(__FILE__)));
//URL ROOT
define('URLROOT', 'http://localhost:8888/cat-sitting');
// Site NAME
define('SITENAME', 'Cat Sitting');
// BLOG ROOT
define('PUBLICROOT', 'http://localhost:8888/cat-sitting/public/uploads/');
