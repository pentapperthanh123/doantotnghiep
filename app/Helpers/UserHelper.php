<?php
use App\Enums\UserRole;

class UserHelper {
	public static function getRole($key){
		switch ($key) {
			case UserRole::Admin:
				return 'Admin';
				break;
			case UserRole::Technicians:
				return 'Technicians';
				break;
			case UserRole::Teacher:
				return 'Teacher';
				break;
			
			default:
				return 'No Role';
				break;
		}
	}

	public static function getOptionRole(){
		return array(
			UserRole::Admin => trans('users/optionRole.quantrivien'),
			UserRole::Technicians => trans('users/optionRole.kythuatvien'),
			UserRole::Teacher => trans('users/optionRole.giaovien'),
		);
	}

	public static function increment($i , $perPage, $currentPage){
		return $i + $perPage * ($currentPage - 1);
	}
}
