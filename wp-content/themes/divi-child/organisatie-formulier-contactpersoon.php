<?php

//toevoegen en editeren contactpersoon; komende van overzicht van organisatie contact
if(isset( $_GET['organisatieid']))
{
	$orgId = $_GET['organisatieid'];
	//bestuursleden van de vereniging ophalen
	$bestObject = new Bestuurder();
	$bestuursLeden = $bestObject->selectBestuurderbyVerenigingId($orgId);
	//print_r($bestuursLeden) ;
	//contactpersoon van de vereniging ophalen
	$cpObject = new ContactPersoon();
	$cPersoon = $cpObject->selectContactPersoonByVerenigingId($orgId);
	//print_r($cPersoon);
	//naam van de vereniging ophalen
	$verObject = new Vereniging();
	$gezochteVer = $verObject->selectVerenigingById($orgId);
 	$naamOrg = $gezochteVer[0]['verNaam'];
}
else
{
	$orgId = "";
}

//contactvoorkeuren ophalen
$cvObject = new ContactVoorkeur(); 
$contactVoorkeuren = $cvObject->selectAll();



?>


<div id="rodebalk" class="alert-info">
                <strong>&nbsp;<?php if(empty($cPersoon)){echo $naamOrg.": Contactpersoon toevoegen";} else {echo $naamOrg.": Contactpersoon wijzigen";}?></strong>
                <button id="sluitinfo" type="button" class="close">&times;</button>    
</div>

<?php if(empty($cPersoon))
{
?>	
<p style="padding-bottom: 1em; text-align: justify;">Gelieve een bestuurslid als contactpersoon aan te duiden of voer de data van een nieuwe persoon in.</p>
<?php
}
else
{
?>
<p style="padding-bottom: 1em; text-align: justify;">Gelieve een ander bestuurslid als contactpersoon aan te duiden of wijzig de data van de contactpersoon.</p>
<?php
}
?>
<div id="actionsdiv">
    <a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-contact?organisatieid=".$orgId; ?>" class="buttonback" title="<?php echo "Terug naar contact van ".$gezochteVer[0]['verNaam']; ?>">&nbsp;Terug</a>
    <a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-logo?organisatieid=".$_GET['organisatieid']; ?>" class="pull-right buttonadd" title="<?php echo "Naar logo/foto van ".$gezochteVer[0]['verNaam']; ?>">&nbsp;Naar logo/foto</a>
</div>

<form id="frmContactPersoon" method="POST" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/contactpersoon.control.php" class="form-horizontal">
            <div class="control-group">
            <label for="bestContactPersoon" class="control-label">BESTUURSLID:</label>
            <div class="controls">
            <select id="bestContactPersoon" name="bestContactPersoon">
                <option value="0">Kies bestuurslid</option>
                <?php
                    foreach($bestuursLeden as $bestuursLid)
                    {
                ?>
                <option value="<?php echo $bestuursLid['bestID'];?>" ><?php echo $bestuursLid['bestVoornaam']." ".$bestuursLid['bestNaam'];?></option>
                <?php
                    }
                ?>
            </select>
            </div>
            </div> 
            
            <div class="control-group">
                 <label for="voornaamContactPersoon" class="control-label">VOORNAAM:</label>
                 <div class="controls"><input id="voornaamContactPersoon" name="voornaamContactPersoon" type="text"  value="<?php if(!empty($cPersoon)) {echo $cPersoon[0]['contVoornaam'];} ?>" required autofocus="true"><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                 <label for="naamContactPersoon" class="control-label">NAAM:</label>
                 <div class="controls"><input id="naamContactPersoon" name="naamContactPersoon" type="text" value="<?php if(!empty($cPersoon)) {echo $cPersoon[0]['contNaam'];} ?>" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                  <label for="infoContactPersoon" class="control-label">EXTRA INFO:</label>
                  <div class="controls">
                  	<textarea id="infoContactPersoon" name="infoContactPersoon" rows="5" placeholder="max 255 karakters" style="resize: none"><?php if(!empty($cPersoon)) {echo $cPersoon[0]['contInfo'];} ?></textarea>
                  </div>
            </div>
            
            <div class="control-group">
                 <label for="emailContactPersoon" class="control-label">E-MAIL:</label>
                 <div class="controls"><input id="emailContactPersoon" name="emailContactPersoon" type="text" value="<?php if(!empty($cPersoon)) {echo $cPersoon[0]['contEmail'];} ?>"></div>
            </div>
            
            <div class="control-group">
                 <label for="gsmContactPersoon" class="control-label">GSM:</label>
                 <div class="controls"><input id="gsmContactPersoon" name="gsmContactPersoon" type="text" value="<?php if(!empty($cPersoon)) {echo $cPersoon[0]['contGSM'];} ?>"></div>
            </div>
            
            <div class="control-group">
                 <label for="telContactPersoon" class="control-label">TELEFOON:</label>
                 <div class="controls"><input id="telContactPersoon" name="telContactPersoon" type="text" value="<?php if(!empty($cPersoon)) {echo $cPersoon[0]['contTelefoon'];} ?>"></div>
            </div>
            
            <div class="control-group">
            <label for="cvContactPersoon" class="control-label">CONTACT VOORKEUR:</label>
            <div class="controls">
            <select id="cvContactPersoon" name="cvContactPersoon">
                <option></option>
                <?php
                    foreach($contactVoorkeuren as $cv)
                    {
                ?>
                <option value="<?php echo $cv['cvID'];?>" <?php if(!empty($cPersoon)){if($cPersoon[0]['cvID'] == $cv['cvID']) {echo "selected";}}?>><?php echo $cv['cvVoorkeur'];?></option>
                <?php
                    }
                ?>
            </select>
            </div>
            </div>
            
            <div class="control-group">
                 <input id="idContactPersoon" name="idContactPersoon" type="hidden" value="<?php if(!empty($cPersoon)) {echo $cPersoon[0]['contID'];} ?>">
            </div> 
                       
            <div class="control-group">
                 <input id="idVereniging" name="idVereniging" type="hidden" value="<?php echo $orgId; ?>">
            </div>  
                   
            <div class="control-group">
                <div class="controls">
                <?php
                if(empty($cPersoon))
                {    
                ?>
                <button id="btnContactPersoonSave" name="btnContactPersoonSave" type="submit" class="btnsave" title="Contactpersoon opslaan">&nbsp;Opslaan</button>
                <button id="btnContactPersoonCancel" type="reset" class="btncancel" title="Formulier ledigen">&nbsp;Cancel</button>
                <?php
                }
                else
                {
                ?>
                <button id="btnContactPersoonUpdate" name="btnContactPersoonUpdate" type="submit" class="btnupdate" title="Contactpersoon wijzigen">&nbsp;Wijzigen</button>
              
                <?php
                }
                ?>
                </div>
            </div>          
</form>


