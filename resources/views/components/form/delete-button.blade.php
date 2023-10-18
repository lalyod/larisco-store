<form {{ $attributes }} method="POST">
    @method("DELETE")
    @csrf
    <button class="btn btn-error font-bold text-white">{{ $text }}</button>
</form>
