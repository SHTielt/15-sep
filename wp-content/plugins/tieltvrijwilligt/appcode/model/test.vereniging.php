<?php
    
define('RS_DIR_PATH', __DIR__.'/');
define('RS_PLUGIN_PATH','c:/wamp64/www/sociaalhuis/wp-content/plugins/tieltvrijwilligt/');

require_once RS_PLUGIN_PATH.'appcode/helpers/feedback.class.php';
require_once RS_PLUGIN_PATH.'appcode/helpers/base.class.php';
require_once RS_DIR_PATH.'vereniging.class.php';

//insert testen
/*
$vereniging = new Vereniging();
$naam = "De keu";
$locatie = "`t Vijverhof";
$omschrijving = "'ok'";
$werkingsGebied = "";
$webSite = NULL;
$facebook = NULL;
$beschrijving = "Biljart/club";
$actief = 1;
$slug = "de-keu";
$wpUserId = 581;
$rechtsVormId = 6;

$vereniging->insert($naam, $locatie, $omschrijving, $werkingsGebied, $webSite, $facebook, $beschrijving, $actief, $slug, $wpUserId, $rechtsVormId);
*/

//update testen
/*
$vereniging = new Vereniging();
$verenigingId = 86;
$naam = "De keu";
$locatie = "`t Vijverhof";
$omschrijving = "ok";
$werkingsGebied = "";
$webSite = NULL;
$facebook = NULL;
$beschrijving = "Biljart\club";
$actief = 1;
$slug = "de-keu";
$wpUserId = 581;
$rechtsVormId = 6;

$vereniging->update($verenigingId, $naam, $locatie, $omschrijving, $werkingsGebied, $webSite, $facebook, $beschrijving, $actief, $slug, $wpUserId, $rechtsVormId);
*/

//selectAll testen
/*
$object = new Vereniging();
$verenigingsLijst=$object->selectAll();
*/

 //testen van selectVerenigingById()
 /*
 $objectS = new Vereniging();
 $lijst = $objectS->selectVerenigingById(86);
 */

 //delete testen
 /*
 $objectD= new Vereniging();
 $objectD->delete(5);
 */
 
 //testen van selectVerenigingByUserId()
 /*
 $objectS = new Vereniging();
 $result = $objectS->selectVerenigingByUserId(52);
 print_r($result);
 */
 
 //testen van filterVerenigingenBySector
 /*
 $objectS = new Vereniging();
 $verenigingsLijst = $objectS->filterVerenigingenBySector(3);
 */
 
 //testen van selectOrganisatieBySlug
 /*
 $objectS = new Vereniging();
 $lijst = $objectS->selectOrganisatieBySlug('kvg-tielt');
 if(!empty($lijst))
 {
 	echo "de lijst is niet leeg";
 }
 */
 
 /*testen van filteren per trefwoord*/
 $objectF = new Vereniging();
 $lijst = $objectF->filterVerenigingenByTrefwoord('ziekenfonds');
 
?>

<p>Test selectOrganisatieByTrefwoord</p>
<ul>
            <li>Feedback: <?php echo $objectF->getFeedback(); ?></li>
            <li>Error message: <?php echo $objectF->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $objectF->getErrorCode(); ?></li>
</ul>
<table>
<thead>
<tr>
	<th>VerId</th><th>Naam</th><th>Locatie</th><th>Omschrijving</th><th>Werkingsgebied</th><th>Website</th><th>Facebook</th><th>Beschrijving</th><th>Actief</th><th>Slug</th></th><th>WPUserId</th><th>RechtsVormId</th>
</tr>
</thead>
<tbody>
    	<?php
        foreach($lijst as $result)
        {
    ?>
    <tr><td><?php  echo $result['verID']; ?></td><td><?php  echo $result['verNaam']; ?></td><td><?php  echo $result['verLocatie']; ?></td><td><?php  echo $result['verOmschrijving']; ?></td>
    	<td><?php  echo $result['verWerkingsGebied']; ?></td><td><?php  echo $result['verWebsite']; ?></td><td><?php  echo $result['verFacebook']; ?></td><td><?php  echo $result['verBeschrijving']; ?></td>
    	<td><?php  echo $result['verActief']; ?></td><td><?php  echo $result['verSlug']; ?></td>
    	<td><?php  echo $result['verWPUserID']; ?></td><td><?php  echo $result['rvID']; ?></td>
    	</tr>
    	<?php
        }//end foreach
    ?>
</tbody>
</table>


<!--
<p>Test selectOrganisatieBySlug</p>
<ul>
            <li>Feedback: <?php echo $objectS->getFeedback(); ?></li>
            <li>Error message: <?php echo $objectS->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $objectS->getErrorCode(); ?></li>
</ul>
<table>
<thead>
<tr>
	<th>VerId</th><th>Naam</th><th>Locatie</th><th>Omschrijving</th><th>Werkingsgebied</th><th>Website</th><th>Facebook</th><th>Beschrijving</th><th>Actief</th><th>Slug</th></th><th>WPUserId</th><th>RechtsVormId</th>
</tr>
</thead>
<tbody>
    	<?php
        foreach($lijst as $result)
        {
    ?>
    <tr><td><?php  echo $result['verID']; ?></td><td><?php  echo $result['verNaam']; ?></td><td><?php  echo $result['verLocatie']; ?></td><td><?php  echo $result['verOmschrijving']; ?></td>
    	<td><?php  echo $result['verWerkingsGebied']; ?></td><td><?php  echo $result['verWebsite']; ?></td><td><?php  echo $result['verFacebook']; ?></td><td><?php  echo $result['verBeschrijving']; ?></td>
    	<td><?php  echo $result['verActief']; ?></td><td><?php  echo $result['verSlug']; ?></td>
    	<td><?php  echo $result['verWPUserID']; ?></td><td><?php  echo $result['rvID']; ?></td>
    	</tr>
    	<?php
        }//end foreach
    ?>
</tbody>
</table>
-->

<!--
<p>Test selectVerenigingById</p>
<ul>
            <li>Feedback: <?php echo $objectS->getFeedback(); ?></li>
            <li>Error message: <?php echo $objectS->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $objectS->getErrorCode(); ?></li>
</ul>
<table>
<thead>
<tr>
	<th>VerId</th><th>Naam</th><th>Locatie</th><th>Omschrijving</th><th>Werkingsgebied</th><th>Website</th><th>Facebook</th><th>Beschrijving</th><th>Actief</th><th>Slug</th></th><th>WPUserId</th><th>RechtsVormId</th><th>secid</th>
</tr>
</thead>
    <tbody>
    	<?php
        foreach($lijst as $result)
        {
    ?>
    <tr><td><?php  echo $result['verID']; ?></td><td><?php  echo $result['verNaam']; ?></td><td><?php  echo $result['verLocatie']; ?></td><td><?php  echo $result['verOmschrijving']; ?></td>
    	<td><?php  echo $result['verWerkingsGebied']; ?></td><td><?php  echo $result['verWebsite']; ?></td><td><?php  echo $result['verFacebook']; ?></td><td><?php  echo $result['verBeschrijving']; ?></td>
    	<td><?php  echo $result['verActief']; ?></td><td><?php  echo $result['verSlug']; ?></td>
    	<td><?php  echo $result['verWPUserID']; ?></td><td><?php  echo $result['rvID']; ?></td><td><?php  echo $result['secID']; ?></td>
    	</tr>
    	<?php
        }//end foreach
    ?>
</tbody>
</table>
-->

<!--
<p>Test selectall</p>
<ul>
            <li>Feedback: <?php echo $object->getFeedback(); ?></li>
            <li>Error message: <?php echo $object->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $object->getErrorCode(); ?></li>
</ul>
 
<table>
<thead>
<tr>
	<th>VerId</th><th>Naam</th><th>Locatie</th><th>Omschrijving</th><th>Werkingsgebied</th><th>Website</th><th>Facebook</th><th>CustomField</th><th>Actief</th><th>Slug>/th></th><th>WPUserId</th><th>RechtsVormId</th>
</tr>
</thead>
<tbody>
    <?php
        foreach($verenigingsLijst as $result)
        {
    ?>
    <tr><td><?php  echo $result['verID']; ?></td><td><?php  echo $result['verNaam']; ?></td><td><?php  echo $result['verLocatie']; ?></td><td><?php  echo $result['verOmschrijving']; ?></td>
    	<td><?php  echo $result['verWerkingsGebied']; ?></td><td><?php  echo $result['verWebsite']; ?></td><td><?php  echo $result['verFacebook']; ?></td><td><?php  echo $result['verBeschrijving']; ?></td><td><?php  echo $result['verActief']; ?></td>
    	<td><?php  echo $result['verActief']; ?></td><td><?php  echo $result['verSlug']; ?></td><td><?php  echo $result['verWPUserID']; ?></td><td><?php  echo $result['rvID']; ?></td>
    </tr>
    <?php
        }//end foreach
    ?>
</tbody>
</table>
-->

<!--
<p>Test update vereniging</p>
        <ul>
            <li>Feedback: <?php echo $vereniging->getFeedback(); ?></li>
            <li>Error message: <?php echo $vereniging->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $vereniging->getErrorCode(); ?></li>
        </ul>
-->

<!--
<p>Test insert vereniging</p>
        <ul>
            <li>Feedback: <?php echo $vereniging->getFeedback(); ?></li>
            <li>Error message: <?php echo $vereniging->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $vereniging->getErrorCode(); ?></li>
            <li>ID: <?php echo $vereniging->getVerenigingId(); ?></li>
        </ul>
-->  


<!--
<p>Test selectVerenigingByUserId</p>
<ul>
            <li>Feedback: <?php echo $objectS->getFeedback(); ?></li>
            <li>Error message: <?php echo $objectS->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $objectS->getErrorCode(); ?></li>
</ul>
<br />

<table>
<thead>
<tr>
	<th>VerId</th><th>Naam</th><th>Locatie</th><th>Omschrijving</th><th>Werkingsgebied</th><th>Website</th><th>Facebook</th><th>CustomField</th><th>Actief</th><th>WPUserId</th><th>RechtsVormId</th>
</tr>
</thead>
<tbody>
<tr><td><?php  echo $result[0]['verID']; ?></td><td><?php  echo $result[0]['verNaam']; ?></td><td><?php  echo $result[0]['verLocatie']; ?></td><td><?php  echo $result[0]['verOmschrijving']; ?></td>
    	<td><?php  echo $result[0]['verWerkingsGebied']; ?></td><td><?php  echo $result[0]['verWebsite']; ?></td><td><?php  echo $result[0]['verFacebook']; ?></td><td><?php  echo $result[0]['verCustomField']; ?></td>
    	<td><?php  echo $result[0]['verActief']; ?></td><td><?php  echo $result[0]['verWPUserID']; ?></td><td><?php  echo $result[0]['rvID']; ?></td>
</tr>
</tbody>
</table>
-->




<!--
<p>Test filterVerenigingenBySector</p>
<ul>
            <li>Feedback: <?php echo $objectS->getFeedback(); ?></li>
            <li>Error message: <?php echo $objectS->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $objectS->getErrorCode(); ?></li>
</ul>
<br />

<table>
<thead>
<tr>
	<th>VerId</th><th>Naam</th><th>Locatie</th><th>Omschrijving</th><th>Werkingsgebied</th><th>Website</th><th>Facebook</th><th>CustomField</th><th>Actief</th><th>WPUserId</th><th>RechtsVormId</th>
</tr>
</thead>
<tbody>
    <?php
        foreach($verenigingsLijst as $result)
        {
    ?>
    <tr><td><?php  echo $result['verID']; ?></td><td><?php  echo $result['verNaam']; ?></td><td><?php  echo $result['verLocatie']; ?></td><td><?php  echo $result['verOmschrijving']; ?></td>
    	<td><?php  echo $result['verWerkingsGebied']; ?></td><td><?php  echo $result['verWebsite']; ?></td><td><?php  echo $result['verFacebook']; ?></td><td><?php  echo $result['verCustomField']; ?></td><td><?php  echo $result['verActief']; ?></td>
    	<td><?php  echo $result['verActief']; ?></td><td><?php  echo $result['verWPUserID']; ?></td><td><?php  echo $result['rvID']; ?></td>
    </tr>
    <?php
        }//end foreach
    ?>
</tbody>
</table>
-->

<!--
<p>Test deleting vereniging</p>
        <ul>
            <li>Message: <?php echo $objectD->getFeedback(); ?></li>
            <li>Error message: <?php echo $objectD->getErrorMessage(); ?></li>
            <li>Error code: <?php echo $objectD->getErrorCode(); ?></li>
        </ul>
</p>
-->











   


