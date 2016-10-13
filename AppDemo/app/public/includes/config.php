<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
/**
 * Enter your DB Password Here
 */
define('DBPASS','*****');
define('DBNAME','thato_blog');

//application address
$site_status = "development";

//Done to allow activate offline
if($site_status == "development") {
    define('DIR', 'http://localhost/AppDemo/_loginregister-master/');
} else {
    define('DIR', 'http://thatobabusi.co.za/');
}
define('SITEEMAIL','thatobabusi.co.za');

try {

	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
$user = new User($db);
?>
