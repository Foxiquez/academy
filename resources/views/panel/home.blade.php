@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        @include('partials.panel_notifications')

        @foreach($user->unreadNotifications as $unread)
            {!! $unread->markAsRead() !!}
        @endforeach
    </div>
@endsection