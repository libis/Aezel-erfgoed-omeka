<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>

<?php echo head(array(
  'title' => nl_getExhibitField('title'),
  'bodyclass' => 'neatline show'
)); ?>
<section class="metadata-section general-section exhibit-show-section">
  <div id="content" class='neatline-content container-fluid' role="main" tabindex="-1">
          <div class="row wrapper no-gutters">
            <!-- Exhibit and description : -->
            <?php echo nl_getNarrativeMarkup(); ?>
            <?php echo nl_getExhibitMarkup(); ?>
          </div>
    </div>
  </section>
<?php echo foot(); ?>
