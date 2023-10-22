<form action="{{ $link }}" method="GET" class="flex gap-2 max-sm:mt-5">
    <input {{ $attributes }} class="input input-bordered w-full max-w-lg" />
    <button class="btn btn-neutral">
        <img src="{{ asset('/img/search.svg') }}" alt="" class="filter-white">
    </button>
</form>