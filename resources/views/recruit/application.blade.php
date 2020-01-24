@extends('layouts.wrapper')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $form->title }}</div>
                    <div class="card-body">
                        @include('partials.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

