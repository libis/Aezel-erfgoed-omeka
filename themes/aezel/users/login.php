<?php
queue_js_file('login');
$pageTitle = __('Log In');
echo head(array('bodyclass' => 'login', 'title' => $pageTitle), $header);
$namespace = new Zend_Session_Namespace;
$namespace->redirect = "/vrijwilligers";
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 offset-md-3 col-md-6 content">
                <h1>Aanmelden als vrijwilliger</h1>
                <p id="login-links">
                <span id="backtosite"><a href="<?php echo url("/guest-user/user/register"); ?>">Nog niet geregistreerd?</a></span>  |
                <span id="forgotpassword"><?php echo link_to('users', 'forgot-password', __('Lost your password?')); ?></span>
                </p>

                <?php echo flash(); ?>

                <?php echo $this->form->setAction($this->url('users/login')); ?>
              </div>
            <div class="col-md-3"><?php //echo simple_nav();?></div>
            </div>
            </div>
            </div>
<?php echo foot(array(), $footer); ?>
