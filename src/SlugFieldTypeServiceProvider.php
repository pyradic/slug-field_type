<?php

namespace Anomaly\SlugFieldType;

use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Application\Event\ApplicationHasLoaded;
use Anomaly\Streams\Webpack\Webpack;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Contracts\View\Factory;

/**
 * Class SlugFieldTypeServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class SlugFieldTypeServiceProvider extends AddonServiceProvider implements DeferrableProvider
{

    public function register()
    {
        parent::register();

        $this->app->booting(function(){
            resolve(AddonCollection::class)->put('anomaly.field_type.slug', json_decode(file_get_contents(__DIR__.'/../composer.json'),true));
        });
    }


    /**
     * Return the provided services.
     */
    public function provides()
    {
        return [SlugFieldType::class, 'anomaly.field_type.slug'];
    }

    public function boot()
    {
        parent::boot();
        $this->app->events->listen(ApplicationHasLoaded::class, function(){
            /** @var Webpack $webpack */
            $webpack = resolve(Webpack::class);
            $webpack->enableEntry('@anomaly/slug-field_type');
            resolve(Factory::class)->startPush('app_start', '<h1>Heleo</h1>');
        });
    }
}
