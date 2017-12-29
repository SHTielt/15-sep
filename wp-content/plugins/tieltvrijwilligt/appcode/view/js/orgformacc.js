function controleerEmail() {
	            var patroon = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/;
                var email = jQuery("#emailOrganisatie").val().toUpperCase();
                if (patroon.test(email))
                    return true;
                else {
                    return false;
                }
}
  
            
            
function foutBijEmail(zichtbaar) {
	            //plaatst foutmelding en kleurt inputveld geel
                if (zichtbaar && jQuery("#emailOrganisatie.foutveld").length == 0) {
                	jQuery("#emailOrganisatie").after("<br /><span class='foutmelding'>Dit email adres is onjuist.</span><br />");
                    jQuery("#emailOrganisatie").addClass('foutveld');
                    jQuery("#emailOrganisatie").focus();
                }
                //verwijdert foutmelding en ontkleurt inputveld
                if (!zichtbaar && jQuery("#emailOrganisatie.foutveld").length != 0) {
                	jQuery("#emailOrganisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#emailOrganisatie").next().remove();
                    jQuery("#emailOrganisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#emailOrganisatie").removeClass('foutveld');
                }
}

function controleerWachtwoord() {
	            var wachtwoord1 = jQuery("#wachtWoordOrganisatie").val();
	            var wachtwoord2 = jQuery("#wachtWoord2Organisatie").val();
	            
                if (wachtwoord1 === wachtwoord2)
                {
                    return true;
                }
                else
                {
                    return false;
                }
}
  
            
            
function foutBijWachtwoord(zichtbaar) {
	            //plaatst foutmelding en kleurt inputveld geel
                if (zichtbaar && jQuery("#wachtWoord2Organisatie.foutveld").length == 0) {
                	jQuery("#wachtWoord2Organisatie").after("<br /><span class='foutmelding'>De wachtwoorden zijn niet gelijk.</span><br />");
                    jQuery("#wachtWoord2Organisatie").addClass('foutveld');
                    jQuery("#wachtWoord2Organisatie").focus();
                }
                //verwijdert foutmelding en ontkleurt inputveld
                if (!zichtbaar && jQuery("#wachtWoord2Organisatie.foutveld").length != 0) {
                	jQuery("#wachtWoord2Organisatie").next().remove(); //verwijdert de eerste br tag
                    jQuery("#wachtWoord2Organisatie").next().remove();
                    jQuery("#wachtWoord2Organisatie").next().remove(); //verwijdert de laatste br tag
                    jQuery("#wachtWoord2Organisatie").removeClass('foutveld');
                }
}

function checkPasswordStrength(pass1,pass2,$strengthResult,$submitButton,blacklistArray )
{
		var pass1 = pass1.val();
        var pass2 = pass2.val();
                
        // Reset the form & meter
        //$submitButton.attr( 'disabled', 'disabled' );
        $strengthResult.removeClass( 'empty bad good strong mismatch short' );
 
        // Extend our blacklist array with those from the inputs & site data
        blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputBlacklist() );
 
        // Get the password strength
        var strength = wp.passwordStrength.meter( pass1, blacklistArray, pass2 );
 		//alert('strength:' + strength);
        // Add the strength meter results
        switch ( strength ) {
 
        case 2:
            $strengthResult.addClass( 'bad' ).html( pwsL10n.bad );
            break;
 
        case 3:
            $strengthResult.addClass( 'good' ).html( pwsL10n.good );
            break;
 
        case 4:
            $strengthResult.addClass( 'strong' ).html( pwsL10n.strong );
            break;
            
        case 5:
            $strengthResult.addClass( 'short' ).html( pwsL10n.mismatch );
            break;    
 
        default:
            $strengthResult.addClass( 'short' ).html( pwsL10n.short );
 
    }
 
    // The meter function returns a result even if pass2 is empty,
    // enable only the submit button if the password is strong and
    // both passwords are filled up
    //if ( 4 === strength && '' !== pass2.trim() ) {
    //    $submitButton.removeAttr( 'disabled' );
    //} 
 
    return strength;
}
 

jQuery(document).ready(function () {
	
	//1. hide red bar
    jQuery("#sluitinfo").click(function () {
        jQuery("#rodebalk").hide();
    });
    
	//2. validatie email adres
    jQuery("#emailOrganisatie").change(function () {
    var correctEmail = controleerEmail();
    foutBijEmail(!correctEmail);
    });  
    
    //3.wachtwoord sterkte
    jQuery("#wachtWoordOrganisatie,#wachtWoord2Organisatie").keyup(function() {
        	  	
            checkPasswordStrength(
                jQuery('#wachtWoordOrganisatie'),         // First password field
                jQuery('#wachtWoord2Organisatie'),         // Second password field
                jQuery('#reg_passmail'),           // Strength meter
                jQuery('button[type=submit]'),           // Submit button
                ['black', 'listed', 'word','hello','12345']        // Blacklisted words
            );
            
        }
    );
    
    //4. validatie wachtwoord
    /*
    jQuery("#wachtWoordOrganisatie,#wachtWoord2Organisatie").change(function () {
    var correctWachtwoord = controleerWachtwoord();
    foutBijWachtwoord(!correctWachtwoord);
    });
    */
 
});             //einde ready event


 





            
            



