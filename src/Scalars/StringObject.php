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
 * @method self after(string|self $search)
 * @method self ascii(string|self $language = 'en')
 * @method self before(string|self $search)
 * @method self camel()
 * @method IntObject compare(string|self $string, bool $case_insensitive = false)
 * @method self concat(string|self ...$strings)
 * @method BoolObject contains(string|self|array $needles)
 * @method BoolObject endsWith(string|self|array $needles)
 * @method BoolObject equals(string|self $string, bool $case_insensitive = false)
 * @method self finish(string|self $cap)
 * @method self is(string|self|array $patterns)
 * @method self kebab()
 * @method self lcfirst()
 * @method IntObject length(string|self $encoding = null)
 * @method self limit(int $limit = 100, string|self $end = '...')
 * @method self lower()
 * @method self replace(string|StringObject $search, string|StringObject $replace)
 * @method self replaceArray(string|self $search, string[]|self[] $replace)
 * @method self replaceFirst(string|self $search, string|self $replace)
 * @method self replaceLast(string|self $search, string|self $replace)
 * @method self slug(string|self $separator = '-', string|self|null $language = 'en')
 * @method self snake(string|self $delimiter = '_')
 * @method self start(string|self $prefix)
 * @method BoolObject startsWith(string|self|array $needles)
 * @method self studly()
 * @method self substr(int $start, int|null $length = null)
 * @method self title()
 * @method self ucfirst()
 * @method self upper()
 * @method self words(int $words = 100, string|self $end = '...')
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
