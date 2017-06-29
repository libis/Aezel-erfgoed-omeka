<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>

<div class="container">
  <div class="content-wrapper">
    <!-- Content -->
    <div class="row">
      <div class="col-md-12">
        <p id="simple-pages-breadcrumbs"><a href="<?php echo url("/");?>">Home</a> &gt; <a href="<?php echo url('/solr-search?=""');?>">Objecten</a> &gt; <?php echo metadata('item', array('Dublin Core', 'Title')); ?></p>
        <h1><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h1>
        <?php if (metadata('item', 'Collection Name')) : ?>
            <h3><?php echo link_to_collection_for_item(); ?></h3>
        <?php endif; ?>
      </div>
    </div>

    <div class="row">
      <?php if (metadata('item', 'has files')) : ?>
        <div class="col-md-4">
          <div class="element-text"><?php echo files_for_item(array('imageSize' => 'fullsize')); ?></div>
        </div>
      <?php endif; ?>

      <div class="col-md-8">
        <?php if (metadata('item', 'Item Type Name') !== 'Nieuws') : ?>

            <?php echo all_element_texts('item', array("show_element_set_headings"=>false)); ?>
        <?php else : ?>
            <div class="date"><?php echo metadata('item', array('Dublin Core', 'Date')); ?></div>
            <div class="description"><?php echo metadata('item', array('Dublin Core', 'Description')); ?></div>
            <div class="author"><?php echo metadata('item', array('Dublin Core', 'Creator')); ?></div>
        <?php endif;?>
        <!-- The following prints a list of all tags associated with the item -->
        <?php if (metadata('item', 'has tags')) : ?>
        <div id="item-tags" class="element">
            <h3><?php echo __('Tags'); ?></h3>
            <div class="element-text"><?php echo tag_string('item'); ?></div>
        </div>
        <?php endif;?>

        <!-- The following prints a citation for this item. -->
        <!--<div id="item-citation" class="element">
            <h3><?php echo __('Citation'); ?></h3>
            <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
        </div>-->

        <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
      </div>
    </div>
    <nav>
      <ul class="item-pagination navigation">
          <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
          <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
      </ul>
    </nav>
  </div>
</div>
<?php echo foot(); ?>
