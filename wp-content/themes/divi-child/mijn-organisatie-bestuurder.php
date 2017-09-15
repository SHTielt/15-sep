<?php
//get wpuserid
$current_user = wp_get_current_user();
$wpUserId = $current_user->ID;
//echo "wpuserid: ".$wpUserId;

//get id van de organisatie
$orgObject = new Vereniging();
$gezochteOrg = $orgObject->selectVerenigingByUserId($wpUserId);
//print_r($gezochteOrg);
	
//contactvoorkeuren ophalen
$cvObject = new ContactVoorkeur(); 
$contactVoorkeuren = $cvObject->selectAll();

//functies ophalen
$funcObject = new Functie(); 
$functies = $funcObject->selectAll();

?>

<div id="bestuurderFormulier">
<div>
    <button id="bestBtnBack" class="buttonback" title="<?php echo "Terug naar bestuur van ".$gezochteOrg[0]['verNaam'];?>">&nbsp;Terug naar bestuur</a>
</div>

<div id="rodebalk3" class="alert-info">
                <strong>&nbsp;<?php echo "Bestuurder toevoegen";?></strong>
</div>


            <div class="control-group">
            <label for="funcBestuurder" class="control-label">FUNCTIE:</label>
            <div class="controls">
            <select id="funcBestuurder" name="funcBestuurder" autofocus>
                <option></option>
                <?php
                    foreach($functies as $func)
                    {
                ?>
                <option value="<?php echo $func['funcID'];?>"><?php echo $func['funcNaam'];?></option>
                <?php
                    }
                ?>
            </select>
            </div>
            </div>
           
            <div class="control-group">
                 <label for="voornaamBestuurder" class="control-label">VOORNAAM:</label>
                 <div class="controls"><input id="voornaamBestuurder" name="voornaamBestuurder" type="text"  value="" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                 <label for="naamBestuurder" class="control-label">NAAM:</label>
                 <div class="controls"><input id="naamBestuurder" name="naamBestuurder" type="text" value="" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                  <label for="infoBestuurder" class="control-label">EXTRA INFO:</label>
                  <div class="controls">
                  	<textarea id="infoBestuurder" name="infoBestuurder" rows="5" cols="40" placeholder="max 255 karakters" style="resize: none"></textarea>
                  </div>
            </div>
            
            <div class="control-group">
                 <label for="emailBestuurder" class="control-label">E-MAIL:</label>
                 <div class="controls"><input id="emailBestuurder" name="emailBestuurder" type="text" value=""></div>
            </div>
            
            <div class="control-group">
                 <label for="gsmBestuurder" class="control-label">GSM:</label>
                 <div class="controls"><input id="gsmBestuurder" name="gsmBestuurder" type="text" value=""></div>
            </div>
            
            <div class="control-group">
                 <label for="telBestuurder" class="control-label">TELEFOON:</label>
                 <div class="controls"><input id="telBestuurder" name="telBestuurder" type="text" value=""></div>
            </div>
            
            <div class="control-group">
            <label for="cvBestuurder" class="control-label">CONTACT VOORKEUR:</label>
            <div class="controls">
            <select id="cvBestuurder" name="cvBestuurder">
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
                 <input id="idBestuurder" name="idBestuurder" type="hidden" value="">
            </div>
            
            <div class="control-group">
                 <input id="idVereniging" name="idVereniging" type="hidden" value="<?php if(!empty($gezochteOrg)){echo $gezochteOrg[0]['verID']; }?>">
            </div>  
                   
            <div class="control-group">
                <div class="controls">
                
                <button id="btnBestuurderSave" name="btnBestuurderSave" type="submit" class="btnsave">&nbsp;Opslaan</button>
                <button id="btnBestuurderUpdate" name="btnBestuurderUpdate" type="submit" class="btnupdate">&nbsp;Wijzigen</button>
                
                </div>
            </div>          
 
</div>

