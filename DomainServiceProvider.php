<?php

namespace Shared;

use Illuminate\Routing\Router;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Shared\Http\Middleware\AddCacheHeader;
use Shared\Http\Middleware\AddJsHeader;
use Shared\Http\Middleware\AddRefererHeader;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
        $this->mergeConfigFrom(__DIR__.'/Config/config.php', 'shared');

        $this->loadViewsFrom(__DIR__.'/Resources/views', 'shared');
        Blade::componentNamespace('Shared\\View\\Components', 'shared');

        $router->aliasMiddleware('cache.header', AddCacheHeader::class);
        $router->aliasMiddleware('js.header', AddJsHeader::class);
        $router->aliasMiddleware('referer.header', AddRefererHeader::class);

        $this->createCollectionMacros();
        $this->createBladeDirectives();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function createCollectionMacros(): void
    {
        Collection::macro('normalize', function(bool $associative = false) {
            return json_decode(json_encode($this->all()), $associative);
        });
    }

    protected function createBladeDirectives(): void
    {
        Blade::directive('eur', function($expression) {
            return "<?php echo number_format(floatval($expression), 2, ',', '.') . ' €'; ?>";
        });

        Blade::directive('sprintf', function($expression) {
            return "<?php echo sprintf($expression); ?>";
        });

        Blade::directive('endsprintf', function() {
            return "<?php ?>";
        });
    }
}
