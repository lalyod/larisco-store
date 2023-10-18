<div class="mb-3 w-full">
    <label class="label">
        {{ $label }}
    </label>
    <select class="select select-bordered w-full" {{ $attributes }}>
        {{ $slot }}
    </select>
</div>
