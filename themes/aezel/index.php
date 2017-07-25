<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <section class="kijker">
                <div class="col-sm-12 col-md-6">
                    <div class="carousel-wrap">
                        <div data-ride="carousel" class="carousel slide" id="myCarousel">
                          <div role="listbox" class="carousel-inner">
                              <?php echo libis_get_featured_exhibits();?>
                          </div>
                        </div>
                    </div>
                </div>
                <div id="right" class="col-sm-12 col-md-6">
                    <div class="well"></div>
                    <p class="link-to-all">
                      <a href="<?php echo url("exhibits");?>"><i class="fa fa-angle-right" aria-hidden="true"></i>
                          Meer tentoonstellingen</a></p>
                </div>
           </section>
       </div>
    </div>
</div>
<section class='about eigen'>
<div class="container content-wrapper bs-docs-section ">
    <div class="row">
        <div class="offset-lg-1 col-lg-10">
            <div class="eigen-verhaal">
              <h3><span>Vertel je eigen verhaal</span></h3>
              <div class="row">
                <div class="offset-lg-1 col-sm-3 col-md-3 col-lg-2 hidden-xs-down pencil">
                    <img src="<?php echo img("logos/book_logo.png");?>">
                </div>
                <div class="col-md-8 col-sm-8 col-lg-9 col-xs-12">
                    <img src="<?php echo img("logos/book_logo.png");?>" class="hidden-sm-up pull-left img-in-text" />
                    <p class="description">Wil jij een eigen verhaal over onze streek met ons delen?
                    Morbi pharetra tristique dolor nec sagittis. Suspendisse pellentesque lacinia hendrerit. Sed volutpat tristique libero ac mollis. Donec non nisl auctor, tristique lectus nec, dignissim orci.
                    </p>
                    <p class="lees-meer"><a href="<?php echo url("aan-de-slag");?>">Ga zelf aan de slag</a></p>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
</section>
<section class='section-icons'>   <!-- Content -->
    <div class="container content-wrapper bs-docs-section ">
        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
        <h3  class="ontdek"><span>Onze partners</span></h3>
        <div class="row icons">
          <div class="responsive" role="toolbar">
            <?php echo libis_get_partners();?>
          </div>
        </div>
        <div class="row">
          <p class="link-to-all"><a href="">Alle partners</a></p>
        </div>
    </div>
</section>
<section class='about'>
<div class="container  intro">
    <div class="row">
        <div class="col-xs-12 offset-lg-2 col-md-5 col-lg-4">
            <img class="logo" src="<?php echo img("roermond.jpg");?>">
        </div>
        <div class="col-xs-12 col-md-7 col-lg-4">
              <H3><span>Over ons</span></h3>
              <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
                  <?php echo $homepageText; ?>
              <?php endif; ?>
            </div>
        </div>
        <div class="row">
          <p class="link-to-all"><a href="<?php echo url("meer-info");?>">Lees meer</a></p>
        </div>
    </div>
</div>
</section>

  </div>

</div>

  <script type="text/javascript">
    jQuery(document).ready(function(){
      jQuery('.responsive').slick({
          //dots: true,
          infinite: false,
          speed: 500,
          slidesToShow: 4,
          slidesToScroll: 4,
          responsive: [{
              breakpoint: 1024,
              settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: true
              }
          }, {
              breakpoint: 600,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
              }
          }, {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
              }
          }]
      });
    });
  </script>
<script>
    jQuery('.carousel').carousel();
    var caption = jQuery('div.carousel-item:nth-child(1) .carousel-caption');
    jQuery('#right .well').html(caption.html());
    caption.css('display','none');
    jQuery(".carousel").on('slide.bs.carousel', function(evt) {
       var caption = jQuery('div.carousel-item:nth-child(' + (jQuery(evt.relatedTarget).index()+1) + ') .carousel-caption');
       jQuery('#right .well').html(caption.html());
       caption.css('display','none');
    });
</script>

<?php echo foot(); ?>
