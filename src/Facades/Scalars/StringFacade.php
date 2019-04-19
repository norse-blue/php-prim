<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\Facade;
use NorseBlue\Prim\Scalars\StringObject;

/**
 * Class StringFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 *
 * @method static StringObject after(string|StringObject $value, string|StringObject $search)
 * @method static StringObject ascii(string|StringObject $value, string|StringObject $language = 'en')
 * @method static StringObject before(string|StringObject $value, string|StringObject $search)
 * @method static StringObject camel(string|StringObject $value)
 * @method static StringObject compare(string|StringObject $value, string|StringObject $string, bool $case_insensitive = false)
 * @method static StringObject concat(string|StringObject $value, string|StringObject ...$strings)
 * @method static StringObject contains(string|StringObject $value, string|StringObject|array $needles)
 * @method static StringObject endsWith(string|StringObject $value, string|StringObject|array $needles)
 * @method static StringObject equals(string|StringObject $value, string|StringObject $string, bool $case_insensitive = false)
 * @method static StringObject finish(string|StringObject $value, string|StringObject $cap)
 * @method static StringObject is(string|StringObject $value, string|StringObject|array $patterns)
 * @method static StringObject kebab(string|StringObject $value)
 * @method static StringObject lcfirst(string|StringObject $value)
 * @method static StringObject length(string|StringObject $value, string|StringObject $encoding = null)
 * @method static StringObject limit(string|StringObject $value, int $limit = 100, string|StringObject $end = '...')
 * @method static StringObject lower(string|StringObject $value)
 * @method static StringObject random(int $length = 16)
 * @method static StringObject replaceArray(string|StringObject $value, string|StringObject $search, array<string|StringObject> $replace)
 * @method static StringObject replaceFirst(string|StringObject $value, string|StringObject $search, string|StringObject $replace)
 * @method static StringObject replaceLast(string|StringObject $value, string|StringObject $search, string|StringObject $replace)
 * @method static StringObject slug(string|StringObject $value, string|StringObject $separator = '-', string|StringObject|null $language = 'en')
 * @method static StringObject snake(string|StringObject $value, string|StringObject $delimiter = '_')
 * @method static StringObject start(string|StringObject $value, string|StringObject $prefix)
 * @method static StringObject startsWith(string|StringObject $value, string|StringObject|array $needles)
 * @method static StringObject studly(string|StringObject $value)
 * @method static StringObject substr(string|StringObject $value, int $start, int|null $length = null)
 * @method static StringObject title(string|StringObject $value)
 * @method static StringObject ucfirst(string|StringObject $value)
 * @method static StringObject upper(string|StringObject $value)
 * @method static StringObject words(string|StringObject $value,int $words = 100, string|StringObject $end = '...')
 */
class StringFacade extends Facade
{
    /** @inheritDoc */
    protected static $class = StringObject::class;

    /** @inheritDoc */
    protected static $statics = [
        'random',
    ];
}
