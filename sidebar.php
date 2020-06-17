<?php 
if(!function_exists('queerthm_sidebar_wrap')) {
    function queerthm_sidebar_wrap() {
        // If BuddyPress plugin is active
        if (class_exists('BuddyPress')) {
            // if the pages are related to BuddyPress plugin
            if(function_exists('is_buddypress') && is_buddypress()) {
                if (is_active_sidebar('buddypress-community-sidebar')) { ?>

<div class="side-column">
    <?php dynamic_sidebar('buddypress-community-sidebar'); ?>
</div> 
<?php }
            } elseif (function_exists('is_bbpress') && is_bbpress()) {
                // if the bbPress plugin is active simultaneously
                if (is_active_sidebar('bbpress-community-sidebar')) { ?>

<div class="side-column">
    <?php dynamic_sidebar('bbpress-community-sidebar'); ?>
</div>
<?php }
            } else { // all other unrelated pages
                if (is_active_sidebar('true-sidebar')) { ?>

<div class="side-column">
    <?php dynamic_sidebar('true-sidebar'); ?>
</div>
<?php }
            }
        }

        elseif (class_exists('bbPress')) { // just bbPress active without BuddyPress plugin
            // if the pages are related to bbPress plugin
            if (is_bbpress()) {
                if (is_active_sidebar('bbpress-community-sidebar')) { ?>

<div class="side-column">
    <?php dynamic_sidebar('bbpress-community-sidebar'); ?>
</div> 
<?php }
            } else { // all other unrelated pages
                if (is_active_sidebar('true-sidebar')) { ?>

<div class="side-column">
    <?php dynamic_sidebar('true-sidebar'); ?>
</div>
<?php }
            }

        } else { // If no BuddyPress or bbPress plugins are active
            if (is_active_sidebar('true-sidebar')) { ?>

<div class="side-column">
    <?php dynamic_sidebar('true-sidebar'); ?>
</div>

<?php }
        }
    }
    queerthm_sidebar_wrap();
}

?>