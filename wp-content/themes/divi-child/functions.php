<?php
//0. register third menu
function account_menu() {
  register_nav_menu('account-menu',__( 'Account Menu' ));
}
add_action( 'init', 'account_menu' );

//1. verwijdert querystrings in URL van javascript en css bestanden
function _remove_script_version( $src ){$parts = explode( '?ver', $src );return $parts[0];}
add_filter( 'script_loader_src', '_remove_script_version', 10, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 10, 1 );
 
 /*2. functies ten behoeve van deelwerkingen*/
function sh_Style_Deelwerkingen()
{
    if(is_page('deelwerkingen')) //slug als argument  
    {
        wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
        wp_enqueue_style('algemeen_style'); 
        wp_register_style('deelwerkingen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/deelwerkingen.css','_FILE_'), array());
        wp_enqueue_style('deelwerkingen_style');
    }
 
}
add_action('wp_enqueue_scripts', 'sh_Style_Deelwerkingen');/*w wellicht geladen bij activ plugin*/


function sh_Script_Deelwerkingen()
{
    if(is_page('deelwerkingen')) //slug als argument
    {
        wp_register_script('deelwerkingen_script', plugins_url('/tieltvrijwilligt/appcode/view/js/deelwerkingen.js','_FILE_'), array('jquery'));
        wp_enqueue_script('deelwerkingen_script');
		wp_register_script('excel_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/jquery.table2excel.js','_FILE_'), array('jquery'));
        wp_enqueue_script('excel_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_Script_Deelwerkingen');



/*3. functies ten behoeve van deelwerkingen formulier*/
function sh_StyleAndScript_DeelwerkingFormulier()
{
    
    if(is_page('deelwerking-formulier')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('dwformulier_script', plugins_url('/tieltvrijwilligt/appcode/view/js/deelwerkingformulier.js','_FILE_'), array('jquery'));
    wp_enqueue_script('dwformulier_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_DeelwerkingFormulier');

/*4. functie ten behoeve van interesses*/
function sh_StyleAndScript_Interesses()
{
    if(is_page('interesses')) //slug als argument
    {
        wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
        wp_enqueue_style('algemeen_style'); 
        wp_register_style('interesses_style', plugins_url('/tieltvrijwilligt/appcode/view/css/interesses.css','_FILE_'), array());
        wp_enqueue_style('interesses_style');
        wp_register_script('interesses_script', plugins_url('/tieltvrijwilligt/appcode/view/js/interesses.js','_FILE_'), array('jquery'));
        wp_enqueue_script('interesses_script');
		wp_register_script('excel_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/jquery.table2excel.js','_FILE_'), array('jquery'));
        wp_enqueue_script('excel_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_Interesses');

/*5. functie ten behoeve van interesse formulier*/
function sh_StyleAndScript_InteresseFormulier()
{
    
    if(is_page('interesse-formulier')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('intformulier_script', plugins_url('/tieltvrijwilligt/appcode/view/js/interesseformulier.js','_FILE_'), array('jquery'));
    wp_enqueue_script('intformulier_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_InteresseFormulier');

/*6. functie ten behoeve van vrijwilligers*/
function sh_StyleAndScript_Vrijwilligers()
{
    if(is_page('vrijwilligers')) //slug als argument
    {
        wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
        wp_enqueue_style('algemeen_style'); 
        wp_register_style('vrijwilligers_style', plugins_url('/tieltvrijwilligt/appcode/view/css/vrijwilligers.css','_FILE_'), array());
        wp_enqueue_style('vrijwilligers_style');
        wp_register_script('vrijwilligers_script', plugins_url('/tieltvrijwilligt/appcode/view/js/vrijwilligers.js','_FILE_'), array('jquery'));
        wp_enqueue_script('vrijwilligers_script');
		wp_register_script('excel_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/jquery.table2excel.js','_FILE_'), array('jquery'));
        wp_enqueue_script('excel_script');
		wp_register_style('pagination_style', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/datatable-master/css/datatable.min.css','_FILE_'), array());
        wp_enqueue_style('pagination_style');
        wp_register_script('pagination_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/datatable-master/js/datatable.js','_FILE_'), array('jquery'));
        wp_enqueue_script('pagination_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_Vrijwilligers');

/*7. functie ten behoeve van vrijwilliger formulier*/
function sh_StyleAndScript_VrijwilligerFormulier()
{
    if(is_page('vrijwilliger-formulier-account')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('vraccount_script', plugins_url('/tieltvrijwilligt/appcode/view/js/vrijwilligerformulieraccount.js','_FILE_'), array('jquery'));
    wp_enqueue_script('vraccount_script');
    }
	
    if(is_page('vrijwilliger-formulier-personalia')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('vrpers_script', plugins_url('/tieltvrijwilligt/appcode/view/js/vrijwilligerformulierpersonalia.js','_FILE_'), array('jquery'));
    wp_enqueue_script('vrpers_script');
    }

	if(is_page('vrijwilliger-formulier-foto')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('vrfoto_script', plugins_url('/tieltvrijwilligt/appcode/view/js/vrijwilligerformulierfoto.js','_FILE_'), array('jquery'));
    wp_enqueue_script('vrfoto_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_VrijwilligerFormulier');



/*8. Add custom user roles to the WP settings*/
add_role( 'vereniging', __('Vereniging' ), array( ) );
add_role( 'vrijwilliger', __('Vrijwilliger' ), array( ) );
add_role( 'coordinator', __('Coordinator' ), array( ) );

 
// Change the default role in the WP settings
function client_default_role($value){
    // You can also add conditional tags here and return whatever
    //return 'subscriber'; // This is changed
    return 'vereniging'; // This allows default
};
add_filter('pre_option_default_role', 'client_default_role');

/*9. remove admin bar on the front end*/
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
add_action('after_setup_theme', 'remove_admin_bar');

/*10. functie ten behoeve van sectoren*/
function sh_StyleAndScript_Sectoren()
{
    if(is_page('sectoren')) //slug als argument
    {
        wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
        wp_enqueue_style('algemeen_style'); 
        wp_register_style('sectoren_style', plugins_url('/tieltvrijwilligt/appcode/view/css/sectoren.css','_FILE_'), array());
        wp_enqueue_style('sectoren_style');
        wp_register_script('sectoren_script', plugins_url('/tieltvrijwilligt/appcode/view/js/sectoren.js','_FILE_'), array('jquery'));
        wp_enqueue_script('sectoren_script');
		wp_register_script('excel_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/jquery.table2excel.js','_FILE_'), array('jquery'));
        wp_enqueue_script('excel_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_Sectoren');

/*11. functies ten behoeve van sector formulier*/
function sh_StyleAndScript_SectorFormulier()
{
    
    if(is_page('sector-formulier')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('secformulier_script', plugins_url('/tieltvrijwilligt/appcode/view/js/sectorformulier.js','_FILE_'), array('jquery'));
    wp_enqueue_script('secformulier_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_SectorFormulier');

/*12. functie ten behoeve van functies*/
function sh_StyleAndScript_Functies()
{
    if(is_page('functies')) //slug als argument
    {
        wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
        wp_enqueue_style('algemeen_style'); 
        wp_register_style('functies_style', plugins_url('/tieltvrijwilligt/appcode/view/css/functies.css','_FILE_'), array());
        wp_enqueue_style('functies_style');
        wp_register_script('functies_script', plugins_url('/tieltvrijwilligt/appcode/view/js/functies.js','_FILE_'), array('jquery'));
        wp_enqueue_script('functies_script');
		wp_register_script('excel_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/jquery.table2excel.js','_FILE_'), array('jquery'));
        wp_enqueue_script('excel_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_Functies');

/*13. functies ten behoeve van sector formulier*/
function sh_StyleAndScript_FunctieFormulier()
{
    
    if(is_page('functie-formulier')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('funcformulier_script', plugins_url('/tieltvrijwilligt/appcode/view/js/functieformulier.js','_FILE_'), array('jquery'));
    wp_enqueue_script('funcformulier_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_FunctieFormulier');

/*14. functie ten behoeve van juridische vormen*/

function sh_StyleAndScript_Rechtsvormen()
{
    if(is_page('juridische-vormen')) 
    {
        wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
        wp_enqueue_style('algemeen_style'); 
        wp_register_style('rechtsvormen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/rechtsvormen.css','_FILE_'), array());
        wp_enqueue_style('rechtsvormen_style');
        wp_register_script('rechtsvormen_script', plugins_url('/tieltvrijwilligt/appcode/view/js/juridischevormen.js','_FILE_'), array('jquery'));
        wp_enqueue_script('rechtsvormen_script');
		wp_register_script('excel_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/jquery.table2excel.js','_FILE_'), array('jquery'));
        wp_enqueue_script('excel_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_Rechtsvormen');
 

/*15. functie ten behoeve van juridische vorm formulier*/

function sh_StyleAndScript_RechtsvormFormulier()
{
    
    if(is_page('juridische-vorm-formulier')) 
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('rvformulier_script', plugins_url('/tieltvrijwilligt/appcode/view/js/juridischevormformulier.js','_FILE_'), array('jquery'));
    wp_enqueue_script('rvformulier_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_RechtsvormFormulier');

/*16. functie ten behoeve van organisaties*/
function sh_StyleAndScript_Organisaties()
{
    if(is_page('organisaties')) //slug als argument
    {
        wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
        wp_enqueue_style('algemeen_style'); 
        wp_register_style('organisaties_style', plugins_url('/tieltvrijwilligt/appcode/view/css/organisaties.css','_FILE_'), array());
        wp_enqueue_style('organisaties_style');
        wp_register_script('organisaties_script', plugins_url('/tieltvrijwilligt/appcode/view/js/organisaties.js','_FILE_'), array('jquery'));
        wp_enqueue_script('organisaties_script');
		wp_register_script('excel_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/jquery.table2excel.js','_FILE_'), array('jquery'));
        wp_enqueue_script('excel_script');
		wp_register_style('pagination_style', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/datatable-master/css/datatable.min.css','_FILE_'), array());
        wp_enqueue_style('pagination_style');
        wp_register_script('pagination_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/datatable-master/js/datatable.js','_FILE_'), array('jquery'));
        wp_enqueue_script('pagination_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_Organisaties');

/*17. functies ten behoeve van organisatie formulier beschrijving*/
function sh_StyleAndScript_OrganisatieFormulierBeschrijving()
{
    
    if(is_page('organisatie-formulier-beschrijving')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('orgformbesch_script', plugins_url('/tieltvrijwilligt/appcode/view/js/orgformbesch.js','_FILE_'), array('jquery'));
    wp_enqueue_script('orgformbesch_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_OrganisatieFormulierBeschrijving');

function sh_OrganisatieFormulierBeschrijving() {
   ob_start();
   get_template_part('organisatie-formulier-beschrijving');
   return ob_get_clean();   
} 
add_shortcode( 'organisatie-formulier-beschrijving_shortcode', 'sh_OrganisatieFormulierBeschrijving' );



//18. functies ten behoeve van organisatie formulier bestuur
function sh_StyleAndScript_OrganisatieFormulierBestuur()
{
    
    if(is_page('organisatie-formulier-bestuur')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('orgformbest_script', plugins_url('/tieltvrijwilligt/appcode/view/js/orgformbest.js','_FILE_'), array('jquery'));
    wp_enqueue_script('orgformbest_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_OrganisatieFormulierBestuur');

function sh_OrganisatieFormulierBestuur() {
   ob_start();
   get_template_part('organisatie-formulier-bestuur');
   return ob_get_clean();   
} 
add_shortcode( 'organisatie-formulier-bestuur_shortcode', 'sh_OrganisatieFormulierBestuur' );



//19. functies ten behoeve van organisatie formulier bestuurder
function sh_StyleAndScript_OrganisatieFormulierBestuurder()
{
    
    if(is_page('organisatie-formulier-bestuurder')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('orgformbestuurder_script', plugins_url('/tieltvrijwilligt/appcode/view/js/orgformbestuurder.js','_FILE_'), array('jquery'));
    wp_enqueue_script('orgformbestuurder_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_OrganisatieFormulierBestuurder');

function sh_OrganisatieFormulierBestuurder() {
   ob_start();
   get_template_part('organisatie-formulier-bestuurder');
   return ob_get_clean();   
} 
add_shortcode( 'organisatie-formulier-bestuurder_shortcode', 'sh_OrganisatieFormulierBestuurder' );


//20. functies ten behoeve van organisatie formulier contact
function sh_StyleAndScript_OrganisatieFormulierContact()
{
    
    if(is_page('organisatie-formulier-contact')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('orgformcont_script', plugins_url('/tieltvrijwilligt/appcode/view/js/orgformcont.js','_FILE_'), array('jquery'));
    wp_enqueue_script('orgformcont_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_OrganisatieFormulierContact');


function sh_OrganisatieFormulierContact() {
   ob_start();
   get_template_part('organisatie-formulier-contact');
   return ob_get_clean();   
} 
add_shortcode( 'organisatie-formulier-contact_shortcode', 'sh_OrganisatieFormulierContact' );



//21. functies ten behoeve van organisatie formulier contactpersoon
function sh_StyleAndScript_OrganisatieFormulierContactPersoon()
{
    
    if(is_page('organisatie-formulier-contactpersoon')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('orgformcontpers_script', plugins_url('/tieltvrijwilligt/appcode/view/js/orgformcontpers.js','_FILE_'), array('jquery'));
    wp_enqueue_script('orgformcontpers_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_OrganisatieFormulierContactPersoon');

function sh_OrganisatieFormulierContactPersoon() {
   ob_start();
   get_template_part('organisatie-formulier-contactpersoon');
   return ob_get_clean();   
} 
add_shortcode( 'organisatie-formulier-contactpersoon_shortcode', 'sh_OrganisatieFormulierContactPersoon' );



//22. functies ten behoeve van organisatie formulier logo
function sh_StyleAndScript_OrganisatieFormulierLogo()
{
    
    if(is_page('organisatie-formulier-logo')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
    wp_register_script('orgformlogo_script', plugins_url('/tieltvrijwilligt/appcode/view/js/orgformlogo.js','_FILE_'), array('jquery'));
    wp_enqueue_script('orgformlogo_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_OrganisatieFormulierLogo');


function sh_OrganisatieFormulierLogo() {
   ob_start();
   get_template_part('organisatie-formulier-logo');
   return ob_get_clean();   
} 
add_shortcode( 'organisatie-formulier-logo_shortcode', 'sh_OrganisatieFormulierLogo' );

//23. functies ten behoeve van tieltse verenigingen
function sh_StyleAndScript_TieltseOrganisaties()
{
    
    if(is_page('tieltse-organisaties')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
	wp_register_style('tieltver_style', get_stylesheet_directory_uri() . '/css/tieltseorganisaties.css');
    wp_enqueue_style('tieltver_style');
    wp_register_script('tieltver_script', get_stylesheet_directory_uri() . '/js/tieltseorganisaties.js', array('jquery'),'1.1', true);
    wp_enqueue_script('tieltver_script');
	wp_register_style('pagination_style', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/datatable-master/css/datatable.min.css','_FILE_'), array());
    wp_enqueue_style('pagination_style');
    wp_register_script('pagination_script', plugins_url('/tieltvrijwilligt/appcode/view/js/plugins/datatable-master/js/datatable.js','_FILE_'), array('jquery'));
    wp_enqueue_script('pagination_script');
	}
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_TieltseOrganisaties');


function sh_TieltseOrganisaties() {
   ob_start();
   get_template_part('tieltseorganisaties');
   return ob_get_clean();   
} 
add_shortcode( 'tieltseorganisaties_shortcode', 'sh_TieltseOrganisaties' );

//24. functies ten behoeve van verenigingdetails
function sh_StyleAndScript_OrganisatieDetails()
{
    
    if(is_page('organisatie-details')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
	wp_register_style('orgdetail_style', get_stylesheet_directory_uri() . '/css/organisatiedetails.css');
    wp_enqueue_style('orgdetail_style');
    wp_register_script('orgdetail_script', get_stylesheet_directory_uri() . '/js/organisatiedetails.js', array('jquery'),'1.1', true);
    wp_enqueue_script('orgdetail_script');
	}
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_OrganisatieDetails');


function sh_OrganisatieDetails() {
   ob_start();
   get_template_part('organisatie-details');
   return ob_get_clean();   
} 
add_shortcode( 'organisatiedetails_shortcode', 'sh_OrganisatieDetails' );

/*25. functies ten behoeve van mijn organisatie*/
function sh_StyleAndScript_MijnOrganisatie()
{
    
    if(is_page('mijn-organisatie')) //slug als argument
    {
    wp_register_style('algemeen_style', plugins_url('/tieltvrijwilligt/appcode/view/css/algemeen.css','_FILE_'), array());
    wp_enqueue_style('algemeen_style'); 
    wp_register_style('formulier_style', plugins_url('/tieltvrijwilligt/appcode/view/css/formulier.css','_FILE_'), array());
    wp_enqueue_style('formulier_style'); 
	wp_register_style('mijnorg_style', get_stylesheet_directory_uri().'/css/mijnorganisatie.css');
    wp_enqueue_style('mijnorg_style'); 
    wp_register_script('mijnorg_script', plugins_url('/tieltvrijwilligt/appcode/view/js/mijnorg.js','_FILE_'), array('jquery'));
    wp_enqueue_script('mijnorg_script');
    }
}
add_action('wp_enqueue_scripts', 'sh_StyleAndScript_MijnOrganisatie');

function sh_MijnOrganisatieBeschrijving() {
   ob_start();
   get_template_part('mijn-organisatie-beschrijving');
   return ob_get_clean();   
} 
add_shortcode( 'mijn-organisatie-beschrijving_shortcode', 'sh_MijnOrganisatieBeschrijving' );

function sh_MijnOrganisatieBestuur() {
   ob_start();
   get_template_part('mijn-organisatie-bestuur');
   return ob_get_clean();   
} 
add_shortcode( 'mijn-organisatie-bestuur_shortcode', 'sh_MijnOrganisatieBestuur' );

function sh_MijnOrganisatieBestuurder() {
   ob_start();
   get_template_part('mijn-organisatie-bestuurder');
   return ob_get_clean();   
} 
add_shortcode( 'mijn-organisatie-bestuurder_shortcode', 'sh_MijnOrganisatieBestuurder' );

function sh_MijnOrganisatieContact() {
   ob_start();
   get_template_part('mijn-organisatie-contact');
   return ob_get_clean();   
} 
add_shortcode( 'mijn-organisatie-contact_shortcode', 'sh_MijnOrganisatieContact' );

function sh_MijnOrganisatieContactPersoon() {
   ob_start();
   get_template_part('mijn-organisatie-contactpersoon');
   return ob_get_clean();   
} 
add_shortcode( 'mijn-organisatie-contactpersoon_shortcode', 'sh_MijnOrganisatieContactPersoon' );

function sh_MijnOrganisatieLogo() {
   ob_start();
   get_template_part('mijn-organisatie-logo');
   return ob_get_clean();   
} 
add_shortcode( 'mijn-organisatie-logo_shortcode', 'sh_MijnOrganisatieLogo' );

?>