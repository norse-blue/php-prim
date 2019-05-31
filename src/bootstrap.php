<?php

declare(strict_types=1);

namespace NorseBlue\Prim;

use Symfony\Component\Finder\Finder;
use function NorseBlue\Prim\Functions\path_merge;

/**
 * @codeCoverageIgnore
 */
(static function (): void {
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'helpers.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'collections.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'scalars.php';

    $types_root = path_merge(__DIR__, 'Types', DIRECTORY_SEPARATOR, true);
    $extensions_root = path_merge(__DIR__, 'Extensions', DIRECTORY_SEPARATOR, true);
    $paths = array_keys(iterator_to_array(
        Finder::create()
            ->in(path_merge($types_root, '**'))
            ->name('*Object.php')
            ->files()
    ));

    foreach ($paths as $path) {
        [$category, $type] = explode(DIRECTORY_SEPARATOR, str_replace($types_root, '', $path), 2);
        $type = preg_replace('%(.+)Object.php$%', '\1', $type);
        $class = path_merge(Prim::NAMESPACE_ROOT, ['Types', $category, "{$type}Object"], '\\');
        $extensions_path = path_merge($extensions_root, [$category, $type]);

        if (!is_dir($extensions_path)) {
            continue;
        }

        $extensions = array_keys(iterator_to_array(
            Finder::create()
                ->in($extensions_path)
                ->name("$type*.php")
                ->files()
        ));

        foreach ($extensions as $extension) {
            $pattern = path_merge("%^$extensions_root$category", [$type, $type]) . "(.*)Extension\.php$%";
            $extension_name = preg_replace($pattern, '\1', $extension);

            $extension_class = path_merge(Prim::NAMESPACE_ROOT, [
                'Extensions',
                $category,
                $type,
                "{$type}{$extension_name}Extension",
            ], '\\');

            $class::registerExtensionMethod(lcfirst($extension_name), $extension_class);
        }
    }
})();
