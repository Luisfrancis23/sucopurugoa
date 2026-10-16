<?= view('layout/admin_header', ['title' => 'Peskiza Dadus']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Peskiza Dadus']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-search me-2"></i>Peskiza Dadus</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-filter me-1"></i>Kriteria Peskiza
                </div>
                <div class="card-body">
                    <form method="get" action="<?= base_url('admin/search') ?>">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label">Tipu Peskiza</label>
                                <select name="type" class="form-select" required>
                                    <option value="">--- Hili Tipu ---</option>
                                    <option value="nik" <?= ($type ?? '') === 'nik' ? 'selected' : '' ?>>NIK</option>
                                    <option value="name" <?= ($type ?? '') === 'name' ? 'selected' : '' ?>>Naran</option>
                                    <option value="kk" <?= ($type ?? '') === 'kk' ? 'selected' : '' ?>>Númeru KK</option>
                                    <option value="phone" <?= ($type ?? '') === 'phone' ? 'selected' : '' ?>>Telefone</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Palavra Xave</label>
                                <input type="text" name="keyword" class="form-control" placeholder="Hakerek palavra xave..."
                                       value="<?= esc($keyword ?? '') ?>" required autofocus>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search me-1"></i>Peskiza
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php if ($keyword): ?>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list me-1"></i>Resultadu Peskiza: "<?= esc($keyword) ?>"
                    <span class="badge bg-info float-end"><?= count($results) ?> resultadu</span>
                </div>
                <div class="card-body">
                    <?php if (count($results) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th style="width:50px;">No.</th>
                                    <th>NIK / Númeru KK</th>
                                    <th>Naran</th>
                                    <th>Jéneru</th>
                                    <th>Telefone</th>
                                    <th>Aldeia</th>
                                    <th>RT</th>
                                    <th style="width:80px;">Aksaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($results as $r): ?>
                                <tr>
                                    <td class="text-center fw-bold"><?= $no++ ?></td>
                                    <td><span class="badge bg-info"><?= esc($r['nik'] ?? $r['number'] ?? '-') ?></span></td>
                                    <td class="fw-bold"><?= esc($r['full_name'] ?? $r['head_name'] ?? '-') ?></td>
                                    <td><?= isset($r['gender']) ? gender_label($r['gender']) : '-' ?></td>
                                    <td><?= esc($r['phone'] ?? '-') ?></td>
                                    <td><?= esc($r['aldeia_name'] ?? '-') ?></td>
                                    <td><?= esc($r['rt_number'] ?? '-') ?></td>
                                    <td class="text-center">
                                        <?php if (isset($r['nik'])): ?>
                                        <a href="<?= base_url('admin/citizens/edit/' . $r['id']) ?>" class="btn btn-sm btn-warning" title="Edita"><i class="fas fa-edit"></i></a>
                                        <?php else: ?>
                                        <a href="<?= base_url('admin/family-cards/edit/' . $r['id']) ?>" class="btn btn-sm btn-warning" title="Edita"><i class="fas fa-edit"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="text-center py-5">
                        <i class="fas fa-search fa-4x text-muted mb-3"></i>
                        <h5 class="text-muted">Dadus la hetan</h5>
                        <p>Dadus ho palavra xave "<?= esc($keyword) ?>" la iha sistema.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
