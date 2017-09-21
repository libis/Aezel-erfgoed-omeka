<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>
<section class="collectie-section">
  <div id="content" class='container' role="main" tabindex="-1">
    <div class="row">
      <div class="col-sm-10 page">
        <div class='content browse'>
          <h1><?php echo $pageTitle; ?> <?php echo __('(%s total)', $total_results); ?></h1>
          <?php echo pagination_links(); ?>

          <?php
          $sortLinks[__('Title')] = 'Dublin Core,Title';
          $sortLinks[__('Date Added')] = 'added';
          ?>
          <div id="sort-links">
              <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
          </div>

          <?php foreach (loop('collections') as $collection): ?>
            <div class="collection">

                <h3><?php echo link_to_collection(); ?></h3>

                <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
                    <?php echo link_to_collection($collectionImage, array('class' => 'image')); ?>
                <?php endif; ?>

                <?php
                  $title = metadata('collection', array('Dublin Core', 'Title'));
                ?>

                <?php if (metadata('collection', array('Dublin Core', 'Description'))): ?>
                <div class="collection-description">
                    <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'), array('snippet'=>150))); ?>
                </div>
                <?php endif; ?>

                <?php if ($collection->hasContributor()): ?>
                <div class="collection-contributors">
                    <p>
                    <strong><?php echo __('Contributors'); ?>:</strong>
                    <?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?>
                    </p>
                </div>
                <?php endif; ?>

                <p class="view-items-link">
                  <a href="<?php echo url('/solr-search/?q=&facet=collection:%22'.$title.'%22');?>">Bekijk deze items in <?php echo $title; ?></a>
                </p>

                <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>

            </div><!-- end class="collection" -->
          <?php endforeach; ?>

          <?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

          <?php echo pagination_links(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php echo foot(); ?>
