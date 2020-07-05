<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class DeviceStatus extends Enum
{
    const WORKING = 0;
    const REPAIRING = 1;
    const CRASH = 2;
}
