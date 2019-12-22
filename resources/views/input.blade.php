{{ assets("scripts.js", "anomaly.field_type.slug::js/input.js") }}

<div class="{{ ($fieldType->config('prefix') || $fieldType->config('suffix')) ? 'input-group' : '' }}">

    @if ($fieldType->config('prefix'))
        <span class="input-group-addon">
            {{ $fieldType->config('prefix') }}
        </span>
    @endif

    <py-slug-field-type  {!! html_attributes($fieldType->attributes()) !!}></py-slug-field-type>

    @if ($fieldType->config('suffix'))
        <span class="input-group-addon">
            {{ $fieldType->config('suffix') }}
        </span>
    @endif

</div>
