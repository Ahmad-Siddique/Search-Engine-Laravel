<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

class ModuleNamesComposer
{
    public function compose(View $view)
    {
        $moduleNames = app('moduleNames');
        $view->with('moduleNames', $moduleNames);
    }
}
