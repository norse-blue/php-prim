<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Exceptions;

use OutOfBoundsException;
use Throwable;

/**
 * Exception thrown when a property could not be found.
 */
final class PropertyNotFoundException extends OutOfBoundsException
{
    // region === Properties ===

    /** @var string The property that was not found. */
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
