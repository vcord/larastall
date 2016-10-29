<?php
namespace Vcord\Larastall\Http\Helpers;
use Illuminate\Support\Facades\Crypt as Crypt;

class CookieHelper
{
	
	public function __construct()
	{
	}
    
	
	public function set($key, $value, $time = 1)
	{
		$data = Crypt::encrypt($value);
		setcookie($key, json_encode(['Data'=> $data]), time() + $time, '/', '.'.$_SERVER['HTTP_HOST']);
	}
	
	public function get($key)
	{
		$data = json_decode(filter_input(INPUT_COOKIE, $key), true);
		$cookie = Crypt::decrypt($data['Data']);
		return $cookie;
	}
	
	public function clear($key)
	{
		setcookie($key, NULL , time() - 2592000, '/', '.'.$_SERVER['HTTP_HOST']);
	}
	
}