<?php

namespace App\Http\Controllers;

use App\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $form = UserForm::application();

        if ($user->isActive()) return redirect('/panel');
        else if (!$user->application)
        {
            return view('auth.recruit.application', compact('form'));
        }
        else
        {
            $answers = $user->application;
            $last_notification = $user->notifications()->latest()->first();
            return view('auth.recruit.info', compact(['last_notification', 'form', 'answers']));
        }
    }
}
