<?= view('layout/admin_header', ['title' => 'Edita Uma Kain']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Edita Uma Kain']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-edit me-2"></i>Edita Uma Kain</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home me-1"></i>Formuláriu Edita Uma Kain: <?= esc($family['number']) ?>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/family-cards/update/' . $family['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Númeru KK <span class="text-danger">*</span></label>
                                    <input type="text" name="number" class="form-control" value="<?= old('number', $family['number']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" name="nik" class="form-control" value="<?= old('nik', $family['nik']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Naran Xefe Família <span class="text-danger">*</span></label>
                                    <input type="text" name="head_name" class="form-control" value="<?= old('head_name', $family['head_name']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jéneru</label>
                                    <select name="gender" class="form-select" required>
                                        <option value="M" <?= ($family['gender'] ?? '') === 'M' ? 'selected' : '' ?>>Mane</option>
                                        <option value="F" <?= ($family['gender'] ?? '') === 'F' ? 'selected' : '' ?>>Feto</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Loron Moris</label>
                                    <input type="date" name="birth_date" class="form-control" value="<?= old('birth_date', $family['birth_date']) ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Enderesu</label>
                                    <textarea name="address" class="form-control" rows="2"><?= old('address', $family['address']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Aldeia</label>
                                    <select name="aldeia_id" class="form-select">
                                        <option value="">--- Hili Aldeia ---</option>
                                        <?php foreach ($aldeias as $a): ?>
                                        <option value="<?= $a['id'] ?>" <?= ($family['aldeia_id'] ?? '') == $a['id'] ? 'selected' : '' ?>><?= esc($a['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">RT</label>
                                    <select name="rt_id" class="form-select">
                                        <option value="">--- Hili RT ---</option>
                                        <?php foreach ($rts as $r): ?>
                                        <option value="<?= $r['id'] ?>" <?= ($family['rt_id'] ?? '') == $r['id'] ? 'selected' : '' ?>><?= esc($r['number']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" name="phone" class="form-control" value="<?= old('phone', $family['phone']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto</label>
                                    <input type="file" name="photo" class="form-control image-input" data-preview="photoPreview" accept="image/*">
                                    <div class="mt-2">
                                        <?php if ($family['photo']): ?>
                                        <img id="photoPreview" src="<?= base_url('uploads/photos/' . $family['photo']) ?>" class="img-preview" style="max-width:120px;">
                                        <?php else: ?>
                                        <img id="photoPreview" class="img-preview" style="display:none;max-width:120px;">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end border-top pt-3 mt-3">
                            <a href="<?= base_url('admin/family-cards') ?>" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-1"></i>Kansela
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i>Atualiza Uma Kain
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
