<?= $this->extend('logintemplate') ?>
<?= $this->section('content') ?>

<div class="login-card">
    <div class="text-center mb-4">
        <h1>User Registration</h1>
        <form action="#" method="post">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>

            <!-- Additional Fields -->
            <input type="text" name="restaurant_name" placeholder="Restaurant Name">
            <input type="text" name="contact_name" placeholder="Contact Name">
            <input type="tel" name="contact_number" placeholder="Contact Number">
            <textarea name="contact_address" placeholder="Contact Address"></textarea>

            <input type="submit" value="Register">
        </form>
        <p class="text-center">Already have an account? <a href="login" class="form-link">Login here</a></p>
    </div>
</div>

<?= $this->endSection() ?>

