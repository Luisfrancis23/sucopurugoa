<?= view('layout/admin_header', ['title' => 'Edita RT']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Edita RT']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-edit me-2"></i>Edita RT</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-users me-1"></i>Formuláriu Edita RT: <?= esc($rt['number']) ?>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/rts/update/' . $rt['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Númeru RT <span class="text-danger">*</span></label>
                                    <input type="text" name="number" class="form-control" value="<?= old('number', $rt['number']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Naran Xefe RT</label>
                                    <input type="text" name="chief_name" class="form-control" value="<?= old('chief_name', $rt['chief_name']) ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Aldeia <span class="text-danger">*</span></label>
                                    <select name="aldeia_id" class="form-select" required>
                                        <option value="">--- Hili Aldeia ---</option>
                                        <?php foreach ($aldeias as $a): ?>
                                        <option value="<?= $a['id'] ?>" <?= ($rt['aldeia_id'] ?? '') == $a['id'] ? 'selected' : '' ?>><?= esc($a['name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-end border-top pt-3 mt-3">
                            <a href="<?= base_url('admin/rts') ?>" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-1"></i>Kansela
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i>Atualiza RT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
