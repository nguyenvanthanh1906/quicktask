<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class I18nController extends Controller
{
    public function i18n($language)
    {
        session(['language'=> $language]);
 
        return redirect()->back();
    }
}
