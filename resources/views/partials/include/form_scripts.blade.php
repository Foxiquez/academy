<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">

</script>
<script src="{{ asset('js/plugins/forms/jquery-ui.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/sweetalert.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/jquery-formbuilder/form-builder.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/jquery-formbuilder/form-render.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/parsleyjs/parsley.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/clipboard/clipboard.min.js') }}?b=ck24" defer></script>
<script src="{{ asset('js/plugins/forms/moment.js') }}"></script>
<script src="{{ asset('js/plugins/forms/footable/js/footable.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/script.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/jquery-json-form-binding.min.js') }}" defer></script>
<script type="text/javascript">
    @if(isset($form->data))
        window._form_builder_content = {!! json_encode($form->data, JSON_UNESCAPED_UNICODE) !!};
    @endif
            @if(isset($answers->data))
        $("#fb-render").BindJson({!! $answers->data !!});
    var data = Bind({
        me: {
            fav: 'one',
            ts: ['one', 'two'],
            name: "@rem",
            score: 10,
            location: {
                city: 'Brighton',
                country: 'England'
            },
        },
    }, {
        'me.fav': 'input[name="favtoystorys"]',
        'me.ts': 'input[name="toystorys"]',
        'me.score': '.score',
        'me.name': '.name',
        'me.location.city': '#location'
    });


    console.clear();
    @endif
</script>
<script src="{{ asset('js/plugins/forms/form-render.js') }}" defer></script>