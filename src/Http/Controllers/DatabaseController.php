<?php
namespace Vcord\Larastall\Http\Controllers;

use AppController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Vcord\Larastall\Http\Helpers\Validator\Validator as Validator;
use Vcord\Larastall\Http\Helpers\InputHelper;
use Artisan;
use Exception;
use Vcord\Larastall\Http\Helpers\EnvHelper as Env;

class DatabaseController extends AppController
{
	
    public function store(Request $request, Response $response)
    {
		if ($request->isMethod('post')) {
			
			$v = new Validator($request->all());
			$v->rule('required', ['db_host','db_name', 'db_user', 'db_password'])->message('{field} is required');
			
			$v->rule('lengthMin', ['db_host','db_name', 'db_user', 'db_password'], 4)->message('{field} cannot be less than 4 characters');
			
			$v->labels(array(
				'db_host' => 'Database Host', 'db_name'=> 'Database Name', 'db_user'=> 'Database User', 'db_password'=> 'Database Password'
			));
			if($v->validate()) {
				
				$connection = config('database.default');
				config([
					'database.connections.'.$connection.'.host' => $request->db_host,
					'database.connections.'.$connection.'.database' => $request->db_name,
					'database.connections.'.$connection.'.password' => $request->db_password,
					'database.connections.'.$connection.'.username' => $request->db_user,
				]);
		
			try {
				
			Artisan::call('cache:clear');
			Artisan::call('migrate');
            Artisan::call('db:seed');
			
			$env = new Env();
			$env->saveDbToEnv($request);
			
			
			
			return redirect()->route('larastall_site');
			
			} catch(Exception $e) {

				return response()->view('vendor.larastall.database', ['db_error'=> $e->getMessage()]);
			}
			  
			} else {
				
				$SaveError = new InputHelper($request->all(), $v->errors());
				return redirect()->route('larastall_database')->cookie('inputError', $SaveError->dispatchError(), 0.1);

			}
			
		}
	   
        return view('vendor.larastall.database', []);
    }
    
}