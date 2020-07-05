<?php 
use App\Enums\ComputerStatus;

class ComputerHelper{
	public static function getStatus($value) {
		switch ($value) {
			case ComputerStatus::ENABLE:
				return trans('computer/status.enable');
				break;
			case ComputerStatus::DISABLE:
				return trans('computer/status.disable');
				break;
			
			default:
				return trans('computer/status.notfound');
				break;
		}
	}
	public static function getOptionStatus(){
		return array(
			ComputerStatus::ENABLE => trans('computer/status.enable'),
			ComputerStatus::DISABLE => trans('computer/status.disable'),
		);
	}
	public static function increment($i, $perPage, $currentPage){
		return $i + $perPage * ($currentPage -1);
	}
}
?>