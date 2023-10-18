@foreach ($categories as $category)
    <form ction="{{ route('home') }}" method="GET">
        <button class="flex flex-col items-center major-carousel gap-2" name="category" value="{{ $category->name }}">
            <img src="{{ Storage::url('public/categories/' . $category->image) }}" alt=""
                class="w-16 h-16 p-3 shadow-lg rounded-lg object-contain">
            <span class="font-bold text-center">{{ $category->name }}</span>
        </button>
    </form>
@endforeach
