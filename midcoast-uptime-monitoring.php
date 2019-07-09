<?php
/**
* Plugin Name: Midcoast Uptime Monitoring
* Plugin URI: https://midcoast.io/
* Description: This plugin writes a custom meta tag in the site header for use in UptimeMonitor.com
* Version: 1.0
* Author: Midcoast Collective
* Author URI: https://midcoast.io/
**/


function hook_uptimemonitor() {
	?>

		<meta name="uptime-monitoring" content="

            _     _                     _     _       
           (_)   | |                   | |   (_)      
  _ __ ___  _  __| | ___ ___   __ _ ___| |_   _  ___  
 | '_ ` _ \| |/ _` |/ __/ _ \ / _` / __| __| | |/ _ \ 
 | | | | | | | (_| | (_| (_) | (_| \__ \ |_ _| | (_) |
 |_| |_| |_|_|\__,_|\___\___/ \__,_|___/\__(_)_|\___/ 
                                                      
                                                      
     Site developed by Midcoast Collective
			 
	  Want a killer custom web presence?
     		  We can hook you up.
				  
		   info (at) midcoast.io
">

<?php
}
add_action('wp_head', 'hook_uptimemonitor');

include_once('updater.php');

if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
	$config = array(
		'slug' => plugin_basename(__FILE__), // this is the slug of your plugin
		'proper_folder_name' => 'midcoast-uptime-monitoring', // this is the name of the folder your plugin lives in
		'api_url' => 'https://api.github.com/repos/midcoast-collective/Midcoast-Uptime-Monitoring', // the GitHub API url of your GitHub repo
		'raw_url' => 'https://raw.github.com/midcoast-collective/Midcoast-Uptime-Monitoring/master', // the GitHub raw url of your GitHub repo
		'github_url' => 'https://github.com/midcoast-collective/Midcoast-Uptime-Monitoring', // the GitHub url of your GitHub repo
		'zip_url' => 'https://github.com/midcoast-collective/Midcoast-Uptime-Monitoring/zipball/master', // the zip url of the GitHub repo
		'sslverify' => true, // whether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
		'requires' => '3.0', // which version of WordPress does your plugin require?
		'tested' => '3.3', // which version of WordPress is your plugin tested up to?
		'readme' => 'README.md', // which file to use as the readme for the version number
		'access_token' => '', // Access private repositories by authorizing under Appearance > GitHub Updates when this example plugin is installed
	);
	new WP_GitHub_Updater($config);
}