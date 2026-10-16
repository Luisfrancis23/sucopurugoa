<?= view('layout/admin_header', ['title' => 'Profíl Suku']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Profíl Suku']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-info-circle me-2"></i>Profíl Suku</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>Edita Informasaun Suku
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/profile-suco') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Naran Suku</label>
                                    <input type="text" name="name" class="form-control" value="<?= old('name', $profile['name'] ?? '') ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Munisípiu</label>
                                    <input type="text" name="municipality" class="form-control" value="<?= old('municipality', $profile['municipality'] ?? '') ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Postu Administrativu</label>
                                    <input type="text" name="administrative_post" class="form-control" value="<?= old('administrative_post', $profile['administrative_post'] ?? '') ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Enderesu</label>
                                    <textarea name="address" class="form-control" rows="3"><?= old('address', $profile['address'] ?? '') ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= old('email', $profile['email'] ?? '') ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" name="phone" class="form-control" value="<?= old('phone', $profile['phone'] ?? '') ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Logo Suku</label>
                                    <input type="file" name="logo" class="form-control image-input" data-preview="logoPreview" accept="image/*">
                                    <div class="mt-2 text-center">
                                        <?php if (isset($profile['logo']) && $profile['logo']): ?>
                                        <img id="logoPreview" src="<?= base_url('uploads/logos/' . $profile['logo']) ?>" class="img-preview" style="max-width:150px;">
                                        <?php else: ?>
                                        <img id="logoPreview" class="img-preview" style="display:none;max-width:150px;">
                                        <div class="text-muted small">Seleciona imajen ba logo</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto Kantór</label>
                                    <input type="file" name="photo" class="form-control image-input" data-preview="photoPreview" accept="image/*">
                                    <div class="mt-2 text-center">
                                        <?php if (isset($profile['photo']) && $profile['photo']): ?>
                                        <img id="photoPreview" src="<?= base_url('uploads/photos/' . $profile['photo']) ?>" class="img-preview" style="max-width:150px;">
                                        <?php else: ?>
                                        <img id="photoPreview" class="img-preview" style="display:none;max-width:150px;">
                                        <div class="text-muted small">Seleciona imajen ba foto kantór</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-3 border-top pt-3">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i>Salva Mudansa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
