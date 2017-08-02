<?php


queue_js_file('admin-globals');
queue_js_file('tiny_mce', 'javascripts/vendor/tiny_mce');
queue_js_file('elements');

$head = array('title' => __('Edit Profile'), 'content_class' => 'horizontal-nav');
echo head($head);

?>
<script type="text/javascript" charset="utf-8">
//<![CDATA[
// TinyMCE hates document.ready.
jQuery(window).load(function () {

    Omeka.wysiwyg({
        mode: "none",
        forced_root_block: ""
    });

    // Must run the element form scripts AFTER reseting textarea ids.
    jQuery(document).trigger('omeka:elementformload');
    Omeka.saveScroll();
});

jQuery(document).bind('omeka:elementformload', function (event) {
    Omeka.Elements.makeElementControls(event.target, <?php echo js_escape(url('user-profiles/profiles/element-form')); ?>,'UserProfilesProfile'<?php if ($id = metadata('userprofilesprofile', 'id')) echo ', '.$id; ?>);
    Omeka.Elements.enableWysiwyg(event.target);
});
//]]>
</script>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section user-profile">
        <div class="row">
            <div class="col-xs-12 col-md-9 content">

              <?php if(count($profile_types) > 1): ?>
              <p class='warning'><?php echo __("Save changes before moving to edit a new profile type."); ?></p>
              <?php endif; ?>

              <?php echo flash(); ?>

              <form method="post" action="">
              <section id="edit-form" class="seven columns alpha">

              <h1><?php echo __('Pas je profiel aan', $userprofilestype->label); ?></h1>

              <p class="user-profiles-profile-description">
                  <?php echo $userprofilestype->description; ?>
              </p>
                  <?php foreach($userprofilestype->Elements as $element):?>
                  <?php echo $this->profileElementForm($element, $userprofilesprofile); ?>
                  <?php endforeach; ?>
              </section>
            </div>
              <div class="col-md-3  content">
                  <div id='save' class='panel'>
                    <input type="submit" value='<?php echo __('Save Changes'); ?>' name='submit' class='big green button'/>
                      <?php if($userprofilesprofile->exists()): ?>
                      <a href="<?php echo url('user-profiles/profiles/delete-confirm/id/' . $userprofilesprofile->id); ?>" class="big red button delete-confirm"><?php echo __('Delete'); ?></a>
                      <?php endif; ?>
                      <div class="public">
                          <?php if($userprofilestype->public == 0): ?>
                          <p><?php echo __('This profile type is private'); ?></p>
                          <input type="hidden" value="0" name="public" />
                          <?php else: ?>
                          <label for="public"><?php echo __('Public'); ?></label>
                          <input type="hidden" value="0" name="public" />
                          <input type="checkbox" value="1" id="public" name="public" <?php echo  $userprofilesprofile->public ? "checked='checked'" : ""; ?> />
                          <?php endif; ?>
                      </div>
                  </div>
              </form>
              </div>
          </div>
      </div>
  </div>
</div>
<?php echo foot(); ?>
