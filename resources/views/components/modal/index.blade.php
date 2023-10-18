<dialog id="{{ $id }}" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg pb-3">{{ $title }}</h3>
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-5 top-5">✕</button>
        </form>
        <hr>
        {{ $slot }}
    </div>
</dialog>
