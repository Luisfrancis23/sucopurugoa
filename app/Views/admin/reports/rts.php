<?= view('layout/admin_header', ['title' => 'Relatóriu RT']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Relatóriu RT']) ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1 class="m-0"><i class="fas fa-sitemap me-2"></i>Relatóriu RT</h1></div>
                <div class="col-sm-6 text-end"><a href="<?= base_url('admin/reports') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i>Fali</a></div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header"><i class="fas fa-list me-1"></i>Dadus RT <span class="badge bg-info float-end"><?= count($rts) ?> RT</span></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable">
                            <thead><tr><th>No.</th><th>Númeru RT</th><th>Xefe RT</th><th>Aldeia</th></tr></thead>
                            <tbody>
                                <?php $no = 1; foreach ($rts as $r): ?>
                                <tr><td class="text-center fw-bold"><?= $no++ ?></td><td><span class="badge bg-success"><?= esc($r['number']) ?></span></td><td class="fw-bold"><?= esc($r['chief_name'] ?? '-') ?></td><td><?= esc($r['aldeia_name']) ?></td></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= view('layout/admin_footer') ?>
