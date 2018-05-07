<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>
<?php if (metadata('item', 'has files')) : ?>
  <div class="element-text"><?php echo item_image('fullsize'); ?></div>
<?php endif; ?>
  <div class="date"><?php echo metadata('item', array('Dublin Core', 'Date')); ?></div>
  <div class="description"><?php echo metadata('item', array('Dublin Core', 'Description')); ?></div>
  <div class="author"><?php echo metadata('item', array('Dublin Core', 'Creator')); ?></div>
<?php if (metadata('item', 'has tags')) : ?>
  <div id="item-tags" class="element">
      <h3><?php echo __('Tags'); ?></h3>
      <div class="element-text"><?php echo tag_string('item'); ?></div>
  </div>
<?php endif;?>

<hr />

<!-- Link. -->
<?php echo link_to(
  get_current_record('item'), 'show', 'View the item in Omeka'
); ?>
