<?= view('layout/admin_header', ['title' => 'Log Aktividade']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Log Aktividade']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-history me-2"></i>Log Aktividade</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list me-1"></i>Rejistu Aktividade Sistema
                    <span class="badge bg-primary float-end"><?= count($logs) ?> rejistu</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th style="width:50px;">No.</th>
                                    <th>Username</th>
                                    <th>Tipu Aksaun</th>
                                    <th>Deskrisaun</th>
                                    <th>IP Address</th>
                                    <th>Data / Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($logs as $l): ?>
                                <tr>
                                    <td class="text-center fw-bold"><?= $no++ ?></td>
                                    <td class="fw-bold"><?= esc($l['username'] ?? 'Sistema') ?></td>
                                    <td>
                                        <?php
                                        $badge = match($l['action']) {
                                            'Login' => 'success',
                                            'Logout' => 'secondary',
                                            'Aumenta' => 'info',
                                            'Edita' => 'warning',
                                            'Apaga' => 'danger',
                                            default => 'primary'
                                        };
                                        ?>
                                        <span class="badge bg-<?= $badge ?> px-3 py-2">
                                            <?php if ($l['action'] === 'Login'): ?><i class="fas fa-sign-in-alt me-1"></i>
                                            <?php elseif ($l['action'] === 'Logout'): ?><i class="fas fa-sign-out-alt me-1"></i>
                                            <?php elseif ($l['action'] === 'Aumenta'): ?><i class="fas fa-plus me-1"></i>
                                            <?php elseif ($l['action'] === 'Edita'): ?><i class="fas fa-edit me-1"></i>
                                            <?php elseif ($l['action'] === 'Apaga'): ?><i class="fas fa-trash me-1"></i>
                                            <?php endif; ?>
                                            <?= esc($l['action']) ?>
                                        </span>
                                    </td>
                                    <td><?= esc($l['description'] ?? '-') ?></td>
                                    <td><code><?= esc($l['ip_address'] ?? '-') ?></code></td>
                                    <td>
                                        <i class="fas fa-clock me-1 text-muted"></i>
                                        <?= format_date($l['created_at'], 'dd/MM/yyyy HH:mm:ss') ?>
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
