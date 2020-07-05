<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
/**
 * @apiDefine RequireAuthHeader
 *
 * @apiHeader {String} Authorization Authorization Bearer token after login
 * @apiHeaderExample {json} Header-Example:
 * {
 *     "Authorization": "Bearer jwt-token-after-login"
 * }
 */
class BaseController extends Controller
{
    
}