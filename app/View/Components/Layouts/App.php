<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $title, public ?string $bodyClass)
    {
        $this->title ?: config('app.name');
        $this->bodyClass ?: 'dark';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(
            'components.layouts.app',
            [
                'title' => $this->title,
                'bodyClass' => $this->bodyClass,
            ]
        );
    }
}
