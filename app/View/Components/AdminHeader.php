<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminHeader extends Component
{
    public $title;
    public $showSearch;
    public $searchPlaceholder;
    public $searchId;
    public $buttonText;
    public $buttonId;
    public $showProfile; // NEW

    public function __construct(
        $title = 'Dashboard',
        $showSearch = false,
        $searchPlaceholder = 'Search...',
        $searchId = '',
        $buttonText = '',
        $buttonId = '',
        $showProfile = false  // NEW - Default false
    ) {
        $this->title = $title;
        $this->showSearch = $showSearch;
        $this->searchPlaceholder = $searchPlaceholder;
        $this->searchId = $searchId;
        $this->buttonText = $buttonText;
        $this->buttonId = $buttonId;
        $this->showProfile = $showProfile; // NEW
    }

    public function render(): View|Closure|string
    {
        return view('admin.common.header');
    }
}