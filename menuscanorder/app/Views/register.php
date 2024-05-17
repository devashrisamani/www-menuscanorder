<?= $this->extend('logintemplate') ?>
<?= $this->section('content') ?>

<div class="login-card">
    <div class="text-center mb-5">
        <h2>User Registration</h2>
        <div class="form-group mb-3">
        <form action="#" method="post" class="mb-3">
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="form-group mb-3">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <!-- Additional Fields -->
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="restaurant_name" placeholder="Restaurant Name">
            </div>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="contact_name" placeholder="Contact Name">
            </div>
            <div class="form-group mb-3">
                <input type="tel" class="form-control" name="contact_number" placeholder="Contact Number">
            </div>
            <div class="form-group mb-3">
                <textarea class="form-control" name="contact_address" placeholder="Contact Address"></textarea>
            </div>

            <input type="submit" value="Register">
        </form>
        <p class="text-center">Already have an account? <a href="login" class="form-link">Login here</a></p>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->

            
            
            
            

            

            <!-- <button type="submit" class="btn btn-primary">Register</button> -->
