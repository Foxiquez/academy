<script src="{{ asset('js/plugins/forms/jquery-ui.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/sweetalert.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/jquery-formbuilder/form-builder.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/jquery-formbuilder/form-render.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/parsleyjs/parsley.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/clipboard/clipboard.min.js') }}?b=ck24" defer></script>
<script src="{{ asset('js/plugins/forms/moment.js') }}"></script>
<script src="{{ asset('js/plugins/forms/footable/js/footable.min.js') }}" defer></script>
<script src="{{ asset('js/plugins/forms/script.js') }}" defer></script>
<script type="text/javascript">
    @if(isset($form->data))
        window._form_builder_content = {!! json_encode($form->data, JSON_UNESCAPED_UNICODE) !!};
    @endif
            @if(isset($answers->data))
        window._form_builder_answers = {!! json_encode($answers->data, JSON_UNESCAPED_UNICODE) !!};
        var jsonData = JSON.parse(window._form_builder_answers);
        for (const input in jsonData) {
            if (typeof jsonData[input] == 'string') document.getElementById(input).value = jsonData[input];
            else
        }
    @endif
</script>
<script src="{{ asset('js/plugins/forms/form-render.js') }}" defer></script>