<?= $this->extend('logintemplate') ?>
<?= $this->section('content') ?>

<div class="login-card">
    <div class="text-center mb-4">
        <img src="<?= base_url('images/logo.png'); ?>" alt="Logo" style="width: 50px;">
        <h2>Menu Scan Order</h2>
        <p>Order with a scan, dine with ease!</p>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('login') ?>" method="POST" class="mb-3">
            <div class="form-group mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email address or username" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Continue</button>

            <span class="mx-2">or</span>

            <a href="<?= base_url('admincont') ?>" class="btn btn-primary">Login In as Admin</a>
        </form>
        <p class="text-center mt-3">
            Don't have an account? <a href="<?= base_url('register') ?>" class="btn btn-success">Create account</a>
        </p>
    </div>
</div>

<?= $this->endSection() ?>
