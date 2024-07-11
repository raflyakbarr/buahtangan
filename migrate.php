<?php

// Display all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Illuminate\Contracts\Console\Kernel;

// Load Composer's autoloader
require __DIR__.'/vendor/autoload.php';

// Load the Laravel application
$app = require_once __DIR__.'/bootstrap/app.php';

// Get the Kernel instance
$kernel = $app->make(Kernel::class);

// Handle the request
$status = $kernel->handle(
    $request = Illuminate\Http\Request::capture(),
    $response = new Illuminate\Http\Response
);

echo "Running migrations...\n";

// Call the migrate command
\Artisan::call('migrate', ["--force" => true]);

echo "Migrations completed.\n";