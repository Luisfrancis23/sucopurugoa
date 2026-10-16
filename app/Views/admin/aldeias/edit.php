<?= view('layout/admin_header', ['title' => 'Edita Aldeia']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Edita Aldeia']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-edit me-2"></i>Edita Aldeia</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-map-marker-alt me-1"></i>Formuláriu Edita Aldeia: <?= esc($aldeia['name']) ?>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/aldeias/update/' . $aldeia['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Kódigu Aldeia <span class="text-danger">*</span></label>
                                    <input type="text" name="code" class="form-control" value="<?= old('code', $aldeia['code']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Naran Aldeia <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="<?= old('name', $aldeia['name']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Naran Xefe Aldeia</label>
                                    <input type="text" name="chief_name" class="form-control" value="<?= old('chief_name', $aldeia['chief_name']) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="text-end border-top pt-3 mt-3">
                            <a href="<?= base_url('admin/aldeias') ?>" class="btn btn-secondary me-2">
                                <i class="fas fa-times me-1"></i>Kansela
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i>Atualiza Aldeia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
