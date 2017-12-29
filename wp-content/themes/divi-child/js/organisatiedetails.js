
jQuery(document).ready(function () {
    		jQuery('#bestuursTabel').hide();
    		jQuery('.btntoggle').click(function () {
         	jQuery('#bestuursTabel').toggle();
         	
         	if(jQuery('.btntoggle').html() == "Toon bestuursleden")
         	{
         		jQuery('.btntoggle').html('Verberg bestuursleden');
         	}
         	else
         	{
         		jQuery('.btntoggle').html('Toon bestuursleden');
         	}
         	
    	    });//einde click functie
    		
    		

});  //einde ready event


            

