<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<div class="container">
    <!-- Content -->
    <div class="content-wrapper bs-docs-section ">
        <div class="row">
            <div class="col-md-9 content">
                <?php if (!$is_home_page): ?>
                <p id="simple-pages-breadcrumbs"><?php echo simple_pages_display_breadcrumbs(); ?></p>
                <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
                <?php endif; ?>
                <?php
                    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                    echo $this->shortcodes($text);
                ?>
            </div>
            <div class="col-md-3"><?php echo simple_nav();?></div>
        </div>
    </div>
</div>
<?php echo foot(); ?>
