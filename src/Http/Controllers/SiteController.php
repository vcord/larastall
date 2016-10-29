<?php
namespace Vcord\Larastall\Http\Controllers;

use AppController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Vcord\Larastall\Model\UserInstall as User;
use Artisan;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class SiteController extends AppController
{
    

	public function store(Request $request, Response $response)
	{
		if ($request->isMethod('post')) {
			
			$user = new User();
			return $user->setUser($request->all(), redirect());
		
		}
	   
		return view('vendor.larastall.site', []);
	}
	
	
	public function complete(Request $request, Response $response)
	{
		$url = config('larastall.on_complete_url');
		
		if ($request->isMethod('post')) {
			
			$path = base_path('config/app.php');
			file_put_contents($path, str_replace(
            'Vcord\Larastall\LarastallServiceProvider::class,', ' ', file_get_contents($path)
			));
			
			$removables = [
			base_path('config/larastall.php'),
			base_path('public/vendor/larastall'),
			base_path('resources/views/vendor/larastall'),
			];
			
			
			try {
				$fs = new Filesystem();
				$fs->remove($removables);
				return redirect($url);
				
			} catch (IOExceptionInterface $e) {
				
				return response()->view('vendor.larastall.complete', ['del_error'=> $e->getPath()]);
			}
			
		}
		return view('vendor.larastall.complete', ['url'=> $url]);
	}
    
}