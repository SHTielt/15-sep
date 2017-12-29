<?php
//komende van organisatie account control
if(isset($_GET['wpuserid']))
{
	$user_info = get_userdata($_GET['wpuserid']);
	//print_r($user_info);
	$wpUserId = $user_info->ID;
	//echo "wpuserid: ".$wpUserId;
	$orgObject = new Vereniging();
	$gezochteOrg = $orgObject->selectVerenigingByUserId($_GET['wpuserid']);
	//print_r($gezochteOrg);
}

//komende van overzicht organisaties
if(isset($_POST['organisatieId']))
{
	//echo "organisatieId: ".$_POST['organisatieId'];
	$orgObject = new Vereniging();
	$gezochteOrg = $orgObject->selectVerenigingById($_POST['organisatieId']);
	//print_r($gezochteOrg);
	$user_info = get_userdata($gezochteOrg[0]['verWPUserID']);
	//print_r($user_info);
	$wpUserId = $user_info->ID;
	//echo "wpuserid: ".$wpUserId; 
	
}

?>
<div id="rodebalk" class="alert-info">
                <strong>&nbsp;<?php
                if(empty($_POST['organisatieId']) && empty($_GET['wpuserid']))
                	{echo "Organisatie account toevoegen";}
				elseif(isset($_POST['organisatieId']))
					{echo "Account van ".$gezochteOrg[0]['verNaam']." wijzigen";}
				else 
					{echo "Account wijzigen";}?>
				</strong>
                <button id="sluitinfo" type="button" class="close">&times;</button>    
</div>
<p>
<a href="http://localhost:8080/sociaalhuis/organisaties" class="buttonback" title="Terug naar organisaties">&nbsp;Terug</a>
<?php if(!empty($_POST['organisatieId']) || !empty($_GET['wpuserid']))
{
?>
<a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-beschrijving?wpuserid=".$user_info->ID;?>" class="pull-right buttonnext" title="<?php echo "Naar profiel van de organisatie"; ?>">&nbsp;Naar profiel</a> 
<?php	
}
?>
           
</p>
<?php
if(empty($user_info))
{
?>
<div>Gelieve een gebruikersnaam en wachtwoord voor de organisatie te kiezen. Gelieve de gebruikersnaam en het wachtwoord naar de organisatie te mailen. De organisatie kan bij aanmelden zijn wachtwoord wijzigen.<br />
Het wachtwoord dient tenminste 8 karakters lang te zijn en dient tenminste één hoofdletter en één speciaal teken zoals &!# enz. te bevatten.<br />
Gelieve na de aanmaak van een account tevens een profiel van de organisatie aan te maken. Contacteer de website beheerder indien u na de aanmaak van het account uw werkzaamheden dient te stoppen.<br />
</div>
<?php
}
else
{
?>
<div>De gebruikersnaam van de organisatie kan niet meer gewijzigd worden. Het e-mail adres en het wachtwoord kunnen wel nog gewijzigd worden.<br />
	Het wachtwoord dient tenminste 8 karakters lang te zijn en dient tenminste één hoofdletter en één speciaal teken zoals &!# enz. te bevatten.<br />
	Gelieve de gebruikersnaam en het wachtwoord naar de organisatie te mailen. De organisatie kan bij aanmelden zijn wachtwoord wijzigen.</div>
<?php
}
?>

<form id="frmAccount" method="POST" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/organisatieaccount.control.php" class="form-horizontal">
            <div class="control-group">
                 <label for="gebruikersNaamOrganisatie" class="control-label">GEBRUIKERSNAAM:</label>
                 <div class="controls"><input id="gebruikersNaamOrganisatie" name="gebruikersNaamOrganisatie" <?php if(!empty($user_info)){echo "disabled";} else{echo"autofocus='true'";}  ?>  type="text" value="<?php if(isset($user_info)) {echo $user_info->user_login;} ?>" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                 <label for="emailOrganisatie" class="control-label">E-MAIL ADRES:</label>
                 <div class="controls"><input id="emailOrganisatie" name="emailOrganisatie" autofocus="true" type="text" value="<?php if(!empty($user_info)) {echo $user_info->user_email;} ?>" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                 <label for="wachtWoordOrganisatie" class="control-label">WACHTWOORD:</label>
                 <div class="controls"><input id="wachtWoordOrganisatie" name="wachtWoordOrganisatie" type="text" value="<?php if(!empty($user_info)) {echo '********';} ?>" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
            	<div id="reg_passmail"></div>
            </div>
            
            <div class="control-group">
                 <label for="wachtWoord2Organisatie" class="control-label">HERHAAL WACHTWOORD:</label>
                 <div class="controls"><input id="wachtWoord2Organisatie" name="wachtWoord2Organisatie" type="text" value="<?php if(!empty($user_info)) {echo '********';} ?>" required><span class="asterisk_input"></span></div>
            </div>
            
           
            
            <div class="control-group">
                 <input id="wpUserID" name="wpUserID" type="hidden" value="<?php if(!empty($user_info)) {echo $user_info->ID;} ?>">
            </div>  
            
            <div class="control-group">
                <div class="controls">
                <?php
                if(empty($_POST['organisatieId']) && empty($_GET['wpuserid']) )
                {    
                ?>
                <button id="btnOrganisatieSave" name="btnOrganisatieSave" type="submit" class="btnsave" title="Account opslaan">&nbsp;Opslaan</button>
                <button id="btnOrganisatieCancel" type="reset" class="btncancel" title="Formulier ledigen">&nbsp;Cancel</button>
                <?php
                }
                else
                {
                ?>
                <button id="btnOrganisatieUpdate" name="btnOrganisatieUpdate" type="submit" class="btnupdate" title="Account wijzigen">&nbsp;Wijzigen</button>
                <?php
                }
                ?>
                </div>
            </div>          
 </form>
 
<div id="message"><?php if(isset($_SESSION['bericht'])){ echo $_SESSION['bericht']; }; unset($_SESSION['bericht']);?></div>
