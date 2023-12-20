<?php

namespace App\View\Components\Home;

use App\Models\OneLiner as OneLinerModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OneLiner extends Component
{
    /**
     * Create a new component instance.
     */

    private $oneLiner;

    public function __construct()
    {
        $this->oneLiner = OneLinerModel::one(3);
    }

    private function getOneLiner() {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.one-liner', ['text' => $this->oneLiner->text]);
    }
}
