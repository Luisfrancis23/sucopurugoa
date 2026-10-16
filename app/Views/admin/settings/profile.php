<?= view('layout/admin_header', ['title' => 'Profíl Admin']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Profíl Admin']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-user-cog me-2"></i>Profíl Admin</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="position-relative d-inline-block">
                                <img src="<?= base_url('uploads/photos/' . ($admin['photo'] ?: 'default.png')) ?>"
                                     class="profile-user-img mb-3" id="photoPreview"
                                     style="width:130px;height:130px;border:4px solid #4e73df;padding:3px;">
                                <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2 border border-2 border-white"></span>
                            </div>
                            <h4 class="fw-bold"><?= esc($admin['username']) ?></h4>
                            <p class="text-muted"><i class="fas fa-shield-alt me-1"></i>Administrador Sistema</p>
                            <hr>
                            <div class="text-start small">
                                <p class="mb-1"><i class="fas fa-calendar me-2 text-primary"></i>Membru desde: <?= format_date($admin['created_at'] ?? date('Y-m-d')) ?></p>
                                <p class="mb-0"><i class="fas fa-clock me-2 text-success"></i>Update: <?= format_date($admin['updated_at'] ?? date('Y-m-d')) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-edit me-1"></i>Edita Profíl Admin
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/settings/profile') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?= old('username', $admin['username']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password Foun</label>
                                    <input type="password" name="password" class="form-control" placeholder="Hakerek password foun (se hakarak troka)">
                                    <small class="text-muted">Husik mamuk se la hakarak troka password</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Konfirmasaun Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Konfirma password foun">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto Profíl</label>
                                    <input type="file" name="photo" class="form-control image-input" data-preview="photoPreview" accept="image/*">
                                </div>
                                <div class="text-end border-top pt-3">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save me-1"></i>Atualiza Profíl
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
