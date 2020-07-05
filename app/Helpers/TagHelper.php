<?php
use App\Enums\TagGetDeviceName;
class TagHelper {
	public static function getStatus($value){
		switch ($value) {
			case TagGetDeviceName::CPU:
				return trans('tags/langTag.cpu');
				break;
			case TagGetDeviceName::GPU:
				return trans('tags/langTag.gpu');
				break;
			case TagGetDeviceName::Main:
				return trans('tags/langTag.main');
				break;
			case TagGetDeviceName::RAM:
				return trans('tags/langTag.ram');
				break;
			case TagGetDeviceName::ROM:
				return trans('tags/langTag.rom');
				break;
			default:
				return 'Unknown device';
				break;
		}
	}
	public static function getOptionStatus(){
		return array(
			TagGetDeviceName::CPU => trans('tags/langTag.cpu'),
			TagGetDeviceName::GPU => trans('tags/langTag.gpu'),
			TagGetDeviceName::Main => trans('tags/langTag.main'),
			TagGetDeviceName::RAM => trans('tags/langTag.ram'),
			TagGetDeviceName::ROM => trans('tags/langTag.rom')
		);
	}
	public static function increment($i, $perPage, $currentPage){
		return $i+$perPage*($currentPage-1);
	}
}







