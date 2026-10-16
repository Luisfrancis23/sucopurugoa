<?= view('layout/admin_header', ['title' => 'Dashboard']) ?>
<?= view('layout/admin_navbar') ?>
<?= view('layout/admin_sidebar', ['title' => 'Dashboard']) ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-4">
                            <h3 class="fw-bold">Benvingudu!</h3>
                            <p class="mb-0 fw-bold">Sistema Informasaun Jestaun Dadus Suku Purugoa</p>
                            <small class="fw-bold" style="color:#000;"><?= date('d/m/Y') ?> - <?= date('l, H:i') ?></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="mb-1"><?= number_format($total_population) ?></h2>
                            <p class="mb-0 fw-bold" style="color:#000;">Total Populasaun</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="mb-1"><?= number_format($total_kk) ?></h2>
                            <p class="mb-0 fw-bold" style="color:#000;">Total Uma Kain (KK)</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="mb-1"><?= number_format($total_aldeia) ?></h2>
                            <p class="mb-0 fw-bold" style="color:#000;">Total Aldeia</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="mb-1"><?= number_format($total_male) ?></h2>
                            <p class="mb-0 fw-bold" style="color:#000;">Total Mane</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h2 class="mb-1"><?= number_format($total_female) ?></h2>
                            <p class="mb-0 fw-bold" style="color:#000;">Total Feto</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= view('layout/admin_footer') ?>
