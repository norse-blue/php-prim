<?php

namespace NorseBlue\Prim\Scalars\Extensions\String\Exceptions;

use RuntimeException;
use Throwable;

class RegexMatchException extends RuntimeException
{
    /** @var int */
    protected $preg_error_code;

    /** @var string */
    protected $preg_error_name;

    /**
     * RegexMatchException constructor.
     *
     * @param int $preg_error_code
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     *
     * @see https://www.php.net/manual/en/function.preg-last-error.php
     */
    public function __construct(
        int $preg_error_code,
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->preg_error_code = $preg_error_code;
        $this->preg_error_name = $this->translatePregErrorCode($this->preg_error_code);
    }

    /**
     * Get the PCRE regex execution error code.
     *
     * @return int
     */
    public function getPregErrorCode(): int
    {
        return $this->preg_error_code;
    }

    /**
     * Get the PCRE regex execution error name.
     *
     * @return string
     */
    public function getPregErrorName(): string
    {
        return $this->preg_error_name;
    }

    /**
     * Translate the PCRE execution regex error code.
     *
     * @param int $preg_error_code
     *
     * @return string
     */
    protected function translatePregErrorCode(int $preg_error_code): string
    {
        $pcre_constants = get_defined_constants(true)['pcre'];

        return @array_flip($pcre_constants)[$preg_error_code];
    }
}
