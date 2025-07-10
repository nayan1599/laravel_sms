<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
// Check if the application is running in a console environment...
if (php_sapi_name() === 'cli') {
    // If so, we can exit early as this script is not meant to be run in
    // a web server context.
    exit('This script is intended to be run in a web server context.');
}   
// Check if the application is running in a web server context...
if (!isset($_SERVER['HTTP_HOST'])) {
    // If not, we can exit early as this script is not meant to be run in
    // a console context.
    exit('This script is intended to be run in a web server context.');
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
// Send the response back to the browser...
$response = $app->handle(Request::capture());
$response->send();
// Terminate the application...
$app->terminate($response, $response->getStatusCode());
// Exit the script...
exit($response->getStatusCode());
// Note: The above code assumes that the Laravel application is set up correctly
// and that the necessary directories and files exist.
