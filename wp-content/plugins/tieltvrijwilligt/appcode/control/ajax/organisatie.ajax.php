<?php
define('RS_PLUGIN_PATH','c:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');
define('RS_WEBSITE_PATH','c:/wamp64/www/sociaalhuis/');

require_once RS_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once RS_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once RS_PLUGIN_PATH.'appcode/model/vereniging.class.php';
require_once RS_PLUGIN_PATH.'appcode/model/verenigingsector.class.php';
//require_once RS_WEBSITE_PATH.'wp-load.php'; gaat niet in ajax

//organisatie toevoegen
if($_GET['action'] == "add")
{
	$naam = $_GET['naam'];
	
	if(!empty($_GET['locatie']))
	{
		$locatie = $_GET['locatie'];	
	}
	else {
		$locatie = NULL;
	}
	
	if(!empty($_GET['beschrijving']))
	{
		$beschrijving = $_GET['beschrijving'];	
	}
	else
	{
		$beschrijving = NULL;
	}
	
	$omschrijving = $_GET['omschrijving'];
	
	if(!empty($_GET['werkingsGebiedVereniging']))
	{
			$werkingsGebied = $_GET['werkingsGebiedVereniging'];
	}
	else
	{
			$werkingsGebied = NULL;
	}
		
	if(!empty($_GET['website']))
	{
			$website = $_GET['website'];
	}
	else
	{
			$website = NULL;
	}
	
		
	if(!empty($_GET['facebook']))
	{
			$facebook = $_GET['facebook'];
	}
	else
	{
			$facebook = NULL;
	}
	
		
	$rechtsVormId = $_GET['rvid'];
	if ($rechtsVormId == 0)
	{
			$rechtsVormId = NULL;
	}
		
	$actief = 1;
		
	$wpUserId = $_GET['wpuserid'];
					
	$orgObject = new Vereniging();
	//insert($naam, $locatie, $omschrijving, $werkingsGebied, $webSite, $facebook, $beschrijving, $actief, $wpUserId, $rechtsVormId)
	$success = $orgObject->insert($naam, $locatie, $omschrijving, $werkingsGebied, $website, $facebook, $beschrijving, $actief, $wpUserId, $rechtsVormId);
	
	if($success)
    {
        	//2. sectoren opslaan
			$result1 = FALSE;
        	//2.1. ophalen laatste verenigingId
            $laatsteId = $orgObject->getVerenigingId();
        	//echo "laatsteid: ".$laatsteId;
			//2.2. sectorIds retrieven uit de querystring en opslaan
			$sector1Id = $_GET['sector1id'];
			$versecObject1 = new VerenigingSector();
			$result1 = $versecObject1->insert($laatsteId, $sector1Id);
			
			if(!empty($_GET['sector2id']))
			{
				$versecObject2 = new VerenigingSector();
				$sector2Id = $_GET['sector2id'];
				$result2 = $versecObject2->insert($laatsteId, $sector2Id);
			}
			
			if(!empty($_GET['sector3id']))
			{
				$versecObject3 = new VerenigingSector();
				$sector3Id = $_GET['sector3id'];
				$result3 = $versecObject3->insert($laatsteId, $sector3Id);
			}
            
            if($result1)
            {
                //toegevoegde organisatie terug ophalen
                $orgObject1 = new Vereniging(); 
				$result = $orgObject1->selectVerenigingbyId($laatsteId);
                echo json_encode($result);   
            }
            else 
            {
                  $message = "Toevoegen van sectoren van de organisatie is niet gelukt.";
				  echo $message;
            }//end if result1
                
        }
		
        else
        {
            //$message = $verObject->getFeedback();
            $message = "De vereniging beschrijving is niet toegevoegd. Probeer later opnieuw of contacteer de administrator.";
            //$_SESSION['message'] = $message;
            echo $message;
			$errorMessage = $orgObject->getErrorMessage();
			//$_SESSION['errormessage'] = $errorMessage;
			echo $errorMessage;
			$errorCode = $orgObject->getErrorCode();
			//$_SESSION['errorcode'] = $errorCode;
			echo $errorCode;
            
        }
}


//organisatie wijzigen
if($_GET['action'] == "update")
{
	$naam = $_GET['naam'];
	
	if(!empty($_GET['locatie']))
	{
		$locatie = $_GET['locatie'];	
	}
	else {
		$locatie = NULL;
	}
	
	if(!empty($_GET['beschrijving']))
	{
		$beschrijving = $_GET['beschrijving'];	
	}
	else
	{
		$beschrijving = NULL;
	}
	
	$omschrijving = $_GET['omschrijving'];
	
	if(!empty($_GET['werkingsGebiedVereniging']))
	{
			$werkingsGebied = $_GET['werkingsGebiedVereniging'];
	}
	else
	{
			$werkingsGebied = NULL;
	}
		
	if(!empty($_GET['website']))
	{
			$website = $_GET['website'];
	}
	else
	{
			$website = NULL;
	}
	
		
	if(!empty($_GET['facebook']))
	{
			$facebook = $_GET['facebook'];
	}
	else
	{
			$facebook = NULL;
	}
	
		
	$rechtsVormId = $_GET['rvid'];
	if ($rechtsVormId == 0)
	{
			$rechtsVormId = NULL;
	}
		
	$actief = 1;
		
	$wpUserId = $_GET['wpuserid'];
	
	$orgId = $_GET['orgid'];
					
	$orgObject = new Vereniging();
	//function update($verenigingId, $naam, $locatie, $omschrijving, $werkingsGebied, $webSite, $facebook, $beschrijving, $actief, $wpUserId, $rechtsVormId)
	$success = $orgObject->update($orgId, $naam, $locatie, $omschrijving, $werkingsGebied, $website, $facebook, $beschrijving, $actief, $wpUserId, $rechtsVormId);
	
	if($success)
    {
        	//2. sectoren wijzigen
			//2.1. oude sectoren vd org verwijderen
        	//2.1.1. sectoren ophalen van deze org
        	$versecObject = new VerenigingSector();
        	$sectorenVanVereniging = $versecObject->selectSectorenByVerenigingId($orgId);
        	$verenigingSectorIds = array();
        	foreach($sectorenVanVereniging as $sec)
        	{
               array_push($verenigingSectorIds, $sec['versecID']);
        	}
			//echo "verenigingsectorids : "."<br />";
			//print_r($verenigingSectorIds);
            
        	//2.1.2. verwijder de bijhorende records in tabel verenigingsectoren
        	foreach($verenigingSectorIds as $value)
        	{
                $result1 = $versecObject->delete($value);
                if($result1 == FALSE) {
                    $message = $versecObject->getFeedback();
                    $_SESSION['message'] = $message;
                    header('Location: http://localhost:8080/sociaalhuis/gefaald');
                }
        	}
        	//echo "end foreach"."<br />";
			
			//2.2. sectorIds retrieven uit de querystring en opslaan
			$sector1Id = $_GET['sector1id'];
			$versecObject1 = new VerenigingSector();
			$result1 = $versecObject1->insert($orgId, $sector1Id);
			
			if(!empty($_GET['sector2id']))
			{
				$versecObject2 = new VerenigingSector();
				$sector2Id = $_GET['sector2id'];
				$result2 = $versecObject2->insert($orgId, $sector2Id);
			}
			
			if(!empty($_GET['sector3id']))
			{
				$versecObject3 = new VerenigingSector();
				$sector3Id = $_GET['sector3id'];
				$result3 = $versecObject3->insert($orgId, $sector3Id);
			}
            
            if($result1)
            {
                //gewijzigde organisatie terug ophalen
                //$orgObject1 = new Vereniging(); 
				$result = $orgObject->selectVerenigingById($orgId);
                echo json_encode($result);   
            }
            else 
            {
                  $message = "Toevoegen van sectoren van de organisatie is niet gelukt.";
				  echo $message;
				  $errorMessage = $orgObject->getErrorMessage();
				  echo $errorMessage."<br />";
				  $errorCode = $orgObject->getErrorCode();
				  echo $errorCode."<br />";
            }//end if result1
                
        }
		
        else
        {
            //$message = $verObject->getFeedback();
            $message = "De vereniging beschrijving is niet toegevoegd. Probeer later opnieuw of contacteer de administrator.";
            echo $message."<br />";
			$errorMessage = $orgObject->getErrorMessage();
			echo $errorMessage."<br />";
			$errorCode = $orgObject->getErrorCode();
			echo $errorCode."<br />";
            
        }
}





?>