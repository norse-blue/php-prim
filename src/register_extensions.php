<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions;

use NorseBlue\Prim\Collections\ArrObject;
use NorseBlue\Prim\Collections\DotArrObject;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\NumericObject;
use NorseBlue\Prim\Scalars\StringObject;
use RuntimeException;

/**
 * @codeCoverageIgnore
 */
(static function (): void {
    $extensible_classes = [
        ArrObject::class,
        DotArrObject::class,
        BoolObject::class,
        FloatObject::class,
        IntObject::class,
        NumericObject::class,
        StringObject::class,
    ];

    foreach ($extensible_classes as $class) {
        $type = preg_replace('%^.*\\\(.+)Object$%', '\1', $class);

        $path = preg_replace('%^NorseBlue/Prim%', 'src', str_replace('\\', '/', $class));
        $path = preg_replace('%(.*)/([a-zA-z0-9_]+)$%', '\1/Extensions', $path);

        $glob = glob("$path/$type/$type*Extension.php");
        if ($glob === false) {
            throw new RuntimeException('An error occurred while trying to get the extension methods.');
        }

        $extensions = array_reduce(
            $glob,
            static function ($carry, $extension) use ($type) {
                $namespace = preg_replace(
                    '%src/(.*)/([a-zA-z0-9_]+).php$%',
                    'NorseBlue/Prim/\1',
                    $extension
                );
                $namespace = str_replace('/', '\\', $namespace);

                $extension = preg_replace('%^.*/(.+)\.php$%', '\1', $extension);
                $item = preg_replace("%^$type(.+)Extension$%", '\1', $extension);

                $carry[lcfirst($item)] = "$namespace\\$extension";
                return $carry;
            },
            []
        );

        foreach ($extensions as $name => $extension) {
            $class::registerExtensionMethod($name, $extension);
        }
    }
})();
