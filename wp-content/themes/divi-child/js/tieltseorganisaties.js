
jQuery(document).ready(function () {
    		
            //paginatie
     		jQuery("#aantalPaginas").change(function () {
         			//alert('hi');
         			jQuery("#filter").val('');
                    var ps = jQuery("#aantalPaginas option:selected").text();
                    //alert(ps);
                    if (ps == "") {
                        jQuery("#tieltseVerenigingenTabel").datatable('destroy');
                    }
                    else {
                        jQuery("#tieltseVerenigingenTabel").datatable({
                            pageSize: ps,
                            pagingNumberOfPages: 5
                        });
                        
                    };
            		//class van td is verloren gegaan; opnieuw toevoegn
            		jQuery("#tieltseVerenigingenTabel tbody tr td:first-child").attr('class','image');
            		jQuery("#tieltseVerenigingenTabel tbody tr td:nth-child(2)").attr('class','vernaam');
            		jQuery("#tieltseVerenigingenTabel tbody tr td:nth-child(3)").attr('class','verbesch');
            		jQuery("#tieltseVerenigingenTabel tbody tr td:last-child").attr('class','detail');
      		});

});  //einde ready event


            

