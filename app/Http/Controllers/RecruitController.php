<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Notifications\Student\CreateApplicationNotify;
use App\UserForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isActive()) return redirect('/panel');

        $last_notification = $user->notifications()->latest()->first();

        return view('recruit.info', compact(['last_notification']));

/*        if ($user->isActive()) return redirect('/panel');
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
        }*/
    }

    public function showApplicationForm()
    {
        $user = Auth::user();

        if ($user->isFreezed() or $user->application == null)
        {
            $form = UserForm::application();

            $answers = $user->application;

            $type = ['have_btn' => true];

            if (isset($answers->data))
                $type['action'] = 'RecruitController@editApplication';
            else
                $type['action'] = 'RecruitController@createApplication';

            return view('recruit.application', compact(['form', 'answers', 'type']));
        }
        return redirect('/recruit');
    }

    public function createApplication(UserFormRequest $request)
    {
        $user = Auth::user();

        if ($user->application == null)
        {
            $user->answers()->create([
                'data' =>  json_encode($request->all(), JSON_UNESCAPED_UNICODE),
                'user_form_id'  =>  UserForm::application()->id
            ]);
            $user->notify(new CreateApplicationNotify());
            return redirect('/recruit');
        }
    }

    public function editApplication(UserFormRequest $request)
    {
        $user = Auth::user();

        if ($user->isFreezed())
        {
            $user->answers()->where('user_form_id', UserForm::application()->id)->update([
                'data' =>  json_encode($request->all(), JSON_UNESCAPED_UNICODE)
            ]);
            $user->update(['status' => \App\User::NEW_USER_STATUS]);
            return redirect('/recruit');
        }
    }
}
