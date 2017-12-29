<?php
//get wpuserid
$current_user = wp_get_current_user();
$wpUserId = $current_user->ID;
//echo "wpuserid: ".$wpUserId;

//komende van inlog
//organisatie ophalen
$orgObject = new Vereniging();
$gezochteVer = $orgObject->selectVerenigingByUserId($wpUserId);
//print_r($gezochteVer);
if(!empty($gezochteVer))
{
	$organisatieId = $gezochteVer[0]['verID'];
	//contactpersoon ophalen
	$contObject = new ContactPersoon();
	$contact = $contObject->selectContactPersoonByVerenigingId($organisatieId);	
	//print_r($contact);
}


?>

<div id="overzichtContact">
<div id="rodebalk4" class="alert-info">
                <strong><?php if(empty($gezochteVer)){echo "&nbsp;Contactpersoon";} else { echo "&nbsp;Contactpersoon van "; echo $gezochteVer[0]['verNaam'];}?></strong>
</div>

<?php if(empty($contact))
{
?>	

<div id="cpactionsdiv">
			<a id="cpBtn" class="pull-left buttonadd" title="Contactpersoon toevoegen">&nbsp;Contactpersoon toevoegen</a>
</div>
<?php
}
?>

<table id="contactTabel">
<thead>
<tr>
<th class="sh_contvoornaam">Voornaam</th>	
<th class="sh_contnaam">Naam</th>
<th class="sh_contwijze">Hoe contacteren?</th>
<th class="sh_actie">Actie</th>
</tr>
</thead>
<tbody>
<?php
if(empty($contact))
{
?>
<tr>
<td colspan="4">
<?php
	echo "Momenteel is er geen contactpersoon.";
?>
</td>	
</tr>
<?php	
}
else
{
$i = $contact[0]['contID'];
?>
<tr>
<td><?php  echo $contact[0]['contVoornaam']; ?></td>	
<td><?php  echo $contact[0]['contNaam']; ?></td>
<td>
<?php
if(!empty($contact[0]['cvID']))
{
switch ($contact[0]['cvID'])
{
	case 1:
		echo $contact[0]['contEmail'];
		break;
	case 2:
		echo $contact[0]['contGSM'];
		break;
	case 3:
		echo $contact[0]['contTelefoon'];
		break;
}
}
else
{
	if(!empty($contact[0]['contEmail']))
	{
		 echo $contact[0]['contEmail'];
	}
	elseif (!empty($contact[0]['contGSM'])) {
		echo $contact[0]['contGSM'];
	}
	else {
		echo $contact[0]['contTelefoon'];
	}
	
}
?>
</td>
<td class="sh_actie">
<button id="<?php echo "contBtnEdit".$i; ?>" class="btnedit" title="Contactpersoon editeren">Editeer</button> 
<button id="<?php echo "contBtnDelete".$i; ?>" title="Contactpersoon wissen" class="btndelete">Wis</button>
</td>
</tr>
<?php
}//end else ?>
</tbody>
</table>
</div>