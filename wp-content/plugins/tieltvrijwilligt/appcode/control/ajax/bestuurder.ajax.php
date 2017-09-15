<?php

//seems to be needed allthough already defined in rootsandshoots.php
define('RS_PLUGIN_PATH','c:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');
define('RS_WEBSITE_PATH','c:/wamp64/www/sociaalhuis/');

require_once RS_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once RS_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once RS_PLUGIN_PATH.'appcode/model/bestuurder.class.php';
require_once RS_PLUGIN_PATH.'appcode/model/functie.class.php';
//require_once RS_WEBSITE_PATH.'wp-load.php'; gaat niet in ajax

//bestuurder wissen
if ($_GET['action'] == "delete")
{
    $bestObject = new Bestuurder();
    $bestuurderId = $_GET['bestid'];
	
	//organisatieid ophalen van de bestuurder
	$gezochteBestuurder = $bestObject->selectBestuurderById($bestuurderId);
	$orgId = $gezochteBestuurder[0]['verID'];
	 
	$success = $bestObject->delete($bestuurderId);
    if($success)
	{
		//alle bestuurders van vereniging ophalen
		$bestObject1 = new Bestuurder();
		$bestuur = $bestObject1->selectBestuurderByVerenigingId($orgId);
		$result = json_encode($bestuur); 
		echo $result;
	
	}
	else
	{
		echo "niet gelukt";
	}
}

//bestuurder toevoegen
if($_GET['action'] == "add" && isset($_GET['funcid']))
{
	//1. nieuwe bestuurder toevoegen
	if(!empty($_GET['funcid']))
	{
		$funcId = $_GET['funcid'];	
	}
	else
	{
		$funcId = NULL;
	}
	
	$voornaam = $_GET['voornaam'];
	$naam = $_GET['naam'];
	
	if(!empty($_GET['info']))
	{
		$info = $_GET['info'];	
	}
	else {
		$info = NULL;
	}
	
	if(!empty($_GET['email']))
	{
		$email = $_GET['email'];	
	}
	else {
		$email = NULL;
	}
	
	if(!empty($_GET['gsm']))
	{
		$gsm = $_GET['gsm'];	
	}
	else {
		$gsm = NULL;
	}
	
	if(!empty($_GET['tel']))
	{
		$tel = $_GET['tel'];	
	}
	else {
		$tel = NULL;
	}
	
	if(!empty($_GET['cvid']))
	{
		$cvId = $_GET['cvid'];	
	}
	else {
		$cvId = NULL;
	}
	
    $verId = $_GET['verid'];
	
	$bestObject = new Bestuurder();
	//function insert($voornaam, $naam, $info, $email, $gsm, $telefoon, $contactVoorkeurId, $funcId, $verId)
	$success = $bestObject->insert($voornaam, $naam, $info, $email, $gsm, $tel, $cvId, $funcId, $verId);
	
	if($success)
	{
		//2. alle bestuurders van vereniging ophalen
		$bestObject1 = new Bestuurder();
		$bestuur = $bestObject1->selectBestuurderByVerenigingId($verId);
		
		$result = json_encode($bestuur);  //encoding niet OK;
		
		//$error = json_last_error_msg();
		//echo "last error msg: ".$error;	
		   
		echo $result;
	
	}
	else
	{
		echo "niet gelukt";
	}
}


//bestuurder editeren
if($_GET['action'] == "edit" && isset($_GET['bestuurderid']))
{
	$bestObject = new Bestuurder();
    $bestuurderId = $_GET['bestuurderid'];
	$gezochteBestuurder = $bestObject->selectBestuurderById($bestuurderId);
	$result = json_encode($gezochteBestuurder[0]);  
	echo $result;
}


//bestuurder wijzigen
if($_GET['action'] == "update")
{
	$bestObject = new Bestuurder();
    $bestuurderId = $_GET['bestid'];
	
	if(!empty($_GET['funcid']))
	{
		$funcId = $_GET['funcid'];	
	}
	else
	{
		$funcId = NULL;
	}
	
	$voornaam = $_GET['voornaam'];
	$naam = $_GET['naam'];
	
	if(!empty($_GET['info']))
	{
		$info = $_GET['info'];	
	}
	else {
		$info = NULL;
	}
	
	if(!empty($_GET['email']))
	{
		$email = $_GET['email'];	
	}
	else {
		$email = NULL;
	}
	
	if(!empty($_GET['gsm']))
	{
		$gsm = $_GET['gsm'];	
	}
	else {
		$gsm = NULL;
	}
	
	if(!empty($_GET['tel']))
	{
		$tel = $_GET['tel'];	
	}
	else {
		$tel = NULL;
	}
	
	if(!empty($_GET['cvid']))
	{
		$cvId = $_GET['cvid'];	
	}
	else {
		$cvId = NULL;
	}
	
    $verId = $_GET['verid'];
	
	$bestObject = new Bestuurder();
	//function update($bestuurderId, $voornaam, $naam, $info, $email, $gsm, $telefoon, $contactVoorkeurId, $funcId, $verId)
	$success = $bestObject->update($bestuurderId, $voornaam, $naam, $info, $email, $gsm, $tel, $cvId, $funcId, $verId);
	
	if($success)
	{
		//2. alle bestuurders van vereniging ophalen
		$bestObject1 = new Bestuurder();
		$bestuur = $bestObject1->selectBestuurderByVerenigingId($verId);
		$result = json_encode($bestuur); 
		echo $result;
	
	}
	else
	{
		echo "niet gelukt";
	}
}






?>