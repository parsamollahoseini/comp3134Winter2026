<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the path parameter and sanitize it using basename()
// This prevents directory traversal attacks like "../"
$path = isset($_GET['q']) ? basename($_GET['q']) : '.';

// BONUS: Prevent filename access (only allow directories)
// Check if the path contains a dot (indicating a file extension)
if (strpos($path, '.') !== false && $path !== '.') {
    echo "<h2>Error: Only directories are allowed</h2>";
    echo "<p>Filenames are not permitted in this parameter.</p>";
    exit;
}

// Check if the path exists and is actually a directory
if (!file_exists($path) || !is_dir($path)) {
    echo "<h2>Error: Invalid directory specified</h2>";
    echo "<p>The requested directory does not exist or is not accessible.</p>";
    exit;
}

// If all validations pass, it's safe to display directory contents
echo "<h2>Directory Contents:</h2>";
print "<pre>";
print_r(scandir($path));
print "</pre>";
?>
