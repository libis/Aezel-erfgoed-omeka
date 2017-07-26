<?php echo head(); ?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 col-md-9 content">
								<div id="primary">
									<h1><?php echo __("Bedankt voor uw bijdrage."); ?></h1>
									<p><?php echo __("Je bijdrage zal pas gepubliceerd worden nadat de beheerder het object goedkeurt voor publicatie. Voeg in tussentijd gerust nog meer objecten toe.</a>"); ?>
									</p>
									<?php if(get_option('contribution_simple') && !current_user()): ?>
									<p><?php echo __("If you would like to interact with the site further, you can use an account that is ready for you. Visit %s, and request a new password for the email you used", "<a href='" . url('users/forgot-password') . "'>" . __('this page') . "</a>"); ?>
									<?php endif; ?>
								</div>
							</div>
				</div>
		</div>
</div>	
<?php echo foot(); ?>
