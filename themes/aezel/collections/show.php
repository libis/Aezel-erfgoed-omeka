<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<section class="collectie-section">
  <div id="content" class='container' role="main" tabindex="-1">
    <div class="row">
      <div class="col-sm-12">
        <div class='content browse'>
          <p id="simple-pages-breadcrumbs"><a href="<?php echo url("/");?>">Home</a> &gt; <a href="<?php echo url('/solr-search?=""');?>">Items</a> &gt; <?php echo $collectionTitle; ?></p>
          <h1><?php echo $collectionTitle; ?></h1>

          <?php echo all_element_texts('collection'); ?>

          <div id="collection-items">
            <h2><?php echo link_to_items_browse(__('Items in the %s Collection', $collectionTitle), array('collection' => metadata('collection', 'id'))); ?></h2>
            <?php if (metadata('collection', 'total_items') > 0): ?>
                <?php foreach (loop('items') as $item): ?>
                <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
                <div class="row">
                  <div class="item">
                    <?php if (metadata('item', 'has thumbnail')): ?>
                      <div class="col-md-2">
                        <div class="item-img">
                            <?php echo link_to_item(item_image('thumbnail', array('alt' => $itemTitle))); ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    <div class="col-md-10">
                      <h5><?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?></h5>
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
</section>
<?php echo foot(); ?>
