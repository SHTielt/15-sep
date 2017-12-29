<?php
//is needed because there is no reference to this page in the plugin's main file
session_start()  ;

//seems to be needed allthough already defined in tieltvrijwilligt.php
define('SH_PLUGIN_PATH','c:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');
define('SH_ABS_PATH','c:/wamp64/www/sociaalhuis/');

require_once SH_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once SH_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once SH_PLUGIN_PATH.'appcode/model/vereniging.class.php';
require_once SH_PLUGIN_PATH.'appcode/model/verenigingsector.class.php';
require_once SH_PLUGIN_PATH.'appcode/helpers/cleaninput.php';
require_once SH_ABS_PATH.'wp-load.php';
require_once SH_ABS_PATH.'wp-admin/includes/user.php';

//opvangen van het escapen van $_POST door Wordpress
$_POST = stripslashes_deep($_POST);

//add
//$_POST is always set, but its content might be empty.
if(isset($_POST['btnVerenigingSave']))
{
		//1. slug genereren
		$slug = sanitize_title($_POST['naamVereniging']);
        //echo "slug: ".$slug;
		
		//2. nagaan of de slug bestaand is
		$orgObject = new Vereniging();
		$bestaandeOrg = $orgObject->selectOrganisatieBySlug($slug);
		if(!empty($bestaandeOrg))
		{
			$message = "Er is reeds een organisatie met deze naam. Gelieve een andere naam te kiezen voor de organisatie.";
			//echo $message;
            $_SESSION['message'] = $message;
			header('Location: http://localhost:8080/sociaalhuis/gefaald');
			exit;
		} 
				
		//3. naam opslaan in wordpress ter verwelkoming
		//wpUserId is in het formulier opgeslagen te zijn en kan gebruikt worden voor een update.
		$wpUserId = $_POST['verWPUserID'];
		//echo "wpuserid: ".$wpUserId;
		
		$userData =  array( 'ID' => $wpUserId, 'first_name' => $_POST['naamVereniging'] );

        $resultaat = wp_update_user( $userData );

		if ( is_wp_error( $resultaat ) ) {
			$message = "Er is een fout. Waarschijnlijk bestaat de gebruiker niet.";
            $_SESSION['message'] = $message;
			header('Location: http://localhost:8080/sociaalhuis/gefaald');
			exit;
		} 
        		
		//4. vereniging opslaan
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
	    	//$_POST['beschrijvingVereniging'] = stripslashes_deep($_POST['beschrijvingVereniging']);
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
		
		if(!empty($_POST['actiefVereniging']))
		{
			$actief = 1;
		}
		else {
			$actief = 0;
		}
		echo "actief: ".$actief;
						
		$verObject = new Vereniging();
		/*let op volgorde argumenten*/
        $result = $verObject->insert($naam, $locatie, $omschrijving, $werkingsGebied, $website, $facebook, $beschrijving, $actief, $slug, $wpUserId, $rechtsVormId);
        
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
                   header('Location: http://localhost:8080/sociaalhuis/organisatie-formulier-beschrijving?organisatieid='.$laatsteId);
                   //$_SESSION['laatsteid'] = $laatsteId;
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
                  header('Location: http://localhost:8080/sociaalhuis/gefaald');
                  exit;
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
            header('Location: http://localhost:8080/sociaalhuis/gefaald');
		 }
		 
}


//update
if(isset($_POST['btnVerenigingUpdate']))
{
		//1. slug genereren
		$slug = sanitize_title($_POST['naamVereniging']);
        echo "slug: ".$slug."<br />";
		
		//nagaan of de slug bestaand is, is hier niet zinvol
				
		//2. naam in wordpress opslaan ter verwelkoming
		//wpUserId is in het formulier opgeslagen te zijn en kan gebruikt worden voor een update.
		$wpUserId = $_POST['verWPUserID'];
		echo "wpuserid: ".$wpUserId."<br />";
		
		$userData =  array( 'ID' => $wpUserId, 'first_name' => $_POST['naamVereniging'] );

        $resultaat = wp_update_user( $userData );

		if ( is_wp_error( $resultaat ) ) {
			$message = "Er is een fout. Waarschijnlijk bestaat de gebruiker niet.";
            $_SESSION['message'] = $message;
			header('Location: http://localhost:8080/sociaalhuis/gefaald');
		} 
				
        //3. gewijzigde organisatie opslaan
        $_POST = cleanInput($_POST);
        $organisatieId = $_POST['idHidden'];
		echo "organisatieId : ".$organisatieId."<br />";
		
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
		echo "beschrijving: ".$beschrijving."<br />";
		
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
		
		if(!empty($_POST['actiefVereniging']))
		{
			$actief = 1;
		}
		else {
			$actief = 0;
		}
		echo "actief: ".$actief."<br />";
		
		$rechtsVormId = $_POST['rvVereniging'];
		echo "rechtsvormid: ".$rechtsVormId."<br />";
		
		$verObject = new Vereniging();
		/*let op volgorde argumenten*/
        $result = $verObject->update($organisatieId, $naam, $locatie, $omschrijving, $werkingsGebied, $website, $facebook, $beschrijving, $actief, $slug, $wpUserId, $rechtsVormId);
        
        
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
            header('Location: http://localhost:8080/sociaalhuis/gefaald');
            exit;
		}
				
		//2. gewijzigde sectoren opslaan
		//2.1. oude sectoren vd vereniging verwijderen
        //2.1.1. sectoren ophalen van deze vereniging
        $versecObject = new VerenigingSector();
        $sectorenVanVereniging = $versecObject->selectSectorenByVerenigingId($organisatieId);
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
                $result2 = $versecObject1->insert($organisatieId, $sectorId);
                if($result2 == FALSE) {
                    $message = $versecObject1->getFeedback();
                    $_SESSION['message'] = $message;
                    header('Location: http://localhost:8080/sociaalhuis/gefaald');
					exit;
                }
        }//einde for
        //$_SESSION['laatsteid'] = $verenigingId;
		echo "verenigingid: ". $_SESSION['laatsteid'];
        header('Location: http://localhost:8080/sociaalhuis/organisatie-formulier-beschrijving?organisatieid='.$organisatieId);
	   
          
}//einde update

//delete
if (isset($_GET['organisatieid']))
{
	$organisatieId = $_GET['organisatieid'];
	//1. fysieke verwijdering van de foto
	$fotoObject = new Foto();
	$gezochteFoto = $fotoObject->selectFotoByVerenigingId($organisatieId);
	print_r($gezochteFoto);
	if(!empty($gezochteFoto))
	{
	 $fotoNaam = $gezochteFoto[0]['fNaam'];
    //unlink('../../../appcode/webapp/view/fotouploads/'.$fotoNaam); //reeds verwijderd na thumnail creatie
    unlink('../view/fotouploads/thumbs/'.$fotoNaam);	
	}
   
	
	
	//2. WP account wissen
	//2.1. wpUserId ophalen
	$orgObject2 = new Vereniging();
	$gezochteOrg = $orgObject2->selectVerenigingbyId($organisatieId);
	$wpUserId = $gezochteOrg[0]['verWPUserID'];
	
	//2.2. wissen in de tabel sh_users
	$accountGewist = wp_delete_user($wpUserId );
	if(!$accountGewist)
	{
		$message = "Het account van deze organisatie is niet gewist. Contacteer de administrator.";
		$_SESSION['message'] = $message;
        //echo $message;
		header('Location: http://localhost:8080/sociaalhuis/gefaald');
	}
	
	//3. rest wissen
    $orgObject = new Vereniging();
    $result = $orgObject->delete($organisatieId);
    if($result)
    {
        header('Location: http://localhost:8080/sociaalhuis/organisaties');
    }
    else
    {
    	$message = $orgObject->getFeedback();
        //$message = "De vereniging is niet verwijderd. Probeer later opnieuw of contacteer de administrator.";
        $_SESSION['message'] = $message;
        //echo $message;
		$errorMessage = $orgObject->getErrorMessage();
		$_SESSION['errormessage'] = $errorMessage;
		//echo $errorMessage;
		$errorCode = $orgObject->getErrorCode();
		$_SESSION['errorcode'] = $errorCode;
		//echo $errorCode;
        header('Location: http://localhost:8080/sociaalhuis/gefaald');
    }
}
?>