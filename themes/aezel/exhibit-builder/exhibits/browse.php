<?php
$title = __('Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<section class="metadata-section general-section exhibit-show-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
        <div class="col-sm-12 page">
          <div class='content browse'>
            <h1><?php echo $title; ?> <?php //echo __('(%s total)', $total_results); ?></h1>
            <?php if (count($exhibits) > 0) : ?>
              <div class="row">
                <div class="col-md-5">
                    <form id="search-form-exhibit" method="get" action="" name="search-form">
                        <div class="input-group">
                          <input id="query" type="text" class="form-control" placeholder="" title="Search" value="" name="query">

                          <span class="input-group-btn">
                               <button class="btn btn-default" type="submit">zoek</button>
                          </span>
                        </div>
                        <input type="hidden" name="record_types[]" value="Exhibit">
                        <input type="hidden" name="record_types[]" value="ExhibitPage">
                        <input type="hidden" name="query_type" value="keyword">
                    </form>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <p class="sub-nav">
                        <a href="<?php echo url('exhibits');?>"><?php echo __('Zoek doorheen alle tentoonstellingen');?></a>
                        <a href="<?php echo url('exhibits/tags');?>"><?php echo __('Browse by Tag');?></a>
                    </p>
                  </div>
              </div>
            <?php echo pagination_links(); ?>

            <?php $exhibitCount = 0; ?>
            <?php foreach (loop('exhibit') as $exhibit) : ?>
                <?php $exhibitCount++; ?>
              <div class="row exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
                <div class="col-sm-3 page">
                    <?php if ($exhibitImage = record_image($exhibit, 'square_thumbnail')) : ?>
                        <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
                    <?php endif; ?>
                </div>
                <div class="col-sm-9 page">
                  <h2><?php echo link_to_exhibit(); ?></h2>
                  <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                  <div class="description"><?php echo $exhibitDescription; ?></div>
                  <?php endif; ?>
                  <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')) : ?>
                  <p class="tags"><?php echo $exhibitTags; ?></p>
                  <?php endif; ?>
                  <p class="lees-meer"><?php echo exhibit_builder_link_to_exhibit($exhibit, 'Lees meer', array('class' => 'lees-meer-link')); ?></p>
                </div>
              </div>
            <?php endforeach; ?>

            <?php echo pagination_links(); ?>

            <?php else: ?>
              <p><?php echo __('There are no exhibits available yet.'); ?></p>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php echo foot(); ?>
