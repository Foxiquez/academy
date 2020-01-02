<div class="col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title"><i>{{ trans('panel.application.title').' '.$user->login }}</i></h4>
            </div>
            <div class="card-body">
                @if(isset($user->application))
                    {!! Form::model(json_decode($user->application->data, JSON_UNESCAPED_UNICODE), ['method'=>'PATCH', 'action'=>['Panel\ApplicationController@update', $user->application->id]]) !!}
                @else
                    {!! Form::open(['method'=>'POST', 'action'=>'Panel\ApplicationController@store']) !!}
                @endif
                <h4>Основная информация</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('sex', 'Пол:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('sex', ['M' => 'Мужской', 'F' => 'Женский'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('birth', 'Дата рождения', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('birth', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('age', 'Возраст', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('age', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('first_name', 'Имя', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('second_name', 'Второе имя', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('second_name', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('surname', 'Фамилия', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('surname', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <h4>Контактные данные.</h4>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('adress', 'Адрес проживания', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('adress', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('email', 'Адрес электронной почты', ['class' => 'bmd-label-floating']) }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('home_number', 'Домашний номер телефона', ['class' => 'bmd-label-floating']) }}
                            {{ Form::number('home_number', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('mobile_number', 'Мобильный номер телефона', ['class' => 'bmd-label-floating']) }}
                            {{ Form::number('mobile_number', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <h4>Разное.</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('race', 'Этническая группа / Раса:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('race', ['W' => 'Светлокожий', 'B' => 'Темнокожий/Афроамериканец', 'L' => 'Мексиканец /Латиноамериканец', 'I' => 'Индеец', 'A' => 'Азиат', 'F' => 'Филиппинец'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('residence', 'Гражданство / Резиденция:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('residence', ['USA' => 'Гражданин США', 'R' => 'Статус иностранца резидента, который имеет право работать и подал заявление на получение гражданства США', 'O' => 'Не один из перечисленных'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('education', 'Образование:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('education', [
                            'S' => 'Я окончил(-а) государственную американскую среднюю школу или частную школу, аккредитованную агентством, признанным Министерством образования США',
                            'GED' => 'Я получил(-а) диплом об общем образовании (GED) или эквивалент в американском институте',
                            'A' => 'Я не окончил(-а) среднюю школу США или эквивалент, но я получил(-а) 2-летную (ассоциированный) или 4-летнею (бакалавр) степень в колледже или университете, аккредитованных агентством, признанным Министерством образования США',
                            'O' => 'Ни одно из заявлений об образовании не распространяется на меня'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <h4>Медицинская информация.</h4>
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            {{ Form::label('asthma', 'Астма:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('asthma', ['Y' => 'Да', 'N' => 'Нет'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            {{ Form::label('epilepsy', 'Эпилепсия:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('epilepsy', ['Y' => 'Да', 'N' => 'Нет'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            {{ Form::label('cancer', 'Рак:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('cancer', ['Y' => 'Да', 'N' => 'Нет'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="form-group">
                            {{ Form::label('diabetes', 'Диабет:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('diabetes', ['Y' => 'Да', 'N' => 'Нет'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('blood_pressure', 'Высокое кровяное давление:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('blood_pressure', ['Y' => 'Да', 'N' => 'Нет'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('physical_delay', 'Задержка физического развития:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('physical_delay', ['Y' => 'Да', 'N' => 'Нет'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('allergy', 'Алергия:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('allergy', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('has_psychic', 'Были ли у Вас психические заболевания? Если да, то какие?', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('has_psychic', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('has_psychic_illnes', 'Находились ли вы на лечении в психологических клиниках? Если да, то по какой причине?', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('has_psychic_illnes', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('has_physical', 'Если у Вас есть задержка физического развития, то в чем она заключается?', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('has_physical', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('has_medical', 'Перечислите все лекарства по рецепту, которые Вы принимаете регулярно.', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('has_medical', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <h4>(( OOC информация ))</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('occ_name', 'Имя:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('occ_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('ooc_age', 'Возраст:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('ooc_age', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('time_zone', 'Часовой пояс:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('time_zone', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('ooc_locate', 'Место жительства:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('ooc_locate', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('this_project', 'Время игры на данном проекте и фракции:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('this_project', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('other_projects_game', 'На каких проектах играли до этого:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('other_projects_game', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('other_projects_factions', 'В каких фракциях состояли:', ['class' => 'bmd-label-floating']) }}
                            {{ Form::text('other_projects_factions', null, ['class' => 'form-control', 'required' => 'required']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('ooc_quent', 'Подробное описание вашего персонажа (10 предложений минимум):', ['class' => 'bmd-label-floating']) }}
                                {{ Form::textarea('ooc_quent', null, ['class' => 'form-control', 'rows' => 5, 'required' => 'required']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('has_ts', 'Имеется ли у Вас TeamSpeak3 и рабочий микрофон?', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('has_ts', ['Y' => 'Да', 'N' => 'Нет'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('can_ts', 'Можете ли Вы свободно общаться в TeamSpeak3?', ['class' => 'bmd-label-floating']) }}
                            {{ Form::select('can_ts', ['Y' => 'Да', 'N' => 'Нет'], null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <h4>(( OOC соглашение))</h4>
                <p>Я ознакомлен(-а) с разделом Job Opportunities. Я соглашаюсь, что если покину сообщество в течении 14 дней, то буду занесен в черный список (ЧС) сообщества без права выхода. Я соглашаюсь, что мое заявление может быть отклонено без объяснения причин. Я понимаю, что в случае слива любой информации с форумов сообщества я буду занесен в черный список. После прохождения академии я обязуюсь изучить всю информацию на форуме (включая мануал и хендбук) и соглашаюсь с тем, что могу быть уволен за несоблюдение мануала фракции.</p>
                @if(!$user->isActive())
                    {!! Form::submit('Отправить', ['class'=>'btn btn-primary']) !!}
                    @endif
                <div class="clearfix"></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>