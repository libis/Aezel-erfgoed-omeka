<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>
<section class="metadata-section general-section exhibit-show-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row ">
        <div class="col-md-9 content">
          <p id="simple-pages-breadcrumbs">
            <span><a href="<?php echo url('/');?>">Home</a></span>
             > <span><a href="<?php echo url('/exhibits');?>">Tentoonstellingen</a></span>
             > <?php echo metadata('exhibit', 'title'); ?>
           </p>
            <h1><?php echo metadata('exhibit', 'title'); ?></h1>
            <?php if (($exhibitCredits = metadata('exhibit', 'credits'))) : ?>
            <div class="exhibit-credits">
                  <h3><?php echo $exhibitCredits; ?></h3>
            </div>
            <?php endif; ?>

            <?php if (($exhibit->cover_image_file_id)) : ?>
              <?php
                $file = get_record_by_id('File',$exhibit->cover_image_file_id);
                $cover_url = $file->getWebPath('fullsize');
              ?>
              <img class="cover" src="<?php echo $cover_url ?>">
            <?php endif; ?>

            <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))) : ?>
            <div class="exhibit-description">
                <?php echo $exhibitDescription; ?>
            </div>
            <?php endif; ?>
            <div class="start">
              <a href="<?php echo $exhibit->getFirstTopPage()->getRecordUrl();?>">Start tentoonstelling</a>
            </div>
        </div>

        <div class="col-md-3 nav">
          <h4><span class='story-title'><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></span></h4>
            <?php echo exhibit_builder_page_nav(); ?>
            <?php
            $pageTree = exhibit_builder_page_tree();
            if ($pageTree) :
            ?>
              <nav id="exhibit-pages">
                <?php echo $pageTree; ?>
              </nav>
            <?php
            endif;
            ?>
        </div>
      </div>
  </div>
<?php echo foot(); ?>
