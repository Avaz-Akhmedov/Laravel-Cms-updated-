<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;

class NavComposer
{

    public function compose(View $view): void
    {


        $view->with("pages",Page::all());

    }

}
