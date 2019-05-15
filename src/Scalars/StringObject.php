<?php

namespace NorseBlue\Prim\Scalars;

use Countable;
use NorseBlue\Prim\ImmutableValueObject;
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
 * @method self after(string|self $search) From extension method StringAfterExtension
 * @method self ascii(string|self $language = 'en') From extension method StringAsciiExtension
 * @method self before(string|self $search) From extension method StringBeforeExtension
 * @method self camel() From extension method StringCamelExtension
 * @method IntObject compare(string|self $string, bool $case_insensitive = false) From extension method StringCompareExtension
 * @method self concat(string|self ...$strings) From extension method StringConcatExtension
 * @method BoolObject contains(string|self|array $needles) From extension method StringContainsExtension
 * @method BoolObject endsWith(string|self|array $needles) From extension method StringEndsWithExtension
 * @method BoolObject equals(string|self $string, bool $case_insensitive = false) From extension method StringEqualsExtension
 * @method self finish(string|self $cap) From extension method StringFinishExtension
 * @method self is(string|self|array $patterns) From extension method StringIsExtension
 * @method self kebab() From extension method StringKebabExtension
 * @method self lcfirst() From extension method StringLcfirstExtension
 * @method self left(int|IntObject $length) From extension method StringLeftExtension
 * @method IntObject length(string|self $encoding = null) From extension method StringLengthExtension
 * @method self limit(int $limit = 100, string|self $end = '...') From extension method StringLimitExtension
 * @method self lower() From extension method StringLowerExtension
 * @method self prefix(string|StringObject $prefix) From extension method StringPrefixExtension
 * @method array regexMatches(string|self $pattern, int|IntObject $flags = 0) From extension method StringRegexMatchesExtension
 * @method self regexQuote(string|self $delimiter = '#') From extension method StringRegexQuoteExtension
 * @method self repeat(int|IntObject $times = 2) From extension method StringRepeatExtension
 * @method self replace(string|StringObject $search, string|StringObject $replace) From extension method StringReplaceExtension
 * @method self replaceArray(string|self $search, string[]|self[] $replace) From extension method StringReplaceArrayExtension
 * @method self replaceFirst(string|self $search, string|self $replace) From extension method StringReplaceFirstExtension
 * @method self replaceLast(string|self $search, string|self $replace) From extension method StringReplaceLastExtension
 * @method self right(int|IntObject $length) From extension method StringLeftExtension
 * @method self slug(string|self $separator = '-', string|self|null $language = 'en') From extension method StringSlugExtension
 * @method self snake(string|self $delimiter = '_') From extension method StringSnakeExtension
 * @method self start(string|self $prefix) From extension method StringStartExtension
 * @method BoolObject startsWith(string|self|array $needles) From extension method StringStartsWithExtension
 * @method self studly() From extension method StringStudlyExtension
 * @method self substr(int $start, int|null $length = null) From extension method StringSubstrExtension
 * @method self suffix(string|StringObject $suffix) From extension method StringSuffixExtension
 * @method self surround(string|StringObject $prefix, string|StringObject|null $suffix = null) From extension method StringSurroundExtension
 * @method self title() From extension method StringTitleExtension
 * @method self ucfirst() From extension method StringUcfirstExtension
 * @method self upper() From extension method StringUpperExtension
 * @method self words(int $words = 100, string|self $end = '...') From extension method StringWordsExtension
 */
class StringObject extends ImmutableValueObject implements Countable
{
    /** @inheritDoc */
    protected static $extensions = [];

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
     * Generate a time-ordered UUID (version 4).
     *
     * @return \Ramsey\Uuid\UuidInterface
     * @throws \Exception
     */
    public static function orderedUuid(): UuidInterface
    {
        $factory = new UuidFactory;

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
     * @throws \Exception
     */
    public static function uuid(): UuidInterface
    {
        return Uuid::uuid4();
    }

    // region === Countable ===

    /**
     * Count elements of an object
     *
     * @link https://php.net/manual/en/countable.count.php
     *
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return $this->length()->value;
    }

    // endregion Countable
}
