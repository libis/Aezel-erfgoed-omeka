<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title').' &middot; '.metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show', ));
?>
<section class="metadata-section general-section exhibit-show-section">
  <div class='container' role="main" tabindex="-1">
    <div class="row ">
      <div class="col-md-9 content">
            <p id="simple-pages-breadcrumbs">
              <span><a href="<?php echo url('/');?>">Home</a></span>
               > <span><a href="<?php echo url('/exhibits');?>">Tentoonstellingen</a></span>
               > <?php echo exhibit_builder_link_to_exhibit($exhibit); ?>
               > <?php echo metadata('exhibit_page', 'title'); ?>
             </p>
            <h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></h1>
            <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
            <div class="exhibit-credits">
              <h3><?php echo $exhibitCredits; ?></h3>
            </div>
            <?php endif; ?>

            <div id="exhibit-blocks">
              <?php exhibit_builder_render_exhibit_page(); ?>
            </div>

            <div id="exhibit-page-navigation">
                <?php if ($prevLink = exhibit_builder_link_to_previous_page()): ?>
                <div id="exhibit-nav-prev">
                <?php echo $prevLink; ?>
                </div>
                <?php endif; ?>
                <?php if ($nextLink = exhibit_builder_link_to_next_page()): ?>
                <div id="exhibit-nav-next">
                <?php echo $nextLink; ?>
                </div>
                <?php endif; ?>
                <div id="exhibit-nav-up">
                <?php echo exhibit_builder_page_trail(); ?>
                </div>
            </div>
      </div>
      <div class="col-md-3 nav">
        <nav id="exhibit-pages">
            <h4><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h4>
            <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
        </nav>
      </div>

    </div>
  </div>
</section>
<?php echo foot(); ?>
