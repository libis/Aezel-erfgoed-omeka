<?php
require_once LIBCO_DIR."/models/LibcoService.php";
$formAttributes = array(
    'action' => url('libco/libco/search'),
    'method' => 'GET',
    'class'  => 'europeana-search',
    'class'  => 'llibco-search',
);
?>
<?php $view = get_view();?>
<?php echo $this->form('libco-search-form', $formAttributes); ?>

<div><?php echo flash(); ?></div>

<div id="libco-search-box" class="row">
    <div class='col-xs-12'>
        <div class="input-group">
            <?php echo $this->formText('q', $query, array('title' => __('Search keywords'),'class'=>'form-control','placeholder' => 'Zoek...')); ?>


           <span class="input-group-btn">
             <?php echo $this->formButton('', __('Search'), array('type' => 'submit')); ?>

           </span>
        </div>
    </div>
</div>
<div class="row">
    <div class='col-md-3 col-xs-12'>
        <?php
        $libcoService = new LibcoService();
        $searchSources = $libcoService->getSearchSources();
        ?>

        <p><a target="_blank" href="<?php echo url('handleiding'); ?>"><?php echo __("Hulp nodig?"); ?></a></p>
    <p><?php echo __("Selecteer database"); ?></p>
    <?php
        if(!empty($searchSources) && is_array($searchSources)){
            foreach($searchSources as $source){
                $sourceName = $source->name;

                /* Api returns error 500 if Youtube is a part of the search sources, therefore skip it.*/
                if(strtolower($sourceName) === "youtube")
                    continue;
                echo "";
                echo "<div class='form-check'><label class='form-check-label'>";
                echo $view->formCheckbox('searchsource_'.$sourceName, null, array('class' => 'source', 'checked'=>'checked'));
                echo $sourceName;
                echo "</label></div>";
            }
            echo "<br>";
            echo "<div class='form-check'><label class='form-check-label'>";
            echo "<input type='checkbox' class='cbsourceselecctall' id='sourceselecctall' checked='checked'>";
            echo __('Alle databases');
            echo "</label></div>";
        }
        else{
            echo 'Error in retrieving search sources from Europeana.';
        }
    ?>

    <p><a target="_blank" href="<?php echo url('handleiding'); ?>"><?php echo __("Hulp nodig?"); ?></a></p>

  </form>
  </div>

<script>
    $(document).ready(function() {
        $('#sourceselecctall').click(function(event) {  //on click
            if(this.checked) { // check select status
                $('.source').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "cbrecord"
                });
            }else{
                $('.source').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "cbrecord"
                });
            }
        });

        $('.source').click(function() {
            console.log('clicked for uncheck');
            $(".cbsourceselecctall").prop("checked", false);
        });
    });
</script>
