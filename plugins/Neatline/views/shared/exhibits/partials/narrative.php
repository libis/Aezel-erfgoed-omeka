<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>
<?php if(nl_getExhibitField('narrative')):?>
<div class="col-md-3 col-xs-12 block">
  <!-- Exhibit title: -->
  <h1><?php echo nl_getExhibitField('title'); ?></h1>

  <!-- Link to accessible alternative representation -->
  <?php echo nl_getExhibitAccessibleURL(null, __('Accessible Alternative')); ?>

  <!-- "View Fullscreen" link: -->
  <?php //echo nl_getExhibitLink(null, 'fullscreen', __('View Fullscreen'), array('class' => 'nl-fullscreen')); ?>
  <?php echo nl_getExhibitField('narrative'); ?>
</div>
<?php endif;?>
