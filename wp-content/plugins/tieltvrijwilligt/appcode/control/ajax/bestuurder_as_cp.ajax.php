<?php
define('RS_PLUGIN_PATH','C:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');
define('RS_WEBSITE_PATH',"C:/wamp64/www/sociaalhuis/");
require_once RS_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once RS_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once RS_PLUGIN_PATH.'appcode/model/bestuurder.class.php';
//require_once RS_WEBSITE_PATH.'wp-load.php'; gaat niet in ajax

if(isset($_GET['bestuurderid']))
{
	$bestuurderId = $_GET['bestuurderid'];
	$bestObject = new Bestuurder();
	$selectedBestuurder = $bestObject->selectBestuurderById($bestuurderId);
	$result = json_encode($selectedBestuurder[0]);
	echo $result; //retourneert een string van een JSON object van name value paren en index value paren;
}




?>