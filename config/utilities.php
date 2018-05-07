<?php

/**
 *
 * Ugly way to debug locally, output in our log file (check vhost/apache config)
 *
 * @access public
 * @return void
 */
function dump_post() {
	// Ugly way to debug locally
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	error_log(var_export($_POST, true));
}

?>