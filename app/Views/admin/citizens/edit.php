<?= view('layout/admin_header', ['title' => 'Edita Dadus Sidadaun']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Edita Dadus Sidadaun']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-edit me-2"></i>Edita Dadus Sidadaun</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-id-card me-1"></i>Formuláriu Edita: <?= esc($citizen['full_name']) ?>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/citizens/update/' . $citizen['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIK <span class="text-danger">*</span></label>
                                    <input type="text" name="nik" class="form-control" value="<?= old('nik', $citizen['nik']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Naran Kompletu <span class="text-danger">*</span></label>
                                    <input type="text" name="full_name" class="form-control" value="<?= old('full_name', $citizen['full_name']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jéneru</label>
                                    <select name="gender" class="form-select" required>
                                        <option value="M" <?= ($citizen['gender'] ?? '') === 'M' ? 'selected' : '' ?>>Mane</option>
                                        <option value="F" <?= ($citizen['gender'] ?? '') === 'F' ? 'selected' : '' ?>>Feto</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fatin Moris</label>
                                    <input type="text" name="birth_place" class="form-control" value="<?= old('birth_place', $citizen['birth_place']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Loron Moris <span class="text-danger">*</span></label>
                                    <input type="date" name="birth_date" class="form-control" value="<?= old('birth_date', $citizen['birth_date']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Relijiaun</label>
                                    <select name="religion" class="form-select">
                                        <option value="">--- Hili Relijiaun ---</option>
                                        <option value="Katóliku" <?= ($citizen['religion'] ?? '') === 'Katóliku' ? 'selected' : '' ?>>Katóliku</option>
                                        <option value="Protestante" <?= ($citizen['religion'] ?? '') === 'Protestante' ? 'selected' : '' ?>>Protestante</option>
                                        <option value="Islam" <?= ($citizen['religion'] ?? '') === 'Islam' ? 'selected' : '' ?>>Islam</option>
                                        <option value="Hindu" <?= ($citizen['religion'] ?? '') === 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                        <option value="Budista" <?= ($citizen['religion'] ?? '') === 'Budista' ? 'selected' : '' ?>>Budista</option>
                                        <option value="Seluk" <?= ($citizen['religion'] ?? '') === 'Seluk' ? 'selected' : '' ?>>Seluk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Edukasaun</label>
                                    <select name="education" class="form-select">
                                        <option value="">--- Hili Edukasaun ---</option>
                                        <option value="La Eskola" <?= ($citizen['education'] ?? '') === 'La Eskola' ? 'selected' : '' ?>>La Eskola</option>
                                        <option value="SGD" <?= ($citizen['education'] ?? '') === 'SGD' ? 'selected' : '' ?>>SGD</option>
                                        <option value="SMU" <?= ($citizen['education'] ?? '') === 'SMU' ? 'selected' : '' ?>>SMU</option>
                                        <option value="SMA" <?= ($citizen['education'] ?? '') === 'SMA' ? 'selected' : '' ?>>SMA</option>
                                        <option value="Fakuldade" <?= ($citizen['education'] ?? '') === 'Fakuldade' ? 'selected' : '' ?>>Fakuldade</option>
                                        <option value="Pos Graduasaun" <?= ($citizen['education'] ?? '') === 'Pos Graduasaun' ? 'selected' : '' ?>>Pós Graduasaun</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Servisu / Profisaun</label>
                                    <input type="text" name="occupation" class="form-control" value="<?= old('occupation', $citizen['occupation']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Estado Sivil</label>
                                    <select name="marital_status" class="form-select">
                                        <option value="">--- Hili ---</option>
                                        <option value="Solteiru" <?= ($citizen['marital_status'] ?? '') === 'Solteiru' ? 'selected' : '' ?>>Solteiru</option>
                                        <option value="Kaben" <?= ($citizen['marital_status'] ?? '') === 'Kaben' ? 'selected' : '' ?>>Kaben</option>
                                        <option value="Divorsiadu" <?= ($citizen['marital_status'] ?? '') === 'Divorsiadu' ? 'selected' : '' ?>>Divorsiadu</option>
                                        <option value="Falecidu" <?= ($citizen['marital_status'] ?? '') === 'Falecidu' ? 'selected' : '' ?>>Falecidu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" name="phone" class="form-control" value="<?= old('phone', $citizen['phone']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Enderesu</label>
                                    <textarea name="address" class="form-control" rows="2"><?= old('address', $citizen['address']) ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Aldeia</label>
                                            <select name="aldeia_id" class="form-select">
                                                <option value="">--- Hili ---</option>
                                                <?php foreach ($aldeias as $a): ?>
                                                <option value="<?= $a['id'] ?>" <?= ($citizen['aldeia_id'] ?? '') == $a['id'] ? 'selected' : '' ?>><?= esc($a['name']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">RT</label>
                                            <select name="rt_id" class="form-select">
                                                <option value="">--- Hili ---</option>
                                                <?php foreach ($rts as $r): ?>
                                                <option value="<?= $r['id'] ?>" <?= ($citizen['rt_id'] ?? '') == $r['id'] ? 'selected' : '' ?>><?= esc($r['number']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto</label>
                                    <input type="file" name="photo" class="form-control image-input" data-preview="photoPreview" accept="image/*">
                                    <div class="mt-2">
                                        <?php if ($citizen['photo']): ?>
                                        <img id="photoPreview" src="<?= base_url('uploads/photos/' . $citizen['photo']) ?>" class="img-preview" style="max-width:120px;">
                                        <?php else: ?>
                                        <img id="photoPreview" class="img-preview" style="display:none;max-width:120px;">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end border-top pt-3 mt-3">
                            <a href="<?= base_url('admin/citizens') ?>" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-1"></i>Kansela
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i>Atualiza Dadus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
