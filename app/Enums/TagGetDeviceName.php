<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use App\Enums\TagGetDeviceName;

final class TagGetDeviceName extends Enum
{
    const CPU = 0;
    const GPU = 1;
    const Main = 2;
    const RAM = 3;
    const ROM = 4;
}
