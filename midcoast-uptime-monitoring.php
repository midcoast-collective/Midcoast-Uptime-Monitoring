<?php
/**
* Plugin Name: Midcoast Uptime Monitoring
* Plugin URI: https://midcoast.io/
* Description: This plugin writes a custom meta tag in the site header for use in UptimeMonitor.com
* Version: 1.0.1
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

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/midcoast-collective/Midcoast-Uptime-Monitoring/',
	__FILE__,
	'midcoast-uptime-monitoring'
);

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');