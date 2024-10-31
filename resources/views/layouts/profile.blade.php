<div class="page-title-container">
    <div class="row">

        <!-- Top Buttons Start -->
        <div class="col-12 col-sm-auto d-flex align-items-start justify-content-end d-block d-lg-none">
            <button type="button" class="btn btn-icon btn-icon-start btn-outline-primary w-100 w-sm-auto"
                data-bs-toggle="dropdown">
                <i data-acorn-icon="gear"></i>
                <span>Pengaturan</span>
            </button>

            <!-- In Page Menu Start -->
            <div class="dropdown-menu dropdown-menu-end sw-25 py-3 px-4" id="settingsMoveContent"
                data-move-target="#settingsColumn" data-move-breakpoint="lg">
                <div class="mb-2">
                    <a class="nav-link px-0">
                        <i data-acorn-icon="activity" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Profil</span>
                    </a>
                    <div>
                        <a class="nav-link py-1 my-1 px-0"
                            href="{{ route('profile.edit', ['username' => $user->username]) }}">
                            <i class="me-2 sw-2 d-inline-block"></i>
                            <span class="align-middle">Pribadi</span>
                        </a>
                        <a class="nav-link py-1 my-1 px-0" href="#">
                            <i class="me-2 sw-2 d-inline-block"></i>
                            <span class="align-middle">Ubah Password</span>
                        </a>
                    </div>
                </div>
                <div class="mb-2">
                    <a class="nav-link px-0">
                        <i data-acorn-icon="inbox" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Tampilan</span>
                    </a>
                    <div>
                        <a class="nav-link py-1 my-1 px-0" href="{{ asset('profile/theme') }}">
                            <i class="me-2 sw-2 d-inline-block"></i>
                            <span class="align-middle">Warna</span>
                        </a>
                    </div>
                </div>
                <div class="mb-2">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link px-0" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                        <span class="align-middle">Keluar</span>
                    </a>
                </div>
            </div>
            <!-- In Page Menu End -->
        </div>
        <!-- Top Buttons End -->
    </div>
</div>