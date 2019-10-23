{{ assets("scripts.js", "anomaly.field_type.slug::js/jquery.slugify.js") }}
{{ assets("scripts.js", "anomaly.field_type.slug::js/input.js") }}


<div class="{{ ($fieldType->config('prefix') || $fieldType->config('suffix')) ? 'input-group' : '' }}">

    @if ($fieldType->config('prefix'))
        <span class="input-group-addon">
            {{ $fieldType->config('prefix') }}
        </span>
    @endif

    <input
            type="text"
            value="{{ $fieldType->value }}"
            name="{{ $fieldType->input_name }}"
            data-type="{{ $fieldType->config('type') }}"
            placeholder="{{ $fieldType->placeholder }}"
            data-slugify="{{ $fieldType->config('slugify') }}"
            data-always_slugify="{{ $fieldType->config('always_slugify') }}"
            data-lowercase="{{ $fieldType->config('lowercase') }}"
            {!! html_attributes(array_merge($fieldType->attributes, [
                'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
            ])) !!}>

    @if ($fieldType->config('suffix'))    
        <span class="input-group-addon">
            {{ $fieldType->config('suffix') }}
        </span>
    @endif

</div>
