<?php
$head = array('title' => __('Confirmation Error'));
echo head($head);
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 offset-md-3 col-md-6 content">
                <h1><?php echo $head['title']?></h1>
                <?php echo flash(); ?>
            <div class="col-md-3"><?php //echo simple_nav();?></div>
        </div>
    </div>
</div>

<?php echo foot(); ?>
