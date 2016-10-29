<?php
namespace Vcord\Larastall\Http\Helpers;

use Illuminate\Support\Facades\Crypt as Crypt;

class InputSetHelper
{
	
	public static function seterror($input)
	{
		$data = filter_input(INPUT_COOKIE, 'inputError');
		if($data)
		{
			$decrypt_data = Crypt::decrypt($data);
			$decode_data = json_decode($decrypt_data, true);
			if($decode_data){
				$errors = $decode_data;
			if(array_key_exists($input, $errors)){
				return $errors[$input][0];
			}else{
				
				return false;
			}
			}
			
		}
		
	}
	
	public static function setinput($input)
	{
		$data = filter_input(INPUT_COOKIE, 'inputData');
		if($data)
		{
			$decrypt_data = Crypt::decrypt($data);
			$decode_data = json_decode($decrypt_data, true);
			
			if($decode_data)
			{
				$errors = $decode_data;
				if(array_key_exists($input, $errors)){
				return $errors[$input];
				}else{
					
					return false;
				}
			}
		}
		
	}
	
}



