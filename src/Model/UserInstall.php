<?php 
namespace Vcord\Larastall\Model;

use Illuminate\Database\Eloquent\Model;
use Vcord\Larastall\Http\Helpers\Validator\Validator as Validator;
use Vcord\Larastall\Http\Helpers\InputHelper;
use Vcord\Larastall\Model\SiteInstall as Site;
use Artisan;
use Vcord\Larastall\Http\Helpers\EnvHelper as Env;
use Hash;

class UserInstall extends Model
{
	
	protected $table = 'users';
	
	
	public function setUser($data, $res)
	{
		$v = new Validator($data);
		$v->rule('required', ['username', 'email', 'password', 'c_password', 'site_name', 'site_url', 'mail_host', 'mail_driver', 'mail_port', 'mail_username', 'mail_password', 'mail_encryption'])->message('{field} is required');
		$v->rule('lengthMin', ['username', 'email', 'password', 'c_password', 'site_url', 'site_description'], 4)->message('{field} cannot be less than 4 characters');
		$v->rule('numeric', 'mail_port');
		$v->rule('equals', 'password', 'c_password');
		$v->rule('email', ['email', 'mail_username']);
		$v->labels([
		'c_password'=> 'password confirm', 
		'site_name'=> 'Site Name', 
		'site_url'=> 'Site Url', 
		'site_description'=> 'Site Description',
		'mail_host'=> 'Mail Host',
		'mail_driver'=> 'Mail Driver',
		'mail_port'=> 'Mail Port',
		'mail_username'=> 'Mail Username',
		'mail_password'=> 'Mail Password',
		'mail_encryption' => 'Mail Encryption'
		]);
		
		if(!$v->validate()) {
			$SaveError = new InputHelper($data, $v->errors());
			
				return $res->route('larastall_site')->cookie('inputError', $SaveError->dispatchError(), 0.1);
			
		}else{
			
			$user = new UserInstall();
			
			$user->username = $data['username'];
			$user->email = $data['email'];
			$user->password = Hash::make($data['password']);
			$user->is_admin = true;
			$user->is_active = true;
			if($user->save())
			{
				$site = new Site();
				
				$site->name = $data['site_name'];
				$site->user_id = $user->id;
				$site->site_email = $data['mail_username'];
				$site->site_url = $data['site_url'];
				$site->site_description = !$data['site_description'] ? '' : $data['site_description'];
				$site->save();
				
				$env = new Env();
				$env->saveMailToEnv($data);
				
				return $res->route('larastall_complete');
				
			}
			
				
			
			
		}
		
	}
	
}