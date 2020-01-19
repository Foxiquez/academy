<div class="col-md-12">
    <div class="row">
        <div class="card" style="width:100%;">
            <div class="card-header card-header-primary">
                <h4 class="card-title"><i>{{ $form->title.' '.$user->login }}</i></h4>
            </div>
            <div class="card-body">
                @if($user->application)
                    {!! Form::open(['method'=>'PATCH', 'action'=>['Panel\ApplicationController@update', $form->id]]) !!}
                @else
                    {!! Form::open(['method'=>'POST', 'action'=>'Panel\ApplicationController@store']) !!}
                @endif
                <input type="text" name="id" value="{{ $form->id }}" hidden>
                <div id="fb-render"></div>
                @if(!$user->isActive())
                    {!! Form::submit('Отправить', ['class'=>'btn btn-primary']) !!}
                    @endif
                <div class="clearfix"></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@push('form_scripts')
    @include('partials.include.form_scripts')
@endpush