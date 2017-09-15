<?php
//overzichtsformulier van bestuurders
//get wpuserid
$current_user = wp_get_current_user();
$wpUserId = $current_user->ID;
//echo "wpuserid: ".$wpUserId;

//komende van inlog
//organisatie ophalen
$orgObject = new Vereniging();
$gezochteVer = $orgObject->selectVerenigingByUserId($wpUserId);
//print_r($gezochteVer);
$organisatieId = $gezochteVer[0]['verID'];
	
//bestuurders ophalen
$bestObject = new Bestuurder();
$bestuurders = $bestObject->selectBestuurderByVerenigingId($organisatieId);	
//print_r($bestuurders);
 
?>

<div id="overzichtBestuurders">
<div id="rodebalk2" class="alert-info">
                <strong>&nbsp;Bestuurders van <?php echo $gezochteVer[0]['verNaam']?></strong>
</div>

<div id="actionsdiv">
			<a id="bestuurderBtn" class="pull-left buttonadd">&nbsp;Bestuurder toevoegen</a>
</div>

<table id="bestuurdersTabel">
<thead>
<tr>
<th class="sh_bestvoornaam">Voornaam</th>	
<th class="sh_bestnaam">Naam</th>
<th class="sh_bestfunctie">Functie</th>
<th class="sh_bestemail">E-mail adres</th>
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
<td><?php  echo $bestuurder['funcNaam']; ?></td>
<td><?php echo $bestuurder['bestEmail']; ?></td>
<td class="sh_actie">
<button id="<?php echo "bestBtnEdit".$i; ?>" class="btnedit" title="edit">Editeer</button> 
<button id="<?php echo "bestBtnDelete".$i; ?>" title="wis" class="btndelete">Wis</button>
</td>
</tr>
<?php
}//end foreach
}//end else ?>
</tbody>
</table>
</div>
