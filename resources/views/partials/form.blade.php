@if(isset($type['id']))
    {!! Form::open(['method'=>'POST', 'action'=>[$type['action'], $type['id']]]) !!}
@else
    {!! Form::open(['method' => 'POST', 'action' => $type['action']]) !!}
@endif
<div id="fb-render"></div>
@if(isset($type['have_btn']))
    {!! Form::submit('Отправить', ['class'=>'btn btn-primary']) !!}
@endif
<div class="clearfix"></div>
{{ Form::close() }}
@push('form_scripts')
    @include('partials.include.form_scripts')
@endpush