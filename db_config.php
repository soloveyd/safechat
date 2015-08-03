<?php


$server_name=$_SERVER['SERVER_NAME'];

if($server_name == 'localhost') {
	define('DB_USER', "root"); // db user
	define('DB_PASSWORD', ""); // db password (mention your db password here)
	define('DB_DATABASE', "safechat"); // database name
	define('DB_SERVER', "localhost"); // db server

} else {

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: Content-Type');

	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"],1);

    define('DB_SERVER', $server);
    define('DB_USER', $username);
    define('DB_PASSWORD', $password);
    define('DB_DATABASE', $db);
}
?>