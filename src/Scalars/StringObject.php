<?php

namespace NorseBlue\Prim\Scalars;

use Countable;
use NorseBlue\Prim\ImmutableValueObject;
use NorseBlue\Prim\Support\Character;
use function NorseBlue\Prim\string;

/**
 * Class StringObject
 *
 * @package NorseBlue\Prim\Scalars
 *
 * @property string $value
 */
class StringObject extends ImmutableValueObject implements Countable
{
    // region === Overrides ===

    /**
     * StringObject constructor.
     *
     * @param string|StringObject $value
     */
    public function __construct($value = '')
    {
        $value = self::unwrap($value);

        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    public function valueIsValid($value): bool
    {
        return is_string($value) || $value instanceof self;
    }



    // endregion Overrides

    /**
     * Return the remainder of the value after a given value.
     *
     * @param string|StringObject $search
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function after($search): self
    {
        $value = (string)$this;
        $search = self::unwrap($search);

        return string($search === '' ? $value : array_reverse(explode($search, $value, 2))[0]);
    }

    /**
     * Transliterate a UTF-8 value to ASCII.
     *
     * @param string|StringObject $language
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function ascii($language = 'en'): self
    {
        $value = (string)$this;
        $language = self::unwrap($language);

        $languageSpecific = Character::languageSpecificCharsArray($language);

        if ($languageSpecific !== null) {
            $value = str_replace($languageSpecific[0], $languageSpecific[1], $value);
        }

        foreach (Character::charsArray() as $key => $val) {
            $value = str_replace($val, $key, $value);
        }

        return string(preg_replace('/[^\x20-\x7E]/u', '', $value));
    }

    /**
     * Get the portion of the value before a given value.
     *
     * @param string|StringObject $search
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function before($search): self
    {
        $value = (string)$this;
        $search = self::unwrap($search);

        return string($search === '' ? $value : explode($search, $value)[0]);
    }

    /**
     * Convert the value to camel case.
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function camel(): self
    {
        return $this->studly()->lcfirst();
    }

    /**
     * Compares the value to another string
     *
     * @param string|StringObject $string
     *
     * @param bool $case_insensitive
     *
     * @return int
     */
    public function compare($string, $case_insensitive = false): int
    {
        $value = (string)$this;
        $string = self::unwrap($string);

        return $case_insensitive ? strcasecmp($value, $string) : strcmp($value, $string);
    }

    /**
     * Concatenates the given strings.
     *
     * @param string|StringObject ...$strings
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function concat(...$strings): self
    {
        $value = (string)$this;
        foreach ($strings as $string) {
            $string = self::unwrap($string);

            $value .= $string;
        }

        return string($value);
    }

    /**
     * Determine if a given string contains a given substring.
     *
     * @param string|StringObject|array $needles
     *
     * @return bool
     */
    public function contains($needles): bool
    {
        $haystack = (string)$this;

        foreach ((array)$needles as $needle) {
            $needle = self::unwrap($needle);

            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the value ends with a given substring.
     *
     * @param string|StringObject|array $needles
     *
     * @return bool
     */
    public function endsWith($needles): bool
    {
        foreach ((array)$needles as $needle) {
            $needle = self::unwrap($needle);

            if (is_string($needle) && $needle !== '' && $this->substr(-string($needle)->length())->equals($needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if the value is equal to the given string.
     *
     * @param string|StringObject $string
     * @param bool $case_insensitive
     *
     * @return bool
     */
    public function equals($string, $case_insensitive = false): bool
    {
        return $this->compare($string, $case_insensitive) === 0;
    }

    /**
     * Cap the value with a single instance of a given value.
     *
     * @param string|StringObject $cap
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function finish($cap): self
    {
        $value = (string)$this;
        $cap = self::unwrap($cap);

        $quoted = preg_quote($cap, '/');

        return string(preg_replace('/(?:' . $quoted . ')+$/u', '', $value) . $cap);
    }

    /**
     * Determine if a given string matches the given patterns.
     *
     * @param string|StringObject|array $patterns
     *
     * @return bool
     */
    public function is($patterns): bool
    {
        $value = (string)$this;
        if (!is_array($patterns)) {
            $patterns = [$patterns];
        }

        foreach ($patterns as $pattern) {
            $pattern = self::unwrap($pattern);

            // If the given value is an exact match we can of course return true right
            // from the beginning. Otherwise, we will translate asterisks and do an
            // actual pattern match against the two strings to see if they match.
            if ($pattern === $value) {
                return true;
            }

            $pattern = preg_quote($pattern, '#');

            // Asterisks are translated into zero-or-more regular expression wildcards
            // to make it convenient to check if the strings starts with the given
            // pattern such as "library/*", making any string check convenient.
            $pattern = str_replace('\*', '.*', $pattern);
            if (preg_match('#^' . $pattern . '\z#u', $value) === 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Convert the value to kebab case.
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function kebab(): self
    {
        return $this->snake('-');
    }

    /**
     * Make a string's first character lowercase.
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function lcfirst(): self
    {
        return $this->substr(0, 1)->lower()->concat($this->substr(1));
    }

    /**
     * Return the length of the given string.
     *
     * @param string|StringObject $encoding
     *
     * @return int
     */
    public function length($encoding = null): int
    {
        $value = (string)$this;

        if ($encoding) {
            $encoding = self::unwrap($encoding);

            return mb_strlen($value, $encoding);
        }

        return mb_strlen($value);
    }

    /**
     * Limit the number of characters in a string.
     *
     * @param int $limit
     * @param string|StringObject $end
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function limit(int $limit = 100, $end = '...'): self
    {
        $value = (string)$this;

        if (mb_strwidth($value, 'UTF-8') <= $limit) {
            return string($value);
        }

        $end = self::unwrap($end);

        return string(rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end);
    }

    /**
     * Convert the value to lower-case.
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function lower(): self
    {
        $value = (string)$this;

        return string(mb_strtolower($value, 'UTF-8'));
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param int $length
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     * @throws \Exception
     */
    public static function random($length = 16): self
    {
        $string = '';

        while (($len = strlen($string)) < $length) {
            $size = $length - $len;

            $bytes = random_bytes($size);

            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }

        return string($string);
    }

    /**
     * Replace a given value in the string sequentially with an array.
     *
     * @param string|StringObject $search
     * @param array<string|StringObject> $replace
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function replaceArray($search, array $replace): self
    {
        $subject = $this;

        foreach ($replace as $value) {
            $value = self::unwrap($value);

            $subject = $subject->replaceFirst($search, $value);
        }

        return string($subject);
    }

    /**
     * Replace the first occurrence of a given value in the string.
     *
     * @param string|StringObject $search
     * @param string|StringObject $replace
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function replaceFirst($search, $replace): self
    {
        $subject = (string)$this;
        $search = self::unwrap($search);

        if ($search === '') {
            return string($subject);
        }

        $position = strpos($subject, $search);

        if ($position !== false) {
            $replace = self::unwrap($replace);

            return string(substr_replace($subject, $replace, $position, strlen($search)));
        }

        return string($subject);
    }

    /**
     * Replace the last occurrence of a given value in the string.
     *
     * @param string|StringObject $search
     * @param string|StringObject $replace
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function replaceLast($search, $replace): self
    {
        $subject = (string)$this;
        $search = self::unwrap($search);

        if ($search === '') {
            return string($subject);
        }

        $position = strrpos($subject, $search);

        if ($position !== false) {
            return string(substr_replace($subject, $replace, $position, strlen($search)));
        }

        return string($subject);
    }

    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param string|StringObject $separator
     * @param string|StringObject|null $language
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function slug($separator = '-', $language = 'en'): self
    {
        $title = $language ? $this->ascii($language)->value : $this->value;
        $separator = self::unwrap($separator);

        // Convert all dashes/underscores into separator
        $flip = $separator === '-' ? '_' : '-';

        $title = preg_replace('![' . preg_quote($flip, '!') . ']+!u', $separator, $title);

        // Replace @ with the word 'at'
        $title = str_replace('@', $separator . 'at' . $separator, $title);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $title = preg_replace('![^' . preg_quote($separator, '!') . '\pL\pN\s]+!u', '', string($title)->lower()->value);

        // Replace all separator characters and whitespace by a single separator
        $title = preg_replace('![' . preg_quote($separator, '!') . '\s]+!u', $separator, $title);

        return string(trim($title, $separator));
    }

    /**
     * Convert a string to snake case.
     *
     * @param string|StringObject $delimiter
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function snake($delimiter = '_'): self
    {
        $value = (string)$this;

        if (!ctype_lower($value)) {
            $delimiter = self::unwrap($delimiter);

            $value = preg_replace('/\s+/u', '', ucwords($value));
            $value = preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value);
            return string($value)->lower();
        }

        return string($value);
    }

    /**
     * Begin a string with a single instance of a given value.
     *
     * @param string|StringObject $prefix
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function start($prefix): self
    {
        $value = (string)$this;
        $prefix = self::unwrap($prefix);
        $quoted = preg_quote($prefix, '/');

        return string($prefix . preg_replace('/^(?:' . $quoted . ')+/u', '', $value));
    }

    /**
     * Determine if a given string starts with a given substring.
     *
     * @param string|StringObject|array $needles
     *
     * @return bool
     */
    public function startsWith($needles): bool
    {
        foreach ((array)$needles as $needle) {
            $needle = self::unwrap($needle);

            if (is_string($needle) && $needle !== '' && $this->substr(0, string($needle)->length())->equals($needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Convert the value to studly caps case.
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function studly(): self
    {
        $value = (string)$this;
        $value = ucwords(str_replace(['-', '_'], ' ', $value));

        return string(str_replace(' ', '', $value));
    }

    /**
     * Returns the portion of string specified by the start and length parameters.
     *
     * @param int $start
     * @param int|null $length
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function substr($start, $length = null): self
    {
        $string = (string)$this;

        return string(mb_substr($string, $start, $length, 'UTF-8'));
    }

    /**
     * Convert the given string to title case.
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function title(): self
    {
        $value = (string)$this;

        return string(mb_convert_case($value, MB_CASE_TITLE, 'UTF-8'));
    }

    /**
     * Make a string's first character uppercase.
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function ucfirst(): self
    {
        return $this->substr(0, 1)->upper()->concat($this->substr(1));
    }

    /**
     * Convert the value to upper-case.
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function upper(): self
    {
        $value = (string)$this;

        return string(mb_strtoupper($value, 'UTF-8'));
    }

    /**
     * Limit the number of words in a string.
     *
     * @param int $words
     * @param string|StringObject $end
     *
     * @return \NorseBlue\Prim\Scalars\StringObject
     */
    public function words($words = 100, $end = '...'): self
    {
        $value = (string)$this;

        preg_match('/^\s*+(?:\S++\s*+){1,' . $words . '}/u', $value, $matches);

        if (!isset($matches[0]) || string($value)->length() === string($matches[0])->length()) {
            return string($value);
        }

        $end = self::unwrap($end);

        return string(rtrim($matches[0]) . $end);
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
        return $this->length();
    }

    // endregion Countable
}
