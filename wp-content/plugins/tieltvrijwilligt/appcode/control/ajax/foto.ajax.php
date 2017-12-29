<?php

define('RS_PLUGIN_PATH','c:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');
define('RS_WEBSITE_PATH','c:/wamp64/www/sociaalhuis/');

require_once RS_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once RS_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once RS_PLUGIN_PATH.'appcode/model/foto.class.php';


//foto wissen
if ($_GET['action'] == "delete")
{
	//1. fysieke verwijdering van bestand
    $fotoObject = new Foto();
    $fotoId = $_GET['fotoid'];
	$gezochteFoto = $fotoObject->selectFotoById($fotoId);
	$fotoNaam = $gezochteFoto[0]['fNaam'];
    //unlink('../../../appcode/webapp/view/fotouploads/'.$fotoNaam); //reeds verwijderd na thumnail creatie
    unlink('../../view/fotouploads/thumbs/'.$fotoNaam);
	
	//2. verwijdering uit databank
	$success = $fotoObject->delete($fotoId);
    if($success)
	{
		echo "ok";
	
	}
	else
	{
		echo "niet gelukt";
	}
}
?>