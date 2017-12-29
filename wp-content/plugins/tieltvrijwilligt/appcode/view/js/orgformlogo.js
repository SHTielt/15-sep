
jQuery(document).ready(function () {

    //1. hide red bar
    jQuery("#sluitinfo").click(function () {
        jQuery("#rodebalk").hide();
    });
    
});             //einde ready event


            
function askDeletion(){
var r = confirm("Bent u zeker om deze foto/logo te verwijderen?");
        if(r == true)
        {
            return true;           
        }
        else
        {
        	return false;
        }
        
}	
