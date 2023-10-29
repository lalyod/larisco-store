<div class="flex flex-col gap-10 fixed z-20 lg:right-10 top-5">
    @foreach ($errors->all() as $key => $error)
        <div class="alert max-sm:flex items-center max-sm:gap-5 alert-error slide-in w-fit" id="alert-error-{{ $key }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" style="color: white"
                fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-white text-left">{{ $error }}</span>
            <button class="btn btn-ghost text-lg text-white"
                onclick="buttonHideAlertError({{ $key }})">×</button>
        </div>
    @endforeach
</div>
