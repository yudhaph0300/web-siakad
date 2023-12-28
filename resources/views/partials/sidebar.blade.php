<div class="sidebar">
    <div class="sidebar-header">
        <div class="app-icon">
            <h5>MTs Riyadlatul Fallah</h5>
        </div>
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-list-item active">
            <a href="#">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="sidebar-list-item">
            <a href="#">
                <i class="bi bi-people"></i>
                <span>Data User</span>
            </a>
        </li>

        @if (Auth::check() && Auth::user()->role == 'admin')
            {{-- Data Master --}}
            <li class="sidebar-list-item">
                <a href="#">
                    <i class="bi bi-collection"></i>
                    <span>Data Siswa</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="#">
                    <i class="bi bi-collection"></i>
                    <span>Data Guru</span>
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="#">
                    <i class="bi bi-collection"></i>
                    <span>Data Kelas</span>
                </a>
            </li>
        @endif


    </ul>
    <div class="account-info">
        <form id="logout-form" action="{{ route('admin-post-logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <button class="btn btn-danger w-100"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </button>
    </div>
</div>
