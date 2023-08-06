<?php
spl_autoload_register(function ($className) {
    // Define the base directory where your classes are located
    $baseDir ='app/';

    // Replace the namespace separator with the directory separator
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    // Check if the class file exists and include it
    $filePath = $baseDir . $className . '.php';
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});