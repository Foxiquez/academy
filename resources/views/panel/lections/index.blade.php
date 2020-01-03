@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h3 class="card-title">{{ trans('panel.lections.title') }}</h3>
                <p class="card-category">
                    {{ trans('panel.lections.info') }}
                </p>
            </div>
            <div class="card-body">
                @if(count($lections::where('is_active', 1)->get()) == 0)
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <h4 class="card-title">
                            {{ trans('panel.lections.no_lections') }}
                        </h4>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="">
                                <th>
                                    #
                                </th>
                                <th>
                                    Название
                                </th>
                                <th>
                                    Автор
                                </th>
                                <th>
                                    Время публикации
                                </th>
                                <th>
                                    Время изменения
                                </th>
                                <th>
                                    Действие
                                </th>
                            </thead>
                            <tbody>
                                @foreach($lections::get() as $lection)
                                    @if($lection->is_active == true)
                                        <tr>
                                            <td>
                                                {{ $lection->id }}
                                            </td>
                                            <td>
                                                {{ $lection->title }}
                                            </td>
                                            <td>
                                                {{ $lection->author }}
                                            </td>
                                            <td>
                                                {{ $lection->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                {{ $lection->updated_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{route('panel.lections.show', $lection->id)}}" target="_blank">{{ __('Читать') }}</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection