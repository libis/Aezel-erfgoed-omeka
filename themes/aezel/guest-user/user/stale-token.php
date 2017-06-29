<?php
$head = array('title'=> __('Stale Token'));
echo head($head);
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 offset-md-3 col-md-6 content">
                <h1><?php echo $head['title']; ?></h1>

                  <?php echo flash(); ?>
                  <p><?php echo __("Your temporary access to the site has expired. Please check your email for the link to follow to confirm your registration."); ?></p>

                  <p><?php echo __("You have been logged out, but can continue browsing the site."); ?></p>
                </div>
                <div class="col-md-3"><?php //echo simple_nav();?></div>
                </div>
                </div>
                </div>

<?php echo foot(); ?>
