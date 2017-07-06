<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts','style.min'));
    echo head_css();

    echo theme_header_background();
    ?>

    <!-- JavaScripts -->
    <?php
    echo head_js();
    ?>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

    <nav class="navbar navbar-toggleable-md navbar-default ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler pull-xs-right navbar-text hidden-lg-up navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              &#9776;
            </button>
            <a href="http://vagrant/aezel2" class="navbar-brand"><img src="http://vagrant/aezel2/themes/aezel/images//logos/book_logo.png">LGGI  <span>Erfgoed</span></a>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse pull-xs-left navbar-toggleable-md collapse" id="navbarSupportedContent">
                <?php echo public_nav_main_bootstrap(); ?>
            </div>

            <form class="form-inline pull-sm-right navbar-toggleable-md collapse" role="search" action="<?php echo url('solr-search/')?>" method="GET">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Zoek" value="" name="q">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                  </span>
                </div>
            </form>

      </div><!-- /.container-fluid -->
    </nav>
