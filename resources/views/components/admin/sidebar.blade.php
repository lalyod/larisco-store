<header style="background-color: #F2FAF1;" class="h-screen lg:w-72 w-62 nav-slide-out shadow">
    <div class="px-8 pt-10">
        <h3 class="font-bold text-2xl text-center">Admin</h3>
        <nav class="mt-10">
            <ul class="flex flex-col font-bold gap-3">
                <li>
                    <a href="{{ route('admin.index') }}" class="flex items-center gap-3">
                        <div class="{{ $title == 'dashboard' ? 'bg-green' : 'bg-white' }} p-3 rounded-lg shadow">
                            <img src="{{ asset('/img/home.svg') }}" alt=""
                                class="{{ $title == 'dashboard' ? 'filter-white' : '' }}">
                        </div>
                        <span class="{{ $title == 'dashboard' ? 'text-green' : 'text-black' }}">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3">
                        <div class="{{ $title == 'products' ? 'bg-green' : 'bg-white' }} p-3 rounded-lg shadow">
                            <img src="{{ asset('/img/package.svg') }}" alt="" class="{{ $title == 'products' ? 'filter-white' : '' }}">
                        </div>
                        <span class="{{ $title == 'products' ? 'text-green' : 'text-black' }}">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3">
                        <div class="{{ $title == 'categories' ? 'bg-green' : 'bg-white' }} p-3 rounded-lg shadow">
                            <img src="{{ asset('/img/menu.svg') }}" alt="" class="{{ $title == 'categories' ? 'filter-white' : '' }}">
                        </div>
                        <span class="{{ $title == 'categories' ? 'text-green' : 'text-black' }}">Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3">
                        <div class="{{ $title == 'orders' ? 'bg-green' : 'bg-white' }} p-3 rounded-lg shadow">
                            <img src="{{ asset('/img/shopping-bag.svg') }}" alt="" class="{{ $title == 'orders' ? 'filter-white' : '' }}">
                        </div>
                        <span class="{{ $title == 'orders' ? 'text-green' : 'text-black' }}">Pesanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3">
                        <div class="{{ $title == 'users' ? 'bg-green' : 'bg-white' }} p-3 rounded-lg shadow">
                            <img src="{{ asset('/img/user.svg') }}" alt="" class="{{ $title == 'users' ? 'filter-white' : '' }}">
                        </div>
                        <span class="{{ $title == 'users' ? 'text-green' : 'text-black' }}">Pengguna</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
