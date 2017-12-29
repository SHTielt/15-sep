<?php
//overzichtsformulier van bestuurders
get_header();

//functie van bestuurslid ophalen
function getFunctie($funcId)
{
	if(!empty($funcId)){
		$funcObject = new Functie();
    	$result = $funcObject->selectFunctieById($funcId);
    	echo $result[0]['funcNaam'];
	}
	else {
		echo "";
	}
    
}

//$_GET['organisatieid']) is nooit leeg want kan nt bereikt worden zonder URL met querystring
if(isset($_GET['organisatieid']))
{
	$bestObject = new Bestuurder();
	$orgId = $_GET['organisatieid'];
	$bestuurders = $bestObject->selectBestuurderByVerenigingId($orgId);	
	//print_r($bestuurders);
	//naam van de vereniging ophalen
	$verObject = new Vereniging();
	$gezochteVer = $verObject->selectVerenigingById($orgId);
}



 
?>
<div id="overzichtBestuurders">
<div id="rodebalk" class="alert-info">
                <strong>&nbsp;Bestuurders van <?php echo $gezochteVer[0]['verNaam']?></strong>
                <button id="sluitinfo" type="button" class="close">&times;</button>    
</div>

<div id="actionsdiv">
			<a href="http://localhost:8080/sociaalhuis/organisaties" class="pull-left buttonback" title="Terug naar organisaties">Terug</a>
            <a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-bestuurder?organisatieid=".$_GET['organisatieid']; ?>" class="pull-left buttonadd" title="Bestuurder toevoegen">&nbsp;Bestuurder toevoegen</a>
            <a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-contact?organisatieid=".$_GET['organisatieid']; ?>" class="pull-right buttonadd" title="<?php echo "Naar contact van ".$gezochteVer[0]['verNaam']; ?>">&nbsp;Naar contact</a>
            
</div>
<table id="bestTabel">
<thead>
<tr>
<th class="sorteer alfabet sh_bestvoornaam">Voornaam</th>	
<th class="sorteer alfabet sh_bestnaam">Naam</th>
<th class="sorteer alfabet sh_bestfunctie">Functie</th>
<th class="sorteer alfabet sh_bestemail">E-mail adres</th>
<th class="sh_actie">Actie</th>
</tr>
</thead>
<tbody>
<?php
if(count($bestuurders) == 0)
{
?>
<tr>
<td colspan="5">
<?php
	echo "Geen bestuurders.";
?>
</td>	
</tr>
<?php	
}
else
{
	

foreach($bestuurders as $bestuurder)
{
    $i = $bestuurder['bestID'];
?>
<tr>
<td><?php  echo $bestuurder['bestVoornaam']; ?></td>	
<td><?php  echo $bestuurder['bestNaam']; ?></td>
<td><?php  getFunctie($bestuurder['funcID']); ?></td>
<td><?php echo $bestuurder['bestEmail']; ?></td>
<td class="sh_actie">
	
<form method="post" action="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-bestuurder?organisatieid=".$_GET['organisatieid'] ?>" class="sh_form_edit">
    <input name="bestuurderId" value="<?php echo $i; ?>" type="hidden" />
    <input name="verenigingId" value="<?php echo $orgId; ?>" type="hidden" />
    <input type="submit" value="Editeer" class="btnedit" title="Bestuurder editeren" /> 
</form>
<button id="<?php echo "bestBtnDelete".$i?>" title="Bestuurder wissen" class="btndelete">Wis</button>

</td>
</tr>
<?php
}//end foreach
}//end else ?>
</tbody>
</table>
</div>

