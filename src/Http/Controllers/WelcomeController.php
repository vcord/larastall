<?php
namespace Vcord\Larastall\Http\Controllers;

use AppController;

class WelcomeController extends AppController
{
    public $errorExists;
	
	
	public function __construct()
	{
		$this->errorExists = false;
	}
	
    
	public function checkVersion()
	{
		if(phpversion() < 5.6)
		{
			$this->errorExists = true;
			
			return false;
			
		}else{
			
			return true;
		}
	}
	
	public function checkRequirements($requirement)
	{
		if(in_array($requirement, get_loaded_extensions())){
			
			return true;
			
		}else{
			
			$this->errorExists = true;
			
			return false;
		}
	}
	
	
	public function welcome()
    {
	   $setValues = [
	   'is_Php_updated' => $this->checkVersion(),
	   'is_Mbstring_Loaded'=> $this->checkRequirements('mbstring'),
	   'is_Openssl_Loaded'=> $this->checkRequirements('openssl'),
	   'is_Pdo_Loaded'=> $this->checkRequirements('PDO'),
	   'is_Tokenizer_Loaded' => $this->checkRequirements('tokenizer'),
	   'errorExists'  => $this->errorExists
	   ];
	   
        return view('vendor.larastall.welcome', $setValues);
    }
}