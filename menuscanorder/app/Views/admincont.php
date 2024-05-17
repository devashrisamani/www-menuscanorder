<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            background: #fff;
        }
        .login-container .btn {
            width: 100%;
            margin-top: 0.5rem;
        }
        .login-container .divider {
            position: relative;
            text-align: center;
            margin: 1.5rem 0;
        }
        .login-container .divider:before,
        .login-container .divider:after {
            content: "";
            flex: 1;
            background: #d1d5db;
            height: 1px;
            box-sizing: border-box;
            top: 0.5em;
            position: absolute;
        }
        .login-container .divider:before {
            right: 0.5em;
            margin-left: 0.5em;
        }
        .login-container .divider:after {
            left: 0.5em;
            margin-right: 0.5em;
        }
        .login-container .divider-text {
            padding: 0 0.5em;
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="login-container text-center">
        <img src="<?= base_url('images/logo.png'); ?>" alt="Logo" style="width: 50px;">
        <h2>Admin Panel Login</h2>
        <p>Manage with ease!</p>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('/admincont') ?>" method="POST" class="mb-3">
            <div class="form-group mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Admin Username" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Admin Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login as Admin</button>
        </form>
    </div>

    <!-- Include Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->