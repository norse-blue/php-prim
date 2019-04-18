<?php

namespace NorseBlue\Prim\Exceptions;

use OutOfBoundsException;
use Throwable;

/**
 * Class PropertyNotFoundException
 *
 * @package NorseBlue\Prim\Exceptions
 */
class PropertyNotFoundException extends OutOfBoundsException
{
    /** @var string The property that was not found. */
    protected $property;

    /**
     * PropertyNotFoundException constructor.
     *
     * @param string $property
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $property, string $message = '', int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->property = $property;
    }
}
