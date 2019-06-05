<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Exceptions;

use RuntimeException;
use Throwable;

/**
 * Exception thrown when trying to set an immutable property.
 */
final class ImmutablePropertyException extends RuntimeException
{
    // region === Properties ===

    /** @var string property */
    protected $property;

    // endregion Properties

    // region === Constructor ===

    /**
     * Create a new instance.
     *
     * @param string $property
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $property = '', string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->property = $property;
    }

    // endregion Constructor

    // region === Property Accessors ===

    /**
     * Get the property value.
     *
     * @return string
     */
    public function getProperty(): string
    {
        return $this->property;
    }

    // endregion Property Accessors
}
