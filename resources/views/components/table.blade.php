<div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead>
            <tr class="text-white font-bold text-base">
                @foreach ($columns as $column)
                    <th class="bg-green">{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
