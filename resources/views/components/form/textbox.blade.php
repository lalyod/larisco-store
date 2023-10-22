<div class="mb-3 w-full">
    <label class="label" for="{{ $attributes['name'] . '-id' }}">{{ $label }}</label>
    <input id="{{ $attributes['name'] . '-id' }}" {{ $attributes->merge(['class' => 'input input-bordered w-full']) }} />
</div>
