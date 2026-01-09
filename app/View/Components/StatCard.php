<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatCard extends Component
{
    public $icon;
    public $color;
    public $value;
    public $label;
    public $change;
    public $changeType;

    public function __construct(
        $icon,
        $color,
        $value,
        $label,
        $change = null,
        $changeType = null
    ) {
        $this->icon = $icon;
        $this->color = $color;
        $this->value = $value;
        $this->label = $label;
        $this->change = $change;
        $this->changeType = $changeType;
    }

    public function render(): View|Closure|string
    {
        return view('admin.componets.stat-card');
    }
}
