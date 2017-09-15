<?php

define('RS_PLUGIN_PATH','c:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');
define('RS_WEBSITE_PATH','c:/wamp64/www/sociaalhuis/');

require_once RS_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once RS_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once RS_PLUGIN_PATH.'appcode/model/bestuurder.class.php';
require_once RS_PLUGIN_PATH.'appcode/model/contactpersoon.class.php';
//require_once RS_WEBSITE_PATH.'wp-load.php'; gaat niet in ajax

//bestuurder als contactpersoon invullen
if ($_GET['action'] == "fill")
{
	$bestuurderId = $_GET['bestuurderid'];
	$bestObject = new Bestuurder();
	$selectedBestuurder = $bestObject->selectBestuurderById($bestuurderId);
	$result = json_encode($selectedBestuurder[0]);
	echo $result; //retourneert een string van een JSON object van name value paren en index value paren;
}


//bestuurder wissen
if ($_GET['action'] == "delete")
{
    $contObject = new ContactPersoon();
    $cpId = $_GET['contid'];
	
	//organisatieid ophalen van de contactpersoon
	$gezochteCP = $contObject->selectContactPersoonById($cpId);
	$orgId = $gezochteCP[0]['verID'];
	 
	$success = $contObject->delete($cpId);
    if($success)
	{
		//contactpersoon van vereniging terug ophalen
		$contObject1 = new ContactPersoon();
		$contact = $contObject1->selectContactPersoonByVerenigingId($orgId);
		$result = json_encode($contact); 
		echo $result;
	
	}
	else
	{
		echo "niet gelukt";
	}
}

//contactpersoon toevoegen
if($_GET['action'] == "add")
{
	//1. nieuwe contactpersoon toevoegen
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
	
	$contObject = new ContactPersoon();
	//function insert($voornaam, $naam, $info, $email, $gsm, $telefoon, $contactVoorkeurId, $verId)
	$success = $contObject->insert($voornaam, $naam, $info, $email, $gsm, $tel, $cvId, $verId);
	
	if($success)
	{
		//2. contactpersoon van organisatie terug ophalen
		$contObject1 = new ContactPersoon();
		$contact = $contObject1->selectContactPersoonByVerenigingId($verId);
		$result = json_encode($contact); 
		echo $result;
	
	}
	else
	{
		echo "niet gelukt";
	}
}


//cp editeren
if($_GET['action'] == "edit" && isset($_GET['contactpersoonid']))
{
	$contObject = new ContactPersoon();
    $cpId = $_GET['contactpersoonid'];
	$gezochteCP = $contObject->selectContactPersoonById($cpId);
	$result = json_encode($gezochteCP[0]);  
	echo $result;
}


//cp wijzigen
if($_GET['action'] == "update")
{
	$contObject = new ContactPersoon();
    $cpId = $_GET['contid'];
	
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
	
    $orgId = $_GET['verid'];
	
	$contObject = new ContactPersoon();
	//function update($contactPersoonId, $voornaam, $naam, $info, $email, $gsm, $telefoon, $contactVoorkeurId, $verId)
	$success = $contObject->update($cpId, $voornaam, $naam, $info, $email, $gsm, $tel, $cvId, $orgId);
	
	if($success)
	{
		//cp van organisatie terug ophalen
		$contObject1 = new ContactPersoon();
		$contact = $contObject1->selectContactPersoonByVerenigingId($orgId);
		$result = json_encode($contact); 
		echo $result;
	}
	else
	{
		echo "niet gelukt";
	}
}






?>