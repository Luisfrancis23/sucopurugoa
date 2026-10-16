<?= view('layout/admin_header', ['title' => 'Backup Database']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Backup Database']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-database me-2"></i>Backup &amp; Restore</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-download me-1"></i>Backup Database
                        </div>
                        <div class="card-body text-center py-5">
                            <i class="fas fa-database fa-5x text-success mb-4"></i>
                            <h5>Kria Backup Database</h5>
                            <p class="text-muted">Kria ficheiru SQL ida husi database sistema tomak. Prosesu foti segundos balun.</p>
                            <a href="<?= base_url('admin/settings/backup/do') ?>" class="btn btn-success btn-lg px-5" id="backupBtn"
                               onclick="event.preventDefault(); confirmAction('Ita boot nia serteza atu halo backup database agora?', function() { document.getElementById('backupBtn').innerHTML = '<span class=\"spinner-border spinner-border-sm me-2\"></span>Prosesa...'; setTimeout(function() { window.location.href = '<?= base_url('admin/settings/backup/do') ?>'; }, 300); });">
                                <i class="fas fa-database me-2"></i>Kria Backup Agora
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-warning">
                            <i class="fas fa-upload me-1"></i>Restore Database
                        </div>
                        <div class="card-body text-center py-5">
                            <i class="fas fa-undo-alt fa-5x text-warning mb-4"></i>
                            <h5>Restore Database</h5>
                            <p class="text-muted">Restore database husi ficheiru backup ne'ebé ita boot hili.</p>
                            <form action="<?= base_url('admin/settings/backup/restore') ?>" method="post" id="restoreForm">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <select name="backup_file" class="form-select" required>
                                        <option value="">--- Hili ficheiru backup ---</option>
                                        <?php
                                        $backupDir = ROOTPATH . 'uploads/backup/';
                                        if (is_dir($backupDir)) {
                                            $files = scandir($backupDir);
                                            foreach ($files as $file) {
                                                if (pathinfo($file, PATHINFO_EXTENSION) === 'sql') {
                                                    echo '<option value="' . esc($file) . '">' . esc($file) . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning px-5 restore-btn"
                                        onclick="event.preventDefault(); Swal.fire({ title: 'ATENSAUN!', text: 'Ita boot nia serteza atu restore database? Dadus atual sei lakon no troka ho dadus husi backup.', icon: 'warning', showCancelButton: true, confirmButtonColor: '#e74a3b', cancelButtonColor: '#858796', confirmButtonText: 'Sim, Restore!', cancelButtonText: 'Kansela', reverseButtons: true }).then(function(r) { if (r.isConfirmed) { var btn = document.querySelector('.restore-btn'); btn.innerHTML = '<span class=\"spinner-border spinner-border-sm me-2\"></span>Prosesa...'; btn.disabled = true; document.getElementById('restoreForm').submit(); } });">
                                    <i class="fas fa-upload me-2"></i>Restore Database
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-history me-1"></i>Lista Backup Disponivel
                    <span class="badge bg-info float-end">
                        <?php
                        $count = 0;
                        $backupDir = ROOTPATH . 'uploads/backup/';
                        if (is_dir($backupDir)) {
                            $files = scandir($backupDir);
                            foreach ($files as $file) {
                                if (pathinfo($file, PATHINFO_EXTENSION) === 'sql') $count++;
                            }
                        }
                        echo "$count Backup";
                        ?>
                    </span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th style="width:50px;">No.</th>
                                    <th>Naran Ficheiru</th>
                                    <th>Tamanhu</th>
                                    <th>Data Kria</th>
                                    <th style="width:100px;">Aksaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (is_dir($backupDir)) {
                                    $files = scandir($backupDir);
                                    rsort($files);
                                    foreach ($files as $file) {
                                        if (pathinfo($file, PATHINFO_EXTENSION) === 'sql') {
                                            $filePath = $backupDir . $file;
                                            $size = filesize($filePath);
                                            $date = date('Y-m-d H:i:s', filemtime($filePath));
                                            echo '<tr>';
                                            echo '<td class="text-center fw-bold">' . $no++ . '</td>';
                                            echo '<td class="fw-bold"><i class="fas fa-file-code me-2 text-success"></i>' . esc($file) . '</td>';
                                            echo '<td>' . number_format($size / 1024, 2) . ' KB</td>';
                                            echo '<td><i class="fas fa-clock me-1 text-muted"></i>' . $date . '</td>';
                                            echo '<td class="text-center"><a href="' . base_url('admin/settings/backup/download/' . rawurlencode($file)) . '" class="btn btn-sm btn-info" title="Download"><i class="fas fa-download"></i></a></td>';
                                            echo '</tr>';
                                        }
                                    }
                                }
                                if ($no === 1) {
                                    echo '<tr><td colspan="5" class="text-center text-muted py-4"><i class="fas fa-info-circle me-2"></i>Ainda la iha backup.</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>