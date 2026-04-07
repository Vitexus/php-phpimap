<?php
/**
 * Debian autoloader for php-imap/php-imap (PhpImap namespace).
 *
 * PSR-4 autoloader for PhpImap\ namespace.
 */
spl_autoload_register(function ($class) {
    $prefix = 'PhpImap\\';
    $baseDir = __DIR__ . '/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
