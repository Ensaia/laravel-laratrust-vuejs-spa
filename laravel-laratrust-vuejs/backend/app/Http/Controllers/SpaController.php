<?php
namespace app\Http\Controllers;

use App\Http\Controllers\Controller;

class SpaController extends Controller
{
    /**
     * Renders the main app screen
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('index');
    }
}

