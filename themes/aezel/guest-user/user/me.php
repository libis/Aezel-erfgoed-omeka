<?php
$user = current_user();
$pageTitle =  get_option('guest_user_dashboard_label');
echo head(array('title' => $pageTitle));
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 offset-md-3 col-md-6 content">
                <h1>Mijn account</h1>

                <?php echo flash(); ?>

                <?php foreach($widgets as $index=>$widget): ?>
                <div class='guest-user-widget <?php if($index & 1): ?>guest-user-widget-odd <?php else:?>guest-user-widget-even<?php endif;?>'>
                <?php echo GuestUserPlugin::guestUserWidget($widget); ?>
                </div>
                <?php endforeach; ?>
              </div>
            <div class="col-md-3"><?php //echo simple_nav();?></div>
            </div>
            </div>
            </div>
<?php echo foot(); ?>
