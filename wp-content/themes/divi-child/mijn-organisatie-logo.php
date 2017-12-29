<?php
//NOG GEEN AJAX HIER//

//get wpuserid
$current_user = wp_get_current_user();
$wpUserId = $current_user->ID;
//echo "wpuserid: ".$wpUserId;

//komende van inlog
//organisatie ophalen
$orgObject = new Vereniging();
$gezochteOrg = $orgObject->selectVerenigingByUserId($wpUserId);
//print_r($gezochteOrg);
$organisatieId="";
if(!empty($gezochteOrg))
{
	$organisatieId = $gezochteOrg[0]['verID'];
	//logo ophalen
	$fotoObject = new Foto();
	$gezochteFoto = $fotoObject->selectFotoByVerenigingId($organisatieId);	
}


?>
<?php
/*uploadmessage komt van mijnorganisatiefoto.control.php*/
$uploadMessage = !empty($_SESSION['uploadmessage'])? $_SESSION['uploadmessage'] : "";
unset($_SESSION['uploadmessage']);

if(empty($gezochteFoto))//nog geen foto opgeladen
{
?>
<div id="rodebalk" class="alert-info">
     <strong>&nbsp;Logo/foto toevoegen</strong>
</div>

<div>
Het logo of een foto van uw organisatie dient aan de volgende voorwaarden te voldoen:
<ul>
	<li>Enkel logo of foto van het type .jpg, .jpeg, .gif, .png.</li>
	<li>Logo of foto is kleiner dan 500 kilobyte.</li>
	<li>Logo of foto van het .png type mag geen transparante achtergrond hebben.</li>
	<li>Geen spatie in de bestandsnaam van het logo of de foto.</li>
</ul> 
Na het opladen van logo of foto dient u terug de 'Logo of foto' tab aan te klikken om uw opgeladen logo/foto te bekijken.	
</div>

<div id="uploaddiv">     
<form id="fotoForm" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/mijnorganisatiefoto.control.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="control-group">
            	<div class="controls">
                 	<input type="file" id="fileToUpload" name="fileToUpload" required>
                </div>
            </div>
            
            <div class="control-group">
            	<div class="controls">
                   	<button id="btnOrganisatieFotoSave" name="btnOrganisatieFotoSave" type="submit" class="btnsave" title="Logo/foto opslaan">&nbsp;Opslaan</button>
                    <button id="btnOrganisatieFotoCancel" name="btnOrganisatieFotoCancel" type="reset" class="btncancel" title="Formulier ledigen">&nbsp;Cancel</button>
               </div>
            </div>
            
            
            <div class="control-group">
                 <input id="idOrg" name="idOrg" type="hidden" value="<?php echo $organisatieId; ?>">
            </div>  
</form>
 <div id="uploadMessage" style="color:red;"><?php echo $uploadMessage; ?></div>
</div> 

<?php
}
else //wel foto opgeladen
{
?>
<div id="rodebalk" class="alert-info">
            <strong>&nbsp;<?php echo $gezochteOrg[0]['verNaam']; ?>: logo/foto verwijderen </strong>
</div>

<div>
Klik op het kruis om de afbeelding te verwijderen. Na verwijderen dient u terug de Logo/foto tab aan te klikken om te zien of het verwijderen geslaagd is.	
</div>
<br />

<div id="fotodivwis"> 
<?php
if(!empty($gezochteFoto))
{
?>
<img alt="<?php echo $gezochteFoto[0]['fNaam'];?>" title="<?php echo $gezochteFoto[0]['fNaam'];?>" src="<?php echo "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/view/fotouploads/thumbs/".$gezochteFoto[0]['fNaam']; ?>" />

<form id="fotoForm" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/mijnorganisatiefoto.control.php" method="post" enctype="multipart/form-data" onsubmit="return askDeletion()">
<input id="idFoto" name="idFoto" type="hidden" value="<?php echo $gezochteFoto[0]['fID']; ?>">
<input id="btnOrganisatieFotoDelete" name="btnOrganisatieFotoDelete" type="submit" value="a" title="Logo/foto wissen" />
</form>
<div id="uploadMessage" style="color:red;"><?php echo $uploadMessage; ?></div>
</div><!--einde fotodiv-->
<?php	
}
}//einde else
?>