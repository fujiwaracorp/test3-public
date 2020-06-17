<?php
if(!function_exists('queerthm_theme_functions')) {
    function queerthm_theme_functions() {
        //	Inserting style and script documents
        function queerthm_site_resources() {
            wp_enqueue_style( 'queerthm-style', get_template_directory_uri() . '/style.css', array());
            wp_enqueue_script('queerthm-footer', get_template_directory_uri() . '/js/footer.js', array('jquery'), '1.0', true );
            if (is_singular()) {
                wp_enqueue_script("comment-reply");
            }
        }
        add_action('wp_enqueue_scripts', 'queerthm_site_resources');

        // Theme setup
        function queerthm_site_setup() {
            // Navigation Menus
            register_nav_menus(array(
                'header' => esc_html__('Header Menu', 'queer'),
                'footer' => esc_html__('Footer Menu', 'queer')
            ));

            // Add arrows to menu parent
            function queerthm_add_menu_parent_class( $items ) {

                $parents = array();
                foreach ( $items as $item ) {
                    if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
                        $parents[] = $item->menu_item_parent;
                    }
                }

                foreach ( $items as $item ) {
                    if ( in_array( $item->ID, $parents ) ) {
                        $item->classes[] = 'has-children';
                    }
                }

                return $items;
            }
            add_filter( 'wp_nav_menu_objects', 'queerthm_add_menu_parent_class' );

            // Add featured image support
            add_theme_support('post-thumbnails'); //enable post featured image option
            add_image_size('queerthm-front-page', 300, 150, true);
            add_image_size('queerthm-archive-image', 600, 300, true);
            add_image_size('queerthm-post-image', 900, 600, array('left', 'top'));

            //Internationalization of the theme files
            load_theme_textdomain( 'queer', get_template_directory() . '/lang' );

            // Adding title tag
            add_theme_support( 'title-tag' );

            // Adding custom logo
            add_theme_support( 'custom-logo', array(
                'height'      => 150,
                'width'       => 150,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => '',
            ) );

            // Adding RSS feed link
            add_theme_support( 'automatic-feed-links' );

            // Setting the default content width
            if ( ! isset( $content_width ) ) {
                $content_width = 960;
            }

            // Adding custom color pallete for blocks
            add_theme_support( 'editor-color-palette', array(
                array(
                    'name' => esc_html__( 'Dark', 'queer' ),
                    'slug' => 'queer-dark',
                    'color' => '#050303',
                ),
                array(
                    'name' => esc_html__( 'Ice', 'queer' ),
                    'slug' => 'queer-ice',
                    'color' => '#efedf5',
                ),
                array(
                    'name' => esc_html__( 'Yellow', 'queer' ),
                    'slug' => 'queer-yellow',
                    'color' => '#ffed00',
                ),
                array(
                    'name' => esc_html__( 'Orange', 'queer' ),
                    'slug' => 'queer-orange',
                    'color' => '#ff8c00',
                )     
            ) );

            // Add woocommerce support
            if ( class_exists( 'WooCommerce' ) ) {
                add_theme_support( 'woocommerce' );
            }

        }
        add_action('after_setup_theme', 'queerthm_site_setup');

        // Add Widget Areas
        function queerthm_widgets_init() {

            register_sidebar( array(
                'name'          => esc_html__( 'Footer', 'queer' ),
                'id'            => 'footer-sidebar',
                'description'   => esc_html__( 'Widget area added in the footer section.', 'queer' ),
                'before_widget' => '<div class="widget footer-widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ) );

            register_sidebar( array(
                'name'          => esc_html__( 'Sidebar', 'queer' ),
                'id'            => 'true-sidebar',
                'description'   => esc_html__( 'Widget area added in the sidebar section.', 'queer' ),
                'before_widget' => '<aside class="widget true-widget">',
                'after_widget'  => '</aside>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ) );
            // Only registered if BuddyPress plugin is active
            if (class_exists( 'BuddyPress' )) {
                register_sidebar( array(
                    'name'          => esc_html__( 'BuddyPress Community Sidebar', 'queer' ),
                    'id'            => 'buddypress-community-sidebar',
                    'description'   => esc_html__( 'Widget area added in the sidebar section of community pages related to BuddyPress plugin.', 'queer' ),
                    'before_widget' => '<aside class="widget buddypress-community-widget">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                ) );
            }
            // Only registered if bbPress plugin is active
            if (class_exists( 'bbPress' )) {
                register_sidebar( array(
                    'name'          => esc_html__( 'bbPress Community Sidebar', 'queer' ),
                    'id'            => 'bbpress-community-sidebar',
                    'description'   => esc_html__( 'Widget area added in the sidebar section of community pages related to bbPress plugin.', 'queer' ),
                    'before_widget' => '<aside class="widget bbpress-community-widget">',
                    'after_widget'  => '</aside>',
                    'before_title'  => '<h2 class="widget-title">',
                    'after_title'   => '</h2>',
                ) );
            }

        }
        add_action( 'widgets_init', 'queerthm_widgets_init' );

        // Customizer theme options
        function queerthm_customize_register( $wp_customize ) {
            $wp_customize->add_setting( 'queerthm_theme_personalization', array(
                'type' => 'theme_mod', // or 'option'
                'capability' => 'edit_theme_options', // Administrator only
                'theme_supports' => '',
                'default' => 'gay', // gay flag
                'transport' => 'refresh', // or postMessage (if js is used for preview)
                'sanitize_callback' => 'queerthm_sanitize_select'
            ));

            $wp_customize->add_section('queerthm_theme_section', array(
                'title' => esc_html__( 'Queer - Personalization', 'queer' ),
                'description' => '',
            ));

            $wp_customize->add_control( 'queerthm_theme_ctrl', array(
                'type' => 'radio',
                'priority' => 10, // Within the section.
                'settings' => 'queerthm_theme_personalization',
                'section' => 'queerthm_theme_section', // Required, core or custom.
                'label' => esc_html__( 'Enable theme personalization', 'queer' ),
                'description' => esc_html__( 'Check the appropriate box that represents your gender identity. By selecting the option, the color palette and background of your website will be modified (in accordance with the selected genders identity flag).', 'queer' ),
                'choices' => array(
                    'gay' => esc_html__('Gay (default)', 'queer'),
                    'lesbian' => esc_html__('Lesbian', 'queer'),
                    'bisexual' => esc_html__('Bisexual', 'queer' ),
                    'transgender' => esc_html__('Transgender', 'queer'),
                    'intersex' => esc_html__('Intersex', 'queer'),
                    'genderqueer' => esc_html__('Genderqueer', 'queer'),
                    'nonbinary' => esc_html__('Non-binary', 'queer'),
                    'agender' => esc_html__('Agender', 'queer'),
                    'asexual' => esc_html__('Asexual', 'queer'),
                    'genderfluid' => esc_html__('Genderfluid', 'queer'),
                    'pansexual' => esc_html__('Pansexual', 'queer'),
                )
            ));

            function queerthm_sanitize_select( $input, $setting ) {

                // Ensure input is a slug.
                $input = sanitize_key( $input );

                // Get list of choices from the control associated with the setting.
                $choices = $setting->manager->get_control('queerthm_theme_ctrl')->choices;

                // If the input is a valid key, return it; otherwise, return the default.
                return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
            }

        }
        add_action( 'customize_register', 'queerthm_customize_register' );

        // Enable customizer Edit button on hover for widgets
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Add custom post classes alongside the default ones
        function queerthm_add_post_classes($mainClass, $hasThumbClass) {
            if (has_post_thumbnail()) { 
                $classes = array(
                    $mainClass,
                    $hasThumbClass
                );
            } else {
                $classes = array(
                    $mainClass
                );
            }
            post_class($classes);
        }

        //Display categories with separator
        function queerthm_separate_categories() {
            if(has_category()) {
                esc_html_e('Categorized as: ', 'queer');
                the_category( ' / ' );
            } else {
                esc_html_e('Uncategorized', 'queer'); 
            }
        }

        //Display tags with separator
        function queerthm_separate_tags() {
            if(has_tag()) {
                esc_html_e('Tags: ', 'queer');
                the_tags('', ' / ' );
            } else {
                esc_html_e('Untagged', 'queer');
            }
        }

        // Pagination for manually paginated posts 
        $queerthm_defaults = array(
            'before'           => '<p>' . esc_html__( 'Pages:', 'queer' ),
            'after'            => '</p>',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'separator'        => ' ',
            'nextpagelink'     => esc_html__( 'Next page', 'queer'),
            'previouspagelink' => esc_html__( 'Previous page', 'queer' ),
            'pagelink'         => '%',
            'echo'             => 1
        );
        wp_link_pages( $queerthm_defaults );

        // Exclude all pages from WordPress Search
        if (!is_admin()) {
            function queerthm_search_filter($query) {
                if ($query->is_search) {
                    $query->set('post_type', 'post');
                }
                return $query;
            }
            add_filter('pre_get_posts','queerthm_search_filter');
        }

        // Footer watermark
        function queerthm_watermark() {
            $designed = esc_html__("Built with", "queer");
            $love = esc_url(get_template_directory_uri() . '/img/rainbow-heart.png');
            $by = esc_html__("by", "queer");
            $link = esc_url("https://imoptimal.com/");
            $imoptimal = esc_html__("Imoptimal", "queer");
            echo "<div class='branding'>{$designed} <img src='{$love}'/> {$by} <a href='{$link}' target='_blank'>{$imoptimal}</a><div>";
        }

        // Sane defaults 
        function queerthm_get_option_defaults() {
            $default = 'gay';
            return apply_filters('queerthm_get_option_defaults', $default);
        }

        function queerthm_theme_background() {
            $gender = get_theme_mod('queerthm_theme_personalization', queerthm_get_option_defaults());
                $uri = esc_url(get_template_directory_uri() . '/img/'. sanitize_file_name($gender .'.png')); 
                echo "<img src='{$uri}'/>";
        }
    }
    queerthm_theme_functions();
}