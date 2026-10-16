<?= view('layout/admin_header', ['title' => 'Jestaun Dadus Sidadaun']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Jestaun Dadus Sidadaun']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-id-card me-2"></i>Jestaun Dadus Sidadaun</h1>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="<?= base_url('admin/citizens/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Aumenta Sidadaun
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list me-1"></i>Lista Sidadaun
                    <span class="badge bg-primary float-end"><?= count($citizens) ?> Sidadaun</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th style="width:50px;">No.</th>
                                    <th style="width:60px;">Foto</th>
                                    <th>NIK</th>
                                    <th>Naran Kompletu</th>
                                    <th>Jéneru</th>
                                    <th>Tinan</th>
                                    <th>Relijiaun</th>
                                    <th>Telefone</th>
                                    <th style="width:140px;">Aksaun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($citizens as $c): ?>
                                <tr>
                                    <td class="text-center fw-bold"><?= $no++ ?></td>
                                    <td class="text-center">
                                        <img src="<?= base_url('uploads/photos/' . ($c['photo'] ?: 'default.png')) ?>"
                                             style="width:35px;height:35px;object-fit:cover;border-radius:50%;border:2px solid #e3e6f0;">
                                    </td>
                                    <td><span class="badge bg-info"><?= esc($c['nik']) ?></span></td>
                                    <td class="fw-bold"><?= esc($c['full_name']) ?></td>
                                    <td><?= gender_label($c['gender']) ?></td>
                                    <td><?= $c['age'] ?> <small class="text-muted">tinan</small></td>
                                    <td><?= esc($c['religion'] ?? '-') ?></td>
                                    <td><?= esc($c['phone'] ?? '-') ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-primary view-citizen" data-id="<?= $c['id'] ?>" data-bs-toggle="modal" data-bs-target="#viewCitizenModal" title="Hare Detallu">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('admin/citizens/print/' . $c['id']) ?>" class="btn btn-sm btn-info" target="_blank" title="Print">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            <a href="<?= base_url('admin/citizens/edit/' . $c['id']) ?>" class="btn btn-sm btn-warning" title="Edita">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/citizens/delete/' . $c['id']) ?>" class="btn btn-sm btn-danger btn-delete" title="Apaga">
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

<!-- View Citizen Modal -->
<div class="modal fade" id="viewCitizenModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-id-card me-2 text-primary"></i>Detallu Sidadaun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4" id="viewPhoto">
                    <img src="" alt="Photo" class="profile-user-img" style="width:100px;height:100px;">
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody id="viewDetails"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Taka</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.view-citizen').click(function() {
        var id = $(this).data('id');
        $.get('<?= base_url('admin/citizens/detail/') ?>' + id, function(data) {
            var photo = data.photo ? '<?= base_url('uploads/photos/') ?>' + data.photo : '<?= base_url('assets/img/default-user.png') ?>';
            var gender = data.gender === 'M' ? 'Mane' : 'Feto';
            var html = '';
            var fields = [
                { label: 'NIK', value: data.nik },
                { label: 'Naran Kompletu', value: data.full_name },
                { label: 'Jéneru', value: gender },
                { label: 'Fatin Moris', value: data.birth_place || '-' },
                { label: 'Loron Moris', value: data.birth_date || '-' },
                { label: 'Tinan', value: (data.age || 0) + ' tinan' },
                { label: 'Relijiaun', value: data.religion || '-' },
                { label: 'Edukasaun', value: data.education || '-' },
                { label: 'Servisu', value: data.occupation || '-' },
                { label: 'Estado Sivil', value: data.marital_status || '-' },
                { label: 'Telefone', value: data.phone || '-' },
                { label: 'Enderesu', value: data.address || '-' },
            ];
            fields.forEach(function(f) {
                html += '<tr><th style="width:30%;background:#f8f9fc;">' + f.label + '</th><td>' + f.value + '</td></tr>';
            });
            $('#viewPhoto img').attr('src', photo);
            $('#viewDetails').html(html);
        });
    });
});
</script>

<?= view('layout/admin_footer') ?>
