<?php
/* Template Name: Organisatie Details */
get_header(); 

//get functie
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

//get contact voorkeur
function getContactVoorkeur($cvId)
{
	if(!empty($cvId)){
		$cvObject = new ContactVoorkeur();
		$result = $cvObject->selectContactVoorkeurById($cvId);
		echo $result[0]['cvVoorkeur'];
	}
	else {
		echo "";
	}
	
}

//get sector
function getSector($secId)
{
	$secObject = new Sector();
	$result = $secObject->selectSectorById($secId);
	echo $result[0]['secNaam'];
}

//get juridische vorm
function getRechtsVorm($cvId){
	$cvObject = new RechtsVorm();
	$result = $cvObject->selectRechtsVormById($cvId);
	echo $result[0]['rvNaam'];
}

/*$_POST komt van tieltseorganisaties.php*/
if(isset($_POST['verenigingId']))
{
$verenigingId = $_POST['verenigingId'];
//echo $verenigingId;

$verObject = new Vereniging();
$gezochteVereniging = $verObject->selectVerenigingbyId($verenigingId);

//1.fotonaam ophalen
$fotoObject = new Foto();
$gezochteFoto = $fotoObject->selectFotoByVerenigingId($verenigingId);
$fotoNaam = $gezochteFoto[0]['fNaam'];
//echo "fotonaam: ".$fotoNaam;

//2. bestuursleden ophalen
$bestuurderObject = new Bestuurder();
$bestuur = $bestuurderObject->selectBestuurderbyVerenigingId($verenigingId);
//print_r($bestuur);

//3.contactpersoon ophalen
$contObject = new ContactPersoon();
$contactPersoon = $contObject->selectContactPersoonByVerenigingId($verenigingId);
//print_r($contactPersoon);

//4. sectoren van vereniging ophalen
$versecObject = new VerenigingSector();
$versectoren = $versecObject->selectSectorenByVerenigingId($verenigingId);


}//einde if isset
else
{
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo "url: ".$url."<br />";
//echo $_SERVER[HTTP_HOST]."<br />";
//echo $_SERVER[REQUEST_URI]."<br />";
$url_path = parse_url( $url, PHP_URL_PATH );
//echo "url path: ".$url_path."<br />";
$slug = pathinfo( $url_path, PATHINFO_BASENAME );
//echo "slug: ".$slug."<br />";

//data ophalen op basis van de slug
$orgObject = new Vereniging();
$gezochteVereniging = $orgObject->selectOrganisatieBySlug($slug);
$organisatieId = $gezochteVereniging[0]['verID'];

//1.fotonaam ophalen
$fotoObject = new Foto();
$gezochteFoto = $fotoObject->selectFotoByVerenigingId($organisatieId);
$fotoNaam = $gezochteFoto[0]['fNaam'];
//echo "fotonaam: ".$fotoNaam;

//2. bestuursleden ophalen
$bestuurderObject = new Bestuurder();
$bestuur = $bestuurderObject->selectBestuurderbyVerenigingId($organisatieId);
//print_r($bestuur);

//3.contactpersoon ophalen
$contObject = new ContactPersoon();
$contactPersoon = $contObject->selectContactPersoonByVerenigingId($organisatieId);
//print_r($contactPersoon);

//4. sectoren van vereniging ophalen
$versecObject = new VerenigingSector();
$versectoren = $versecObject->selectSectorenByVerenigingId($organisatieId);

}

?>
<!--hier wordt alles vanaf theme-my-login tem wlwmanifest.xml standaard geladen-->
<style>
    body, h1, h3 {
    	font-family: Arial, Helvetica, Arial, Lucida, sans-serif;
    }
    
    h1, h3 {
    	padding-bottom: 10px;
    }
    
	h3 {
		text-shadow: 0.1px 0.1px 0 #333;
	}
</style>
<div id="main-content">
<article class="page type-page status-publish hentry category-orgdetails">
<div class="entry-content">
<div class="et_pb_section et_pb_section_0 et_section_regular">
<div class="et_pb_row et_pb_row_0">
<div class="et_pb_column et_pb_column_4_4 et_pb_column_0">
<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left et_pb_text_0">
<a href="http://localhost:8080/sociaalhuis/tieltse-organisaties" class="buttonback" title="Terug naar Tieltse organisaties">&nbsp;Terug</a>
<h1 style="margin-top: 1em;"><?php echo $gezochteVereniging[0]['verNaam'];?></h1>

<div id="omschrijving" style="text-align:justify;" class="onderdeel">
<div id="imagediv">
<?php if(!empty($fotoNaam))
{
?>
<img src="<?php echo sprintf("http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/view/fotouploads/thumbs/%s",$fotoNaam); ?>" alt="<?php echo $fotoNaam;?>" title="<?php echo $gezochteVereniging[0]['verNaam'];?>" />
<?php
}
else {
	echo "geen logo/foto";
}
?>
</div>
<?php echo $gezochteVereniging[0]['verOmschrijving'];?>	
</div>
<div style="clear: both;"></div>

<div id="werkingsgebied" class="onderdeel">
<h3>Werkingsgebied</h3>	
<?php
if(!empty($gezochteVereniging[0]['verWerkingsGebied']))
{
	echo $gezochteVereniging[0]['verWerkingsGebied'];
}
else {
	echo "";
}?>
</div>

<div id="contactpersoon" class="onderdeel">
<h3 style="display: inline-block;">Contactpersoon</h3><span> voor nieuwe leden / klanten</span><br />
<?php
if(!empty($contactPersoon))
{
if(!empty($contactPersoon[0]['contNaam']))
{
?>
<div><?php echo "Naam: ".$contactPersoon[0]['contVoornaam']." ".$contactPersoon[0]['contNaam'];?></div>
<?php
}
?>
<?php if(!empty($contactPersoon[0]['contEmail']))
{
?>
<div><?php echo "E-mail adres: "; echo htmlentities($contactPersoon[0]['contEmail']); ?></div>
<?php
}
?>
<?php if(!empty($contactPersoon[0]['contGSM']))
{
?>
<div><?php echo "GSM: ".$contactPersoon[0]['contGSM'];?></div>
<?php
}
?>
<?php if(!empty($contactPersoon[0]['contTelefoon']))
{
?>
<div><?php echo "Telefoon: ".$contactPersoon[0]['contTelefoon'];?></div>
<?php
}
?>
<?php
if(!empty($contactPersoon[0]['cvID']))
{
?>
<div><?php echo "Contact voorkeur: "; getContactVoorkeur($contactPersoon[0]['cvID']);?></div>
<?php
}
}//end main if
else {
	echo "Momenteel is er geen contactpersoon opgegeven.";
}
?>
</div>
	
<div id="bestuur" class="onderdeel">
<h3>Bestuursleden</h3>
<?php if(!empty($bestuur))
{
?>
<button class="btntoggle">Toon bestuursleden</button>
<table id="bestuursTabel">
<thead>
	<tr><th class="bsNaam">Naam</th><th class="bsFunctie">Functie</th><th class="bsEmail">E-mail adres</th><th class="bsGsm">GSM</th><th class="bsTelefoon">Telefoon</th></tr>
</thead>
<tbody>
    <?php
        foreach($bestuur as $bestuurder)
        {
    ?>
    <tr><td><?php  echo $bestuurder['bestVoornaam']." ".$bestuurder['bestNaam']; ?></td>
    	<td><strong><?php getFunctie($bestuurder['funcID']);?></strong></td>
    	<td><?php  echo htmlentities($bestuurder['bestEmail']); ?></td>
    	<td><?php  echo $bestuurder['bestGSM']; ?></td>
    	<td><?php  echo $bestuurder['bestTelefoon']; ?></td>
    </tr>
    <?php
        }//end foreach
    ?>
</tbody>
</table>
<?php
}
else {
	echo "Momenteel zijn er geen bestuursleden opgegeven.";
}
?>
</div><!--einde bestuur-->

<div id="sectoren" class="onderdeel">
<h3>Sectoren</h3>	
<?php
//print_r($versectoren);
foreach($versectoren as $versec){
	getSector($versec['secID']);
	echo " ";
}
?>
</div>

<div id="rechtsvorm" class="onderdeel">
<h3>Juridische vorm</h3>	
<?php
getRechtsVorm($gezochteVereniging[0]['rvID']);
?>
</div>

<div id="internet">
	<?php if(!empty($gezochteVereniging[0]['verWebsite']))
	{
	?>
	<a href="<?php echo sprintf("http://%s",$gezochteVereniging[0]['verWebsite']);?>" target="_blank"><img style="padding-right:0.5em;" id="#www" src="http://localhost:8080/sociaalhuis/wp-content/themes/divi-child/icons/world-wide-web_40.jpg" alt="world-wide-web" title="<?php echo $gezochteVereniging[0]['verWebsite'];?>" /></a>
	<?php
	}
	?>
	<?php if(!empty($gezochteVereniging[0]['verFacebook']))
	{
	?>
	<a href="<?php echo sprintf("http://%s",$gezochteVereniging[0]['verFacebook']);?>" target="_blank"><img style="padding-left:0.5em;" id="#fb" src="http://localhost:8080/sociaalhuis/wp-content/themes/divi-child/icons/facebook_40.png" alt="facebook" title="<?php echo "Facebook pagina van ".$gezochteVereniging[0]['verNaam'];?>" /></a>
	<?php
	}
	?>
</div>
</div><!--einde et_pb_text-->
</div><!--einde et_pb_column-->
</div><!--einde et_pb_row-->
</div><!--einde et_pb_section-->
</div> <!--einde entry-content-->
</article>
</div> <!-- #main-content -->

<?php get_footer(); ?>