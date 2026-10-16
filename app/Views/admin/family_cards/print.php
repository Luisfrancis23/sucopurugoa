<!DOCTYPE html>
<html lang="tet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uma Kain - <?= esc($family['number']) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Georgia', 'Times New Roman', serif; padding: 30px; color: #222; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px double #333; padding-bottom: 15px; }
        .header h3 { font-weight: 700; margin-bottom: 5px; }
        .header h5 { color: #555; font-weight: 400; font-style: italic; }
        .photo-box { width: 120px; height: 150px; border: 2px solid #333; text-align: center; display: flex; align-items: center; justify-content: center; background: #fafafa; margin: 0 auto 10px; }
        .photo-box img { max-width: 100%; max-height: 100%; object-fit: cover; }
        table.details { width: 100%; border-collapse: collapse; }
        table.details td { padding: 8px 12px; border: 1px solid #999; font-size: 14px; }
        table.details td.label { font-weight: 700; width: 30%; background: #f5f5f5; color: #333; }
        .no-print { margin-bottom: 20px; }
        .footer { text-align: center; margin-top: 40px; color: #777; font-size: 12px; border-top: 1px solid #ddd; padding-top: 15px; }
        @media print {
            .no-print { display: none !important; }
            body { padding: 15px; }
            table.details td { border-color: #333; }
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
        <button onclick="window.close()" class="btn btn-secondary"><i class="fas fa-times"></i> Fechar</button>
    </div>
    <div class="header">
        <h3><i class="fas fa-home"></i> Kartu Família (Uma Kain)</h3>
        <h5>Sistema Informasaun Jestaun Dadus Suku Purugoa</h5>
        <small>Ermera, Timor-Leste</small>
    </div>
    <div class="row">
        <div class="col-3 text-center">
            <div class="photo-box">
                <?php if ($family['photo']): ?>
                <img src="<?= base_url('uploads/photos/' . $family['photo']) ?>" alt="Foto">
                <?php else: ?>
                <i class="fas fa-user fa-4x text-muted"></i>
                <?php endif; ?>
            </div>
            <small class="text-muted">Foto Xefe Família</small>
        </div>
        <div class="col-9">
            <table class="details">
                <tr><td class="label">Númeru KK</td><td><strong><?= esc($family['number']) ?></strong></td></tr>
                <tr><td class="label">NIK Xefe Família</td><td><?= esc($family['nik'] ?? '-') ?></td></tr>
                <tr><td class="label">Xefe Família</td><td><strong><?= esc($family['head_name']) ?></strong></td></tr>
                <tr><td class="label">Jéneru</td><td><?= gender_label($family['gender']) ?></td></tr>
                <tr><td class="label">Loron Moris</td><td><?= format_date($family['birth_date']) ?></td></tr>
                <tr><td class="label">Enderesu</td><td><?= esc($family['address'] ?? '-') ?></td></tr>
                <tr><td class="label">Aldeia</td><td><?= esc($family['aldeia_name'] ?? '-') ?></td></tr>
                <tr><td class="label">RT</td><td><?= esc($family['rt_number'] ?? '-') ?></td></tr>
                <tr><td class="label">Telefone</td><td><?= esc($family['phone'] ?? '-') ?></td></tr>
            </table>
        </div>
    </div>
    <div class="footer">
        Dokumentu ne'e hetan husi Sistema Informasaun Jestaun Dadus Suku Purugoa <?= date('Y') ?>
    </div>
</body>
</html>