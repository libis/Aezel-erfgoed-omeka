<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<div class="container">
  <div class="content-wrapper">
    <!-- Content -->
    <div class="row">
      <div class="col-md-12">
        <p id="simple-pages-breadcrumbs"><a href="<?php echo url("/");?>">Home</a> &gt; <a href="<?php echo url('/solr-search?=""');?>">Objecten</a> &gt; <?php echo $collectionTitle; ?></p>
        <h1><?php echo $collectionTitle; ?></h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php echo all_element_texts('collection'); ?>

        <div id="collection-items">
            <h2><?php echo link_to_items_browse(__('Items in the %s Collection', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></h2>
            <?php if (metadata('collection', 'total_items') > 0): ?>
                <?php foreach (loop('items') as $item): ?>
                <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
                <div class="row item">
                    <h3><?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?></h3>

                    <?php if (metadata('item', 'has thumbnail')): ?>
                      <div class="col-md-4">
                        <div class="item-img">
                            <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    <div class="col-md-8">
                      <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
                      <div class="item-description element">
                          <p><?php echo $text; ?></p>
                      </div>
                      <?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
                      <div class="item-description element">
                          <?php echo $description; ?>
                      </div>
                      <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p><?php echo __("There are currently no items within this collection."); ?></p>
            <?php endif; ?>
        </div><!-- end collection-items -->
        <?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>
      </div>
    </div>
  </div>
</div>

<?php echo foot(); ?>
