<?php
$js = "
var guestUserPasswordAgainText = '" . __('Password again for match') . "';
var guestUserPasswordsMatchText = '" . __('Passwords match!') . "';
var guestUserPasswordsNoMatchText = '" . __("Passwords do not match!") . "'; ";

queue_js_string($js);
queue_js_file('guest-user-password');
$pageTitle = __('Update Account');
echo head(array('bodyclass' => 'register', 'title' => $pageTitle));
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 offset-md-3 col-md-6 content">
                <h1>Pas je gegevens aan</h1>
                <div id='primary'>
                <?php echo flash(); ?>
                <?php echo $this->form; ?>
                </div>
            </div>
        <div class="col-md-3"><?php //echo simple_nav();?></div>
      </div>
    </div>
</div>
<?php echo foot(); ?>
