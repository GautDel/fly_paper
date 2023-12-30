<?php

namespace App\View\Components\Home;

use App\Models\Fly;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlyCard extends Component
{
    /**
     * Create a new component instance.
     */
    private $fly;

    public function __construct()
    {
        $this->fly = Fly::findOne(4);
    }

    public function render(): View|Closure|string
    {
        return view('components.home.fly-card',['fly' => $this->fly]);
    }
}
