<footer class="main-footer">
    <div class="float-end d-none d-sm-inline">
        <span class="text-muted me-2" id="serverTime"></span>
        <span class="badge bg-primary">v1.0.0</span>
    </div>
    <strong>&copy; <?= date('Y') ?> <a href="#" class="text-decoration-none">Suku Purugoa</a>.</strong>
    <span class="text-muted ms-1">Hotu-hotu hakbesik.</span>
</footer>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.1/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/js/custom.js') ?>"></script>

<script>
(function() {
    'use strict';

    /* Server time display */
    function updateServerTime() {
        var now = new Date();
        var el = document.getElementById('serverTime');
        if (el) {
            el.textContent = now.toLocaleDateString('tet', { day: '2-digit', month: '2-digit', year: 'numeric' }) + ' ' + now.toLocaleTimeString('tet', { hour: '2-digit', minute: '2-digit' });
        }
    }
    updateServerTime();
    setInterval(updateServerTime, 60000);

    $(document).ready(function() {

        /* ===== DATATABLES ===== */
        if ($.fn.DataTable && $('.datatable').length) {
            $('.datatable').DataTable({
                responsive: true,
                pageLength: 25,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/pt-BR.json',
                    search: '<i class="fas fa-search me-1"></i>Peskiza:',
                    lengthMenu: 'Hatudu _MENU_ dadus',
                    info: 'Hatudu _START_ to _END_ husi _TOTAL_ dadus',
                    infoEmpty: 'Dadus mamuk',
                    infoFiltered: '(filtru husi _MAX_ dadus)',
                    zeroRecords: 'Dadus la hetan',
                    paginate: {
                        first: 'Primeiru',
                        last: 'Ikus',
                        next: '<i class="fas fa-chevron-right"></i>',
                        previous: '<i class="fas fa-chevron-left"></i>'
                    }
                },
                dom: '<"row align-items-center mb-3"<"col-md-6"f>>' +
                     '<"row"<"col-md-12"tr>>' +
                     '<"row align-items-center mt-3"<"col-md-5"i><"col-md-7"p>>',
                drawCallback: function() {
                    $('.dataTables_paginate .paginate_button').addClass('page-link');
                }
            });
        }

        /* ===== AUTO-HIDE ALERTS ===== */
        $('.alert').not('.alert-permanent').delay(4000).slideUp(500);

        /* ===== IMAGE PREVIEW ===== */
        $('.image-input').change(function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                const previewId = $(this).data('preview');
                reader.onload = function(e) {
                    $('#' + previewId).attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);
            }
        });

        /* ===== DELETE CONFIRMATION ===== */
        $('.btn-delete').click(function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Ita boot nia serteza?',
                text: 'Dadus ne\'e sei lakon permanentemente!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74a3b',
                cancelButtonColor: '#858796',
                confirmButtonText: 'Sim, Apaga!',
                cancelButtonText: 'Kansela',
                showLoaderOnConfirm: true,
                reverseButtons: true,
                preConfirm: () => { window.location.href = url; }
            });
        });
    });

    /* ===== SWEETALERT2 NOTIFICATIONS ===== */
    <?php if (session()->getFlashdata('success')): ?>
    Swal.fire({
        icon: 'success',
        title: 'Susesu!',
        text: <?= json_encode(session()->getFlashdata('success')) ?>,
        timer: 3000,
        showConfirmButton: false,
        toast: true,
        position: 'top-end',
        background: '#1cc88a',
        color: '#fff',
        iconColor: '#fff'
    });
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
    Swal.fire({
        icon: 'error',
        title: 'Erro!',
        text: <?= json_encode(session()->getFlashdata('error')) ?>,
        timer: 4000,
        showConfirmButton: false,
        toast: true,
        position: 'top-end',
        background: '#e74a3b',
        color: '#fff',
        iconColor: '#fff'
    });
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
    Swal.fire({
        icon: 'error',
        title: 'Erro Validasaun!',
        html: <?= json_encode(implode('<br>', session()->getFlashdata('errors'))) ?>,
        timer: 5000,
        showConfirmButton: true,
        confirmButtonColor: '#4e73df',
        background: 'rgba(255,255,255,0.98)'
    });
    <?php endif; ?>
})();
</script>
</body>
</html>