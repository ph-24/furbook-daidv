<?php

namespace Furbook\Http\ViewComposers;

use Illuminate\View\View;
use Furbook\Breed;

class CatFormComposer
{
    /**
     * The breeds implementation.
     *
     * @var Breed
     */
    protected $breeds;

    /**
     * Create a new profile composer.
     *
     * @param  Breed  $breeds
     * @return void
     */
    public function __construct(Breed $breeds)
    {
        // Dependencies automatically resolved by service container...
        $this->breeds = $breeds;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //dd($this->breeds->pluck('name', 'id'));
        $view->with('breeds', $this->breeds->pluck('name', 'id'));
    }
}