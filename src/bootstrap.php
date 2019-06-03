<?php

declare(strict_types=1);

namespace NorseBlue\Prim;

use Doctrine\Common\Annotations\Annotation\Enum;
use NorseBlue\ExtensibleObjects\Contracts\Extensible;
use NorseBlue\Prim\Types\Collections\ArrObject;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\FloatObject;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\NumericObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use Symfony\Component\Finder\Finder;
use function NorseBlue\Prim\Functions\path_merge;

/**
 * @codeCoverageIgnore
 */
(static function (): void {
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'helpers.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'collections.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . 'Functions' . DIRECTORY_SEPARATOR . 'scalars.php';

    $extensible_classes = [
        ArrObject::class,
        BoolObject::class,
        Enum::class,
        FloatObject::class,
        IntObject::class,
        NumericObject::class,
        StringObject::class,
    ];

    /** @var Extensible $class */
    foreach ($extensible_classes as $class) {
        $pattern = '%^NorseBlue\\\\Prim\\\\Types\\\\(?<category>\w+)\\\\(?<type>\w+?)(?:Object)?$%';
        if (!preg_match($pattern, $class, $data)) {
            continue;
        }

        [$category, $type] = [$data['category'], $data['type']];
        $extensions_path = path_merge(__DIR__, ['Extensions', $category, $type]);
        if (!is_dir($extensions_path)) {
            continue;
        }

        $extensions = array_keys(iterator_to_array(
            Finder::create()
                ->in($extensions_path)
                ->name("{$type}*Extension.php")
                ->files()
        ));

        foreach ($extensions as $path) {
            $pattern = '%^' . path_merge($extensions_path, $type) . '(.+)Extension\.php$%';
            $name = preg_replace($pattern, '\1', $path);
            $extension = path_merge('NorseBlue\Prim', [
                'Extensions',
                $category,
                $type,
                "{$type}{$name}Extension",
            ], '\\');

            $class::registerExtensionMethod(lcfirst($name), $extension);
        }
    }
})();
