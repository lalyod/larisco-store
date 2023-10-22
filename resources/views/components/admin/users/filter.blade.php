<div class="mt-10">
    <form action="{{ route('admin.users.index') }}" method="GET" class="flex gap-5">
        <button type="submit" name="role" class="btn btn-info text-white" value="admin">Admin</button>
        <button type="submit" name="role" class="btn btn-info text-white" value="customer">Pembeli</button>
    </form>
</div>
