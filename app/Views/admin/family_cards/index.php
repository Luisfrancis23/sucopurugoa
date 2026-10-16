<?= view('layout/admin_header', ['title' => 'Jestaun Uma Kain']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Jestaun Uma Kain']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-home me-2"></i>Jestaun Uma Kain</h1>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="<?= base_url('admin/family-cards/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Aumenta KK
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list me-1"></i>Lista Uma Kain
                    <span class="badge bg-primary float-end"><?= count($families) ?> KK</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th style="width:50px;">No.</th>
                                    <th>Númeru KK</th>
                                    <th>NIK</th>
                                    <th>Xefe Família</th>
                                    <th>Jéneru</th>
                                    <th>Telefone</th>
                                    <th>RT</th>
                                    <th style="width:140px;">Aksaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($families as $f): ?>
                                <tr>
                                    <td class="text-center fw-bold"><?= $no++ ?></td>
                                    <td><span class="badge bg-info"><?= esc($f['number']) ?></span></td>
                                    <td><?= esc($f['nik'] ?? '<span class="text-muted">-</span>') ?></td>
                                    <td class="fw-bold"><?= esc($f['head_name']) ?></td>
                                    <td><?= gender_label($f['gender']) ?></td>
                                    <td><?= esc($f['phone'] ?? '-') ?></td>
                                    <td><?= esc($f['rt_number'] ?? '-') ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="<?= base_url('admin/family-cards/print/' . $f['id']) ?>" class="btn btn-sm btn-info" target="_blank" title="Print">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            <a href="<?= base_url('admin/family-cards/edit/' . $f['id']) ?>" class="btn btn-sm btn-warning" title="Edita">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/family-cards/delete/' . $f['id']) ?>" class="btn btn-sm btn-danger btn-delete" title="Apaga">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
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
