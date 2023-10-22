<x-table :columns="['', 'Nama', 'Email', 'Peran', 'Aksi']">
    @forelse ($users as $key => $user)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td class="flex gap-5">
                <a href="" class="btn btn-info text-white">detail</a>
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
