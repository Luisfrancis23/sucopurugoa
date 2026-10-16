<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="border-bottom:1px solid #ddd;">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" aria-label="Toggle sidebar">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link fw-semibold">Dashboard</a>
        </li>
    </ul>

    <ul class="navbar-nav ms-auto">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="<?= base_url('uploads/photos/' . (session()->get('photo') ?: 'default.png')) ?>"
                     class="img-circle img-fluid me-1"
                     alt="Admin Photo" style="width:30px;height:30px;object-fit:cover;border-radius:50%;border:2px solid #000;">
                <span class="d-none d-md-inline fw-bold ms-1"><?= esc(session()->get('username')) ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" style="min-width:220px;">
                <div class="dropdown-header text-center border-bottom pb-2 mb-2">
                    <img src="<?= base_url('uploads/photos/' . (session()->get('photo') ?: 'default.png')) ?>"
                         class="img-fluid mb-2"
                         alt="Admin Photo" style="width:55px;height:55px;object-fit:cover;border-radius:50%;border:3px solid #000;">
                    <h6 class="mb-0 fw-bold"><?= esc(session()->get('username')) ?></h6>
                    <small class="text-muted">Administrador Sistema</small>
                </div>
                <a href="<?= base_url('admin/settings/profile') ?>" class="dropdown-item">
                    <i class="fas fa-user-cog me-2"></i>Profíl Admin
                </a>
                <a href="<?= base_url('admin/settings/system') ?>" class="dropdown-item">
                    <i class="fas fa-cog me-2"></i>Konfigurasaun Sistema
                </a>
                <a href="<?= base_url('admin/settings/backup') ?>" class="dropdown-item">
                    <i class="fas fa-database me-2"></i>Backup Database
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('logout') ?>" class="dropdown-item text-danger fw-bold">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
