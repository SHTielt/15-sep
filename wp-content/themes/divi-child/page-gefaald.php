<?php get_header();?>
<div id="main-content">
<div class="container">
<div id="content-area" class="clearfix">
<section id="content" class="sh_content">
<p><?php
if($_SESSION['message'] != 'none')
{
	echo $_SESSION['message'];	
}
?>
</p>
<p><?php
if($_SESSION['errormessage'] != 'none')
{
 echo $_SESSION['errormessage'];
} ?>
</p>
<p><?php
if($_SESSION['errorcode'] != 'none')
{
 echo $_SESSION['errorcode'];
} ?>
</p>
</section>		
</div> <!-- #content-area -->
</div> <!-- .container -->
</div> <!-- #main-content -->
<?php get_footer(); ?>

