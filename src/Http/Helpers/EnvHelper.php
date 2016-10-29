<?php
namespace Vcord\Larastall\Http\Helpers;

class EnvHelper
{
	
	protected $env;
	
	protected $getContent;
	
	
	public function __construct()
	{
		$this->env = base_path('.env');
		$this->getContent = file($this->env);
	}
	
	
	private function set($key, $value)
    {
        $this->getContent = array_map(function($item) use($key, $value){
            if(strpos($item, $key) !== false) {
                $start = strpos($item, '=') + 1;
                $item = substr_replace($item, $value . "\n", $start);
            };
            return $item;
        }, $this->getContent);
    }
	
	public function saveDbToEnv($data)
	{
		$this->set('DB_DATABASE', $data->db_name);
        $this->set('DB_USERNAME', $data->db_user);
        $this->set('DB_PASSWORD',$data->db_password);
        $this->set('DB_HOST', $data->db_host);
		
		file_put_contents($this->env, implode($this->getContent));
	}
	
	public function saveMailToEnv($data)
	{
		$this->set('MAIL_DRIVER', $data['mail_driver']);
		$this->set('MAIL_HOST', $data['mail_host']);
		$this->set('MAIL_PORT', $data['mail_port']);
		$this->set('MAIL_USERNAME', $data['mail_username']);
		$this->set('MAIL_PASSWORD', $data['mail_password']);
		$this->set('MAIL_ENCRYPTION', $data['mail_encryption']);
		
		file_put_contents($this->env, implode($this->getContent));
	}
}