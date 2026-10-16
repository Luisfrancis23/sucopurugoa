<?= view('layout/admin_header', ['title' => 'Aumenta RT']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Aumenta RT']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-plus-circle me-2"></i>Aumenta RT</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-users me-1"></i>Formuláriu RT Foun
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/rts/store') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Númeru RT <span class="text-danger">*</span></label>
                                    <input type="text" name="number" class="form-control" value="<?= old('number') ?>" placeholder="Ex: RT 01" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Naran Xefe RT</label>
                                    <input type="text" name="chief_name" class="form-control" value="<?= old('chief_name') ?>" placeholder="Naran xefe RT">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Aldeia <span class="text-danger">*</span></label>
                                    <select name="aldeia_id" class="form-select" required>
                                        <option value="">--- Hili Aldeia ---</option>
                                        <?php foreach ($aldeias as $a): ?>
                                        <option value="<?= $a['id'] ?>" <?= old('aldeia_id') == $a['id'] ? 'selected' : '' ?>><?= esc($a['name']) ?></option>
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
                                <i class="fas fa-save me-1"></i>Salva RT
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
