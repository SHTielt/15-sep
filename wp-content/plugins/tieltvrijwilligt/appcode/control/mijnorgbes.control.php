<?php
define('RS_PLUGIN_PATH','c:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');
define('RS_WEBSITE_PATH','c:/wamp64/www/sociaalhuis/');
require_once RS_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once RS_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once RS_PLUGIN_PATH.'appcode/helpers/cleaninput.php';
require_once RS_PLUGIN_PATH.'appcode/model/vereniging.class.php';
require_once RS_WEBSITE_PATH.'wp-load.php'; //gaat niet in ajax

if(isset($_GET['organisatieid']))
{
	$orgId = $_GET['organisatieid'];
	$orgObject = new Vereniging();
	
	$result = json_encode($selectedBestuurder[0]);
	echo $result; //retourneert een string van een JSON object van name value paren en index value paren;
}


//add
if(isset($_POST['btnVerenigingSave']))
{
		//0. vooraf enkele data opslaan in wordpress
		//wpUserId hoeft niet vooraf in het formulier opgeslagen te zijn. Kan opgevraagd worden.
		$current_user = wp_get_current_user();
		$wpUserId = $current_user->ID;
		echo "wpuserid: ".$wpUserId;
		$userData =  array( 'ID' => $wpUserId, 'first_name' => $_POST['naamVereniging'] );

        $resultaat = wp_update_user( $userData );

		if ( is_wp_error( $resultaat ) ) {
		
			$message = "Er is een fout. Waarschijnlijk bestaat de gebruiker niet.";
            $_SESSION['message'] = $message;
			header('Location: http://localhost:8080/sociaalhuis/gefaald/');
		} 
		
		
		//1. vereniging opslaan
        $_POST = cleanInput($_POST);
        
		$naam = $_POST['naamVereniging'];
		
		if(!empty($_POST['locatieVereniging']))
	    {
			$locatie = $_POST['locatieVereniging'];
		}
		else
		{
			$locatie = NULL;
		}
		echo "locatie: ".$locatie;
		
		if(!empty($_POST['beschrijvingVereniging']))
	    {
			$beschrijving = $_POST['beschrijvingVereniging'];
		}
		else
		{
			$beschrijving = NULL;
		}
		echo "beschrijving: ".$beschrijving;
		
		$omschrijving = $_POST['omschrijvingVereniging'];
		echo "omschrijving: ".$omschrijving;
		if(!empty($_POST['werkingsGebiedVereniging']))
	    {
			$werkingsGebied = $_POST['werkingsGebiedVereniging'];
		}
		else
		{
			$werkingsGebied = NULL;
		}
		echo "werkgebied: ".$werkingsGebied;
				
		if(!empty($_POST['websiteVereniging']))
	    {
			$website = $_POST['websiteVereniging'];
		}
		else
		{
			$website = NULL;
		}
		echo "website: ".$website;
		
		if(!empty($_POST['facebookVereniging']))
		{
			$facebook = $_POST['facebookVereniging'];
		}
		else
		{
			$facebook = NULL;
		}
		echo "facebook: ".$facebook;
		
		$rechtsVormId = $_POST['rvVereniging'];
		if ($rechtsVormId == 0)
			{
				$rechtsVormId = NULL;
				echo "aangekomen";
			}
		
		
		echo "rechtsvormid: ".$rechtsVormId;
		
		
		$actief = 1;
		echo "actief: ".$actief;
		
		
				
		$verObject = new Vereniging();
		/*let op volgorde argumenten*/
        $result = $verObject->insert($naam, $locatie, $omschrijving, $werkingsGebied, $website, $facebook, $beschrijving, $actief, $wpUserId, $rechtsVormId);
        
        if($result)
        {
        	
            //2. sectoren opslaan
			echo "sectoren opslaan";
        	//2.1. ophalen laatste verenigingId
            $laatsteId = $verObject->getVerenigingId();
        	echo "laatsteid: ".$laatsteId;
            //2.2. opslaan in tabel vereningsectoren
            $versecObject = new VerenigingSector();
            
            //2.3.itereren over de gevinkte checkboxen: $_POST['sector'] is een numerieke, eendim array van de waarde van de checkboxen, hier sectorId
            $aantalSectoren = count($_POST['sector']);
            echo "aantalSectoren: ".$aantalSectoren;
            $result1 = FALSE;
            for($i = 0; $i < $aantalSectoren; $i++)
            {
              $sectorId = $_POST['sector'][$i];
			  echo "sectorid: ".$sectorId;
              $result1 = $versecObject->insert($laatsteId, $sectorId);
                
            }
            if($result1)
              {
                   header('Location: http://localhost:8080/sociaalhuis/mijn-organisatie');
                   $_SESSION['laatsteid'] = $laatsteId;
              }
            else 
              {
                  $message = $versecObject->getFeedback();
                  $_SESSION['message'] = $message;
				  echo $message;
				  $errorMessage = $versecObject->getErrorMessage();
				  echo $errorMessage;
				  $errorCode = $versecObject->getErrorCode();
				  echo $errorCode;
                  //header('Location: http://localhost:8080/sociaalhuis/gefaald/');
              }//end if result1
                
        }
		
        else
        {
            $message = $verObject->getFeedback();
            //$message = "De vereniging beschrijving is niet toegevoegd. Probeer later opnieuw of contacteer de administrator.";
            $_SESSION['message'] = $message;
            echo $message;
			$errorMessage = $verObject->getErrorMessage();
			$_SESSION['errormessage'] = $errorMessage;
			echo $errorMessage;
			$errorCode = $verObject->getErrorCode();
			$_SESSION['errorcode'] = $errorCode;
			echo $errorCode;
            //header('Location: http://localhost:8080/sociaalhuis/gefaald');
        }
		 
}

//update
if(isset($_POST['btnVerenigingUpdate']))
{
        //1. gewijzigde vereniging opslaan
        $_POST = cleanInput($_POST);
      
		$verenigingId = $_POST['idHidden'];
		echo "verenigingid : ".$verenigingId."<br />";
		
		$naam = $_POST['naamVereniging'];
		echo "naam: ".$naam."<br />";
		
		if(!empty($_POST['locatieVereniging']))
		{
			$locatie = $_POST['locatieVereniging'];	
		}
		else
		{
			$locatie = NULL;
		}
		
		echo "locatie: ".$locatie."<br />";
		
		if(!empty($_POST['beschrijvingVereniging']))
	    {
			$beschrijving = $_POST['beschrijvingVereniging'];
		}
		else
		{
			$beschrijving = NULL;
		}
		echo "beschrijving: ".$beschrijving;
		
		$omschrijving = $_POST['omschrijvingVereniging'];
		echo "omschrijving: ".$omschrijving."<br />";
		
		if(!empty($_POST['werkingsGebiedVereniging']))
		{
			$werkingsGebied = $_POST['werkingsGebiedVereniging'];	
		}
		else
		{
			$werkingsGebied = NULL;
		}
		echo "werkingsGebied: ".$werkingsGebied."<br />";
				
		if(!empty($_POST['websiteVereniging']))
		{
			$website = $_POST['websiteVereniging'];	
		}
		else
		{
			$website = NULL;
		}
		echo "website: ".$website."<br />";
		
		if(!empty($_POST['facebookVereniging']))
		{
			$facebook = $_POST['facebookVereniging'];	
		}
		else
		{
			$facebook = NULL;
		}
		echo "facebook: ".$facebook."<br />";
		
		$actief = 1;
		echo "actief: ".$actief."<br />";
		
		//wpUserId kan in het formulier eigenlijk gewist worden.
		$current_user = wp_get_current_user();
		$wpUserId = $current_user->ID;
		echo "wpuserid: ".$wpUserId;
		
		$rechtsVormId = $_POST['rvVereniging'];
		echo "rechtsvormid: ".$rechtsVormId."<br />";
		
		$verObject = new Vereniging();
		/*let op volgorde argumenten*/
        $result = $verObject->update($verenigingId, $naam, $locatie, $omschrijving, $werkingsGebied, $website, $facebook, $beschrijving, $actief, $wpUserId, $rechtsVormId);
        
        
        if($result == FALSE)
		{
			echo "result: ".$result."<br />";
			$message = $verObject->getFeedback();
			$errorMessage = $verObject->getErrorMessage();
			$errorCode = $verObject->getErrorCode();
            //$message = "De vereniging beschrijving is niet toegevoegd. Probeer later opnieuw of contacteer de administrator.";
            $_SESSION['message'] = $message;
            echo "message: ".$message."<br />";
			echo "errorMessage: ".$errorMessage."<br />";
			echo "errorCode: ".$errorCode."<br />";
            //header('Location: http://localhost:8080/sociaalhuis/gefaald');
		}
				
		//2. gewijzigde sectoren opslaan
		//2.1. oude sectoren vd vereniging verwijderen
        //2.1.1. sectoren ophalen van deze vereniging
        $versecObject = new VerenigingSector();
        $sectorenVanVereniging = $versecObject->selectSectorenByVerenigingId($verenigingId);
        $verenigingSectorIds = array();
        foreach($sectorenVanVereniging as $sec)
        {
               array_push($verenigingSectorIds, $sec['versecID']);
        }
		echo "verenigingsectorids : "."<br />";
		print_r($verenigingSectorIds);
            
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
        echo "end foreach"."<br />";
            
        //2.2. opslaan nieuwe sectoren vd vereniging
        $versecObject1 = new VerenigingSector();
            
        //2.2.1.itereren over de gevinkte checkboxen: $_POST['sector'] is een numerieke, eendim array van de waarde vd checkboxen, hier secID
        $aantalSectoren = count($_POST['sector']);
		echo "aantalSectoren: ".$aantalSectoren."<br />";
        for($i = 0; $i < $aantalSectoren; $i++)
        	{
                $sectorId = $_POST['sector'][$i];
				echo "sectorid: ".$sectorId."<br />";
                $result2 = $versecObject1->insert($verenigingId, $sectorId);
                if($result2 == FALSE) {
                    $message = $versecObject1->getFeedback();
                    $_SESSION['message'] = $message;
                    header('Location: http://localhost:8080/sociaalhuis/gefaald');
                }
        }//einde for
        $_SESSION['laatsteid'] = $verenigingId;
		echo "verenigingid: ". $_SESSION['laatsteid'];
        header('Location: http://localhost:8080/sociaalhuis/mijn-organisatie');
	   
          
}//einde update


?>