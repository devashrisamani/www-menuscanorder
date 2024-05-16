<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Manage Restaurants</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Bootstrap Icons -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <style>
      /* Google Fonts Import */
      @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");

      body {
        background-color: #f2efe9;
        font-family: "Lato", sans-serif;
        margin: 0;
      }
      /* Container Styles */
      .dashboard-container {
        padding: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
        border-radius: 8px;
        background: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      .navbar {
        font-family: Georgia, "Times New Roman", Times, serif;
        background-color: #010d00;
      }
      .btn-add {
        background-color: #224021;
        color: white;
        padding: 0.375rem 0.75rem;
      }
      .btn-add:hover {
        background-color: #324c2d;
      }
      .form-control {
        background-color: white;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      .form-control:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
      }
      .footer {
        background-color: #010d00;
        color: white;
        padding: 10px 0;
        text-align: center;
        position: relative;
        bottom: 0;
        width: 100%;
      }
    </style>
  </head>
  <body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Menu Scan Order - Admin</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#">Subscriptions</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-4">
      <div class="dashboard-container">
      <h2 class="text-center mb-4"><?= isset($user) ? 'Edit User Details' : 'Add User' ?></h2>
      <form method="POST" action="<?= base_url('admin/addedit' . (isset($user)&&isset($user->id) ? '/' . $user->id : '')) ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Restaurant Name</label>
        <input type="text" class="form-control" id="RestaurantName" name="restaurant_name" value="<?= isset($user) ? esc($user->restaurant_name) : '' ?>" required />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= isset($user) ? esc($user['email']) : '' ?>" required />
      </div>
      <div class="mb-3">
        <label for="contactName" class="form-label">Contact Name</label>
        <input type="text" class="form-control" id="contactName" name="contact_name" value="<?= isset($user) ? esc($user['contact_name']) : '' ?>" required />
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="contact_number" value="<?= isset($user) ? esc($user['contact_number']) : '' ?>" required />
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="contact_address" value="<?= isset($user) ? esc($user['contact_address']) : '' ?>" required />
      </div>
      <button type="submit" class="btn btn-add"><?= isset($user) ? 'Update User' : 'Add User' ?></button>
    </form>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto">
      <div class="container">
        <span>© 2024 MenuScanOrder - All Rights Reserved</span>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
