<?php

if (!class_exists("BOW_Framework_Config")) {

    class BOW_Framework_Config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            // This is needed. Bah WordPress bugs.  ;)
            if ( defined('BOW_TEMPLATE_DIR') && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( BOW_TEMPLATE_DIR ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);    
            }
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setHelpTabs();
            $this->setSections();

            if (!isset($this->args['opt_name'])) { 
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections() {



            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'bow'), $this->theme->display('Name'));
            ?>
            

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();


            // DECLARATION OF SECTIONS



                $this->sections[] = array(
                    'icon' => ' el-icon-credit-card',
                    'icon_class' => 'icon-large',
                    'title' => __('Header Options', 'bow'),
                    'fields' => array(
                        
                        array(
                            'id' => 'logo_upload',
                            'type' => 'media',
                            'url' => true,
                            'compiler' => 'true',
                            'title' => __('Logo', 'bow'), 
                            'desc' => __('Upload your logo here (any size).', 'bow'),
                            ),
                            
                    )
                );

                $this->sections[] = array(
                    'icon' => 'el-icon-fullscreen',
                    'icon_class' => 'icon-large',
                    'title' => __('Background Options', 'bow'),
                    'fields' => array(
                        
                        array(
                            'id' => 'body-background',
                            'type' => 'background',
                            'output' => array('body'),
                            'title' => __('Body Background', 'bow'),
                            'subtitle' => __('Body background with image, color, etc.', 'bow'),
                            'default' => ''
                        ), 
                        
                    )
                );


                $this->sections[] = array(
                    'icon' => 'el-icon-photo',
                    'icon_class' => 'icon-large',
                    'title' => __('Footer Options', 'bow'),
                    'fields' => array(

                        array(
                            'id'=>'footer-text',
                            'type' => 'editor',
                            'title' => __('Footer Text', 'bow'), 
                            'subtitle' => __('Add Your Copyright Here', 'bow'),
                            'default' => 'Built by <a href= "http://www.themesawesome.com/">Themes Awesome</a>',
                            ),

                        array(
                            'id'=>'work_slogan',
                            'type' => 'text',
                            'title' => __('Work Footer Slogan', 'bow'), 
                            'subtitle' => __('Add Your Slogan Here', 'bow'),
                            'default' => 'Need Work?',
                            ),

                         array(
                        'id'=>'work_link',
                        'type' => 'text',
                        'title' => __('Work Slogan Link', 'bow'),
                        'validate' => 'url',
                        'default' => '#'
                        ),
                        
                        
                    )
                );


            $this->sections[] = array(
                'icon' => 'el-icon-list-alt',
                'title' => __('Typography Options', 'bow'),
                'fields' => array(



                    array(
                        'id'=>'body-font',
                        'type' => 'typography', 
                        'title' => __('Body Options', 'bow'),
                        'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('body'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> __('Set website body font (leave form empty if you want to use default)', 'bow'),
                        'default'=> array(


                            'font-style' => '400',
                            'font-family' => 'Montserrat',
                            'google' => true,
                            //'line-height' => '40px'),

                        )
                    ),  


                    array(
                        'id'=>'heading-font',
                        'type' => 'typography', 
                        'title' => __('Heading Typography', 'bow'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('h1', 'h2', 'h3','h4','h5','h6'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> __('Set website heading font (leave form empty if you want to use default)', 'bow'),
                        'default'=> array(

                            'font-family' => 'Bebas Neue',
                            'google' => true,


                        )
                    ),


                 array(
                        'id'=>'menu-font',
                        'type' => 'typography', 
                        'title' => __('Menu Typography', 'bow'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('.navigation .themenu li a'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> __('Set website menu font (leave form empty if you want to use default)', 'bow'),
                        'default'=> array(

                            'font-family' => 'Bebas Neue',
                            'google' => true,

                        )
                    ),
                    
                )
            );

        
            $this->sections[] = array(
                'icon' => 'el-icon-twitter',
                'title' => __('Social Profile', 'bow'),
                'fields' => array(

                    array(
                        'id'=>'facebook_profile',
                        'type' => 'text',
                        'title' => __('Facebook Profile', 'bow'),
                        'validate' => 'url',
                        'default' => 'http://facebook.com/#'
                        ),

                    array(
                        'id'=>'twitter_profile',
                        'type' => 'text',
                        'title' => __('twitter Profile', 'bow'),
                        'validate' => 'url',
                        'default' => 'http://twitter.com/#'
                        ),


                    array(
                        'id'=>'google_profile',
                        'type' => 'text',
                        'title' => __('Google+ Profile', 'bow'),
                        'validate' => 'url',
                        'default' => ''
                        ),


                    array(
                        'id'=>'linkedin_profile',
                        'type' => 'text',
                        'title' => __('linkedin Profile', 'bow'),
                        'validate' => 'url',
                        'default' => ''
                        ),


                    array(
                        'id'=>'pinterest_profile',
                        'type' => 'text',
                        'title' => __('Pinterest Profile', 'bow'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'instagram_profile',
                        'type' => 'text',
                        'title' => __('Instagram Profile', 'bow'),
                        'validate' => 'url',
                        'default' => 'http://instagram.com/#'
                        ),

                )
            
            );  
            





            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon' => 'el-icon-book',
                    'title' => __('Documentation', 'bow'),
                    'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'bow'),
                'content' => __('<p>Please go to themesawesome.com to get support</p>', 'bow')
            );
        }


        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'bow_framework', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Options', 'bow'),
                'page' => __('Options', 'bow'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => false, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'       => '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );            
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons. 

            $this->args['share_icons'][] = array(
                'url' => 'http://www.themesawesome.com/',
                'title' => 'Our Site',
                //'icon' => 'el-icon-github'
                'img' => 'http://www.themesawesome.com/img/ta-option.jpg', // You can use icon OR img. IMG needs to be a full URL.
            );

            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/themesawesome',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/themesawesome',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://www.youtube.com/themesawesome',
                'title' => 'Find us on Youtube',
                'icon' => 'el-icon-youtube'
            );



        }

    }

    new BOW_Framework_Config();
}


function bow_footer_copyright() {


    $options = get_option('bow_framework');
    $copyright_footer = $options['footer-text'];
    $work_slogan = $options['work_slogan'];
    $work_link = $options['work_link'];
    echo $copyright_footer;
}
