<?php
use App\Enums\DeviceStatus;

class DeviceHelper {
	public static function getStatus($value) {
		switch ($value) {
			case DeviceStatus::WORKING:
				return trans('devices/status.working');
				break;
			case DeviceStatus::REPAIRING:
				return trans('devices/status.repairing');
				break;
			case DeviceStatus::CRASH:
				return trans('devices/status.crash');
				break;
			default:
				return ('Other');
				break;
		}
	}
	public static function getOptionStatus(){
		return array(
			DeviceStatus::WORKING => trans('devices/status.working'),
			DeviceStatus::REPAIRING => trans('devices/status.repairing'),
			DeviceStatus::CRASH => trans('devices/status.crash')
			
		);
	}
	public static function increment($i, $perPage, $currentPage){
		return $i + $perPage * ($currentPage - 1);
	}
}

