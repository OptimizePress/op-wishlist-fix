<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.optimizepress.com/
 * @since             1.0.0
 * @package           Op_wishlist_Fix
 *
 * @wordpress-plugin
 * Plugin Name:       OptimizePress WishList fix
 * Plugin URI:        http://www.optimizepress.com/
 * Description:       Removes TMCE_InsertButton from WishList in LiveEditor
 * Version:           1.0.0
 * Author:            OptimizePress
 * Author URI:        http://www.optimizepress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       op-wishlist-fix
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function removeWishListAdminScript(){
    $pageBuilder = false;
    if ( isset($_GET['page']) ) {
        $pageBuilder = ($_GET['page'] == 'optimizepress-page-builder' ) ? true : false;
    }

    if ($pageBuilder){
        global $WLMTinyMCEPluginInstanceOnly;
        remove_action('init', array($WLMTinyMCEPluginInstanceOnly->wlmtinymceplugin4, 'TMCE_InsertButton',1));
    }
}

add_action('init', 'removeWishListAdminScript', 1);