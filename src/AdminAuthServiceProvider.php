<?php

namespace SpringCms\AdminAuth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Gate;

use SpringCms\AdminAuth\App\Contracts\ApiDatabase;

use SpringCms\AdminAuth\App\Extensions\ApiUserProvider; 
use SpringCms\AdminAuth\App\Extensions\ApiGuard; 

use SpringCms\AdminAuth\Models\ApiUser;

class AdminAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishConfig(); 
        $this->loadViews();
        $this->loadRoutes();       
        $this->loadMigrations();

        // $router->middleware('admin', 'SpringCms\AdminAuth\App\Http\Middleware\AdminAuthenticate');
 
    }

    private function loadViews()
    {
        $viewsPath = $this->packagePath('resources/views'); 
        $this->loadViewsFrom($viewsPath, 'adminspringcms');

    }
    private function publishConfig()
    {
        $configPath = $this->packagePath('config/auth.php');
        $this->mergeConfigFrom($configPath, 'auth');
        $configPath = $this->packagePath('config/adminspringcms.php');       
        $this->mergeConfigFrom($configPath, 'adminspringcms');
        //$configPath = $this->packagePath('config/adminlte.php');       
        //$this->mergeConfigFrom($configPath, 'adminspringcms');
    }
    private function loadMigrations($value='')
    {
        $viewsPath = $this->packagePath('migrations'); 
        $this->loadMigrationsFrom($viewsPath, 'adminspringcms');
    }
    private function loadRoutes($value='')
    {
       $routesPath = $this->packagePath('src/routes/admin.php'); 
        $this->loadRoutesFrom($routesPath, 'adminspringcms');
    }   
    private function packagePath($path)
    {
        return __DIR__."/../$path";
    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        $config = $this->app['config']->get($key, []);
        $this->app['config']->set($key, array_merge_recursive(require $path, $config));
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        //include __DIR__.'/routes/web.php';

    }
}
