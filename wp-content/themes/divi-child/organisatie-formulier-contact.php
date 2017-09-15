<?php
//overzicht van contact

 get_header();?>
<?php
//$_GET['verenigingid']) is nooit leeg want kan nt bereikt worden zonder URL met querystring
if(isset($_GET['organisatieid']))
{
	$contObject = new ContactPersoon();
	$verenigingId = $_GET['organisatieid'];
	$contact = $contObject->selectContactPersoonByVerenigingId($verenigingId);	
	//print_r($contact);
}

?>

<?php
//naam van de vereniging ophalen
$verObject = new Vereniging();
$gezochteVer = $verObject->selectVerenigingById($verenigingId);

 
?>
<div id="overzichtContact">
<div id="rodebalk" class="alert-info">
                <strong>&nbsp;Contact van <?php echo $gezochteVer[0]['verNaam']?></strong>
                <button id="sluitinfo" type="button" class="close">&times;</button>    
</div>

<div id="actionsdiv">
			<a href="http://localhost:8080/sociaalhuis/organisaties" class="pull-left buttonback" title="Terug naar organisaties">Terug</a>
			<?php if(empty($contact))
			{
			?>
			<a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-contactpersoon?organisatieid=".$_GET['organisatieid']; ?>" class="pull-left buttonadd">&nbsp;Contactpersoon toevoegen</a>
			<?php	
			}
			?>
            <a href="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-logo?organisatieid=".$_GET['organisatieid']; ?>" class="pull-right buttonadd" title="<?php echo "Naar logo/foto van ".$gezochteVer[0]['verNaam']; ?>">&nbsp;Naar logo/foto</a>
            
</div>
<table id="contactTabel">
<thead>
<tr>
<th class="sh_contvoornaam">Voornaam</th>	
<th class="sh_contnaam">Naam</th>
<th class="sh_contemail">E-mail adres</th>
<th class="sh_actie">Actie</th>
</tr>
</thead>
<tbody>
<?php
if(count($contact) == 0)
{
?>
<tr>
<td colspan="4">
<?php
	echo "Geen contactpersoon.";
?>
</td>	
</tr>
<?php	
}
else
{
	

foreach($contact as $contactPersoon)
{
    $i = $contactPersoon['contID'];
?>
<tr>
<td><?php  echo $contactPersoon['contVoornaam']; ?></td>	
<td><?php  echo $contactPersoon['contNaam']; ?></td>
<td><?php echo $contactPersoon['contEmail']; ?></td>
<td class="sh_actie">
	
<form method="post" action="<?php echo "http://localhost:8080/sociaalhuis/organisatie-formulier-contactpersoon?organisatieid=".$_GET['organisatieid'] ?>" class="sh_form_edit">
    <input name="contactPersoonId" value="<?php echo $i; ?>" type="hidden" />
    <input name="verenigingId" value="<?php echo $verenigingId; ?>" type="hidden" />
    <input type="submit" value="Editeer" class="btnedit" title="edit" /> 
</form>
<button id="<?php echo "contBtnDelete".$i?>" title="wis" class="btndelete">Wis</button>

</td>
</tr>
<?php
}//end foreach
}//end else ?>
</tbody>
</table>
</div>

