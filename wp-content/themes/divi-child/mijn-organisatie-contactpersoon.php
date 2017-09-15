<?php
//get wpuserid
$current_user = wp_get_current_user();
$wpUserId = $current_user->ID;
//echo "wpuserid: ".$wpUserId;

//get id van de organisatie
$orgObject = new Vereniging();
$gezochteOrg = $orgObject->selectVerenigingByUserId($wpUserId);
$organisatieId = $gezochteOrg[0]['verID'];
//print_r($gezochteOrg);
	
//contactvoorkeuren ophalen
$cvObject = new ContactVoorkeur(); 
$contactVoorkeuren = $cvObject->selectAll();

//bestuursleden van de organisatie ophalen
$bestObject = new Bestuurder();
$bestuursLeden = $bestObject->selectBestuurderbyVerenigingId($organisatieId);
//print_r($bestuursLeden) ;

?>

<div id="contactPersoonFormulier">
<div>
    <button id="cpBtnBack" class="buttonback" title="<?php echo "Terug" ;?>">&nbsp;Terug</a>
</div>

<div id="rodebalk5" class="alert-info">
    <strong>&nbsp;<?php echo "Contactpersoon toevoegen";?></strong>
</div>

<div>Gelieve een bestuurslid als contactpersoon aan te duiden of voer de data in van een nieuw persoon.</div>

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
                 <div class="controls"><input id="voornaamContactPersoon" name="voornaamContactPersoon" type="text"  value="" required autofocus="true"><span class="asterisk_input"></span></div>
</div>
            
            <div class="control-group">
                 <label for="naamContactPersoon" class="control-label">NAAM:</label>
                 <div class="controls"><input id="naamContactPersoon" name="naamContactPersoon" type="text" value="" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                  <label for="infoContactPersoon" class="control-label">EXTRA INFO:</label>
                  <div class="controls">
                  	<textarea id="infoContactPersoon" name="infoContactPersoon" rows="5" cols="40" placeholder="max 255 karakters" style="resize: none"></textarea>
                  </div>
            </div>
            
            <div class="control-group">
                 <label for="emailContactPersoon" class="control-label">E-MAIL:</label>
                 <div class="controls"><input id="emailContactPersoon" name="emailContactPersoon" type="text" value=""></div>
            </div>
            
            <div class="control-group">
                 <label for="gsmContactPersoon" class="control-label">GSM:</label>
                 <div class="controls"><input id="gsmContactPersoon" name="gsmContactPersoon" type="text" value=""></div>
            </div>
            
            <div class="control-group">
                 <label for="telContactPersoon" class="control-label">TELEFOON:</label>
                 <div class="controls"><input id="telContactPersoon" name="telContactPersoon" type="text" value=""></div>
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
                <option value="<?php echo $cv['cvID'];?>"><?php echo $cv['cvVoorkeur'];?></option>
                <?php
                    }
                ?>
            </select>
            </div>
            </div>
            
            <div class="control-group">
                 <input id="idContactPersoon" name="idContactPersoon" type="hidden" value="">
            </div> 
                       
            <div class="control-group">
                 <input id="idVereniging" name="idVereniging" type="hidden" value="<?php echo $organisatieId; ?>">
            </div>  
                   
            <div class="control-group">
                <div class="controls">
                
                <button id="btnContactPersoonSave" type="submit" class="btnsave">&nbsp;Opslaan</button>
                <button id="btnContactPersoonUpdate" type="submit" class="btnupdate">&nbsp;Wijzigen</button>
                              
                </div>
            </div>          
</form>

            
 
</div>

