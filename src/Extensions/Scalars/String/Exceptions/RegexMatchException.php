<?php

namespace NorseBlue\Prim\Extensions\Scalars\String\Exceptions;

use RuntimeException;
use Throwable;

class RegexMatchException extends RuntimeException
{
    protected $preg_error_code;

    /**
     * RegexMatchException constructor.
     *
     * @param string $preg_error_code
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     *
     * @see https://www.php.net/manual/en/function.preg-last-error.php
     */
    public function __construct(
        string $preg_error_code,
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->preg_error_code = $preg_error_code;
    }

    /**
     * Get the PCRE regex execution error.
     *
     * @return string
     */
    public function getPregErrorCode(): string
    {
        return $this->preg_error_code;
    }

    public function getPregErrorName()
    {
        return array_flip(get_defined_constants(true)['pcre'])[$this->preg_error_code];
    }
}
