<?php
$title = __('Browse Exhibits by Tag');
echo head(array('title' => $title, 'bodyclass' => 'exhibits tags'));
?>
<section class="metadata-section general-section exhibit-show-section">
  <div id="content" class='container' role="main" tabindex="-1">
      <div class="row">
        <div class="col-sm-12 page">
          <div class='content browse'>
            <h1><?php echo $title; ?></h1>
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
            <div class="row">
              <div class="col-md-12">
                <?php echo tag_cloud($tags, 'exhibits/browse'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


<?php echo foot(); ?>
