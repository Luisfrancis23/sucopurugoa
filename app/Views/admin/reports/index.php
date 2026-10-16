<?= view('layout/admin_header', ['title' => 'Relatóriu']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Relatóriu']) ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Relatóriu</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3><?= number_format($total_population) ?></h3>
                            <p>Total Populasaun</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3><?= number_format($total_kk) ?></h3>
                            <p>Total Uma Kain (KK)</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3><?= number_format($total_aldeia) ?></h3>
                            <p>Total Aldeia</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="small-box text-bg-info">
                        <div class="inner">
                            <h3><?= number_format($total_male) ?></h3>
                            <p>Total Mane</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="small-box text-bg-secondary">
                        <div class="inner">
                            <h3><?= number_format($total_female) ?></h3>
                            <p>Total Feto</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3><?= number_format($total_born) ?></h3>
                            <p>Moris Foun (Mensal)</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="small-box text-bg-dark">
                        <div class="inner">
                            <h3><?= number_format($total_died) ?></h3>
                            <p>Mate (Rejistadu)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
