<?= view('layout/admin_header', ['title' => 'Jestaun RT']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Jestaun RT']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-users me-2"></i>Jestaun RT</h1>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="<?= base_url('admin/rts/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Aumenta RT
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list me-1"></i>Lista RT
                    <span class="badge bg-primary float-end"><?= count($rts) ?> RT</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th style="width:50px;">No.</th>
                                    <th>Númeru RT</th>
                                    <th>Xefe RT</th>
                                    <th>Aldeia</th>
                                    <th style="width:120px;">Aksaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($rts as $r): ?>
                                <tr>
                                    <td class="text-center fw-bold"><?= $no++ ?></td>
                                    <td><span class="badge bg-success"><?= esc($r['number']) ?></span></td>
                                    <td class="fw-bold"><?= esc($r['chief_name'] ?? '-') ?></td>
                                    <td><?= esc($r['aldeia_name']) ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="<?= base_url('admin/rts/edit/' . $r['id']) ?>" class="btn btn-sm btn-warning" title="Edita">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/rts/delete/' . $r['id']) ?>" class="btn btn-sm btn-danger btn-delete" title="Apaga">
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
