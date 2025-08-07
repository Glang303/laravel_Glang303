<aside class="sidebar d-flex flex-column">
    <div class="logo-container">
        <i class="fas fa-notes-medical fs-3 me-3"></i>
        <h1 class="fs-4 fw-bold mb-0">MEDICAL</h1>
    </div>
    <nav class="flex-grow-1 px-3 py-4 overflow-auto">
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line me-3"></i>
                    <span class="fw-medium">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('rumahsakit.index') }}" class="nav-link d-flex align-items-center {{ Request::routeIs('rumahsakit.*') ? 'active' : '' }}">
                    <i class="fas fa-hospital-alt me-3"></i>
                    <span class="fw-medium">Data Rumah Sakit</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('pasien.index') }}" class="nav-link d-flex align-items-center {{ Request::routeIs('pasien.*') ? 'active' : '' }}">
                    <i class="fas fa-procedures me-3"></i>
                    <span class="fw-medium">Data Pasien</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="p-3 border-top profile-container">
        <div class="d-flex align-items-center">
            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="fas fa-user-circle fs-5 text-secondary"></i>
            </div>
            <div class="ms-3">
                <p class="fw-semibold mb-0 text-dark">{{ auth()->user()->name ?? 'User' }}</p>
            </div>
        </div>

        <div id="profile-dropdown" class="profile-dropdown p-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-100 btn btn-danger d-flex align-items-center justify-content-center">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
