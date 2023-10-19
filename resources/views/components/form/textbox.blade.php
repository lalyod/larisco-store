<div class="mb-3 w-full">
    <label class="label" for="{{ $attributes['name'] }}">{{ $label }}</label>
    <input id="{{ $attributes['name'] }}" {{ $attributes->merge(['class' => 'input input-bordered w-full']) }} />
</div>
