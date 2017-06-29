<?php
queue_js_file('guest-user-password');

$pageTitle = get_option('guest_user_register_text') ? get_option('guest_user_register_text') : __('Register');
echo head(array('bodyclass' => 'register', 'title' => $pageTitle));
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 offset-md-3 col-md-6 content">
                <h1>Registreer als vrijwilliger</h1>
                <div id='primary'>
                  <div id='capabilities'>
                      <p>
                      <?php echo get_option('guest_user_capabilities'); ?>
                      </p>
                  </div>
                  <?php echo flash(); ?>
                  <?php echo $this->form; ?>
                  <p id='confirm'></p>
                </div>
              </div>
            <div class="col-md-3"><?php //echo simple_nav();?></div>
        </div>
    </div>
</div>
<?php echo foot(); ?>
