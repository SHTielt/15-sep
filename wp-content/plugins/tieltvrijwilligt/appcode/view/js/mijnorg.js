//functies tbv organisatie
function controleerNaamOrganisatie() {
	if(jQuery("#naamOrganisatie").val() == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function foutBijNaamOrganisatie(zichtbaar){
	if (zichtbaar && jQuery("#naamOrganisatie.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#naamOrganisatie").after("<br /><span class='foutmelding'>Gelieve een naam in te vullen.</span><br />");
                    jQuery("#naamOrganisatie").addClass("foutveld");
                    jQuery("#naamOrganisatie").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
    if (!zichtbaar && jQuery("#naamOrganisatie.foutveld").length != 0) {
                    jQuery("#naamOrganisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#naamOrganisatie").next().remove();
                    jQuery("#naamOrganisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#naamOrganisatie").removeClass("foutveld");
                }
}

function controleerOmschrijving1() {
	if(jQuery("#omschrijvingOrganisatie").val() == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function foutBijOmschrijving1(zichtbaar){
	if (zichtbaar && jQuery("#omschrijvingOrganisatie.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#omschrijvingOrganisatie").after("<br /><span class='foutmelding'>Gelieve de omschrijving toe te voegen.</span><br />");
                    jQuery("#omschrijvingOrganisatie").addClass("foutveld");
                    jQuery("#omschrijvingOrganisatie").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
    if (!zichtbaar && jQuery("#omschrijvingOrganisatie.foutveld").length != 0) {
                    jQuery("#omschrijvingOrganisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#omschrijvingOrganisatie").next().remove();
                    jQuery("#omschrijvingOrganisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#omschrijvingOrganisatie").removeClass("foutveld");
                }
}

function controleerJuridischeVorm() {
	if(jQuery("#rvOrganisatie").val() == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function foutBijJuridischeVorm(zichtbaar){
	if (zichtbaar && jQuery("#rvOrganisatie.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#rvOrganisatie").after("<br /><span class='foutmelding'>Gelieve de jurische vorm te selecteren.</span><br />");
                    jQuery("#rvOrganisatie").addClass("foutveld");
                    jQuery("#rvOrganisatie").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
    if (!zichtbaar && jQuery("#rvOrganisatie.foutveld").length != 0) {
                    jQuery("#rvOrganisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#rvOrganisatie").next().remove();
                    jQuery("#rvOrganisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#rvOrganisatie").removeClass("foutveld");
                }
}

function controleerSectoren() {
	// validatie min aantal sectoren
	if (jQuery(".uniform_sec:checked").length == 0) 
    {
        return false;
    }
    else
	{
		return true;
	}
}

function foutBijSectoren1(zichtbaar){
	if (zichtbaar && jQuery("#sectorenfieldset.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#sectorenfieldset").after("<br /><span class='foutmelding'>Gelieve tenminste één sector te kiezen.</span><br />");
                    jQuery("#sectorenfieldset").addClass("foutveld");
                                        
                }
                //verwijdert foutmelding en ontkleurt inputveld
    if (!zichtbaar && jQuery("#sectorenfieldset.foutveld").length != 0) {
                    jQuery("#sectorenfieldset").next().remove(); //verwijdert de eerste br tag
                    jQuery("#sectorenfieldset").next().remove();
                    jQuery("#sectorenfieldset").next().remove(); //verwijdert de laatste br tag
                    jQuery("#sectorenfieldset").removeClass("foutveld");
                }
}

function minimumValidatieOrganisatie(){
	 var correctNaamOrg = controleerNaamOrganisatie();
	 foutBijNaamOrganisatie(!correctNaamOrg);
	 var correctJurVorm = controleerJuridischeVorm();
	 foutBijJuridischeVorm(!correctJurVorm);
	 var correctOmschrijving = controleerOmschrijving1();
	 foutBijOmschrijving1(!correctOmschrijving);
	 var correctSector = controleerSectoren();
	 foutBijSectoren1(!correctSector);
     if(correctNaamOrg == false || correctOmschrijving == false || correctJurVorm == false || correctSector == false){
     		return false;
     }
     else
     {
     	return true;
     }
}

//validatie functies tbv beschrijving organisatie
function controleerBeschrijving(){
	var veld2 = jQuery("#beschrijvingOrganisatie").val();
	if (veld2.length >= 30) {
			return false;
	}
	else
	{
		return true;
	}
}

function foutBijBeschrijving(zichtbaar) {
                if (zichtbaar && jQuery("#beschrijvingOrganisatie.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#beschrijvingOrganisatie").after("<br /><span class='foutmelding'>Gelieve de korte beschrijving te beperken tot 30 karakters.</span><br />");
                    jQuery("#beschrijvingOrganisatie").addClass("foutveld");
                    jQuery("#beschrijvingOrganisatie").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
                if (!zichtbaar && jQuery("#beschrijvingOrganisatie.foutveld").length != 0) {
                    jQuery("#beschrijvingOrganisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#beschrijvingOrganisatie").next().remove();
                    jQuery("#beschrijvingOrganisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#beschrijvingOrganisatie").removeClass("foutveld");
                }
}

//validatie functies tbv omschrijving organisatie
function controleerOmschrijving(){
	if (veld3.length >= 1000) {
			return false;
	}
	else
	{
		return true;
	}
}

function foutBijOmschrijving(zichtbaar) {
                if (zichtbaar && jQuery("#omschrijvingOrganisatie.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#omschrijvingOrganisatie").after("<br /><span class='foutmelding'>Gelieve de omschrijving van de organisatie te beperken tot 1000 karakters.</span><br />");
                    jQuery("#omschrijvingOrganisatie").addClass("foutveld");
                    jQuery("#omschrijvingOrganisatie").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
                if (!zichtbaar && jQuery("#omschrijvingVereniging.foutveld").length != 0) {
                    jQuery("#omschrijvingOrganisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#omschrijvingOrganisatie").next().remove();
                    jQuery("#omschrijvingOrganisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#omschrijvingOrganisatie").removeClass("foutveld");
                }
}

function controleerWebsite(){
	var veld1 = jQuery("#websiteOrganisatie").val();              
	if (veld1.match("^htt")) {
			return false;
	}
	else
	{
		return true;
	}
}

function foutBijWebsite(zichtbaar) {
                if (zichtbaar && jQuery("#websiteOrganisatie.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#websiteOrganisatie").after("<br /><span class='foutmelding'>Gelieve het webadres te niet beginnen met http:// of https://.</span><br />");
                    jQuery("#websiteOrganisatie").addClass("foutveld");
                    jQuery("#websiteOrganisatie").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
                if (!zichtbaar && jQuery("#websiteOrganisatie.foutveld").length != 0) {
                    jQuery("#websiteOrganisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#websiteOrganisatie").next().remove();
                    jQuery("#websiteOrganisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#websiteOrganisatie").removeClass("foutveld");
                }
}

function controleerFacebook(){
	var veld1 = jQuery("#facebookOrganisatie").val();              
	if (veld1.match("^htt")) {
			return false;
	}
	else
	{
		return true;
	}
}

function foutBijFacebook(zichtbaar) {
                if (zichtbaar && jQuery("#facebookOrganisatie.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#facebookOrganisatie").after("<br /><span class='foutmelding'>Gelieve het facebook webadres niet te beginnen met https://.</span><br />");
                    jQuery("#facebookOrganisatie").addClass("foutveld");
                    jQuery("#facebookOrganisatie").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
                if (!zichtbaar && jQuery("#facebookOrganisatie.foutveld").length != 0) {
                    jQuery("#facebookOrganisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#facebookOrganisatie").next().remove();
                    jQuery("#facebookOrganisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#facebookOrganisatie").removeClass("foutveld");
                }
}

function foutBijSectoren(){
	jQuery("#sectorenasterisk").after("<br /><span class='foutmelding'>Gelieve tenminste één sector te kiezen.</span><br />");
    jQuery("#sectorenfieldset").addClass("foutveld");
    jQuery("#sectorenfieldset").focus();
}



//validatie functies tbv bestuurders van organisatie
function controleerVoornaam() {
	if(jQuery("#voornaamBestuurder").val() == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function foutBijVoornaam(zichtbaar){
	if (zichtbaar && jQuery("#voornaamBestuurder.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#voornaamBestuurder").after("<br /><span class='foutmelding'>Gelieve een voornaam in te vullen.</span><br />");
                    jQuery("#voornaamBestuurder").addClass("foutveld");
                    jQuery("#voornaamBestuurder").focus();
                    
                }
    //verwijdert foutmelding en ontkleurt inputveld 
    if (!zichtbaar && jQuery("#voornaamBestuurder.foutveld").length != 0) {
                    jQuery("#voornaamBestuurder").next().remove(); //verwijdert de eerste br tag
                    jQuery("#voornaamBestuurder").next().remove();
                    jQuery("#voornaamBestuurder").next().remove(); //verwijdert de laatste br tag
                    jQuery("#voornaamBestuurder").removeClass("foutveld");
                }
}

function controleerNaam() {
	if(jQuery("#naamBestuurder").val() == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function foutBijNaam(zichtbaar){
	if (zichtbaar && jQuery("#naamBestuurder.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#naamBestuurder").after("<br /><span class='foutmelding'>Gelieve een naam in te vullen.</span><br />");
                    jQuery("#naamBestuurder").addClass("foutveld");
                    jQuery("#naamBestuurder").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
    if (!zichtbaar && jQuery("#naamBestuurder.foutveld").length != 0) {
                    jQuery("#naamBestuurder").next().remove(); //verwijdert de eerste br tag
                    jQuery("#naamBestuurder").next().remove();
                    jQuery("#naamBestuurder").next().remove(); //verwijdert de laatste br tag
                    jQuery("#naamBestuurder").removeClass("foutveld");
                }
}


function validateBestuurderForm() {
	 var correctVoornaam = controleerVoornaam();
	 foutBijVoornaam(!correctVoornaam);
	 var correctNaam = controleerNaam();
	 foutBijNaam(!correctNaam);
	 //var notvalid = validateBestuurderForm();
     if(correctVoornaam == false || correctNaam == false){
     		return false;
     }
     else
     {
     	return true;
     }
}




//validatie functies tbv contactpersoon
function controleerCPVoornaam() {
	if(jQuery("#voornaamContactPersoon").val() == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function foutBijCPVoornaam(zichtbaar){
	if (zichtbaar && jQuery("#voornaamContactPersoon.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#voornaamContactPersoon").after("<br /><span class='foutmelding'>Gelieve een voornaam in te vullen.</span><br />");
                    jQuery("#voornaamContactPersoon").addClass("foutveld");
                    jQuery("#voornaamContactPersoon").focus();
                    
                }
    //verwijdert foutmelding en ontkleurt inputveld 
    if (!zichtbaar && jQuery("#voornaamContactPersoon.foutveld").length != 0) {
                    jQuery("#voornaamContactPersoon").next().remove(); //verwijdert de eerste br tag
                    jQuery("#voornaamContactPersoon").next().remove();
                    jQuery("#voornaamContactPersoon").next().remove(); //verwijdert de laatste br tag
                    jQuery("#voornaamContactPersoonr").removeClass("foutveld");
                }
}

function controleerCPNaam() {
	if(jQuery("#naamContactPersoon").val() == "")
	{
		return false;
	}
	else
	{
		return true;
	}
}

function foutBijCPNaam(zichtbaar){
	if (zichtbaar && jQuery("#naamContactPersoon.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#naamContactPersoon").after("<br /><span class='foutmelding'>Gelieve een naam in te vullen.</span><br />");
                    jQuery("#naamContactPersoon").addClass("foutveld");
                    jQuery("#naamContactPersoon").focus();
                    
                }
                //verwijdert foutmelding en ontkleurt inputveld
    if (!zichtbaar && jQuery("#naamContactPersoon.foutveld").length != 0) {
                    jQuery("#naamContactPersoon").next().remove(); //verwijdert de eerste br tag
                    jQuery("#naamContactPersoon").next().remove();
                    jQuery("#naamContactPersoon").next().remove(); //verwijdert de laatste br tag
                    jQuery("#naamContactPersoon").removeClass("foutveld");
                }
}

function controleerContact(){
	 if(jQuery("#emailContactPersoon").val() == "" && jQuery("#gsmContactPersoon").val() == "" && jQuery("#telContactPersoon").val() == ""){
     	return false;
     }
     else
     {
     	return true;
     }
}

function foutBijContact(zichtbaar){
	if (zichtbaar && jQuery("#telContactPersoon.foutveld").length == 0) {
                    //plaatst rode foutmelding en kleurt inputveld geel
                    jQuery("#telContactPersoon").after("<br /><span class='foutmelding'>Gelieve een e-mail adres, GSM-nummer of telefoonnummer op te geven.</span><br />");
                    jQuery("#telContactPersoon").addClass("foutveld");
                    jQuery("#telContactPersoon").focus();
                    
                }
    //verwijdert foutmelding en ontkleurt inputveld
    if (!zichtbaar && jQuery("#telContactPersoon.foutveld").length != 0) {
                    jQuery("#telContactPersoon").next().remove(); //verwijdert de eerste br tag
                    jQuery("#telContactPersoon").next().remove();
                    jQuery("#telContactPersoon").next().remove(); //verwijdert de laatste br tag
                    jQuery("#telContactPersoon").removeClass("foutveld");
                }
}


function validateContactPersoonForm() {
	 var correctVoornaam = controleerCPVoornaam();
	 foutBijCPVoornaam(!correctVoornaam);
	 var correctNaam = controleerCPNaam();
	 foutBijCPNaam(!correctNaam);
	 var correctContact = controleerContact();
     foutBijContact(!correctContact);
     
     if(correctVoornaam == false || correctNaam == false || correctContact == false){
     		return false;
     }
     else
     {
     	return true;
     }
     
     
     
}

jQuery(document).ready(function () {
	//1. wat we doen tab
	//1.0 aangepast organisatie formulier tonen bij laden
	var tmp = jQuery("#idOrganisatie").val();
	if(tmp == "")
	{
		jQuery("#btnOrganisatieUpdate").hide();
	}
	else
	{
		jQuery("#btnOrganisatieSave").hide();
		jQuery("#btnOrganisatieCancel").hide();
	}
	//1.1. validatie beschrijving
    jQuery("#beschrijvingOrganisatie").change(function () {
    var correctBeschrijving = controleerBeschrijving();
    foutBijBeschrijving(!correctBeschrijving);
    });
    
    //1.2. validatie omschrijving
    jQuery("#omschrijvingOrganisatie").change(function () {
    var correctOmschrijving = controleerOmschrijving();
    foutBijOmschrijving(!correctOmschrijving);
    });
    
    //1.3. validatie website
    jQuery("#websiteOrganisatie").change(function () {
    var correctWebsite = controleerWebsite();
    foutBijWebsite(!correctWebsite);
    });
    
    //1.4. validatie facebook
    jQuery("#facebookOrganisatie").change(function () {
    var correctFacebook = controleerFacebook();
    foutBijFacebook(!correctFacebook);
    });
    
    //1.5. validation max aantal sectoren
    jQuery(".uniform_sec").change(function () {
        var max = 3;
        if (jQuery(".uniform_sec:checked").length == max) {
            jQuery(".uniform_sec").attr('disabled', 'disabled');
            alert('enkel 3 sectoren');
            jQuery(".uniform_sec:checked").removeAttr('disabled');
        }
        else {
            jQuery(".uniform_sec").removeAttr('disabled');
        }
    });
	    
    //1.6. opslaan bestuurder data 
    jQuery('#btnOrganisatieSave').click(function(){
    	opslaanOrganisatie();
    });
    
    //1.7. wijzigen bestuurder data 
    jQuery('#btnOrganisatieUpdate').click(function(){
    	wijzigenOrganisatie();
    });
    
    //2. bestuurtab
    //2.1.bestuurderformulier verbergen bij laden
    jQuery("#bestuurderFormulier").hide();  
   
    //2.2. aangepast bestuurderformulier tonen, bestuur verbergen
    jQuery("#bestuurderBtn").click(function(){
    	jQuery("#overzichtBestuurders").hide();
   		jQuery("#bestuurderFormulier").show();
   		jQuery("#btnBestuurderUpdate").hide();
   		return false;	
    });
    
    //2.3. terug naar bestuur
    jQuery("#bestBtnBack").click(function(){
   		jQuery("#overzichtBestuurders").show();
   		jQuery("#bestuurderFormulier").hide();
   		jQuery("#rodebalk3 strong").text('Bestuurder toevoegen');
   		jQuery("#btnBestuurderUpdate").show();
   		jQuery("#btnBestuurderSave").show();
   		formBestuurderLedigen();
   		//return false;	
    });
   
    //2.4. opslaan nieuwe bestuurder data 
    jQuery('#btnBestuurderSave').click(function(){
    	opslaanBestuurder();
    });//einde click btnBestuurderSave
    
    //2.5. bestuurderformulier editeren, bestuur verbergen
    jQuery("#bestuurdersTabel").on('click','button.btnedit',editeerBestuurder);
            
    //2.6. bestuurder wijzigen
    jQuery('#btnBestuurderUpdate').click(function(){
    	wijzigenBestuurder();
    });
    
    //2.7. bestuurder wissen
    jQuery("#bestuurdersTabel").on('click','button.btndelete',verwijderBestuurder);
    
    
    
    //3. contacttab
    //3.1. contactpersoon formulier verbergen bij laden
    jQuery("#contactPersoonFormulier").hide();  
   
    //3.2. aangepast contactpersoon formulier tonen, contact verbergen
    jQuery("#cpBtn").click(function(){
    	jQuery("#overzichtContact").hide();
   		jQuery("#contactPersoonFormulier").show();
   		jQuery("#btnContactPersoonUpdate").hide();
   		return false;	
    });
    
    //3.3. terug naar contact
    jQuery("#cpBtnBack").click(function(){
   		jQuery("#overzichtContact").show();
   		jQuery("#contactPersoonFormulier").hide();
   		jQuery("#rodebalk5 strong").text('Contactpersoon toevoegen');
   		jQuery("#btnContactPersoonUpdate").show();
   		jQuery("#btnContactPersoonSave").show();
   		formContactPersoonLedigen();
   		//return false;	
    });
    
    //3.4. opslaan nieuwe bestuurder data 
    jQuery('#btnContactPersoonSave').click(function(){
    	opslaanContactPersoon();
    });
    
    //3.5. bestuurderformulier editeren, bestuur verbergen
    jQuery("#contactTabel").on('click','button.btnedit',editeerContactPersoon);
            
    //3.6. bestuurder wijzigen
    jQuery('#btnContactPersoonUpdate').click(function(){
    	wijzigenContactPersoon();
    });
    
    //3.7. bestuurder wissen
    jQuery("#contactTabel").on('click','button.btndelete',verwijderContactPersoon);
    
    //3.8. contactpersoon form invullen met bestuurslid
    jQuery('#bestContactPersoon').change(function(){
    	var bestuurderId = jQuery('#bestContactPersoon option:selected').val();
    	//alert(bestuurderId);
    	if(bestuurderId != 0 ) //bestuurslid gekozen
    	{
    		formContactPersoonLedigen();
    		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function () {
             	//alert(xmlhttp.readyState);
               	//alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	//alert(xmlhttp.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubele quotes.
                    	var ar = JSON.parse(xmlhttp.responseText); //ar is een JSON object
                    	jQuery("#voornaamContactPersoon").attr('value',ar['bestVoornaam']);
						jQuery("#naamContactPersoon").attr('value', ar['bestNaam']);
						jQuery("#infoContactPersoon").val(ar['bestInfo']);
						jQuery("#emailContactPersoon").attr('value', ar['bestEmail']);
						jQuery("#gsmContactPersoon").attr('value', ar['bestGSM']);
						jQuery("#telContactPersoon").attr('value', ar['bestTelefoon']);
						jQuery("#cvContactPersoon").val(ar['cvID']);
						//ID van contactpersoon mag niet veranderen
                        
                    }
        	};
              
        xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/contactpersoon.ajax.php?action=fill&bestuurderid=" + bestuurderId, true); 
        xmlhttp.send();//noodzaakt get methode
        }
        else if(bestuurderId == 0)
        {
        	formContactPersoonLedigen();
        }
     });//einde change event
     
     //4.logo tab
     //4.1. opslaan nieuw logo  
     
     //jQuery('#btnOrganisatieFotoSave').click(function(){
     //	opslaanLogo();
     //});
    
     //4.2. logo wissen
     jQuery("img[id*='deleteIcon']").click(function(){
     	var iconid = jQuery(this).attr("id"); 
		var afbeeldingId = iconid.substring(10);
		wissenLogo(afbeeldingId);
    });
     
     
        
             
});             //einde ready event

////////////////////////////////////////////////////
// Ajax organisatie
///////////////////////////////////////////////////
function OrganisatieInvullen(ar){
//alert('bij invullen');
jQuery("#naamOrganisatie").attr('value', ar[0].verNaam);
jQuery("#locatieOrganisatie").attr('value', ar[0].verLocatie);
jQuery("#beschrijvingOrganisatie").attr('value', ar[0].verBeschrijving);
jQuery("#omschrijvingOrganisatie").val(ar[0].verOmschrijving);
jQuery("#werkingsGebiedOrganisatie").attr('value', ar[0].verWerkingsGebied);
jQuery("#websiteOrganisatie").attr('value', ar[0].verWebsite);
jQuery("#facebookOrganisatie").attr('value', ar[0].verFacebook);
jQuery("#rvOrganisatie").val(ar[0].rvID);
jQuery("#idOrganisatie").val(ar[0].verID);
jQuery("#wpUserID").val(ar[0].verWPUserID);

//JSON object inkijken
                    	
                        var lengte = Object.keys(ar).length ;
                        //alert(lengte);  
                        var hoogsteindex = lengte - 1;   
                        //alert(hoogsteindex);
                        //get aantal checkboxen
                        var aantalSectoren = jQuery(".uniform_sec").length;
                        //alert('aantal sectoren: ' + aantalSectoren);
                        
                        for (var i = 0; i <= hoogsteindex; i++)
                        {
                        	
                        	for(var j = 1; j <= aantalSectoren; j++)
                        	{
                        		if(ar[i].secID == j.toString())
                        		{
                        			var sectorNaam = 'cbSector' + j.toString();
                        		    jQuery(sectorNaam).prop('checked', true);
                        		}//end if
                        	} //end j for
                        }//end i for
}



function opslaanOrganisatie(){
	//alert('bij opslaan');
	var valid = minimumValidatieOrganisatie();
    	if(valid == false) {
    		return false;
    	}
    	
    var naam = jQuery("#naamOrganisatie").val();
    //alert(naam);
    var locatie = jQuery("#locatieOrganisatie").val();
    //alert(locatie);
    var beschrijving = jQuery("#beschrijvingOrganisatie").val();
    //alert(beschrijving);
    var omschrijving = jQuery("#omschrijvingOrganisatie").val();
    //alert(omschrijving);
    var werkingsGebied = jQuery("#werkingsGebiedOrganisatie").val();
    //alert(werkingsGebied);
    var website = jQuery("#websiteOrganisatie").val();
    //alert(website);
    var facebook = jQuery("#facebookOrganisatie").val();
    //alert(facebook);
    var rvId = jQuery('#rvOrganisatie option:selected').val();
    //alert(rvId);
    
    var sectorIds = jQuery(".uniform_sec:checked").map(function(){
      return jQuery(this).val();
    }).get(); 
    //alert(sectorIds);
    var sector1Id = sectorIds[0];
    //alert(sector1Id);
    var sector2Id = sectorIds[1];
    //alert(sector2Id);
    var sector3Id = sectorIds[2];
    //alert(sector3Id);
    
    var wpUserId = jQuery("#wpUserID").val();
    //alert(wpUserId);
    	
    	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
             	//alert(xmlhttp.readyState);
               	//alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	alert(xmlhttp.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubbele quotes.
                    	var ar = JSON.parse(xmlhttp.responseText); //ar is een array van een aantal JSON objecten
                    	OrganisatieInvullen(ar);
                    	jQuery("#rodebalk1 strong").text('Organisatie wijzigen');
                    	jQuery("#btnOrganisatieSave").hide();
                    	jQuery("#btnOrganisatieCancel").hide();
                    	jQuery("#btnOrganisatieUpdate").show();
                                               
                    }
        	};
              
   xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/organisatie.ajax.php?action=add&naam=" + naam + "&locatie=" + locatie + "&beschrijving=" + beschrijving + "&omschrijving=" + omschrijving + "&website=" + website + "&facebook=" + facebook + "&rvid=" + rvId + "&wpuserid=" + wpUserId + "&sector1id=" + sector1Id + "&sector2id=" + sector2Id + "&sector3id=" + sector3Id, true); 
   xmlhttp.send();	
    
}

function wijzigenOrganisatie(){
	//alert('bij wijzigen');
	var valid = minimumValidatieOrganisatie();
    	if(valid == false) {
    		return false;
    	}
    	
    var naam = jQuery("#naamOrganisatie").val();
    //alert(naam);
    var locatie = jQuery("#locatieOrganisatie").val();
    //alert(locatie);
    var beschrijving = jQuery("#beschrijvingOrganisatie").val();
    //alert(beschrijving);
    var omschrijving = jQuery("#omschrijvingOrganisatie").val();
    //alert(omschrijving);
    var werkingsGebied = jQuery("#werkingsGebiedOrganisatie").val();
    //alert(werkingsGebied);
    var website = jQuery("#websiteOrganisatie").val();
    //alert(website);
    var facebook = jQuery("#facebookOrganisatie").val();
    //alert(facebook);
    var rvId = jQuery('#rvOrganisatie option:selected').val();
    //alert(rvId);
    
    var sectorIds = jQuery(".uniform_sec:checked").map(function(){
      return jQuery(this).val();
    }).get(); 
    //alert(sectorIds);
    var sector1Id = sectorIds[0];
    //alert(sector1Id);
    var sector2Id = sectorIds[1];
    //alert(sector2Id);
    var sector3Id = sectorIds[2];
    //alert(sector3Id);
    
    var wpUserId = jQuery("#wpUserID").val();
    //alert(wpUserId);
    var orgId = jQuery("#idOrganisatie").val();	
    //alert('orgid: ' + orgId);
    	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
             	//alert(xmlhttp.readyState);
               	//alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	//alert(xmlhttp.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubbele quotes.
                    	var ar = JSON.parse(xmlhttp.responseText); //ar is een array van een aantal JSON objecten
                    	OrganisatieInvullen(ar);
                    	                                               
                    }
        	};
              
   xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/organisatie.ajax.php?action=update&naam=" + naam + "&locatie=" + locatie + "&beschrijving=" + beschrijving + "&omschrijving=" + omschrijving + "&website=" + website + "&facebook=" + facebook + "&rvid=" + rvId + "&wpuserid=" + wpUserId + "&orgid=" + orgId + "&sector1id=" + sector1Id + "&sector2id=" + sector2Id + "&sector3id=" + sector3Id, true); 
   xmlhttp.send();	
    
}

////////////////////////////////////////////////////
//CRUD Ajax Bestuurder
///////////////////////////////////////////////////


function tableCreate(response) {
				//alert('table create');
                //jQuery("#bestuurdersTabel thead").empty();
                jQuery("#bestuurdersTabel tbody").empty();
                if (response.length == 0) {
                    jQuery("#bestuurdersTabel tbody").append("<tr><th>Geen bestuurders</th></tr>");
                }
                else {
                    //jQuery("#bestuurdersTabel tbody").append("<tr><th class='Id'>Nr</th><th>Titel</th><th class='Auteur'>Auteur</th><th class='Type'>Document Type</th><th class='Prijs'>Prijs (€)</th><th class='Actie'>Koop</th></tr>");
                    for (var i = 0; i < response.length; i++) {
                        var voornaam = response[i].bestVoornaam;/*vereist*/
                        //alert(voornaam);
                        var naam = response[i].bestNaam; /*vereist*/
                        //alert(naam);
                        
                        bestId = response[i].bestID;
                         
                        if (response[i].bestInfo === null) {
                            var info = "";
                        }
                        else {
                            var info = response[i].bestInfo;
                        }
                        //alert(info);
                        
                        if (response[i].bestEmail === null) {
                            var email = "";
                        }
                        else {
                            var email = response[i].bestEmail;
                        }
                        //alert(email);
                        
                        if (response[i].bestGSM === null) {
                            var gsm = "";
                        }
                        else {
                            var gsm = response[i].bestGSM;
                        }
                        //alert(gsm);
                        
                        if (response[i].bestTelefoon === null) {
                            var tel = "";
                        }
                        else {
                            var tel = response[i].bestTelefoon;
                        }
                        //alert(tel);
                        
                        if (response[i].funcNaam === null) {
                            var funcNaam = "";
                        }
                        else {
                            var funcNaam = response[i].funcNaam;
                        }
                        //alert(funcNaam);
                        
                        var orgId = response[i].verID;
                        //alert(orgId);
                        
                        //nieuwe btnnamen
                        var btnedit = "bestBtnEdit" + bestId;
                        //alert(btnedit);
                        var btndelete = "bestBtnDelete" + bestId;
                        //alert(btndelete);
                        jQuery("#bestuurdersTabel tbody").append("<tr><td class='sh_bestvoornaam'>" + voornaam + "</td><td class='sh_bestnaam'>" + naam + "</td><td class='sh_bestfunctie'>" + funcNaam + "</td><td class='sh_bestemail'>" + email + "</td><td class='sh_actie'><button id='" + btnedit + "' class='btnedit' title='edit'>Editeer</button><button id='" + btndelete + "' class='btndelete' title='delete'>Wis</button></td></tr>");
                    }
                } //einde else
                //alert('einde table create');
                //overzicht tonen en formulier verbergen
        		jQuery("#overzichtBestuurders").show();
   				jQuery("#bestuurderFormulier").hide();    
            }//end tableCreate

function formBestuurderLedigen() {
	    jQuery("#funcBestuurder").val('');
		jQuery("#voornaamBestuurder").attr('value','');
		jQuery("#naamBestuurder").attr('value', '');
		jQuery("#infoBestuurder").val('');
		jQuery("#emailBestuurder").attr('value', '');
		jQuery("#gsmBestuurder").attr('value', '');
		jQuery("#telBestuurder").attr('value', '');
		jQuery("#cvBestuurder").val('');
		//eventuele foutmeldingen verwijderen
		foutBijVoornaam(false);
		foutBijNaam(false);
}

function formBestuurderInvullen(ar){
	jQuery("#funcBestuurder").val(ar['funcID']);
	jQuery("#voornaamBestuurder").attr('value',ar['bestVoornaam']);
	jQuery("#naamBestuurder").attr('value', ar['bestNaam']);
	jQuery("#infoBestuurder").val(ar['bestInfo']);
	jQuery("#emailBestuurder").attr('value', ar['bestEmail']);
	jQuery("#gsmBestuurder").attr('value', ar['bestGSM']);
	jQuery("#telBestuurder").attr('value', ar['bestTelefoon']);
	jQuery("#cvBestuurder").val(ar['cvID']);
	jQuery("#idBestuurder").val(ar['bestID']);
}

function editeerBestuurder(){
		jQuery("#overzichtBestuurders").hide();
   		jQuery("#bestuurderFormulier").show();
   		var btnid = jQuery(this).attr("id"); //attribuut lezen in jQuery
   		var bestuurderId = btnid.substring(11);
        //alert(id);
        var xmlhttp1 = new XMLHttpRequest();
        xmlhttp1.onreadystatechange = function () {
        //alert(xmlhttp1.readyState);
        //alert(xmlhttp1.status);
        if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                    	//alert(xmlhttp1.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubele quotes.
                    	var ar = JSON.parse(xmlhttp1.responseText); //ar is een JSON object
                    	//JSON object inkijken
                    	/*
                        var lengte = Object.keys(ar).length ;
                        alert(lengte);  
                        var hoogsteindex = lengte/2 - 1;   
                        alert(hoogsteindex);
                        for (var i = 0; i <= hoogsteindex; i++)
                        {
                        	alert(ar[i]);
                        	document.write(ar[i] + " ");
                        	document.write("<br />");
                        }
                        */
                       jQuery("#rodebalk3 strong").text('Bestuurder wijzigen');
					   jQuery("#btnBestuurderSave").hide();
                       formBestuurderInvullen(ar);
                        
                        
                    }
        	};
              
        xmlhttp1.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/bestuurder.ajax.php?action=edit&bestuurderid=" + bestuurderId, true); 
        xmlhttp1.send();//noodzaakt get methode	
}  //einde editeerBestuurder  

function verwijderBestuurder(){
		var r = confirm("Bent u zeker om deze bestuurder te verwijderen?");
        if(r == true)
        {
                    var btnid = jQuery(this).attr("id"); 
   					var bestuurderId = btnid.substring(13);
  					
  					var xmlhttp2 = new XMLHttpRequest();
					//alert(xmlhttp2);
        			xmlhttp2.onreadystatechange = function () {
        			//alert(xmlhttp2.readyState);
        			//alert(xmlhttp2.status);
        			if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                 		//alert(xmlhttp2.responseText);
                    	var ar = JSON.parse(xmlhttp2.responseText); 
                    	
                    	tableCreate(ar);
                    
                    }//einde if
        			};//einde fc
              
         			xmlhttp2.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/bestuurder.ajax.php?action=delete&bestid=" + bestuurderId, true); 
         			xmlhttp2.send();//noodzaakt get methode	return false; //to prevent window.location.href is assigned badly;
        }//einde confirm
                
		
}

function opslaanBestuurder(){
		alert('bij opslaan');
    	var valid = validateContactPersoonForm();
    	if(valid == false) {
    		return false;
    	}
    	var funcId = jQuery('#funcBestuurder option:selected').val();
    	//alert(funcId);
    	var voornaam = jQuery("#voornaamBestuurder").val();
    	//alert(voornaam);
    	var naam = jQuery("#naamBestuurder").val();
    	//alert(naam);
    	var info = jQuery("#infoBestuurder").val();
    	//alert(info);
    	var email = jQuery("#emailBestuurder").val();
    	//alert(email);
    	var gsm = jQuery("#gsmBestuurder").val();
    	//alert(gsm);
    	var tel = jQuery("#telBestuurder").val();
    	//alert(tel);
    	var cvId = jQuery('#cvBestuurder option:selected').val();
    	//alert(cvId);
    	var verId = jQuery("#idVereniging").val();
    	//alert(verId);
    	
    	
    	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
             	//alert(xmlhttp.readyState);
               	//alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	//alert(xmlhttp.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubbele quotes.
                    	var ar = JSON.parse(xmlhttp.responseText); //ar is een array van een aantal JSON objecten
                    	
                    	//var lengte = Object.keys(ar).length ;
                        //alert('lengte: ' + lengte);  
                        //var hoogsteindex = lengte - 1;   
                        //alert('hoogsteindex: ' + hoogsteindex);
                                                
                        tableCreate(ar);
                        jQuery("#btnBestuurderUpdate").show();
                        formBestuurderLedigen();
                    }
        	};
              
         xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/bestuurder.ajax.php?action=add&funcid=" + funcId + "&voornaam=" + voornaam + "&naam=" + naam + "&info=" + info + "&email=" + email + "&gsm=" + gsm + "&tel=" + tel + "&cvid=" + cvId + "&verid=" + verId, true); 
         xmlhttp.send();//noodzaakt get methode	
        
}

function wijzigenBestuurder()
{
		//alert('bij wijzigen');
    	var valid = validateBestuurderForm();
    	if(valid == false) {
    		return false;
    	}
    	var funcId = jQuery('#funcBestuurder option:selected').val();
    	//alert(funcId);
    	var voornaam = jQuery("#voornaamBestuurder").val();
    	//alert(voornaam);
    	var naam = jQuery("#naamBestuurder").val();
    	//alert(naam);
    	var info = jQuery("#infoBestuurder").val();
    	//alert(info);
    	var email = jQuery("#emailBestuurder").val();
    	//alert(email);
    	var gsm = jQuery("#gsmBestuurder").val();
    	//alert(gsm);
    	var tel = jQuery("#telBestuurder").val();
    	//alert(tel);
    	var cvId = jQuery('#cvBestuurder option:selected').val();
    	//alert(cvId);
    	var verId = jQuery("#idVereniging").val();
    	//alert(verId);
    	var bestId = jQuery("#idBestuurder").val();
    	//alert('bestid: ' + bestId);
    	
    	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
             	//alert(xmlhttp.readyState);
               	//alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	//alert(xmlhttp.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubbele quotes.
                    	var ar = JSON.parse(xmlhttp.responseText); //ar is een array van een aantal JSON objecten
                    	
                    	//array inkijken
                        
                        var lengte = Object.keys(ar).length ;
                        //alert('lengte: ' + lengte);  
                        var hoogsteindex = lengte - 1;   
                                                
                        tableCreate(ar);
                        jQuery("#rodebalk3 strong").text('Bestuurder toevoegen');
                        jQuery("#btnBestuurderSave").show();
                        formBestuurderLedigen();
                    }
        	};
              
         xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/bestuurder.ajax.php?action=update&bestid=" + bestId + "&funcid=" + funcId + "&voornaam=" + voornaam + "&naam=" + naam + "&info=" + info + "&email=" + email + "&gsm=" + gsm + "&tel=" + tel + "&cvid=" + cvId + "&verid=" + verId, true); 
         xmlhttp.send();//noodzaakt get methode		
}

////////////////////////////////////////////////////
//CRUD Ajax Contactpersoon
///////////////////////////////////////////////////
function tableCreate1(response) {
				//alert('table create1');
                jQuery("#contactTabel tbody").empty();
                if (response.length == 0) {
                    jQuery("#contactTabel tbody").append("<tr><td colspan='4'>Momenteel is er geen contactpersoon.</td></tr>");
                }
                else {
                    
                    for (var i = 0; i < response.length; i++) {
                        var voornaam = response[i].contVoornaam;/*vereist*/
                        //alert(voornaam);
                        var naam = response[i].contNaam; /*vereist*/
                        //alert(naam);
                        
                        contId = response[i].contID;
                         
                        if (response[i].contInfo == null) {
                            var info = "";
                        }
                        else {
                            var info = response[i].contInfo;
                        }
                        //alert(info);
                        
                        if (response[i].contEmail == null) {
                            var email = "";
                        }
                        else {
                            var email = response[i].contEmail;
                        }
                        //alert(email);
                        
                        if (response[i].contGSM == null) {
                            var gsm = "";
                        }
                        else {
                            var gsm = response[i].contGSM;
                        }
                        //alert(gsm);
                        
                        if (response[i].contTelefoon == null) {
                            var tel = "";
                        }
                        else {
                            var tel = response[i].contTelefoon;
                        }
                        //alert(tel);
                        
                        var cvId = response[i].cvID;
                        //alert('cvid: ' + cvId);
                        
                        var orgId = response[i].verID;
                        //alert(orgId);
                        
                        //nieuwe btnnamen
                        var btnedit = "contBtnEdit" + contId;
                        //alert(btnedit);
                        var btndelete = "contBtnDelete" + contId;
                        //alert(btndelete);
                        
                        //contactwijze bepalen
                        if(cvId != null)
                        {
                         switch (cvId){
                        	case "1":
                        		var wijze = email;
                        		break;
                        	
                        	case "2":
                        		var wijze = gsm;
                        		break;
                        	
                        	case "3":
                        		var wijze = tel;
                        		break;
                        }
                        }
                        else
                        {
                        	if(email != "") {
                        		var wijze = email;
                        	}
                        	else if (gsm != ""){
                        		var wijze = gsm;
                        	}
                        	else {
                        		var wijze = tel;
                        	}
                        }
                        
                        jQuery("#contactTabel tbody").append("<tr><td class='sh_contvoornaam'>" + voornaam + "</td><td class='sh_contnaam'>" + naam + "<td class='sh_contwijze'>" + wijze + "</td><td class='sh_actie'><button id='" + btnedit + "' class='btnedit' title='edit'>Editeer</button><button id='" + btndelete + "' class='btndelete' title='delete'>Wis</button></td></tr>");
                    }
                } //einde else
                //alert('einde table create1');
                //overzicht tonen en formulier verbergen
        		jQuery("#overzichtContact").show();
   				jQuery("#contactPersoonFormulier").hide();    
            }//end tableCreate1

function formContactPersoonLedigen() {
	    jQuery("#bestContactPersoon").val('');
		jQuery("#voornaamContactPersoon").attr('value','');
		jQuery("#naamContactPersoon").attr('value', '');
		jQuery("#infoContactPersoon").val('');
		jQuery("#emailContactPersoon").attr('value', '');
		jQuery("#gsmContactPersoon").attr('value', '');
		jQuery("#telContactPersoon").attr('value', '');
		jQuery("#cvContactPersoon").val('');
		//eventuele foutmeldingen verwijderen
		foutBijVoornaam(false);
		foutBijNaam(false);
}

function formContactPersoonInvullen(ar){
	
	jQuery("#voornaamContactPersoon").attr('value',ar['contVoornaam']);
	jQuery("#naamContactPersoon").attr('value', ar['contNaam']);
	jQuery("#infoContactPersoon").val(ar['contInfo']);
	jQuery("#emailContactPersoon").attr('value', ar['contEmail']);
	jQuery("#gsmContactPersoon").attr('value', ar['contGSM']);
	jQuery("#telContactPersoon").attr('value', ar['contTelefoon']);
	jQuery("#cvContactPersoon").val(ar['cvID']);
	jQuery("#idContactPersoon").val(ar['contID']);
}

function editeerContactPersoon(){
	//alert('bij editeren');
	jQuery("#overzichtContact").hide();
   	jQuery("#contactPersoonFormulier").show();
   	var btnid = jQuery(this).attr("id"); 
   	var cpId = btnid.substring(11);
    //alert(cpId);
    
    //formContactPersoonLedigen();
    
        var xmlhttp1 = new XMLHttpRequest();
        xmlhttp1.onreadystatechange = function () {
        //alert(xmlhttp1.readyState);
        //alert(xmlhttp1.status);
        if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                       //alert(xmlhttp1.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubele quotes.
                       var ar = JSON.parse(xmlhttp1.responseText); //ar is een JSON object
                       jQuery("#rodebalk5 strong").text('Contactpersoon wijzigen');
					   jQuery("#btnContactPersoonSave").hide();
					   formContactPersoonInvullen(ar);
                       }
        	};
              
        xmlhttp1.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/contactpersoon.ajax.php?action=edit&contactpersoonid=" + cpId, true); 
        xmlhttp1.send();//noodzaakt get methode	
	
	
}

function verwijderContactPersoon(){
	//alert('bij verwijderen');
	var r = confirm("Bent u zeker om deze contactpersoon te verwijderen?");
        if(r == true)
        {
                    var btnid = jQuery(this).attr("id"); 
   					var cpId = btnid.substring(13);
  					
  					var xmlhttp2 = new XMLHttpRequest();
					alert(xmlhttp2);
        			xmlhttp2.onreadystatechange = function () {
        			alert(xmlhttp2.readyState);
        			alert(xmlhttp2.status);
        			if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                 		alert(xmlhttp2.responseText);
                    	var ar = JSON.parse(xmlhttp2.responseText); 
                    	
                    	tableCreate1(ar);
                    
                    }//einde if
        			};//einde fc
              
         			xmlhttp2.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/contactpersoon.ajax.php?action=delete&contid=" + cpId, true); 
         			xmlhttp2.send();
        }//einde confirm
    jQuery("#cpactionsdiv").show();  
}

function opslaanContactPersoon(){
	alert('bij opslaan');
	var valid = validateContactPersoonForm();
    if(valid == false) {
        return false;
    }
    	
    	var voornaam = jQuery("#voornaamContactPersoon").val();
    	//alert(voornaam);
    	var naam = jQuery("#naamContactPersoon").val();
    	//alert(naam);
    	var info = jQuery("#infoContactPersoon").val();
    	//alert(info);
    	var email = jQuery("#emailContactPersoon").val();
    	//alert(email);
    	var gsm = jQuery("#gsmContactPersoon").val();
    	//alert(gsm);
    	var tel = jQuery("#telContactPersoon").val();
    	//alert(tel);
    	var cvId = jQuery('#cvContactPersoon option:selected').val();
    	//alert(cvId);
    	var verId = jQuery("#idVereniging").val();
    	//alert(verId);
    	
    	
    	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
             	//alert(xmlhttp.readyState);
               	//alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	//alert(xmlhttp.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubbele quotes.
                    	var ar = JSON.parse(xmlhttp.responseText); //ar is een array van een aantal JSON objecten
                    	
                    	//var lengte = Object.keys(ar).length ;
                        //alert('lengte: ' + lengte);  
                        //var hoogsteindex = lengte - 1;   
                        //alert('hoogsteindex: ' + hoogsteindex);
                                                
                        tableCreate1(ar);
                        jQuery("#btnContactPersoonUpdate").show();
                        formContactPersoonLedigen();
                        alert('hiding actiediv');
                        jQuery("#cpactionsdiv").hide();
                    }
        	};
              
         xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/contactpersoon.ajax.php?action=add&voornaam=" + voornaam + "&naam=" + naam + "&info=" + info + "&email=" + email + "&gsm=" + gsm + "&tel=" + tel + "&cvid=" + cvId + "&verid=" + verId, true); 
         xmlhttp.send();//noodzaakt get methode	
        
}

function wijzigenContactPersoon(){
		//alert('bij wijzigen');
    	var valid = validateContactPersoonForm();
    	if(valid == false) {
    		return false;
    	}
    	
    	var voornaam = jQuery("#voornaamContactPersoon").val();
    	//alert(voornaam);
    	var naam = jQuery("#naamContactPersoon").val();
    	//alert(naam);
    	var info = jQuery("#infoContactPersoon").val();
    	//alert(info);
    	var email = jQuery("#emailContactPersoon").val();
    	//alert(email);
    	var gsm = jQuery("#gsmContactPersoon").val();
    	//alert(gsm);
    	var tel = jQuery("#telContactPersoon").val();
    	//alert(tel);
    	var cvId = jQuery('#cvContactPersoon option:selected').val();
    	//alert(cvId);
    	var verId = jQuery("#idVereniging").val();
    	//alert(verId);
    	var contId = jQuery("#idContactPersoon").val();
    	//alert('contid: ' + contId);
    	
    	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
             	//alert(xmlhttp.readyState);
               	//alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	//alert(xmlhttp.responseText);//responseText is een string van een JSON object. Deze staat niet tussen single of dubbele quotes.
                    	var ar = JSON.parse(xmlhttp.responseText); //ar is een array van een aantal JSON objecten
                    	
                    	tableCreate1(ar);
                        jQuery("#rodebalk5 strong").text('Contactpersoon toevoegen');
                        jQuery("#btnContactPersoonSave").show();
                        formContactPersoonLedigen();
                        alert('hiding actiediv');
                        jQuery("#cpactionsdiv").hide();
                    }
        	};
              
         xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/contactpersoon.ajax.php?action=update&contid=" + contId + "&voornaam=" + voornaam + "&naam=" + naam + "&info=" + info + "&email=" + email + "&gsm=" + gsm + "&tel=" + tel + "&cvid=" + cvId + "&verid=" + verId, true); 
         xmlhttp.send();//noodzaakt get methode	
}

////////////////////////////////////////////////////
//Ajax logo
///////////////////////////////////////////////////
function opslaanLogo() {
var fotoPad = jQuery('#fileToUpload').val();
var fotoNaam = fotoPad.substring(12);
alert(fotoNaam);
var orgId = jQuery('#idOrganisatie').val();
alert(orgId);

var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
             	alert(xmlhttp.readyState);
               	alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	alert(xmlhttp.responseText);
                    	var ar = JSON.parse(xmlhttp.responseText); //ar is een array van een aantal JSON objecten
                    	alert(ar);
                    	
                    }
        	};
              
         xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/foto.ajax.php?action=add&fotonaam=" + fotoNaam + "&orgid=" + orgId, true); 
         xmlhttp.send();
}



function wissenLogo(afbeeldingId){
alert('bij wissen');
var orgId = jQuery('#idOrganisatie').val();
alert(orgId);

var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
             	alert(xmlhttp.readyState);
               	alert(xmlhttp.status);
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    	alert(xmlhttp.responseText);
                    	
                    	
                    }
        	};
              
         xmlhttp.open("GET", "http://localhost:8080/sociaalhuis/wp-content/plugins/tieltvrijwilligt/appcode/control/ajax/foto.ajax.php?action=delete&fotoid=" + afbeeldingId + "&orgid=" + orgId, true); 
         xmlhttp.send();
}	


