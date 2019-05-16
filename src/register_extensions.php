<?php

namespace NorseBlue\Prim\Extensions;

use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\FloatObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\NumericObject;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * @codeCoverageIgnore
 */
(static function () {
    $extensible_classes = [
        BoolObject::class,
        FloatObject::class,
        IntObject::class,
        NumericObject::class,
        StringObject::class,
    ];

    foreach ($extensible_classes as $class) {
        $type = preg_replace('%^.+\\\(.+)Object$%', '\1', $class);
        $extensions = array_reduce(
            glob("src/Scalars/Extensions/$type/$type*Extension.php"),
            function ($carry, $extension) use ($type) {
                $extension = preg_replace('%^.*/(.+)\.php$%', '\1', $extension);
                $item = preg_replace("%^$type(.+)Extension$%", '\1', $extension);

                $carry[lcfirst($item)] = "NorseBlue\Prim\Scalars\Extensions\\$type\\$extension";
                return $carry;
            },
            []
        );

        foreach ($extensions as $name => $extension) {
            $class::registerExtensionMethod($name, $extension);
        }
    }
})();
