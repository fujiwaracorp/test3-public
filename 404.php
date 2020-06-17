<?php get_header(); ?>
<div id="queerthm-content" class="queerthm-content-404" tabindex="-1">
    <?php
    if(!function_exists('queerthm_error_wrap')) {
        function queerthm_error_wrap() {
            $fourOfour = esc_html__("404", "queer");
            $h2 = esc_html__("Page that you've been looking for, has not been found...", "queer");
            $apology = esc_html__("We apologize for that.", "queer");
            $home_url = esc_url(home_url( '/' ));
            $search_intro = esc_html__("Use the search below to find specified content:", "queer");
            $alternative_start = esc_html__("Alternatively, click", "queer");
            $here = esc_html__("here", "queer");
            $alternative_end = esc_html__("to return on the homepage.", "queer");

            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            }
            echo "<h2> <span>{$fourOfour}</span> - {$h2}</h2>
                            <p class='apology'>{$apology}</p>
                            <p>{$search_intro}</p>";
            get_search_form();
            echo "<p class='return-home'>{$alternative_start} <a href='{$home_url}'><b>{$here}</b></a>  {$alternative_end}</p>";
        }
        queerthm_error_wrap();
    }
    ?>
</div>
<?php get_footer(); ?>