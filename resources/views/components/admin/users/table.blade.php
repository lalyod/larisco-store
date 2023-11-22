<x-table :columns="['', 'Profil', 'Nama', 'Email', 'Peran', 'Aksi']">
    @forelse ($users as $key => $user)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>
                <img src="{{ Storage::url('public/users/' . $user->image) }}" alt="{{ $user->image }}"
                    class="w-12 h-12 object-cover rounded-lg">
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td class="flex gap-5">
                <x-form.delete-button text="DELETE" />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100%" class="text-center">
                Data tidak ditemukan
            </td>
        </tr>
    @endforelse
</x-table>
