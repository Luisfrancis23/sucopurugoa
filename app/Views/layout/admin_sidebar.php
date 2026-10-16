<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('admin/dashboard') ?>" class="brand-link d-flex align-items-center justify-content-center">
        <span class="brand-text fw-bold">Suku Purugoa</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 text-center border-bottom border-white border-opacity-10 px-3">
            <span class="d-block text-white fw-bold"><?= esc(session()->get('username')) ?></span>
            <small class="text-white-50">Online</small>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $title === 'Dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/profile-suco') ?>" class="nav-link <?= $title === 'Profíl Suku' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>Profíl Suku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/aldeias') ?>" class="nav-link <?= in_array($title, ['Jestaun Aldeia', 'Aumenta Aldeia', 'Edita Aldeia']) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>Aldeia</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/family-cards') ?>" class="nav-link <?= in_array($title, ['Jestaun Uma Kain', 'Aumenta Uma Kain', 'Edita Uma Kain']) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Uma Kain (KK)</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/citizens') ?>" class="nav-link <?= in_array($title, ['Jestaun Dadus Sidadaun', 'Aumenta Dadus Sidadaun', 'Edita Dadus Sidadaun']) ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>Sidadaun</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/settings/profile') ?>" class="nav-link <?= $title === 'Profíl Admin' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Profíl Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/settings/system') ?>" class="nav-link <?= $title === 'Konfigurasaun Sistema' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Sistema</p>
                    </a>
                </li>
                <li class="nav-item mt-3 pt-3 border-top border-white border-opacity-10">
                    <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
