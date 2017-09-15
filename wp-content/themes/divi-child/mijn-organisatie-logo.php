<?php
//get wpuserid
$current_user = wp_get_current_user();
$wpUserId = $current_user->ID;
//echo "wpuserid: ".$wpUserId;

//komende van inlog
//organisatie ophalen
$orgObject = new Vereniging();
$gezochteOrg = $orgObject->selectVerenigingByUserId($wpUserId);
//print_r($gezochteOrg);
$organisatieId = $gezochteOrg[0]['verID'];

//logo ophalen
$fotoObject = new Foto();
$gezochteFoto = $fotoObject->selectFotoByVerenigingId($organisatieId);	

?>
<?php
/*uploadmessage komt van mijnorganisatiefoto.control.php*/
$uploadMessage = !empty($_SESSION['uploadmessage'])? $_SESSION['uploadmessage'] : "";
unset($_SESSION['uploadmessage']);

if(empty($gezochteFoto))//nog geen foto opgeladen
{
?>
<div id="rodebalk" class="alert-info">
            <strong>&nbsp;Logo/foto toevoegen aan <?php echo $gezochteOrg[0]['verNaam']; ?></strong>
</div>

<div>
Het logo of een foto van uw vereniging dient aan de volgende voorwaarden te voldoen:
<ul>
	<li>Enkel logo's of foto's van het type .jpg, .jpeg, .gif, .png</li>
	<li>Het logo of de foto is kleiner dan 500 kilobyte.</li>
	<li>Een logo of foto van het .png type mag geen transparante achtergrond hebben.</li>
</ul> 
Na het opladen van logo of foto dient u terug de 'Logo of foto' tab aan te klikken om uw opgeladen logo/foto te bekijken.	
</div>

<div id="uploaddiv">     
<form id="fotoForm" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/mijnorganisatiefoto.control.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="control-group">
            	<div class="controls">
                 	<input type="file" id="fileToUpload" name="fileToUpload">
                </div>
            </div>
            
            <div class="control-group">
            	<div class="controls">
                   	<button id="btnOrganisatieFotoSave" name="btnOrganisatieFotoSave" type="submit" class="btnsave">&nbsp;Opslaan</button>
                    <button id="btnOrganisatieFotoCancel" name="btnOrganisatieFotoCancel" type="submit" class="btncancel">&nbsp;Cancel</button>
               </div>
            </div>
            
            <div class="control-group">
                 <input id="idOrganisatie" name="idOrganisatie" type="hidden" value="<?php echo $organisatieId; ?>">
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

<form id="fotoForm" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/mijnorganisatiefoto.control.php" method="post" enctype="multipart/form-data">
<input id="idFoto" name="idFoto" type="hidden" value="<?php echo $gezochteFoto[0]['fID']; ?>">
<input id="btnOrganisatieFotoDelete" name="btnOrganisatieFotoDelete" type="submit" value="a" />
<!--<img id="<?php echo "deleteIcon".$gezochteFoto[0]['fID'];?>" alt="delete icon" title="logo/foto wissen" src="<?php echo "http://localhost:8080/sociaalhuis/wp-content/themes/divi-child/icons/delete.jpg"; ?>" />-->

</form>
<div id="uploadMessage" style="color:red;"><?php echo $uploadMessage; ?></div>
</div><!--einde fotodiv-->
<?php	
}
}//einde else
?>