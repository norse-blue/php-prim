<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Functions;

/**
 * Merge the path segments to the base path.
 *
 * @param string $base
 * @param string|array $segments
 * @param string $separator
 * @param bool $trailing_separator
 *
 * @return string
 */
function path_merge(
    string $base,
    $segments,
    string $separator = DIRECTORY_SEPARATOR,
    bool $trailing_separator = false
): string {
    $path = rtrim($base, $separator);

    if (!is_array($segments)) {
        $segments = [$segments];
    }

    foreach ($segments as $segment) {
        $path .= $separator . $segment;
    }

    $path = rtrim($path, $separator);

    return $path . ($trailing_separator ? $separator : '');
}
