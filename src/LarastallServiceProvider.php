<?php namespace	Vcord\Larastall;
/**
 * 
 * @author Vcord Ukandu Michael <vcordukandu@gmail>
 */
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class LarastallServiceprovider extends ServiceProvider{
    
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(){}
    
    
    public function boot()
    {
        // Get namespace
        $nameSpace = $this->app->getNamespace();

        // Set namespace aliases for Controllers
        AliasLoader::getInstance()->alias('AppController', $nameSpace . 'Http\Controllers\Controller');
        
        
        if (! $this->app->routesAreCached()) {
        require __DIR__.'/Http/routes/routes.php';
        }
        
        
        $this->publishes([
        __DIR__.'/../views' => resource_path('views/vendor/larastall'),
        ]);
    
		$this->publishes([
        __DIR__.'/../assets' => public_path('vendor/larastall'),
		], 'public');
		
		// Configuration
        $this->publishes([
            __DIR__.'/../config/larastall.php' => config_path('larastall.php'),
        ], 'larastall');
		
		 $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'larastall');
	
		/**
		* Whether to migrate the users table
		*/
		
		$publishUser = config('larastall.publish_users_table');
		
		if($publishUser)
		{
			$this->publishes([
            __DIR__.'/../database/users_migration' => database_path('migrations'),
			], 'larastall');
		}
		
	
		
    }
    
}