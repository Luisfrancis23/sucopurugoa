<?= view('layout/admin_header', ['title' => 'Aumenta Dadus Sidadaun']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Aumenta Dadus Sidadaun']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-plus-circle me-2"></i>Aumenta Dadus Sidadaun</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-id-card me-1"></i>Formuláriu Sidadaun Foun
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/citizens/store') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIK <span class="text-danger">*</span></label>
                                    <input type="text" name="nik" class="form-control" value="<?= old('nik') ?>" placeholder="Númeru identifikasaun" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Naran Kompletu <span class="text-danger">*</span></label>
                                    <input type="text" name="full_name" class="form-control" value="<?= old('full_name') ?>" placeholder="Naran kompletu" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jéneru <span class="text-danger">*</span></label>
                                    <select name="gender" class="form-select" required>
                                        <option value="">--- Hili Jéneru ---</option>
                                        <option value="M" <?= old('gender') === 'M' ? 'selected' : '' ?>>Mane</option>
                                        <option value="F" <?= old('gender') === 'F' ? 'selected' : '' ?>>Feto</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Fatin Moris</label>
                                    <input type="text" name="birth_place" class="form-control" value="<?= old('birth_place') ?>" placeholder="Sidade ka vila moris">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Loron Moris <span class="text-danger">*</span></label>
                                    <input type="date" name="birth_date" class="form-control" value="<?= old('birth_date') ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Relijiaun</label>
                                    <select name="religion" class="form-select">
                                        <option value="">--- Hili Relijiaun ---</option>
                                        <option value="Katóliku" <?= old('religion') === 'Katóliku' ? 'selected' : '' ?>>Katóliku</option>
                                        <option value="Protestante" <?= old('religion') === 'Protestante' ? 'selected' : '' ?>>Protestante</option>
                                        <option value="Islam" <?= old('religion') === 'Islam' ? 'selected' : '' ?>>Islam</option>
                                        <option value="Hindu" <?= old('religion') === 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                                        <option value="Budista" <?= old('religion') === 'Budista' ? 'selected' : '' ?>>Budista</option>
                                        <option value="Seluk" <?= old('religion') === 'Seluk' ? 'selected' : '' ?>>Seluk</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Edukasaun</label>
                                    <select name="education" class="form-select">
                                        <option value="">--- Hili Edukasaun ---</option>
                                        <option value="La Eskola" <?= old('education') === 'La Eskola' ? 'selected' : '' ?>>La Eskola</option>
                                        <option value="SGD" <?= old('education') === 'SGD' ? 'selected' : '' ?>>SGD</option>
                                        <option value="SMU" <?= old('education') === 'SMU' ? 'selected' : '' ?>>SMU</option>
                                        <option value="SMA" <?= old('education') === 'SMA' ? 'selected' : '' ?>>SMA</option>
                                        <option value="Fakuldade" <?= old('education') === 'Fakuldade' ? 'selected' : '' ?>>Fakuldade</option>
                                        <option value="Pos Graduasaun" <?= old('education') === 'Pos Graduasaun' ? 'selected' : '' ?>>Pós Graduasaun</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Servisu / Profisaun</label>
                                    <input type="text" name="occupation" class="form-control" value="<?= old('occupation') ?>" placeholder="Ex: Agrikultór, Mestre Eskola">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Estado Sivil</label>
                                    <select name="marital_status" class="form-select">
                                        <option value="">--- Hili Estado Sivil ---</option>
                                        <option value="Solteiru" <?= old('marital_status') === 'Solteiru' ? 'selected' : '' ?>>Solteiru</option>
                                        <option value="Kaben" <?= old('marital_status') === 'Kaben' ? 'selected' : '' ?>>Kaben</option>
                                        <option value="Divorsiadu" <?= old('marital_status') === 'Divorsiadu' ? 'selected' : '' ?>>Divorsiadu</option>
                                        <option value="Falecidu" <?= old('marital_status') === 'Falecidu' ? 'selected' : '' ?>>Falecidu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" name="phone" class="form-control" value="<?= old('phone') ?>" placeholder="+670 7XXXXXXXX">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Enderesu</label>
                                    <textarea name="address" class="form-control" rows="2" placeholder="Enderesu kompletu"><?= old('address') ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Aldeia</label>
                                            <select name="aldeia_id" class="form-select">
                                                <option value="">--- Hili ---</option>
                                                <?php foreach ($aldeias as $a): ?>
                                                <option value="<?= $a['id'] ?>" <?= old('aldeia_id') == $a['id'] ? 'selected' : '' ?>><?= esc($a['name']) ?></option>
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
                                                <option value="<?= $r['id'] ?>" <?= old('rt_id') == $r['id'] ? 'selected' : '' ?>><?= esc($r['number']) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto Sidadaun</label>
                                    <input type="file" name="photo" class="form-control image-input" data-preview="photoPreview" accept="image/*">
                                    <div class="mt-2">
                                        <img id="photoPreview" class="img-preview" style="display:none;max-width:120px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end border-top pt-3 mt-3">
                            <a href="<?= base_url('admin/citizens') ?>" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-1"></i>Kansela
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i>Salva Dadus Sidadaun
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
