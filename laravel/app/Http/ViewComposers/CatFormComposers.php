<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Breed;
use App\Repositories\UserRepository;

class CatFormComposers
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $Breeds;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(Breed $Breeds)
    {
        // Dependencies automatically resolved by service container...
        $this->Breeds = $Breeds;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('Breeds', $this->Breeds->pluck('name','id'));
    }
}