<?= view('layout/admin_header', ['title' => 'Konfigurasaun Sistema']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Konfigurasaun Sistema']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-cog me-2"></i>Konfigurasaun Sistema</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-wrench me-1"></i>Konfigurasaun Sistema
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/settings/system') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Naran Sistema</label>
                                    <input type="text" name="system_name" class="form-control" value="<?= old('system_name', $system_name) ?>">
                                    <small class="text-muted">Naran ne'ebé hatudu iha pájina login no título</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Logo Sistema</label>
                                    <input type="file" name="system_logo" class="form-control image-input" data-preview="logoPreview" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-label">Preview Logo</label>
                                <div class="border rounded p-3 bg-light">
                                    <?php if ($system_logo): ?>
                                    <img id="logoPreview" src="<?= base_url('uploads/logos/' . $system_logo) ?>" class="img-fluid" style="max-height:120px;">
                                    <?php else: ?>
                                    <img id="logoPreview" class="img-fluid" style="display:none;max-height:120px;">
                                    <i class="fas fa-image fa-4x text-muted"></i>
                                    <p class="text-muted small mt-2">Logo atual</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-end border-top pt-3 mt-3">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i>Salva Konfigurasaun
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
