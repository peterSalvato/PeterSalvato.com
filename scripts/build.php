<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

function write_php_array_file(string $path, array $data) {
    $export = var_export($data, true);
    file_put_contents($path, "<?php\nreturn $export;\n");
}

echo "🔧 Building data files...\n";

// --- Build Projects ---
foreach (glob(__DIR__ . '/../src/Projects/*', GLOB_ONLYDIR) as $dir) {
    $cfg = "$dir/Config.yaml";
    $out = "$dir/Data.php";

    if (!file_exists($cfg)) {
        echo "⚠️  Skipping (no config): $dir\n";
        continue;
    }

    $data = Yaml::parseFile($cfg);
    write_php_array_file($out, $data);
    echo "✅ Built Data.php for " . basename($dir) . "\n";
}

// --- Build Journal Entries ---
foreach (glob(__DIR__ . '/../src/Journal/*', GLOB_ONLYDIR) as $dir) {
    $cfg = "$dir/Config.yaml";
    $out = "$dir/Meta.php";

    if (!file_exists($cfg)) {
        echo "⚠️  Skipping (no config): $dir\n";
        continue;
    }

    $data = Yaml::parseFile($cfg);
    write_php_array_file($out, $data);
    echo "✅ Built Meta.php for " . basename($dir) . "\n";
}

echo "🏁 Done.\n";
