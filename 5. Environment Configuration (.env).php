<?php
// Load .env file
$envPath = __DIR__ . '/.env';
if (!file_exists($envPath)) {
    die("Error: .env file not found");
}

$lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line) {
    // Skip comments
    if (str_starts_with(trim($line), '#')) {
        continue;
    }
    // Split into key and value
    [$key, $value] = explode('=', $line, 2);
    $key = trim($key);
    $value = trim($value);
    // Remove quotes if present
    $value = trim($value, '"');
    $value = trim($value, "'");
    // Set environment variable
    putenv("$key=$value");
    $_ENV[$key] = $value;
}

// Access variables
$dbHost = $_ENV['DB_HOST'] ?? getenv('DB_HOST');
$dbName = $_ENV['DB_NAME'] ?? getenv('DB_NAME');
$appEnv = $_ENV['APP_ENV'] ?? getenv('APP_ENV');

// Example output
echo "DB Host: $dbHost<br>";
echo "DB Name: $dbName<br>";
echo "App Environment: $appEnv";
?>
