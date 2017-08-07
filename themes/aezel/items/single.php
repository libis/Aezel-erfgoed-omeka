<?php $page = get_current_record('simplePagesPage',false);?>
<?php if($page):?>
<div class="row single">
  <div class="col-xs-12 link-to-exhibits">
    <a href="<?php echo url("/exhibits/browse?tags=".$page->slug);?>">Onze tentoonstellingen</a>
    <a href="<?php echo url('/solr-search/?q=&facet=collection:%22'.$page->title.'%22');?>">Onze collectie</a>
  </div>
</div>
<?php endif; ?>
<div class="row single single-logo">

  <?php if ($img = item_image('fullsize', array(), 0, $item)) {?>
      <div class="col-xs-12 col-sm-4">
          <?php echo $img; ?>
      </div>
  <?php } ?>
  <div class="col-xs-12 col-sm-8">
      <?php $description = metadata($item, array('Dublin Core', 'Description'));?>
      <?php if ($description): ?>
          <p class="item-description"><?php echo $description; ?></p>
      <?php endif; ?>
  </div>

</div>
<hr>
<?php if ($img = item_image('fullsize', array(), 1, $item)) {?>
<div class="row single">
    <div class="col-xs-12">
        <?php echo $img; ?>
    </div>
</div>
<?php } ?>
