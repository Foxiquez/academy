@extends('layouts.wrapper')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if(Session::has('show-application-form'))
                @include('partials.application')
            @else
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ trans('recruit.title') }}</div>

                        <div class="card-body">
                            <p>{{ trans('recruit.info.text') }}</p>
                            @if($user->isNew())
                                <p>{{ trans('recruit.wait.text') }}</p>
                            @else
                                @if($user->isFreezed())
                                    <p>{{ trans('recruit.freezed.text') }}</p>
                                    <a class="btn btn-primary" href="javascript:location.reload(true)">{{ trans('recruit.freezed.btn') }}</a>
                                    {!! Session::flash('show-application-form'); !!}
                                @elseif($user->isRejected())
                                    <p>{{ trans('recruit.rejected.text') }}</p>
                                @elseif($user->isBanned())
                                    <p>{{ trans('recruit.banned.text') }}</p>
                                @endif
                                    {{ $last_notification->data['reasons'] }}
                                    <hr>
                                    {{ $last_notification->data['author'].', '.$last_notification->created_at->diffForHumans() }}
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

