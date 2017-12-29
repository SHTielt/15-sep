<?php
//$_GET['organisatieid'] komt van vereniging formulier bestuur of vereniging foto control
if(isset( $_GET['organisatieid']))
{
	$orgId = $_GET['organisatieid'];
	//echo "orgid: ".$orgId;
	$verObject = new Vereniging();
	$gezochteVereniging = $verObject->selectVerenigingById($orgId);
	//echo "gezochte vereniging: ";
	//print_r($gezochteVereniging);
	
	//fotoid van deze vereniging ophalen
	$fotoObject = new Foto();
	$gezochteFoto = $fotoObject->selectFotoByVerenigingId($orgId);
	if(!empty($gezochteFoto))
	{
		//echo "gezochte foto: ";
		//print_r($gezochteFoto);
		$fotoId = $gezochteFoto[0]['fID'];
		//echo "fotoid: ".$gezochteFoto[0]['fID'];
	}
	else {
		$fotoId="";
	}
	
}
else
{
	$orgId = "";
	//echo "orgid: ".$orgId;
}
 
/*uploadmessage komt van verenigingfotocontrol.php*/
$uploadMessage = !empty($_SESSION['uploadmessage'])? $_SESSION['uploadmessage'] : "";
unset($_SESSION['uploadmessage']);

if(empty($gezochteFoto))//nog geen foto opgeladen
{
?>
<div id="rodebalk" class="alert-info">
            <strong>&nbsp;Logo/foto toevoegen aan <?php echo $gezochteVereniging[0]['verNaam']; ?></strong>
            <button id="sluitinfo" type="button" class="close">&times;</button>    
</div>
<div>
Het logo of de foto van een organisatie dient aan de volgende voorwaarden te voldoen:
<ul>
	<li>Enkel logo of foto van het type .jpg, .jpeg, .gif, .png</li>
	<li>Logo of foto is kleiner dan 500 kilobyte.</li>
	<li>Logo of foto van het .png type mag geen transparante achtergrond hebben.</li>
	<li>Geen spatie in de bestandsnaam.</li>
</ul> 
</div>
<p>
            <a href="http://localhost:8080/sociaalhuis/organisaties" class="buttonback" title="Terug naar organisaties">&nbsp;Terug</a>
</p>
<div id="uploaddiv">     
<form action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/organisatiefoto.control.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
                <label for="fileToUpload" class="control-label">Logo/foto kiezen:</label>
                <div class="controls"><input type="file" name="fileToUpload" id="fileToUpload" required></div>
            </div>
            <div class="control-group">
                <label for="naam" class="control-label">Logo/foto opladen:</label>
                <div class="controls">
                	<button id="btnVerenigingFotoSave" name="btnVerenigingFotoSave" type="submit" class="btnsave" title="Logo/foto opslaan">&nbsp;Opslaan</button>
                    <button id="btnVerenigingFotoCancel" type="reset" class="btncancel" title="Formulier ledigen">&nbsp;Cancel</button>
                </div>
            </div>
            
            <div class="control-group">
                 <input id="idHiddenVereniging" name="idHiddenVereniging" type="hidden" value="<?php echo $orgId; ?>">
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
            <strong>&nbsp;<?php echo $gezochteVereniging[0]['verNaam']; ?>: logo/foto verwijderen </strong>
            <button id="sluitinfo" type="button" class="close">&times;</button>    
</div>

<p>
            <a href="http://localhost:8080/sociaalhuis/organisaties" class="buttonback" title="Terug naar organisaties">&nbsp;Terug</a>
</p>
<div id="uploaddiv">     
<form action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/organisatiefoto.control.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return askDeletion()">
                        
            <div class="control-group">
                <label for="naam" class="control-label">Logo/foto wissen:</label>
                <div class="controls">
                	<button id="btnVerenigingFotoDelete" name="btnVerenigingFotoDelete" type="submit" class="btndelete" title="Logo/foto wissen">&nbsp;Verwijderen</button>
                </div>
            </div>
            
            <div class="control-group">
                 <input id="idHiddenFoto" name="idHiddenFoto" type="hidden" value="<?php echo $fotoId; ?>">
            </div> 
            
            <div class="control-group">
                 <input id="idHiddenVereniging" name="idHiddenVereniging" type="hidden" value="<?php echo $orgId; ?>">
            </div>  
</form>
 <div id="uploadMessage"><?php echo $uploadMessage; ?></div>
</div> 
<div id="fotodiv"> 
<?php
/*$_GET['verenigingid'] komt van verenigingcontrol.php*/
if(!empty($gezochteFoto))
{
?>
<img id="<?php echo $gezochteFoto[0]['fNaam'];?>" alt="<?php echo $gezochteFoto[0]['fNaam'];?>" title="<?php echo $gezochteFoto[0]['fNaam'];?>" src="<?php echo "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/view/fotouploads/thumbs/".$gezochteFoto[0]['fNaam']; ?>" />
</div><!--einde fotodiv-->
<?php	
}
}//einde else
?>