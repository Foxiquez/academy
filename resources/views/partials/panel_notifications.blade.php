<div class="card">
    <div class="card-header card-header-primary">
        <h3 class="card-title">{{ trans('panel.notifications.title') }}</h3>
        <p class="card-category">
            {{ trans('panel.notifications.info') }}
        </p>
    </div>
    <div class="card-body">
        <div class="row">
            @if(count($user->notifications)>0)
                <div class="col-md-12">
                    @foreach($user->notifications as $notification)
                        <div class="alert alert-{{ $notification->data['type'] }} alert-with-icon" data-notify="container">
                            <i class="material-icons" data-notify="icon">{{ $notification->data['icon'] }}</i>
                            <span data-notify="message">{{ trans($notification->data['text']) }}</span>
                            <br>
                            <strong>{{ trans($notification->data['title']).', '.trans($notification->data['author']).' '.$notification->created_at->diffForHumans().';' }}</strong>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h4 class="card-title">
                        {{ trans('panel.notifications.no_notify') }}
                    </h4>
                </div>
            @endif
        </div>
    </div>
</div>
