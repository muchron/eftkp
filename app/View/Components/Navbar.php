<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $setting;
    public function __construct()
    {
        $this->setting = new Setting();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar', ['data' => $this->setting->first()]);
    }
}
