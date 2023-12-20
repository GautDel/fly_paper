<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    private string $date;
    private string $brand = 'THE DAILY FLYER';
    private string $slogan = 'Your One Stop for all things fly fishing';

    public function __construct()
    {
        $this->date = $this->time();
    }

    private function time(): string {
        $date = date('l').', '.date('d').' '.date('F').' '.date('Y');
        return $date;
    }




    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout',
            ['date' => $this->date,
             'brand' => $this->brand,
             'slogan' => $this->slogan
            ]);
    }
}
