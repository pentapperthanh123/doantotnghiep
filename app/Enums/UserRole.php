<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRole extends Enum
{
    const Admin = 0;
    const Technicians = 1;
    const Teacher = 2;
}
