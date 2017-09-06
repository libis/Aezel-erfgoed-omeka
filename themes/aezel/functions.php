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
    $parent = false;

    $links = simple_pages_get_links_for_children_pages();
    if (!$links  && $page->parent_id != "0") :
        $links = simple_pages_get_links_for_children_pages($page->parent_id);
    endif;

    $html="";
    foreach ($links as $link) :
        $html .= "<li><a href='".$link['uri']."'>".$link['label']."</a></li>";
    endforeach;

    $pageAncestors = get_db()->getTable('SimplePagesPage')->findAncestorPages($page->id);
    foreach ($pageAncestors as $p) :
        if ($p->id == '54') :
            $parent = true;
        endif;
    endforeach;

    if($parent || ($page->title == "Ga zelf aan de slag")):
        $html .= "<li><a href='".url("/libco/libco/search")."'>Zoek online</a></li>";
        $html .= "<li><a href='".url("/contribution")."'>Voeg item toe</a></li>";
    endif;

    if($html):
      $html="<ul class='simple-nav'>".$html."</ul>";
    endif;

    return $html;
}

function get_color()
{
    //colors: page id -> different css (production)
    $colors = array(
      "7" => array("kleur" => "groen", "logo" => "Tree_logo"),
      "8" => array("kleur" => "style.min", "logo" => "book_logo"),//default
      "9" => array("kleur" => "blauw", "logo" => "earth_logo"),
      "10" => array("kleur" => "oranje", "logo" => "clock_logo"),
      "12" => array("kleur" => "bruin", "logo" => "donkey_logo")
    );

    if (strpos(current_url(), '/users/') !== false ||
        strpos(current_url(), '/guest-user/') !== false
      ) {
      return $colors['12'];
    }

    //get current page
    $current_page = get_current_record('simple_pages_page', false);
    $current_item = get_current_record('item', false);

    if (!$current_page) :
        $type="";
        if(isset($_GET['facet'])):
          $type = $_GET['facet'];
        endif;

        if($current_item):
            $type = metadata('item', 'Item Type Name');
        endif;

        switch ($type) {
            case 'Stamboom':
            case 'itemtype:"Stamboom"':
                return $colors['7'];
                break;
            case 'Kaart':
            case 'itemtype:"Kaart"':
                return $colors['9'];
                break;
            case 'Kaart Historie':
            case 'itemtype:"Kaart+historie"':
                return $colors['10'];
                break;
            default:
                return $colors['8'];
        }

        return $colors['8'];
    endif;

    if (array_key_exists($current_page->id, $colors)) :
        return $colors[$current_page->id];
    endif;

    //determine ancestor
    $pageAncestors = get_db()->getTable('SimplePagesPage')->findAncestorPages($current_page->id);
    foreach ($pageAncestors as $page) :
        if (array_key_exists($page->id, $colors)) :
            return $colors[$page->id];
        endif;
    endforeach;

    return $colors['8'];
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

function libis_get_partners()
{
    $items = get_records('Item', array('type'=>'Partner','sort_field' => 'added', 'sort_dir' => 'd'), 12);
    if (!$items) : ?>
        <p>Er zijn nog geen partners opgeladen.</p>
    <?php endif; ?>
    <?php foreach ($items as $item) :?>
      <div class="col-sm-3 icon-block">
          <div class="well">
              <?php if (metadata($item, 'has files')) : ?>
                  <?php echo item_image('thumbnail',array('class'=>'logo'),0,$item);?>
              <?php endif; ?>
              <?php if($partnerlink = metadata($item, array('Item Type Metadata','page'))):?>
                    <h3><a href="<?php echo url($partnerlink);?>"><?php echo metadata($item, array('Dublin Core', 'Title')); ?></a></h3>
              <?php endif; ?>
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
          <?php if($exhibit->credits):?>
            <p class="caption-auteur">Door: <strong><?php echo $exhibit->credits;?></strong></p>
          <?php endif;?>
        </div>
      </div>
      <?php $i++; ?>
    <?php endif; ?>
  <?php endforeach;
}

function libis_get_simple_page_content($title){
    $page = get_record('SimplePagesPage',array('title'=>$title));
    return $page->text;
}
