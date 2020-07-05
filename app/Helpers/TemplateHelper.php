<?php 
	
class TemplateHelper{
	
	public static function checkMenuSelected($uri){
		return ( Request::path() == $uri ) ? 'class=active' : ' ';
	}
}