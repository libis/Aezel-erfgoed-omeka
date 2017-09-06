<?php
queue_css_file('geolocation-items-map');

$title = __('Browse Items on the Map') . ' ' . __('(%s total)', $totalItems);
echo head(array('title' => $title, 'bodyclass' => 'map browse'));
?>
<section class="map-section">
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section  content">
        <div class="row">
            <div class="col-md-9">
                <h1>Onze Collectie op de kaart</h1>

                  <div id="geolocation-browse">
                      <?php echo $this->googleMap('map_browse', array('list' => 'map-links', 'params' => $params)); ?>
                        </div>
                </div>
                <div class="col-md-3">
                  <div id="map-links">
                    <h3><?php echo __('Find An Item on the Map'); ?></h3>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo foot(); ?>
