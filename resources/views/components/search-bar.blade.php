<form action="{{ $link }}" method="GET" class="flex gap-2">
    <input {{ $attributes }} class="input input-bordered w-full max-w-md" />
    <button class="btn btn-neutral">
        <img src="{{ asset('/img/search.svg') }}" alt="" class="filter-white">
    </button>
</form>
