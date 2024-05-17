<?php 
    $tableId = isset($tableId) ? $tableId : session()->get('table_id');
    $tableNumber = $_GET['table'] ?? null;
    $userId = session()->get('user_id');
    
    // Load the MenuItemModel
    $menuItemModel = new \App\Models\MenuItemModel();
    
    // Retrieve the menu items for the corresponding user_id
    $menuItems = $menuItemModel->where('user_id', $userId)->findAll();
?>

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
        <a class="navbar-brand" href="#">Menu Scan Order - Customer </a>
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
              <a class="nav-link active" href="#">Menu</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container my-4">
<div class="dashboard-container">
    <h2 class="text-center mb-4 heading">Table <?= $tableNumber ?> - Menu</h2>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>
    
    <?php if (!empty($menuItems)): ?>
        <?php foreach ($menuItems as $item): ?>
            <div class="menu-item">
                <div>
                    <h3><?= esc($item['name']); ?></h3>
                    <p class="menu-item-description"><?= esc($item['description']); ?></p>
                    <p class="menu-item-price">$<?= esc($item['price']); ?></p>
                    <input type="number" class="quantity" min="1" value="1">
                </div>
                <div class="menu-actions d-flex justify-content-end">
                    <button class="add-to-cart" data-item-id="<?= esc($item['item_id']); ?>" data-table-id="<?= esc($tableId); ?>">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="menu-item">
            <p>No menu items available.</p>
        </div>
    <?php endif; ?>
</div>
</div>

<!-- Footer -->
<footer class="footer mt-auto">
      <div class="container">
        <span>© 2024 MenuScanOrder - All Rights Reserved</span>
      </div>
</footer>

<!-- Include the jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            var itemId = $(this).data('item-id');
            var tableId = $(this).data('table-id');
            var quantity = $(this).siblings('.quantity').val();

            // Make an AJAX request to add the item to the cart
            $.ajax({
                url: '<?= site_url('menu/addcart') ?>',
                method: 'POST',
                data: {
                    item_id: itemId,
                    table_id: tableId,
                    quantity: quantity
                },
                success: function(response) {
                    alert('Item added to cart successfully!');
                },
                error: function(xhr, status, error) {
                    alert('Error adding item to cart. Please try again.');
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->