<?= view('layout/admin_header', ['title' => 'Relatóriu Aldeia']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Relatóriu Aldeia']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Relatóriu Aldeia</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3><?= number_format($total) ?></h3>
                            <p>Total Aldeia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
