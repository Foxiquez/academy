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
                            @if(Session::has('success'))
                                {{ trans('general.success_answer') }}
                            @else
                                {{ trans('panel.tests.not_active') }}
                            @endif
                        </h4>
                    </div>
                @else
                    {!! Form::open(['method'=>'POST', 'action'=>'Panel\TestsController@storeAnswer', ['id' => 'custom-form']]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div id="fb-render"></div>
                            </div>
                        </div>
                    {!! Form::submit('Отправить на проверку', ['class'=>'btn btn-primary']) !!}
                    @push('scripts')
                        @include('partials.include.form_scripts')
                        <script type="text/javascript">
                            window._form_builder_content = {!! json_encode($test->json) !!}
                        </script>
                        <script src="{{ asset('js/plugins/forms/form-render.js') }}" defer></script>
                    @endpush
                @endif
            </div>
        </div>
    </div>
@endsection
