<?php

namespace App\View\Components\Home;

use App\Models\Joke as ModelsJoke;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Joke extends Component
{
    /**
     * Create a new component instance.
     */
    private $joke;
    public function __construct()
    {
        $this->joke = ModelsJoke::one(3);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.joke', ['joke' => $this->joke]);
    }
}
