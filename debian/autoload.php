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

require_once '/usr/share/php/Composer/InstalledVersions.php';

(function (): void {
    $versions = [];
    foreach (\Composer\InstalledVersions::getAllRawData() as $d) {
        $versions = array_merge($versions, $d['versions'] ?? []);
    }
    $name    = 'unknown';
    $version = '0.0.0';
    $versions[$name] = ['pretty_version' => $version, 'version' => $version,
        'reference' => null, 'type' => 'library', 'install_path' => __DIR__,
        'aliases' => [], 'dev_requirement' => false];
    \Composer\InstalledVersions::reload([
        'root' => ['name' => $name, 'pretty_version' => $version, 'version' => $version,
            'reference' => null, 'type' => 'project', 'install_path' => __DIR__,
            'aliases' => [], 'dev' => false],
        'versions' => $versions,
    ]);
})();
