<?php namespace Gzero\Api;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\ServiceProvider as SP;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class ServiceProvider
 *
 * @package    Gzero
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2014, Adrian Skierniewski
 */
class ServiceProvider extends SP {

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Gzero\Api\UrlParamsProcessor',
            function ($app) {
                return new UrlParamsProcessor(Input::all());
            }
        );
    }

    private function registerRoutes()
    {
        require_once __DIR__ . '/../../routes.php';
    }

}
