<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Validator;

class AuthController extends Controller
{
	private $apiToken;

	public function __construct(){
		$this->apiToken = uniqid(base64_encode(str_random(60)));
	}    

	public function postLogin(Request $request){
		$rules = [
    		'username' => 'required',
    		'password' => 'required|min:5',
    	];
    	$validator = Validator::make($request->all(),$rules);
    	if ($validator->fails()) {
	      // Validation failed
	    	return api_errors(400,"Validator Fail",403);
	    } 
	    else {
	    	// Fetch User
	    	$user = User::where('username',$request->username)->first();
	    	if($user) {
	        	// Verify the password
	        	if( password_verify($request->password, $user->password) ) {
		          	// Update Token
		          	$postArray = ['api_token' => $this->apiToken];
		          	$login = User::where('username',$request->username)->update($postArray);
		          
		          	if($login) {
		            	return api_success([ 'data' => [
					              	'name'         => $user->name,
					              	'username'     => $user->username,
					              	'access_token' => $this->apiToken,
		            			]],"Success",200);
		          	}
		        } 
		        else {
		          return api_errors(400,"Invalid Password",403);
		        }
	      	} 
	      	else {
		        return api_errors(400,"User not found",403);
	      	}
	    }
	}

	public function postRegister(Request $request){
		// Validations
		$rules = [
    		'name' => 'required|max:100',
    		'username' => 'required|unique:users,username|alpha_num',
    		'password' => 'required|min:5',
    		'confirmpassword' => 'required|min:5|same:password',
    		'email' => 'required|unique:users,email|max:100',
    	];
	    $validator = Validator::make($request->all(), $rules);
	    if ($validator->fails()) {
	      // Validation failed
	      return response()->json(['message' => $validator->messages(),]);
	    } 
	    else {
	    	$postArray = [
	    		'name'      => $request->name,
	    		'username'  => $request->username,
	    		'password'  => bcrypt($request->password),
	    		'email'     => $request->email,
	    		'api_token' => $this->apiToken
	    	];
	      // $user = User::GetInsertId($postArray);
	    	$user = User::insert($postArray);
	  
	      	if($user) {
	        	return api_success([ 'data' => [
	          		'name'         => $request->name,
	          		'username'        => $request->username,
	          		'access_token' => $this->apiToken,
	        	]],"Success",200);
	      	}
	      	else {
	        	return api_errors(400,"Registration failed, please try again.",403);
	      	}
	    }
	}

	public function postLogout(Request $request){

	    $token = $request->header('Authorization');
	    $user = User::where('api_token',$token)->first();
	    if($user) {
	      	$postArray = ['api_token' => null];
	      	$logout = User::where('id',$user->id)->update($postArray);
	      	if($logout) {
	        	return api_errors(400,"User Logged Out",403);
	      	}
	    } 
	    else {
	      return api_errors(400,"User not found",403);
	    }
	}

}
