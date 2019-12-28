<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isActive()) return redirect('/panel');
        else if (!isset($user->application)) return view('auth.recruit.application');
        else
        {
            $last_notification = $user->notifications()->last();
            return view('auth.recruit.info', compact('last_notification'));
        }
    }
}
