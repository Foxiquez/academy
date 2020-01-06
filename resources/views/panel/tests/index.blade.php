@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                @if(!$test)
                    <h3 class="card-title">{{ trans('panel.tests.title') }}</h3>
                    <p class="card-category">{{ trans('panel.tests.info') }}</p>
                @else
                    <h3 class="card-title">{{ $test->title }}</h3>
                    <p class="card-category">{{ trans('panel.tests.start_info') }}</p>
                @endif
            </div>
            <div class="card-body">
                @if(!$test)
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <h4 class="card-title">
                            {{ trans('panel.tests.not_active') }}
                        </h4>
                    </div>
                @else
                    {!! Form::open(['method'=>'POST', 'action'=>'Panel\TestsController@storeAnswer']) !!}
                    {!! Form::submit('Отправить на проверку', ['class'=>'btn btn-primary']) !!}
                @endif
            </div>
        </div>
    </div>
@endsection