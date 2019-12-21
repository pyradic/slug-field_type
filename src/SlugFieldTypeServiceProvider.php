<?php

namespace Anomaly\SlugFieldType;

use Anomaly\Streams\Platform\Addon\AddonCollection;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

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
}
