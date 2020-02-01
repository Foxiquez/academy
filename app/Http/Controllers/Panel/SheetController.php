<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SheetController extends Controller
{
    public function show()
    {
        $url = 'https://docs.google.com/spreadsheets/d/1pdWYBKrYpwMHXDjLuzAnjAFugz_78pp0aJkslzIoQfs/edit#gid=0';
        return view('panel.sheet.index', compact('url'));
    }
}
