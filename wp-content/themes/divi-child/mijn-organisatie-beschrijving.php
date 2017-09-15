<?php
//get wpuserid
$current_user = wp_get_current_user();
$wpUserId = $current_user->ID;
//echo "wpuserid: ".$wpUserId;

//get rechtsvormen
$rvObject = new RechtsVorm(); 
$rechtsVormen = $rvObject->selectAll(); 

//get sectors
$secObject = new Sector(); 
$sectoren = $secObject->selectAll(); 


function checkSector($sectorIds, $sectorId)
{
    foreach($sectorIds as $secid)
    {
        if($secid == $sectorId) {echo "checked";}
    }
}

//komende van inlog
$orgObject = new Vereniging();
$result = $orgObject->selectVerenigingByUserId($wpUserId);
//print_r($result);
	
if(!empty($result))
{
		//sectoren ophalen van 1 vereniging
		$orgId = $result[0]['verID'];
    	$versecObject = new VerenigingSector();
    	$sectorenVanVereniging = $versecObject->selectSectorenByVerenigingId($orgId);
    
    	$sectorIds = array();
    	foreach($sectorenVanVereniging as $sv)
    	{
        	array_push($sectorIds, $sv['secID']);
    	}
		//echo "sectorIds: ";
		//print_r($sectorIds);
}

		




 
?>
<div id="rodebalk1" class="alert-info">
                <strong>&nbsp;<?php if(empty($result)) {echo "Organisatie beschrijving toevoegen";} else {echo "Organisatie beschrijving wijzigen";}?></strong>
</div>

<!--<form id="frmVereniging" method="POST" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/mijnorgbes.control.php" class="form-horizontal" enctype="multipart/form-data" >-->
            <div class="control-group">
                 <label for="naamOrganisatie" class="control-label">NAAM:</label>
                 <div class="controls"><input id="naamOrganisatie" name="naamOrganisatie" autofocus="true" type="text" value="<?php if(isset($result)) {echo $result[0]['verNaam'];} ?>" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                 <label for="locatieOrganisatie" class="control-label">LOCATIE:</label>
                 <div class="controls"><input id="locatieOrganisatie" name="locatieOrganisatie" type="text" value="<?php if(isset($result)) {echo $result[0]['verLocatie'];} ?>"></div>
            </div>
            
            <div class="control-group">
                 <label for="beschrijvingOrganisatie" class="control-label">KORTE BESCHRIJVING:</label>
                 <div class="controls"><input id="beschrijvingOrganisatie" name="beschrijvingOrganisatie" type="text" placeholder="max 30 karakters" value="<?php if(isset($result)) {echo $result[0]['verBeschrijving'];} ?>"></div>
            </div>
            
            <div class="control-group">
                 <label for="omschrijvingOrganisatie" class="control-label">OMSCHRIJVING:</label>
                 <div class="controls"><textarea id="omschrijvingOrganisatie" name="omschrijvingOrganisatie" placeholder="max 1000 karakters" rows="10" cols="100" required><?php if(isset($result)) {echo $result[0]['verOmschrijving'];} ?></textarea><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                 <label for="werkingsGebiedOrganisatie" class="control-label">WERKINGSGEBIED:</label>
                 <div class="controls"><input id="werkingsGebiedOrganisatie" name="werkingsGebiedOrganisatie" type="text" value="<?php if(isset($result)) {echo $result[0]['verWerkingsGebied'];} ?>"></div>
            </div>
            
            <div class="control-group">
            <label for="websiteOrganisatie" class="control-label">WEBSITE:&nbsp;</label>
            <div class="controls">
                 <input id="websiteOrganisatie" name="websiteOrganisatie" type="text" placeholder="www.voorbeeld.be" value="<?php if(isset($result)) {echo $result[0]['verWebsite'];} ?>" >
            </div>
            </div>
            
            <div class="control-group">
                 <label for="facebookOrganisatie" class="control-label">FACEBOOK:</label>
                 <div class="controls"><input id="facebookOrganisatie" name="facebookOrganisatie" type="text" placeholder="www.facebook.com/voorbeeld" value="<?php if(isset($result)) {echo $result[0]['verFacebook'];} ?>"></div>
            </div>
            
            <div class="control-group">
            <label for="rvOrganisatie" class="control-label">JURIDISCHE VORM:</label>
            <div class="controls">
            <select id="rvOrganisatie" name="rvOrganisatie" required>
                <option value=""></option>
                <?php
                    foreach($rechtsVormen as $rv)
                    {
                ?>
                <option value="<?php echo $rv['rvID'];?>" <?php if($result[0]['rvID'] == $rv['rvID']) {echo "selected";}?>><?php echo $rv['rvNaam'];?></option>
                <?php
                    }
                ?>
            </select><span class="asterisk_input"></span>
            </div>
            </div>
            
            
            <div class="control-group">
                  <label class="control-label">SECTOREN:</label>
                  <div class="controls">
                  	<div id="sectorenfieldset">
                    <?php foreach($sectoren as $sector)  
                    {
                        $i = $sector['secID'];
                    ?>
                        <input id="<?php echo "cbSector".$i;?>" class="uniform_sec" type="checkbox" name="sector[]" value="<?php echo $sector['secID']; ?>" <?php if(isset($sectorIds)){ checkSector($sectorIds, $i);} ?> > <?php echo $sector['secNaam']; ?><br />
                    <?php
                    }
                    ?>
                    </div>
                    <span id="sectorenasterisk" class="asterisk_input"></span>
                  </div>
            </div>
            
            
            <div class="control-group">
                 <input id="idOrganisatie" name="idOrganisatie" type="hidden" value="<?php if(isset($result)) {echo $result[0]['verID'];} ?>">
            </div> 
            
            <div class="control-group">
                 <input id="wpUserID" name="wpUserID" type="hidden" value="<?php echo $wpUserId; ?>">
            </div>  
            
            <div class="control-group">
                <div class="controls">
                <button id="btnOrganisatieSave" name="btnOrganisatieSave" type="submit" class="btnsave">&nbsp;Opslaan</button>
                <button id="btnOrganisatieCancel" name="btnOrganisatieCancel" type="submit" class="btncancel">&nbsp;Cancel</button>
                <button id="btnOrganisatieUpdate" name="btnOrganisatieUpdate" type="submit" class="btnupdate">&nbsp;Wijzigen</button>
                </div>
            </div>          
    <!--     </form>-->