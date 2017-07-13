<?php
    queue_js_file('admin-globals');
    $head = array('title' => __("User Profile | %s" , $user->name),
                  'bodyclass' => '');
    echo head($head);
?>
<script type="text/javascript" charset="utf-8">
//<![CDATA[
// TinyMCE hates document.ready.
jQuery(window).load(function () {
    Omeka.saveScroll();
});
//]]>
</script>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-md-9 content">
              <?php if(empty($userprofilesprofile)):?>
                  <p><?php echo __('No public profile'); ?></p>
              <?php else: ?>

              <?php $type = $userprofilesprofile->getProfileType();?>
              <?php if(is_allowed($userprofilesprofile, 'edit')): ?>
                  <?php if($userprofilesprofile->public == 1): ?>
                    <p><?php echo __("(Public)"); ?></p>
                  <?php else: ?>
                    <p><?php echo __("(Private)");?></p>
                  <?php endif; ?>
              <?php endif; ?>

              <div class="element-set">
                  <?php if($type): //private types won't show up! ?>
                    <h2><?php echo html_escape($type->label); ?></h2>
                  <?php endif; ?>

                  <!--libis_start-->
                  <!-- Do not show profile information to other users if it is set to private. -->
                  <?php if($userprofilesprofile->public === 0 && $userprofilesprofile->owner_id != current_user()->id): ?>
                      <p><?php echo __("No public information of the user available."); ?></p>
                  <?php else: ?>

                    <?php foreach($userprofilesprofile->getElements() as $element):?>
                    <div class="element">
                        <div class="field two columns alpha">
                            <label><?php echo html_escape(__('%s' , $element->name)); ?></label>
                        </div>
                        <?php $i = 0; ?>
                        <?php if(get_class($element) == 'Element'): ?>
                            <?php foreach ($userprofilesprofile->getElementTextsByRecord($element) as $text):
                            $i++;
                            if( $i == 1): ?>
                                <div class="element-text five columns omega"><p><?php echo $text->text; ?></p></div>
                            <?php else: ?>
                                <div class="element-text five columns offset-by-two"><p><?php echo $text->text; ?></p></div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <?php $valueObject = $userprofilesprofile->getValueRecordForMulti($element);?>
                            <div class="element-text five columns omega">
                                <?php if($valueObject): ?>
                                <?php $values = $valueObject->getValuesForDisplay(); ?>
                                <?php foreach($values as $value): ?>
                                <p><?php echo $value ?></p>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <p></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div><!-- end element -->
                  <?php endforeach; ?>
              </div><!-- end element-set -->

        		<?php endif; ?>
        		<!--libis_end-->

        <?php fire_plugin_hook('user_profiles_user_page', array('user'=>$user, 'view'=>$this) ); ?>
    <?php endif; ?>
    </section>
    <?php if(current_user() && $user->id == current_user()->id || is_allowed('UserProfiles_Profile', 'edit')):  ?>
        <section class="three columns omega">
            <div id='save' class='panel'>
                <a class="big button" href="<?php echo url('user-profiles/profiles/edit/id/' . $user->id . '/type/' . $userprofilestype->id); ?>"><?php echo __('Edit %s' ,$userprofilestype->label); ?></a>
            </div>
        </section>
    <?php endif; ?>
    </div>
          <div class="col-md-3"><?php //echo simple_nav();?>
              <ul id='section-nav' class='navigation tabs'>
                  <?php
                      $typesNav = array();
                      foreach($profile_types as $index=>$type) {
                          $typesNav[$type->label] = array('label'=>$type->label,
                                                          'uri'=>url('user-profiles/profiles/user/id/' . $user->id .'/type/'.$type->id),
                                                          );
                      }
                      echo nav($typesNav, 'user_profiles_types_user_edit');
                  ?>
              </ul>
              <?php echo flash(); ?>
          </div>
      </div>
    </div>
</div>

<?php if(!is_admin_theme()) :?>
    </div>
<?php endif;?>
<?php echo foot(); ?>
