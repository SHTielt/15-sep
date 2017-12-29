<?php
//bestuurder toevoegen; komende van overzicht bestuurders; $_GET['organisatieid'] is nooit leeg
if(isset( $_GET['organisatieid']))
{
	$orgId = $_GET['organisatieid'];
	//naam van de vereniging ophalen
	$verObject = new Vereniging();
	$gezochteVer = $verObject->selectVerenigingById($orgId);
	$naamOrg = $gezochteVer[0]['verNaam'];
}
else
{
	$orgId = "";
}
  
//bestuurder editeren: komende van overzicht bestuurders; $_POST['verenigingId'] is altijd set
if(isset($_POST['bestuurderId']))
{
	//echo "dollarpostbestuurderid: ".$_POST['bestuurderId']."<br />";
	$bestuurderId = $_POST['bestuurderId'];
	$bestuurderObject = new Bestuurder();
	$bestuurderObject->setBestuurderId($bestuurderId);
	$result = $bestuurderObject->selectBestuurderById($bestuurderId);
	
}
else
{
	$bestuurderObject = new Bestuurder();
	$bestuurderObject->setBestuurderId("");
}
 
 

//contactvoorkeuren ophalen
$cvObject = new ContactVoorkeur(); 
$contactVoorkeuren = $cvObject->selectAll();

//functies ophalen
$funcObject = new Functie(); 
$functies = $funcObject->selectAll();
//print_r($functies);

?>

<div id="bestuurderFormulier">
	<div id="rodebalk" class="alert-info">
                <strong>&nbsp;<?php if(empty($_POST['bestuurderId'])){echo $naamOrg.": Bestuurder toevoegen";} else {echo $naamOrg.": Bestuurder wijzigen";}?></strong>
                <button id="sluitinfo" type="button" class="close">&times;</button>    
</div>
<p>
    <a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-bestuur?organisatieid=".$orgId; ?>" class="buttonback" title="Terug naar bestuur organisatie">&nbsp;Terug</a>
</p>

<form id="frmBestuurder" method="POST" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/bestuurder.control.php" class="form-horizontal" onsubmit="return validateFrm()">
            <div class="control-group">
            <label for="funcBestuurder" class="control-label">FUNCTIE:</label>
            <div class="controls">
            <select id="funcBestuurder" name="funcBestuurder" autofocus>
                <option></option>
                <?php
                    foreach($functies as $func)
                    {
                ?>
                <option value="<?php echo $func['funcID'];?>" <?php if(!empty($result[0]['funcID'])){if($result[0]['funcID'] == $func['funcID']) {echo "selected";}}?>><?php echo $func['funcNaam'];?></option>
                <?php
                    }
                ?>
            </select>
            </div>
            </div>
           
            <div class="control-group">
                 <label for="voornaamBestuurder" class="control-label">VOORNAAM:</label>
                 <div class="controls"><input id="voornaamBestuurder" name="voornaamBestuurder" type="text"  value="<?php if(!empty($result)) {echo $result[0]['bestVoornaam'];} ?>" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                 <label for="naamBestuurder" class="control-label">NAAM:</label>
                 <div class="controls"><input id="naamBestuurder" name="naamBestuurder" type="text" value="<?php if(!empty($result)) {echo $result[0]['bestNaam'];} ?>" required><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                  <label for="infoBestuurder" class="control-label">EXTRA INFO:</label>
                  <div class="controls">
                  	<textarea id="infoBestuurder" name="infoBestuurder" rows="5" cols="40" placeholder="max 255 karakters" style="resize: none"><?php if(!empty($result)) {echo $result[0]['bestInfo'];} ?></textarea>
                  </div>
            </div>
            
            <div class="control-group">
                 <label for="emailBestuurder" class="control-label">E-MAIL:</label>
                 <div class="controls"><input id="emailBestuurder" name="emailBestuurder" type="text" value="<?php if(!empty($result)) {echo $result[0]['bestEmail'];} ?>"></div>
            </div>
            
            <div class="control-group">
                 <label for="gsmBestuurder" class="control-label">GSM:</label>
                 <div class="controls"><input id="gsmBestuurder" name="gsmBestuurder" type="text" value="<?php if(!empty($result)) {echo $result[0]['bestGSM'];} ?>"></div>
            </div>
            
            <div class="control-group">
                 <label for="telBestuurder" class="control-label">TELEFOON:</label>
                 <div class="controls"><input id="telBestuurder" name="telBestuurder" type="text" value="<?php if(!empty($result)) {echo $result[0]['bestTelefoon'];} ?>"></div>
            </div>
            
            <!--
            <div class="control-group">
            <label for="cvBestuurder" class="control-label">CONTACT VOORKEUR:</label>
            <div class="controls">
            <select id="cvBestuurder" name="cvBestuurder">
                <option></option>
                <?php
                    foreach($contactVoorkeuren as $cv)
                    {
                ?>
                <option value="<?php echo $cv['cvID'];?>" <?php if(!empty($result[0]['funcID'])){if($result[0]['cvID'] == $cv['cvID']) {echo "selected";}}?>><?php echo $cv['cvVoorkeur'];?></option>
                <?php
                    }
                ?>
            </select>
            </div>
            </div>
            -->
            
            <div class="control-group">
                 <input id="idBestuurder" name="idBestuurder" type="hidden" value="<?php echo $bestuurderObject->getBestuurderId(); ?>">
            </div>
            
            <div class="control-group">
                 <input id="idVereniging" name="idVereniging" type="hidden" value="<?php echo $orgId; ?>">
            </div>  
                   
            <div class="control-group">
                <div class="controls">
                <?php
                if(empty($_POST['bestuurderId']))
                {   
				?>
                <button id="btnBestuurderSave" name="btnBestuurderSave" type="submit" class="btnsave" title="Bestuurder opslaan">&nbsp;Opslaan</button>
                <button id="btnBestuurderCancel" type="reset" class="btncancel" title="Formulier ledigen">&nbsp;Cancel</button>
                <?php
                }
                else
                {
                ?>
                <button id="btnBestuurderUpdate" name="btnBestuurderUpdate" type="submit" class="btnupdate" title="Bestuurder wijzigen">&nbsp;Wijzigen</button>
                <?php
                }
                ?>
                </div>
            </div>          
         </form>
</div>

