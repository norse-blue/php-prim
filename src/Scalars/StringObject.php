<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars;

use ArrayAccess;
use Countable;
use NorseBlue\Prim\ImmutableValueObject;
use NorseBlue\Prim\Traits\Scalars\StringArrayAccess;
use NorseBlue\Prim\Traits\Scalars\StringCountable;
use Ramsey\Uuid\Codec\TimestampFirstCombCodec;
use Ramsey\Uuid\Generator\CombGenerator;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidInterface;
use function NorseBlue\Prim\string;

/**
 * Class StringObject
 *
 * @package NorseBlue\Prim\Scalars
 *
 * @property string $value
 *
 * @method self after(string|self $search) @see StringAfterExtension
 * @method self ascii(string|self $language = 'en') @see StringAsciiExtension
 * @method self before(string|self $search) @see StringBeforeExtension
 * @method self camel() @see StringCamelExtension
 * @method IntObject compare(string|self $string, bool $case_insensitive = false) @see StringCompareExtension
 * @method self concat(string|self ...$strings) @see StringConcatExtension
 * @method BoolObject contains(string|self|array $needles) @see StringContainsExtension
 * @method BoolObject endsWith(string|self|array $needles) @see StringEndsWithExtension
 * @method BoolObject equals(string|self $string, bool $case_insensitive = false) @see StringEqualsExtension
 * @method array explode(string|StringObject $delimiter, int|IntObject|null $limit = PHP_INT_MAX) @see StringExplodeExtension
 * @method self finish(string|self $cap) @see StringFinishExtension
 * @method BoolObject isDomain(bool|BoolObject $is_hostname = false) @see StringIsDomainExtension
 * @method BoolObject isEmail(bool|BoolObject $email_unicode = false) @see StringIsEmailExtension
 * @method BoolObject isHostname() @see StringIsHostnameExtension
 * @method BoolObject isIp(int|IntObject $flags = FILTER_FLAG_NONE) @see StringIsIpExtension
 * @method BoolObject isMac(string|StringObject $separator = null) @see StringIsMacExtension
 * @method BoolObject isUrl(int|IntObject $flags = FILTER_FLAG_NONE) @see StringIsUrlExtension
 * @method self kebab() @see StringKebabExtension
 * @method self left(int|IntObject $length) @see StringLeftExtension
 * @method IntObject length(string|self $encoding = null) @see StringLengthExtension
 * @method self limit(int $limit = 100, string|self $end = '...') @see StringLimitExtension
 * @method self lowerCaseFirst() @see StringLowerCaseFirstExtension
 * @method self lower() @see StringLowerExtension
 * @method self pad(int|IntObject $pad_length, string|StringObject $pad_string = '0', int|IntObject $pad_side = STR_PAD_BOTH) @see StringPadExtension
 * @method self padLeft(int|IntObject $pad_length, string|StringObject $pad_string = '0') @see StringPadLeftExtension
 * @method self padRight(int|IntObject $pad_length, string|StringObject $pad_string = '0') @see StringPadRightExtension
 * @method self plural() @see StringPluralExtension
 * @method self prefix(string|StringObject $prefix) @see StringPrefixExtension
 * @method array regexMatches(string|self $pattern, int|IntObject $flags = 0) @see StringRegexMatchesExtension
 * @method BoolObject regexPatternMatch(string|self|array $patterns) @see StringRegexPatternMatchExtension
 * @method self regexQuote(string|self $delimiter = '#') @see StringRegexQuoteExtension
 * @method self regexReplace(string|StringObject|array<string|StringObject> $pattern, string|StringObject|array<string|StringObject> $replacement, int|IntObject $limit = -1) @see StringRegexReplaceExtension
 * @method self remove(string|StringObject|array<string|StringObject> $remove) @see StringRemoveExtension
 * @method self repeat(int|IntObject $times = 2) @see StringRepeatExtension
 * @method self replace(string|StringObject $search, string|StringObject $replace) @see StringReplaceExtension
 * @method self replaceArray(string|self $search, array<string|self> $replace) @see StringReplaceArrayExtension
 * @method self replaceFirst(string|self $search, string|self $replace) @see StringReplaceFirstExtension
 * @method self replaceLast(string|self $search, string|self $replace) @see StringReplaceLastExtension
 * @method self right(int|IntObject $length) @see StringLeftExtension
 * @method self singular() @see StringSingularExtension
 * @method self slug(string|self $separator = '-', string|self|null $language = 'en') @see StringSlugExtension
 * @method self snake(string|self $delimiter = '_') @see StringSnakeExtension
 * @method self start(string|self $prefix) @see StringStartExtension
 * @method BoolObject startsWith(string|self|array $needles) @see StringStartsWithExtension
 * @method self studly() @see StringStudlyExtension
 * @method self substr(int $start, int|null $length = null) @see StringSubstrExtension
 * @method self suffix(string|StringObject $suffix) @see StringSuffixExtension
 * @method self surround(string|StringObject $prefix, string|StringObject|null $suffix = null) @see StringSurroundExtension
 * @method self title() @see StringTitleExtension
 * @method self toggle(array<string|StringObject> $options, bool|BoolObject $strict = false) @see StringToggleExtension
 * @method self trim(string|StringObject $character_mask = " \t\n\r\0\x0B") @see StringTrimExtension
 * @method self trimLeft(string|StringObject $character_mask = " \t\n\r\0\x0B") @see StringTrimLeftExtension
 * @method self trimRight(string|StringObject $character_mask = " \t\n\r\0\x0B") @see StringTrimRightExtension
 * @method self upperCaseFirst() @see StringUpperCaseFirstExtension
 * @method self upper() @see StringUpperExtension
 * @method self words(int $words = 100, string|self $end = '...') @see StringWordsExtension
 */
class StringObject extends ImmutableValueObject implements ArrayAccess, Countable
{
    use StringArrayAccess;
    use StringCountable;

    /** @inheritDoc */
    protected static $extensions = [];

    /** @inheritDoc */
    protected static $guarded_extensions = [
        'after',
        'ascii',
        'before',
        'camel',
        'compare',
        'concat',
        'contains',
        'endsWith',
        'equals',
        'explode',
        'finish',
        'isDomain',
        'isEmail',
        'isHostname',
        'isIp',
        'isMac',
        'isUrl',
        'kebab',
        'left',
        'length',
        'limit',
        'lowerCaseFirst',
        'lower',
        'pad',
        'padLeft',
        'padRight',
        'plural',
        'prefix',
        'regexMatches',
        'regexPatternMatch',
        'regexQuote',
        'regexReplace',
        'remove',
        'repeat',
        'replace',
        'replaceArray',
        'replaceFirst',
        'replaceLast',
        'right',
        'singular',
        'slug',
        'snake',
        'start',
        'startsWith',
        'studly',
        'substr',
        'suffix',
        'surround',
        'title',
        'toggle',
        'trim',
        'trimLeft',
        'trimRight',
        'upperCaseFirst',
        'upper',
        'words',
    ];

    // region === Overrides ===

    /**
     * StringObject constructor.
     *
     * @param string|StringObject $value
     */
    public function __construct($value = '')
    {
        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_string($value);
    }

    // endregion Overrides

    /**
     * Create a string from a number.
     * You can provide a %d placeholder to insert the actual count into the final string.
     *
     * @param int|IntObject $count
     * @param string|StringObject $many
     * @param string|StringObject $one
     * @param string|StringObject|null $zero
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public static function accord($count, $many, $one, $zero = null): StringObject
    {
        $count = IntObject::unwrap($count);
        $zero = self::unwrap($zero);

        if ($count === 1) {
            $output = $one;
        } else {
            if ($count === 0 and $zero !== '') {
                $output = $zero;
            } else {
                $output = $many;
            }
        }

        return string(sprintf($output, $count));
    }

    /**
     * Generate a time-ordered UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     *
     * @throws \Exception
     */
    public static function orderedUuid(): UuidInterface
    {
        $factory = new UuidFactory();

        $factory->setRandomGenerator(new CombGenerator(
            $factory->getRandomGenerator(),
            $factory->getNumberConverter()
        ));

        $factory->setCodec(new TimestampFirstCombCodec(
            $factory->getUuidBuilder()
        ));

        return $factory->uuid4();
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param int|IntObject $length
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     *
     * @throws \Exception
     */
    public static function random($length = 16): self
    {
        $string = '';
        $length = IntObject::unwrap($length);

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return string($string);
    }

    /**
     * Generate a UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     *
     * @throws \Exception
     */
    public static function uuid(): UuidInterface
    {
        return Uuid::uuid4();
    }
}
