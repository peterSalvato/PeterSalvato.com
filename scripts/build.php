#!/usr/bin/env php
<?php
declare(strict_types=1);

// Autoload Symfony YAML parser
require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

$root = __DIR__ . '/../src';

// --- 🔍 PROJECTS: Config.yaml → Data.php ---
$projectDirs = glob("$root/Projects/*", GLOB_ONLYDIR);

foreach ($projectDirs as $dir) {
    $yamlFile = "$dir/Config.yaml";
    $phpFile  = "$dir/Data.php";

    if (!file_exists($yamlFile)) continue;

    try {
        $data = Yaml::parseFile($yamlFile);
    } catch (Exception $e) {
        echo "❌ YAML parse error in $yamlFile: " . $e->getMessage() . "\n";
        continue;
    }

    if (!is_array($data)) {
        echo "❌ Invalid structure in $yamlFile (not an array)\n";
        continue;
    }

    file_put_contents($phpFile, "<?php\nreturn " . var_export($data, true) . ";\n");
    echo "✔ Built: $phpFile\n";
}

// --- 📘 JOURNAL: Entry.md frontmatter → Meta.php ---
$journalDirs = glob("$root/Journal/*", GLOB_ONLYDIR);

foreach ($journalDirs as $dir) {
    $mdFile   = "$dir/Entry.md";
    $metaFile = "$dir/Meta.php";

    if (!file_exists($mdFile)) continue;

    $raw = file_get_contents($mdFile);

    if (!preg_match('/^---(.*?)---/s', $raw, $match)) {
        echo "⚠️  No frontmatter found in $mdFile\n";
        continue;
    }

    try {
        $meta = Yaml::parse(trim($match[1]));
    } catch (Exception $e) {
        echo "❌ YAML frontmatter error in $mdFile: " . $e->getMessage() . "\n";
        continue;
    }

    if (!is_array($meta)) {
        echo "❌ Invalid frontmatter in $mdFile (not an array)\n";
        continue;
    }

    file_put_contents($metaFile, "<?php\nreturn " . var_export($meta, true) . ";\n");
    echo "✔ Built: $metaFile\n";
}
