@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"><i>{{ trans('panel.curators.title') }}</i></h4>
                        <p class="card-category">{{ trans('panel.curators.text') }}</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    (( OOC Имя ))
                                </th>
                                <th>
                                    Имя и Фамилия
                                </th>
                                <th>
                                    Мобильный номер телефона
                                </th>
                                </thead>
                                <tbody>
                                @foreach($curators as $curator)
                                    <tr>
                                        <td>
                                            {{ $curator->login }}
                                        </td>
                                        <td>
                                            {{ $curator->name }}
                                        </td>
                                        <td>
                                            {{ ((array)json_decode($curator->application->data))['mobile_number']  }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection