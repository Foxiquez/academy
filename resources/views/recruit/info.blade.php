@extends('layouts.wrapper')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans($last_notification->data['title']) }}</div>
                    <div class="card-body">
                        <p>{{ trans($last_notification->data['text']) }}</p>
                        @if ($user->isFreezed() or $user->application == null)
                            <a class="btn btn-primary" href="javascript:location.href = '{{ route('recruit.showApplicationForm') }}'">{{ __('Заявление') }}</a>
                        @endif
                        <hr>
                        <i>{{ trans($last_notification->data['author']).', '.$last_notification->created_at->diffForHumans() }}</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

