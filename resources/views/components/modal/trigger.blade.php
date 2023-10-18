<button {{ $attributes->merge(['class' => 'btn']) }}
    onclick="{{ $modal }}.showModal()">{{ $text }}</button>
