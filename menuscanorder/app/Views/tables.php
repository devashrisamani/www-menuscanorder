<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="dashboard-container">
    <h2 class="text-center mb-5 heading">Manage Tables & QR Codes</h2>
    <!-- Button to add a new table -->
    <div class="mb-4 text-right">
        <a href="<?= base_url('/tables/add') ?>" class="btn btn-success">Add Table</a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Table Name</th>
                    <th scope="col">QR Code</th>
                    <th scope="col">Generate</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tables)): ?>
                    <?php foreach ($tables as $table): ?>
                        <tr>
                            <td><?= $table['table_no'] ?></td>
                            <td>
                                <?php if ($table['table_QR']): ?>
                                    <img src="<?= base_url('qrcodes/' . $table['table_QR']) ?>" alt="QR Code for Table <?= $table['table_no'] ?>" width="100">                                   
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($table['table_QR']): ?>
                                    <a href="<?= base_url('qrcodes/' . $table['table_QR']) ?>" class="btn btn-sm btn-primary" download>Download</a>
                                <?php endif; ?>
                                <a href="<?= base_url('/qrcode/generate/' . $table['id']) ?>" class="btn btn-sm btn-secondary">Generate</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3">No tables available.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->