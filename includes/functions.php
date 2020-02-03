<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_filter('breadcrumb_link_text', 'breadcrumb_link_text_20200203');

function breadcrumb_link_text_20200203($title){

    if(is_singular('post')):
        $title .= ' - Hello';
    endif;

    return $title;

}


add_filter('breadcrumb_link_url', 'breadcrumb_link_url_20200203');

function breadcrumb_link_url_20200203($link){

    if(is_singular('post')):
        $link .= '#some_id';
    endif;

    return $link;

}

add_filter('breadcrumb_theme_args', 'breadcrumb_theme_args_20200203');

function breadcrumb_theme_args_20200203($themes){

    // Enabled
    $themes['theme_custom']= array('name'=>'Theme Custom','thumb'=> breadcrumbAddon_plugin_url.'assets/admin/images/theme-custom.png');

    //Disabled
    $themes['theme_custom2']= array('name'=>'Theme Custom2','thumb'=> breadcrumbAddon_plugin_url.'assets/admin/images/theme-custom.png', 'disabled'=>true, 'pro_msg'=>'Only in pro');


    return $themes;

}



add_filter('breadcrumb_themes_css', 'breadcrumb_themes_css_20200203');

function breadcrumb_themes_css_20200203($breadcrumb_themes_css){

    $breadcrumb_bg_color = get_option('breadcrumb_bg_color','#278df4');

    ob_start();
    ?>
    <style type="text/css">
        .breadcrumb-container.theme99 li {
            margin: 0;
            padding: 0;
        }
        .breadcrumb-container.theme99 a {
            background: <?php echo $breadcrumb_bg_color; ?>;
            display: inline-block;
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
        }
    </style>
    <?php

    $breadcrumb_themes_css['theme99'] = ob_get_clean();

    return $breadcrumb_themes_css;

}



add_filter('breadcrumb_settings_tabs', 'breadcrumb_settings_tabs_20200203');

function breadcrumb_settings_tabs_20200203($settings_tabs){

    $current_tab = isset($_POST['tab']) ? $_POST['tab'] : 'options';


    $settings_tabs[] = array(
        'id' => 'custom_tab',
        'title' => sprintf(__('%s Custom','breadcrumb'),'<i class="fas fa-star-of-life"></i>'),
        'priority' => 99,
        'active' => ($current_tab == 'custom_tab') ? true : false,
    );

    return $settings_tabs;

}


add_action('breadcrumb_settings_tabs_content_custom_tab','breadcrumb_settings_tabs_content_custom_tab');

function breadcrumb_settings_tabs_content_custom_tab(){

    $settings_tabs_field = new settings_tabs_field();

    $custom_option = get_option('custom_option');

    ?>
    <div class="section">
        <div class="section-title"><?php echo __('Custom tab settings','breadcrumb'); ?></div>
        <p class="description section-description"><?php echo __('This is custom tab descriptions.','breadcrumb'); ?></p>

        <?php

        $args = array(
            'id'		=> 'custom_option',
            //'parent' => 'breadcrumb_options',
            'title'		=> __('Breadcrumb custom option','breadcrumb'),
            'details'	=> __('Custom option descriptions','breadcrumb'),
            'type'		=> 'text',
            'value'		=> $custom_option,
            'default'		=> '',
        );

        $settings_tabs_field->generate_field($args);


        ?>

    </div>
    <?php


}



add_action('breadcrumb_settings_save', 'breadcrumb_settings_save_20200203');

if(!function_exists('breadcrumb_settings_save_20200203')) {
    function breadcrumb_settings_save(){


        $custom_option = sanitize_text_field($_POST['custom_option']);
        update_option('custom_option', $custom_option);

    }
}