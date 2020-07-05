<?php

use App\Enums\RoomsStatus;
	

class RoomsHelper {
	public static function getStatus($value) {
		switch ($value) {
			case RoomsStatus::OPEN:
				return trans('rooms/status.open');
				break;
			case RoomsStatus::CLOSE:
				return trans('rooms/status.close');
				break;
			case RoomsStatus::CRASH:
				return trans('rooms/status.crash');
				break;
			default:
				return trans('rooms/status.crash');
				break;
		}
	}

	public static function getOptionStatus(){
		return array(
			RoomsStatus::OPEN => trans('rooms/status.open'),
			RoomsStatus::CLOSE => trans('rooms/status.close'),
			RoomsStatus::CRASH => trans('rooms/status.crash')
		);
	}
	public static function increment($i, $perPage, $currentPage){
		return $i + $perPage * ($currentPage -1);
	}
}