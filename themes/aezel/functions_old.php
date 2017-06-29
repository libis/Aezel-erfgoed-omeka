<?php
function public_nav_main_bootstrap()
{
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

function simple_nav()
{
    $page = get_current_record('SimplePagesPage');

    $links = simple_pages_get_links_for_children_pages();
    if (!$links) :
        $links = simple_pages_get_links_for_children_pages($page->parent_id);
    endif;

    $html="<ul class='simple-nav'>";
    foreach ($links as $link) :
        $html .= "<li><a href='".$link['uri']."'>".$link['label']."</a></li>";
    endforeach;
    $html .="</ul>";

    return $html;
}

function get_color()
{
    //colors: page id -> different css (production)
    $colors = array(
      "12" => array("kleur" => "style.min", "logo" => "book_logo")
    );

    return $colors['12'];
}

function libis_get_news($tag = "")
{
    $items = get_records('Item', array('type'=>'Nieuws','sort_field' => 'added', 'sort_dir' => 'd'), 3);
    if (!$items) : ?>
        <p>Er is geen recent nieuws.</p>
    <?php endif; ?>
    <?php foreach ($items as $item) :?>
      <div class="row nieuws-item">
        <?php if (metadata($item, 'has files')) : ?>
          <div class="col-sm-4 col-xs-12 icon-block">
            <div class="element-text"><?php echo files_for_item(array('imageSize' => 'thumbnail'), array(), $item); ?></div>
          </div>
          <div class="col-sm-8 icon-block">
        <?php else:?>
          <div class="col-sm-12 icon-block">
        <?php endif; ?>
          <h5><?php echo metadata($item, array('Dublin Core', 'Date')); ?></h5>
          <h4><?php echo metadata($item, array('Dublin Core', 'Title')); ?></h4>
          <p><?php echo metadata($item, array('Dublin Core', 'Description'), array('snippet'=>250)); ?></p>
          <p class="lees-meer"><?php echo link_to_item('Lees meer', array(), 'show', $item); ?></p>
        </div>
    </div>
    <?php endforeach;
}

function libis_get_featured_exhibits()
{
  $exhibits = get_records('Exhibit', array('sort_field' => 'added', 'sort_dir' => 'd'), 3);

  $i = 0;
  foreach($exhibits as $exhibit):?>
  <?php $file = $exhibit->getFile();?>
    <?php if ($file): ?>
      <div class="carousel-item <?php if($i == 0){ echo "active";} ?>">
        <img class="<?php if($i == 0){ echo "first-slide";} ?>" src="<?php echo $file->getWebPath(); ?>">
        <div class="carousel-caption">
          <H3><span>In de kijker</span></h3>
          <h1><?php echo exhibit_builder_link_to_exhibit($exhibit); ?></h1>
          <p><?php echo snippet_by_word_count(metadata($exhibit, 'description', array('no_escape' => true))); ?></p>
          <p class="caption-auteur">Door: <strong>Tester</strong></p>
        </div>
      </div>
      <?php $i++; ?>
    <?php endif; ?>
  <?php endforeach;
}
