<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use App\Enums\RoomsStatus;

final class RoomsStatus extends Enum
{
	 	const OPEN = 0;
     	const CLOSE = 1;
   		const CRASH = 2;
}
