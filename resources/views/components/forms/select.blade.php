@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '',
    'error' => false,
    'class' => '',
    'labelClass' => '',
    'options' => [],
    'optionKey' => 'id',
    'optionValue' => 'name',
    'value' => '',
])

            @if ($label)
                            <label for="{{ $name }}"
                                {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 mb-1 ' . $labelClass]) }}>
                                {{ $label }}
                </label>
            @endif

<select id="{{ $name }}" placeholder="{{ $placeholder }}" name="{{ $name }}"
    {{ $attributes->merge(['class' => 'w-full px-4 py-2 rounded-lg text-gray-700 bg-gray-50 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent']) }}>
    @foreach ($options as $option)
        <option value="{{ $option->{$optionKey} }}" @selected($value == $option->{$optionKey})>
            {{ $option->{$optionValue} }}</option>
    @endforeach
</select>

@error($name)
    <span class="text-red-500">{{ $message }}</span>
@enderror
