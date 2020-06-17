<?php
$queerthm_home_url = esc_url(home_url( '/' ));
$queerthm_search_label = esc_html__("Search:", "queer");
$queerthm_search_title = esc_attr__("Search content", "queer");
$queerthm_search_placeholder = esc_attr__("Type your search here", "queer");
$queerthm_search_button = esc_attr__("Search", "queer");

echo "<form role='search' method='get' id='searchform' class='search' action='{$queerthm_home_url}'>
    <label class='screen-reader-text' for='s'>{$queerthm_search_label}</label>
    <input title='{$queerthm_search_title}' type='text' value='' name='s' id='search-field' placeholder='{$queerthm_search_placeholder}' />
    <input type='submit' id='search-submit' value='{$queerthm_search_button}' />
</form>";
