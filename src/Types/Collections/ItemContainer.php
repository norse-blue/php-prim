<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Collections;

use Countable;
use NorseBlue\ExtensibleObjects\Contracts\Creatable;
use NorseBlue\ExtensibleObjects\Contracts\Extensible;
use NorseBlue\ExtensibleObjects\Traits\HandlesExtensionMethods;
use NorseBlue\Prim\Traits\ContainerArrayAccess;
use NorseBlue\Prim\Traits\ContainsItems;
use NorseBlue\Prim\Traits\HasPropertyAccessors;
use NorseBlue\Prim\Traits\HasPropertyMutators;

/**
 * Defines an item container object.
 */
class ItemContainer implements Countable, Creatable, Extensible
{
    // region === Traits ===

    use ContainsItems;
    use ContainerArrayAccess;
    use HandlesExtensionMethods;
    use HasPropertyAccessors;
    use HasPropertyMutators;

    // endregion Traits

    // region === Constructor ===

    /**
     * ItemContainer constructor.
     *
     * @param iterable<mixed> $items
     */
    public function __construct(iterable $items = [])
    {
        $this->items = (array)$items;
    }

    // endregion Constructor

    // region === implements Creatable ===

    /**
     * Creates a new instance.
     *
     * @param iterable $items
     *
     * @return static
     */
    public static function create(iterable $items = []): self
    {
        return new static($items);
    }

    // endregion Creatable
}
