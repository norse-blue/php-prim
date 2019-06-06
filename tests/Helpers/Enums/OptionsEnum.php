<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Tests\Helpers\Enums;

use NorseBlue\Prim\Types\Enums\Enum;

/**
 * Class OptionsEnum
 *
 * @package NorseBlue\Prim\Tests\Helpers\Enums
 *
 * @method static self EMPTY()
 * @method static self NONE()
 * @method static self ZERO()
 * @method static self FIRST_OPTION()
 * @method static self SECOND_OPTION()
 * @method static self THIRD_OPTION()
 * @method static self FOURTH_OPTION()
 * @method static self FIFTH_OPTION()
 */
class OptionsEnum extends Enum
{
    protected const EMPTY = '';
    protected const NONE = null;
    protected const ZERO = 0;
    protected const FIRST_OPTION = 1;
    protected const SECOND_OPTION = 2;
    protected const THIRD_OPTION = 3;
    protected const FOURTH_OPTION = 4;
    protected const FIFTH_OPTION = 5;
}
