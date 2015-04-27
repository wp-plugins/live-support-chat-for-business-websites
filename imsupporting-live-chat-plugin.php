<?php
/*
Plugin Name: Web Chat
Plugin URI: http://www.IMsupporting.com
Description: Web Chat / Plugin for your blog. Chat to your users and chat to your visitors. Increase sales today with our 100% free trial.
Version: 1.0.0.20
Author: IMsupporting
Author URI: http://www.IMsupporting.com
License: GPL
*/


// 2015 IMsupporting - Web chat plugin for websites.
// Powered by IMsurfing technologies

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'imsupporting_install');

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'imsupporting_remove' );

function imsupporting_install() {
/* Creates new database field */
// Siteid of the user
add_option("ims_siteid", '000000000', '', 'yes');
// Username of the user
add_option("ims_username", 'unknownuser', '', 'yes');
// Md5Pass of the user
add_option("ims_password", 'somerandompasswordthatwouldmakeitfailtologin', '', 'yes');


// Image number they want to use xxon.png etc..
add_option("ims_imageid", '125', '', 'yes'); // 109 by default
// Pixels from the left that the image iwll appear. ( used whne on bottom position )
add_option("ims_leftcss", '0', '', 'yes');
// Pixels from the top when used on right or left hand side.
add_option("ims_topcss", '250', '', 'yes');
// Where will the image be? Left, Right or Bottom
add_option("ims_position", 'right', '', 'yes');
// Is the user using their own uploaded image to the IMS syststem? if so, use imageid of their siteid .. imageid=siteid
add_option("ims_uploaded", 'no', '', 'yes');
//
add_option("ims_fixed", 'yes', '', 'yes'); // CSS fixed..

// Proactive Popups.
add_option("ims_popup", 'no', '', 'yes'); // Show a timed popup?
add_option("ims_popuptime", '10', '', 'yes'); // Time in seconds. ( We add the 000's later )
add_option("ims_popupimage", 'http://status.imsupporting.com/remotepopups/background0.png', '', 'yes'); // The background for the DIV
add_option("ims_popupbutton", '34', '', 'yes'); // Button image
add_option("ims_popupheight", '244', '', 'yes');
add_option("ims_popupwidth", '344', '', 'yes');
add_option("ims_popuptop", '200', '', 'yes');
add_option("ims_popupleft", '300', '', 'yes');

}

function imsupporting_remove() {
/* Deletes the database field */
delete_option('ims_siteid');
delete_option('ims_imageid');
delete_option('ims_leftcss');
delete_option('ims_topcss');
delete_option('ims_position');
delete_option('ims_uploaded');
delete_option('ims_fixed');
delete_option('ims_username');
delete_option('ims_password');

delete_option('ims_popup');
delete_option('ims_popuptime');
delete_option('ims_popupimage');
delete_option('ims_popupbutton');
delete_option('ims_popupheight');
delete_option('ims_popupwidth');
delete_option('ims_popuptop');
delete_option('ims_popupleft');

}



// Add settings link on plugin page ( Imsupportinghelp is referenced in the admin page )
function your_plugin_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=imsupportinghelp">Settings & help Dashboard</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );




// IMsupporting live help software main display file.
// Powered by IMsurfing networks - IMsurfing.co.uk 2013

// What gets displayed to the clients visitors.
include('imsupporting-screen-display.php');
// Admin page
include('imsupporting-admin.php');
?>