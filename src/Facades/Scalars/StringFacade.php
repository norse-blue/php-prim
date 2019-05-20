<?php

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\IntObject;
use NorseBlue\Prim\Scalars\StringObject;
use Ramsey\Uuid\UuidInterface;

/**
 * Class StringFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 *
 * @method static StringObject accord(int|IntObject $count, string|StringObject $many, string|StringObject $one, string|StringObject|null $zero = null)
 * @method static StringObject after(string|StringObject $value, string|StringObject $search)
 * @method static StringObject ascii(string|StringObject $value, string|StringObject $language = 'en')
 * @method static StringObject before(string|StringObject $value, string|StringObject $search)
 * @method static StringObject camel(string|StringObject $value)
 * @method static StringObject compare(string|StringObject $value, string|StringObject $string, bool $case_insensitive = false)
 * @method static StringObject concat(string|StringObject $value, string|StringObject ...$strings)
 * @method static StringObject contains(string|StringObject $value, string|StringObject|array $needles)
 * @method static StringObject endsWith(string|StringObject $value, string|StringObject|array $needles)
 * @method static StringObject equals(string|StringObject $value, string|StringObject $string, bool $case_insensitive = false)
 * @method static array explode(string|StringObject $value, string|StringObject $delimiter, int|IntObject|null $limit = PHP_INT_MAX)
 * @method static StringObject finish(string|StringObject $value, string|StringObject $cap)
 * @method static BoolObject isDomain(string|StringObject $value, bool|BoolObject $is_hostname = false)
 * @method static BoolObject isEmail(string|StringObject $value, bool|BoolObject $email_unicode = false)
 * @method static BoolObject isHostname(string|StringObject $value)
 * @method static BoolObject isIp(string|StringObject $value, int|IntObject $flags = FILTER_FLAG_NONE)
 * @method static BoolObject isMac(string|StringObject $value, string|StringObject $separator = null)
 * @method static BoolObject isUrl(string|StringObject $value, int|IntObject $flags = FILTER_FLAG_NONE)
 * @method static StringObject kebab(string|StringObject $value)
 * @method static StringObject left(string|StringObject $value, int|IntObject $length)
 * @method static IntObject length(string|StringObject $value, string|StringObject $encoding = null)
 * @method static StringObject limit(string|StringObject $value, int $limit = 100, string|StringObject $end = '...')
 * @method static StringObject lowerCaseFirst(string|StringObject $value)
 * @method static StringObject lower(string|StringObject $value)
 * @method static UuidInterface orderedUuid()
 * @method static StringObject pad(string|StringObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0', int|IntObject $pad_side = STR_PAD_BOTH)
 * @method static StringObject padLeft(string|StringObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0')
 * @method static StringObject padRight(string|StringObject $value, int|IntObject $pad_length, string|StringObject $pad_string = '0')
 * @method static StringObject plural(string|StringObject $value)
 * @method static StringObject prefix(string|StringObject $value, string|StringObject $prefix)
 * @method static StringObject random(int $length = 16)
 * @method static array regexMatches(string|StringObject $value, string|StringObject $pattern, int|IntObject $flags = 0)
 * @method static BoolObject regexPatternMatch(string|StringObject $value, string|StringObject|array $patterns)
 * @method static StringObject regexQuote(string|StringObject $value, string|StringObject $delimiter = '#')
 * @method static StringObject regexReplace(string|StringObject $value, string|StringObject|string[]|StringObject[] $pattern, string|StringObject|string[]|StringObject[] $replacement, int|IntObject $limit = -1)
 * @method static StringObject remove(string|StringObject $value, string|StringObject|string[]|StringObject[] $remove)
 * @method static StringObject repeat(string|StringObject $value, int|IntObject $times = 2)
 * @method static StringObject replace(string|StringObject $value, string|StringObject $search, string|StringObject $replace)
 * @method static StringObject replaceArray(string|StringObject $value, string|StringObject $search, string[]|StringObject[] $replace)
 * @method static StringObject replaceFirst(string|StringObject $value, string|StringObject $search, string|StringObject $replace)
 * @method static StringObject replaceLast(string|StringObject $value, string|StringObject $search, string|StringObject $replace)
 * @method static StringObject right(string|StringObject $value, int|IntObject $length)
 * @method static StringObject singular(string|StringObject $value)
 * @method static StringObject slug(string|StringObject $value, string|StringObject $separator = '-', string|StringObject|null $language = 'en')
 * @method static StringObject snake(string|StringObject $value, string|StringObject $delimiter = '_')
 * @method static StringObject start(string|StringObject $value, string|StringObject $prefix)
 * @method static StringObject startsWith(string|StringObject $value, string|StringObject|array $needles)
 * @method static StringObject studly(string|StringObject $value)
 * @method static StringObject substr(string|StringObject $value, int $start, int|null $length = null)
 * @method static StringObject suffix(string|StringObject $value, string|StringObject $suffix)
 * @method static StringObject surround(string|StringObject $value, string|StringObject $prefix, string|StringObject|null $suffix = null)
 * @method static StringObject title(string|StringObject $value)
 * @method static StringObject toggle(string|StringObject $value, string[]|StringObject[] $options, bool|BoolObject $strict = false)
 * @method static StringObject trim(string|StringObject $value, string|StringObject $character_mask = " \t\n\r\0\x0B")
 * @method static StringObject trimLeft(string|StringObject $value, string|StringObject $character_mask = " \t\n\r\0\x0B")
 * @method static StringObject trimRight(string|StringObject $value, string|StringObject $character_mask = " \t\n\r\0\x0B")
 * @method static StringObject upperCaseFirst(string|StringObject $value)
 * @method static StringObject upper(string|StringObject $value)
 * @method static UuidInterface uuid()
 * @method static StringObject words(string|StringObject $value, int $words = 100, string|StringObject $end = '...')
 */
final class StringFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = StringObject::class;

    /** @inheritDoc */
    protected static $statics = [
        'accord',
        'orderedUuid',
        'random',
        'uuid',
    ];
}
