    <?php $style = get_color();?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                 <div class="footer-logo"><img class="logo" src="<?php echo img("logos/".$style["logo"].".png");?>"></div>
            </div>
            <div class="row">
                 <div class="offset-md-3 col-md-6">

                        <div class="footer-menu footer-element">
                            <ul>
                                <li><a href="">Copyright</a></li>
                                <li><a href="">Link</a></li>
                                <li><a href="">Link</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <div class="footer-element">
                    <?php echo get_theme_option('Footer Text'); ?>
                    </div>
                </div>

                    <?php //echo public_nav_main(array('role' => 'navigation'))->setUlClass('nav navbar-nav');; ?>

                    <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                        <p><?php echo $copyright; ?></p>
                    <?php endif; ?>

                    <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>



            </div>
        </div>



</body>
</html>
