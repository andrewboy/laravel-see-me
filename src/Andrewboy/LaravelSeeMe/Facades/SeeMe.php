<?php namespace Andrewboy\LaravelSeeMe\Facades;

use Illuminate\Support\Facades\Facade;

class SeeMe extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'seeme';
    }
}
