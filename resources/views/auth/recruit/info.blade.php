@extends('layouts.wrapper')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(Session::has('show-application-form'))
                @include('partials.application')
            @else
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ trans($last_notification->data['title']) }}</div>

                        <div class="card-body">
                            <p>{{ trans($last_notification->data['text']) }}</p>
                            @if($user->isFreezed())
                                <a class="btn btn-primary" href="javascript:location.reload(true)">{{ __('Перезаполнить') }}</a>
                                {!! Session::flash('show-application-form'); !!}
                            @endif
                            <hr>
                            <i>{{ trans($last_notification->data['author']).', '.$last_notification->created_at->diffForHumans() }}</i>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

