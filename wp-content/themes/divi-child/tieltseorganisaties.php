<?php
//alle sectoren ophalen
$secObject = new Sector();
$sectoren = $secObject->selectAll();
?>

<?php
//sectorgefilterde verenigingen ophalen	
if(isset($_POST['verBtnSector']) && $_POST['secSelect'] != 0)
{
	$sectorId = $_POST['secSelect'];
	//echo "sectorId: ".$sectorId;
	$verObject = new Vereniging();
	$verenigingen = $verObject->filterVerenigingenbySector($sectorId);
	//var_dump($verenigingen);
}
//trefwoordgefilterde verenigingen ophalen
elseif (isset($_POST['verBtnTrefwoord']))
{
	$trefWoord = $_POST['trefwoord'];
	//echo "trefwoord: ".$trefWoord;
	$orgObject = new Vereniging();
	$verenigingen = $orgObject->filterVerenigingenByTrefwoord($trefWoord);
	//var_dump($verenigingen);
}
//alle verenigingen ophalen
else
{
	$verObject = new Vereniging();
	$verenigingen = $verObject->selectAll();
}
	
?>
<div id="tieltverdiv">
	
<div id="sectordiv">
<form method="post" action="http://localhost:8080/sociaalhuis/tieltse-organisaties">
<label>
Sector:&nbsp;
</label>
<select id="secSelect" name="secSelect">
                            <option id="sec0" value="0"></option> 
                            <option id="sec4" value="4" <?php if(!empty($sectorId))  { if($sectorId == 4) {echo "selected";} }?>>Senioren</option>
                            <option id="sec5" value="5" <?php if(!empty($sectorId)) { if($sectorId == 5) {echo "selected";} }?>>Welzijn</option>
</select>
<input type="submit" name="verBtnSector" class="btnfilter" value="Filter" >
</form>
</div>

<div id="zoekdiv">
<form method="post" action="http://localhost:8080/sociaalhuis/tieltse-organisaties">
<label>
Trefwoord:&nbsp;
</label>
<input id="twZoek" type="text" name="trefwoord" value="<?php if(!empty($trefWoord)) {echo $trefWoord;} else {echo "";}?>">
<input type="submit" name="verBtnTrefwoord" class="btnfilter" value="Filter">
</form>
</div>

<div id="pagdiv">
<label id="paginatie">
                    <select size="1" id="aantalPaginas">
                        <option></option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                    </select>&nbsp;rijen per pagina
</label>
</div>

</div><!--einde tieltverdiv-->
<div style="clear: both;"></div>

<table id="tieltseVerenigingenTabel">
<tbody>
<?php
if(count($verenigingen) == 0){
	echo "<br />";
	echo "Er zijn geen organisaties gevonden.";
}
else {
	

foreach($verenigingen as $vereniging)
{
	
if($vereniging['verActief'] == 1)
{
	$verenigingId = $vereniging['verID'];	
	//print_r($vereniging);
	
    $fotoObject = new Foto();
	$gezochteFoto = $fotoObject->selectFotoByVerenigingId($verenigingId);
?>


<tr>
<td><?php
if(!empty($gezochteFoto))
{
$fotoNaam = $gezochteFoto[0]['fNaam'];
?>
<img src="<?php echo sprintf("http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/view/fotouploads/thumbs/%s",$fotoNaam); ?>" alt="<?php echo $fotoNaam;?>" title="<?php echo $vereniging['verNaam'];?>" />	
<?php
}
else
{
	echo "geen logo/foto";
}
?></td>
<td class="vernaam">
<strong><?php echo $vereniging['verNaam']; ?></strong>		
</td>
<td class="verbesch">
	<?php echo $vereniging['verBeschrijving'];?>
</td>
<td class="detail">
	<?php $slug = sanitize_title($vereniging['verNaam']);?>
	<form method="post" action="<?php echo "http://localhost:8080/sociaalhuis/".$slug;?>">
	<input type="hidden" id="verenigingId" name="verenigingId" value="<?php echo $verenigingId;?>">
	<input type="submit" value="Details" class="btndetails" >
    </form>	
</td>
</tr>	
	
<?php
}//einde if foto actie
}//einde foreach
}//einde else
?>
</tbody>
</table>
<div class="paging"></div>
