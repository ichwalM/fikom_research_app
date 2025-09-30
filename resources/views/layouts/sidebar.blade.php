<div class="h-full px-3 py-4 overflow-y-auto bg-gray-800 text-white">
    <a href="{{ route('dashboard') }}" class="flex items-center ps-2.5 mb-5">
        <x-application-logo class="block h-9 w-auto fill-current text-white" />
        <span class="self-center text-xl font-semibold whitespace-nowrap ml-3">Riset Fikom</span>
    </a>
    
    <ul class="space-y-2 font-medium">
        <li>
            <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                <span class="ms-3">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('jurnals.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('jurnals.*') ? 'bg-gray-700' : '' }}">
                <span class="flex-1 ms-3 whitespace-nowrap">Jurnal</span>
            </a>
        </li>
        
        {{-- Link HANYA UNTUK ADMIN --}}
        @if (Auth::user()->role->name === 'Admin Fakultas')
        <li>
            <a href="{{ route('admin.users.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 group {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                <span class="flex-1 ms-3 whitespace-nowrap">Manajemen Pengguna</span>
            </a>
        </li>
        @endif

        {{-- Logout Link --}}
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center p-2 rounded-lg hover:bg-gray-700 group">
                    <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                </a>
            </form>
        </li>
    </ul>
</div>