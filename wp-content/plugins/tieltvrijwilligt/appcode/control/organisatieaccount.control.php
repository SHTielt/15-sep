<?php
//is needed because there is no reference to this page in the plugin's main file
session_start()  ;

//seems to be needed allthough already defined in verenigingspool.php
define('SH_PLUGIN_PATH','c:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');
define('SH_ABS_PATH','c:/wamp64/www/sociaalhuis/');

require_once SH_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once SH_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once SH_PLUGIN_PATH.'appcode/model/vereniging.class.php';
require_once SH_PLUGIN_PATH.'appcode/helpers/cleaninput.php';

require_once SH_ABS_PATH.'wp-load.php';

//1. user aanmaken voor de organisatie in WP
if(isset($_POST['btnOrganisatieSave']))
{
		//$_POST = cleanInput($_POST);
        $gebruikersNaam = $_POST['gebruikersNaamOrganisatie'];
		echo "gebruikersnaam: ".$gebruikersNaam."<br />";
				
		if ( username_exists( $gebruikersNaam ) )
		{
			$fout = "Gebruikersnaam is reeds in gebruik!";
			header('Location: http://localhost:8080/sociaalhuis/organisatie-formulier-account');
            $_SESSION['bericht'] = $fout;
		}
		
		$email = $_POST['emailOrganisatie'];
		echo "email: ".$email."<br />";
        
		$password = $_POST['wachtWoordOrganisatie'];
		echo "wachtwoord: ".$password."<br />";	
		
		$userData = array(
    		'user_login'  =>  $gebruikersNaam,
    		'user_pass'   =>  $password,
    		'user_email'  =>  $email
		);

		$user_id = wp_insert_user( $userData ) ;

		//On success
		if ( ! is_wp_error( $user_id ) ) {
    		echo "User created : ". $user_id;
			header('Location: http://localhost:8080/sociaalhuis/organisatie-formulier-account?wpuserid='.$user_id);
			$_SESSION['bericht'] = "Het nieuwe account is aangemaakt.";
			//$_SESSION['wpUserId'] = $user_id;
		}
		else {
			header('Location: http://localhost:8080/sociaalhuis/organisatie-formulier-account');
			$_SESSION['bericht'] = "Het nieuwe account kon niet aangemaakt worden. Contacteer de administrator.";
		} 
}


//user wijzigen
if(isset($_POST['btnOrganisatieUpdate']))
{
        //$_POST = cleanInput($_POST);
        $email = $_POST['emailOrganisatie'];
		echo "email: ".$email."<br />";
        
		$password = $_POST['wachtWoordOrganisatie'];
		echo "wachtwoord: ".$password."<br />";	
		
		$wpUserId = $_POST['wpUserID'];
		echo "wpuserid: ".$wpUserId;
		
		if($password == "********")
		{
			$userData = array(
			'ID'   =>  $wpUserId,
    		'user_email'  =>  $email
		);
		}
		else {
			$userData = array(
			'ID'   =>  $wpUserId,
    		'user_pass'   =>  $password,
    		'user_email'  =>  $email
		);
		}
		
		
		
		print_r($userData);
		
		$user_id = wp_update_user( $userData ) ;

		//On success
		if ( ! is_wp_error( $user_id ) ) {
			//echo "ok";
    		header('Location: http://localhost:8080/sociaalhuis/organisatie-formulier-account?wpuserid='.$wpUserId);
			$_SESSION['bericht'] = "Het account is succesvol gewijzigd.";
			//$_SESSION['wpUserId'] = $wpUserId;
		}
		else {
			//echo "niet ok";
			header('Location: http://localhost:8080/sociaalhuis/organisatie-formulier-account?wpuserid='.$wpUserId);
			$_SESSION['bericht'] = "het account data kon niet gewijzigd worden. Contacteer de administrator.";
		} 
      
		
	   
          
}//einde update


?>