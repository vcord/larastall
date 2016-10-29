<?php
namespace Vcord\Larastall\Http\Helpers;

use Illuminate\Support\Facades\Crypt as Crypt;

class InputHelper
{
	protected $formdata;
	
	protected $errors;
	
	
	public function __construct($formdata = null, $errors = null)
	{
		$this->formdata = $formdata;
		$this->errors = $errors;
	}
    
	
	public function dispatchError()
	{
		$data = [
		'errors'=> $this->errors,
		];
		
		return Crypt::encrypt(json_encode($this->errors));
	}
	
	
	
}


