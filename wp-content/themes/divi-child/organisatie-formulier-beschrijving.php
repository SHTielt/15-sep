<?php
//get rechtsvormen
$rvObject = new RechtsVorm(); 
$rechtsVormen = $rvObject->selectAll(); 

//sectoren ophalen
$secObject = new Sector(); 
$sectoren = $secObject->selectAll(); 


function checkSector($sectorIds, $sectorId)
{
    foreach($sectorIds as $secid)
    {
        if($secid == $sectorId) {echo "checked";}
    }
}

//komende van organisatieaccountformulier; er is nog geen vereniging geregistreerd in sh_verenigingen; nodig?
if(isset($_GET['wpuserid']))
{
	$user_info = get_userdata($_GET['wpuserid']);
	$wpUserId = $_GET['wpuserid'];
	//echo $wpUserId;
	
	$orgObject = new Vereniging();
	$result = $orgObject->selectVerenigingByUserId($_GET['wpuserid']);
	//print_r($result);
	
	if(!empty($result))
	{
		$orgId = $result[0]['verID'];

    	//sectoren ophalen van 1 vereniging
    	$versecObject = new VerenigingSector();
    	$sectorenVanVereniging = $versecObject->selectSectorenByVerenigingId($orgId);
    
    	$sectorIds = array();
    	foreach($sectorenVanVereniging as $sv)
    	{
        	array_push($sectorIds, $sv['secID']);
    	}
    	//echo "sectorIds: ";
		//print_r($sectorIds);
		$title = "Naar bestuur van ".$result[0]['verNaam'];
	}
	else {
		$orgId = "";
		$title = "";
	}
	
}
 
 

//komende van organisatiebeschrijving.control.php
if(isset($_GET['organisatieid']))
{
	$verObject = new Vereniging();
    $orgId = $_GET['organisatieid'];
	//echo "organisatieid: ".$orgId;
    //$verObject->setVerenigingId($orgId);//nodig voor hidden field
    $result = $verObject->selectVerenigingById($orgId);
	//print_r($result);
	$wpUserId = $result[0]['verWPUserID'];

    //sectoren ophalen van 1 vereniging
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

$toolTip1 = "Gelieve dezelfde naam te gebruiken bij de aanmaak van de pagina van de organisatie in Wordpress.";
$toolTip2 = "Gelieve niet te vergeten dat bij wijziging van deze naam ook de naam van de pagina van de organisatie in Wordpress dient gewijzigd te worden." ;

?>
<div id="rodebalk" class="alert-info">
                <strong>&nbsp;
                <?php if(empty($result)){echo "Profiel toevoegen";}
                 else {echo "Profiel van ".$result[0]['verNaam']." wijzigen";}?>
                </strong>
                <button id="sluitinfo" type="button" class="close">&times;</button>    
</div>
<p>
<a href="http://localhost:8080/sociaalhuis/organisaties" class="buttonback" title="Terug naar organisaties">&nbsp;Terug</a>
<?php if(!empty($_GET['wpuserid']) || !empty($_GET['organisatieid']))
{

?>
<a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-bestuur?organisatieid=".$orgId;?>" class="pull-right buttonnext" title="<?php echo $title; ?>">&nbsp;Naar bestuur</a> 
<?php	
}
?>
</p>

<form id="frmVereniging" method="POST" action="http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/organisatiebeschrijving.control.php" class="form-horizontal">
            <div class="control-group">
                 <label for="naamVereniging" class="control-label">NAAM:</label>
                 <div class="controls">
                 	<input id="naamVereniging" name="naamVereniging" autofocus="true" type="text" value="<?php if(!empty($result)) {echo $result[0]['verNaam'];} ?>"
                 	title="<?php if(empty($_GET['organisatieid']) && empty($result)) {echo $toolTip1; } else {echo $toolTip2;};?>" required><span class="asterisk_input"></span>
                 </div>
            </div>
            
            <div class="control-group">
                 <label for="locatieVereniging" class="control-label">LOCATIE:</label>
                 <div class="controls"><input id="locatieVereniging" name="locatieVereniging" type="text" value="<?php if(!empty($result)) {echo $result[0]['verLocatie'];} ?>"></div>
            </div>
            
            <div class="control-group">
                 <label for="beschrijvingVereniging" class="control-label">KORTE BESCHRIJVING:</label>
                 <div class="controls"><input id="beschrijvingVereniging" name="beschrijvingVereniging" type="text" placeholder="max 25 karakters" value="<?php if(!empty($result)) {echo $result[0]['verBeschrijving'];} ?>"></div>
            </div>
            
            <div class="control-group">
                 <label for="omschrijvingVereniging" class="control-label">OMSCHRIJVING:</label>
                 <div class="controls"><textarea id="omschrijvingVereniging" name="omschrijvingVereniging" placeholder="max 1000 karakters; gebruik <br /> voor een regeleinde; gebruik <br /><br /> voor een nieuwe alinea" rows="10" required><?php if(!empty($result)) {echo $result[0]['verOmschrijving'];} ?></textarea><span class="asterisk_input"></span></div>
            </div>
            
            <div class="control-group">
                 <label for="werkingsGebiedVereniging" class="control-label">WERKINGSGEBIED:</label>
                 <div class="controls"><input id="werkingsGebiedVereniging" name="werkingsGebiedVereniging" type="text" value="<?php if(!empty($result)) {echo $result[0]['verWerkingsGebied'];} ?>"></div>
            </div>
            
            <div class="control-group">
            <label for="websiteVereniging" class="control-label">WEBSITE:&nbsp;</label>
            <div class="controls">
                 <input id="websiteVereniging" name="websiteVereniging" type="text" placeholder="www.voorbeeld.be" value="<?php if(!empty($result)) {echo $result[0]['verWebsite'];} ?>" >
            </div>
            </div>
            
            <div class="control-group">
                 <label for="facebookVereniging" class="control-label">FACEBOOK:</label>
                 <div class="controls"><input id="facebookVereniging" name="facebookVereniging" type="text" placeholder="www.facebook.com/voorbeeld" value="<?php if(!empty($result)) {echo $result[0]['verFacebook'];} ?>"></div>
            </div>
            
            <div class="control-group">
            <label for="rvVereniging" class="control-label">JURIDISCHE VORM:</label>
            <div class="controls">
            <select id="rvVereniging" name="rvVereniging" required>
                <option value=""></option>
                <?php
                    foreach($rechtsVormen as $rv)
                    {
                ?>
                <option value="<?php echo $rv['rvID'];?>" <?php if(!empty($result)) {if($result[0]['rvID'] == $rv['rvID']) {echo "selected";}}?>><?php echo $rv['rvNaam'];?></option>
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
                        <input class="uniform_sec" type="checkbox" name="sector[]" value="<?php echo $sector['secID']; ?>" <?php if(!empty($sectorIds)){ checkSector($sectorIds, $i);} ?> > <?php echo $sector['secNaam']; ?><br />
                    <?php
                    }
                    ?>
                    </div>
                    <span id="sectorenasterisk" class="asterisk_input"></span>
                  </div>
            </div>
            
            
            <div class="control-group">
                <label for="actiefVereniging" class="control-label">ACTIEF:</label>
                <div class="controls">
                	<div><input id="actiefVereniging" name="actiefVereniging" type="checkbox" value="1" <?php if(!empty($result)) {echo ($result[0]['verActief'] == 1)? 'checked' : '' ;}?>></div>
               	</div>
            </div>
            
            <div class="control-group">
                 <input id="idHidden" name="idHidden" type="hidden" value="<?php if(!empty($result)) {echo $result[0]['verID'];} ?>">
            </div> 
            
            <div class="control-group">
                 <input id="verWPUserID" name="verWPUserID" type="hidden" value="<?php if(!empty($wpUserId)) {echo $wpUserId;} ?>">
            </div>  
            
            <div class="control-group">
                <div class="controls">
                <?php
                if(empty($_GET['organisatieid']) && empty($result))
                {    
                ?>
                <button id="btnVerenigingSave" name="btnVerenigingSave" type="submit" class="btnsave" title="Profiel opslaan">&nbsp;Opslaan</button>
                <button id="btnVerenigingCancel" type="reset" class="btncancel" title="Formulier ledigen">&nbsp;Cancel</button>
                <?php
                }
				else
                {
                ?>
                <button id="btnVerenigingUpdate" name="btnVerenigingUpdate" type="submit" class="btnupdate" title="Profiel wijzigen">&nbsp;Wijzigen</button>
                <?php
                }
                ?>
                </div>
            </div>          
         </form>