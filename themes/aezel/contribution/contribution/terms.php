<?php
$head = array('title' => __('Contribution Terms of Service'));
echo head($head);
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 col-md-9 content">
<div id="primary">
<h1><?php echo $head['title']; ?></h1>
<?php echo get_option('contribution_consent_text'); ?>
</div>
</div>
</div>
</div>
</div>
<?php echo foot(); ?>
