@extends('layouts.panel')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title"><i>{{ trans('panel.chat.title') }}</i></h4>
                        <p class="card-category">{{ trans('panel.chat.text') }}</p>
                    </div>
                    <div class="card-body">
                        <div id="chat" style="overflow-y:scroll; height:400px;"></div>
                        <hr>
                        <textarea class="form-control" rows="5" name="message" id="textarea" cols="50"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        let countLocal = 0;
        jQuery("#textarea").keyup(function (e) {
            if (e.keyCode == 13) {
                SendMessage();
                $("#textarea").val('');
            }
        });
        function SendMessage() {
            $.ajax({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                },
                url: "{{ route('panel.chat.send') }}",
                type: 'POST',
                cache: false,
                data: $("#textarea").serialize(),
            })
        }
        function GetMessages() {
            $.ajax({
                headers: {
                    'X-CSRF-Token': "{{ csrf_token() }}"
                },
                url: "{{ route('panel.chat.json') }}",
                type: 'GET',
                cache: false,
                success: function (json) {
                  //  $('div#chat').text(jQuery.parseJSON(JSON.stringify(json)))
                    var div = '';
                    for(var k in json) {
                        div = div + `<span style="font-weight: ${json[k].color}">[${json[k].time}] ${json[k].author}</span>: ${json[k].message}<br>`;
                    }
                    $("#chat").html(div);
                }
            })
        }
        setInterval(() =>
                $.ajax({
                    headers: {
                        'X-CSRF-Token': "{{ csrf_token() }}"
                    },
                    url: "{{ route('panel.chat.countMessages') }}",
                    type: 'GET',
                    cache: false,
                    success: function (count) {
                        if (count !== countLocal)
                        {
                            countLocal = count;
                            GetMessages();
                        }
                    }
                })
            , 500);
    </script>
@endpush