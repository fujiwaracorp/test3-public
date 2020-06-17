<?php 
if(is_404()) { ?>

<div class='queerthm-background'>
    <?php queerthm_theme_background(); ?>
</div>

<?php queerthm_watermark();
             } else { ?>
<footer class="site-footer">
    <?php 
    if(!function_exists('queerthm_footer_wrap')) {
        function queerthm_footer_wrap() {
            echo "<div class='footer-content'>";
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'container_class' => 'footer-menu')
                       );

            echo "<div class='footer-widget-area'>";
            if (is_active_sidebar('footer-sidebar')) :
            dynamic_sidebar('footer-sidebar');
            endif;
            echo "</div>
                </div>";
        }
        queerthm_footer_wrap();
    }
    queerthm_watermark();

    ?>
</footer>
<?php } ?>
</div>
<div class='queerthm-background'>
    <?php queerthm_theme_background(); ?>
</div>
<?php wp_footer(); ?>
</body>

</html>
