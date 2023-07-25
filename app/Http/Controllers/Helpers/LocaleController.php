<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Session;

class LocaleController extends Controller
{
    public function __invoke($locale = 'fr')
    {
        Session::put('locale', $locale);
        return back();
    }
}
