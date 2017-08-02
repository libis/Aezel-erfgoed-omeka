<?php
/**
 * @version $Id$
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 * @copyright Center for History and New Media, 2010
 * @package Contribution
 */

queue_js_file('contribution-public-form');
$contributionPath = get_option('contribution_page_path');
if(!$contributionPath) {
    $contributionPath = 'contribution';
}
queue_css_file('form');

//load user profiles js and css if needed
if(get_option('contribution_user_profile_type') && plugin_is_active('UserProfiles') ) {
    queue_js_file('admin-globals');
    queue_js_file('tiny_mce', 'javascripts/vendor/tiny_mce');
    queue_js_file('elements');
    queue_css_string("input.add-element {display: block}");
}

$head = array('title' => 'Voeg een eigen object toe',
              'bodyclass' => 'contribution');
echo head($head); ?>
<script type="text/javascript">
// <![CDATA[
//enableContributionAjaxForm(<?php echo js_escape(url($contributionPath.'/type-form')); ?>);
// ]]>
</script>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-xs-12 col-md-9 content">
                <div id="primary">
                <?php echo flash(); ?>
                    <h1><?php echo $head['title']; ?></h1>

                    <?php if(!get_option('contribution_simple') && !$user = current_user()) :?>
                        <?php $session = new Zend_Session_Namespace;
                              $session->redirect = absolute_url();
                        ?>
                        <p>Je moet een <a href='<?php echo url('guest-user/user/register'); ?>'>account aanmaken </a> of <a href='<?php echo url('guest-user/user/login'); ?>'>aanmelden</a> voor je een object kan toevoegen.</p>
                    <?php else: ?>
                        <form method="post" action="" enctype="multipart/form-data">
                            <fieldset id="contribution-item-metadata">
                                <!--<div class="inputs">
                                    <label for="contribution-type"><?php echo __("What type of item do you want to contribute?"); ?></label>
                                    <?php $options = get_table_options('ContributionType' ); ?>
                                    <?php $typeId = isset($type) ? $type->id : '' ; ?>
                                    <?php echo $this->formSelect( 'contribution_type', $typeId, array('multiple' => false, 'id' => 'contribution-type') , $options); ?>
                                    <input type="submit" name="submit-type" id="submit-type" value="Select" />
                                </div>-->
                                <input type="hidden" name="contribution_type" value="2">
                                <div id="contribution-type-form">
                                <?php if(isset($type)) { include('type-form.php'); }?>
                                </div>
                            </fieldset>

                            <fieldset id="contribution-confirm-submit" <?php if (!isset($type)) { echo 'style="display: none;"'; }?>>
                                <?php if(isset($captchaScript)): ?>
                                    <div id="captcha" class="inputs"><?php echo $captchaScript; ?></div>
                                <?php endif; ?>
                                <div class="inputs">
                                    <?php $public = isset($_POST['contribution-public']) ? $_POST['contribution-public'] : 0; ?>
                                    <!--libis_start-->
                                    <!--by default contribution is public -->
                                    <?php /*echo $this->formCheckbox('contribution-public', $public, null, array('1', '0')); */?>
                                    <?php /*echo $this->formLabel('contribution-public', __('Publish my contribution on the web.')); */?>
                                    <!--libis_end-->
                                </div>
                                <div class="inputs">
                                    <?php $anonymous = isset($_POST['contribution-anonymous']) ? $_POST['contribution-anonymous'] : 0; ?>
                                    <!--libis_start-->
                                    <!--disable anonymous contribution-->
                                    <?php /*echo $this->formCheckbox('contribution-anonymous', $anonymous, null, array(1, 0)); */?>
                                    <?php /*echo $this->formLabel('contribution-anonymous', __("Contribute anonymously.")); */?>
                                    <!--libis_end-->
                                </div>
                                <p><?php echo __("Om een object toe te voegen moet u akkoord gaan met de <a href='" . url("voorwaarden") . "' target='_blank'>voorwaarden</a>"); ?></p>
                                <div class="inputs">
                                    <?php $agree = isset( $_POST['terms-agree']) ?  $_POST['terms-agree'] : 0 ?>
                                    <?php echo $this->formCheckbox('terms-agree', $agree, null, array('1', '0')); ?>
                                    <?php echo $this->formLabel('terms-agree', __('Ik ga akkoord met de voorwaarden.')); ?>
                                </div>
                                <?php echo $this->formSubmit('form-submit', __('Voeg toe'), array('class' => 'submitinput')); ?>
                            </fieldset>
                            <?php echo $csrf; ?>
                        </form>
                    <?php endif; ?>
                </div>
              </div>
        </div>
    </div>
</div>
<?php echo foot();
