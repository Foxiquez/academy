<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isActive()) return redirect('/panel');
        else if ($user->isRejected() or $user->isBanned())
        {

        }
        else if (!$user->application)
        {
            return view('auth.recruit.application', compact('form'));
        }

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

    public function showStatus()
    {

    }

    public function showAppplicationForm()
    {
        $form = UserForm::application();

        $answers = Auth::user()->application;

        $type = [
            ''
        ];

        return view('recruit.application', compact(['form', 'answers', 'type']));
    }

    public function createApplication(UserFormRequest $request)
    {

    }

    public function editApplication(UserFormRequest $request)
    {

    }
}
