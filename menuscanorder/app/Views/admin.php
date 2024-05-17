<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Manage Subscriptions</title>
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
      @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap");

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

      .navbar font {
        font-family: Georgia, "Times New Roman", Times, serif;
      }

      .btn-search {
        background-color: #f2efe9;
        color: black;
      }

      .btn-search:hover {
        background-color: white;
        color: #477346;
      }

      h2.heading {
        font-family: "Playfair Display", serif;
        font-weight: 700;
        color: #142615;
      }

      .table td,
      .table th {
        text-align: center;
        vertical-align: middle;
        color: grey;
      }

      .table th {
        color: #142615;
      }

      .form-control:focus {
        outline: 2px solid black;
        box-shadow: none;
      }

      .btn-add {
        padding: 0.375rem 0.75rem;
        background-color: #224021;
      }

      .btn-add:hover {
        background-color: #324c2d;
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
    <nav
      class="navbar navbar-expand-lg navbar-dark font"
      style="background-color: #010d00"
    >
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
        <!-- Edit Restaurant Form -->
<?php if (isset($editUser)): ?>
<h3 class="text-center mb-4">Edit Restaurant</h3>
<form class="w-100" action="<?= base_url('admin/edit/'.$editUser['id']); ?>" method="post">
    <div class="mb-3">
        <label for="restaurant_name" class="form-label">Restaurant Name</label>
        <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" value="<?= esc($editUser['restaurant_name']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="contact_name" class="form-label">Contact Name</label>
        <input type="text" class="form-control" id="contact_name" name="contact_name" value="<?= esc($editUser['contact_name']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="contact_address" class="form-label">Contact Address</label>
        <input type="text" class="form-control" id="contact_address" name="contact_address" value="<?= esc($editUser['contact_address']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?= esc($editUser['contact_number']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= esc($editUser['email']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin'); ?>" class="btn btn-secondary">Cancel</a>
</form>
<?php endif; ?>
        <h2 class="text-center mb-5 heading">Restaurant Subscriptions</h2>

        <!-- Add Restaurant Form -->
        

        <div class="d-flex justify-content-end">
    <a href="<?= site_url('userform'); ?>" class="btn btn-success btn-sm btn-cat ms-2">Add Restaurant</a>
    </div>

<!-- Table -->
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Restaurant Name</th>
        <th scope="col">Contact Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Phone</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?> <!-- Loop through each user -->
        <tr>
          <td><?= esc($user['id']); ?></td>
          <td><?= esc($user['restaurant_name']); ?></td>
          <td><?= esc($user['contact_name']); ?></td>
          <td><?= esc($user['email']); ?></td>
          <td><?= esc($user['contact_address']); ?></td>
          <td><?= esc($user['contact_number']); ?></td>
          <td>
            <a href="<?= base_url('admin/edit/'.$user['id']); ?>" class="btn btn-outline-primary btn-sm">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="<?= base_url('admin/delete/'.$user['id']); ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php if (empty($users)): ?>
        <tr><td colspan="7">No users found</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
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

<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->