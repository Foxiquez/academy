<?php

namespace App\Http\Controllers\Panel;

use App\Http\Requests\UserFormRequest;
use App\Notifications\Student\SendApplicationNotify;
use App\Http\Controllers\Controller;
use App\UserForm;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.application.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        if (UserForm::application()->id == $request->id)
        {
            Auth::user()->answers()->create(['data' =>  json_encode($request->except('_method', '_token', 'id'), JSON_UNESCAPED_UNICODE), 'user_form_id' =>  $request->id]);
            Auth::user()->notify(new SendApplicationNotify());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        if (Auth::user()->isFreezed() and $id == UserForm::application()->id)
        {
            Auth::user()->answers()->where('user_form_id', UserForm::APPLICATION_TYPE)->first()->update(['data' => json_encode($request->except('_method', '_token', 'id'), JSON_UNESCAPED_UNICODE)]);
            Auth::user()->update(['status' => \App\User::NEW_USER_STATUS]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
