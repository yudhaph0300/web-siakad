<div class="sidebar">
    <div class="sidebar-header">
        <div class="app-icon">
            <h5>MTs Riyadlatul Fallah</h5>
        </div>
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-list-item {{ $title === 'dashboard' ? 'active' : '' }}">
            <a href="/admin/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::check() && Auth::user()->role == 'admin')
            {{-- Data Master --}}
            <li class="sidebar-list-item {{ $title === 'data siswa' ? 'active' : '' }}">
                <a href="/admin/data-siswa">
                    <i class="bi bi-collection"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
            <li class="sidebar-list-item {{ $title === 'data guru' ? 'active' : '' }}">
                <a href="/admin/data-guru">
                    <i class="bi bi-collection"></i>
                    <span>Data Guru</span>
                </a>
            </li>

            {{-- <li class="sidebar-list-item">
                <a href="/admin/data-kelas {{ $title === 'data kelas' ? 'active' : '' }}">
                    <i class="bi bi-collection"></i>
                    <span>Data Kelas</span>
                </a>
            </li> --}}
        @endif

        @if (Auth::check() && Auth::user()->role == 'teacher')
            <li class="sidebar-list-item {{ $title === 'data penilaian' ? 'active' : '' }}">
                <a href="/teacher/data-penilaian">
                    <i class="bi bi-collection"></i>
                    <span>Data Penilaian</span>
                </a>
            </li>
        @endif


    </ul>
    <div class="account-info">
        <form id="logout-form" action="{{ route('auth-post-logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <button class="btn btn-danger w-100"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </button>
    </div>
</div>
