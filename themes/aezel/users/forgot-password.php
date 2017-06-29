<?php
$pageTitle = __('Forgot Password');
echo head(array('title' => $pageTitle, 'bodyclass' => 'login'), $header);
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 offset-md-3 col-md-6 content">
<h1><?php echo $pageTitle; ?></h1>
<p id="login-links">
<span id="backtologin"><?php echo link_to('users', 'login', __('Back to Log In')); ?></span>
</p>

<p class="clear"><?php echo __('Enter your email address to retrieve your password.'); ?></p>
<?php echo flash(); ?>
<form method="post" accept-charset="utf-8">
    <div class="field">
        <label for="email"><?php echo __('Email'); ?></label>
        <?php echo $this->formText('email', @$_POST['email']); ?>
    </div>

    <input id="submit" type="submit" class="submit" value="<?php echo __('Submit'); ?>" />
</form>
</div>
<div class="col-md-3"><?php //echo simple_nav();?></div>
</div>
</div>
</div>
<?php echo foot(array(), $footer); ?>
