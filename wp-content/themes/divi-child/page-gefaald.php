<?php get_header();?>

<div id="main-content">
<div class="container">
<div id="content-area" class="clearfix">
<section id="content" class="sh_content">
<p><?php echo $_SESSION['message']; ?></p>
<p><?php echo $_SESSION['errormessage']; ?></p>
<p><?php echo $_SESSION['errorcode']; ?></p>
</section>		
</div> <!-- #content-area -->
</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>

